<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Academics — Datamex College of Saint Adeline</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<style>
:root{
  --maroon:#7b0d1e;--maroonD:#5c0916;--maroonL:#96112a;
  --gold:#c9a030;--goldL:#e2bb55;--goldD:#a07820;
  --white:#ffffff;--cream:#faf8f5;--off:#f2efea;
  --ink:#1a1018;--muted:#6b5f63;--border:#e0d8d0;
}
*{margin:0;padding:0;box-sizing:border-box;}
html{scroll-behavior:smooth;}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--cream);color:var(--ink);}

/* ── TICKER ── */
.ticker{background:var(--maroonD);display:flex;align-items:center;height:28px;overflow:hidden;}
.ticker-tag{background:var(--gold);color:var(--maroonD);font-size:.58rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;padding:0 1.1rem;height:100%;display:flex;align-items:center;white-space:nowrap;flex-shrink:0;}
.ticker-scroll{overflow:hidden;flex:1;}
.ticker-track{display:flex;white-space:nowrap;animation:tickerMove 38s linear infinite;}
.ticker-track span{font-size:.66rem;color:rgba(255,255,255,.72);padding:0 2.2rem;}
.ticker-track span::after{content:'◆';margin-left:2.2rem;color:rgba(201,160,48,.5);font-size:.4rem;}
@keyframes tickerMove{from{transform:translateX(0);}to{transform:translateX(-50%);}}

/* ── NAV ── */
nav{position:sticky;top:0;z-index:200;background:var(--maroon);display:flex;align-items:center;justify-content:space-between;padding:0 2.5rem;height:64px;box-shadow:0 2px 16px rgba(123,13,30,.3);}
.nav-brand{display:flex;align-items:center;gap:12px;text-decoration:none;}
.nav-seal{width:40px;height:40px;border-radius:50%;border:2px solid var(--gold);background:rgba(201,160,48,.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;overflow:hidden;}
.nav-seal img{width:100%;height:100%;object-fit:cover;display:block;}
.nav-name b{display:block;font-size:.86rem;font-weight:700;color:var(--white);}
.nav-name small{font-size:.57rem;color:rgba(255,255,255,.5);letter-spacing:.14em;text-transform:uppercase;}
.nav-links{display:flex;align-items:center;gap:2px;}
.nav-links a{font-size:.73rem;font-weight:500;color:rgba(255,255,255,.72);text-decoration:none;padding:.4rem .8rem;border-radius:4px;transition:all .18s;}
.nav-links a:hover{color:var(--white);background:rgba(255,255,255,.1);}
.nav-links a.active{color:var(--white);font-weight:700;background:rgba(255,255,255,.12);}
.nav-cta{background:var(--gold)!important;color:var(--maroonD)!important;font-weight:700!important;margin-left:.5rem;padding:.42rem 1.1rem!important;border-radius:4px!important;}
.nav-cta:hover{background:var(--goldL)!important;}

/* ── PAGE HERO ── */
.page-hero{background:var(--maroon);padding:3.5rem 2.5rem 0;border-bottom:3px solid var(--gold);position:relative;overflow:hidden;}
.page-hero::after{content:'';position:absolute;right:-80px;bottom:-60px;width:440px;height:440px;border-radius:50%;border:1px solid rgba(201,160,48,.1);box-shadow:0 0 0 70px rgba(201,160,48,.035),0 0 0 140px rgba(201,160,48,.015);pointer-events:none;}
.page-hero::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 0% 100%,rgba(92,9,22,.5) 0%,transparent 55%);}
.breadcrumb{position:relative;z-index:1;display:flex;align-items:center;gap:.5rem;font-size:.64rem;color:rgba(255,255,255,.4);margin-bottom:1.4rem;}
.breadcrumb a{color:rgba(255,255,255,.4);text-decoration:none;}
.breadcrumb a:hover{color:var(--goldL);}
.breadcrumb .sep{color:rgba(255,255,255,.2);}
.breadcrumb .cur{color:var(--goldL);}
.hero-inner{position:relative;z-index:1;display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:flex-end;padding-bottom:0;}
.ph-eyebrow{font-size:.62rem;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);font-weight:600;margin-bottom:.8rem;display:flex;align-items:center;gap:8px;}
.ph-eyebrow::before{content:'';width:18px;height:1px;background:var(--gold);}
.page-hero h1{font-family:'Cormorant Garamond',serif;font-size:clamp(2.4rem,4.5vw,3.8rem);font-weight:400;color:var(--white);line-height:1.08;margin-bottom:1.2rem;}
.page-hero h1 em{font-style:italic;color:var(--goldL);display:block;}
.hero-desc{font-size:.88rem;color:rgba(255,255,255,.58);line-height:1.75;font-weight:300;max-width:480px;}
.hi-right{display:grid;grid-template-columns:1fr 1fr;gap:1px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.1);border-bottom:none;border-radius:4px 4px 0 0;overflow:hidden;align-self:flex-end;}
.hstat{background:rgba(0,0,0,.18);padding:1.4rem 1.2rem;}
.hstat .n{font-family:'Cormorant Garamond',serif;font-size:2.2rem;font-weight:700;color:var(--gold);line-height:1;}
.hstat .l{font-size:.6rem;color:rgba(255,255,255,.45);text-transform:uppercase;letter-spacing:.1em;margin-top:4px;font-weight:500;}

/* ── SECTION NAV ── */
.sec-nav{background:var(--white);border-bottom:1px solid var(--border);display:flex;overflow-x:auto;}
.sec-nav a{display:flex;align-items:center;gap:.5rem;padding:.9rem 1.5rem;font-size:.72rem;font-weight:600;color:var(--muted);text-decoration:none;white-space:nowrap;border-bottom:2px solid transparent;transition:all .18s;}
.sec-nav a:hover{color:var(--maroon);border-bottom-color:rgba(123,13,30,.2);}
.sec-nav a.active{color:var(--maroon);border-bottom-color:var(--gold);}
.sn{width:22px;height:22px;border-radius:50%;background:var(--off);color:var(--muted);font-size:.62rem;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all .18s;}
.sec-nav a.active .sn,.sec-nav a:hover .sn{background:var(--maroon);color:var(--white);}

/* ── LAYOUT ── */
.body-wrap{display:grid;grid-template-columns:1fr 270px;}
.main{border-right:1px solid var(--border);}
.aside{padding:2rem 1.5rem;background:var(--cream);}

/* ── SECTION BLOCK ── */
.sec-block{padding:2.5rem;border-bottom:1px solid var(--border);scroll-margin-top:80px;}
.block-head{display:flex;align-items:center;gap:.85rem;margin-bottom:1.5rem;padding-bottom:.9rem;border-bottom:1px solid var(--border);}
.bh-icon{width:38px;height:38px;border-radius:8px;background:rgba(123,13,30,.08);display:flex;align-items:center;justify-content:center;font-size:1.05rem;flex-shrink:0;}
.bh-text h2{font-family:'Cormorant Garamond',serif;font-size:1.3rem;font-weight:700;color:var(--maroon);}
.bh-text p{font-size:.66rem;color:var(--muted);margin-top:1px;}

/* ── PROGRAM OVERVIEW ── */
.college-tabs{display:flex;gap:.5rem;margin-bottom:1.5rem;flex-wrap:wrap;}
.ctab{font-size:.7rem;font-weight:600;letter-spacing:.04em;padding:.38rem 1rem;border-radius:20px;border:1.5px solid var(--border);background:var(--white);color:var(--muted);cursor:pointer;transition:all .18s;font-family:'Plus Jakarta Sans',sans-serif;}
.ctab.on{background:var(--maroon);color:var(--white);border-color:var(--maroon);}
.ctab:hover:not(.on){border-color:var(--maroon);color:var(--maroon);}

.college-panel{display:none;animation:fadeIn .25s ease;}
.college-panel.show{display:block;}
@keyframes fadeIn{from{opacity:0;transform:translateY(6px);}to{opacity:1;transform:translateY(0);}}

.college-header{
  display:grid;grid-template-columns:auto 1fr;gap:1.2rem;
  background:var(--maroon);border-radius:4px 4px 0 0;
  padding:1.5rem;align-items:center;
  border-bottom:2px solid var(--gold);
  position:relative;overflow:hidden;
}
.college-header::after{content:'';position:absolute;right:-30px;top:50%;transform:translateY(-50%);width:160px;height:160px;border-radius:50%;border:1px solid rgba(201,160,48,.12);box-shadow:0 0 0 30px rgba(201,160,48,.04);}
.ch-badge{width:52px;height:52px;border-radius:50%;border:2px solid var(--gold);background:rgba(201,160,48,.12);display:flex;align-items:center;justify-content:center;font-size:1.4rem;flex-shrink:0;}
.ch-info h3{font-family:'Cormorant Garamond',serif;font-size:1.3rem;font-weight:700;color:var(--white);}
.ch-info p{font-size:.75rem;color:rgba(255,255,255,.55);margin-top:2px;}

.prog-cards{
  display:grid;gap:1px;background:var(--border);
  border:1px solid var(--border);border-top:none;
  border-radius:0 0 4px 4px;overflow:hidden;
}
.prog-card{background:var(--white);padding:1.3rem 1.4rem;transition:background .18s;position:relative;}
.prog-card:hover{background:var(--off);}
.prog-card::after{content:'';position:absolute;bottom:0;left:0;right:0;height:1px;background:linear-gradient(to right,var(--gold),transparent);opacity:0;transition:opacity .2s;}
.prog-card:hover::after{opacity:1;}
.pc-top{display:flex;align-items:flex-start;justify-content:space-between;gap:1rem;margin-bottom:.6rem;}
.pc-name{font-family:'Cormorant Garamond',serif;font-size:1.05rem;font-weight:700;color:var(--maroon);}
.pc-badge{font-size:.58rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:.2rem .55rem;border-radius:2px;white-space:nowrap;flex-shrink:0;}
.pb-college{background:rgba(123,13,30,.08);color:var(--maroon);}
.pb-shs{background:rgba(201,160,48,.1);color:var(--goldD);}
.pb-grad{background:rgba(15,29,86,.08);color:#0f1d56;}
.pc-desc{font-size:.77rem;color:var(--muted);line-height:1.6;margin-bottom:.75rem;}
.pc-meta{display:flex;gap:1rem;flex-wrap:wrap;}
.pm{display:flex;align-items:center;gap:.4rem;font-size:.65rem;color:var(--muted);}
.pm-dot{width:4px;height:4px;border-radius:50%;background:var(--gold);flex-shrink:0;}
.pc-subjects{margin-top:.75rem;padding-top:.75rem;border-top:1px solid var(--border);}
.ps-label{font-size:.58rem;letter-spacing:.12em;text-transform:uppercase;color:var(--gold);font-weight:700;margin-bottom:.4rem;}
.ps-chips{display:flex;gap:.35rem;flex-wrap:wrap;}
.ps-chip{font-size:.63rem;background:var(--off);border:1px solid var(--border);color:var(--ink);padding:.18rem .55rem;border-radius:3px;}

/* ── FACULTY ── */
.faculty-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--border);border:1px solid var(--border);border-radius:4px;overflow:hidden;}
.fac-card{background:var(--white);padding:1.5rem 1.2rem;text-align:center;transition:background .18s;cursor:default;}
.fac-card:hover{background:var(--off);}
.fac-avatar{
  width:58px;height:58px;border-radius:50%;
  background:linear-gradient(135deg,var(--maroon),var(--maroonL));
  border:2px solid var(--gold);
  display:flex;align-items:center;justify-content:center;
  font-family:'Cormorant Garamond',serif;font-size:1.3rem;font-weight:700;
  color:var(--goldL);margin:0 auto .9rem;
}
.fac-card h4{font-family:'Cormorant Garamond',serif;font-size:.98rem;font-weight:700;color:var(--maroon);margin-bottom:2px;}
.fac-dept{font-size:.58rem;letter-spacing:.1em;text-transform:uppercase;color:var(--gold);font-weight:700;margin-bottom:.4rem;}
.fac-title{font-size:.7rem;color:var(--muted);margin-bottom:.5rem;}
.fac-tags{display:flex;gap:.3rem;flex-wrap:wrap;justify-content:center;}
.fac-tag{font-size:.6rem;background:var(--off);border:1px solid var(--border);color:var(--muted);padding:.15rem .45rem;border-radius:2px;}

/* ── ACADEMIC CALENDAR ── */
.cal-layout{display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;}
.sem-block{background:var(--white);border:1px solid var(--border);border-radius:4px;overflow:hidden;}
.sem-head{background:var(--maroon);padding:.9rem 1.2rem;border-bottom:2px solid var(--gold);}
.sem-head h3{font-family:'Cormorant Garamond',serif;font-size:1rem;font-weight:700;color:var(--white);}
.sem-head p{font-size:.62rem;color:rgba(255,255,255,.5);margin-top:2px;}
.cal-events{padding:.8rem 1.2rem;}
.cal-ev{display:flex;gap:.85rem;align-items:flex-start;padding:.65rem 0;border-bottom:1px solid var(--border);}
.cal-ev:last-child{border-bottom:none;}
.cev-date{min-width:52px;text-align:center;}
.cev-day{font-family:'Cormorant Garamond',serif;font-size:1.5rem;font-weight:700;color:var(--maroon);line-height:1;}
.cev-mon{font-size:.52rem;color:var(--gold);font-weight:700;letter-spacing:.1em;text-transform:uppercase;}
.cev-body h4{font-size:.78rem;font-weight:600;color:var(--ink);}
.cev-body p{font-size:.67rem;color:var(--muted);margin-top:1px;}
.cev-tag{display:inline-block;font-size:.56rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;padding:.12rem .4rem;border-radius:2px;margin-top:3px;}
.ct-exam{background:rgba(123,13,30,.08);color:var(--maroon);}
.ct-enroll{background:rgba(201,160,48,.1);color:var(--goldD);}
.ct-event{background:rgba(15,29,86,.07);color:#0f1d56;}
.ct-holiday{background:rgba(30,100,30,.08);color:#1a6420;}

/* ── LEARNING RESOURCES ── */
.resource-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:1px;background:var(--border);border:1px solid var(--border);border-radius:4px;overflow:hidden;}
.res-card{background:var(--white);padding:1.5rem;transition:all .18s;border-bottom:2px solid transparent;cursor:default;}
.res-card:hover{background:var(--maroon);border-bottom-color:var(--gold);}
.res-card:hover .res-title{color:var(--white);}
.res-card:hover .res-desc{color:rgba(255,255,255,.5);}
.res-card:hover .res-count{color:rgba(255,255,255,.35);}
.res-card:hover .res-link{color:var(--goldL);}
.res-icon{font-size:1.5rem;margin-bottom:.8rem;display:block;}
.res-title{font-family:'Cormorant Garamond',serif;font-size:1.05rem;font-weight:700;color:var(--maroon);margin-bottom:.35rem;transition:color .18s;}
.res-desc{font-size:.75rem;color:var(--muted);line-height:1.6;margin-bottom:.6rem;transition:color .18s;}
.res-count{font-size:.62rem;color:var(--muted);font-weight:600;transition:color .18s;}
.res-link{font-size:.64rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--maroon);text-decoration:none;border-bottom:1px solid var(--gold);padding-bottom:1px;transition:color .18s;display:inline-block;margin-top:.6rem;}

/* ── ASIDE WIDGETS ── */
.aside-widget{background:var(--white);border:1px solid var(--border);border-radius:4px;overflow:hidden;margin-bottom:1.2rem;}
.aw-head{background:var(--maroon);padding:.85rem 1.1rem;display:flex;align-items:center;gap:.6rem;}
.aw-head h4{font-size:.7rem;font-weight:700;color:var(--white);letter-spacing:.04em;}
.aw-head .awi{font-size:.9rem;}
.aw-body{padding:1.1rem;}
.aw-body p{font-size:.73rem;color:var(--muted);line-height:1.6;margin-bottom:.7rem;}
.quick-links{display:flex;flex-direction:column;gap:0;}
.ql-item{display:flex;align-items:center;justify-content:space-between;padding:.6rem 0;border-bottom:1px solid var(--border);text-decoration:none;color:inherit;transition:padding-left .15s;}
.ql-item:last-child{border-bottom:none;}
.ql-item:hover{padding-left:.4rem;}
.ql-item:hover .qa{color:var(--gold);}
.ql-label{font-size:.76rem;font-weight:600;color:var(--maroon);}
.ql-sub{font-size:.62rem;color:var(--muted);}
.qa{font-size:.85rem;color:var(--border);transition:color .15s;}
.notice-mini{display:flex;flex-direction:column;gap:0;}
.nm{display:flex;gap:.6rem;align-items:flex-start;padding:.6rem 0;border-bottom:1px solid var(--border);}
.nm:last-child{border-bottom:none;}
.nm-dot{width:5px;height:5px;border-radius:50%;background:var(--gold);flex-shrink:0;margin-top:5px;}
.nm p{font-size:.73rem;color:var(--ink);font-weight:500;line-height:1.4;}
.nm span{font-size:.6rem;color:var(--muted);display:block;margin-top:1px;}
.btn-aw{display:block;text-align:center;text-decoration:none;font-size:.7rem;font-weight:700;letter-spacing:.09em;text-transform:uppercase;padding:.6rem;border-radius:3px;transition:all .18s;font-family:'Plus Jakarta Sans',sans-serif;margin-bottom:.4rem;}
.btn-aw.filled{background:var(--maroon);color:var(--white);}
.btn-aw.filled:hover{background:var(--maroonL);}
.btn-aw.outline{border:1.5px solid var(--border);color:var(--maroon);}
.btn-aw.outline:hover{border-color:var(--maroon);background:rgba(123,13,30,.04);}

/* ── CTA BAND ── */
.cta-band{background:var(--maroon);display:flex;align-items:center;justify-content:space-between;padding:2.2rem 2.5rem;gap:2rem;flex-wrap:wrap;border-top:3px solid var(--gold);position:relative;overflow:hidden;}
.cta-band::before{content:'';position:absolute;right:-60px;top:50%;transform:translateY(-50%);width:300px;height:300px;border-radius:50%;border:1px solid rgba(201,160,48,.1);box-shadow:0 0 0 60px rgba(201,160,48,.04);}
.cta-text{position:relative;}
.cta-text h2{font-family:'Cormorant Garamond',serif;font-size:1.8rem;font-weight:600;color:var(--white);}
.cta-text p{font-size:.79rem;color:rgba(255,255,255,.5);margin-top:.3rem;}
.cta-btns{display:flex;gap:.7rem;flex-wrap:wrap;position:relative;}
.cta-btn{display:inline-block;text-decoration:none;font-size:.71rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:.68rem 1.4rem;border-radius:3px;transition:all .18s;font-family:'Plus Jakarta Sans',sans-serif;}
.cb-gold{background:var(--gold);color:var(--maroonD);}
.cb-gold:hover{background:var(--goldL);}
.cb-ghost{border:1.5px solid rgba(255,255,255,.25);color:rgba(255,255,255,.82);background:transparent;}
.cb-ghost:hover{border-color:var(--goldL);color:var(--goldL);}

/* ── FOOTER ── */
.foot-strip{background:var(--white);display:flex;align-items:center;justify-content:space-between;padding:.9rem 2.5rem;flex-wrap:wrap;gap:.5rem;border-top:1px solid var(--border);}
.foot-strip p{font-size:.64rem;color:var(--muted);}
.foot-strip a{font-size:.62rem;color:var(--muted);text-decoration:none;margin-left:1.2rem;transition:color .15s;}
.foot-strip a:hover{color:var(--maroon);}

@keyframes fadeUp{from{opacity:0;transform:translateY(16px);}to{opacity:1;transform:translateY(0);}}
.hero-inner{animation:fadeUp .6s .1s both;}

@media(max-width:960px){
  .body-wrap{grid-template-columns:1fr;}.aside{display:none;}
  .hero-inner{grid-template-columns:1fr;}.hi-right{display:none;}
  .faculty-grid,.resource-grid{grid-template-columns:1fr 1fr;}
  .cal-layout{grid-template-columns:1fr;}
  .nav-links a:not(.nav-cta){display:none;}
}
</style>
</head>
<body>

<!-- TICKER -->
<div class="ticker">
  <div class="ticker-tag">Updates</div>
  <div class="ticker-scroll">
    <div class="ticker-track">
      <span>Online Enrollment for 1st Sem AY 2026–2027 is now OPEN</span>
      <span>Academic Calendar for AY 2026–2027 has been released</span>
      <span>New Graduate School programs launching June 2026</span>
      <span>E-Library system upgraded — access via student portal</span>
      <span>Online Enrollment for 1st Sem AY 2026–2027 is now OPEN</span>
      <span>Academic Calendar for AY 2026–2027 has been released</span>
      <span>New Graduate School programs launching June 2026</span>
      <span>E-Library system upgraded — access via student portal</span>
    </div>
  </div>
</div>

<!-- NAV -->
<nav>
  <a class="nav-brand" href="index.php">
    <div class="nav-seal"><img src="uploads/datamex_logo.png" alt="Datamex logo"/></div>
    <div class="nav-name"><b>Datamex College</b><small>of Saint Adeline</small></div>
  </a>
  <div class="nav-links">
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="academics.php" class="active">Academics</a>
    <a href="admission.php">Admissions</a>
    <a href="campus_life.php">Campus Life</a>
    <a href="news.php">News</a>
    <a href="login.php" class="nav-cta">Portal Login</a>
  </div>
</nav>

<!-- PAGE HERO -->
<div class="page-hero">
  <div class="breadcrumb">
    <a href="index.php">Home</a><span class="sep">/</span><span class="cur">Academics</span>
  </div>
  <div class="hero-inner">
    <div>
      <div class="ph-eyebrow">Academic Excellence</div>
      <h1>Explore Our<br><em>Academic Programs</em></h1>
      <p class="hero-desc">Diverse programs designed to equip students with practical skills and theoretical knowledge. Our curriculum is regularly updated to meet industry standards and global trends.</p>
    </div>
    <div class="hi-right">
      <div class="hstat"><div class="n">12+</div><div class="l">Programs</div></div>
      <div class="hstat"><div class="n">200+</div><div class="l">Faculty</div></div>
      <div class="hstat"><div class="n">6</div><div class="l">Colleges</div></div>
      <div class="hstat"><div class="n">98%</div><div class="l">Employment</div></div>
    </div>
  </div>
</div>

<!-- SECTION NAV -->
<div class="sec-nav">
  <a href="#programs" class="active"><div class="sn">1</div>Program Overview</a>
  <a href="#faculty"><div class="sn">2</div>Faculty Profiles</a>
  <a href="#calendar"><div class="sn">3</div>Academic Calendar</a>
  <a href="#resources"><div class="sn">4</div>Learning Resources</a>
</div>

<!-- BODY -->
<div class="body-wrap">
  <div class="main">

    <!-- ── 1. PROGRAM OVERVIEW ── -->
    <div class="sec-block" id="programs">
      <div class="block-head">
        <div class="bh-icon">🎓</div>
        <div class="bh-text">
          <h2>Program Overview</h2>
          <p>Select a college to explore its programs and course offerings</p>
        </div>
      </div>

      <div class="college-tabs">
        <button class="ctab on" onclick="showCollege('it',this)">College of IT</button>
        <button class="ctab" onclick="showCollege('business',this)">Business</button>
        <button class="ctab" onclick="showCollege('education',this)">Education</button>
        <button class="ctab" onclick="showCollege('criminology',this)">Criminology</button>
        <button class="ctab" onclick="showCollege('hospitality',this)">Hospitality</button>
        <button class="ctab" onclick="showCollege('shs',this)">Senior High</button>
        <button class="ctab" onclick="showCollege('graduate',this)">Graduate School</button>
      </div>

      <!-- College of IT -->
      <div class="college-panel show" id="col-it">
        <div class="college-header">
          <div class="ch-badge">💻</div>
          <div class="ch-info">
            <h3>College of Information Technology</h3>
            <p>Preparing future tech leaders through cutting-edge curriculum and hands-on training</p>
          </div>
        </div>
        <div class="prog-cards">
          <div class="prog-card">
            <div class="pc-top">
              <div class="pc-name">Bachelor of Science in Information Technology</div>
              <span class="pc-badge pb-college">4 Years</span>
            </div>
            <p class="pc-desc">A comprehensive program covering software development, networking, database management, and cybersecurity. Graduates are equipped for careers in tech companies, startups, and government agencies.</p>
            <div class="pc-meta">
              <div class="pm"><div class="pm-dot"></div>4 Years · 8 Semesters</div>
              <div class="pm"><div class="pm-dot"></div>Board Exam eligible (LET-IT)</div>
              <div class="pm"><div class="pm-dot"></div>OJT: 500 hours</div>
            </div>
            <div class="pc-subjects">
              <div class="ps-label">Core Subjects</div>
              <div class="ps-chips">
                <span class="ps-chip">Programming 1 &amp; 2</span>
                <span class="ps-chip">Data Structures</span>
                <span class="ps-chip">Web Development</span>
                <span class="ps-chip">Database Management</span>
                <span class="ps-chip">Networking Fundamentals</span>
                <span class="ps-chip">Cybersecurity</span>
                <span class="ps-chip">Systems Analysis</span>
                <span class="ps-chip">Software Engineering</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- College of Business -->
      <div class="college-panel" id="col-business">
        <div class="college-header">
          <div class="ch-badge">💼</div>
          <div class="ch-info">
            <h3>College of Business Administration</h3>
            <p>Developing strategic thinkers and ethical business leaders for a dynamic global economy</p>
          </div>
        </div>
        <div class="prog-cards">
          <div class="prog-card">
            <div class="pc-top">
              <div class="pc-name">BS Business Administration — Major in Marketing Management</div>
              <span class="pc-badge pb-college">4 Years</span>
            </div>
            <p class="pc-desc">Focuses on consumer behavior, brand management, digital marketing, and sales strategy. Ideal for students aspiring to careers in advertising, sales, and brand development.</p>
            <div class="pc-meta">
              <div class="pm"><div class="pm-dot"></div>4 Years · 8 Semesters</div>
              <div class="pm"><div class="pm-dot"></div>OJT: 400 hours</div>
            </div>
            <div class="pc-subjects">
              <div class="ps-label">Core Subjects</div>
              <div class="ps-chips">
                <span class="ps-chip">Principles of Marketing</span>
                <span class="ps-chip">Consumer Behavior</span>
                <span class="ps-chip">Digital Marketing</span>
                <span class="ps-chip">Business Finance</span>
                <span class="ps-chip">Operations Management</span>
                <span class="ps-chip">Business Law</span>
              </div>
            </div>
          </div>
          <div class="prog-card">
            <div class="pc-top">
              <div class="pc-name">BS Business Administration — Major in Financial Management</div>
              <span class="pc-badge pb-college">4 Years</span>
            </div>
            <p class="pc-desc">Covers corporate finance, investment analysis, risk management, and accounting. Prepares graduates for roles in banking, finance, and investment sectors.</p>
            <div class="pc-meta">
              <div class="pm"><div class="pm-dot"></div>4 Years · 8 Semesters</div>
              <div class="pm"><div class="pm-dot"></div>CPA board preparation electives</div>
            </div>
            <div class="pc-subjects">
              <div class="ps-label">Core Subjects</div>
              <div class="ps-chips">
                <span class="ps-chip">Financial Accounting</span>
                <span class="ps-chip">Managerial Finance</span>
                <span class="ps-chip">Investment Analysis</span>
                <span class="ps-chip">Cost Accounting</span>
                <span class="ps-chip">Taxation</span>
                <span class="ps-chip">Risk Management</span>
              </div>
            </div>
          </div>
          <div class="prog-card">
            <div class="pc-top">
              <div class="pc-name">BS Business Administration — Major in Human Resource Management</div>
              <span class="pc-badge pb-college">4 Years</span>
            </div>
            <p class="pc-desc">Develops expertise in talent acquisition, labor relations, organizational behavior, and people management for careers in HR and corporate administration.</p>
            <div class="pc-meta">
              <div class="pm"><div class="pm-dot"></div>4 Years · 8 Semesters</div>
              <div class="pm"><div class="pm-dot"></div>OJT: 400 hours</div>
            </div>
            <div class="pc-subjects">
              <div class="ps-label">Core Subjects</div>
              <div class="ps-chips">
                <span class="ps-chip">Organizational Behavior</span>
                <span class="ps-chip">Labor Law</span>
                <span class="ps-chip">Recruitment &amp; Selection</span>
                <span class="ps-chip">Training &amp; Development</span>
                <span class="ps-chip">Compensation Management</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- College of Education -->
      <div class="college-panel" id="col-education">
        <div class="college-header">
          <div class="ch-badge">📐</div>
          <div class="ch-info">
            <h3>College of Education</h3>
            <p>Forming dedicated, competent, and passionate educators for the next generation</p>
          </div>
        </div>
        <div class="prog-cards">
          <div class="prog-card">
            <div class="pc-top">
              <div class="pc-name">Bachelor of Secondary Education — Major in English</div>
              <span class="pc-badge pb-college">4 Years</span>
            </div>
            <p class="pc-desc">Prepares future English teachers with strong linguistic, literary, and pedagogical foundations. Includes practice teaching and LET review integration.</p>
            <div class="pc-meta">
              <div class="pm"><div class="pm-dot"></div>4 Years · LET Board Exam</div>
              <div class="pm"><div class="pm-dot"></div>Practice Teaching: 1 semester</div>
            </div>
            <div class="pc-subjects"><div class="ps-label">Core Subjects</div><div class="ps-chips"><span class="ps-chip">Linguistics</span><span class="ps-chip">Literature</span><span class="ps-chip">Speech &amp; Oral Communication</span><span class="ps-chip">Teaching Strategies</span><span class="ps-chip">Curriculum Design</span></div></div>
          </div>
          <div class="prog-card">
            <div class="pc-top">
              <div class="pc-name">Bachelor of Secondary Education — Major in Mathematics</div>
              <span class="pc-badge pb-college">4 Years</span>
            </div>
            <p class="pc-desc">Develops mastery in mathematics and effective teaching methodologies for secondary level instruction.</p>
            <div class="pc-meta"><div class="pm"><div class="pm-dot"></div>4 Years · LET Board Exam</div><div class="pm"><div class="pm-dot"></div>Practice Teaching: 1 semester</div></div>
            <div class="pc-subjects"><div class="ps-label">Core Subjects</div><div class="ps-chips"><span class="ps-chip">Calculus</span><span class="ps-chip">Algebra</span><span class="ps-chip">Statistics</span><span class="ps-chip">Math Teaching Methods</span><span class="ps-chip">Assessment in Learning</span></div></div>
          </div>
          <div class="prog-card">
            <div class="pc-top">
              <div class="pc-name">Bachelor of Secondary Education — Major in Science</div>
              <span class="pc-badge pb-college">4 Years</span>
            </div>
            <p class="pc-desc">Equips future science teachers with in-depth knowledge of Biology, Chemistry, and Physics alongside modern teaching approaches.</p>
            <div class="pc-meta"><div class="pm"><div class="pm-dot"></div>4 Years · LET Board Exam</div></div>
            <div class="pc-subjects"><div class="ps-label">Core Subjects</div><div class="ps-chips"><span class="ps-chip">Biology</span><span class="ps-chip">Chemistry</span><span class="ps-chip">Physics</span><span class="ps-chip">Science Curriculum</span><span class="ps-chip">Laboratory Methods</span></div></div>
          </div>
        </div>
      </div>

      <!-- Criminology -->
      <div class="college-panel" id="col-criminology">
        <div class="college-header">
          <div class="ch-badge">⚖️</div>
          <div class="ch-info">
            <h3>College of Criminology</h3>
            <p>Preparing law enforcement professionals and justice advocates grounded in ethics and service</p>
          </div>
        </div>
        <div class="prog-cards">
          <div class="prog-card">
            <div class="pc-top">
              <div class="pc-name">Bachelor of Science in Criminology</div>
              <span class="pc-badge pb-college">4 Years</span>
            </div>
            <p class="pc-desc">Covers criminal law, forensic science, law enforcement administration, and criminal justice. Board exam preparatory with strong field exposure and simulation training.</p>
            <div class="pc-meta"><div class="pm"><div class="pm-dot"></div>4 Years · Criminologist Board Exam</div><div class="pm"><div class="pm-dot"></div>Field Practicum: 300 hours</div></div>
            <div class="pc-subjects"><div class="ps-label">Core Subjects</div><div class="ps-chips"><span class="ps-chip">Criminal Law 1 &amp; 2</span><span class="ps-chip">Forensic Science</span><span class="ps-chip">Police Administration</span><span class="ps-chip">Criminalistics</span><span class="ps-chip">Juvenile Delinquency</span><span class="ps-chip">Criminal Procedure</span></div></div>
          </div>
        </div>
      </div>

      <!-- Hospitality -->
      <div class="college-panel" id="col-hospitality">
        <div class="college-header">
          <div class="ch-badge">🏨</div>
          <div class="ch-info">
            <h3>College of Hospitality Management</h3>
            <p>Shaping service professionals for the global tourism and hospitality industry</p>
          </div>
        </div>
        <div class="prog-cards">
          <div class="prog-card">
            <div class="pc-top">
              <div class="pc-name">Bachelor of Science in Hospitality Management</div>
              <span class="pc-badge pb-college">4 Years</span>
            </div>
            <p class="pc-desc">Prepares students for careers in hotel and restaurant management, travel and tourism, and events planning. Includes internship with partner establishments locally and abroad.</p>
            <div class="pc-meta"><div class="pm"><div class="pm-dot"></div>4 Years · Industry OJT: 800 hours</div><div class="pm"><div class="pm-dot"></div>Partner hotels &amp; restaurants</div></div>
            <div class="pc-subjects"><div class="ps-label">Core Subjects</div><div class="ps-chips"><span class="ps-chip">Front Office Operations</span><span class="ps-chip">Food &amp; Beverage</span><span class="ps-chip">Housekeeping Management</span><span class="ps-chip">Tourism Planning</span><span class="ps-chip">Events Management</span><span class="ps-chip">Culinary Arts</span></div></div>
          </div>
        </div>
      </div>

      <!-- SHS -->
      <div class="college-panel" id="col-shs">
        <div class="college-header">
          <div class="ch-badge">📗</div>
          <div class="ch-info">
            <h3>Senior High School</h3>
            <p>Empowering Grade 11 &amp; 12 students with track-specific skills and college readiness</p>
          </div>
        </div>
        <div class="prog-cards">
          <div class="prog-card">
            <div class="pc-top"><div class="pc-name">STEM Track — Science, Technology, Engineering &amp; Mathematics</div><span class="pc-badge pb-shs">2 Years</span></div>
            <p class="pc-desc">Ideal for students planning to pursue engineering, medicine, IT, or science courses in college. Strong foundation in advanced Math and Laboratory Sciences.</p>
            <div class="pc-subjects"><div class="ps-label">Specialized Subjects</div><div class="ps-chips"><span class="ps-chip">Pre-Calculus</span><span class="ps-chip">Basic Calculus</span><span class="ps-chip">General Biology 1 &amp; 2</span><span class="ps-chip">General Chemistry</span><span class="ps-chip">General Physics</span></div></div>
          </div>
          <div class="prog-card">
            <div class="pc-top"><div class="pc-name">ABM Track — Accountancy, Business &amp; Management</div><span class="pc-badge pb-shs">2 Years</span></div>
            <p class="pc-desc">Designed for students interested in business, finance, and entrepreneurship. Strong preparation for BSBA, Accountancy, and related college courses.</p>
            <div class="pc-subjects"><div class="ps-label">Specialized Subjects</div><div class="ps-chips"><span class="ps-chip">Fundamentals of Accounting</span><span class="ps-chip">Business Math</span><span class="ps-chip">Organization &amp; Management</span><span class="ps-chip">Business Ethics</span></div></div>
          </div>
          <div class="prog-card">
            <div class="pc-top"><div class="pc-name">HUMSS Track — Humanities &amp; Social Sciences</div><span class="pc-badge pb-shs">2 Years</span></div>
            <p class="pc-desc">For students pursuing Education, Law, Communication, Political Science, or the Social Sciences in college.</p>
            <div class="pc-subjects"><div class="ps-label">Specialized Subjects</div><div class="ps-chips"><span class="ps-chip">Creative Writing</span><span class="ps-chip">Philippine Politics &amp; Governance</span><span class="ps-chip">Introduction to World Religions</span><span class="ps-chip">Media &amp; Information Literacy</span></div></div>
          </div>
          <div class="prog-card">
            <div class="pc-top"><div class="pc-name">GAS Track — General Academic Strand</div><span class="pc-badge pb-shs">2 Years</span></div>
            <p class="pc-desc">A flexible strand for students who are undecided on their college course, covering a broad range of subjects across all disciplines.</p>
            <div class="pc-subjects"><div class="ps-label">Specialized Subjects</div><div class="ps-chips"><span class="ps-chip">Elective subjects from STEM/ABM/HUMSS</span><span class="ps-chip">Research in Daily Life</span><span class="ps-chip">Disaster Readiness</span></div></div>
          </div>
        </div>
      </div>

      <!-- Graduate School -->
      <div class="college-panel" id="col-graduate">
        <div class="college-header">
          <div class="ch-badge">🏛️</div>
          <div class="ch-info">
            <h3>Graduate School</h3>
            <p>Advanced studies for working professionals seeking leadership and expertise</p>
          </div>
        </div>
        <div class="prog-cards">
          <div class="prog-card">
            <div class="pc-top"><div class="pc-name">Master of Business Administration (MBA)</div><span class="pc-badge pb-grad">2 Years</span></div>
            <p class="pc-desc">Designed for working professionals seeking to advance their managerial and strategic skills. Classes are held on evenings and weekends to accommodate busy schedules.</p>
            <div class="pc-meta"><div class="pm"><div class="pm-dot"></div>2 Years · Evening &amp; Weekend Classes</div><div class="pm"><div class="pm-dot"></div>Thesis or Non-Thesis option</div></div>
            <div class="pc-subjects"><div class="ps-label">Core Subjects</div><div class="ps-chips"><span class="ps-chip">Strategic Management</span><span class="ps-chip">Managerial Economics</span><span class="ps-chip">Business Research Methods</span><span class="ps-chip">Financial Management</span><span class="ps-chip">Leadership &amp; Ethics</span><span class="ps-chip">Operations &amp; Supply Chain</span></div></div>
          </div>
        </div>
      </div>
    </div>

    <!-- ── 2. FACULTY PROFILES ── -->
    <div class="sec-block" id="faculty">
      <div class="block-head">
        <div class="bh-icon">👨‍🏫</div>
        <div class="bh-text">
          <h2>Faculty Profiles</h2>
          <p>Meet our dedicated educators — experienced professionals and industry practitioners</p>
        </div>
      </div>
      <div class="faculty-grid">
        <div class="fac-card">
          <div class="fac-avatar">JF</div>
          <h4>Prof. Jose D. Flores</h4>
          <div class="fac-dept">College of IT</div>
          <div class="fac-title">Dean · MSIT · 15 years experience</div>
          <div class="fac-tags"><span class="fac-tag">Software Dev</span><span class="fac-tag">Cybersecurity</span></div>
        </div>
        <div class="fac-card">
          <div class="fac-avatar">ML</div>
          <h4>Dr. Maria S. Lozano</h4>
          <div class="fac-dept">College of IT</div>
          <div class="fac-title">Full Professor · PhD CS · Former Microsoft PH</div>
          <div class="fac-tags"><span class="fac-tag">AI &amp; ML</span><span class="fac-tag">Data Science</span></div>
        </div>
        <div class="fac-card">
          <div class="fac-avatar">CB</div>
          <h4>Prof. Clara M. Bautista</h4>
          <div class="fac-dept">College of Business</div>
          <div class="fac-title">Dean · MBA · CPA · 20 years experience</div>
          <div class="fac-tags"><span class="fac-tag">Finance</span><span class="fac-tag">Accounting</span></div>
        </div>
        <div class="fac-card">
          <div class="fac-avatar">RV</div>
          <h4>Prof. Ramon V. Dela Cruz</h4>
          <div class="fac-dept">College of Business</div>
          <div class="fac-title">Associate Professor · MBA Marketing</div>
          <div class="fac-tags"><span class="fac-tag">Marketing</span><span class="fac-tag">Digital Media</span></div>
        </div>
        <div class="fac-card">
          <div class="fac-avatar">SA</div>
          <h4>Dr. Sofia A. Reyes</h4>
          <div class="fac-dept">College of Education</div>
          <div class="fac-title">Full Professor · PhD Education · LPT</div>
          <div class="fac-tags"><span class="fac-tag">Curriculum Dev</span><span class="fac-tag">Assessment</span></div>
        </div>
        <div class="fac-card">
          <div class="fac-avatar">BM</div>
          <h4>Insp. Benjamin M. Ramos</h4>
          <div class="fac-dept">College of Criminology</div>
          <div class="fac-title">Associate Professor · PNP (Ret.) · MCrim</div>
          <div class="fac-tags"><span class="fac-tag">Criminal Law</span><span class="fac-tag">Forensics</span></div>
        </div>
        <div class="fac-card">
          <div class="fac-avatar">LT</div>
          <h4>Chef Liza T. Santos</h4>
          <div class="fac-dept">College of Hospitality</div>
          <div class="fac-title">Industry Professor · BSHM · Shangri-La Alumni</div>
          <div class="fac-tags"><span class="fac-tag">Culinary Arts</span><span class="fac-tag">F&amp;B Ops</span></div>
        </div>
        <div class="fac-card">
          <div class="fac-avatar">MR</div>
          <h4>Dr. Miguel R. Reyes</h4>
          <div class="fac-dept">Graduate School</div>
          <div class="fac-title">VP Academics · PhD Management</div>
          <div class="fac-tags"><span class="fac-tag">Strategy</span><span class="fac-tag">Leadership</span></div>
        </div>
        <div class="fac-card">
          <div class="fac-avatar">AC</div>
          <h4>Prof. Ana C. Villanueva</h4>
          <div class="fac-dept">Senior High School</div>
          <div class="fac-title">SHS Coordinator · MAEd · LPT</div>
          <div class="fac-tags"><span class="fac-tag">Research</span><span class="fac-tag">HUMSS</span></div>
        </div>
      </div>
      <p style="font-size:.73rem;color:var(--muted);margin-top:1rem;padding:.7rem;background:var(--off);border-left:2px solid var(--gold);border-radius:0 3px 3px 0;">Datamex College has over <strong style="color:var(--maroon);">200+ qualified faculty members</strong> — a mix of full-time professors, industry practitioners, and research scholars. For a complete faculty directory, please visit the Registrar's Office or contact the respective department.</p>
    </div>

    <!-- ── 3. ACADEMIC CALENDAR ── -->
    <div class="sec-block" id="calendar">
      <div class="block-head">
        <div class="bh-icon">📅</div>
        <div class="bh-text">
          <h2>Academic Calendar</h2>
          <p>AY 2025–2026 &amp; AY 2026–2027 key dates and events</p>
        </div>
      </div>
      <div class="cal-layout">
        <div class="sem-block">
          <div class="sem-head">
            <h3>2nd Semester · AY 2025–2026</h3>
            <p>January – May 2026</p>
          </div>
          <div class="cal-events">
            <div class="cal-ev">
              <div class="cev-date"><div class="cev-day">15</div><div class="cev-mon">Jan</div></div>
              <div class="cev-body"><h4>Classes Resume — 2nd Semester</h4><p>Regular classes begin after the holiday break</p><span class="cev-tag ct-event">Academic</span></div>
            </div>
            <div class="cal-ev">
              <div class="cev-date"><div class="cev-day">5</div><div class="cev-mon">Mar</div></div>
              <div class="cev-body"><h4>Midterm Examinations</h4><p>March 5–12, 2026 · See department for schedule</p><span class="cev-tag ct-exam">Exam Week</span></div>
            </div>
            <div class="cal-ev">
              <div class="cev-date"><div class="cev-day">20</div><div class="cev-mon">Mar</div></div>
              <div class="cev-body"><h4>Online Enrollment Opens — 1st Sem AY 2026–27</h4><p>Via student portal · Priority for continuing students</p><span class="cev-tag ct-enroll">Enrollment</span></div>
            </div>
            <div class="cal-ev">
              <div class="cev-date"><div class="cev-day">9</div><div class="cev-mon">Apr</div></div>
              <div class="cev-body"><h4>Holy Week Break</h4><p>April 9–12, 2026 · No classes</p><span class="cev-tag ct-holiday">Holiday</span></div>
            </div>
            <div class="cal-ev">
              <div class="cev-date"><div class="cev-day">20</div><div class="cev-mon">Apr</div></div>
              <div class="cev-body"><h4>Final Examinations</h4><p>April 20–27, 2026 · Refer to posted schedules</p><span class="cev-tag ct-exam">Exam Week</span></div>
            </div>
            <div class="cal-ev">
              <div class="cev-date"><div class="cev-day">15</div><div class="cev-mon">Apr</div></div>
              <div class="cev-body"><h4>Graduation Ceremony 2026</h4><p>Datamex Sports Complex · Batch 2026</p><span class="cev-tag ct-event">Commencement</span></div>
            </div>
            <div class="cal-ev">
              <div class="cev-date"><div class="cev-day">5</div><div class="cev-mon">May</div></div>
              <div class="cev-body"><h4>Grades Submission Deadline</h4><p>Faculty submission of final grades to Registrar</p><span class="cev-tag ct-exam">Academic</span></div>
            </div>
          </div>
        </div>

        <div class="sem-block">
          <div class="sem-head">
            <h3>1st Semester · AY 2026–2027</h3>
            <p>June – October 2026</p>
          </div>
          <div class="cal-events">
            <div class="cal-ev">
              <div class="cev-date"><div class="cev-day">1</div><div class="cev-mon">Jun</div></div>
              <div class="cev-body"><h4>Enrollment Period</h4><p>June 1–14, 2026 · Online and walk-in enrollment</p><span class="cev-tag ct-enroll">Enrollment</span></div>
            </div>
            <div class="cal-ev">
              <div class="cev-date"><div class="cev-day">15</div><div class="cev-mon">Jun</div></div>
              <div class="cev-body"><h4>First Day of Classes</h4><p>1st Semester AY 2026–2027 begins</p><span class="cev-tag ct-event">Academic</span></div>
            </div>
            <div class="cal-ev">
              <div class="cev-date"><div class="cev-day">12</div><div class="cev-mon">Jun</div></div>
              <div class="cev-body"><h4>Independence Day — No Classes</h4><p>National holiday</p><span class="cev-tag ct-holiday">Holiday</span></div>
            </div>
            <div class="cal-ev">
              <div class="cev-date"><div class="cev-day">10</div><div class="cev-mon">Aug</div></div>
              <div class="cev-body"><h4>Midterm Examinations</h4><p>August 10–17, 2026 · All departments</p><span class="cev-tag ct-exam">Exam Week</span></div>
            </div>
            <div class="cal-ev">
              <div class="cev-date"><div class="cev-day">21</div><div class="cev-mon">Aug</div></div>
              <div class="cev-body"><h4>Ninoy Aquino Day — No Classes</h4><p>National holiday</p><span class="cev-tag ct-holiday">Holiday</span></div>
            </div>
            <div class="cal-ev">
              <div class="cev-date"><div class="cev-day">5</div><div class="cev-mon">Oct</div></div>
              <div class="cev-body"><h4>Final Examinations</h4><p>October 5–12, 2026 · End of 1st Semester</p><span class="cev-tag ct-exam">Exam Week</span></div>
            </div>
            <div class="cal-ev">
              <div class="cev-date"><div class="cev-day">20</div><div class="cev-mon">Oct</div></div>
              <div class="cev-body"><h4>Enrollment — 2nd Semester Opens</h4><p>Online enrollment for 2nd Semester AY 2026–2027</p><span class="cev-tag ct-enroll">Enrollment</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ── 4. LEARNING RESOURCES ── -->
    <div class="sec-block" id="resources">
      <div class="block-head">
        <div class="bh-icon">📚</div>
        <div class="bh-text">
          <h2>Learning Resources</h2>
          <p>Tools, platforms, and facilities supporting your academic journey</p>
        </div>
      </div>
      <div class="resource-grid">
        <div class="res-card">
          <span class="res-icon">📖</span>
          <div class="res-title">Library &amp; E-Library</div>
          <p class="res-desc">Access thousands of physical books, academic journals, and digital resources through the Datamex Library Management System. Available 24/7 for enrolled students via the student portal.</p>
          <div class="res-count">5,000+ physical books · 10,000+ e-books &amp; journals</div>
          <a href="#" class="res-link">Access E-Library →</a>
        </div>
        <div class="res-card">
          <span class="res-icon">🖥️</span>
          <div class="res-title">Learning Management System (LMS)</div>
          <p class="res-desc">Our integrated LMS provides access to course modules, lecture recordings, quizzes, assignment submissions, and real-time grades — anytime, anywhere.</p>
          <div class="res-count">All programs · Updated each semester</div>
          <a href="#" class="res-link">Go to LMS →</a>
        </div>
        <div class="res-card">
          <span class="res-icon">🔬</span>
          <div class="res-title">Laboratories &amp; Facilities</div>
          <p class="res-desc">State-of-the-art computer labs, science laboratories, a culinary kitchen, a mock hotel room, and multimedia rooms — designed for hands-on, practical learning.</p>
          <div class="res-count">12 computer labs · 4 science labs · Culinary kitchen</div>
          <a href="#" class="res-link">View Facilities →</a>
        </div>
        <div class="res-card">
          <span class="res-icon">🎥</span>
          <div class="res-title">Lecture Recordings &amp; Media</div>
          <p class="res-desc">Missed a class? All major lectures are recorded and uploaded to the student portal within 24 hours. Supplementary videos and tutorial content are also available per subject.</p>
          <div class="res-count">Available per enrolled course</div>
          <a href="#" class="res-link">Watch Recordings →</a>
        </div>
        <div class="res-card">
          <span class="res-icon">📝</span>
          <div class="res-title">Research &amp; Publication Hub</div>
          <p class="res-desc">Browse past thesis and capstone projects, access research templates, and submit your own work to the Datamex Institutional Repository — building a culture of inquiry and scholarship.</p>
          <div class="res-count">200+ institutional research papers</div>
          <a href="#" class="res-link">View Repository →</a>
        </div>
        <div class="res-card">
          <span class="res-icon">🤝</span>
          <div class="res-title">Tutoring &amp; Academic Support</div>
          <p class="res-desc">Peer tutoring sessions, faculty consultation hours, and academic coaching are available for students who need additional support. Schedule via the student portal or visit the Academic Affairs Office.</p>
          <div class="res-count">Mon–Fri · Walk-in or by appointment</div>
          <a href="#" class="res-link">Schedule a Session →</a>
        </div>
      </div>
    </div>

  </div><!-- /main -->

  <!-- ASIDE -->
  <div class="aside">
    <div class="aside-widget">
      <div class="aw-head"><span class="awi">🔗</span><h4>Quick Navigation</h4></div>
      <div class="aw-body">
        <div class="quick-links">
          <a href="#programs" class="ql-item"><div><div class="ql-label">Program Overview</div><div class="ql-sub">All colleges &amp; programs</div></div><div class="qa">›</div></a>
          <a href="#faculty" class="ql-item"><div><div class="ql-label">Faculty Profiles</div><div class="ql-sub">Meet our educators</div></div><div class="qa">›</div></a>
          <a href="#calendar" class="ql-item"><div><div class="ql-label">Academic Calendar</div><div class="ql-sub">Key dates &amp; exams</div></div><div class="qa">›</div></a>
          <a href="#resources" class="ql-item"><div><div class="ql-label">Learning Resources</div><div class="ql-sub">Library, LMS, labs</div></div><div class="qa">›</div></a>
        </div>
      </div>
    </div>

    <div class="aside-widget">
      <div class="aw-head"><span class="awi">📢</span><h4>Academic Notices</h4></div>
      <div class="aw-body">
        <div class="notice-mini">
          <div class="nm"><div class="nm-dot"></div><div><p>Final exam schedule for 2nd Sem is out</p><span>Check your department board</span></div></div>
          <div class="nm"><div class="nm-dot"></div><div><p>LMS upgraded — re-login required for all users</p><span>IT Help Desk · Local 105</span></div></div>
          <div class="nm"><div class="nm-dot"></div><div><p>Enrollment opens June 1 for 1st Sem AY 2026–27</p><span>Via student portal</span></div></div>
          <div class="nm"><div class="nm-dot"></div><div><p>Research defense schedules posted in departments</p><span>4th Year students</span></div></div>
        </div>
      </div>
    </div>

    <div class="aside-widget">
      <div class="aw-head"><span class="awi">🎓</span><h4>Interested to Enroll?</h4></div>
      <div class="aw-body">
        <p>Applications for AY 2026–2027 are now open across all programs.</p>
        <a href="admission.php#apply" class="btn-aw filled">Apply Now →</a>
        <a href="admission.php#requirements" class="btn-aw outline">View Requirements</a>
      </div>
    </div>

    <div class="aside-widget">
      <div class="aw-head"><span class="awi">📞</span><h4>Academic Affairs Office</h4></div>
      <div class="aw-body" style="font-size:.72rem;color:var(--muted);line-height:1.7;">
        <p><strong style="color:var(--maroon);">Office of the VP for Academics</strong><br>2nd Floor, Main Building<br>Mon–Fri · 8AM–5PM</p>
        <p style="margin-top:.6rem;">vpaa@datamex.edu.ph<br>Local 104</p>
      </div>
    </div>
  </div>
</div>

<!-- CTA -->
<div class="cta-band">
  <div class="cta-text">
    <h2>Ready to start your academic journey?</h2>
    <p>Choose your program and apply for AY 2026–2027 today.</p>
  </div>
  <div class="cta-btns">
    <a href="admission.php#apply" class="cta-btn cb-gold">Apply Now</a>
    <a href="index.php" class="cta-btn cb-ghost">Back to Homepage</a>
  </div>
</div>

<div class="foot-strip">
  <p>© 2026 Datamex College of Saint Adeline. All rights reserved.</p>
  <div>
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="admission.php">Admissions</a>
    <a href="#">Privacy Policy</a>
  </div>
</div>

<script>
function showCollege(id, btn) {
  document.querySelectorAll('.college-panel').forEach(p => p.classList.remove('show'));
  document.querySelectorAll('.ctab').forEach(b => b.classList.remove('on'));
  document.getElementById('col-' + id).classList.add('show');
  btn.classList.add('on');
}

// Section nav scroll highlight
const sections = document.querySelectorAll('.sec-block');
const links = document.querySelectorAll('.sec-nav a');
window.addEventListener('scroll', () => {
  let current = '';
  sections.forEach(s => { if (window.scrollY >= s.offsetTop - 100) current = s.id; });
  links.forEach(l => {
    l.classList.remove('active');
    if (l.getAttribute('href') === '#' + current) l.classList.add('active');
  });
});
</script>
</body>
</html>
