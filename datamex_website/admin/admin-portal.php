<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/config/portal_auth.php';

portal_session_start();

if (empty($_SESSION['portal_user_id']) || ($_SESSION['portal_role'] ?? '') !== 'admin') {
    header('Location: ../login.php?role=admin');
    exit;
}

function admin_e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function admin_term_label(?array $term): string
{
    if (!$term) {
        return 'No active term';
    }

    return trim(($term['semester_label'] ?? 'Current Term') . ' - AY ' . ($term['school_year'] ?? ''));
}

$dashboardError = '';
$currentUser = [
    'staff_full_name' => 'Portal Administrator',
    'position_title' => 'System Administrator',
    'department_name' => 'Website Administration',
    'email' => 'portal.admin@datamex.edu.ph',
    'must_change_password' => 0,
];
$stats = [
    'student_count' => 0,
    'faculty_count' => 0,
    'admin_count' => 0,
    'active_accounts' => 0,
    'announcement_count' => 0,
];
$recentLogins = [];
$currentTerm = null;

try {
    $pdo = portal_db();
    $loadedUser = portal_current_user($pdo);

    if (!$loadedUser || $loadedUser['role'] !== 'admin') {
        portal_logout_user();
        header('Location: ../login.php?role=admin');
        exit;
    }

    $currentUser = $loadedUser;

    $statsStmt = $pdo->query(
        "SELECT
            SUM(CASE WHEN role = 'student' THEN 1 ELSE 0 END) AS student_count,
            SUM(CASE WHEN role = 'faculty' THEN 1 ELSE 0 END) AS faculty_count,
            SUM(CASE WHEN role = 'admin' THEN 1 ELSE 0 END) AS admin_count,
            SUM(CASE WHEN is_active = 1 THEN 1 ELSE 0 END) AS active_accounts
        FROM portal_users"
    );
    $statsRow = $statsStmt->fetch();

    if ($statsRow) {
        $stats['student_count'] = (int) ($statsRow['student_count'] ?? 0);
        $stats['faculty_count'] = (int) ($statsRow['faculty_count'] ?? 0);
        $stats['admin_count'] = (int) ($statsRow['admin_count'] ?? 0);
        $stats['active_accounts'] = (int) ($statsRow['active_accounts'] ?? 0);
    }

    $announcementStmt = $pdo->query(
        "SELECT COUNT(*) AS announcement_count
        FROM portal_announcements
        WHERE is_active = 1"
    );
    $stats['announcement_count'] = (int) (($announcementStmt->fetch()['announcement_count'] ?? 0));

    $termStmt = $pdo->query(
        "SELECT school_year, semester_label
        FROM academic_terms
        WHERE is_current = 1
        ORDER BY id DESC
        LIMIT 1"
    );
    $currentTerm = $termStmt->fetch() ?: null;

    $loginStmt = $pdo->query(
        "SELECT
            la.username_attempt,
            la.role_attempted,
            la.was_successful,
            la.created_at,
            COALESCE(sp.full_name, CONCAT(COALESCE(s.first_name, ''), CASE WHEN s.last_name IS NOT NULL AND s.last_name <> '' THEN CONCAT(' ', s.last_name) ELSE '' END), u.username) AS display_name
        FROM login_activity la
        LEFT JOIN portal_users u ON u.id = la.user_id
        LEFT JOIN students s ON s.user_id = u.id
        LEFT JOIN staff_profiles sp ON sp.user_id = u.id
        ORDER BY la.created_at DESC, la.id DESC
        LIMIT 8"
    );
    $recentLogins = $loginStmt->fetchAll();
} catch (Throwable $exception) {
    $dashboardError = 'The admin dashboard could not load live portal data right now.';
}

$adminName = trim((string) ($currentUser['staff_full_name'] ?? ''));
if ($adminName === '') {
    $adminName = 'Portal Administrator';
}

$positionTitle = trim((string) ($currentUser['position_title'] ?? 'System Administrator'));
$departmentName = trim((string) ($currentUser['department_name'] ?? 'Website Administration'));
$adminEmail = trim((string) ($currentUser['email'] ?? 'portal.admin@datamex.edu.ph'));

$websitePages = [
    ['label' => 'Homepage', 'path' => '../index.php', 'desc' => 'Main landing page and hero sections'],
    ['label' => 'About Page', 'path' => '../about.php', 'desc' => 'School story, mission, and highlights'],
    ['label' => 'Admissions', 'path' => '../admission.php', 'desc' => 'Requirements, apply flow, and enrollment links'],
    ['label' => 'Academics', 'path' => '../academics.php', 'desc' => 'Programs and academic sections'],
    ['label' => 'Campus Life', 'path' => '../campus_life.php', 'desc' => 'Events, activities, and student life'],
    ['label' => 'News', 'path' => '../news.php', 'desc' => 'News posts and updates page'],
    ['label' => 'Portal Login', 'path' => '../login.php', 'desc' => 'Shared login page for portal roles'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Admin Portal - Datamex College of Saint Adeline</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<style>
:root{
  --maroon:#7b0d1e;--maroonD:#5c0916;--gold:#c9a030;
  --cream:#faf8f5;--off:#f2efea;--ink:#1a1018;--muted:#6b5f63;
  --white:#ffffff;--border:#e0d8d0;--ok:#1f7a34;--warn:#b45c00;
}
*{margin:0;padding:0;box-sizing:border-box;}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--off);color:var(--ink);min-height:100vh;}
a{text-decoration:none;color:inherit;}
.topbar{
  background:var(--maroon);color:var(--white);
  display:flex;align-items:center;justify-content:space-between;
  padding:1rem 1.5rem;position:sticky;top:0;z-index:20;
  box-shadow:0 2px 14px rgba(123,13,30,.25);
}
.tb-brand{display:flex;align-items:center;gap:.8rem;}
.tb-seal{
  width:38px;height:38px;border-radius:50%;
  border:2px solid var(--gold);display:flex;align-items:center;justify-content:center;
  font-family:'Cormorant Garamond',serif;font-size:1.1rem;font-weight:700;color:var(--gold);
  background:rgba(201,160,48,.12);
}
.tb-copy strong{display:block;font-size:.9rem;}
.tb-copy span{font-size:.65rem;color:rgba(255,255,255,.6);letter-spacing:.12em;text-transform:uppercase;}
.tb-actions{display:flex;align-items:center;gap:.75rem;flex-wrap:wrap;}
.tb-link,.tb-button{
  font-size:.72rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;
  padding:.55rem .85rem;border-radius:4px;border:1px solid rgba(255,255,255,.15);
}
.tb-link{color:rgba(255,255,255,.78);}
.tb-link:hover{background:rgba(255,255,255,.1);color:var(--white);}
.tb-button{background:var(--gold);color:var(--maroonD);border-color:transparent;}
.tb-button:hover{background:#e0b645;}

.shell{display:grid;grid-template-columns:260px 1fr;min-height:calc(100vh - 72px);}
.sidebar{
  background:var(--white);border-right:1px solid var(--border);
  padding:1.25rem 1rem;display:flex;flex-direction:column;gap:1rem;
}
.admin-card{
  background:var(--maroon);color:var(--white);border-radius:12px;
  padding:1rem;border:1px solid rgba(201,160,48,.25);
}
.admin-card small{display:block;font-size:.65rem;color:rgba(255,255,255,.6);letter-spacing:.12em;text-transform:uppercase;margin-bottom:.35rem;}
.admin-card h2{font-size:1rem;margin-bottom:.25rem;}
.admin-card p{font-size:.72rem;color:rgba(255,255,255,.72);line-height:1.5;}
.admin-meta{margin-top:.85rem;padding-top:.85rem;border-top:1px solid rgba(255,255,255,.12);}
.admin-meta span{display:block;font-size:.68rem;color:rgba(255,255,255,.78);margin-top:.35rem;}
.side-nav{display:flex;flex-direction:column;gap:.45rem;}
.side-nav a{
  padding:.75rem .85rem;border-radius:8px;font-size:.8rem;font-weight:600;color:var(--muted);
  border:1px solid transparent;
}
.side-nav a:hover{background:var(--cream);border-color:var(--border);color:var(--maroon);}

.main{padding:1.5rem;}
.hero{
  background:linear-gradient(135deg,rgba(123,13,30,.95),rgba(92,9,22,.92));
  color:var(--white);border-radius:18px;padding:1.5rem;
  box-shadow:0 18px 30px rgba(123,13,30,.12);margin-bottom:1.25rem;
}
.hero small{display:block;font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.65);margin-bottom:.55rem;}
.hero h1{font-family:'Cormorant Garamond',serif;font-size:2.2rem;line-height:1;margin-bottom:.4rem;}
.hero p{font-size:.9rem;color:rgba(255,255,255,.74);max-width:760px;line-height:1.6;}
.hero-row{display:flex;align-items:flex-end;justify-content:space-between;gap:1rem;flex-wrap:wrap;}
.hero-badge{
  background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);border-radius:999px;
  padding:.5rem .9rem;font-size:.72rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;
}

.notice{
  margin-bottom:1rem;padding:.9rem 1rem;border-radius:10px;border:1px solid var(--border);
  background:var(--cream);font-size:.82rem;color:var(--muted);
}
.notice strong{color:var(--maroon);}
.notice.warn{background:#fff5ea;border-color:#f3d4aa;color:#8d4d00;}

.stats{display:grid;grid-template-columns:repeat(5,1fr);gap:1rem;margin-bottom:1.25rem;}
.stat{
  background:var(--white);border:1px solid var(--border);border-radius:14px;padding:1rem;
}
.stat span{display:block;font-size:.68rem;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);margin-bottom:.4rem;}
.stat strong{display:block;font-family:'Cormorant Garamond',serif;font-size:2rem;color:var(--maroon);line-height:1;}
.stat small{display:block;font-size:.7rem;color:var(--muted);margin-top:.35rem;}

.grid{display:grid;grid-template-columns:1.15fr .85fr;gap:1rem;}
.panel{
  background:var(--white);border:1px solid var(--border);border-radius:16px;overflow:hidden;
}
.panel-head{
  display:flex;align-items:center;justify-content:space-between;gap:1rem;
  padding:1rem 1.15rem;border-bottom:1px solid var(--border);
}
.panel-head h3{font-family:'Cormorant Garamond',serif;font-size:1.2rem;color:var(--maroon);}
.panel-head span{font-size:.68rem;letter-spacing:.12em;text-transform:uppercase;color:var(--gold);}
.panel-body{padding:1rem 1.15rem;}

.page-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:.9rem;}
.page-card{
  border:1px solid var(--border);border-radius:12px;padding:1rem;background:var(--cream);
}
.page-card h4{font-size:.88rem;color:var(--maroon);margin-bottom:.3rem;}
.page-card p{font-size:.72rem;color:var(--muted);line-height:1.5;margin-bottom:.8rem;}
.page-card a{
  display:inline-flex;align-items:center;gap:.45rem;font-size:.72rem;font-weight:700;
  letter-spacing:.08em;text-transform:uppercase;color:var(--maroon);
}

.status-list{display:flex;flex-direction:column;gap:.8rem;}
.status-item{
  display:flex;align-items:flex-start;justify-content:space-between;gap:1rem;
  border:1px solid var(--border);border-radius:12px;padding:.85rem .95rem;
}
.status-item h4{font-size:.8rem;color:var(--ink);margin-bottom:.18rem;}
.status-item p{font-size:.7rem;color:var(--muted);line-height:1.5;}
.pill{
  font-size:.68rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;
  padding:.35rem .65rem;border-radius:999px;white-space:nowrap;
}
.pill.ok{background:rgba(31,122,52,.1);color:var(--ok);}
.pill.warn{background:rgba(180,92,0,.1);color:var(--warn);}

.login-table{width:100%;border-collapse:collapse;}
.login-table th,.login-table td{padding:.75rem .4rem;text-align:left;border-bottom:1px solid var(--border);font-size:.75rem;}
.login-table th{font-size:.64rem;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);}
.login-table td strong{display:block;color:var(--ink);}
.login-ok{color:var(--ok);font-weight:700;}
.login-bad{color:#b02020;font-weight:700;}

@media(max-width:1100px){
  .shell{grid-template-columns:1fr;}
  .stats{grid-template-columns:repeat(2,1fr);}
  .grid{grid-template-columns:1fr;}
}
@media(max-width:720px){
  .main{padding:1rem;}
  .stats,.page-grid{grid-template-columns:1fr;}
  .topbar{padding:1rem;align-items:flex-start;}
}
</style>
</head>
<body>
<div class="topbar">
  <div class="tb-brand">
    <div class="tb-seal">D</div>
    <div class="tb-copy">
      <strong>Datamex Admin Portal</strong>
      <span>Website Control Center</span>
    </div>
  </div>
  <div class="tb-actions">
    <a class="tb-link" href="../index.php">View Website</a>
    <a class="tb-link" href="../login.php?role=admin">Login Page</a>
    <a class="tb-button" href="../logout.php">Log Out</a>
  </div>
</div>

<div class="shell">
  <aside class="sidebar">
    <div class="admin-card">
      <small>Signed In As</small>
      <h2><?= admin_e($adminName) ?></h2>
      <p><?= admin_e($positionTitle) ?></p>
      <div class="admin-meta">
        <span><?= admin_e($departmentName) ?></span>
        <span><?= admin_e($adminEmail) ?></span>
        <span><?= admin_e(admin_term_label($currentTerm)) ?></span>
      </div>
    </div>

    <nav class="side-nav">
      <a href="#overview">Overview</a>
      <a href="#website">Website Control</a>
      <a href="#activity">Recent Activity</a>
      <a href="#status">System Status</a>
    </nav>
  </aside>

  <main class="main">
    <section class="hero" id="overview">
      <small>Administrator Workspace</small>
      <div class="hero-row">
        <div>
          <h1>Admin Control Center</h1>
          <p>Use this panel to monitor portal access, review account activity, and jump into the live website sections quickly from one place.</p>
        </div>
        <div class="hero-badge"><?= admin_e(admin_term_label($currentTerm)) ?></div>
      </div>
    </section>

    <?php if ($dashboardError !== ''): ?>
      <div class="notice warn"><strong>Dashboard notice:</strong> <?= admin_e($dashboardError) ?></div>
    <?php elseif (!empty($currentUser['must_change_password'])): ?>
      <div class="notice warn"><strong>Security reminder:</strong> This admin account is still marked for a password change.</div>
    <?php else: ?>
      <div class="notice"><strong>Admin access is active.</strong> You are seeing live database-backed portal statistics and recent access activity.</div>
    <?php endif; ?>

    <section class="stats">
      <div class="stat">
        <span>Students</span>
        <strong><?= admin_e((string) $stats['student_count']) ?></strong>
        <small>Student accounts in portal</small>
      </div>
      <div class="stat">
        <span>Faculty</span>
        <strong><?= admin_e((string) $stats['faculty_count']) ?></strong>
        <small>Faculty accounts in portal</small>
      </div>
      <div class="stat">
        <span>Admins</span>
        <strong><?= admin_e((string) $stats['admin_count']) ?></strong>
        <small>Administrator accounts</small>
      </div>
      <div class="stat">
        <span>Active Accounts</span>
        <strong><?= admin_e((string) $stats['active_accounts']) ?></strong>
        <small>Enabled portal users</small>
      </div>
      <div class="stat">
        <span>Announcements</span>
        <strong><?= admin_e((string) $stats['announcement_count']) ?></strong>
        <small>Live portal notices</small>
      </div>
    </section>

    <section class="grid">
      <div class="panel" id="website">
        <div class="panel-head">
          <div>
            <span>Website Control</span>
            <h3>Public Site Sections</h3>
          </div>
        </div>
        <div class="panel-body">
          <div class="page-grid">
            <?php foreach ($websitePages as $page): ?>
              <div class="page-card">
                <h4><?= admin_e($page['label']) ?></h4>
                <p><?= admin_e($page['desc']) ?></p>
                <a href="<?= admin_e($page['path']) ?>">Open Page</a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="panel" id="status">
        <div class="panel-head">
          <div>
            <span>System Status</span>
            <h3>Portal Health</h3>
          </div>
        </div>
        <div class="panel-body">
          <div class="status-list">
            <div class="status-item">
              <div>
                <h4>Shared login page</h4>
                <p>The shared portal login is connected, and admin accounts route here after sign in.</p>
              </div>
              <span class="pill ok">Live</span>
            </div>
            <div class="status-item">
              <div>
                <h4>Admin dashboard</h4>
                <p>This page is now protected by admin session checks and reads portal stats from the database.</p>
              </div>
              <span class="pill ok">Protected</span>
            </div>
            <div class="status-item">
              <div>
                <h4>Faculty dashboard</h4>
                <p>The faculty portal is connected to the shared login flow and protected by faculty session checks.</p>
              </div>
              <span class="pill ok">Live</span>
            </div>
            <div class="status-item">
              <div>
                <h4>Student dashboard</h4>
                <p>The student portal still needs to be switched from placeholder data to live records.</p>
              </div>
              <span class="pill warn">Pending</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="panel" id="activity" style="margin-top:1rem;">
      <div class="panel-head">
        <div>
          <span>Recent Activity</span>
          <h3>Latest Portal Login Attempts</h3>
        </div>
      </div>
      <div class="panel-body">
        <?php if (!$recentLogins): ?>
          <div class="notice">No login activity has been recorded yet.</div>
        <?php else: ?>
          <table class="login-table">
            <thead>
              <tr>
                <th>User</th>
                <th>Role</th>
                <th>Status</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($recentLogins as $login): ?>
                <tr>
                  <td>
                    <strong><?= admin_e((string) ($login['display_name'] ?: $login['username_attempt'])) ?></strong>
                    <?= admin_e((string) $login['username_attempt']) ?>
                  </td>
                  <td><?= admin_e(ucfirst((string) $login['role_attempted'])) ?></td>
                  <td class="<?= (int) $login['was_successful'] === 1 ? 'login-ok' : 'login-bad' ?>">
                    <?= (int) $login['was_successful'] === 1 ? 'Successful' : 'Failed' ?>
                  </td>
                  <td><?= admin_e((string) $login['created_at']) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
      </div>
    </section>
  </main>
</div>
</body>
</html>
