<?php
declare(strict_types=1);

require_once __DIR__ . '/database.php';

function portal_session_start(): void
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function portal_attempt_login(PDO $pdo, string $role, string $username, string $password): ?array
{
    $sql = '
        SELECT
            u.id,
            u.role,
            u.username,
            u.email,
            u.password_hash,
            u.must_change_password,
            u.is_active,
            s.id AS student_profile_id,
            s.student_number,
            s.first_name,
            s.last_name,
            s.program_name,
            s.year_level,
            s.section_name,
            sp.id AS staff_profile_id,
            sp.staff_number,
            sp.full_name AS staff_full_name,
            sp.department_name,
            sp.position_title
        FROM portal_users u
        LEFT JOIN students s ON s.user_id = u.id
        LEFT JOIN staff_profiles sp ON sp.user_id = u.id
        WHERE u.role = :role
          AND u.username = :username
        LIMIT 1
    ';

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'role' => $role,
        'username' => $username,
    ]);

    $user = $stmt->fetch();

    if (!$user || (int) $user['is_active'] !== 1) {
        portal_log_login_attempt($pdo, null, $username, $role, false);
        return null;
    }

    if (!password_verify($password, $user['password_hash'])) {
        portal_log_login_attempt($pdo, (int) $user['id'], $username, $role, false);
        return null;
    }

    $update = $pdo->prepare('UPDATE portal_users SET last_login_at = NOW() WHERE id = :id');
    $update->execute(['id' => $user['id']]);

    portal_log_login_attempt($pdo, (int) $user['id'], $username, $role, true);

    return $user;
}

function portal_login_user(array $user): void
{
    portal_session_start();

    $_SESSION['portal_user_id'] = (int) $user['id'];
    $_SESSION['portal_role'] = $user['role'];
    $_SESSION['portal_username'] = $user['username'];
    $_SESSION['portal_student_profile_id'] = $user['student_profile_id'] !== null
        ? (int) $user['student_profile_id']
        : null;
    $_SESSION['portal_staff_profile_id'] = $user['staff_profile_id'] !== null
        ? (int) $user['staff_profile_id']
        : null;
}

function portal_current_user(PDO $pdo): ?array
{
    portal_session_start();

    if (empty($_SESSION['portal_user_id'])) {
        return null;
    }

    $sql = '
        SELECT
            u.id,
            u.role,
            u.username,
            u.email,
            u.must_change_password,
            s.id AS student_profile_id,
            s.student_number,
            s.first_name,
            s.last_name,
            s.avatar_initials,
            s.program_name,
            s.year_level,
            s.section_name,
            s.current_gwa,
            s.current_units,
            s.current_balance,
            s.enrollment_status,
            sp.id AS staff_profile_id,
            sp.staff_number,
            sp.full_name AS staff_full_name,
            sp.department_name,
            sp.position_title
        FROM portal_users u
        LEFT JOIN students s ON s.user_id = u.id
        LEFT JOIN staff_profiles sp ON sp.user_id = u.id
        WHERE u.id = :id
        LIMIT 1
    ';

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $_SESSION['portal_user_id']]);

    $user = $stmt->fetch();

    return $user ?: null;
}

function portal_require_login(string $requiredRole = 'student', string $loginPath = 'login.php'): array
{
    $pdo = portal_db();
    $user = portal_current_user($pdo);

    if (!$user || $user['role'] !== $requiredRole) {
        header('Location: ' . $loginPath . '?role=' . urlencode($requiredRole));
        exit;
    }

    return $user;
}

function portal_logout_user(): void
{
    portal_session_start();

    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }

    session_destroy();
}

function portal_log_login_attempt(
    PDO $pdo,
    ?int $userId,
    string $usernameAttempt,
    string $roleAttempted,
    bool $wasSuccessful
): void {
    $sql = '
        INSERT INTO login_activity (
            user_id,
            username_attempt,
            role_attempted,
            was_successful,
            ip_address,
            user_agent
        ) VALUES (
            :user_id,
            :username_attempt,
            :role_attempted,
            :was_successful,
            :ip_address,
            :user_agent
        )
    ';

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'user_id' => $userId,
        'username_attempt' => $usernameAttempt,
        'role_attempted' => $roleAttempted,
        'was_successful' => $wasSuccessful ? 1 : 0,
        'ip_address' => $_SERVER['REMOTE_ADDR'] ?? null,
        'user_agent' => isset($_SERVER['HTTP_USER_AGENT'])
            ? substr((string) $_SERVER['HTTP_USER_AGENT'], 0, 255)
            : null,
    ]);
}
