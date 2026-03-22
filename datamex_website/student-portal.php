<?php
declare(strict_types=1);

require_once __DIR__ . '/config/portal_auth.php';

portal_session_start();

if (empty($_SESSION['portal_user_id']) || (string) ($_SESSION['portal_role'] ?? '') !== 'student') {
    header('Location: login.php?role=student&force=1');
    exit;
}
// ============================================================
// PLACEHOLDER — Student Portal
// ============================================================
// This page is currently a front-end prototype only.
// To make it functional, connect it to your database and
// replace the $student array below with a real session/auth check.
//
// Example (once backend is ready):
//   session_start();
//   if (!isset($_SESSION['student_id'])) {
//       header('Location: login.php');
//       exit;
//   }
//   $student = getStudentFromDB($_SESSION['student_id']);
// ============================================================

$student = [
    'name'        => 'Juan Dela Cruz',
    'id'          => '2024-01234',
    'course'      => 'BS Information Technology',
    'year_level'  => '2nd Year',
    'section'     => 'BSIT-2A',
    'email'       => 'juan.delacruz@datamex.edu.ph',
    'avatar'      => 'JD',
    'gwa'         => '1.75',
    'units'       => '21',
    'balance'     => '4,250.00',
    'status'      => 'Enrolled',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Student Portal — Datamex College of Saint Adeline</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<style>
:root{
  --maroon:#7b0d1e;--maroonD:#5c0916;--maroonL:#96112a;
  --gold:#c9a030;--goldL:#e2bb55;--goldD:#a07820;
  --white:#ffffff;--cream:#faf8f5;--off:#f2efea;
  --ink:#1a1018;--muted:#6b5f63;--border:#e0d8d0;
  --sidebar:220px;
}
*{margin:0;padding:0;box-sizing:border-box;}
html{scroll-behavior:smooth;}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--off);color:var(--ink);display:flex;flex-direction:column;min-height:100vh;}

/* ══ PLACEHOLDER BANNER ══════════════════════════════════════ */
.ph-banner{
  background:linear-gradient(135deg,#7a4f00,#a07820);
  display:flex;align-items:center;gap:.85rem;
  padding:.75rem 1.5rem;
  position:relative;z-index:999;
}
.ph-banner .ph-icon{font-size:1rem;flex-shrink:0;}
.ph-banner p{font-size:.72rem;color:rgba(255,255,255,.9);line-height:1.45;flex:1;}
.ph-banner p strong{color:var(--goldL);}
.ph-banner p code{background:rgba(0,0,0,.2);padding:.1rem .4rem;border-radius:3px;font-size:.67rem;color:#ffe09a;}
.ph-close{background:transparent;border:none;color:rgba(255,255,255,.6);font-size:.9rem;cursor:pointer;flex-shrink:0;padding:.2rem;transition:color .15s;}
.ph-close:hover{color:var(--white);}

/* ══ TOP BAR ═════════════════════════════════════════════════ */
.topbar{
  background:var(--maroon);
  height:54px;display:flex;align-items:center;
  justify-content:space-between;padding:0 1.5rem;
  box-shadow:0 2px 12px rgba(123,13,30,.3);
  position:sticky;top:0;z-index:200;flex-shrink:0;
}
.tb-brand{display:flex;align-items:center;gap:10px;text-decoration:none;}
.tb-seal{width:32px;height:32px;border-radius:50%;border:1.5px solid var(--gold);background:rgba(201,160,48,.12);display:flex;align-items:center;justify-content:center;font-family:'Cormorant Garamond',serif;font-size:.9rem;font-weight:700;color:var(--gold);flex-shrink:0;}
.tb-name{font-size:.78rem;font-weight:700;color:var(--white);}
.tb-name small{display:block;font-size:.55rem;color:rgba(255,255,255,.45);letter-spacing:.1em;text-transform:uppercase;font-weight:400;}
.tb-right{display:flex;align-items:center;gap:.6rem;}
.tb-notif{
  width:34px;height:34px;border-radius:50%;
  background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);
  display:flex;align-items:center;justify-content:center;
  font-size:.9rem;cursor:pointer;transition:background .15s;position:relative;
}
.tb-notif:hover{background:rgba(255,255,255,.2);}
.notif-badge{
  position:absolute;top:-2px;right:-2px;
  width:14px;height:14px;border-radius:50%;
  background:var(--gold);color:var(--maroonD);
  font-size:.5rem;font-weight:700;
  display:flex;align-items:center;justify-content:center;
  border:1.5px solid var(--maroon);
}
.tb-user{display:flex;align-items:center;gap:.6rem;cursor:pointer;padding:.3rem .6rem;border-radius:4px;transition:background .15s;}
.tb-user:hover{background:rgba(255,255,255,.1);}
.tb-avatar{width:30px;height:30px;border-radius:50%;background:var(--gold);color:var(--maroonD);font-family:'Cormorant Garamond',serif;font-size:.85rem;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.tb-uname{font-size:.72rem;color:rgba(255,255,255,.85);font-weight:600;}
.tb-role{font-size:.55rem;color:rgba(255,255,255,.45);display:block;text-transform:uppercase;letter-spacing:.08em;}
.tb-logout{font-size:.68rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:.32rem .8rem;border-radius:3px;background:rgba(255,255,255,.12);color:rgba(255,255,255,.75);text-decoration:none;border:1px solid rgba(255,255,255,.15);transition:all .15s;}
.tb-logout:hover{background:rgba(255,255,255,.2);color:var(--white);}

/* ══ LAYOUT ══════════════════════════════════════════════════ */
.portal-wrap{display:flex;flex:1;min-height:0;}

/* ══ SIDEBAR ════════════════════════════════════════════════ */
.sidebar{
  width:var(--sidebar);flex-shrink:0;
  background:var(--white);
  border-right:1px solid var(--border);
  display:flex;flex-direction:column;
  position:sticky;top:54px;
  height:calc(100vh - 54px);overflow-y:auto;
}
.sb-student{
  padding:1.2rem 1.1rem;
  background:var(--maroon);
  border-bottom:2px solid var(--gold);
  text-align:center;
}
.sb-avatar{
  width:52px;height:52px;border-radius:50%;
  background:var(--gold);color:var(--maroonD);
  font-family:'Cormorant Garamond',serif;
  font-size:1.4rem;font-weight:700;
  display:flex;align-items:center;justify-content:center;
  margin:0 auto .7rem;border:2px solid rgba(255,255,255,.3);
}
.sb-sname{font-size:.82rem;font-weight:700;color:var(--white);line-height:1.2;margin-bottom:2px;}
.sb-sid{font-size:.6rem;color:var(--goldL);letter-spacing:.06em;margin-bottom:.3rem;}
.sb-course{font-size:.62rem;color:rgba(255,255,255,.5);line-height:1.3;}
.sb-status{display:inline-block;margin-top:.5rem;font-size:.55rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:.18rem .55rem;border-radius:10px;background:rgba(201,160,48,.2);color:var(--goldL);border:1px solid rgba(201,160,48,.3);}

/* Nav items */
.sb-nav{padding:.6rem 0;flex:1;}
.sb-section{font-size:.55rem;letter-spacing:.18em;text-transform:uppercase;color:var(--muted);font-weight:700;padding:.6rem 1.1rem .3rem;margin-top:.4rem;}
.sb-item{
  display:flex;align-items:center;gap:.7rem;
  padding:.55rem 1.1rem;
  font-size:.74rem;font-weight:500;color:var(--muted);
  text-decoration:none;transition:all .15s;
  border-left:3px solid transparent;
  position:relative;
}
.sb-item:hover{background:var(--off);color:var(--maroon);border-left-color:rgba(123,13,30,.2);}
.sb-item.active{background:#fdf5f6;color:var(--maroon);font-weight:700;border-left-color:var(--gold);}
.sb-item .si-icon{font-size:.95rem;width:18px;text-align:center;flex-shrink:0;}
.sb-badge{margin-left:auto;font-size:.55rem;font-weight:700;padding:.1rem .45rem;border-radius:10px;background:var(--maroon);color:var(--white);}
.sb-badge.gold{background:var(--gold);color:var(--maroonD);}

/* ══ MAIN CONTENT ════════════════════════════════════════════ */
.portal-main{flex:1;overflow-x:hidden;padding:1.8rem 2rem;min-width:0;}

/* Page title row */
.page-row{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;flex-wrap:wrap;gap:.8rem;}
.page-title{font-family:'Cormorant Garamond',serif;font-size:1.5rem;font-weight:700;color:var(--maroon);}
.page-sub{font-size:.7rem;color:var(--muted);margin-top:2px;}
.sem-tag{font-size:.62rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;padding:.3rem .8rem;border-radius:3px;background:rgba(123,13,30,.08);color:var(--maroon);border:1px solid var(--border);}

/* ══ STAT CARDS ══════════════════════════════════════════════ */
.stat-row{display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:var(--border);border:1px solid var(--border);border-radius:4px;overflow:hidden;margin-bottom:1.5rem;}
.stat-card{background:var(--white);padding:1.1rem 1.2rem;transition:background .15s;}
.stat-card:hover{background:var(--cream);}
.sc-label{font-size:.58rem;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);font-weight:700;margin-bottom:.4rem;}
.sc-val{font-family:'Cormorant Garamond',serif;font-size:1.9rem;font-weight:700;color:var(--maroon);line-height:1;}
.sc-val.green{color:#1a6b20;}
.sc-val.gold{color:var(--goldD);}
.sc-val.red{color:#c02020;}
.sc-sub{font-size:.62rem;color:var(--muted);margin-top:3px;}

/* ══ TWO-COL GRID ════════════════════════════════════════════ */
.two-col{display:grid;grid-template-columns:1fr 300px;gap:1.2rem;margin-bottom:1.2rem;}
.three-col{display:grid;grid-template-columns:repeat(3,1fr);gap:1.2rem;margin-bottom:1.2rem;}

/* ══ CARD ════════════════════════════════════════════════════ */
.card{background:var(--white);border:1px solid var(--border);border-radius:4px;overflow:hidden;}
.card-head{padding:.9rem 1.2rem;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;}
.card-head h3{font-family:'Cormorant Garamond',serif;font-size:1rem;font-weight:700;color:var(--maroon);}
.card-head .ch-label{font-size:.57rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);font-weight:700;}
.card-head .ch-link{font-size:.63rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--maroon);text-decoration:none;border-bottom:1px solid var(--gold);padding-bottom:1px;transition:opacity .15s;}
.card-head .ch-link:hover{opacity:.7;}
.card-body{padding:1.1rem 1.2rem;}

/* ══ SCHEDULE TABLE ══════════════════════════════════════════ */
.sched-table{width:100%;border-collapse:collapse;font-size:.76rem;}
.sched-table th{text-align:left;font-size:.57rem;letter-spacing:.12em;text-transform:uppercase;font-weight:700;color:var(--muted);padding:.5rem .8rem;background:var(--off);border-bottom:1px solid var(--border);}
.sched-table td{padding:.65rem .8rem;border-bottom:1px solid var(--border);vertical-align:middle;}
.sched-table tr:last-child td{border-bottom:none;}
.sched-table tr:hover td{background:var(--cream);}
.subj-code{font-size:.63rem;font-weight:700;color:var(--gold);display:block;}
.subj-name{font-weight:600;color:var(--ink);}
.time-chip{display:inline-block;background:rgba(123,13,30,.07);color:var(--maroon);font-size:.62rem;font-weight:600;padding:.15rem .5rem;border-radius:3px;}
.day-chip{font-size:.62rem;font-weight:600;color:var(--muted);}

/* ══ GRADES TABLE ════════════════════════════════════════════ */
.grade-table{width:100%;border-collapse:collapse;font-size:.76rem;}
.grade-table th{text-align:left;font-size:.57rem;letter-spacing:.12em;text-transform:uppercase;font-weight:700;color:var(--muted);padding:.5rem .8rem;background:var(--off);border-bottom:1px solid var(--border);}
.grade-table td{padding:.65rem .8rem;border-bottom:1px solid var(--border);}
.grade-table tr:last-child td{border-bottom:none;}
.grade-table tr:hover td{background:var(--cream);}
.grade-val{font-family:'Cormorant Garamond',serif;font-size:1.1rem;font-weight:700;}
.gv-pass{color:#1a6b20;}
.gv-inc{color:#c07000;}
.gv-ph{color:var(--muted);font-style:italic;font-size:.72rem;}
.grade-bar-wrap{width:80px;background:var(--off);border-radius:10px;height:5px;overflow:hidden;}
.grade-bar{height:100%;border-radius:10px;background:var(--maroon);}
.remarks{font-size:.6rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;}
.r-pass{color:#1a6b20;}
.r-inc{color:#c07000;}
.r-ph{color:var(--muted);}

/* ══ NOTICE LIST ═════════════════════════════════════════════ */
.notice-list{display:flex;flex-direction:column;}
.notice-item{display:flex;gap:.8rem;align-items:flex-start;padding:.75rem 0;border-bottom:1px solid var(--border);}
.notice-item:last-child{border-bottom:none;}
.ni-dot{width:6px;height:6px;border-radius:50%;background:var(--gold);flex-shrink:0;margin-top:5px;}
.ni-dot.urgent{background:var(--maroon);}
.ni-body h5{font-size:.77rem;font-weight:600;color:var(--ink);margin-bottom:1px;}
.ni-body p{font-size:.67rem;color:var(--muted);}
.ni-tag{display:inline-block;font-size:.55rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;padding:.12rem .4rem;border-radius:2px;margin-top:3px;}
.nt-a{background:rgba(123,13,30,.08);color:var(--maroon);}
.nt-f{background:rgba(180,40,40,.08);color:#b02020;}
.nt-e{background:rgba(201,160,48,.1);color:var(--goldD);}
.nt-r{background:rgba(15,29,86,.07);color:#0f1d56;}

/* ══ QUICK ACTIONS ═══════════════════════════════════════════ */
.qa-grid{display:grid;grid-template-columns:1fr 1fr;gap:1px;background:var(--border);border:1px solid var(--border);border-radius:4px;overflow:hidden;}
.qa-btn{
  background:var(--white);padding:1rem;
  display:flex;flex-direction:column;align-items:center;
  gap:.45rem;text-decoration:none;color:inherit;
  transition:all .15s;border-bottom:2px solid transparent;
  text-align:center;
}
.qa-btn:hover{background:var(--maroon);border-bottom-color:var(--gold);}
.qa-btn:hover .qa-icon{background:rgba(255,255,255,.15);}
.qa-btn:hover .qa-label{color:var(--white);}
.qa-btn:hover .qa-sub{color:rgba(255,255,255,.5);}
.qa-icon{width:36px;height:36px;border-radius:8px;background:rgba(123,13,30,.07);display:flex;align-items:center;justify-content:center;font-size:1rem;transition:background .15s;}
.qa-label{font-size:.71rem;font-weight:700;color:var(--maroon);transition:color .15s;}
.qa-sub{font-size:.6rem;color:var(--muted);transition:color .15s;}

/* ══ PROGRESS BAR ════════════════════════════════════════════ */
.prog-row{display:flex;align-items:center;gap:.8rem;margin-bottom:.9rem;}
.prog-row:last-child{margin-bottom:0;}
.prog-label{font-size:.72rem;font-weight:600;color:var(--ink);min-width:90px;}
.prog-bar-wrap{flex:1;height:6px;background:var(--off);border-radius:10px;overflow:hidden;}
.prog-bar{height:100%;border-radius:10px;background:linear-gradient(to right,var(--maroon),var(--maroonL));}
.prog-val{font-size:.68rem;font-weight:700;color:var(--maroon);min-width:32px;text-align:right;}

/* ══ BILLING TABLE ════════════════════════════════════════════ */
.billing-table{width:100%;border-collapse:collapse;font-size:.76rem;}
.billing-table th{font-size:.57rem;letter-spacing:.12em;text-transform:uppercase;font-weight:700;color:var(--muted);padding:.5rem .8rem;background:var(--off);border-bottom:1px solid var(--border);text-align:left;}
.billing-table td{padding:.6rem .8rem;border-bottom:1px solid var(--border);}
.billing-table tr:last-child td{border-bottom:none;}
.billing-table .amount{font-family:'Cormorant Garamond',serif;font-size:1rem;font-weight:700;color:var(--maroon);}
.billing-table .paid{color:#1a6b20;}
.billing-table .due{color:#c02020;}
.billing-total{display:flex;justify-content:space-between;align-items:center;padding:.7rem .8rem;background:rgba(123,13,30,.04);border-top:1px solid var(--border);border-radius:0 0 4px 4px;margin-top:-1px;}
.bt-label{font-size:.62rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--maroon);}
.bt-val{font-family:'Cormorant Garamond',serif;font-size:1.2rem;font-weight:700;color:#c02020;}
.pay-btn{background:var(--maroon);color:var(--white);border:none;padding:.45rem 1rem;border-radius:3px;font-size:.67rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;cursor:pointer;font-family:'Plus Jakarta Sans',sans-serif;transition:background .15s;margin-top:.7rem;width:100%;}
.pay-btn:hover{background:var(--maroonL);}

/* ══ FOOTER ══════════════════════════════════════════════════ */
.portal-footer{background:var(--white);border-top:1px solid var(--border);padding:.8rem 2rem;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.5rem;}
.portal-footer p{font-size:.62rem;color:var(--muted);}
.portal-footer a{font-size:.6rem;color:var(--muted);text-decoration:none;margin-left:1rem;transition:color .15s;}
.portal-footer a:hover{color:var(--maroon);}

/* ══ PLACEHOLDER SECTION STYLE ══════════════════════════════ */
.ph-section{
  background:repeating-linear-gradient(
    45deg,
    rgba(201,160,48,.03),
    rgba(201,160,48,.03) 8px,
    transparent 8px,
    transparent 16px
  );
  border:1px dashed rgba(201,160,48,.35);
  border-radius:4px;
  padding:1.2rem;
  display:flex;align-items:center;gap:.8rem;
  margin-bottom:1.2rem;
}
.ph-section .ps-icon{font-size:1.2rem;flex-shrink:0;}
.ph-section p{font-size:.72rem;color:var(--goldD);line-height:1.5;}
.ph-section strong{color:var(--maroon);}

@media(max-width:900px){
  .sidebar{display:none;}
  .two-col,.three-col{grid-template-columns:1fr;}
  .stat-row{grid-template-columns:1fr 1fr;}
  .qa-grid{grid-template-columns:repeat(4,1fr);}
}
</style>
</head>
<body>

<!-- ══ PLACEHOLDER BANNER ════════════════════════════════════ -->
<div class="ph-banner" id="phBanner">
  <span class="ph-icon">🚧</span>
  <p>
    <strong>Placeholder Mode — Student Portal</strong> &nbsp;·&nbsp;
    This dashboard is currently using <strong>hardcoded dummy data</strong> for UI preview only.
    To make it functional, connect to your database and replace the <code>$student</code> array at the top of
    <code>student-portal.php</code> with real session authentication and database queries.
    The Communications Office and IT team should coordinate on backend integration.
  </p>
  <button class="ph-close" onclick="document.getElementById('phBanner').style.display='none'">✕</button>
</div>

<!-- ══ TOP BAR ════════════════════════════════════════════════ -->
<div class="topbar">
  <a class="tb-brand" href="index.php">
    <div class="tb-seal">D</div>
    <div>
      <div class="tb-name">Datamex College<small>of Saint Adeline</small></div>
    </div>
  </a>
  <div class="tb-right">
    <div class="tb-notif">
      🔔
      <div class="notif-badge">3</div>
    </div>
    <div class="tb-user">
      <div class="tb-avatar"><?= htmlspecialchars($student['avatar']) ?></div>
      <div>
        <div class="tb-uname"><?= htmlspecialchars($student['name']) ?></div>
        <span class="tb-role">Student</span>
      </div>
    </div>
    <a href="login.php" class="tb-logout">Log Out</a>
  </div>
</div>

<!-- ══ MAIN WRAP ══════════════════════════════════════════════ -->
<div class="portal-wrap">

  <!-- ══ SIDEBAR ════════════════════════════════════════════ -->
  <aside class="sidebar">
    <div class="sb-student">
      <div class="sb-avatar"><?= htmlspecialchars($student['avatar']) ?></div>
      <div class="sb-sname"><?= htmlspecialchars($student['name']) ?></div>
      <div class="sb-sid"><?= htmlspecialchars($student['id']) ?></div>
      <div class="sb-course"><?= htmlspecialchars($student['course']) ?><br><?= htmlspecialchars($student['year_level']) ?> · <?= htmlspecialchars($student['section']) ?></div>
      <span class="sb-status"><?= htmlspecialchars($student['status']) ?></span>
    </div>

    <nav class="sb-nav">
      <div class="sb-section">Main</div>
      <a href="#dashboard" class="sb-item active"><span class="si-icon">🏠</span>Dashboard</a>
      <a href="#schedule" class="sb-item"><span class="si-icon">🗓️</span>My Schedule</a>
      <a href="#grades" class="sb-item"><span class="si-icon">📊</span>Grades <span class="sb-badge">New</span></a>

      <div class="sb-section">Services</div>
      <a href="#enrollment" class="sb-item"><span class="si-icon">📋</span>Enrollment<span class="sb-badge gold">Open</span></a>
      <a href="#billing" class="sb-item"><span class="si-icon">💰</span>Billing &amp; Fees</a>
      <a href="#" class="sb-item"><span class="si-icon">📁</span>Request Forms</a>
      <a href="#" class="sb-item"><span class="si-icon">📚</span>Library</a>

      <div class="sb-section">Campus</div>
      <a href="#" class="sb-item"><span class="si-icon">📢</span>Announcements<span class="sb-badge">3</span></a>
      <a href="#" class="sb-item"><span class="si-icon">📅</span>Events</a>
      <a href="#" class="sb-item"><span class="si-icon">🏥</span>Clinic / Health</a>

      <div class="sb-section">Account</div>
      <a href="#" class="sb-item"><span class="si-icon">👤</span>My Profile</a>
      <a href="#" class="sb-item"><span class="si-icon">🔒</span>Change Password</a>
      <a href="index.php" class="sb-item"><span class="si-icon">↩️</span>Back to Website</a>
    </nav>
  </aside>

  <!-- ══ PORTAL MAIN ════════════════════════════════════════ -->
  <main class="portal-main">

    <!-- Page Title -->
    <div class="page-row" id="dashboard">
      <div>
        <div class="page-title">Good morning, <?= explode(' ', $student['name'])[0] ?>! 👋</div>
        <div class="page-sub">Here's your academic overview for today — <?= date('l, F j, Y') ?></div>
      </div>
      <span class="sem-tag">2nd Semester · AY 2025–2026</span>
    </div>

    <!-- Placeholder note for this section -->
    <div class="ph-section">
      <span class="ps-icon">📌</span>
      <p><strong>Data shown below is placeholder / demo content.</strong> Replace with live database queries once backend authentication is connected. Student data is currently sourced from the hardcoded <code>$student</code> array in <code>student-portal.php</code>.</p>
    </div>

    <!-- STAT CARDS -->
    <div class="stat-row">
      <div class="stat-card">
        <div class="sc-label">Current GWA</div>
        <div class="sc-val green"><?= $student['gwa'] ?></div>
        <div class="sc-sub">2nd Semester · Good Standing</div>
      </div>
      <div class="stat-card">
        <div class="sc-label">Units Enrolled</div>
        <div class="sc-val"><?= $student['units'] ?></div>
        <div class="sc-sub">6 subjects this semester</div>
      </div>
      <div class="stat-card">
        <div class="sc-label">Balance Due</div>
        <div class="sc-val red">₱<?= $student['balance'] ?></div>
        <div class="sc-sub">Due: April 5, 2026</div>
      </div>
      <div class="stat-card">
        <div class="sc-label">Attendance</div>
        <div class="sc-val gold">94%</div>
        <div class="sc-sub">Above 80% threshold</div>
      </div>
    </div>

    <!-- SCHEDULE + QUICK ACTIONS -->
    <div class="two-col" id="schedule">
      <div class="card">
        <div class="card-head">
          <div><span class="ch-label">This Semester</span><h3>Class Schedule</h3></div>
          <a href="#" class="ch-link">Full Schedule →</a>
        </div>
        <div class="card-body" style="padding:0;">
          <table class="sched-table">
            <thead>
              <tr><th>Subject</th><th>Schedule</th><th>Room</th><th>Faculty</th></tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="subj-code">IT 201</span><span class="subj-name">Data Structures &amp; Algorithms</span></td>
                <td><span class="time-chip">7:30–9:00 AM</span><br><span class="day-chip">Mon · Wed · Fri</span></td>
                <td>CL-3</td><td>Prof. Flores</td>
              </tr>
              <tr>
                <td><span class="subj-code">IT 202</span><span class="subj-name">Web Development 2</span></td>
                <td><span class="time-chip">9:00–10:30 AM</span><br><span class="day-chip">Mon · Wed · Fri</span></td>
                <td>CL-1</td><td>Prof. Santos</td>
              </tr>
              <tr>
                <td><span class="subj-code">IT 203</span><span class="subj-name">Database Management Systems</span></td>
                <td><span class="time-chip">1:00–2:30 PM</span><br><span class="day-chip">Tue · Thu</span></td>
                <td>CL-2</td><td>Dr. Lozano</td>
              </tr>
              <tr>
                <td><span class="subj-code">GE 101</span><span class="subj-name">Mathematics in the Modern World</span></td>
                <td><span class="time-chip">10:30 AM–12:00 PM</span><br><span class="day-chip">Tue · Thu</span></td>
                <td>Rm 205</td><td>Prof. Reyes</td>
              </tr>
              <tr>
                <td><span class="subj-code">NSTP 2</span><span class="subj-name">National Service Training Program 2</span></td>
                <td><span class="time-chip">3:00–5:00 PM</span><br><span class="day-chip">Saturday</span></td>
                <td>Rm 101</td><td>Prof. Cruz</td>
              </tr>
              <tr>
                <td><span class="subj-code">PE 2</span><span class="subj-name">Physical Education 2</span></td>
                <td><span class="time-chip">2:30–4:00 PM</span><br><span class="day-chip">Mon · Wed</span></td>
                <td>Gym</td><td>Coach Rivera</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div style="display:flex;flex-direction:column;gap:1.2rem;">
        <!-- Quick Actions -->
        <div class="card">
          <div class="card-head">
            <div><span class="ch-label">Shortcuts</span><h3>Quick Actions</h3></div>
          </div>
          <div class="card-body" style="padding:0;">
            <div class="qa-grid">
              <a href="#enrollment" class="qa-btn">
                <div class="qa-icon">📋</div>
                <div class="qa-label">Enroll</div>
                <div class="qa-sub">1st Sem open</div>
              </a>
              <a href="#grades" class="qa-btn">
                <div class="qa-icon">📊</div>
                <div class="qa-label">Grades</div>
                <div class="qa-sub">View grades</div>
              </a>
              <a href="#billing" class="qa-btn">
                <div class="qa-icon">💰</div>
                <div class="qa-label">Pay Fees</div>
                <div class="qa-sub">Balance due</div>
              </a>
              <a href="#" class="qa-btn">
                <div class="qa-icon">📁</div>
                <div class="qa-label">Request</div>
                <div class="qa-sub">Forms &amp; docs</div>
              </a>
              <a href="#" class="qa-btn">
                <div class="qa-icon">📚</div>
                <div class="qa-label">Library</div>
                <div class="qa-sub">E-resources</div>
              </a>
              <a href="#" class="qa-btn">
                <div class="qa-icon">🏥</div>
                <div class="qa-label">Clinic</div>
                <div class="qa-sub">Health records</div>
              </a>
              <a href="#" class="qa-btn">
                <div class="qa-icon">📢</div>
                <div class="qa-label">Notices</div>
                <div class="qa-sub">3 unread</div>
              </a>
              <a href="#" class="qa-btn">
                <div class="qa-icon">👤</div>
                <div class="qa-label">Profile</div>
                <div class="qa-sub">My account</div>
              </a>
            </div>
          </div>
        </div>

        <!-- Announcements -->
        <div class="card">
          <div class="card-head">
            <div><span class="ch-label">Latest</span><h3>Announcements</h3></div>
            <a href="news.html" class="ch-link">All →</a>
          </div>
          <div class="card-body">
            <div class="notice-list">
              <div class="notice-item">
                <div class="ni-dot urgent"></div>
                <div class="ni-body">
                  <h5>Tuition Balance Deadline: April 5</h5>
                  <p>Settle outstanding balance to avoid enrollment hold.</p>
                  <span class="ni-tag nt-f">Finance · Urgent</span>
                </div>
              </div>
              <div class="notice-item">
                <div class="ni-dot"></div>
                <div class="ni-body">
                  <h5>1st Sem AY 2026–2027 Enrollment Now Open</h5>
                  <p>Proceed via portal after advising with your faculty adviser.</p>
                  <span class="ni-tag nt-a">Enrollment</span>
                </div>
              </div>
              <div class="notice-item">
                <div class="ni-dot"></div>
                <div class="ni-body">
                  <h5>Final Exam Schedule Released</h5>
                  <p>Check your department board or the Registrar portal section.</p>
                  <span class="ni-tag nt-r">Academic</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- GRADES + ACADEMIC PROGRESS -->
    <div class="two-col" id="grades">
      <div class="card">
        <div class="card-head">
          <div><span class="ch-label">2nd Semester AY 2025–2026</span><h3>Grades</h3></div>
          <a href="#" class="ch-link">Request TOR →</a>
        </div>
        <div class="card-body" style="padding:0;">
          <div class="ph-section" style="margin:.8rem;border-radius:3px;">
            <span class="ps-icon">📌</span>
            <p><strong>Placeholder grades below.</strong> Connect to the grading module in your database to show live grades per subject per student.</p>
          </div>
          <table class="grade-table">
            <thead>
              <tr><th>Subject</th><th>Midterm</th><th>Final</th><th>Grade</th><th>Remarks</th></tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="subj-code">IT 201</span>Data Structures</td>
                <td>88</td><td>–</td>
                <td><span class="grade-val gv-ph">–</span></td>
                <td><span class="remarks r-ph">In Progress</span></td>
              </tr>
              <tr>
                <td><span class="subj-code">IT 202</span>Web Development 2</td>
                <td>92</td><td>–</td>
                <td><span class="grade-val gv-ph">–</span></td>
                <td><span class="remarks r-ph">In Progress</span></td>
              </tr>
              <tr>
                <td><span class="subj-code">IT 203</span>Database Management</td>
                <td>85</td><td>–</td>
                <td><span class="grade-val gv-ph">–</span></td>
                <td><span class="remarks r-ph">In Progress</span></td>
              </tr>
              <tr>
                <td><span class="subj-code">GE 101</span>Math in Modern World</td>
                <td>79</td><td>–</td>
                <td><span class="grade-val gv-ph">–</span></td>
                <td><span class="remarks r-ph">In Progress</span></td>
              </tr>
              <tr>
                <td><span class="subj-code">IT 101</span>Programming 1 (1st Sem)</td>
                <td>90</td><td>88</td>
                <td><span class="grade-val gv-pass">1.50</span></td>
                <td><span class="remarks r-pass">Passed</span></td>
              </tr>
              <tr>
                <td><span class="subj-code">IT 102</span>Computer Fundamentals (1st Sem)</td>
                <td>87</td><td>91</td>
                <td><span class="grade-val gv-pass">1.25</span></td>
                <td><span class="remarks r-pass">Passed</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div style="display:flex;flex-direction:column;gap:1.2rem;">
        <!-- Academic progress -->
        <div class="card">
          <div class="card-head">
            <div><span class="ch-label">BSIT Program</span><h3>Academic Progress</h3></div>
          </div>
          <div class="card-body">
            <div class="ph-section" style="margin-bottom:1rem;border-radius:3px;">
              <span class="ps-icon">📌</span>
              <p>Placeholder progress — connect to curriculum checklist in database.</p>
            </div>
            <div class="prog-row">
              <div class="prog-label">Units Earned</div>
              <div class="prog-bar-wrap"><div class="prog-bar" style="width:30%"></div></div>
              <div class="prog-val">42/140</div>
            </div>
            <div class="prog-row">
              <div class="prog-label">Attendance</div>
              <div class="prog-bar-wrap"><div class="prog-bar" style="width:94%"></div></div>
              <div class="prog-val">94%</div>
            </div>
            <div class="prog-row">
              <div class="prog-label">Subjects Done</div>
              <div class="prog-bar-wrap"><div class="prog-bar" style="width:22%"></div></div>
              <div class="prog-val">12/54</div>
            </div>
            <div class="prog-row">
              <div class="prog-label">Year Level</div>
              <div class="prog-bar-wrap"><div class="prog-bar" style="width:25%"></div></div>
              <div class="prog-val">2nd / 4th</div>
            </div>
          </div>
        </div>

        <!-- Enrollment status -->
        <div class="card" id="enrollment">
          <div class="card-head">
            <div><span class="ch-label">1st Sem AY 2026–2027</span><h3>Enrollment Status</h3></div>
          </div>
          <div class="card-body">
            <div style="text-align:center;padding:.5rem 0 1rem;">
              <div style="font-size:2rem;margin-bottom:.5rem;">📋</div>
              <div style="font-family:'Cormorant Garamond',serif;font-size:1.05rem;font-weight:700;color:var(--maroon);margin-bottom:.3rem;">Enrollment is Open</div>
              <div style="font-size:.72rem;color:var(--muted);line-height:1.5;margin-bottom:1rem;">Coordinate with your academic adviser before proceeding. Have your Student ID and advising slip ready.</div>
              <a href="admissions.html" style="display:block;text-align:center;background:var(--maroon);color:var(--white);font-size:.68rem;font-weight:700;letter-spacing:.09em;text-transform:uppercase;padding:.6rem;border-radius:3px;text-decoration:none;transition:background .15s;" onmouseover="this.style.background='#96112a'" onmouseout="this.style.background='var(--maroon)'">Proceed to Enrollment</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- BILLING -->
    <div class="card" id="billing" style="margin-bottom:1.2rem;">
      <div class="card-head">
        <div><span class="ch-label">2nd Semester AY 2025–2026</span><h3>Billing &amp; Fees</h3></div>
        <a href="#" class="ch-link">Download SOA →</a>
      </div>
      <div class="card-body" style="padding:0;">
        <div class="ph-section" style="margin:.8rem;border-radius:3px;">
          <span class="ps-icon">📌</span>
          <p><strong>Placeholder billing data.</strong> Connect to your finance module to pull live tuition assessments and payment records per student.</p>
        </div>
        <table class="billing-table">
          <thead>
            <tr><th>Description</th><th>Amount</th><th>Status</th><th>Due Date</th></tr>
          </thead>
          <tbody>
            <tr><td>Tuition (21 units × ₱175)</td><td class="amount">₱3,675.00</td><td class="paid">✓ Paid</td><td>Jun 15, 2025</td></tr>
            <tr><td>Miscellaneous Fees</td><td class="amount">₱2,500.00</td><td class="paid">✓ Paid</td><td>Jun 15, 2025</td></tr>
            <tr><td>Laboratory Fee</td><td class="amount">₱1,200.00</td><td class="paid">✓ Paid</td><td>Jun 15, 2025</td></tr>
            <tr><td>2nd Installment (25%)</td><td class="amount">₱2,843.75</td><td class="paid">✓ Paid</td><td>Sep 1, 2025</td></tr>
            <tr><td>3rd Installment (25% — Final)</td><td class="amount">₱2,843.75</td><td class="due">⚠ Unpaid</td><td>Apr 5, 2026</td></tr>
            <tr><td>Student Council Fee</td><td class="amount">₱500.00</td><td class="due">⚠ Unpaid</td><td>Apr 5, 2026</td></tr>
          </tbody>
        </table>
        <div class="billing-total">
          <span class="bt-label">Outstanding Balance</span>
          <span class="bt-val">₱3,343.75</span>
        </div>
        <div style="padding:.5rem .8rem .8rem;">
          <button class="pay-btn">Pay Now via GCash / Bank Transfer</button>
        </div>
      </div>
    </div>

  </main>
</div>

<!-- ══ PORTAL FOOTER ══════════════════════════════════════════ -->
<footer class="portal-footer">
  <p>© 2026 Datamex College of Saint Adeline · Student Portal v1.0 (Prototype)</p>
  <div>
    <a href="index.php">Main Website</a>
    <a href="#">Help &amp; Support</a>
    <a href="#">Privacy Policy</a>
    <a href="login.php">Log Out</a>
  </div>
</footer>

</body>
</html>
