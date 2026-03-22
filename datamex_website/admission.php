<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Admissions - Datamex College of Saint Adeline</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<style>
:root {
  --maroon: #7b0d1e;
  --maroon-dark: #5c0916;
  --maroon-light: #96112a;
  --gold: #c9a030;
  --gold-light: #e2bb55;
  --gold-dark: #a07820;
  --white: #ffffff;
  --cream: #faf8f5;
  --off: #f2efea;
  --ink: #1a1018;
  --muted: #6b5f63;
  --border: #e0d8d0;
}

* { margin: 0; padding: 0; box-sizing: border-box; }
html { scroll-behavior: smooth; }
body {
  font-family: 'Plus Jakarta Sans', sans-serif;
  background: var(--cream);
  color: var(--ink);
}

.ticker {
  background: var(--maroon-dark);
  display: flex;
  align-items: center;
  height: 28px;
  overflow: hidden;
}
.ticker-tag {
  background: var(--gold);
  color: var(--maroon-dark);
  font-size: 0.58rem;
  font-weight: 700;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  padding: 0 1.1rem;
  height: 100%;
  display: flex;
  align-items: center;
  white-space: nowrap;
  flex-shrink: 0;
}
.ticker-scroll {
  overflow: hidden;
  flex: 1;
}
.ticker-track {
  display: flex;
  white-space: nowrap;
  animation: tickerMove 38s linear infinite;
}
.ticker-track span {
  font-size: 0.66rem;
  color: rgba(255,255,255,0.72);
  padding: 0 2.2rem;
}
.ticker-track span::after {
  content: '•';
  margin-left: 2.2rem;
  color: rgba(201,160,48,0.5);
  font-size: 0.55rem;
}
@keyframes tickerMove {
  from { transform: translateX(0); }
  to { transform: translateX(-50%); }
}

nav {
  position: sticky;
  top: 0;
  z-index: 200;
  background: var(--maroon);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 2.5rem;
  height: 64px;
  box-shadow: 0 2px 16px rgba(123,13,30,0.3);
}
.nav-brand {
  display: flex;
  align-items: center;
  gap: 12px;
  text-decoration: none;
}
.nav-seal {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 2px solid var(--gold);
  background: rgba(201,160,48,0.12);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  overflow: hidden;
}
.nav-seal img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.nav-name b {
  display: block;
  font-size: 0.86rem;
  font-weight: 700;
  color: var(--white);
}
.nav-name small {
  font-size: 0.57rem;
  color: rgba(255,255,255,0.5);
  letter-spacing: 0.14em;
  text-transform: uppercase;
}
.nav-links {
  display: flex;
  align-items: center;
  gap: 2px;
}
.nav-links a {
  font-size: 0.73rem;
  font-weight: 500;
  color: rgba(255,255,255,0.72);
  text-decoration: none;
  padding: 0.4rem 0.8rem;
  border-radius: 4px;
  transition: all 0.18s;
}
.nav-links a:hover {
  color: var(--white);
  background: rgba(255,255,255,0.1);
}
.nav-links a.active {
  color: var(--white);
  font-weight: 700;
  background: rgba(255,255,255,0.12);
}
.nav-cta {
  background: var(--gold) !important;
  color: var(--maroon-dark) !important;
  font-weight: 700 !important;
  margin-left: 0.5rem;
  padding: 0.42rem 1.1rem !important;
  border-radius: 4px !important;
}
.nav-cta:hover {
  background: var(--gold-light) !important;
}

.page-hero {
  background: var(--maroon);
  border-bottom: 3px solid var(--gold);
  padding: 3.5rem 2.5rem 0;
  position: relative;
  overflow: hidden;
}
.page-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 0% 100%, rgba(92,9,22,0.5) 0%, transparent 55%);
}
.page-hero::after {
  content: '';
  position: absolute;
  right: -90px;
  bottom: -70px;
  width: 460px;
  height: 460px;
  border-radius: 50%;
  border: 1px solid rgba(201,160,48,0.1);
  box-shadow:
    0 0 0 70px rgba(201,160,48,0.035),
    0 0 0 140px rgba(201,160,48,0.015);
  pointer-events: none;
}
.breadcrumb {
  position: relative;
  z-index: 1;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.64rem;
  color: rgba(255,255,255,0.4);
  margin-bottom: 1.4rem;
}
.breadcrumb a {
  color: rgba(255,255,255,0.4);
  text-decoration: none;
  transition: color 0.15s;
}
.breadcrumb a:hover { color: var(--gold-light); }
.breadcrumb .sep { color: rgba(255,255,255,0.2); }
.breadcrumb .cur { color: var(--gold-light); }
.hero-grid {
  position: relative;
  z-index: 1;
  display: grid;
  grid-template-columns: minmax(0, 1.25fr) minmax(280px, 0.75fr);
  gap: 3rem;
  align-items: end;
  padding-bottom: 2.5rem;
}
.hero-eyebrow {
  font-size: 0.62rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--gold);
  font-weight: 600;
  margin-bottom: 0.8rem;
  display: flex;
  align-items: center;
  gap: 8px;
}
.hero-eyebrow::before {
  content: '';
  width: 18px;
  height: 1px;
  background: var(--gold);
}
.hero-copy h1 {
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(2.5rem, 4.8vw, 4.1rem);
  font-weight: 400;
  color: var(--white);
  line-height: 1.08;
  margin-bottom: 1rem;
}
.hero-copy h1 em {
  display: block;
  font-style: italic;
  color: var(--gold-light);
}
.hero-copy p {
  max-width: 560px;
  font-size: 0.9rem;
  line-height: 1.8;
  color: rgba(255,255,255,0.6);
}
.hero-actions {
  margin-top: 1.4rem;
  display: flex;
  gap: 0.7rem;
  flex-wrap: wrap;
}
.btn {
  display: inline-block;
  text-decoration: none;
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.09em;
  text-transform: uppercase;
  padding: 0.76rem 1.35rem;
  border-radius: 3px;
  transition: all 0.18s;
}
.btn-filled {
  background: var(--gold);
  color: var(--maroon-dark);
}
.btn-filled:hover {
  background: var(--gold-light);
}
.btn-ghost {
  border: 1.5px solid rgba(255,255,255,0.28);
  color: rgba(255,255,255,0.82);
  background: transparent;
}
.btn-ghost:hover {
  border-color: var(--gold-light);
  color: var(--gold-light);
}
.hero-panel {
  background: rgba(0,0,0,0.18);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: 6px;
  overflow: hidden;
}
.hero-panel-head {
  padding: 1rem 1.1rem;
  border-bottom: 1px solid rgba(255,255,255,0.08);
}
.hero-panel-head span {
  font-size: 0.58rem;
  letter-spacing: 0.17em;
  text-transform: uppercase;
  color: var(--gold);
  font-weight: 700;
}
.hero-panel-head h3 {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.3rem;
  font-weight: 700;
  color: var(--white);
  margin-top: 0.35rem;
}
.stat-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1px;
  background: rgba(255,255,255,0.08);
}
.stat {
  background: rgba(255,255,255,0.04);
  padding: 1.15rem 1rem;
}
.stat .num {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.8rem;
  font-weight: 700;
  color: var(--gold-light);
  line-height: 1;
}
.stat .label {
  font-size: 0.62rem;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: rgba(255,255,255,0.45);
  margin-top: 0.3rem;
}

.section-nav {
  background: var(--white);
  border-bottom: 1px solid var(--border);
  display: flex;
  overflow-x: auto;
}
.section-nav a {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.9rem 1.5rem;
  font-size: 0.72rem;
  font-weight: 600;
  color: var(--muted);
  text-decoration: none;
  white-space: nowrap;
  border-bottom: 2px solid transparent;
  transition: all 0.18s;
}
.section-nav a:hover {
  color: var(--maroon);
  border-bottom-color: rgba(123,13,30,0.2);
}
.section-nav a.active {
  color: var(--maroon);
  border-bottom-color: var(--gold);
}

.layout {
  display: grid;
  grid-template-columns: minmax(0, 1fr) 290px;
}
.main {
  border-right: 1px solid var(--border);
}
.aside {
  padding: 2rem 1.4rem;
  background: var(--cream);
}
.sec-block {
  padding: 2.5rem;
  border-bottom: 1px solid var(--border);
  scroll-margin-top: 82px;
}
.block-head {
  display: flex;
  align-items: center;
  gap: 0.85rem;
  margin-bottom: 1.5rem;
  padding-bottom: 0.9rem;
  border-bottom: 1px solid var(--border);
}
.block-badge {
  width: 38px;
  height: 38px;
  border-radius: 8px;
  background: rgba(123,13,30,0.08);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--maroon);
  font-size: 0.78rem;
  font-weight: 700;
  flex-shrink: 0;
}
.block-head h2 {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.35rem;
  font-weight: 700;
  color: var(--maroon);
}
.block-head p {
  font-size: 0.66rem;
  color: var(--muted);
  margin-top: 1px;
}

.overview-grid,
.requirements-grid,
.scholarship-grid,
.faq-grid {
  display: grid;
  gap: 1px;
  background: var(--border);
  border: 1px solid var(--border);
  border-radius: 4px;
  overflow: hidden;
}
.overview-grid { grid-template-columns: repeat(3, 1fr); }
.requirements-grid { grid-template-columns: repeat(3, 1fr); }
.scholarship-grid { grid-template-columns: repeat(2, 1fr); }
.faq-grid { grid-template-columns: repeat(2, 1fr); }

.card {
  background: var(--white);
  padding: 1.35rem 1.2rem;
}
.card h3 {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.02rem;
  font-weight: 700;
  color: var(--maroon);
  margin-bottom: 0.45rem;
}
.card p,
.card li {
  font-size: 0.77rem;
  color: var(--muted);
  line-height: 1.65;
}
.card ul {
  padding-left: 1rem;
}
.card ul li + li {
  margin-top: 0.28rem;
}
.card-tag {
  display: inline-flex;
  align-items: center;
  gap: 0.35rem;
  font-size: 0.56rem;
  font-weight: 700;
  letter-spacing: 0.16em;
  text-transform: uppercase;
  color: var(--gold-dark);
  margin-bottom: 0.7rem;
}
.card-tag::before {
  content: '';
  width: 8px;
  height: 2px;
  background: var(--gold);
}

.intro-split {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: 2rem;
  align-items: start;
  margin-bottom: 1.5rem;
}
.intro-copy p {
  font-size: 0.86rem;
  color: var(--muted);
  line-height: 1.82;
  margin-bottom: 1rem;
}
.intro-copy p:last-child { margin-bottom: 0; }
.notice-box {
  background: linear-gradient(135deg, rgba(123,13,30,0.06), rgba(201,160,48,0.08));
  border: 1px solid rgba(123,13,30,0.12);
  border-radius: 6px;
  padding: 1.2rem 1.15rem;
}
.notice-box h3 {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.12rem;
  color: var(--maroon);
  margin-bottom: 0.6rem;
}
.notice-box p {
  font-size: 0.78rem;
  color: var(--muted);
  line-height: 1.6;
}

.process-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1px;
  background: var(--border);
  border: 1px solid var(--border);
  border-radius: 4px;
  overflow: hidden;
}
.step-card {
  background: var(--white);
  padding: 1.4rem 1.15rem;
  position: relative;
}
.step-card .step-num {
  font-family: 'Cormorant Garamond', serif;
  font-size: 2rem;
  font-weight: 700;
  color: rgba(123,13,30,0.08);
  position: absolute;
  top: 0.9rem;
  right: 1rem;
}
.step-card h3 {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.02rem;
  color: var(--maroon);
  margin-bottom: 0.45rem;
}
.step-card p {
  font-size: 0.76rem;
  color: var(--muted);
  line-height: 1.6;
}

.timeline-list {
  margin-top: 1.4rem;
  border: 1px solid var(--border);
  border-radius: 4px;
  overflow: hidden;
}
.timeline-row {
  display: grid;
  grid-template-columns: 170px 1fr;
  background: var(--white);
  border-bottom: 1px solid var(--border);
}
.timeline-row:last-child { border-bottom: none; }
.timeline-row .date {
  background: var(--off);
  padding: 0.95rem 1rem;
  font-size: 0.7rem;
  font-weight: 700;
  color: var(--maroon);
  text-transform: uppercase;
  letter-spacing: 0.08em;
}
.timeline-row .desc {
  padding: 0.95rem 1rem;
  font-size: 0.78rem;
  color: var(--muted);
  line-height: 1.6;
}

.aside-widget {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 4px;
  overflow: hidden;
  margin-bottom: 1.2rem;
}
.aw-head {
  background: var(--maroon);
  padding: 0.85rem 1rem;
}
.aw-head h4 {
  font-size: 0.7rem;
  font-weight: 700;
  color: var(--white);
  letter-spacing: 0.04em;
}
.aw-body {
  padding: 1rem;
}
.quick-links {
  display: flex;
  flex-direction: column;
}
.quick-links a {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 0.7rem;
  text-decoration: none;
  color: inherit;
  padding: 0.68rem 0;
  border-bottom: 1px solid var(--border);
  transition: padding-left 0.15s;
}
.quick-links a:last-child { border-bottom: none; }
.quick-links a:hover { padding-left: 0.35rem; }
.quick-links span:first-child {
  font-size: 0.76rem;
  font-weight: 600;
  color: var(--maroon);
}
.quick-links span:last-child {
  color: var(--gold-dark);
}
.mini-copy,
.contact-mini p,
.office-hours p {
  font-size: 0.73rem;
  color: var(--muted);
  line-height: 1.6;
}
.contact-mini + .contact-mini,
.office-hours {
  margin-top: 0.8rem;
}
.contact-mini h5,
.office-hours h5 {
  font-size: 0.72rem;
  font-weight: 700;
  color: var(--maroon);
  margin-bottom: 0.18rem;
}
.widget-actions {
  display: flex;
  flex-direction: column;
  gap: 0.45rem;
  margin-top: 0.85rem;
}
.widget-btn {
  display: block;
  text-align: center;
  text-decoration: none;
  font-size: 0.69rem;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  padding: 0.7rem;
  border-radius: 3px;
  transition: all 0.18s;
}
.widget-btn.filled {
  background: var(--maroon);
  color: var(--white);
}
.widget-btn.filled:hover {
  background: var(--maroon-light);
}
.widget-btn.ghost {
  border: 1.5px solid var(--border);
  color: var(--maroon);
}
.widget-btn.ghost:hover {
  border-color: var(--maroon);
}

.cta-band {
  background: var(--maroon);
  border-top: 3px solid var(--gold);
  padding: 2.2rem 2.5rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1.5rem;
  flex-wrap: wrap;
  position: relative;
  overflow: hidden;
}
.cta-band::before {
  content: '';
  position: absolute;
  right: -60px;
  top: 50%;
  transform: translateY(-50%);
  width: 300px;
  height: 300px;
  border-radius: 50%;
  border: 1px solid rgba(201,160,48,0.1);
  box-shadow: 0 0 0 60px rgba(201,160,48,0.04);
}
.cta-text,
.cta-actions {
  position: relative;
}
.cta-text h2 {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.9rem;
  font-weight: 600;
  color: var(--white);
}
.cta-text p {
  font-size: 0.8rem;
  color: rgba(255,255,255,0.55);
  margin-top: 0.35rem;
  line-height: 1.65;
}
.cta-actions {
  display: flex;
  gap: 0.7rem;
  flex-wrap: wrap;
}
.cta-btn {
  display: inline-block;
  text-decoration: none;
  font-size: 0.71rem;
  font-weight: 700;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  padding: 0.7rem 1.4rem;
  border-radius: 3px;
  transition: all 0.18s;
}
.cta-btn.gold {
  background: var(--gold);
  color: var(--maroon-dark);
}
.cta-btn.gold:hover {
  background: var(--gold-light);
}
.cta-btn.ghost {
  border: 1.5px solid rgba(255,255,255,0.25);
  color: rgba(255,255,255,0.84);
}
.cta-btn.ghost:hover {
  border-color: var(--gold-light);
  color: var(--gold-light);
}

.foot-strip {
  background: var(--white);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0.9rem 2.5rem;
  flex-wrap: wrap;
  gap: 0.5rem;
  border-top: 1px solid var(--border);
}
.foot-strip p {
  font-size: 0.64rem;
  color: var(--muted);
}
.foot-strip a {
  font-size: 0.62rem;
  color: var(--muted);
  text-decoration: none;
  margin-left: 1.2rem;
  transition: color 0.15s;
}
.foot-strip a:hover { color: var(--maroon); }

@media (max-width: 980px) {
  .layout {
    grid-template-columns: 1fr;
  }
  .aside {
    display: none;
  }
  .hero-grid,
  .intro-split,
  .overview-grid,
  .process-grid,
  .requirements-grid,
  .scholarship-grid,
  .faq-grid {
    grid-template-columns: 1fr;
  }
  .timeline-row {
    grid-template-columns: 1fr;
  }
  nav {
    padding: 0 1rem;
  }
  .nav-links a:not(.active):not(.nav-cta) {
    display: none;
  }
  .page-hero,
  .sec-block,
  .cta-band,
  .foot-strip {
    padding-left: 1.2rem;
    padding-right: 1.2rem;
  }
}
</style>
</head>
<body>

<div class="ticker">
  <div class="ticker-tag">Updates</div>
  <div class="ticker-scroll">
    <div class="ticker-track">
      <span>Admissions for AY 2026-2027 are open for incoming freshmen, transferees, and senior high school applicants</span>
      <span>Scholarship screening is available every Monday to Friday at the Admissions Office</span>
      <span>Bring original and photocopied credentials when visiting campus for evaluation</span>
      <span>Admissions for AY 2026-2027 are open for incoming freshmen, transferees, and senior high school applicants</span>
      <span>Scholarship screening is available every Monday to Friday at the Admissions Office</span>
      <span>Bring original and photocopied credentials when visiting campus for evaluation</span>
    </div>
  </div>
</div>

<nav>
  <a class="nav-brand" href="index.php">
    <div class="nav-seal"><img src="uploads/datamex_logo.png" alt="Datamex logo"/></div>
    <div class="nav-name"><b>Datamex College</b><small>of Saint Adeline</small></div>
  </a>
  <div class="nav-links">
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="academics.php">Academics</a>
    <a href="admission.php" class="active">Admissions</a>
    <a href="campus_life.php">Campus Life</a>
    <a href="news.php">News</a>
    <a href="login.php" class="nav-cta">Portal Login</a>
  </div>
</nav>

<div class="page-hero">
  <div class="breadcrumb">
    <a href="index.php">Home</a>
    <span class="sep">/</span>
    <span class="cur">Admissions</span>
  </div>
  <div class="hero-grid">
    <div class="hero-copy">
      <div class="hero-eyebrow">Admission and Enrollment</div>
      <h1>Start your journey at Datamex.<em>Your application begins here.</em></h1>
      <p>
        Datamex College of Saint Adeline welcomes incoming freshmen, transferees, and senior high school applicants.
        Review the requirements, follow the four-step process, and connect with our Admissions Office for evaluation and enrollment guidance.
      </p>
      <div class="hero-actions">
        <a href="#apply" class="btn btn-filled">Apply Now</a>
        <a href="#requirements" class="btn btn-ghost">View Requirements</a>
      </div>
    </div>
    <div class="hero-panel">
      <div class="hero-panel-head">
        <span>Admissions Snapshot</span>
        <h3>AY 2026-2027 Intake</h3>
      </div>
      <div class="stat-grid">
        <div class="stat"><div class="num">4</div><div class="label">Application Steps</div></div>
        <div class="stat"><div class="num">3</div><div class="label">Applicant Types</div></div>
        <div class="stat"><div class="num">8-5</div><div class="label">Office Hours</div></div>
        <div class="stat"><div class="num">50+</div><div class="label">Partner Industry Links</div></div>
      </div>
    </div>
  </div>
</div>

<div class="section-nav">
  <a href="#overview" class="active">Overview</a>
  <a href="#process">Process</a>
  <a href="#requirements">Requirements</a>
  <a href="#scholarships">Scholarships</a>
  <a href="#faq">FAQ</a>
  <a href="#apply">Apply</a>
</div>

<div class="layout">
  <div class="main">
    <section class="sec-block" id="overview">
      <div class="block-head">
        <div class="block-badge">01</div>
        <div>
          <h2>Admissions Overview</h2>
          <p>Everything you need before you submit your requirements</p>
        </div>
      </div>

      <div class="intro-split">
        <div class="intro-copy">
          <p>
            The Admissions Office assists applicants from initial inquiry to enrollment confirmation. Whether you are entering college for the first time,
            transferring from another institution, or applying for senior high school, our team will guide you through credential review, assessment, and enrollment scheduling.
          </p>
          <p>
            Applicants are encouraged to prepare both original and photocopied credentials before visiting campus. Early submission helps secure preferred schedules,
            scholarship screening, and program advising.
          </p>
        </div>
        <div class="notice-box">
          <h3>Important Reminder</h3>
          <p>
            Admissions evaluation is handled on weekdays from 8:00 AM to 5:00 PM. Bring valid identification and complete documentary requirements to avoid delays in processing.
          </p>
        </div>
      </div>

      <div class="overview-grid">
        <div class="card">
          <div class="card-tag">Incoming Freshmen</div>
          <h3>First-Time College Applicants</h3>
          <p>Submit report cards, certificate of good moral character, PSA birth certificate, and recent ID photos for evaluation.</p>
        </div>
        <div class="card">
          <div class="card-tag">Transferees</div>
          <h3>Students From Other Schools</h3>
          <p>Bring transfer credentials, transcript records, and course descriptions so academic units can be assessed properly.</p>
        </div>
        <div class="card">
          <div class="card-tag">Senior High</div>
          <h3>Grade 11 and Grade 12 Applicants</h3>
          <p>Choose from available strands and complete admissions screening with report cards, recommendation, and student records.</p>
        </div>
      </div>

      <div class="timeline-list">
        <div class="timeline-row">
          <div class="date">March to May 2026</div>
          <div class="desc">Primary admissions intake and scholarship screening for the opening of AY 2026-2027.</div>
        </div>
        <div class="timeline-row">
          <div class="date">June 2026</div>
          <div class="desc">Late applicants may still be accommodated based on slot availability and completion of documentary requirements.</div>
        </div>
        <div class="timeline-row">
          <div class="date">Weekdays Only</div>
          <div class="desc">On-campus evaluation, interview scheduling, and enrollment advising from 8:00 AM to 5:00 PM.</div>
        </div>
      </div>
    </section>

    <section class="sec-block" id="process">
      <div class="block-head">
        <div class="block-badge">02</div>
        <div>
          <h2>How to Apply</h2>
          <p>A simple four-step admissions process</p>
        </div>
      </div>

      <div class="process-grid">
        <div class="step-card">
          <div class="step-num">01</div>
          <h3>Prepare Documents</h3>
          <p>Gather academic records, identification, photos, and any program-specific requirements before your visit or inquiry.</p>
        </div>
        <div class="step-card">
          <div class="step-num">02</div>
          <h3>Submit for Evaluation</h3>
          <p>Present your credentials to the Admissions Office so your eligibility, strand, or program placement can be reviewed.</p>
        </div>
        <div class="step-card">
          <div class="step-num">03</div>
          <h3>Complete Screening</h3>
          <p>Attend interviews, assessments, or scholarship screening if required for your chosen program or admission category.</p>
        </div>
        <div class="step-card">
          <div class="step-num">04</div>
          <h3>Confirm Enrollment</h3>
          <p>Once approved, proceed to enrollment scheduling, fee assessment, and official registration with the Registrar and Finance Office.</p>
        </div>
      </div>
    </section>

    <section class="sec-block" id="requirements">
      <div class="block-head">
        <div class="block-badge">03</div>
        <div>
          <h2>Admission Requirements</h2>
          <p>Document checklists by applicant type</p>
        </div>
      </div>

      <div class="requirements-grid">
        <div class="card">
          <div class="card-tag">Freshmen</div>
          <h3>College Freshmen</h3>
          <ul>
            <li>Form 138 or latest report card</li>
            <li>Certificate of Good Moral Character</li>
            <li>PSA Birth Certificate</li>
            <li>Two recent 2x2 ID photos</li>
            <li>Certificate of Completion or Diploma if available</li>
          </ul>
        </div>
        <div class="card">
          <div class="card-tag">Transferees</div>
          <h3>Transfer Applicants</h3>
          <ul>
            <li>Transcript of Records or certified true copy of grades</li>
            <li>Honorable Dismissal or Transfer Credential</li>
            <li>Course descriptions for subject crediting</li>
            <li>Certificate of Good Moral Character</li>
            <li>PSA Birth Certificate and ID photos</li>
          </ul>
        </div>
        <div class="card">
          <div class="card-tag">Senior High School</div>
          <h3>SHS Applicants</h3>
          <ul>
            <li>Latest report card</li>
            <li>Junior high school completion record when available</li>
            <li>Certificate of Good Moral Character</li>
            <li>PSA Birth Certificate</li>
            <li>Two recent 2x2 ID photos</li>
          </ul>
        </div>
      </div>
    </section>

    <section class="sec-block" id="scholarships">
      <div class="block-head">
        <div class="block-badge">04</div>
        <div>
          <h2>Scholarships and Support</h2>
          <p>Financial assistance opportunities available to qualified students</p>
        </div>
      </div>

      <div class="scholarship-grid">
        <div class="card">
          <div class="card-tag">Merit Grant</div>
          <h3>Academic Excellence Scholarship</h3>
          <p>Available to applicants with strong academic standing. Evaluation is based on report cards, grades, and interview results.</p>
        </div>
        <div class="card">
          <div class="card-tag">Assistance Program</div>
          <h3>Needs-Based Tuition Support</h3>
          <p>Qualified students may apply for partial tuition support subject to assessment, supporting documents, and available slots.</p>
        </div>
      </div>
    </section>

    <section class="sec-block" id="faq">
      <div class="block-head">
        <div class="block-badge">05</div>
        <div>
          <h2>Frequently Asked Questions</h2>
          <p>Quick answers for applicants and parents</p>
        </div>
      </div>

      <div class="faq-grid">
        <div class="card">
          <h3>Can I apply even if my documents are incomplete?</h3>
          <p>Yes. You may start the evaluation process, but final approval and enrollment will require completion of the required records.</p>
        </div>
        <div class="card">
          <h3>Do transferees receive credited subjects?</h3>
          <p>Yes. Subject crediting is assessed after submission of transcript records and course descriptions from the previous institution.</p>
        </div>
        <div class="card">
          <h3>Is there an entrance exam?</h3>
          <p>Some programs may require screening, interview, or assessment depending on slot availability and admission guidelines.</p>
        </div>
        <div class="card">
          <h3>How do I ask for admissions assistance?</h3>
          <p>You may visit the Admissions Office during office hours or send your inquiry to admissions@datamex.edu.ph.</p>
        </div>
      </div>
    </section>
  </div>

  <aside class="aside">
    <div class="aside-widget">
      <div class="aw-head"><h4>Quick Navigation</h4></div>
      <div class="aw-body">
        <div class="quick-links">
          <a href="#overview"><span>Admissions Overview</span><span>></span></a>
          <a href="#process"><span>How to Apply</span><span>></span></a>
          <a href="#requirements"><span>Requirements</span><span>></span></a>
          <a href="#scholarships"><span>Scholarships</span><span>></span></a>
          <a href="#faq"><span>FAQ</span><span>></span></a>
          <a href="#apply"><span>Apply / Contact</span><span>></span></a>
        </div>
      </div>
    </div>

    <div class="aside-widget">
      <div class="aw-head"><h4>Admissions Office</h4></div>
      <div class="aw-body">
        <div class="contact-mini">
          <h5>Email</h5>
          <p>admissions@datamex.edu.ph</p>
        </div>
        <div class="contact-mini">
          <h5>Campus Address</h5>
          <p>123 Saint Adeline Avenue<br>Quezon City, Philippines</p>
        </div>
        <div class="office-hours">
          <h5>Office Hours</h5>
          <p>Monday to Friday<br>8:00 AM to 5:00 PM</p>
        </div>
      </div>
    </div>

    <div class="aside-widget">
      <div class="aw-head"><h4>Ready to Apply?</h4></div>
      <div class="aw-body">
        <p class="mini-copy">Connect with our admissions team for document evaluation, schedule guidance, and scholarship screening.</p>
        <div class="widget-actions">
          <a href="mailto:admissions@datamex.edu.ph" class="widget-btn filled">Email Admissions</a>
          <a href="#requirements" class="widget-btn ghost">Review Checklist</a>
        </div>
      </div>
    </div>
  </aside>
</div>

<div class="cta-band" id="apply">
  <div class="cta-text">
    <h2>Ready to move forward?</h2>
    <p>Bring your documents to campus or email the Admissions Office so we can help you begin your Datamex application.</p>
  </div>
  <div class="cta-actions">
    <a href="mailto:admissions@datamex.edu.ph" class="cta-btn gold">Email Admissions</a>
    <a href="about.php" class="cta-btn ghost">Learn About Datamex</a>
  </div>
</div>

<div class="foot-strip">
  <p>&copy; 2026 Datamex College of Saint Adeline. All rights reserved.</p>
  <div>
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="admission.php">Admissions</a>
  </div>
</div>

<script>
const navLinks = document.querySelectorAll('.section-nav a');
const sections = [...navLinks]
  .map(link => document.querySelector(link.getAttribute('href')))
  .filter(Boolean);

window.addEventListener('scroll', () => {
  let currentId = sections[0] ? sections[0].id : '';

  sections.forEach(section => {
    const top = section.offsetTop - 110;
    if (window.scrollY >= top) {
      currentId = section.id;
    }
  });

  navLinks.forEach(link => {
    link.classList.toggle('active', link.getAttribute('href') === '#' + currentId);
  });
});
</script>
</body>
</html>
