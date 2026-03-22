<?php
declare(strict_types=1);

require_once __DIR__ . '/config/portal_auth.php';

portal_logout_user();

header('Location: login.php?logged_out=1');
exit;
