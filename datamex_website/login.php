<?php
declare(strict_types=1);

require_once __DIR__ . '/config/portal_auth.php';

portal_session_start();

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$allowedRoles = ['student', 'faculty', 'admin'];
$tab = $_GET['role'] ?? 'student';
$tab = in_array($tab, $allowedRoles, true) ? $tab : 'student';
$forceLogin = !empty($_GET['force']);

$error = '';
$info = '';

if (!$forceLogin && !empty($_SESSION['portal_user_id'])) {
    $sessionRole = $_SESSION['portal_role'] ?? '';

    if ($sessionRole === 'student') {
        header('Location: student-portal.php');
        exit;
    }

    if ($sessionRole === 'faculty') {
        header('Location: faculty/faculty-portal.php');
        exit;
    }

    if ($sessionRole === 'admin') {
        header('Location: admin/admin-portal.php');
        exit;
    }
}

if (!empty($_GET['logged_out'])) {
    $info = 'You have been logged out of the portal.';
} elseif ($forceLogin) {
    if ($tab === 'student') {
        $info = 'Please sign in with a student account to open the student portal.';
    } elseif ($tab === 'faculty') {
        $info = 'Please sign in with a faculty account to open the faculty portal.';
    } elseif ($tab === 'admin') {
        $info = 'Please sign in with an admin account to open the admin dashboard.';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postedRole = $_POST['role'] ?? 'student';
    $tab = in_array($postedRole, $allowedRoles, true) ? $postedRole : 'student';
    $username = trim((string) ($_POST['username'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $error = 'Please enter both your ID and password.';
    } else {
        try {
            $pdo = portal_db();
            $user = portal_attempt_login($pdo, $tab, $username, $password);

            if ($user === null) {
                $error = 'Incorrect credentials. Please try again.';
            } elseif ($user['role'] === 'student') {
                portal_login_user($user);
                header('Location: student-portal.php');
                exit;
            } elseif ($user['role'] === 'faculty') {
                portal_login_user($user);
                header('Location: faculty/faculty-portal.php');
                exit;
            } elseif ($user['role'] === 'admin') {
                portal_login_user($user);
                header('Location: admin/admin-portal.php');
                exit;
            }
        } catch (Throwable $exception) {
            $error = 'The portal database is not responding right now. Please try again in a moment.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Login - Datamex College of Saint Adeline</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<style>
:root{
  --maroon:#7b0d1e;--maroonD:#5c0916;--maroonL:#96112a;
  --gold:#c9a030;--goldL:#e2bb55;--goldD:#a07820;
  --white:#ffffff;--cream:#faf8f5;--off:#f2efea;
  --ink:#1a1018;--muted:#6b5f63;--border:#e0d8d0;
}
*{margin:0;padding:0;box-sizing:border-box;}
html,body{height:100%;}
body{
  font-family:'Plus Jakarta Sans',sans-serif;
  background:var(--cream);
  color:var(--ink);
  display:flex;
  flex-direction:column;
  min-height:100vh;
}

.ph-banner{
  background:linear-gradient(135deg,#7a4f00,#a07820);
  display:flex;align-items:center;gap:.75rem;
  padding:.6rem 1.5rem;z-index:999;flex-shrink:0;
}
.ph-banner p{font-size:.7rem;color:rgba(255,255,255,.88);line-height:1.4;flex:1;}
.ph-banner p strong{color:var(--goldL);}
.ph-banner p code{background:rgba(0,0,0,.2);padding:.1rem .35rem;border-radius:3px;font-size:.65rem;color:#ffe09a;}
.ph-close{background:transparent;border:none;color:rgba(255,255,255,.55);font-size:.85rem;cursor:pointer;flex-shrink:0;padding:.2rem;transition:color .15s;}
.ph-close:hover{color:var(--white);}

.topbar{
  background:var(--maroon);
  height:58px;display:flex;align-items:center;
  justify-content:space-between;padding:0 2rem;
  box-shadow:0 2px 12px rgba(123,13,30,.3);
  flex-shrink:0;
}
.tb-brand{display:flex;align-items:center;gap:11px;text-decoration:none;}
.tb-seal{width:36px;height:36px;border-radius:50%;border:2px solid var(--gold);background:rgba(201,160,48,.12);display:flex;align-items:center;justify-content:center;font-family:'Cormorant Garamond',serif;font-size:1rem;font-weight:700;color:var(--gold);flex-shrink:0;}
.tb-name b{display:block;font-size:.82rem;font-weight:700;color:var(--white);}
.tb-name small{font-size:.55rem;color:rgba(255,255,255,.45);letter-spacing:.12em;text-transform:uppercase;}
.tb-back{font-size:.68rem;font-weight:600;color:rgba(255,255,255,.65);text-decoration:none;display:flex;align-items:center;gap:.4rem;padding:.35rem .8rem;border-radius:4px;border:1px solid rgba(255,255,255,.15);transition:all .15s;}
.tb-back:hover{color:var(--white);background:rgba(255,255,255,.1);}

.login-wrap{
  flex:1;display:grid;
  grid-template-columns:1fr 1fr;
  min-height:0;
}

.left-panel{
  background:var(--maroon);
  display:flex;flex-direction:column;
  justify-content:space-between;
  padding:3.5rem 3rem;
  position:relative;overflow:hidden;
}
.left-panel::after{
  content:'';position:absolute;
  right:-100px;bottom:-100px;
  width:500px;height:500px;border-radius:50%;
  border:1px solid rgba(201,160,48,.1);
  box-shadow:
    0 0 0 80px rgba(201,160,48,.035),
    0 0 0 160px rgba(201,160,48,.02),
    0 0 0 240px rgba(201,160,48,.01);
  pointer-events:none;
}
.left-panel::before{
  content:'';position:absolute;inset:0;
  background:radial-gradient(ellipse at 0% 100%,rgba(92,9,22,.55) 0%,transparent 55%);
}
.lp-content{position:relative;z-index:1;}
.lp-eyebrow{
  font-size:.6rem;letter-spacing:.2em;text-transform:uppercase;
  color:var(--gold);font-weight:600;margin-bottom:1rem;
  display:flex;align-items:center;gap:8px;
}
.lp-eyebrow::before{content:'';width:18px;height:1px;background:var(--gold);}
.lp-headline{
  font-family:'Cormorant Garamond',serif;
  font-size:clamp(2.2rem,3.5vw,3rem);
  font-weight:400;color:var(--white);
  line-height:1.1;margin-bottom:1.2rem;
}
.lp-headline em{font-style:italic;color:var(--goldL);display:block;}
.lp-desc{font-size:.83rem;color:rgba(255,255,255,.52);line-height:1.75;font-weight:300;max-width:380px;}
.lp-features{margin-top:2.5rem;display:flex;flex-direction:column;gap:.75rem;}
.lp-feat{display:flex;align-items:flex-start;gap:.85rem;}
.lf-icon{
  width:32px;height:32px;border-radius:6px;
  background:rgba(201,160,48,.12);border:1px solid rgba(201,160,48,.2);
  display:flex;align-items:center;justify-content:center;
  font-size:.85rem;flex-shrink:0;margin-top:1px;
}
.lf-text h4{font-size:.77rem;font-weight:700;color:var(--white);margin-bottom:1px;}
.lf-text p{font-size:.68rem;color:rgba(255,255,255,.45);line-height:1.4;}
.lp-bottom{position:relative;z-index:1;}
.lp-tagline{
  font-family:'Cormorant Garamond',serif;
  font-style:italic;font-size:.88rem;
  color:rgba(255,255,255,.35);
  border-top:1px solid rgba(255,255,255,.1);
  padding-top:.9rem;margin-top:2rem;
}

.right-panel{
  display:flex;align-items:center;justify-content:center;
  padding:2.5rem;background:var(--cream);
}
.login-card{width:100%;max-width:400px;}
.lc-top{text-align:center;margin-bottom:1.8rem;}
.lc-seal{
  width:60px;height:60px;border-radius:50%;
  background:linear-gradient(135deg,var(--maroon),var(--maroonL));
  border:2.5px solid var(--gold);
  display:flex;align-items:center;justify-content:center;
  font-family:'Cormorant Garamond',serif;
  font-size:1.5rem;font-weight:700;color:var(--gold);
  margin:0 auto .9rem;
}
.lc-title{
  font-family:'Cormorant Garamond',serif;
  font-size:1.4rem;font-weight:700;color:var(--maroon);
  margin-bottom:3px;
}
.lc-sub{font-size:.68rem;color:var(--muted);letter-spacing:.04em;}

.role-tabs{
  display:grid;grid-template-columns:1fr 1fr 1fr;
  gap:1px;background:var(--border);
  border:1px solid var(--border);border-radius:4px;
  overflow:hidden;margin-bottom:1.5rem;
}
.rtab{
  padding:.55rem .5rem;text-align:center;
  font-size:.68rem;font-weight:700;letter-spacing:.06em;
  text-transform:uppercase;background:var(--white);
  color:var(--muted);cursor:pointer;
  transition:all .15s;border:none;
  font-family:'Plus Jakarta Sans',sans-serif;
}
.rtab:hover{background:var(--off);color:var(--maroon);}
.rtab.on{background:var(--maroon);color:var(--white);}

.form-group{margin-bottom:1rem;}
.form-label{
  display:block;font-size:.62rem;font-weight:700;
  letter-spacing:.1em;text-transform:uppercase;
  color:var(--maroon);margin-bottom:.4rem;
}
.form-input{
  width:100%;background:var(--white);
  border:1.5px solid var(--border);border-radius:4px;
  padding:.68rem .9rem;font-size:.82rem;
  color:var(--ink);font-family:'Plus Jakarta Sans',sans-serif;
  outline:none;transition:border-color .15s,box-shadow .15s;
}
.form-input:focus{border-color:var(--maroon);box-shadow:0 0 0 3px rgba(123,13,30,.07);}
.form-input::placeholder{color:#bbb;}
.pw-wrap{position:relative;}
.pw-wrap .form-input{padding-right:2.5rem;}
.pw-toggle{
  position:absolute;right:.75rem;top:50%;transform:translateY(-50%);
  background:transparent;border:none;cursor:pointer;
  font-size:.85rem;color:var(--muted);padding:.2rem;
  transition:color .15s;
}
.pw-toggle:hover{color:var(--maroon);}
.form-row{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.2rem;}
.form-check{display:flex;align-items:center;gap:.5rem;font-size:.72rem;color:var(--muted);cursor:pointer;}
.form-check input{accent-color:var(--maroon);width:13px;height:13px;}
.forgot-link{font-size:.7rem;font-weight:700;color:var(--maroon);text-decoration:none;transition:opacity .15s;}
.forgot-link:hover{opacity:.7;}

.btn-submit{
  width:100%;background:var(--maroon);color:var(--white);
  font-weight:700;font-size:.75rem;letter-spacing:.12em;
  text-transform:uppercase;padding:.78rem;
  border:none;border-radius:4px;cursor:pointer;
  font-family:'Plus Jakarta Sans',sans-serif;
  transition:all .2s;
  display:flex;align-items:center;justify-content:center;gap:.5rem;
}
.btn-submit:hover{background:var(--maroonL);transform:translateY(-1px);box-shadow:0 4px 16px rgba(123,13,30,.25);}
.btn-submit:active{transform:translateY(0);}

.divider{
  display:flex;align-items:center;gap:.8rem;
  margin:1.2rem 0;font-size:.65rem;color:var(--muted);
}
.divider::before,.divider::after{content:'';flex:1;height:1px;background:var(--border);}
.help-row{text-align:center;font-size:.68rem;color:var(--muted);margin-top:1rem;}
.help-row a{color:var(--maroon);font-weight:700;text-decoration:none;}
.help-row a:hover{text-decoration:underline;}

.default-hint{
  background:rgba(201,160,48,.08);border:1px solid rgba(201,160,48,.25);
  border-radius:4px;padding:.65rem .85rem;margin-top:1rem;
}
.default-hint p{font-size:.67rem;color:var(--goldD);line-height:1.5;}
.default-hint strong{color:var(--maroon);}
.default-hint code{background:rgba(0,0,0,.07);padding:.1rem .35rem;border-radius:3px;font-size:.63rem;}

.error-box,.info-box{
  border-radius:4px;padding:.65rem .85rem;margin-bottom:1rem;
  font-size:.72rem;display:block;
}
.error-box{
  background:rgba(180,20,20,.07);
  border:1px solid rgba(180,20,20,.2);
  color:#b01010;
}
.info-box{
  background:rgba(123,13,30,.06);
  border:1px solid rgba(123,13,30,.12);
  color:var(--maroon);
}

footer{
  background:var(--white);border-top:1px solid var(--border);
  padding:.8rem 2rem;display:flex;
  align-items:center;justify-content:space-between;
  flex-wrap:wrap;gap:.5rem;flex-shrink:0;
}
footer p{font-size:.62rem;color:var(--muted);}
.foot-links a{font-size:.6rem;color:var(--muted);text-decoration:none;margin-left:1rem;transition:color .15s;}
.foot-links a:hover{color:var(--maroon);}

@media(max-width:768px){
  .login-wrap{grid-template-columns:1fr;}
  .left-panel{display:none;}
  .right-panel{padding:2rem 1.5rem;align-items:flex-start;padding-top:2.5rem;}
}
</style>
</head>
<body>

<div class="ph-banner" id="phBanner">
  <p>
    <strong>Portal login is live.</strong> Student, faculty, and admin accounts open their dashboards immediately.
  </p>
  <button class="ph-close" type="button" onclick="document.getElementById('phBanner').style.display='none'">x</button>
</div>

<div class="topbar">
  <a class="tb-brand" href="index.php">
    <div class="tb-seal">D</div>
    <div class="tb-name">
      <b>Datamex College</b>
      <small>of Saint Adeline</small>
    </div>
  </a>
  <a href="index.php" class="tb-back">&larr; Back to Website</a>
</div>

<div class="login-wrap">
  <div class="left-panel">
    <div class="lp-content">
      <div class="lp-eyebrow">Portal Access</div>
      <h1 class="lp-headline">Welcome back<br>to <em>Datamex.</em></h1>
      <p class="lp-desc">Your one-stop hub for enrollment, grades, payments, class schedules, and campus services.</p>

      <div class="lp-features">
        <div class="lp-feat">
          <div class="lf-icon">EN</div>
          <div class="lf-text">
            <h4>Online Enrollment</h4>
            <p>Manage your academic load and check upcoming registration periods.</p>
          </div>
        </div>
        <div class="lp-feat">
          <div class="lf-icon">GR</div>
          <div class="lf-text">
            <h4>Grades and Records</h4>
            <p>View term grades, current standing, and your latest academic summary.</p>
          </div>
        </div>
        <div class="lp-feat">
          <div class="lf-icon">BL</div>
          <div class="lf-text">
            <h4>Billing and Payments</h4>
            <p>Track assessed fees, balances, and due dates in one place.</p>
          </div>
        </div>
        <div class="lp-feat">
          <div class="lf-icon">NT</div>
          <div class="lf-text">
            <h4>Announcements</h4>
            <p>See important academic, finance, and enrollment reminders quickly.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="lp-bottom">
      <div class="lp-tagline">"Illuminating Minds, Transforming Lives." - Datamex College</div>
    </div>
  </div>

  <div class="right-panel">
    <div class="login-card">
      <div class="lc-top">
        <div class="lc-seal">D</div>
        <div class="lc-title">Portal Login</div>
        <div class="lc-sub">Datamex College of Saint Adeline</div>
      </div>

      <div class="role-tabs">
        <button class="rtab<?= $tab === 'student' ? ' on' : '' ?>" id="tab-student" type="button" onclick="setRole('student')">Student</button>
        <button class="rtab<?= $tab === 'faculty' ? ' on' : '' ?>" id="tab-faculty" type="button" onclick="setRole('faculty')">Faculty</button>
        <button class="rtab<?= $tab === 'admin' ? ' on' : '' ?>" id="tab-admin" type="button" onclick="setRole('admin')">Admin</button>
      </div>

      <?php if ($error !== ''): ?>
        <div class="error-box"><?= e($error) ?></div>
      <?php endif; ?>

      <?php if ($info !== ''): ?>
        <div class="info-box"><?= e($info) ?></div>
      <?php endif; ?>

      <form method="post" action="login.php" id="loginForm">
        <input type="hidden" name="role" id="roleInput" value="<?= e($tab) ?>"/>

        <div class="form-group">
          <label class="form-label" id="idLabel">Student ID</label>
          <input
            class="form-input"
            type="text"
            id="usernameInput"
            name="username"
            value="<?= e((string) ($_POST['username'] ?? '')) ?>"
            placeholder="e.g. 2024-01234"
            required
            autocomplete="username"
          />
        </div>

        <div class="form-group">
          <label class="form-label">Password</label>
          <div class="pw-wrap">
            <input
              class="form-input"
              type="password"
              id="passwordInput"
              name="password"
              placeholder="Enter your password"
              required
              autocomplete="current-password"
            />
            <button type="button" class="pw-toggle" onclick="togglePw()" id="pwToggle" title="Show or hide password">Show</button>
          </div>
        </div>

        <div class="form-row">
          <label class="form-check">
            <input type="checkbox" id="rememberMe" disabled/> Remember me
          </label>
          <a href="mailto:helpdesk@datamex.edu.ph?subject=Portal%20Password%20Reset" class="forgot-link">Forgot password?</a>
        </div>

        <button type="submit" class="btn-submit">
          <span>Login to Portal</span>
        </button>
      </form>

      <div class="divider">or</div>

      <div style="text-align:center;">
        <a href="index.php" style="display:inline-block;font-size:.7rem;font-weight:600;color:var(--muted);text-decoration:none;border:1.5px solid var(--border);padding:.5rem 1.2rem;border-radius:4px;transition:all .15s;" onmouseover="this.style.borderColor='var(--maroon)';this.style.color='var(--maroon)'" onmouseout="this.style.borderColor='var(--border)';this.style.color='var(--muted)'">&larr; Back to Main Website</a>
      </div>

      <div class="default-hint" id="hintBox">
        <p id="hintText">
          <strong>First time logging in?</strong><br>
          Default username: your <strong>Student ID</strong> (e.g. <code>2024-01234</code>)<br>
          Default password: your <strong>birthday</strong> in <code>MMDDYYYY</code> format.<br>
          Please change your password after your first login.
        </p>
      </div>

      <div class="help-row" style="margin-top:1.2rem;">
        Need help? Contact <a href="mailto:helpdesk@datamex.edu.ph">helpdesk@datamex.edu.ph</a> or call Local 105.
      </div>
    </div>
  </div>
</div>

<footer>
  <p>&copy; 2026 Datamex College of Saint Adeline - Portal Login - Secure Access</p>
  <div class="foot-links">
    <a href="index.php">Main Website</a>
    <a href="#">Privacy Policy</a>
    <a href="#">Terms of Use</a>
    <a href="mailto:helpdesk@datamex.edu.ph">IT Help Desk</a>
  </div>
</footer>

<script>
const labels = {
  student: {
    id: 'Student ID',
    ph: 'e.g. 2024-01234',
    hint: "<strong>First time logging in?</strong><br>Default username: your <strong>Student ID</strong> (e.g. <code>2024-01234</code>)<br>Default password: your <strong>birthday</strong> in <code>MMDDYYYY</code> format.<br>Please change your password after your first login."
  },
  faculty: {
    id: 'Faculty ID',
    ph: 'e.g. FAC-2024-001',
    hint: "<strong>Faculty sign-in:</strong><br>Use your assigned <strong>Faculty ID</strong> and portal password.<br>Your account will open the faculty portal after sign in."
  },
  admin: {
    id: 'Admin Username',
    ph: 'Enter admin username',
    hint: "<strong>Admin sign-in:</strong><br>Use your administrator username and password.<br>Your account will open the admin dashboard after sign in."
  }
};

function setRole(role) {
  document.querySelectorAll('.rtab').forEach((tabButton) => tabButton.classList.remove('on'));
  document.getElementById('tab-' + role).classList.add('on');
  document.getElementById('roleInput').value = role;
  document.getElementById('idLabel').textContent = labels[role].id;
  document.getElementById('usernameInput').placeholder = labels[role].ph;
  document.getElementById('hintText').innerHTML = labels[role].hint;
}

function togglePw() {
  const input = document.getElementById('passwordInput');
  const button = document.getElementById('pwToggle');

  if (input.type === 'password') {
    input.type = 'text';
    button.textContent = 'Hide';
  } else {
    input.type = 'password';
    button.textContent = 'Show';
  }
}

setRole('<?= e($tab) ?>');
</script>
</body>
</html>
