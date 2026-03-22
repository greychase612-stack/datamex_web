<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/config/portal_auth.php';

portal_session_start();

if (empty($_SESSION['portal_user_id']) || ($_SESSION['portal_role'] ?? '') !== 'faculty') {
    header('Location: ../login.php?role=faculty&force=1');
    exit;
}

function faculty_e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function faculty_initials(string $fullName): string
{
    $parts = preg_split('/\s+/', trim($fullName)) ?: [];
    $initials = '';

    foreach ($parts as $part) {
        if ($part === '') {
            continue;
        }

        $initials .= strtoupper(substr($part, 0, 1));

        if (strlen($initials) >= 2) {
            break;
        }
    }

    return $initials !== '' ? $initials : 'FC';
}

function faculty_term_label(?array $term): string
{
    if (!$term) {
        return 'No active term';
    }

    return trim(($term['semester_label'] ?? 'Current Term') . ' - AY ' . ($term['school_year'] ?? ''));
}

function faculty_datetime(?string $value): string
{
    if (!$value) {
        return 'Not available';
    }

    $timestamp = strtotime($value);

    if ($timestamp === false) {
        return 'Not available';
    }

    return date('M d, Y g:i A', $timestamp);
}

function faculty_announcement_link(?string $value): ?string
{
    $value = trim((string) $value);

    if ($value === '') {
        return null;
    }

    if (preg_match('~^(?:https?:)?//~i', $value) || str_starts_with($value, 'mailto:')) {
        return $value;
    }

    return '../' . ltrim($value, '/');
}

function faculty_category_class(string $category): string
{
    return match ($category) {
        'academic' => 'academic',
        'enrollment' => 'enrollment',
        'finance' => 'finance',
        'event' => 'event',
        default => 'general',
    };
}

$dashboardError = '';
$currentUser = [
    'staff_full_name' => (string) ($_SESSION['portal_username'] ?? 'Faculty Member'),
    'staff_number' => '',
    'department_name' => 'Faculty Services',
    'position_title' => 'Faculty Member',
    'email' => '',
    'must_change_password' => 0,
];
$currentTerm = null;
$announcements = [];
$facultyNoticeCount = 0;
$latestFacultyLogin = null;

try {
    $pdo = portal_db();
    $loadedUser = portal_current_user($pdo);

    if (!$loadedUser || $loadedUser['role'] !== 'faculty') {
        portal_logout_user();
        header('Location: ../login.php?role=faculty&force=1');
        exit;
    }

    $currentUser = $loadedUser;

    $termStmt = $pdo->query(
        "SELECT school_year, semester_label
        FROM academic_terms
        WHERE is_current = 1
        ORDER BY id DESC
        LIMIT 1"
    );
    $currentTerm = $termStmt->fetch() ?: null;

    $announcementStmt = $pdo->query(
        "SELECT title, message, category, audience_role, link_url, published_at
        FROM portal_announcements
        WHERE is_active = 1
          AND audience_role IN ('all', 'faculty')
        ORDER BY published_at DESC, id DESC
        LIMIT 6"
    );
    $announcements = $announcementStmt->fetchAll();
    $facultyNoticeCount = count($announcements);

    $loginStmt = $pdo->prepare(
        "SELECT created_at
        FROM login_activity
        WHERE user_id = :user_id
          AND role_attempted = 'faculty'
          AND was_successful = 1
        ORDER BY created_at DESC, id DESC
        LIMIT 1"
    );
    $loginStmt->execute(['user_id' => $loadedUser['id']]);
    $latestFacultyLogin = $loginStmt->fetchColumn() ?: null;
} catch (Throwable $exception) {
    $dashboardError = 'The faculty portal could not load live data right now.';
}

$facultyName = trim((string) ($currentUser['staff_full_name'] ?? ''));
if ($facultyName === '') {
    $facultyName = 'Faculty Member';
}

$staffNumber = trim((string) ($currentUser['staff_number'] ?? ''));
if ($staffNumber === '') {
    $staffNumber = 'Not assigned';
}

$departmentName = trim((string) ($currentUser['department_name'] ?? ''));
if ($departmentName === '') {
    $departmentName = 'Faculty Services';
}

$positionTitle = trim((string) ($currentUser['position_title'] ?? ''));
if ($positionTitle === '') {
    $positionTitle = 'Faculty Member';
}

$facultyEmail = trim((string) ($currentUser['email'] ?? ''));
if ($facultyEmail === '') {
    $facultyEmail = 'helpdesk@datamex.edu.ph';
}

$accountStatus = !empty($currentUser['must_change_password']) ? 'Password update required' : 'Active';
$quickLinks = [
    ['label' => 'Academic Calendar', 'description' => 'Review the current term timeline and key milestones.', 'href' => '../academics.php#calendar'],
    ['label' => 'Faculty Directory', 'description' => 'Open the academics page section for faculty profiles.', 'href' => '../academics.php#faculty'],
    ['label' => 'Campus News', 'description' => 'See school-wide updates and announcements.', 'href' => '../news.php'],
    ['label' => 'Support', 'description' => 'Contact the Datamex help desk for account concerns.', 'href' => 'mailto:helpdesk@datamex.edu.ph?subject=Faculty%20Portal%20Support'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Faculty Portal - Datamex College of Saint Adeline</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<style>
:root{
  --maroon:#7b0d1e;--maroonD:#5c0916;--gold:#c9a030;--goldL:#e2bb55;
  --cream:#faf8f5;--off:#f2efea;--ink:#1a1018;--muted:#6b5f63;
  --white:#ffffff;--border:#e0d8d0;--ok:#1f7a34;--warn:#b45c00;
}
*{margin:0;padding:0;box-sizing:border-box;}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--off);color:var(--ink);min-height:100vh;}
a{text-decoration:none;color:inherit;}
.topbar{
  background:var(--maroon);color:var(--white);
  display:flex;align-items:center;justify-content:space-between;
  padding:1rem 1.5rem;gap:1rem;flex-wrap:wrap;
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
.tb-copy span{font-size:.65rem;color:rgba(255,255,255,.65);letter-spacing:.12em;text-transform:uppercase;}
.tb-actions{display:flex;align-items:center;gap:.75rem;flex-wrap:wrap;}
.tb-link,.tb-button{
  font-size:.72rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;
  padding:.55rem .85rem;border-radius:4px;border:1px solid rgba(255,255,255,.16);
}
.tb-link{color:rgba(255,255,255,.82);}
.tb-link:hover{background:rgba(255,255,255,.1);color:var(--white);}
.tb-button{background:var(--gold);color:var(--maroonD);border-color:transparent;}
.tb-button:hover{background:var(--goldL);}

.shell{display:grid;grid-template-columns:280px 1fr;min-height:calc(100vh - 74px);}
.sidebar{
  background:var(--white);border-right:1px solid var(--border);
  padding:1.25rem 1rem;display:flex;flex-direction:column;gap:1rem;
}
.profile-card{
  background:linear-gradient(135deg,rgba(123,13,30,.98),rgba(92,9,22,.94));
  color:var(--white);border-radius:16px;padding:1rem;
  border:1px solid rgba(201,160,48,.24);
}
.avatar{
  width:56px;height:56px;border-radius:50%;
  display:flex;align-items:center;justify-content:center;
  background:var(--gold);color:var(--maroonD);
  font-family:'Cormorant Garamond',serif;font-size:1.4rem;font-weight:700;
  margin-bottom:.8rem;
}
.profile-card small{display:block;font-size:.62rem;color:rgba(255,255,255,.62);letter-spacing:.14em;text-transform:uppercase;margin-bottom:.4rem;}
.profile-card h2{font-size:1.05rem;line-height:1.2;margin-bottom:.25rem;}
.profile-card p{font-size:.73rem;color:rgba(255,255,255,.76);line-height:1.5;}
.profile-meta{margin-top:.95rem;padding-top:.95rem;border-top:1px solid rgba(255,255,255,.14);}
.profile-meta span{display:block;font-size:.69rem;color:rgba(255,255,255,.8);margin-top:.35rem;word-break:break-word;}
.side-section{
  border:1px solid var(--border);border-radius:14px;
  background:var(--cream);padding:1rem;
}
.side-section span{
  display:block;font-size:.62rem;letter-spacing:.14em;text-transform:uppercase;
  color:var(--muted);font-weight:700;margin-bottom:.55rem;
}
.side-section p{font-size:.74rem;color:var(--muted);line-height:1.6;}

.main{padding:1.5rem;}
.hero{
  background:linear-gradient(135deg,rgba(123,13,30,.95),rgba(92,9,22,.92));
  color:var(--white);border-radius:18px;padding:1.5rem;
  box-shadow:0 18px 30px rgba(123,13,30,.12);margin-bottom:1.2rem;
}
.hero small{display:block;font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.65);margin-bottom:.55rem;}
.hero h1{font-family:'Cormorant Garamond',serif;font-size:2.15rem;line-height:1;margin-bottom:.4rem;}
.hero p{font-size:.9rem;color:rgba(255,255,255,.75);max-width:760px;line-height:1.6;}
.hero-row{display:flex;align-items:flex-end;justify-content:space-between;gap:1rem;flex-wrap:wrap;}
.hero-badge{
  background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.16);border-radius:999px;
  padding:.5rem .9rem;font-size:.72rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;
}

.notice{
  margin-bottom:1rem;padding:.9rem 1rem;border-radius:10px;border:1px solid var(--border);
  background:var(--cream);font-size:.82rem;color:var(--muted);
}
.notice strong{color:var(--maroon);}
.notice.warn{background:#fff5ea;border-color:#f3d4aa;color:#8d4d00;}

.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;margin-bottom:1.2rem;}
.stat{
  background:var(--white);border:1px solid var(--border);border-radius:14px;padding:1rem;
}
.stat span{display:block;font-size:.68rem;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);margin-bottom:.4rem;}
.stat strong{display:block;font-family:'Cormorant Garamond',serif;font-size:1.8rem;color:var(--maroon);line-height:1.05;}
.stat small{display:block;font-size:.72rem;color:var(--muted);margin-top:.35rem;line-height:1.5;}

.grid{display:grid;grid-template-columns:1.15fr .85fr;gap:1rem;}
.panel{
  background:var(--white);border:1px solid var(--border);border-radius:16px;overflow:hidden;
}
.panel-head{
  padding:1rem 1.2rem;border-bottom:1px solid var(--border);
  display:flex;align-items:center;justify-content:space-between;gap:1rem;flex-wrap:wrap;
}
.panel-head span{display:block;font-size:.62rem;letter-spacing:.14em;text-transform:uppercase;color:var(--muted);font-weight:700;margin-bottom:.25rem;}
.panel-head h3{font-family:'Cormorant Garamond',serif;font-size:1.2rem;color:var(--maroon);}
.panel-body{padding:1.1rem 1.2rem;}

.announcement-list{display:flex;flex-direction:column;gap:.9rem;}
.announcement{
  border:1px solid var(--border);border-radius:12px;padding:1rem;background:var(--cream);
}
.announcement-top{display:flex;align-items:center;justify-content:space-between;gap:.75rem;flex-wrap:wrap;margin-bottom:.55rem;}
.announcement h4{font-size:.92rem;color:var(--ink);}
.announcement p{font-size:.77rem;color:var(--muted);line-height:1.6;}
.announcement-meta{display:flex;align-items:center;gap:.55rem;flex-wrap:wrap;font-size:.66rem;margin-bottom:.5rem;}
.badge{
  display:inline-flex;align-items:center;justify-content:center;
  padding:.24rem .55rem;border-radius:999px;font-size:.62rem;font-weight:700;
  letter-spacing:.08em;text-transform:uppercase;
}
.badge.academic{background:rgba(123,13,30,.08);color:var(--maroon);}
.badge.enrollment{background:rgba(15,29,86,.08);color:#0f1d56;}
.badge.finance{background:rgba(180,92,0,.1);color:var(--warn);}
.badge.event{background:rgba(31,122,52,.1);color:var(--ok);}
.badge.general{background:rgba(107,95,99,.12);color:var(--muted);}
.badge.audience{background:rgba(201,160,48,.12);color:#8a6717;}
.announcement-link{
  display:inline-block;margin-top:.7rem;font-size:.72rem;font-weight:700;
  letter-spacing:.06em;text-transform:uppercase;color:var(--maroon);
}
.announcement-link:hover{opacity:.72;}
.empty-state{
  border:1px dashed var(--border);border-radius:12px;padding:1rem;background:var(--cream);
  font-size:.78rem;color:var(--muted);line-height:1.6;
}

.resource-list{display:grid;gap:.85rem;}
.resource{
  border:1px solid var(--border);border-radius:12px;padding:1rem;background:var(--cream);
}
.resource h4{font-size:.88rem;color:var(--maroon);margin-bottom:.25rem;}
.resource p{font-size:.75rem;color:var(--muted);line-height:1.55;margin-bottom:.7rem;}
.resource a{
  display:inline-flex;align-items:center;gap:.35rem;
  font-size:.7rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--maroon);
}
.resource a:hover{opacity:.74;}

@media(max-width:1024px){
  .shell{grid-template-columns:1fr;}
  .sidebar{border-right:none;border-bottom:1px solid var(--border);}
  .stats{grid-template-columns:repeat(2,1fr);}
  .grid{grid-template-columns:1fr;}
}
@media(max-width:640px){
  .topbar{padding:1rem;}
  .main{padding:1rem;}
  .hero{padding:1.2rem;}
  .hero h1{font-size:1.8rem;}
  .stats{grid-template-columns:1fr;}
}
</style>
</head>
<body>
<div class="topbar">
  <div class="tb-brand">
    <div class="tb-seal">D</div>
    <div class="tb-copy">
      <strong>Datamex Faculty Portal</strong>
      <span>Connected Access</span>
    </div>
  </div>
  <div class="tb-actions">
    <a class="tb-link" href="../login.php?role=faculty&force=1">Switch Account</a>
    <a class="tb-link" href="../index.php">Main Website</a>
    <a class="tb-button" href="../logout.php">Sign Out</a>
  </div>
</div>

<div class="shell">
  <aside class="sidebar">
    <section class="profile-card">
      <div class="avatar"><?= faculty_e(faculty_initials($facultyName)) ?></div>
      <small>Faculty Account</small>
      <h2><?= faculty_e($facultyName) ?></h2>
      <p><?= faculty_e($positionTitle) ?></p>
      <div class="profile-meta">
        <span><?= faculty_e($departmentName) ?></span>
        <span>Faculty ID: <?= faculty_e($staffNumber) ?></span>
        <span><?= faculty_e($facultyEmail) ?></span>
      </div>
    </section>

    <section class="side-section">
      <span>Current Term</span>
      <p><?= faculty_e(faculty_term_label($currentTerm)) ?></p>
    </section>

    <section class="side-section">
      <span>Last Successful Login</span>
      <p><?= faculty_e(faculty_datetime($latestFacultyLogin)) ?></p>
    </section>
  </aside>

  <main class="main">
    <section class="hero">
      <div class="hero-row">
        <div>
          <small>Faculty Dashboard</small>
          <h1>Welcome back, <?= faculty_e($facultyName) ?>.</h1>
          <p>Your faculty portal is now connected to the shared Datamex login flow and loads live staff profile and announcement data from the portal database.</p>
        </div>
        <div class="hero-badge"><?= faculty_e(faculty_term_label($currentTerm)) ?></div>
      </div>
    </section>

    <?php if ($dashboardError !== ''): ?>
      <div class="notice warn"><strong>Portal notice:</strong> <?= faculty_e($dashboardError) ?></div>
    <?php endif; ?>

    <?php if (!empty($currentUser['must_change_password'])): ?>
      <div class="notice warn"><strong>Security reminder:</strong> This account is marked to change its password on the next maintenance pass. Contact the help desk if you need an immediate reset.</div>
    <?php endif; ?>

    <section class="stats">
      <article class="stat">
        <span>Department</span>
        <strong><?= faculty_e($departmentName) ?></strong>
        <small>Current assignment from the staff profile record.</small>
      </article>
      <article class="stat">
        <span>Position</span>
        <strong><?= faculty_e($positionTitle) ?></strong>
        <small>Live role information for this faculty account.</small>
      </article>
      <article class="stat">
        <span>Announcements</span>
        <strong><?= faculty_e((string) $facultyNoticeCount) ?></strong>
        <small>Visible notices for faculty and shared audiences.</small>
      </article>
      <article class="stat">
        <span>Account Status</span>
        <strong><?= faculty_e($accountStatus) ?></strong>
        <small>Session-protected access through the shared portal login.</small>
      </article>
    </section>

    <section class="grid">
      <div class="panel">
        <div class="panel-head">
          <div>
            <span>Announcements</span>
            <h3>Faculty and Shared Updates</h3>
          </div>
        </div>
        <div class="panel-body">
          <?php if (!$announcements): ?>
            <div class="empty-state">No faculty announcements are active yet. Once new items are published for faculty or all portal users, they will appear here automatically.</div>
          <?php else: ?>
            <div class="announcement-list">
              <?php foreach ($announcements as $announcement): ?>
                <?php $announcementLink = faculty_announcement_link($announcement['link_url'] ?? null); ?>
                <article class="announcement">
                  <div class="announcement-top">
                    <h4><?= faculty_e((string) ($announcement['title'] ?? 'Portal Update')) ?></h4>
                    <span><?= faculty_e(faculty_datetime((string) ($announcement['published_at'] ?? ''))) ?></span>
                  </div>
                  <div class="announcement-meta">
                    <span class="badge <?= faculty_e(faculty_category_class((string) ($announcement['category'] ?? 'general'))) ?>"><?= faculty_e((string) ($announcement['category'] ?? 'general')) ?></span>
                    <span class="badge audience"><?= faculty_e((string) ($announcement['audience_role'] ?? 'all')) ?></span>
                  </div>
                  <p><?= faculty_e((string) ($announcement['message'] ?? '')) ?></p>
                  <?php if ($announcementLink !== null): ?>
                    <a class="announcement-link" href="<?= faculty_e($announcementLink) ?>">Open linked page</a>
                  <?php endif; ?>
                </article>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="panel">
        <div class="panel-head">
          <div>
            <span>Quick Access</span>
            <h3>Faculty Links</h3>
          </div>
        </div>
        <div class="panel-body">
          <div class="resource-list">
            <?php foreach ($quickLinks as $link): ?>
              <article class="resource">
                <h4><?= faculty_e($link['label']) ?></h4>
                <p><?= faculty_e($link['description']) ?></p>
                <a href="<?= faculty_e($link['href']) ?>">Open link</a>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
  </main>
</div>
</body>
</html>
