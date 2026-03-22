<?php
declare(strict_types=1);

function portal_db(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $host = getenv('PORTAL_DB_HOST') ?: 'localhost';
    $port = getenv('PORTAL_DB_PORT') ?: '3306';
    $name = getenv('PORTAL_DB_NAME') ?: 'datamex_student_portal';
    $user = getenv('PORTAL_DB_USER') ?: 'root';
    $pass = getenv('PORTAL_DB_PASS') ?: '';
    $timeout = (int) (getenv('PORTAL_DB_TIMEOUT') ?: '5');

    $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4', $host, $port, $name);

    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_TIMEOUT => max(1, $timeout),
    ]);

    return $pdo;
}
