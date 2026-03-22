<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Datamex College of Saint Adeline</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<style>
:root {
  --maroon:  #7b0d1e;
  --maroonD: #5c0916;
  --maroonL: #96112a;
  --gold:    #c9a030;
  --goldL:   #e2bb55;
  --goldD:   #a07820;
  --navy:    #0f1d56;
  --white:   #ffffff;
  --cream:   #faf8f5;
  --off:     #f2efea;
  --ink:     #1a1018;
  --muted:   #6b5f63;
  --border:  #e0d8d0;
  --borderM: rgba(123,13,30,0.12);
}

* { margin:0; padding:0; box-sizing:border-box; }
html { scroll-behavior:smooth; }
body {
  font-family: 'Plus Jakarta Sans', sans-serif;
  background: var(--cream);
  color: var(--ink);
  overflow-x: hidden;
}

/* ─── TICKER ─────────────────────────────── */
.ticker {
  background: var(--maroonD);
  display: flex; align-items: center;
  height: 28px; overflow: hidden;
}
.ticker-tag {
  background: var(--gold); color: var(--maroonD);
  font-size: 0.58rem; font-weight: 700;
  letter-spacing: 0.18em; text-transform: uppercase;
  padding: 0 1.1rem; height: 100%;
  display: flex; align-items: center;
  white-space: nowrap; flex-shrink: 0;
}
.ticker-scroll { overflow: hidden; flex: 1; }
.ticker-track {
  display: flex; white-space: nowrap;
  animation: tickerMove 38s linear infinite;
}
.ticker-track span {
  font-size: 0.66rem; color: rgba(255,255,255,0.72);
  padding: 0 2.2rem; letter-spacing: 0.03em;
}
.ticker-track span::after { content: '◆'; margin-left: 2.2rem; color: rgba(201,160,48,0.5); font-size: 0.4rem; }
@keyframes tickerMove { from { transform: translateX(0); } to { transform: translateX(-50%); } }

/* ─── NAV ─────────────────────────────────── */
nav {
  position: sticky; top: 0; z-index: 200;
  background: var(--maroon);
  display: flex; align-items: center; justify-content: space-between;
  padding: 0 2.5rem; height: 64px;
  box-shadow: 0 2px 16px rgba(123,13,30,0.3);
}
.nav-brand { display: flex; align-items: center; gap: 12px; text-decoration: none; }
.nav-seal {
  width: 40px; height: 40px; border-radius: 50%;
  border: 2px solid var(--gold);
  background: rgba(201,160,48,0.12);
  display: flex; align-items: center; justify-content: center;
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
  display: block; font-size: 0.86rem; font-weight: 700;
  color: var(--white); letter-spacing: 0.02em;
}
.nav-name small {
  font-size: 0.57rem; color: rgba(255,255,255,0.5);
  letter-spacing: 0.14em; text-transform: uppercase;
}
.nav-links { display: flex; align-items: center; gap: 2px; }
.nav-links a {
  font-size: 0.73rem; font-weight: 500;
  color: rgba(255,255,255,0.72);
  text-decoration: none; padding: 0.4rem 0.8rem;
  border-radius: 4px; transition: all .18s;
}
.nav-links a:hover { color: var(--white); background: rgba(255,255,255,0.1); }
.nav-cta {
  background: var(--gold) !important; color: var(--maroonD) !important;
  font-weight: 700 !important; margin-left: 0.5rem;
  padding: 0.42rem 1.1rem !important; border-radius: 4px !important;
}
.nav-cta:hover { background: var(--goldL) !important; }

/* ─── HERO ─────────────────────────────────── */
.hero {
  display: grid; grid-template-columns: 1fr 350px;
  border-bottom: 3px solid var(--gold);
  min-height: 80vh;
}
.hero-main {
  background: var(--maroon);
  padding: 3.5rem 3rem;
  display: flex; flex-direction: column; justify-content: space-between;
  position: relative; overflow: hidden;
  border-right: 1px solid rgba(255,255,255,0.08);
}
/* Decorative rings — subtle globe echo */
.hero-main::after {
  content: '';
  position: absolute; right: -100px; top: 50%;
  transform: translateY(-50%);
  width: 500px; height: 500px; border-radius: 50%;
  border: 1px solid rgba(201,160,48,0.1);
  box-shadow:
    0 0 0 70px rgba(201,160,48,0.035),
    0 0 0 140px rgba(201,160,48,0.02),
    0 0 0 210px rgba(201,160,48,0.01);
  pointer-events: none;
}
.hero-main::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse at 0% 100%, rgba(92,9,22,0.6) 0%, transparent 60%);
}
.hero-kicker {
  position: relative; z-index: 1;
  display: flex; align-items: center; gap: 8px;
  font-size: 0.63rem; letter-spacing: 0.2em; text-transform: uppercase;
  color: var(--goldL); font-weight: 600;
  animation: fadeUp 0.5s 0.1s both;
}
.kline { width: 20px; height: 1px; background: var(--gold); }

.hero-h1 {
  position: relative; z-index: 1;
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(3rem, 5.5vw, 5rem);
  font-weight: 400; line-height: 1.07;
  color: var(--white); letter-spacing: -0.01em;
  animation: fadeUp 0.6s 0.2s both;
}
.hero-h1 em { font-style: italic; color: var(--goldL); display: block; }

.hero-desc {
  position: relative; z-index: 1;
  font-size: 0.87rem; color: rgba(255,255,255,0.52);
  line-height: 1.72; font-weight: 300; max-width: 440px;
  animation: fadeUp 0.6s 0.3s both;
}
.hero-btns {
  position: relative; z-index: 1;
  display: flex; gap: 0.7rem; flex-wrap: wrap;
  animation: fadeUp 0.6s 0.35s both;
}
.btn {
  display: inline-block; text-decoration: none;
  font-size: 0.73rem; font-weight: 700;
  letter-spacing: 0.09em; text-transform: uppercase;
  padding: 0.72rem 1.6rem; border-radius: 3px;
  transition: all .2s; font-family: 'Plus Jakarta Sans', sans-serif;
  border: none; cursor: pointer;
}
.btn-gold { background: var(--gold); color: var(--maroonD); }
.btn-gold:hover { background: var(--goldL); transform: translateY(-1px); }
.btn-outline { border: 1.5px solid rgba(255,255,255,0.28); color: rgba(255,255,255,0.82); background: transparent; }
.btn-outline:hover { border-color: var(--goldL); color: var(--goldL); }

.hero-stats {
  position: relative; z-index: 1;
  display: grid; grid-template-columns: repeat(4, 1fr);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: 4px; overflow: hidden;
  animation: fadeUp 0.6s 0.45s both;
}
.hst {
  background: rgba(0,0,0,0.15);
  padding: 1rem 1.1rem;
  border-right: 1px solid rgba(255,255,255,0.07);
}
.hst:last-child { border-right: none; }
.hst .n {
  font-family: 'Cormorant Garamond', serif;
  font-size: 2rem; font-weight: 700; color: var(--gold); line-height: 1;
}
.hst .l {
  font-size: 0.6rem; color: rgba(255,255,255,0.4);
  text-transform: uppercase; letter-spacing: 0.09em;
  margin-top: 3px; font-weight: 500;
}

/* Hero sidebar */
.hero-side { background: var(--cream); display: flex; flex-direction: column; }
.hs-panel { padding: 1.5rem; border-bottom: 1px solid var(--border); flex: 1; }
.hs-panel:last-child { border-bottom: none; }
.hs-label {
  font-size: 0.59rem; letter-spacing: 0.18em; text-transform: uppercase;
  color: var(--maroon); font-weight: 700; margin-bottom: 1rem;
  display: flex; align-items: center; gap: 6px;
}
.hs-label::before { content: ''; width: 10px; height: 2px; background: var(--gold); }

/* Login */
.login-tabs { display: flex; gap: 4px; margin-bottom: 0.85rem; }
.ltab {
  flex: 1; font-size: 0.61rem; font-weight: 700;
  letter-spacing: 0.07em; text-transform: uppercase;
  padding: 0.3rem; border-radius: 3px;
  border: 1.5px solid var(--border); background: transparent;
  color: var(--muted); cursor: pointer;
  font-family: 'Plus Jakarta Sans', sans-serif; transition: all .15s;
}
.ltab.on { background: var(--maroon); color: var(--white); border-color: var(--maroon); }
.ltab:hover:not(.on) { border-color: var(--maroon); color: var(--maroon); }
.linput {
  width: 100%; background: var(--white);
  border: 1.5px solid var(--border); border-radius: 4px;
  padding: 0.55rem 0.85rem; font-size: 0.78rem;
  color: var(--ink); font-family: 'Plus Jakarta Sans', sans-serif;
  outline: none; margin-bottom: 0.5rem; transition: border-color .15s;
}
.linput:focus { border-color: var(--maroon); }
.linput::placeholder { color: #bbb; }
.btn-login {
  width: 100%; background: var(--maroon); color: var(--white);
  font-weight: 700; font-size: 0.71rem; letter-spacing: 0.1em;
  text-transform: uppercase; padding: 0.62rem; border: none;
  border-radius: 4px; cursor: pointer;
  font-family: 'Plus Jakarta Sans', sans-serif; transition: background .15s;
}
.btn-login:hover { background: var(--maroonL); }
.login-hint { font-size: 0.59rem; color: var(--muted); text-align: center; margin-top: 0.5rem; }
.login-hint a { color: var(--maroon); text-decoration: none; font-weight: 600; }

/* Announcement mini */
.ann-row { padding: 0.65rem 0; border-bottom: 1px solid var(--border); }
.ann-row:last-child { border-bottom: none; }
.ann-cat {
  font-size: 0.56rem; letter-spacing: 0.12em; text-transform: uppercase;
  font-weight: 700; color: var(--maroon); margin-bottom: 3px;
}
.ann-row p { font-size: 0.75rem; color: var(--ink); line-height: 1.4; font-weight: 500; }
.ann-row .ann-date { font-size: 0.6rem; color: var(--muted); margin-top: 2px; display: block; }

/* Events mini */
.ev-row {
  display: flex; align-items: center; gap: 0.85rem;
  padding: 0.55rem 0.75rem;
  background: var(--white); border-radius: 4px;
  border: 1px solid var(--border); margin-bottom: 0.5rem;
}
.ev-row:last-child { margin-bottom: 0; }
.ev-date {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.4rem; font-weight: 700; color: var(--maroon);
  line-height: 1; text-align: center; min-width: 28px;
}
.ev-mon { font-size: 0.52rem; color: var(--gold); font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; }
.ev-row h5 { font-size: 0.74rem; font-weight: 600; color: var(--ink); }
.ev-row p { font-size: 0.61rem; color: var(--muted); }

/* ─── QUICK ACCESS ────────────────────────── */
.qa {
  display: grid; grid-template-columns: repeat(6, 1fr);
  background: var(--white);
  border-bottom: 1px solid var(--border);
}
.qa-item {
  display: flex; flex-direction: column; align-items: center;
  gap: 0.4rem; padding: 1rem 0.6rem;
  border-right: 1px solid var(--border);
  text-decoration: none; color: var(--muted);
  font-size: 0.69rem; font-weight: 600; text-align: center;
  transition: all .18s; position: relative;
}
.qa-item::after {
  content: ''; position: absolute;
  bottom: 0; left: 0; right: 0; height: 2px;
  background: var(--maroon);
  transform: scaleX(0); transform-origin: center;
  transition: transform .2s;
}
.qa-item:hover { color: var(--maroon); background: #fdf5f6; }
.qa-item:hover::after { transform: scaleX(1); }
.qa-item:last-child { border-right: none; }
.qa-icon {
  width: 34px; height: 34px; border-radius: 8px;
  background: #f8f0f1; color: var(--maroon);
  display: flex; align-items: center; justify-content: center;
  font-size: 0.95rem; transition: background .18s;
}
.qa-item:hover .qa-icon { background: rgba(123,13,30,0.1); }

/* ─── BODY GRID ───────────────────────────── */
.body-grid {
  display: grid; grid-template-columns: 1fr 300px;
  border-bottom: 1px solid var(--border);
}
.main-col { padding: 2.2rem 2.5rem; border-right: 1px solid var(--border); }
.side-col { background: var(--cream); }

/* Section headers */
.sec-head {
  display: flex; align-items: flex-end; justify-content: space-between;
  margin-bottom: 1.2rem; padding-bottom: 0.8rem;
  border-bottom: 1px solid var(--border);
}
.sec-eyebrow {
  font-size: 0.57rem; letter-spacing: 0.18em; text-transform: uppercase;
  color: var(--gold); font-weight: 700; display: block; margin-bottom: 2px;
}
.sec-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.2rem; font-weight: 700; color: var(--maroon);
}
.link-all {
  font-size: 0.64rem; font-weight: 700; letter-spacing: 0.08em;
  text-transform: uppercase; color: var(--maroon); text-decoration: none;
  border-bottom: 1px solid var(--gold); padding-bottom: 1px; transition: opacity .15s;
}
.link-all:hover { opacity: 0.7; }

/* News mosaic */
.news-mosaic {
  display: grid; grid-template-columns: 1.3fr 1fr;
  gap: 1px; background: var(--border);
  border: 1px solid var(--border); border-radius: 4px; overflow: hidden;
}
.nc {
  background: var(--white); padding: 1.4rem;
  text-decoration: none; color: inherit;
  transition: background .15s; position: relative; overflow: hidden;
}
.nc:hover { background: var(--cream); }
.nc.feat { grid-row: 1/3; background: var(--maroon); }
.nc.feat:hover { background: var(--maroonL); }
.nc.feat::after {
  content: ''; position: absolute;
  bottom: 0; left: 0; right: 0; height: 3px;
  background: linear-gradient(to right, var(--gold), transparent);
}
.nc-cat {
  font-size: 0.56rem; letter-spacing: 0.14em; text-transform: uppercase;
  font-weight: 700; color: var(--gold); margin-bottom: 0.55rem; display: block;
}
.nc h3 {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1rem; font-weight: 600; color: var(--maroon);
  line-height: 1.35; margin-bottom: 0.45rem;
}
.nc.feat h3 { font-size: 1.5rem; color: var(--white); line-height: 1.2; margin-bottom: 0.7rem; }
.nc p { font-size: 0.74rem; color: var(--muted); line-height: 1.6; }
.nc.feat p { color: rgba(255,255,255,0.5); }
.nc-meta { font-size: 0.59rem; color: var(--muted); margin-top: 0.7rem; }
.nc.feat .nc-meta { color: rgba(255,255,255,0.3); }
.nc-rule {
  position: absolute; bottom: 0; left: 0; right: 0; height: 1px;
  background: linear-gradient(to right, var(--gold), transparent);
  opacity: 0; transition: opacity .2s;
}
.nc:not(.feat):hover .nc-rule { opacity: 1; }

/* Calendar list */
.cal-spacer { margin-top: 2rem; }
.cal-list { display: flex; flex-direction: column; }
.cl {
  display: flex; align-items: center; gap: 1rem;
  padding: 0.75rem 0; border-bottom: 1px solid var(--border);
}
.cl:last-child { border-bottom: none; }
.cl-date { text-align: center; min-width: 38px; }
.cl-date .d {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.7rem; font-weight: 700; color: var(--maroon); line-height: 1;
}
.cl-date .m {
  font-size: 0.55rem; color: var(--gold);
  font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;
}
.cl-body h4 { font-size: 0.8rem; font-weight: 600; color: var(--ink); }
.cl-body p { font-size: 0.66rem; color: var(--muted); margin-top: 1px; }

/* Sidebar col blocks */
.sb { padding: 1.5rem; border-bottom: 1px solid var(--border); }
.sb:last-child { border-bottom: none; }

/* Programs */
.prog-row {
  display: flex; align-items: center; justify-content: space-between;
  padding: 0.65rem 0; border-bottom: 1px solid var(--border);
  text-decoration: none; color: inherit; gap: 0.5rem;
  transition: padding-left .15s;
}
.prog-row:last-child { border-bottom: none; }
.prog-row:hover { padding-left: 0.4rem; }
.prog-row:hover .parr { color: var(--gold); }
.prog-dept { font-size: 0.56rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--gold); font-weight: 700; margin-bottom: 2px; }
.prog-nm { font-size: 0.77rem; font-weight: 600; color: var(--maroon); line-height: 1.25; }
.parr { font-size: 0.85rem; color: var(--border); transition: color .15s; flex-shrink: 0; }

/* Notices */
.notice {
  display: flex; gap: 0.65rem; align-items: flex-start;
  padding: 0.65rem 0; border-bottom: 1px solid var(--border);
}
.notice:last-child { border-bottom: none; }
.ndot { width: 5px; height: 5px; border-radius: 50%; background: var(--gold); flex-shrink: 0; margin-top: 5px; }
.notice p { font-size: 0.74rem; color: var(--ink); line-height: 1.4; font-weight: 500; }
.notice span { font-size: 0.59rem; color: var(--muted); margin-top: 2px; display: block; }

/* ─── PROGRAMS SECTION ────────────────────── */
.prog-section {
  background: var(--white);
  padding: 2rem 2.5rem;
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
}
.prog-grid {
  display: grid; grid-template-columns: repeat(4, 1fr);
  gap: 1px; background: var(--border);
  border: 1px solid var(--border); border-radius: 4px;
  overflow: hidden; margin-top: 1.2rem;
}
.pg {
  background: var(--white); padding: 1.25rem 1.1rem;
  text-decoration: none; color: inherit; transition: all .18s;
  border-bottom: 2px solid transparent;
}
.pg:hover { background: var(--maroon); border-bottom-color: var(--gold); }
.pg:hover .pg-dept { color: rgba(255,255,255,0.5); }
.pg:hover .pg-name { color: var(--white); }
.pg:hover .pg-dur { color: rgba(255,255,255,0.35); }
.pg-dept { font-size: 0.56rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--gold); font-weight: 700; margin-bottom: 4px; transition: color .18s; }
.pg-name { font-family: 'Cormorant Garamond', serif; font-size: 0.95rem; font-weight: 700; color: var(--maroon); line-height: 1.3; margin-bottom: 2px; transition: color .18s; }
.pg-dur { font-size: 0.62rem; color: var(--muted); transition: color .18s; }

/* ─── CAMPUS LIFE ─────────────────────────── */
.campus-row {
  display: grid; grid-template-columns: repeat(4, 1fr);
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
  background: var(--white);
}
.cs {
  padding: 1.8rem 1.4rem; border-right: 1px solid var(--border);
  position: relative; overflow: hidden;
  transition: background .18s; cursor: default;
}
.cs:last-child { border-right: none; }
.cs:hover { background: #fdf5f6; }
.cs::before {
  content: ''; position: absolute;
  top: 0; left: 0; right: 0; height: 3px;
  background: var(--maroon);
  transform: scaleX(0); transform-origin: left;
  transition: transform .25s;
}
.cs:hover::before { transform: scaleX(1); }
.cs-num {
  position: absolute; top: 0.8rem; right: 1rem;
  font-family: 'Cormorant Garamond', serif;
  font-size: 2.5rem; font-weight: 700;
  color: rgba(123,13,30,0.05); line-height: 1;
}
.cs-icon { font-size: 1.4rem; margin-bottom: 0.8rem; display: block; }
.cs h3 {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.05rem; font-weight: 700;
  color: var(--maroon); margin-bottom: 0.35rem;
}
.cs p { font-size: 0.71rem; color: var(--muted); line-height: 1.55; }

/* ─── ADMISSION BAND ──────────────────────── */
.adm-band {
  background: var(--maroon);
  display: flex; align-items: center; justify-content: space-between;
  padding: 2.2rem 2.5rem; gap: 2rem; flex-wrap: wrap;
  border-bottom: 3px solid var(--gold);
  position: relative; overflow: hidden;
}
.adm-band::before {
  content: ''; position: absolute;
  right: -60px; top: 50%; transform: translateY(-50%);
  width: 320px; height: 320px; border-radius: 50%;
  border: 1px solid rgba(201,160,48,0.1);
  box-shadow: 0 0 0 60px rgba(201,160,48,0.04), 0 0 0 120px rgba(201,160,48,0.02);
}
.adm-text { position: relative; }
.adm-text h2 {
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(1.4rem, 2.5vw, 2rem);
  font-weight: 600; color: var(--white); line-height: 1.15;
}
.adm-text p { font-size: 0.79rem; color: rgba(255,255,255,0.5); margin-top: 0.3rem; }
.adm-btns { display: flex; gap: 0.7rem; flex-wrap: wrap; position: relative; }
.ab {
  display: inline-block; text-decoration: none;
  font-size: 0.71rem; font-weight: 700; letter-spacing: 0.1em;
  text-transform: uppercase; padding: 0.68rem 1.4rem;
  border-radius: 3px; transition: all .18s;
  font-family: 'Plus Jakarta Sans', sans-serif; cursor: pointer;
  border: none;
}
.ab.gold { background: var(--gold); color: var(--maroonD); }
.ab.gold:hover { background: var(--goldL); }
.ab.ghost { border: 1.5px solid rgba(255,255,255,0.25); color: rgba(255,255,255,0.82); background: transparent; }
.ab.ghost:hover { border-color: var(--goldL); color: var(--goldL); }

/* ─── FOOTER GRID ─────────────────────────── */
.foot-grid {
  display: grid; grid-template-columns: 2fr 1fr 1fr 1fr;
  border-bottom: 1px solid var(--border);
  background: var(--white);
}
.fc { padding: 1.8rem 2rem; border-right: 1px solid var(--border); }
.fc:last-child { border-right: none; }
.fc-head {
  font-size: 0.58rem; letter-spacing: 0.16em; text-transform: uppercase;
  color: var(--maroon); font-weight: 700; margin-bottom: 1rem;
  display: flex; align-items: center; gap: 6px;
}
.fc-head::before { content: ''; width: 10px; height: 2px; background: var(--gold); }
.fc-brand {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.05rem; font-weight: 700; color: var(--maroon); margin-bottom: 0.3rem;
}
.fc-tagline {
  font-family: 'Cormorant Garamond', serif;
  font-style: italic; font-size: 0.82rem; color: var(--gold); margin-bottom: 0.6rem;
}
.fc p { font-size: 0.72rem; color: var(--muted); line-height: 1.6; }
.fc ul { list-style: none; }
.fc ul li { margin-bottom: 0.4rem; }
.fc ul li a { font-size: 0.73rem; color: var(--muted); text-decoration: none; transition: color .15s; }
.fc ul li a:hover { color: var(--maroon); }
.contact-list { display: flex; flex-direction: column; gap: 0.55rem; }
.ci h5 { font-size: 0.72rem; font-weight: 600; color: var(--maroon); }
.ci p { font-size: 0.66rem; color: var(--muted); }
.foot-bottom {
  display: flex; align-items: center; justify-content: space-between;
  padding: 0.9rem 2rem; flex-wrap: wrap; gap: 0.5rem;
  background: var(--cream); border-top: 1px solid var(--border);
}
.foot-bottom p { font-size: 0.64rem; color: var(--muted); }
.foot-links a {
  font-size: 0.62rem; color: var(--muted); text-decoration: none;
  margin-left: 1.2rem; transition: color .15s;
}
.foot-links a:hover { color: var(--maroon); }

/* ─── RESPONSIVE ──────────────────────────── */
@media (max-width: 960px) {
  .hero, .body-grid { grid-template-columns: 1fr; }
  .hero-side { display: none; }
  .qa { grid-template-columns: repeat(3, 1fr); }
  .prog-grid, .campus-row { grid-template-columns: 1fr 1fr; }
  .foot-grid { grid-template-columns: 1fr 1fr; }
  .nav-links a:not(.nav-cta) { display: none; }
}

/* ─── ANIMATIONS ──────────────────────────── */
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(18px); }
  to   { opacity: 1; transform: translateY(0); }
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
      <span>Saint Adeline Merit Scholarship — deadline extended to March 31</span>
      <span>Intramurals 2026: March 28–30 · Gymnasium &amp; Sports Fields</span>
      <span>Graduation Ceremony 2026: April 15 · Datamex Sports Complex</span>
      <span>Tuition balance deadline: April 5 — settle via cashier or portal</span>
      <!-- duplicate for seamless loop -->
      <span>Online Enrollment for 1st Sem AY 2026–2027 is now OPEN</span>
      <span>Final Exam Schedule released — check your department board</span>
      <span>Saint Adeline Merit Scholarship — deadline extended to March 31</span>
      <span>Intramurals 2026: March 28–30 · Gymnasium &amp; Sports Fields</span>
      <span>Graduation Ceremony 2026: April 15 · Datamex Sports Complex</span>
      <span>Tuition balance deadline: April 5 — settle via cashier or portal</span>
    </div>
  </div>
</div>

<!-- NAV -->
<nav>
  <a class="nav-brand" href="index.php">
    <div class="nav-seal"><img src="uploads/datamex_logo.png" alt="Datamex logo"/></div>
    <div class="nav-name">
      <b>Datamex College</b>
      <small>of Saint Adeline</small>
    </div>
  </a>
  <div class="nav-links">
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="academics.php">Academics</a>
    <a href="admission.php">Admissions</a>
    <a href="campus_life.php">Campus Life</a>
    <a href="news.php">News</a>
    <a href="login.php" class="nav-cta">Portal Login</a>
  </div>
</nav>

<!-- HERO -->
<div class="hero">
  <div class="hero-main">
    <div class="hero-kicker"><div class="kline"></div>Est. 2010 · Datamex College of Saint Adeline</div>
    <div>
      <h1 class="hero-h1">Knowledge.<br><em>Integrity.</em><br>Excellence.</h1>
      <p class="hero-desc" style="margin-top:1.2rem;">A higher education institution shaping competent, values-driven graduates — ready to lead, serve, and make a difference.</p>
      <div class="hero-btns" style="margin-top:1.5rem;">
        <a href="admission.php#apply" class="btn btn-gold">Apply Now</a>
        <a href="academics.php#programs" class="btn btn-outline">Explore Programs</a>
      </div>
    </div>
    <div class="hero-stats">
      <div class="hst"><div class="n">5K+</div><div class="l">Students</div></div>
      <div class="hst"><div class="n">12+</div><div class="l">Programs</div></div>
      <div class="hst"><div class="n">98%</div><div class="l">Employment</div></div>
      <div class="hst"><div class="n">2010</div><div class="l">Founded</div></div>
    </div>
  </div>

  <div class="hero-side">
    <!-- Login -->
    <div class="hs-panel">
      <div class="hs-label">Portal Login</div>
      <div class="login-tabs">
        <button class="ltab on" type="button" data-role="student" onclick="setPortalRole(this)">Student</button>
        <button class="ltab" type="button" data-role="faculty" onclick="setPortalRole(this)">Faculty</button>
        <button class="ltab" type="button" data-role="admin" onclick="setPortalRole(this)">Admin</button>
      </div>
      <input class="linput" type="text" id="portalUsernamePreview" placeholder="Student ID / Username"/>
      <input class="linput" type="password" placeholder="Password"/>
      <button class="btn-login" type="button" onclick="goToPortalLogin()">Login to Portal</button>
      <p class="login-hint" id="portalLoginHint">Default password: birthday (MMDDYYYY) &nbsp;·&nbsp; <a href="login.php?role=student">Help</a></p>
    </div>

    <!-- Announcements -->
    <div class="hs-panel">
      <div class="hs-label">Announcements</div>
      <div class="ann-row"><div class="ann-cat">Enrollment</div><p>1st Sem AY 2026–2027 online enrollment is now open via the student portal.</p><span class="ann-date">Mar 20, 2026</span></div>
      <div class="ann-row"><div class="ann-cat">Academic</div><p>Final exam schedule for 2nd Sem 2025–2026 has been posted.</p><span class="ann-date">Mar 18, 2026</span></div>
      <div class="ann-row"><div class="ann-cat">Scholarship</div><p>Merit Scholarship deadline extended to March 31. Apply at OSA.</p><span class="ann-date">Mar 15, 2026</span></div>
    </div>

    <!-- Events -->
    <div class="hs-panel">
      <div class="hs-label">Upcoming Events</div>
      <div class="ev-row">
        <div><div class="ev-date">25</div><div class="ev-mon">MAR</div></div>
        <div><h5>Campus Clean-up Drive</h5><p>Whole Campus</p></div>
      </div>
      <div class="ev-row">
        <div><div class="ev-date">28</div><div class="ev-mon">MAR</div></div>
        <div><h5>Intramurals 2026</h5><p>Gymnasium &amp; Fields</p></div>
      </div>
      <div class="ev-row">
        <div><div class="ev-date">15</div><div class="ev-mon">APR</div></div>
        <div><h5>Graduation 2026</h5><p>Sports Complex</p></div>
      </div>
    </div>
  </div>
</div>

<!-- QUICK ACCESS -->
<div class="qa">
  <a class="qa-item" href="#"><div class="qa-icon">📋</div>Enrollment</a>
  <a class="qa-item" href="#"><div class="qa-icon">📊</div>My Grades</a>
  <a class="qa-item" href="#"><div class="qa-icon">💰</div>Payments</a>
  <a class="qa-item" href="#"><div class="qa-icon">🗓️</div>Schedule</a>
  <a class="qa-item" href="#"><div class="qa-icon">📁</div>Forms</a>
  <a class="qa-item" href="#"><div class="qa-icon">📚</div>Library</a>
</div>

<!-- BODY GRID: NEWS + SIDEBAR -->
<div class="body-grid">
  <div class="main-col">
    <!-- News -->
    <div class="sec-head">
      <div><span class="sec-eyebrow">Latest</span><div class="sec-title">News &amp; Updates</div></div>
      <a href="news.php" class="link-all">View All →</a>
    </div>
    <div class="news-mosaic">
      <a class="nc feat" href="#">
        <span class="nc-cat">Featured · Enrollment</span>
        <h3>Online Enrollment for 1st Semester AY 2026–2027 Now Open</h3>
        <p>Continuing and incoming students may now process enrollment via the student portal. Coordinate with your academic adviser. Slots are limited per section.</p>
        <div class="nc-meta">March 20, 2026 · Registrar's Office</div>
      </a>
      <a class="nc" href="#">
        <span class="nc-cat">Academic</span>
        <h3>Final Examination Schedule for 2nd Semester Released</h3>
        <p>Check your department board and the portal for your room and schedule.</p>
        <div class="nc-meta">March 18, 2026</div>
        <div class="nc-rule"></div>
      </a>
      <a class="nc" href="#">
        <span class="nc-cat">Scholarship</span>
        <h3>Saint Adeline Merit Scholarship — Deadline Extended to March 31</h3>
        <p>Students with a GWA of 1.50 and above are encouraged to apply before the extended deadline.</p>
        <div class="nc-meta">March 15, 2026</div>
        <div class="nc-rule"></div>
      </a>
    </div>

    <!-- Calendar -->
    <div class="cal-spacer">
      <div class="sec-head">
        <div><span class="sec-eyebrow">Events</span><div class="sec-title">Upcoming Calendar</div></div>
        <a href="campus_life.php#events" class="link-all">Full Calendar →</a>
      </div>
      <div class="cal-list">
        <div class="cl"><div class="cl-date"><div class="d">25</div><div class="m">Mar</div></div><div class="cl-body"><h4>Campus Clean-up Drive</h4><p>All students &amp; faculty · Whole Campus</p></div></div>
        <div class="cl"><div class="cl-date"><div class="d">28</div><div class="m">Mar</div></div><div class="cl-body"><h4>Intramurals 2026</h4><p>March 28–30 · Gymnasium &amp; Sports Fields</p></div></div>
        <div class="cl"><div class="cl-date"><div class="d">3</div><div class="m">Apr</div></div><div class="cl-body"><h4>Entrepreneurship Summit</h4><p>Lecture Hall 1 · College of Business</p></div></div>
        <div class="cl"><div class="cl-date"><div class="d">10</div><div class="m">Apr</div></div><div class="cl-body"><h4>Cultural Night &amp; Prom</h4><p>Grand Ballroom · All Departments</p></div></div>
        <div class="cl"><div class="cl-date"><div class="d">15</div><div class="m">Apr</div></div><div class="cl-body"><h4>Graduation Ceremony 2026</h4><p>Datamex Sports Complex · Batch 2026</p></div></div>
      </div>
    </div>
  </div>

  <!-- Sidebar -->
  <div class="side-col">
    <div class="sb">
      <div class="sec-head"><div><span class="sec-eyebrow">Courses</span><div class="sec-title">Programs</div></div><a href="#" class="link-all">All →</a></div>
      <div>
        <a class="prog-row" href="#"><div><div class="prog-dept">IT</div><div class="prog-nm">BS Information Technology</div></div><div class="parr">›</div></a>
        <a class="prog-row" href="#"><div><div class="prog-dept">Business</div><div class="prog-nm">BS Business Administration</div></div><div class="parr">›</div></a>
        <a class="prog-row" href="#"><div><div class="prog-dept">Education</div><div class="prog-nm">Bachelor of Secondary Education</div></div><div class="parr">›</div></a>
        <a class="prog-row" href="#"><div><div class="prog-dept">Criminology</div><div class="prog-nm">BS Criminology</div></div><div class="parr">›</div></a>
        <a class="prog-row" href="#"><div><div class="prog-dept">Hospitality</div><div class="prog-nm">BS Hospitality Management</div></div><div class="parr">›</div></a>
        <a class="prog-row" href="#"><div><div class="prog-dept">SHS</div><div class="prog-nm">STEM · ABM · HUMSS · GAS</div></div><div class="parr">›</div></a>
      </div>
    </div>
    <div class="sb">
      <div class="sec-head" style="margin-bottom:1rem;"><div><span class="sec-eyebrow">Notices</span><div class="sec-title">Reminders</div></div></div>
      <div class="notice"><div class="ndot"></div><div><p>NSTP 100% attendance required for remaining sessions</p><span>Academic · Urgent</span></div></div>
      <div class="notice"><div class="ndot"></div><div><p>Tuition balance deadline: April 5</p><span>Finance</span></div></div>
      <div class="notice"><div class="ndot"></div><div><p>Online clearance processing opens March 25</p><span>Registrar</span></div></div>
      <div class="notice"><div class="ndot"></div><div><p>Library returns due March 28 — avoid fines</p><span>Library</span></div></div>
    </div>
  </div>
</div>

<!-- PROGRAMS SECTION -->
<div class="prog-section" id="programs">
  <div class="sec-head">
    <div><span class="sec-eyebrow">What We Offer</span><div class="sec-title">Academic Programs</div></div>
    <a href="#" class="link-all">View All Programs →</a>
  </div>
  <div class="prog-grid">
    <a class="pg" href="#"><div class="pg-dept">College of IT</div><div class="pg-name">BS Information Technology</div><div class="pg-dur">4 Years</div></a>
    <a class="pg" href="#"><div class="pg-dept">College of Business</div><div class="pg-name">BS Business Administration</div><div class="pg-dur">4 Years</div></a>
    <a class="pg" href="#"><div class="pg-dept">College of Education</div><div class="pg-name">Bachelor of Secondary Education</div><div class="pg-dur">4 Years</div></a>
    <a class="pg" href="#"><div class="pg-dept">College of Criminology</div><div class="pg-name">BS Criminology</div><div class="pg-dur">4 Years</div></a>
    <a class="pg" href="#"><div class="pg-dept">College of Hospitality</div><div class="pg-name">BS Hospitality Management</div><div class="pg-dur">4 Years</div></a>
    <a class="pg" href="#"><div class="pg-dept">Graduate School</div><div class="pg-name">Master of Business Administration</div><div class="pg-dur">2 Years</div></a>
    <a class="pg" href="#"><div class="pg-dept">Senior High School</div><div class="pg-name">STEM Track</div><div class="pg-dur">2 Years</div></a>
    <a class="pg" href="#"><div class="pg-dept">Senior High School</div><div class="pg-name">ABM · HUMSS · GAS Tracks</div><div class="pg-dur">2 Years</div></a>
  </div>
</div>

<!-- CAMPUS LIFE -->
<div class="campus-row">
  <div class="cs"><div class="cs-num">01</div><span class="cs-icon">🏅</span><h3>Sports &amp; Athletics</h3><p>Varsity teams, intramurals, and active student leagues across multiple sports disciplines.</p></div>
  <div class="cs"><div class="cs-num">02</div><span class="cs-icon">🎭</span><h3>Arts &amp; Culture</h3><p>Cultural nights, performing arts, campus festivals, and creative student organizations.</p></div>
  <div class="cs"><div class="cs-num">03</div><span class="cs-icon">🔬</span><h3>Research &amp; Innovation</h3><p>Student-led research, capstone exhibits, and technology innovation competitions.</p></div>
  <div class="cs"><div class="cs-num">04</div><span class="cs-icon">🤝</span><h3>Community Outreach</h3><p>Extension programs, service learning, and socially responsible campus initiatives.</p></div>
</div>

<!-- ADMISSION BAND -->
<div class="adm-band">
  <div class="adm-text">
    <h2>Applications open for AY 2026–2027.<br>Begin your Datamex journey.</h2>
    <p>Join a community of scholars, innovators, and future leaders.</p>
  </div>
  <div class="adm-btns">
    <a href="admission.php#apply" class="ab gold">Apply Now</a>
    <a href="admission.php#requirements" class="ab ghost">View Requirements</a>
    <a href="#" class="ab ghost">Contact Admissions</a>
  </div>
</div>

<!-- FOOTER -->
<div class="foot-grid">
  <div class="fc">
    <div class="fc-head">Datamex College</div>
    <div class="fc-brand">Datamex College of Saint Adeline</div>
    <div class="fc-tagline">"Illuminating Minds, Transforming Lives."</div>
    <p>A higher education institution dedicated to forming competent, values-driven graduates since 2010. Committed to quality education in the Philippines.</p>
  </div>
  <div class="fc">
    <div class="fc-head">Academics</div>
    <ul>
      <li><a href="academics.php#programs">Programs Offered</a></li>
      <li><a href="academics.php#calendar">Academic Calendar</a></li>
      <li><a href="academics.php#faculty">Faculty Directory</a></li>
      <li><a href="academics.php#resources">Library</a></li>
      <li><a href="academics.php#resources">Research</a></li>
    </ul>
  </div>
  <div class="fc">
    <div class="fc-head">Student Life</div>
    <ul>
      <li><a href="#">Organizations</a></li>
      <li><a href="#">Student Government</a></li>
      <li><a href="#">Sports</a></li>
      <li><a href="#">Campus Map</a></li>
      <li><a href="#">Health Services</a></li>
    </ul>
  </div>
  <div class="fc">
    <div class="fc-head">Contact</div>
    <div class="contact-list">
      <div class="ci"><h5>Registrar</h5><p>registrar@datamex.edu.ph</p></div>
      <div class="ci"><h5>Admissions</h5><p>admissions@datamex.edu.ph</p></div>
      <div class="ci"><h5>IT Help Desk</h5><p>helpdesk@datamex.edu.ph</p></div>
      <div class="ci"><h5>Finance</h5><p>finance@datamex.edu.ph</p></div>
    </div>
  </div>
</div>
<div class="foot-bottom">
  <p>© 2026 Datamex College of Saint Adeline. All rights reserved.</p>
  <div class="foot-links">
    <a href="#">Privacy Policy</a>
    <a href="#">Terms of Use</a>
    <a href="#">Sitemap</a>
  </div>
</div>

<script>
let selectedPortalRole = 'student';

const portalLoginMeta = {
  student: {
    placeholder: 'Student ID / Username',
    hint: 'Default password: birthday (MMDDYYYY) &nbsp;·&nbsp; <a href="login.php?role=student">Help</a>'
  },
  faculty: {
    placeholder: 'Faculty ID',
    hint: 'Use your assigned faculty portal password &nbsp;·&nbsp; <a href="login.php?role=faculty">Help</a>'
  },
  admin: {
    placeholder: 'Admin Username',
    hint: 'Use your administrator account credentials &nbsp;·&nbsp; <a href="login.php?role=admin">Help</a>'
  }
};

function setPortalRole(button) {
  document.querySelectorAll('.ltab').forEach(t => t.classList.remove('on'));
  button.classList.add('on');

  selectedPortalRole = button.dataset.role || 'student';
  document.getElementById('portalUsernamePreview').placeholder = portalLoginMeta[selectedPortalRole].placeholder;
  document.getElementById('portalLoginHint').innerHTML = portalLoginMeta[selectedPortalRole].hint;
}

function goToPortalLogin() {
  window.location.href = 'login.php?role=' + encodeURIComponent(selectedPortalRole);
}

document.querySelectorAll('.side-col .link-all, .prog-section .link-all').forEach(link => {
  link.href = 'academics.php#programs';
});

setPortalRole(document.querySelector('.ltab.on'));
</script>
</body>
</html>
