<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Campus Life — Datamex College of Saint Adeline</title>
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
.hero-inner{position:relative;z-index:1;display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:flex-end;padding-bottom:0;animation:fadeUp .6s .1s both;}
.ph-eyebrow{font-size:.62rem;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);font-weight:600;margin-bottom:.8rem;display:flex;align-items:center;gap:8px;}
.ph-eyebrow::before{content:'';width:18px;height:1px;background:var(--gold);}
.page-hero h1{font-family:'Cormorant Garamond',serif;font-size:clamp(2.4rem,4.5vw,3.8rem);font-weight:400;color:var(--white);line-height:1.08;margin-bottom:1.2rem;}
.page-hero h1 em{font-style:italic;color:var(--goldL);display:block;}
.hero-desc{font-size:.88rem;color:rgba(255,255,255,.58);line-height:1.75;font-weight:300;max-width:480px;}
.hi-right{display:grid;grid-template-columns:1fr 1fr;gap:1px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.1);border-bottom:none;border-radius:4px 4px 0 0;overflow:hidden;align-self:flex-end;}
.hstat{background:rgba(0,0,0,.18);padding:1.4rem 1.2rem;}
.hstat .n{font-family:'Cormorant Garamond',serif;font-size:2.2rem;font-weight:700;color:var(--gold);line-height:1;}
.hstat .l{font-size:.6rem;color:rgba(255,255,255,.45);text-transform:uppercase;letter-spacing:.1em;margin-top:4px;font-weight:500;}
@keyframes fadeUp{from{opacity:0;transform:translateY(16px);}to{opacity:1;transform:translateY(0);}}

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

/* ── ORG FILTER TABS ── */
.filter-tabs{display:flex;gap:.45rem;margin-bottom:1.5rem;flex-wrap:wrap;}
.ftab{font-size:.69rem;font-weight:600;letter-spacing:.04em;padding:.36rem .9rem;border-radius:20px;border:1.5px solid var(--border);background:var(--white);color:var(--muted);cursor:pointer;transition:all .18s;font-family:'Plus Jakarta Sans',sans-serif;}
.ftab.on{background:var(--maroon);color:var(--white);border-color:var(--maroon);}
.ftab:hover:not(.on){border-color:var(--maroon);color:var(--maroon);}

/* ── ORG GRID ── */
.org-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--border);border:1px solid var(--border);border-radius:4px;overflow:hidden;}
.org-card{background:var(--white);padding:1.4rem 1.2rem;transition:background .18s;cursor:default;position:relative;overflow:hidden;}
.org-card:hover{background:var(--off);}
.org-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gold);transform:scaleX(0);transform-origin:left;transition:transform .25s;}
.org-card:hover::before{transform:scaleX(1);}
.org-type{font-size:.57rem;letter-spacing:.14em;text-transform:uppercase;font-weight:700;color:var(--gold);margin-bottom:.5rem;}
.org-name{font-family:'Cormorant Garamond',serif;font-size:1rem;font-weight:700;color:var(--maroon);margin-bottom:.35rem;line-height:1.3;}
.org-desc{font-size:.73rem;color:var(--muted);line-height:1.55;margin-bottom:.65rem;}
.org-meta{display:flex;gap:.75rem;flex-wrap:wrap;}
.om{display:flex;align-items:center;gap:.35rem;font-size:.62rem;color:var(--muted);}
.om-dot{width:4px;height:4px;border-radius:50%;background:var(--gold);}
.org-card[data-type="academic"]{display:block;}
.org-card[data-type="cultural"]{display:block;}
.org-card[data-type="civic"]{display:block;}
.org-card[data-type="religious"]{display:block;}
.org-card[data-type="sports"]{display:block;}
.org-card.hidden{display:none;}

/* ── EVENTS ── */
.events-layout{display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;}
.ev-col h3{font-family:'Cormorant Garamond',serif;font-size:1rem;font-weight:700;color:var(--maroon);margin-bottom:1rem;padding-bottom:.6rem;border-bottom:1px solid var(--border);}
.event-card{background:var(--white);border:1px solid var(--border);border-radius:4px;margin-bottom:.75rem;overflow:hidden;transition:box-shadow .18s;}
.event-card:hover{box-shadow:0 4px 20px rgba(123,13,30,.1);}
.ec-top{background:var(--maroon);padding:.9rem 1.1rem;display:flex;align-items:center;gap:1rem;border-bottom:2px solid var(--gold);}
.ec-date{text-align:center;min-width:40px;}
.ec-day{font-family:'Cormorant Garamond',serif;font-size:1.7rem;font-weight:700;color:var(--goldL);line-height:1;}
.ec-mon{font-size:.52rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.45);}
.ec-title{font-size:.85rem;font-weight:700;color:var(--white);line-height:1.3;}
.ec-subtitle{font-size:.66rem;color:rgba(255,255,255,.5);margin-top:2px;}
.ec-body{padding:.9rem 1.1rem;}
.ec-body p{font-size:.75rem;color:var(--muted);line-height:1.6;}
.ec-tags{display:flex;gap:.35rem;flex-wrap:wrap;margin-top:.6rem;}
.etag{font-size:.58rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;padding:.15rem .45rem;border-radius:2px;}
.et-academic{background:rgba(123,13,30,.08);color:var(--maroon);}
.et-cultural{background:rgba(201,160,48,.1);color:var(--goldD);}
.et-sports{background:rgba(15,80,15,.07);color:#1a6020;}
.et-civic{background:rgba(15,29,86,.07);color:#0f1d56;}

/* Past events list */
.past-list{display:flex;flex-direction:column;gap:0;}
.past-item{display:flex;gap:.85rem;align-items:flex-start;padding:.7rem 0;border-bottom:1px solid var(--border);}
.past-item:last-child{border-bottom:none;}
.pi-date{font-family:'Cormorant Garamond',serif;font-size:1.2rem;font-weight:700;color:var(--maroon);line-height:1;min-width:32px;text-align:center;}
.pi-mon{font-size:.5rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--gold);}
.pi-body h4{font-size:.78rem;font-weight:600;color:var(--ink);}
.pi-body p{font-size:.67rem;color:var(--muted);}

/* ── SPORTS ── */
.sports-intro{font-size:.86rem;color:var(--muted);line-height:1.75;margin-bottom:1.5rem;padding:.9rem 1.1rem;background:var(--off);border-left:2px solid var(--gold);border-radius:0 4px 4px 0;}
.sports-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:1px;background:var(--border);border:1px solid var(--border);border-radius:4px;overflow:hidden;margin-bottom:1.5rem;}
.sport-card{background:var(--white);padding:1.3rem 1.2rem;transition:all .18s;border-bottom:2px solid transparent;cursor:default;}
.sport-card:hover{background:var(--maroon);border-bottom-color:var(--gold);}
.sport-card:hover .sc-name{color:var(--white);}
.sport-card:hover .sc-desc{color:rgba(255,255,255,.5);}
.sport-card:hover .sc-meta{color:rgba(255,255,255,.35);}
.sport-card:hover .sc-status{border-color:rgba(255,255,255,.2);color:rgba(255,255,255,.6);}
.sc-top{display:flex;align-items:center;justify-content:space-between;margin-bottom:.5rem;}
.sc-icon{font-size:1.3rem;}
.sc-status{font-size:.57rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:.18rem .5rem;border-radius:2px;border:1.5px solid var(--border);color:var(--muted);transition:all .18s;}
.ss-active{border-color:rgba(30,120,30,.3);color:#1a6020;background:rgba(30,120,30,.06);}
.sc-name{font-family:'Cormorant Garamond',serif;font-size:1rem;font-weight:700;color:var(--maroon);margin-bottom:.3rem;transition:color .18s;}
.sc-desc{font-size:.73rem;color:var(--muted);line-height:1.5;transition:color .18s;}
.sc-meta{font-size:.62rem;color:var(--muted);margin-top:.4rem;font-weight:500;transition:color .18s;}

/* Intramurals highlight */
.intra-band{
  background:var(--maroon);border-radius:4px;
  padding:1.5rem;display:grid;
  grid-template-columns:1fr auto;gap:1.5rem;
  align-items:center;position:relative;overflow:hidden;
  margin-top:1.5rem;
}
.intra-band::after{content:'';position:absolute;right:-30px;top:50%;transform:translateY(-50%);width:160px;height:160px;border-radius:50%;border:1px solid rgba(201,160,48,.12);box-shadow:0 0 0 30px rgba(201,160,48,.04);}
.ib-label{font-size:.6rem;letter-spacing:.18em;text-transform:uppercase;color:var(--gold);font-weight:700;margin-bottom:.5rem;}
.intra-band h3{font-family:'Cormorant Garamond',serif;font-size:1.4rem;font-weight:700;color:var(--white);margin-bottom:.4rem;}
.intra-band p{font-size:.77rem;color:rgba(255,255,255,.55);line-height:1.6;}
.ib-right{position:relative;z-index:1;text-align:center;}
.ib-date-big{font-family:'Cormorant Garamond',serif;font-size:2.5rem;font-weight:700;color:var(--goldL);line-height:1;}
.ib-date-sub{font-size:.6rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.4);margin-top:2px;}
.btn-intra{
  display:inline-block;margin-top:.8rem;text-decoration:none;
  font-size:.68rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;
  padding:.55rem 1.2rem;border-radius:3px;
  background:var(--gold);color:var(--maroonD);transition:background .18s;
}
.btn-intra:hover{background:var(--goldL);}

/* Achievement strip */
.achieve-strip{display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:var(--border);border:1px solid var(--border);border-radius:4px;overflow:hidden;margin-top:1.5rem;}
.ac-item{background:var(--white);padding:1.1rem;text-align:center;transition:background .18s;}
.ac-item:hover{background:var(--off);}
.ac-icon{font-size:1.2rem;margin-bottom:.4rem;}
.ac-n{font-family:'Cormorant Garamond',serif;font-size:1.6rem;font-weight:700;color:var(--maroon);line-height:1;}
.ac-l{font-size:.6rem;color:var(--muted);text-transform:uppercase;letter-spacing:.08em;margin-top:3px;font-weight:600;}

/* ── ASIDE ── */
.aside-widget{background:var(--white);border:1px solid var(--border);border-radius:4px;overflow:hidden;margin-bottom:1.2rem;}
.aw-head{background:var(--maroon);padding:.85rem 1.1rem;display:flex;align-items:center;gap:.6rem;}
.aw-head h4{font-size:.7rem;font-weight:700;color:var(--white);letter-spacing:.04em;}
.aw-head .awi{font-size:.9rem;}
.aw-body{padding:1.1rem;}
.aw-body p{font-size:.73rem;color:var(--muted);line-height:1.6;margin-bottom:.7rem;}
.quick-links{display:flex;flex-direction:column;}
.ql-item{display:flex;align-items:center;justify-content:space-between;padding:.6rem 0;border-bottom:1px solid var(--border);text-decoration:none;color:inherit;transition:padding-left .15s;}
.ql-item:last-child{border-bottom:none;}
.ql-item:hover{padding-left:.4rem;}
.ql-item:hover .qa{color:var(--gold);}
.ql-label{font-size:.76rem;font-weight:600;color:var(--maroon);}
.ql-sub{font-size:.62rem;color:var(--muted);}
.qa{font-size:.85rem;color:var(--border);transition:color .15s;}
.upcoming-mini{display:flex;flex-direction:column;gap:0;}
.um-item{display:flex;gap:.7rem;align-items:flex-start;padding:.6rem 0;border-bottom:1px solid var(--border);}
.um-item:last-child{border-bottom:none;}
.um-date{font-family:'Cormorant Garamond',serif;font-size:1.2rem;font-weight:700;color:var(--maroon);line-height:1;text-align:center;min-width:26px;}
.um-mon{font-size:.5rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--gold);}
.um-body h5{font-size:.74rem;font-weight:600;color:var(--ink);}
.um-body p{font-size:.62rem;color:var(--muted);}
.btn-aw{display:block;text-align:center;text-decoration:none;font-size:.7rem;font-weight:700;letter-spacing:.09em;text-transform:uppercase;padding:.6rem;border-radius:3px;transition:all .18s;font-family:'Plus Jakarta Sans',sans-serif;margin-bottom:.4rem;}
.btn-aw.filled{background:var(--maroon);color:var(--white);}
.btn-aw.filled:hover{background:var(--maroonL);}
.btn-aw.outline{border:1.5px solid var(--border);color:var(--maroon);}
.btn-aw.outline:hover{border-color:var(--maroon);}

/* ── CTA ── */
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

@media(max-width:960px){
  .body-wrap{grid-template-columns:1fr;}.aside{display:none;}
  .hero-inner{grid-template-columns:1fr;}.hi-right{display:none;}
  .org-grid{grid-template-columns:1fr 1fr;}
  .events-layout,.sports-grid{grid-template-columns:1fr;}
  .achieve-strip{grid-template-columns:1fr 1fr;}
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
      <span>Intramurals 2026 — March 28–30 · Gymnasium &amp; Sports Fields</span>
      <span>Cultural Night &amp; Prom Night — April 10 · Grand Ballroom</span>
      <span>Student organization applications open until April 5</span>
      <span>Campus Clean-up Drive — March 25 · All students welcome</span>
      <span>Intramurals 2026 — March 28–30 · Gymnasium &amp; Sports Fields</span>
      <span>Cultural Night &amp; Prom Night — April 10 · Grand Ballroom</span>
      <span>Student organization applications open until April 5</span>
      <span>Campus Clean-up Drive — March 25 · All students welcome</span>
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
    <a href="academics.php">Academics</a>
    <a href="admission.php">Admissions</a>
    <a href="campus_life.php" class="active">Campus Life</a>
    <a href="news.php">News</a>
    <a href="login.php" class="nav-cta">Portal Login</a>
  </div>
</nav>

<!-- PAGE HERO -->
<div class="page-hero">
  <div class="breadcrumb">
    <a href="index.php">Home</a><span class="sep">/</span><span class="cur">Campus Life</span>
  </div>
  <div class="hero-inner">
    <div>
      <div class="ph-eyebrow">Life at Datamex</div>
      <h1>Vibrant.<br><em>Alive. Yours.</em></h1>
      <p class="hero-desc">Experience a vibrant campus community through organizations, events, and student activities. Life at Datamex goes far beyond the classroom — it's where friendships are forged and memories are made.</p>
    </div>
    <div class="hi-right">
      <div class="hstat"><div class="n">40+</div><div class="l">Organizations</div></div>
      <div class="hstat"><div class="n">20+</div><div class="l">Events/Year</div></div>
      <div class="hstat"><div class="n">12</div><div class="l">Sports</div></div>
      <div class="hstat"><div class="n">5K+</div><div class="l">Students</div></div>
    </div>
  </div>
</div>

<!-- SECTION NAV -->
<div class="sec-nav">
  <a href="#organizations" class="active"><div class="sn">1</div>Student Organizations</a>
  <a href="#events"><div class="sn">2</div>Events &amp; Activities</a>
  <a href="#sports"><div class="sn">3</div>Sports &amp; Athletics</a>
</div>

<!-- BODY -->
<div class="body-wrap">
  <div class="main">

    <!-- ── 1. STUDENT ORGANIZATIONS ── -->
    <div class="sec-block" id="organizations">
      <div class="block-head">
        <div class="bh-icon">🏛️</div>
        <div class="bh-text">
          <h2>Student Organizations</h2>
          <p>Over 40 active organizations — find your community, build your leadership</p>
        </div>
      </div>

      <p style="font-size:.85rem;color:var(--muted);line-height:1.75;margin-bottom:1.5rem;">Joining a student organization at Datamex is one of the best ways to grow beyond the classroom. From academic clubs to cultural groups and civic organizations, there's a place for every student to belong, lead, and thrive.</p>

      <div class="filter-tabs">
        <button class="ftab on" onclick="filterOrgs('all',this)">All Organizations</button>
        <button class="ftab" onclick="filterOrgs('academic',this)">Academic</button>
        <button class="ftab" onclick="filterOrgs('cultural',this)">Cultural</button>
        <button class="ftab" onclick="filterOrgs('civic',this)">Civic &amp; Service</button>
        <button class="ftab" onclick="filterOrgs('religious',this)">Religious</button>
        <button class="ftab" onclick="filterOrgs('sports',this)">Sports</button>
      </div>

      <div class="org-grid" id="orgGrid">

        <div class="org-card" data-type="academic">
          <div class="org-type">Academic</div>
          <div class="org-name">Junior IT Society (JITS)</div>
          <p class="org-desc">The official organization of BSIT students. Hosts tech talks, hackathons, coding bootcamps, and industry immersion activities.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>College of IT</div>
            <div class="om"><div class="om-dot"></div>200+ members</div>
          </div>
        </div>

        <div class="org-card" data-type="academic">
          <div class="org-type">Academic</div>
          <div class="org-name">Junior Philippine Institute of Accountants (JPIA)</div>
          <p class="org-desc">Prepares future accountants through seminars, CPA board review sessions, and accounting competitions.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>College of Business</div>
            <div class="om"><div class="om-dot"></div>150+ members</div>
          </div>
        </div>

        <div class="org-card" data-type="academic">
          <div class="org-type">Academic</div>
          <div class="org-name">Future Educators League (FEL)</div>
          <p class="org-desc">For Education majors committed to developing teaching excellence. Organizes LET review sessions, demo lessons, and literacy outreach.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>College of Education</div>
            <div class="om"><div class="om-dot"></div>120+ members</div>
          </div>
        </div>

        <div class="org-card" data-type="academic">
          <div class="org-type">Academic</div>
          <div class="org-name">Criminology Students Society (CSS)</div>
          <p class="org-desc">Organizes moot court simulations, crime scene analysis workshops, and field visits to law enforcement agencies.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>College of Criminology</div>
            <div class="om"><div class="om-dot"></div>130+ members</div>
          </div>
        </div>

        <div class="org-card" data-type="academic">
          <div class="org-type">Academic</div>
          <div class="org-name">Hospitality &amp; Tourism Club (HTC)</div>
          <p class="org-desc">Brings hotel and tourism students together for culinary competitions, service training, and industry networking events.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>College of Hospitality</div>
            <div class="om"><div class="om-dot"></div>100+ members</div>
          </div>
        </div>

        <div class="org-card" data-type="academic">
          <div class="org-type">Academic</div>
          <div class="org-name">Research &amp; Innovation Society</div>
          <p class="org-desc">Fosters a culture of inquiry through research forums, thesis mentoring, and participation in national student research competitions.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>All Colleges</div>
            <div class="om"><div class="om-dot"></div>80+ members</div>
          </div>
        </div>

        <div class="org-card" data-type="cultural">
          <div class="org-type">Cultural</div>
          <div class="org-name">Datamex Dance Company (DDC)</div>
          <p class="org-desc">The premier dance troupe of Datamex — performs at school events, cultural festivals, and intercollegiate dance competitions.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>All Colleges</div>
            <div class="om"><div class="om-dot"></div>60+ members</div>
          </div>
        </div>

        <div class="org-card" data-type="cultural">
          <div class="org-type">Cultural</div>
          <div class="org-name">Musika at Sining Club</div>
          <p class="org-desc">A community of student musicians, visual artists, and theater performers. Organizes campus art exhibits, open mic nights, and the annual variety show.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>All Colleges</div>
            <div class="om"><div class="om-dot"></div>90+ members</div>
          </div>
        </div>

        <div class="org-card" data-type="cultural">
          <div class="org-type">Cultural</div>
          <div class="org-name">Kalinangan Literary Society</div>
          <p class="org-desc">Celebrates Filipino and world literature through creative writing workshops, poetry slams, and the annual campus literary magazine.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>All Colleges</div>
            <div class="om"><div class="om-dot"></div>50+ members</div>
          </div>
        </div>

        <div class="org-card" data-type="civic">
          <div class="org-type">Civic &amp; Service</div>
          <div class="org-name">Datamex Community Builders</div>
          <p class="org-desc">Leads campus-wide community outreach, disaster relief operations, tree-planting drives, and literacy programs for underprivileged communities.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>All Colleges</div>
            <div class="om"><div class="om-dot"></div>170+ members</div>
          </div>
        </div>

        <div class="org-card" data-type="civic">
          <div class="org-type">Civic &amp; Service</div>
          <div class="org-name">Red Cross Youth — Datamex Chapter</div>
          <p class="org-desc">Affiliated with the Philippine Red Cross. Conducts first aid training, blood donation drives, and humanitarian outreach activities.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>All Colleges</div>
            <div class="om"><div class="om-dot"></div>110+ members</div>
          </div>
        </div>

        <div class="org-card" data-type="civic">
          <div class="org-type">Civic &amp; Service</div>
          <div class="org-name">Environmental Stewards Society</div>
          <p class="org-desc">Promotes environmental awareness and sustainable practices through clean-up drives, recycling campaigns, and eco-education seminars.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>All Colleges</div>
            <div class="om"><div class="om-dot"></div>75+ members</div>
          </div>
        </div>

        <div class="org-card" data-type="religious">
          <div class="org-type">Religious</div>
          <div class="org-name">Campus Ministry — Datamex</div>
          <p class="org-desc">Fosters the spiritual growth of students through Masses, recollections, retreats, prayer groups, and values formation activities.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>All Colleges</div>
            <div class="om"><div class="om-dot"></div>Open to all students</div>
          </div>
        </div>

        <div class="org-card" data-type="religious">
          <div class="org-type">Religious</div>
          <div class="org-name">Youth for Christ — Datamex</div>
          <p class="org-desc">An interdenominational Christian student fellowship focused on faith formation, prayer, worship, and values-centered leadership development.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>All Colleges</div>
            <div class="om"><div class="om-dot"></div>Open to all students</div>
          </div>
        </div>

        <div class="org-card" data-type="sports">
          <div class="org-type">Sports</div>
          <div class="org-name">Datamex Varsity Club</div>
          <p class="org-desc">The umbrella organization of all varsity athletes. Coordinates team schedules, represents Datamex in intercollegiate competitions, and supports athlete welfare.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>All Sports Teams</div>
            <div class="om"><div class="om-dot"></div>Active year-round</div>
          </div>
        </div>

        <div class="org-card" data-type="sports">
          <div class="org-type">Sports</div>
          <div class="org-name">Outdoor &amp; Adventure Club</div>
          <p class="org-desc">For students who love the outdoors — organizes hiking, camping, swimming trips, and adventure sports activities throughout the academic year.</p>
          <div class="org-meta">
            <div class="om"><div class="om-dot"></div>All Colleges</div>
            <div class="om"><div class="om-dot"></div>60+ members</div>
          </div>
        </div>

      </div>

      <p style="font-size:.72rem;color:var(--muted);margin-top:1rem;padding:.7rem;background:var(--off);border-left:2px solid var(--gold);border-radius:0 3px 3px 0;">To join an organization, visit the <strong style="color:var(--maroon);">Office of Student Affairs (OSA)</strong>, GF Main Building, or coordinate directly with the organization's officers. New member applications are typically accepted at the start of each semester.</p>
    </div>

    <!-- ── 2. EVENTS & ACTIVITIES ── -->
    <div class="sec-block" id="events">
      <div class="block-head">
        <div class="bh-icon">🎉</div>
        <div class="bh-text">
          <h2>Events &amp; Activities</h2>
          <p>Upcoming and past campus events that bring the Datamex community together</p>
        </div>
      </div>

      <div class="events-layout">
        <!-- Upcoming -->
        <div class="ev-col">
          <h3>📅 Upcoming Events</h3>

          <div class="event-card">
            <div class="ec-top">
              <div class="ec-date"><div class="ec-day">25</div><div class="ec-mon">MAR</div></div>
              <div>
                <div class="ec-title">Campus Clean-up Drive</div>
                <div class="ec-subtitle">7:00 AM · Whole Campus · All Students &amp; Faculty</div>
              </div>
            </div>
            <div class="ec-body">
              <p>Join the annual campus-wide clean-up initiative. Teams will be assigned to specific zones. Wear your PE uniform and bring gloves. Attendance is credited for NSTP and community service hours.</p>
              <div class="ec-tags"><span class="etag et-civic">Civic</span></div>
            </div>
          </div>

          <div class="event-card">
            <div class="ec-top">
              <div class="ec-date"><div class="ec-day">28</div><div class="ec-mon">MAR</div></div>
              <div>
                <div class="ec-title">Intramurals 2026</div>
                <div class="ec-subtitle">March 28–30 · Gymnasium &amp; Sports Fields</div>
              </div>
            </div>
            <div class="ec-body">
              <p>The biggest sporting event of the year! Cheer for your department teams across basketball, volleyball, badminton, chess, and more. Opening ceremonies on March 28 at 8AM sharp.</p>
              <div class="ec-tags"><span class="etag et-sports">Sports</span><span class="etag et-cultural">Festival</span></div>
            </div>
          </div>

          <div class="event-card">
            <div class="ec-top">
              <div class="ec-date"><div class="ec-day">3</div><div class="ec-mon">APR</div></div>
              <div>
                <div class="ec-title">Entrepreneurship Summit 2026</div>
                <div class="ec-subtitle">8:00 AM · Lecture Hall 1 · College of Business</div>
              </div>
            </div>
            <div class="ec-body">
              <p>Industry speakers, startup pitching contest, and a business innovation fair. Open to all students. Dress code: business casual. Pre-registration required at the College of Business office.</p>
              <div class="ec-tags"><span class="etag et-academic">Academic</span></div>
            </div>
          </div>

          <div class="event-card">
            <div class="ec-top">
              <div class="ec-date"><div class="ec-day">10</div><div class="ec-mon">APR</div></div>
              <div>
                <div class="ec-title">Cultural Night &amp; Prom Night 2026</div>
                <div class="ec-subtitle">6:00 PM · Grand Ballroom · All Departments</div>
              </div>
            </div>
            <div class="ec-body">
              <p>The most anticipated social event of the year. Featuring live performances, a cultural program, and the crowning of Datamex's King and Queen for 2026. Formal attire required.</p>
              <div class="ec-tags"><span class="etag et-cultural">Cultural</span></div>
            </div>
          </div>

          <div class="event-card">
            <div class="ec-top">
              <div class="ec-date"><div class="ec-day">15</div><div class="ec-mon">APR</div></div>
              <div>
                <div class="ec-title">Graduation Ceremony — Batch 2026</div>
                <div class="ec-subtitle">9:00 AM · Datamex Sports Complex</div>
              </div>
            </div>
            <div class="ec-body">
              <p>The most momentous day for our graduating students. Doors open at 7:30 AM. Family and guests are welcome. Graduates must report to their respective departments by 8:00 AM.</p>
              <div class="ec-tags"><span class="etag et-academic">Commencement</span></div>
            </div>
          </div>
        </div>

        <!-- Past events -->
        <div class="ev-col">
          <h3>🗂 Past Events — AY 2025–2026</h3>
          <div class="past-list">
            <div class="past-item">
              <div><div class="pi-date">20</div><div class="pi-mon">Feb</div></div>
              <div class="pi-body"><h4>STEM Fair &amp; Innovation Expo</h4><p>Academic Building Atrium · IT &amp; STEM students</p></div>
            </div>
            <div class="past-item">
              <div><div class="pi-date">14</div><div class="pi-mon">Feb</div></div>
              <div class="pi-body"><h4>Valentine's Campus Fair</h4><p>Quadrangle · Student orgs &amp; commerce booths</p></div>
            </div>
            <div class="past-item">
              <div><div class="pi-date">7</div><div class="pi-mon">Feb</div></div>
              <div class="pi-body"><h4>Intercollegiate Debate Tournament</h4><p>Auditorium · 8 competing schools</p></div>
            </div>
            <div class="past-item">
              <div><div class="pi-date">25</div><div class="pi-mon">Jan</div></div>
              <div class="pi-body"><h4>Community Outreach — Barangay Adoption</h4><p>Partner community · 300 volunteers</p></div>
            </div>
            <div class="past-item">
              <div><div class="pi-date">17</div><div class="pi-mon">Jan</div></div>
              <div class="pi-body"><h4>Buwan ng Wika Early Celebration</h4><p>Main Stage · Filipino cultural performances</p></div>
            </div>
            <div class="past-item">
              <div><div class="pi-date">10</div><div class="pi-mon">Jan</div></div>
              <div class="pi-body"><h4>Job &amp; OJT Fair 2026</h4><p>Gymnasium · 30+ partner companies</p></div>
            </div>
            <div class="past-item">
              <div><div class="pi-date">6</div><div class="pi-mon">Dec</div></div>
              <div class="pi-body"><h4>Christmas Celebration &amp; Gift-Giving</h4><p>Quadrangle · Community partner beneficiaries</p></div>
            </div>
            <div class="past-item">
              <div><div class="pi-date">15</div><div class="pi-mon">Nov</div></div>
              <div class="pi-body"><h4>Leadership Summit for Student Officers</h4><p>Function Hall · Student government &amp; org leaders</p></div>
            </div>
            <div class="past-item">
              <div><div class="pi-date">28</div><div class="pi-mon">Oct</div></div>
              <div class="pi-body"><h4>Midyear Sportsfest</h4><p>Gymnasium · Inter-department friendly games</p></div>
            </div>
            <div class="past-item">
              <div><div class="pi-date">5</div><div class="pi-mon">Oct</div></div>
              <div class="pi-body"><h4>Campus Foundation Day Celebration</h4><p>Main Stage · Anniversary of Datamex est. 2010</p></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ── 3. SPORTS & ATHLETICS ── -->
    <div class="sec-block" id="sports">
      <div class="block-head">
        <div class="bh-icon">🏅</div>
        <div class="bh-text">
          <h2>Sports &amp; Athletics</h2>
          <p>Compete, excel, and represent Datamex in the arena</p>
        </div>
      </div>

      <p class="sports-intro">Datamex believes in developing the whole person — mind, character, and body. Our sports program offers both varsity competition and recreational intramurals, giving every student the chance to stay active, build camaraderie, and represent their college with pride.</p>

      <div class="sports-grid">
        <div class="sport-card">
          <div class="sc-top"><span class="sc-icon">🏀</span><span class="sc-status ss-active">Active Varsity</span></div>
          <div class="sc-name">Basketball</div>
          <p class="sc-desc">Men's and Women's varsity teams compete in intercollegiate tournaments. Tryouts held every June.</p>
          <div class="sc-meta">Training: Mon, Wed, Fri · 4PM – 7PM · Gymnasium</div>
        </div>
        <div class="sport-card">
          <div class="sc-top"><span class="sc-icon">🏐</span><span class="sc-status ss-active">Active Varsity</span></div>
          <div class="sc-name">Volleyball</div>
          <p class="sc-desc">A powerhouse volleyball program with consistent placement in regional competitions for both men's and women's teams.</p>
          <div class="sc-meta">Training: Tue, Thu, Sat · 3PM – 6PM · Gymnasium</div>
        </div>
        <div class="sport-card">
          <div class="sc-top"><span class="sc-icon">⚽</span><span class="sc-status ss-active">Active Varsity</span></div>
          <div class="sc-name">Football / Soccer</div>
          <p class="sc-desc">Men's football team competes in the Regional Collegiate Football League. Open fields behind the Sports Complex.</p>
          <div class="sc-meta">Training: Mon, Wed, Fri · 5PM – 7PM · Field</div>
        </div>
        <div class="sport-card">
          <div class="sc-top"><span class="sc-icon">🏸</span><span class="sc-status ss-active">Active Varsity</span></div>
          <div class="sc-name">Badminton</div>
          <p class="sc-desc">Singles, doubles, and mixed doubles. Regular participant in the National College Badminton Championships.</p>
          <div class="sc-meta">Training: Tue, Thu · 4PM – 6PM · Covered Court</div>
        </div>
        <div class="sport-card">
          <div class="sc-top"><span class="sc-icon">🥊</span><span class="sc-status ss-active">Active Varsity</span></div>
          <div class="sc-name">Boxing &amp; Martial Arts</div>
          <p class="sc-desc">Competitive boxing, arnis, and taekwondo. Several Datamex athletes have advanced to national-level competitions.</p>
          <div class="sc-meta">Training: Mon–Fri · 3PM – 5PM · Covered Court</div>
        </div>
        <div class="sport-card">
          <div class="sc-top"><span class="sc-icon">♟️</span><span class="sc-status ss-active">Active Varsity</span></div>
          <div class="sc-name">Chess</div>
          <p class="sc-desc">Datamex's chess team regularly places in regional and national collegiate chess tournaments. Open to all students with a passion for the game.</p>
          <div class="sc-meta">Training: Wed, Fri · 3PM – 5PM · Chess Room, Lib Bldg</div>
        </div>
        <div class="sport-card">
          <div class="sc-top"><span class="sc-icon">🏊</span><span class="sc-status">Intramurals</span></div>
          <div class="sc-name">Swimming</div>
          <p class="sc-desc">Intramurals swimming competition held annually. The college coordinates use of the nearby public pool facility for student training.</p>
          <div class="sc-meta">Annual intramurals event · Partner pool facility</div>
        </div>
        <div class="sport-card">
          <div class="sc-top"><span class="sc-icon">🎾</span><span class="sc-status">Intramurals</span></div>
          <div class="sc-name">Table Tennis &amp; Lawn Tennis</div>
          <p class="sc-desc">Recreational and intramural competitions. Equipment available for free use at the Physical Education building lobby.</p>
          <div class="sc-meta">PE Building · Open for free use during school hours</div>
        </div>
        <div class="sport-card">
          <div class="sc-top"><span class="sc-icon">🤸</span><span class="sc-status">Intramurals</span></div>
          <div class="sc-name">Cheerdance &amp; Pep Squad</div>
          <p class="sc-desc">Each department fields a cheerdance team for the annual intramurals opening ceremony. One of the most electrifying events of the school year.</p>
          <div class="sc-meta">Annual · Intramurals opening ceremony</div>
        </div>
        <div class="sport-card">
          <div class="sc-top"><span class="sc-icon">🏋️</span><span class="sc-status">Recreational</span></div>
          <div class="sc-name">Fitness &amp; Wellness Center</div>
          <p class="sc-desc">Open to all enrolled students. Gym equipment, aerobics area, and locker rooms available. Bring your student ID for free access.</p>
          <div class="sc-meta">Bldg C, Ground Floor · Mon–Sat · 6AM – 8PM</div>
        </div>
      </div>

      <!-- Intramurals Highlight -->
      <div class="intra-band">
        <div>
          <div class="ib-label">Annual Event</div>
          <h3>Datamex Intramurals 2026</h3>
          <p>The grandest sporting event of the academic year — three days of competition, camaraderie, and school spirit. All departments compete for the overall championship trophy.</p>
          <a href="#events" class="btn-intra">View Event Details</a>
        </div>
        <div class="ib-right">
          <div class="ib-date-big">Mar<br>28–30</div>
          <div class="ib-date-sub">Gymnasium &amp; Fields</div>
        </div>
      </div>

      <!-- Achievement strip -->
      <div class="achieve-strip">
        <div class="ac-item">
          <div class="ac-icon">🥇</div>
          <div class="ac-n">14</div>
          <div class="ac-l">Gold Medals · 2025</div>
        </div>
        <div class="ac-item">
          <div class="ac-icon">🏆</div>
          <div class="ac-n">3rd</div>
          <div class="ac-l">Regional Overall 2025</div>
        </div>
        <div class="ac-item">
          <div class="ac-icon">⭐</div>
          <div class="ac-n">5</div>
          <div class="ac-l">National Qualifiers</div>
        </div>
        <div class="ac-item">
          <div class="ac-icon">🎽</div>
          <div class="ac-n">12</div>
          <div class="ac-l">Varsity Sports</div>
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
          <a href="#organizations" class="ql-item"><div><div class="ql-label">Student Organizations</div><div class="ql-sub">40+ active orgs</div></div><div class="qa">›</div></a>
          <a href="#events" class="ql-item"><div><div class="ql-label">Events &amp; Activities</div><div class="ql-sub">Upcoming &amp; past</div></div><div class="qa">›</div></a>
          <a href="#sports" class="ql-item"><div><div class="ql-label">Sports &amp; Athletics</div><div class="ql-sub">Varsity &amp; intramurals</div></div><div class="qa">›</div></a>
        </div>
      </div>
    </div>

    <div class="aside-widget">
      <div class="aw-head"><span class="awi">📅</span><h4>Upcoming Events</h4></div>
      <div class="aw-body">
        <div class="upcoming-mini">
          <div class="um-item">
            <div><div class="um-date">25</div><div class="um-mon">MAR</div></div>
            <div class="um-body"><h5>Campus Clean-up Drive</h5><p>7AM · Whole Campus</p></div>
          </div>
          <div class="um-item">
            <div><div class="um-date">28</div><div class="um-mon">MAR</div></div>
            <div class="um-body"><h5>Intramurals 2026</h5><p>Gymnasium &amp; Fields · 3 days</p></div>
          </div>
          <div class="um-item">
            <div><div class="um-date">3</div><div class="um-mon">APR</div></div>
            <div class="um-body"><h5>Entrepreneurship Summit</h5><p>Lecture Hall 1</p></div>
          </div>
          <div class="um-item">
            <div><div class="um-date">10</div><div class="um-mon">APR</div></div>
            <div class="um-body"><h5>Cultural Night &amp; Prom</h5><p>Grand Ballroom · Formal</p></div>
          </div>
          <div class="um-item">
            <div><div class="um-date">15</div><div class="um-mon">APR</div></div>
            <div class="um-body"><h5>Graduation Ceremony</h5><p>Sports Complex · Batch 2026</p></div>
          </div>
        </div>
      </div>
    </div>

    <div class="aside-widget">
      <div class="aw-head"><span class="awi">🏛️</span><h4>Office of Student Affairs</h4></div>
      <div class="aw-body" style="font-size:.72rem;color:var(--muted);line-height:1.7;">
        <p><strong style="color:var(--maroon);">OSA Office</strong><br>Ground Floor, Main Building<br>Mon–Fri · 8AM–5PM</p>
        <p style="margin-top:.6rem;">osa@datamex.edu.ph<br>Local 106</p>
        <p style="margin-top:.6rem;font-size:.68rem;">For organization accreditation, student ID issues, disciplinary concerns, and campus life inquiries.</p>
      </div>
    </div>

    <div class="aside-widget">
      <div class="aw-head"><span class="awi">🎓</span><h4>Be Part of Datamex</h4></div>
      <div class="aw-body">
        <p>Applications for AY 2026–2027 are now open. Join our vibrant campus community.</p>
        <a href="admission.php#apply" class="btn-aw filled">Apply Now →</a>
        <a href="academics.php#programs" class="btn-aw outline">View Programs</a>
      </div>
    </div>
  </div>
</div>

<!-- CTA -->
<div class="cta-band">
  <div class="cta-text">
    <h2>Life at Datamex is waiting for you.</h2>
    <p>Apply now and become part of a community that thrives together.</p>
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
    <a href="academics.php">Academics</a>
    <a href="admission.php">Admissions</a>
    <a href="#">Privacy Policy</a>
  </div>
</div>

<script>
function filterOrgs(type, btn) {
  document.querySelectorAll('.ftab').forEach(b => b.classList.remove('on'));
  btn.classList.add('on');
  document.querySelectorAll('.org-card').forEach(card => {
    if (type === 'all' || card.dataset.type === type) {
      card.classList.remove('hidden');
    } else {
      card.classList.add('hidden');
    }
  });
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
