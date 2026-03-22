<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>About — Datamex College of Saint Adeline</title>
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
.page-hero{
  background:var(--maroon);
  padding:3.5rem 2.5rem 0;
  border-bottom:3px solid var(--gold);
  position:relative;overflow:hidden;
}
.page-hero::after{
  content:'';position:absolute;right:-80px;bottom:-60px;
  width:440px;height:440px;border-radius:50%;
  border:1px solid rgba(201,160,48,.1);
  box-shadow:0 0 0 70px rgba(201,160,48,.035),0 0 0 140px rgba(201,160,48,.015);
  pointer-events:none;
}
.page-hero::before{
  content:'';position:absolute;inset:0;
  background:radial-gradient(ellipse at 0% 100%,rgba(92,9,22,.5) 0%,transparent 55%);
}
.breadcrumb{position:relative;z-index:1;display:flex;align-items:center;gap:.5rem;font-size:.64rem;color:rgba(255,255,255,.4);margin-bottom:1.4rem;}
.breadcrumb a{color:rgba(255,255,255,.4);text-decoration:none;transition:color .15s;}
.breadcrumb a:hover{color:var(--goldL);}
.breadcrumb .sep{color:rgba(255,255,255,.2);}
.breadcrumb .cur{color:var(--goldL);}
.hero-inner{position:relative;z-index:1;display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:flex-end;padding-bottom:0;}
.hi-left{}
.ph-eyebrow{font-size:.62rem;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);font-weight:600;margin-bottom:.8rem;display:flex;align-items:center;gap:8px;}
.ph-eyebrow::before{content:'';width:18px;height:1px;background:var(--gold);}
.page-hero h1{font-family:'Cormorant Garamond',serif;font-size:clamp(2.4rem,4.5vw,3.8rem);font-weight:400;color:var(--white);line-height:1.08;margin-bottom:1.2rem;}
.page-hero h1 em{font-style:italic;color:var(--goldL);display:block;}
.hero-intro{font-size:.9rem;color:rgba(255,255,255,.6);line-height:1.75;font-weight:300;max-width:480px;}
/* Right: stat strip flush at bottom */
.hi-right{
  display:grid;grid-template-columns:1fr 1fr;
  gap:1px;background:rgba(255,255,255,.1);
  border:1px solid rgba(255,255,255,.1);
  border-bottom:none;
  border-radius:4px 4px 0 0;
  overflow:hidden;
  align-self:flex-end;
}
.hstat{background:rgba(0,0,0,.18);padding:1.4rem 1.2rem;}
.hstat .n{font-family:'Cormorant Garamond',serif;font-size:2.2rem;font-weight:700;color:var(--gold);line-height:1;}
.hstat .l{font-size:.6rem;color:rgba(255,255,255,.45);text-transform:uppercase;letter-spacing:.1em;margin-top:4px;font-weight:500;}

/* ── SECTION NAV ── */
.sec-nav{background:var(--white);border-bottom:1px solid var(--border);display:flex;overflow-x:auto;}
.sec-nav a{display:flex;align-items:center;gap:.5rem;padding:.9rem 1.5rem;font-size:.72rem;font-weight:600;color:var(--muted);text-decoration:none;white-space:nowrap;border-bottom:2px solid transparent;transition:all .18s;}
.sec-nav a:hover{color:var(--maroon);border-bottom-color:rgba(123,13,30,.2);}
.sec-nav a.active{color:var(--maroon);border-bottom-color:var(--gold);}

/* ── LAYOUT ── */
.body-wrap{display:grid;grid-template-columns:1fr 270px;}
.main{padding:0;border-right:1px solid var(--border);}
.aside{padding:2rem 1.5rem;background:var(--cream);}

/* ── SECTION BLOCK ── */
.sec-block{padding:2.5rem;border-bottom:1px solid var(--border);scroll-margin-top:80px;}
.block-head{display:flex;align-items:center;gap:.85rem;margin-bottom:1.5rem;padding-bottom:.9rem;border-bottom:1px solid var(--border);}
.bh-icon{width:38px;height:38px;border-radius:8px;background:rgba(123,13,30,.08);display:flex;align-items:center;justify-content:center;font-size:1.05rem;flex-shrink:0;}
.bh-text h2{font-family:'Cormorant Garamond',serif;font-size:1.3rem;font-weight:700;color:var(--maroon);}
.bh-text p{font-size:.66rem;color:var(--muted);margin-top:1px;}

/* ── MISSION / VISION / CORE ── */
.mvv-grid{display:grid;grid-template-columns:1fr 1fr 1fr;gap:1px;background:var(--border);border:1px solid var(--border);border-radius:4px;overflow:hidden;}
.mvv-card{background:var(--white);padding:1.5rem;transition:background .18s;position:relative;overflow:hidden;}
.mvv-card:hover{background:var(--off);}
.mvv-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gold);transform:scaleX(0);transform-origin:left;transition:transform .25s;}
.mvv-card:hover::before{transform:scaleX(1);}
.mvv-label{font-size:.58rem;letter-spacing:.18em;text-transform:uppercase;font-weight:700;color:var(--gold);margin-bottom:.7rem;display:flex;align-items:center;gap:6px;}
.mvv-label::before{content:'';width:8px;height:2px;background:var(--gold);}
.mvv-card h3{font-family:'Cormorant Garamond',serif;font-size:1.1rem;font-weight:700;color:var(--maroon);margin-bottom:.5rem;}
.mvv-card p{font-size:.77rem;color:var(--muted);line-height:1.65;}

/* ── STORY ── */
.story-grid{display:grid;grid-template-columns:1fr 1fr;gap:2.5rem;align-items:start;}
.story-text p{font-size:.85rem;color:var(--muted);line-height:1.8;margin-bottom:1rem;}
.story-text p:last-child{margin-bottom:0;}
.story-text strong{color:var(--maroon);}
.story-text em{color:var(--goldD);font-style:italic;}
/* Timeline */
.timeline{position:relative;}
.timeline::before{content:'';position:absolute;left:16px;top:8px;bottom:8px;width:1px;background:var(--border);}
.tl-item{display:flex;gap:1.1rem;padding:.9rem 0;position:relative;}
.tl-dot{width:34px;height:34px;border-radius:50%;background:var(--maroon);color:var(--white);display:flex;align-items:center;justify-content:center;flex-shrink:0;box-shadow:0 0 0 3px var(--cream),0 0 0 4px var(--border);}
.tl-dot span{font-size:.55rem;font-weight:700;letter-spacing:.04em;}
.tl-body h4{font-size:.82rem;font-weight:700;color:var(--maroon);margin-bottom:2px;}
.tl-body p{font-size:.73rem;color:var(--muted);line-height:1.5;}

/* ── CORE VALUES ── */
.values-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--border);border:1px solid var(--border);border-radius:4px;overflow:hidden;}
.val-card{background:var(--white);padding:1.3rem 1.1rem;transition:all .18s;border-bottom:2px solid transparent;cursor:default;}
.val-card:hover{background:var(--maroon);border-bottom-color:var(--gold);}
.val-card:hover .val-title{color:var(--white);}
.val-card:hover .val-desc{color:rgba(255,255,255,.55);}
.val-card:hover .val-num{color:rgba(255,255,255,.08);}
.val-icon{font-size:1.3rem;margin-bottom:.6rem;display:block;}
.val-num{font-family:'Cormorant Garamond',serif;font-size:1.8rem;font-weight:700;color:rgba(123,13,30,.07);float:right;line-height:1;margin-top:-1.5rem;transition:color .18s;}
.val-title{font-family:'Cormorant Garamond',serif;font-size:1rem;font-weight:700;color:var(--maroon);margin-bottom:.35rem;transition:color .18s;}
.val-desc{font-size:.73rem;color:var(--muted);line-height:1.55;transition:color .18s;}

/* ── LEADERSHIP ── */
.leadership-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--border);border:1px solid var(--border);border-radius:4px;overflow:hidden;}
.lead-card{background:var(--white);padding:1.5rem 1.2rem;text-align:center;transition:background .18s;}
.lead-card:hover{background:var(--off);}
.lead-avatar{
  width:64px;height:64px;border-radius:50%;
  background:linear-gradient(135deg,var(--maroon),var(--maroonL));
  border:2px solid var(--gold);
  display:flex;align-items:center;justify-content:center;
  font-family:'Cormorant Garamond',serif;font-size:1.4rem;font-weight:700;
  color:var(--goldL);margin:0 auto 1rem;flex-shrink:0;
}
.lead-card h4{font-family:'Cormorant Garamond',serif;font-size:1rem;font-weight:700;color:var(--maroon);margin-bottom:2px;}
.lead-card .lead-role{font-size:.62rem;letter-spacing:.1em;text-transform:uppercase;color:var(--gold);font-weight:700;margin-bottom:.5rem;}
.lead-card p{font-size:.72rem;color:var(--muted);line-height:1.5;}

/* ── ACCREDITATION ── */
.accred-row{display:flex;flex-direction:column;gap:0;}
.accred-item{display:flex;align-items:center;gap:1rem;padding:.85rem 0;border-bottom:1px solid var(--border);}
.accred-item:last-child{border-bottom:none;}
.accred-badge{width:36px;height:36px;border-radius:50%;background:rgba(201,160,48,.12);border:1.5px solid var(--gold);display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;}
.accred-body h4{font-size:.82rem;font-weight:700;color:var(--maroon);}
.accred-body p{font-size:.71rem;color:var(--muted);margin-top:1px;}

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
.ql-item:hover .ql-arr{color:var(--gold);}
.ql-label{font-size:.76rem;font-weight:600;color:var(--maroon);}
.ql-sub{font-size:.62rem;color:var(--muted);}
.ql-arr{font-size:.85rem;color:var(--border);transition:color .15s;}
.contact-mini{display:flex;flex-direction:column;gap:.6rem;}
.ci h5{font-size:.71rem;font-weight:700;color:var(--maroon);}
.ci p{font-size:.67rem;color:var(--muted);}
.btn-aw{display:block;text-align:center;text-decoration:none;font-size:.7rem;font-weight:700;letter-spacing:.09em;text-transform:uppercase;padding:.6rem;border-radius:3px;transition:all .18s;font-family:'Plus Jakarta Sans',sans-serif;margin-bottom:.4rem;}
.btn-aw.filled{background:var(--maroon);color:var(--white);}
.btn-aw.filled:hover{background:var(--maroonL);}

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

/* ── ANIMATIONS ── */
@keyframes fadeUp{from{opacity:0;transform:translateY(16px);}to{opacity:1;transform:translateY(0);}}
.hero-inner{animation:fadeUp .6s .1s both;}

/* ── RESPONSIVE ── */
@media(max-width:960px){
  .body-wrap{grid-template-columns:1fr;}
  .aside{display:none;}
  .hero-inner{grid-template-columns:1fr;}
  .hi-right{display:none;}
  .story-grid,.mvv-grid,.values-grid,.leadership-grid{grid-template-columns:1fr;}
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
      <span>Final Exam Schedule released — check your department board</span>
      <span>Merit Scholarship deadline extended to March 31</span>
      <span>Graduation Ceremony 2026: April 15 · Sports Complex</span>
      <span>Online Enrollment for 1st Sem AY 2026–2027 is now OPEN</span>
      <span>Final Exam Schedule released — check your department board</span>
      <span>Merit Scholarship deadline extended to March 31</span>
      <span>Graduation Ceremony 2026: April 15 · Sports Complex</span>
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
    <a href="about.php" class="active">About</a>
    <a href="academics.php">Academics</a>
    <a href="admission.php">Admissions</a>
    <a href="campus_life.php">Campus Life</a>
    <a href="news.php">News</a>
    <a href="login.php" class="nav-cta">Portal Login</a>
  </div>
</nav>

<!-- PAGE HERO -->
<div class="page-hero">
  <div class="breadcrumb">
    <a href="index.php">Home</a>
    <span class="sep">/</span>
    <span class="cur">About</span>
  </div>
  <div class="hero-inner">
    <div class="hi-left">
      <div class="ph-eyebrow">About the Institution</div>
      <h1>Who We Are —<br><em>Datamex College<br>of Saint Adeline</em></h1>
      <p class="hero-intro">A forward-thinking institution committed to academic excellence, innovation, and character development. Established in 2010, we provide accessible and industry-relevant education that prepares students for real-world challenges.</p>
    </div>
    <div class="hi-right">
      <div class="hstat"><div class="n">2010</div><div class="l">Year Founded</div></div>
      <div class="hstat"><div class="n">5K+</div><div class="l">Students</div></div>
      <div class="hstat"><div class="n">12+</div><div class="l">Programs</div></div>
      <div class="hstat"><div class="n">98%</div><div class="l">Employment Rate</div></div>
    </div>
  </div>
</div>

<!-- SECTION NAV -->
<div class="sec-nav">
  <a href="#overview" class="active">Overview</a>
  <a href="#mission">Mission &amp; Vision</a>
  <a href="#story">Our Story</a>
  <a href="#values">Core Values</a>
  <a href="#leadership">Leadership</a>
  <a href="#accreditation">Accreditation</a>
</div>

<!-- BODY -->
<div class="body-wrap">
  <div class="main">

    <!-- OVERVIEW -->
    <div class="sec-block" id="overview">
      <div class="block-head">
        <div class="bh-icon">🏫</div>
        <div class="bh-text"><h2>Overview</h2><p>Who we are and what we stand for</p></div>
      </div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:2rem;align-items:start;">
        <div>
          <p style="font-size:.88rem;color:var(--muted);line-height:1.8;margin-bottom:1rem;">
            <strong style="color:var(--maroon);">Datamex College of Saint Adeline</strong> is a forward-thinking institution committed to academic excellence, innovation, and character development. Established in 2010, the college provides accessible and industry-relevant education that prepares students for real-world challenges.
          </p>
          <p style="font-size:.85rem;color:var(--muted);line-height:1.8;margin-bottom:1rem;">
            Rooted in the values of <em style="color:var(--goldD);font-style:italic;">knowledge, integrity, and excellence</em>, Datamex nurtures graduates who are not only academically competent but morally upright and socially responsible — ready to serve their communities and the nation.
          </p>
          <p style="font-size:.85rem;color:var(--muted);line-height:1.8;">
            With a diverse portfolio of undergraduate and graduate programs, state-of-the-art facilities, and a dedicated faculty, Datamex continues to be a trusted center of learning in the Philippines.
          </p>
        </div>
        <!-- Highlight cards -->
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1px;background:var(--border);border:1px solid var(--border);border-radius:4px;overflow:hidden;">
          <div style="background:var(--white);padding:1.2rem;border-bottom:2px solid var(--gold);">
            <div style="font-size:1.3rem;margin-bottom:.5rem;">🎓</div>
            <div style="font-family:'Cormorant Garamond',serif;font-size:.95rem;font-weight:700;color:var(--maroon);margin-bottom:.3rem;">Academic Excellence</div>
            <p style="font-size:.72rem;color:var(--muted);line-height:1.5;">Rigorous, industry-aligned curricula across all colleges.</p>
          </div>
          <div style="background:var(--white);padding:1.2rem;">
            <div style="font-size:1.3rem;margin-bottom:.5rem;">💡</div>
            <div style="font-family:'Cormorant Garamond',serif;font-size:.95rem;font-weight:700;color:var(--maroon);margin-bottom:.3rem;">Innovation-Driven</div>
            <p style="font-size:.72rem;color:var(--muted);line-height:1.5;">Forward-thinking programs that adapt to industry demands.</p>
          </div>
          <div style="background:var(--white);padding:1.2rem;">
            <div style="font-size:1.3rem;margin-bottom:.5rem;">🤲</div>
            <div style="font-family:'Cormorant Garamond',serif;font-size:.95rem;font-weight:700;color:var(--maroon);margin-bottom:.3rem;">Character Development</div>
            <p style="font-size:.72rem;color:var(--muted);line-height:1.5;">Holistic formation that goes beyond academic achievement.</p>
          </div>
          <div style="background:var(--white);padding:1.2rem;">
            <div style="font-size:1.3rem;margin-bottom:.5rem;">🌍</div>
            <div style="font-family:'Cormorant Garamond',serif;font-size:.95rem;font-weight:700;color:var(--maroon);margin-bottom:.3rem;">Accessible Education</div>
            <p style="font-size:.72rem;color:var(--muted);line-height:1.5;">Quality education made accessible to every Filipino learner.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- MISSION & VISION -->
    <div class="sec-block" id="mission">
      <div class="block-head">
        <div class="bh-icon">🧭</div>
        <div class="bh-text"><h2>Mission &amp; Vision</h2><p>The guiding principles behind everything we do</p></div>
      </div>
      <div class="mvv-grid">
        <div class="mvv-card">
          <div class="mvv-label">Mission</div>
          <h3>What We Do</h3>
          <p>To provide accessible, quality, and industry-relevant higher education that develops academically competent, morally upright, and socially responsible graduates prepared to excel in their chosen fields and contribute meaningfully to society.</p>
        </div>
        <div class="mvv-card">
          <div class="mvv-label">Vision</div>
          <h3>What We Aspire</h3>
          <p>To be a premier center of excellence in higher education in the Philippines — an institution recognized for producing innovative, values-driven leaders who make a positive and lasting impact on their communities and the world.</p>
        </div>
        <div class="mvv-card">
          <div class="mvv-label">Core Philosophy</div>
          <h3>How We Lead</h3>
          <p>Rooted in the legacy of Saint Adeline — a patron of learning and service — Datamex College embraces education as a transformative force, illuminating minds and transforming lives one graduate at a time.</p>
        </div>
      </div>
    </div>

    <!-- OUR STORY -->
    <div class="sec-block" id="story">
      <div class="block-head">
        <div class="bh-icon">📖</div>
        <div class="bh-text"><h2>Our Story</h2><p>From founding to the present day</p></div>
      </div>
      <div class="story-grid">
        <div class="story-text">
          <p>Datamex College of Saint Adeline was founded in <strong>2010</strong> with a singular purpose: to make quality higher education accessible to students who aspire for more. What began as a small institution with a handful of programs has grown into a thriving college community serving thousands of students across multiple disciplines.</p>
          <p>The college was named in honor of <em>Saint Adeline</em>, a revered patron of learning and service, whose values of dedication, humility, and excellence continue to inspire the institution's culture and character.</p>
          <p>Over the past <strong>15 years</strong>, Datamex has continuously evolved — expanding its program offerings, upgrading its facilities, and strengthening its ties with industry partners to ensure that every graduate is ready for the demands of a fast-changing world.</p>
          <p>Today, Datamex stands as a trusted institution known for its <strong>academic rigor, inclusive community, and genuine commitment</strong> to student success — living out its tagline every day: <em>"Illuminating Minds, Transforming Lives."</em></p>
        </div>
        <div>
          <div class="timeline">
            <div class="tl-item">
              <div class="tl-dot"><span>2010</span></div>
              <div class="tl-body"><h4>Founded</h4><p>Datamex College of Saint Adeline opens its doors with its first batch of students and 3 founding programs.</p></div>
            </div>
            <div class="tl-item">
              <div class="tl-dot"><span>2012</span></div>
              <div class="tl-body"><h4>Program Expansion</h4><p>College of Business Administration and College of Education formally established.</p></div>
            </div>
            <div class="tl-item">
              <div class="tl-dot"><span>2014</span></div>
              <div class="tl-body"><h4>First Accreditation</h4><p>Programs receive initial government recognition from CHED. Campus expansion begins.</p></div>
            </div>
            <div class="tl-item">
              <div class="tl-dot"><span>2016</span></div>
              <div class="tl-body"><h4>SHS Program Launched</h4><p>Senior High School program launched in response to the K–12 curriculum reform.</p></div>
            </div>
            <div class="tl-item">
              <div class="tl-dot"><span>2019</span></div>
              <div class="tl-body"><h4>New Campus Building</h4><p>The Academic Building annex opens, adding 30 new classrooms and 4 computer laboratories.</p></div>
            </div>
            <div class="tl-item">
              <div class="tl-dot"><span>2022</span></div>
              <div class="tl-body"><h4>Graduate School Opens</h4><p>Master of Business Administration (MBA) program launched, the college's first graduate degree offering.</p></div>
            </div>
            <div class="tl-item">
              <div class="tl-dot"><span>2026</span></div>
              <div class="tl-body"><h4>Today &amp; Beyond</h4><p>5,000+ students, 12+ programs, and a growing legacy of excellence — with more milestones ahead.</p></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CORE VALUES -->
    <div class="sec-block" id="values">
      <div class="block-head">
        <div class="bh-icon">⭐</div>
        <div class="bh-text"><h2>Core Values</h2><p>The principles that define our community</p></div>
      </div>
      <div class="values-grid">
        <div class="val-card">
          <span class="val-icon">📚</span>
          <div class="val-num">01</div>
          <div class="val-title">Excellence</div>
          <p class="val-desc">We pursue the highest standards in teaching, learning, and service — never settling for less than our best in everything we do.</p>
        </div>
        <div class="val-card">
          <span class="val-icon">🤝</span>
          <div class="val-num">02</div>
          <div class="val-title">Integrity</div>
          <p class="val-desc">We uphold honesty, transparency, and ethical conduct in all academic and administrative matters, building trust at every level.</p>
        </div>
        <div class="val-card">
          <span class="val-icon">💡</span>
          <div class="val-num">03</div>
          <div class="val-title">Innovation</div>
          <p class="val-desc">We embrace creative thinking, technological advancement, and progressive approaches to solving the challenges of our time.</p>
        </div>
        <div class="val-card">
          <span class="val-icon">🌿</span>
          <div class="val-num">04</div>
          <div class="val-title">Service</div>
          <p class="val-desc">We are committed to giving back — to our students, our communities, and our nation — through meaningful engagement and outreach.</p>
        </div>
        <div class="val-card">
          <span class="val-icon">🧑‍🤝‍🧑</span>
          <div class="val-num">05</div>
          <div class="val-title">Inclusivity</div>
          <p class="val-desc">We celebrate diversity and ensure that every student, regardless of background, has access to quality education and equal opportunity.</p>
        </div>
        <div class="val-card">
          <span class="val-icon">🎯</span>
          <div class="val-num">06</div>
          <div class="val-title">Commitment</div>
          <p class="val-desc">We are dedicated to the success of every student — from enrollment to graduation and beyond — with consistent care and support.</p>
        </div>
      </div>
    </div>

    <!-- LEADERSHIP -->
    <div class="sec-block" id="leadership">
      <div class="block-head">
        <div class="bh-icon">👥</div>
        <div class="bh-text"><h2>Leadership</h2><p>Meet the people guiding Datamex forward</p></div>
      </div>
      <div class="leadership-grid">
        <div class="lead-card">
          <div class="lead-avatar">PS</div>
          <h4>Dr. Patricia S. Santos</h4>
          <div class="lead-role">College President</div>
          <p>Leading Datamex with a vision for inclusive, innovative, and world-class education since 2015.</p>
        </div>
        <div class="lead-card">
          <div class="lead-avatar">MR</div>
          <h4>Dr. Miguel R. Reyes</h4>
          <div class="lead-role">VP for Academic Affairs</div>
          <p>Overseeing curriculum development, faculty excellence, and academic program quality across all colleges.</p>
        </div>
        <div class="lead-card">
          <div class="lead-avatar">AL</div>
          <h4>Ms. Angela T. Lim</h4>
          <div class="lead-role">VP for Administration</div>
          <p>Managing institutional operations, finance, facilities, and student support services.</p>
        </div>
        <div class="lead-card">
          <div class="lead-avatar">JD</div>
          <h4>Prof. Jose D. Flores</h4>
          <div class="lead-role">Dean, College of IT</div>
          <p>Driving innovation in technology education and industry partnerships for the College of IT.</p>
        </div>
        <div class="lead-card">
          <div class="lead-avatar">CM</div>
          <h4>Prof. Clara M. Bautista</h4>
          <div class="lead-role">Dean, College of Business</div>
          <p>Shaping future business leaders through practical, values-centered management education.</p>
        </div>
        <div class="lead-card">
          <div class="lead-avatar">RG</div>
          <h4>Dr. Ramon G. Cruz</h4>
          <div class="lead-role">Registrar</div>
          <p>Ensuring the integrity of academic records, enrollment processes, and student data management.</p>
        </div>
      </div>
    </div>

    <!-- ACCREDITATION -->
    <div class="sec-block" id="accreditation">
      <div class="block-head">
        <div class="bh-icon">🏅</div>
        <div class="bh-text"><h2>Accreditation &amp; Recognition</h2><p>Our credentials and institutional standing</p></div>
      </div>
      <div class="accred-row">
        <div class="accred-item">
          <div class="accred-badge">🏛️</div>
          <div class="accred-body">
            <h4>CHED Recognized — Commission on Higher Education</h4>
            <p>All degree programs are recognized and regulated by the Commission on Higher Education of the Philippines.</p>
          </div>
        </div>
        <div class="accred-item">
          <div class="accred-badge">📋</div>
          <div class="accred-body">
            <h4>SEC Registered — Securities and Exchange Commission</h4>
            <p>Datamex College of Saint Adeline is a duly registered non-stock, non-profit educational institution.</p>
          </div>
        </div>
        <div class="accred-item">
          <div class="accred-badge">🎓</div>
          <div class="accred-body">
            <h4>PAASCU Candidate — Philippine Accrediting Association</h4>
            <p>Currently undergoing formal accreditation process under the Philippine Accrediting Association of Schools, Colleges and Universities.</p>
          </div>
        </div>
        <div class="accred-item">
          <div class="accred-badge">🤝</div>
          <div class="accred-body">
            <h4>Industry Partnerships — OJT &amp; Career Placement</h4>
            <p>Established MOAs with over 50 industry partners for student internship, job placement, and continuing professional development programs.</p>
          </div>
        </div>
        <div class="accred-item">
          <div class="accred-badge">🌐</div>
          <div class="accred-body">
            <h4>TESDA Partner Institution</h4>
            <p>Offering select TESDA-certified skills training programs in coordination with the Technical Education and Skills Development Authority.</p>
          </div>
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
          <a href="#overview" class="ql-item"><div><div class="ql-label">Overview</div><div class="ql-sub">Who we are</div></div><div class="ql-arr">›</div></a>
          <a href="#mission" class="ql-item"><div><div class="ql-label">Mission &amp; Vision</div><div class="ql-sub">Our guiding principles</div></div><div class="ql-arr">›</div></a>
          <a href="#story" class="ql-item"><div><div class="ql-label">Our Story</div><div class="ql-sub">History &amp; milestones</div></div><div class="ql-arr">›</div></a>
          <a href="#values" class="ql-item"><div><div class="ql-label">Core Values</div><div class="ql-sub">What defines us</div></div><div class="ql-arr">›</div></a>
          <a href="#leadership" class="ql-item"><div><div class="ql-label">Leadership</div><div class="ql-sub">Meet the team</div></div><div class="ql-arr">›</div></a>
          <a href="#accreditation" class="ql-item"><div><div class="ql-label">Accreditation</div><div class="ql-sub">Our credentials</div></div><div class="ql-arr">›</div></a>
        </div>
      </div>
    </div>

    <div class="aside-widget">
      <div class="aw-head"><span class="awi">📍</span><h4>Find Us</h4></div>
      <div class="aw-body">
        <div class="contact-mini">
          <div class="ci"><h5>Main Campus</h5><p>123 Saint Adeline Avenue<br>Quezon City, Philippines</p></div>
          <div class="ci"><h5>Office Hours</h5><p>Monday – Friday<br>8:00 AM – 5:00 PM</p></div>
          <div class="ci"><h5>Trunk Line</h5><p>(02) 8XXX-XXXX</p></div>
          <div class="ci"><h5>Email</h5><p>info@datamex.edu.ph</p></div>
        </div>
      </div>
    </div>

    <div class="aside-widget">
      <div class="aw-head"><span class="awi">🎓</span><h4>Ready to Join Us?</h4></div>
      <div class="aw-body">
        <p>Applications for AY 2026–2027 are now open. Begin your journey at Datamex today.</p>
        <a href="admission.php#apply" class="btn-aw filled">Apply Now →</a>
      </div>
    </div>
  </div>
</div>

<!-- CTA BAND -->
<div class="cta-band">
  <div class="cta-text">
    <h2>Be part of the Datamex community.</h2>
    <p>Applications open for AY 2026–2027. Your journey starts here.</p>
  </div>
  <div class="cta-btns">
    <a href="admission.php#apply" class="cta-btn cb-gold">Apply Now</a>
    <a href="index.php" class="cta-btn cb-ghost">Back to Homepage</a>
  </div>
</div>

<!-- FOOTER -->
<div class="foot-strip">
  <p>© 2026 Datamex College of Saint Adeline. All rights reserved.</p>
  <div>
    <a href="index.php">Home</a>
    <a href="#">Privacy Policy</a>
    <a href="#">Terms of Use</a>
  </div>
</div>

<script>
// Highlight section nav on scroll
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
