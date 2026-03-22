<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>News & Events — Datamex College of Saint Adeline</title>
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
.hero-inner{position:relative;z-index:1;display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:flex-end;animation:fadeUp .6s .1s both;}
.ph-eyebrow{font-size:.62rem;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);font-weight:600;margin-bottom:.8rem;display:flex;align-items:center;gap:8px;}
.ph-eyebrow::before{content:'';width:18px;height:1px;background:var(--gold);}
.page-hero h1{font-family:'Cormorant Garamond',serif;font-size:clamp(2.4rem,4.5vw,3.8rem);font-weight:400;color:var(--white);line-height:1.08;margin-bottom:1.2rem;}
.page-hero h1 em{font-style:italic;color:var(--goldL);display:block;}
.hero-desc{font-size:.88rem;color:rgba(255,255,255,.58);line-height:1.75;font-weight:300;max-width:480px;}
/* search bar in hero */
.hero-search{
  display:flex;gap:0;margin-top:1.5rem;
  border:1px solid rgba(255,255,255,.2);border-radius:4px;overflow:hidden;
  max-width:400px;
}
.hero-search input{
  flex:1;background:rgba(255,255,255,.08);border:none;
  padding:.65rem 1rem;font-size:.78rem;color:var(--white);
  font-family:'Plus Jakarta Sans',sans-serif;outline:none;
}
.hero-search input::placeholder{color:rgba(255,255,255,.35);}
.hero-search button{
  background:var(--gold);color:var(--maroonD);border:none;
  padding:.65rem 1.1rem;font-size:.72rem;font-weight:700;
  letter-spacing:.06em;text-transform:uppercase;
  font-family:'Plus Jakarta Sans',sans-serif;cursor:pointer;
  transition:background .15s;
}
.hero-search button:hover{background:var(--goldL);}
/* right stat panel */
.hi-right{display:grid;grid-template-columns:1fr 1fr;gap:1px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.1);border-bottom:none;border-radius:4px 4px 0 0;overflow:hidden;align-self:flex-end;}
.hstat{background:rgba(0,0,0,.18);padding:1.2rem 1rem;}
.hstat .n{font-family:'Cormorant Garamond',serif;font-size:2rem;font-weight:700;color:var(--gold);line-height:1;}
.hstat .l{font-size:.58rem;color:rgba(255,255,255,.45);text-transform:uppercase;letter-spacing:.1em;margin-top:4px;font-weight:500;}
@keyframes fadeUp{from{opacity:0;transform:translateY(16px);}to{opacity:1;transform:translateY(0);}}

/* ── FILTER BAR ── */
.filter-bar{background:var(--white);border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;padding:.75rem 2.5rem;gap:1rem;flex-wrap:wrap;}
.filter-tabs{display:flex;gap:.4rem;flex-wrap:wrap;}
.ftab{font-size:.68rem;font-weight:600;letter-spacing:.04em;padding:.32rem .85rem;border-radius:20px;border:1.5px solid var(--border);background:transparent;color:var(--muted);cursor:pointer;transition:all .18s;font-family:'Plus Jakarta Sans',sans-serif;}
.ftab.on{background:var(--maroon);color:var(--white);border-color:var(--maroon);}
.ftab:hover:not(.on){border-color:var(--maroon);color:var(--maroon);}
.filter-count{font-size:.66rem;color:var(--muted);white-space:nowrap;}
.filter-count span{font-weight:700;color:var(--maroon);}

/* ── LAYOUT ── */
.body-wrap{display:grid;grid-template-columns:1fr 280px;}
.main{padding:2.5rem;border-right:1px solid var(--border);}
.aside{padding:2rem 1.5rem;background:var(--cream);}

/* ── FEATURED NEWS ── */
.featured-mosaic{
  display:grid;
  grid-template-columns:1.4fr 1fr;
  grid-template-rows:auto auto;
  gap:1px;background:var(--border);
  border:1px solid var(--border);
  border-radius:4px;overflow:hidden;
  margin-bottom:2.5rem;
}
.nc{background:var(--white);text-decoration:none;color:inherit;transition:background .18s;position:relative;overflow:hidden;}
.nc:hover{background:var(--off);}
.nc::after{content:'';position:absolute;bottom:0;left:0;right:0;height:1px;background:linear-gradient(to right,var(--gold),transparent);opacity:0;transition:opacity .2s;}
.nc:hover::after{opacity:1;}
.nc.feat{grid-row:1/3;background:var(--maroon);display:flex;flex-direction:column;justify-content:flex-end;}
.nc.feat:hover{background:var(--maroonL);}
.nc.feat::after{height:3px;opacity:1;}
/* placeholder image area */
.nc-img{height:160px;background:var(--off);display:flex;align-items:center;justify-content:center;border-bottom:1px solid var(--border);position:relative;overflow:hidden;}
.nc-img.ph{background:linear-gradient(135deg,rgba(123,13,30,.08),rgba(201,160,48,.06));}
.nc-img .ph-icon{font-size:2.2rem;opacity:.4;}
.nc-img .ph-label{position:absolute;bottom:.5rem;left:.7rem;font-size:.56rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);background:var(--white);padding:.15rem .5rem;border-radius:2px;}
.nc-body{padding:1.3rem 1.4rem;}
.nc-cat{font-size:.57rem;letter-spacing:.14em;text-transform:uppercase;font-weight:700;color:var(--gold);margin-bottom:.5rem;display:block;}
.nc-feat-body{padding:1.5rem;}
.nc-feat-body .nc-cat{color:var(--goldL);}
.nc h3{font-family:'Cormorant Garamond',serif;font-size:1rem;font-weight:700;color:var(--maroon);line-height:1.35;margin-bottom:.4rem;}
.nc.feat h3{font-size:1.55rem;color:var(--white);margin-bottom:.7rem;line-height:1.2;}
.nc p{font-size:.74rem;color:var(--muted);line-height:1.6;}
.nc.feat p{color:rgba(255,255,255,.5);}
.nc-meta{font-size:.6rem;color:var(--muted);margin-top:.7rem;display:flex;align-items:center;gap:.4rem;}
.nc.feat .nc-meta{color:rgba(255,255,255,.3);}
.nc-meta .dot{color:var(--gold);font-size:.4rem;}
.nc-tag{display:inline-block;font-size:.57rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;padding:.15rem .45rem;border-radius:2px;margin-right:.3rem;}
.nt-academic{background:rgba(123,13,30,.08);color:var(--maroon);}
.nt-events{background:rgba(201,160,48,.1);color:var(--goldD);}
.nt-sports{background:rgba(20,100,20,.07);color:#1a6020;}
.nt-scholarship{background:rgba(15,29,86,.07);color:#0f1d56;}
.nt-announcement{background:rgba(123,13,30,.08);color:var(--maroon);}
.nt-community{background:rgba(80,40,0,.07);color:#6b3800;}

/* ── NEWS GRID ── */
.section-head{display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:1.2rem;padding-bottom:.8rem;border-bottom:1px solid var(--border);}
.sh-eyebrow{font-size:.57rem;letter-spacing:.18em;text-transform:uppercase;color:var(--gold);font-weight:700;display:block;margin-bottom:2px;}
.sh-title{font-family:'Cormorant Garamond',serif;font-size:1.2rem;font-weight:700;color:var(--maroon);}
.link-all{font-size:.64rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--maroon);text-decoration:none;border-bottom:1px solid var(--gold);padding-bottom:1px;transition:opacity .15s;}
.link-all:hover{opacity:.7;}

.news-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--border);border:1px solid var(--border);border-radius:4px;overflow:hidden;margin-bottom:2.5rem;}
.ng-card{background:var(--white);text-decoration:none;color:inherit;transition:background .18s;position:relative;}
.ng-card:hover{background:var(--off);}
.ng-card::after{content:'';position:absolute;bottom:0;left:0;right:0;height:2px;background:var(--gold);transform:scaleX(0);transform-origin:left;transition:transform .25s;}
.ng-card:hover::after{transform:scaleX(1);}
.ng-img{height:120px;background:var(--off);display:flex;align-items:center;justify-content:center;border-bottom:1px solid var(--border);position:relative;overflow:hidden;}
.ng-img.ph-blue{background:linear-gradient(135deg,rgba(15,29,86,.06),rgba(201,160,48,.05));}
.ng-img.ph-maroon{background:linear-gradient(135deg,rgba(123,13,30,.06),rgba(201,160,48,.05));}
.ng-img.ph-gold{background:linear-gradient(135deg,rgba(201,160,48,.08),rgba(123,13,30,.04));}
.ng-img .ico{font-size:1.8rem;opacity:.4;}
.ng-img .ph-label{position:absolute;bottom:.4rem;left:.6rem;font-size:.55rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);background:rgba(255,255,255,.85);padding:.1rem .4rem;border-radius:2px;}
.ng-body{padding:1.1rem;}
.ng-cat{font-size:.56rem;letter-spacing:.12em;text-transform:uppercase;font-weight:700;color:var(--gold);margin-bottom:.4rem;display:block;}
.ng-card h3{font-family:'Cormorant Garamond',serif;font-size:.95rem;font-weight:700;color:var(--maroon);line-height:1.35;margin-bottom:.35rem;}
.ng-card p{font-size:.72rem;color:var(--muted);line-height:1.55;}
.ng-meta{font-size:.6rem;color:var(--muted);margin-top:.6rem;display:flex;align-items:center;gap:.4rem;}
.ng-meta .dot{color:var(--gold);font-size:.4rem;}

/* ── ANNOUNCEMENTS LIST ── */
.ann-list{display:flex;flex-direction:column;gap:0;border:1px solid var(--border);border-radius:4px;overflow:hidden;margin-bottom:2.5rem;}
.ann-row{
  background:var(--white);
  display:flex;align-items:center;gap:1.2rem;
  padding:1rem 1.4rem;
  border-bottom:1px solid var(--border);
  text-decoration:none;color:inherit;
  transition:background .15s;
  position:relative;
}
.ann-row:last-child{border-bottom:none;}
.ann-row:hover{background:var(--off);}
.ann-row::before{content:'';position:absolute;left:0;top:0;bottom:0;width:3px;background:var(--gold);opacity:0;transition:opacity .2s;}
.ann-row:hover::before{opacity:1;}
.ann-date-block{text-align:center;min-width:44px;flex-shrink:0;}
.adb-day{font-family:'Cormorant Garamond',serif;font-size:1.6rem;font-weight:700;color:var(--maroon);line-height:1;}
.adb-mon{font-size:.52rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--gold);}
.ann-divider{width:1px;height:40px;background:var(--border);flex-shrink:0;}
.ann-body{flex:1;}
.ann-body h4{font-size:.84rem;font-weight:700;color:var(--ink);margin-bottom:2px;}
.ann-body p{font-size:.72rem;color:var(--muted);line-height:1.45;}
.ann-right{display:flex;flex-direction:column;align-items:flex-end;gap:.3rem;flex-shrink:0;}
.ann-tag{font-size:.56rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:.15rem .45rem;border-radius:2px;}
.ann-arr{font-size:.85rem;color:var(--border);transition:color .18s;}
.ann-row:hover .ann-arr{color:var(--gold);}
.at-academic{background:rgba(123,13,30,.08);color:var(--maroon);}
.at-enrollment{background:rgba(201,160,48,.1);color:var(--goldD);}
.at-finance{background:rgba(180,40,40,.08);color:#b02020;}
.at-event{background:rgba(15,29,86,.07);color:#0f1d56;}

/* ── EVENTS CALENDAR ── */
.event-band{
  display:grid;grid-template-columns:1fr 1fr;
  gap:1px;background:var(--border);
  border:1px solid var(--border);border-radius:4px;overflow:hidden;
}
.ev-card{background:var(--white);padding:1.3rem;transition:background .18s;cursor:default;}
.ev-card:hover{background:var(--off);}
.ev-header{display:flex;align-items:center;gap:.85rem;margin-bottom:.7rem;}
.ev-date-box{
  background:var(--maroon);color:var(--white);
  border-radius:4px;padding:.4rem .6rem;text-align:center;
  flex-shrink:0;min-width:48px;border-bottom:2px solid var(--gold);
}
.ev-date-box .d{font-family:'Cormorant Garamond',serif;font-size:1.5rem;font-weight:700;line-height:1;}
.ev-date-box .m{font-size:.52rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--goldL);}
.ev-info h4{font-family:'Cormorant Garamond',serif;font-size:1rem;font-weight:700;color:var(--maroon);}
.ev-info p{font-size:.65rem;color:var(--muted);margin-top:1px;}
.ev-desc{font-size:.74rem;color:var(--muted);line-height:1.6;}
.ev-tags{display:flex;gap:.3rem;margin-top:.6rem;flex-wrap:wrap;}

/* ── PLACEHOLDER NOTICE ── */
.ph-notice{
  display:flex;align-items:center;gap:.8rem;
  background:rgba(201,160,48,.07);
  border:1px dashed rgba(201,160,48,.4);
  border-radius:4px;padding:.75rem 1rem;
  margin-bottom:1.5rem;
}
.ph-notice .phn-icon{font-size:1rem;flex-shrink:0;}
.ph-notice p{font-size:.72rem;color:var(--goldD);line-height:1.4;}
.ph-notice strong{color:var(--maroon);}

/* ── ASIDE ── */
.aside-widget{background:var(--white);border:1px solid var(--border);border-radius:4px;overflow:hidden;margin-bottom:1.2rem;}
.aw-head{background:var(--maroon);padding:.85rem 1.1rem;display:flex;align-items:center;gap:.6rem;}
.aw-head h4{font-size:.7rem;font-weight:700;color:var(--white);letter-spacing:.04em;}
.aw-head .awi{font-size:.9rem;}
.aw-body{padding:1.1rem;}
.aw-body p{font-size:.73rem;color:var(--muted);line-height:1.6;margin-bottom:.7rem;}
/* newsletter form */
.nl-form{display:flex;flex-direction:column;gap:.5rem;}
.nl-input{width:100%;background:var(--off);border:1.5px solid var(--border);border-radius:4px;padding:.55rem .8rem;font-size:.76rem;color:var(--ink);font-family:'Plus Jakarta Sans',sans-serif;outline:none;transition:border-color .15s;}
.nl-input:focus{border-color:var(--maroon);}
.nl-btn{background:var(--maroon);color:var(--white);border:none;border-radius:4px;padding:.58rem;font-size:.69rem;font-weight:700;letter-spacing:.09em;text-transform:uppercase;font-family:'Plus Jakarta Sans',sans-serif;cursor:pointer;transition:background .15s;}
.nl-btn:hover{background:var(--maroonL);}
/* tag cloud */
.tag-cloud{display:flex;gap:.4rem;flex-wrap:wrap;}
.tc-tag{font-size:.63rem;font-weight:600;padding:.25rem .65rem;border-radius:20px;border:1.5px solid var(--border);color:var(--muted);text-decoration:none;transition:all .18s;cursor:pointer;}
.tc-tag:hover{border-color:var(--maroon);color:var(--maroon);}
/* recent list */
.recent-list{display:flex;flex-direction:column;gap:0;}
.rl-item{display:flex;gap:.75rem;align-items:flex-start;padding:.65rem 0;border-bottom:1px solid var(--border);text-decoration:none;color:inherit;}
.rl-item:last-child{border-bottom:none;}
.rl-img{width:44px;height:44px;border-radius:3px;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:1.1rem;}
.rl-img.c1{background:rgba(123,13,30,.08);}
.rl-img.c2{background:rgba(201,160,48,.1);}
.rl-img.c3{background:rgba(15,29,86,.07);}
.rl-img.c4{background:rgba(20,100,20,.07);}
.rl-body h5{font-size:.74rem;font-weight:600;color:var(--maroon);line-height:1.3;}
.rl-body span{font-size:.6rem;color:var(--muted);margin-top:2px;display:block;}

/* ── PAGINATION ── */
.pagination{display:flex;align-items:center;justify-content:center;gap:.4rem;margin-top:1.5rem;}
.pg-btn{width:32px;height:32px;border-radius:4px;border:1.5px solid var(--border);background:var(--white);font-size:.72rem;font-weight:600;color:var(--muted);cursor:pointer;transition:all .18s;font-family:'Plus Jakarta Sans',sans-serif;display:flex;align-items:center;justify-content:center;}
.pg-btn:hover{border-color:var(--maroon);color:var(--maroon);}
.pg-btn.active{background:var(--maroon);color:var(--white);border-color:var(--maroon);}

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

/* ── ARTICLE MODAL OVERLAY ── */
.modal-overlay{position:fixed;inset:0;background:rgba(26,16,24,.65);z-index:500;display:flex;align-items:center;justify-content:center;padding:2rem;opacity:0;pointer-events:none;transition:opacity .25s;}
.modal-overlay.open{opacity:1;pointer-events:all;}
.modal{background:var(--white);border-radius:6px;width:100%;max-width:680px;max-height:88vh;overflow-y:auto;box-shadow:0 24px 80px rgba(0,0,0,.25);animation:modalIn .25s ease;}
@keyframes modalIn{from{transform:translateY(20px);opacity:0;}to{transform:translateY(0);opacity:1;}}
.modal-hero{background:var(--maroon);padding:2rem 2rem 1.5rem;border-bottom:3px solid var(--gold);position:relative;}
.modal-close{position:absolute;top:1rem;right:1rem;width:28px;height:28px;border-radius:50%;background:rgba(255,255,255,.15);border:none;color:var(--white);font-size:.9rem;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:background .15s;}
.modal-close:hover{background:rgba(255,255,255,.25);}
.modal-cat{font-size:.57rem;letter-spacing:.16em;text-transform:uppercase;font-weight:700;color:var(--goldL);margin-bottom:.6rem;display:block;}
.modal h2{font-family:'Cormorant Garamond',serif;font-size:1.6rem;font-weight:700;color:var(--white);line-height:1.2;margin-bottom:.5rem;}
.modal-meta{font-size:.64rem;color:rgba(255,255,255,.4);}
.modal-body{padding:1.8rem 2rem;}
.modal-img-ph{height:180px;background:linear-gradient(135deg,rgba(123,13,30,.07),rgba(201,160,48,.06));border-radius:4px;display:flex;align-items:center;justify-content:center;margin-bottom:1.3rem;border:1px dashed rgba(201,160,48,.3);}
.modal-img-ph .ph-text{font-size:.7rem;color:var(--muted);display:flex;flex-direction:column;align-items:center;gap:.4rem;}
.modal-img-ph .ph-icon{font-size:2rem;opacity:.4;}
.modal-body p{font-size:.83rem;color:var(--muted);line-height:1.8;margin-bottom:1rem;}
.modal-body strong{color:var(--maroon);}
.modal-tags{display:flex;gap:.4rem;flex-wrap:wrap;margin-top:1rem;padding-top:1rem;border-top:1px solid var(--border);}
.modal-footer{padding:1rem 2rem 1.5rem;border-top:1px solid var(--border);display:flex;gap:.6rem;justify-content:flex-end;}
.mf-btn{font-size:.69rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;padding:.55rem 1.1rem;border-radius:3px;transition:all .18s;cursor:pointer;font-family:'Plus Jakarta Sans',sans-serif;}
.mf-solid{background:var(--maroon);color:var(--white);border:none;}
.mf-solid:hover{background:var(--maroonL);}
.mf-outline{background:transparent;color:var(--maroon);border:1.5px solid var(--border);}
.mf-outline:hover{border-color:var(--maroon);}

@media(max-width:960px){.body-wrap{grid-template-columns:1fr;}.aside{display:none;}.hero-inner{grid-template-columns:1fr;}.hi-right{display:none;}.featured-mosaic,.news-grid{grid-template-columns:1fr;}.nc.feat{grid-row:auto;}.event-band{grid-template-columns:1fr;}.nav-links a:not(.nav-cta){display:none;}}
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
      <span>Intramurals 2026: March 28–30 · Gymnasium &amp; Fields</span>
      <span>Online Enrollment for 1st Sem AY 2026–2027 is now OPEN</span>
      <span>Final Exam Schedule released — check your department board</span>
      <span>Merit Scholarship deadline extended to March 31</span>
      <span>Intramurals 2026: March 28–30 · Gymnasium &amp; Fields</span>
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
    <a href="campus_life.php">Campus Life</a>
    <a href="news.php" class="active">News</a>
    <a href="login.php" class="nav-cta">Portal Login</a>
  </div>
</nav>

<!-- PAGE HERO -->
<div class="page-hero">
  <div class="breadcrumb">
    <a href="index.php">Home</a><span class="sep">/</span><span class="cur">News &amp; Events</span>
  </div>
  <div class="hero-inner">
    <div>
      <div class="ph-eyebrow">News &amp; Events</div>
      <h1>Stay Informed.<br><em>Stay Connected.</em></h1>
      <p class="hero-desc">Stay updated with the latest announcements, academic schedules, and campus happenings at Datamex College of Saint Adeline.</p>
      <div class="hero-search">
        <input type="text" placeholder="Search news, events, announcements…"/>
        <button>Search</button>
      </div>
    </div>
    <div class="hi-right">
      <div class="hstat"><div class="n">24</div><div class="l">Articles</div></div>
      <div class="hstat"><div class="n">8</div><div class="l">Events</div></div>
      <div class="hstat"><div class="n">12</div><div class="l">Notices</div></div>
      <div class="hstat"><div class="n">Mar</div><div class="l">Last Updated</div></div>
    </div>
  </div>
</div>

<!-- FILTER BAR -->
<div class="filter-bar">
  <div class="filter-tabs">
    <button class="ftab on" onclick="filterNews('all',this)">All</button>
    <button class="ftab" onclick="filterNews('announcement',this)">Announcements</button>
    <button class="ftab" onclick="filterNews('academic',this)">Academic</button>
    <button class="ftab" onclick="filterNews('events',this)">Events</button>
    <button class="ftab" onclick="filterNews('scholarship',this)">Scholarships</button>
    <button class="ftab" onclick="filterNews('sports',this)">Sports</button>
    <button class="ftab" onclick="filterNews('community',this)">Community</button>
  </div>
  <div class="filter-count">Showing <span id="countNum">12</span> articles</div>
</div>

<!-- BODY -->
<div class="body-wrap">
  <div class="main">

    <!-- PLACEHOLDER NOTICE -->
    <div class="ph-notice">
      <span class="phn-icon">📌</span>
      <p><strong>Placeholder Content:</strong> The articles and images below are sample placeholders. Replace these with actual news, announcements, and event photos once content is available from the Communications Office.</p>
    </div>

    <!-- FEATURED NEWS MOSAIC -->
    <div class="section-head">
      <div><span class="sh-eyebrow">Top Story</span><div class="sh-title">Featured News</div></div>
    </div>

    <div class="featured-mosaic">
      <!-- Main featured -->
      <a href="#" class="nc feat" onclick="openModal('feat');return false;">
        <div class="nc-feat-body">
          <span class="nc-cat">📌 Featured · Enrollment</span>
          <h3>Online Enrollment for 1st Semester AY 2026–2027 is Now Open</h3>
          <p>Continuing and incoming students may now process their enrollment through the official student portal. Coordinate with your academic adviser before proceeding. Slots are limited per section — enroll early to secure your preferred schedule.</p>
          <div class="nc-meta"><span>March 20, 2026</span><span class="dot">◆</span><span>Registrar's Office</span><span class="dot">◆</span><span>5 min read</span></div>
        </div>
      </a>
      <!-- Side 1 -->
      <a href="#" class="nc" data-cat="academic" onclick="openModal('s1');return false;">
        <div class="nc-img ph"><span class="ph-icon">📋</span><span class="ph-label">Photo placeholder</span></div>
        <div class="nc-body">
          <span class="nc-cat">Academic</span>
          <h3>Final Examination Schedule for 2nd Semester Released</h3>
          <p>Check your department board and the student portal for your exam schedule and room assignment.</p>
          <div class="nc-meta"><span>Mar 18, 2026</span><span class="dot">◆</span><span>Academic Affairs</span></div>
        </div>
      </a>
      <!-- Side 2 -->
      <a href="#" class="nc" data-cat="scholarship" onclick="openModal('s2');return false;">
        <div class="nc-img ph"><span class="ph-icon">🎓</span><span class="ph-label">Photo placeholder</span></div>
        <div class="nc-body">
          <span class="nc-cat">Scholarship</span>
          <h3>Saint Adeline Merit Scholarship — Application Deadline Extended to March 31</h3>
          <p>Students with a GWA of 1.50 and above are encouraged to submit their applications before the extended deadline.</p>
          <div class="nc-meta"><span>Mar 15, 2026</span><span class="dot">◆</span><span>OSA Office</span></div>
        </div>
      </a>
    </div>

    <!-- LATEST NEWS GRID -->
    <div class="section-head">
      <div><span class="sh-eyebrow">Latest</span><div class="sh-title">All News &amp; Articles</div></div>
      <a href="#" class="link-all">View All →</a>
    </div>

    <div class="news-grid" id="newsGrid">

      <a href="#" class="ng-card" data-cat="events" onclick="openModal('n1');return false;">
        <div class="ng-img ph-maroon"><span class="ico">🏅</span><span class="ph-label">Event photo</span></div>
        <div class="ng-body">
          <span class="ng-cat">Events</span>
          <h3>Intramurals 2026 — Opening Ceremony This March 28</h3>
          <p>Three days of sports, cheerdance, and school spirit. All departments compete for the overall championship.</p>
          <div class="ng-meta"><span>Mar 14, 2026</span><span class="dot">◆</span><span>Sports Office</span></div>
        </div>
      </a>

      <a href="#" class="ng-card" data-cat="community" onclick="openModal('n2');return false;">
        <div class="ng-img ph-gold"><span class="ico">🤝</span><span class="ph-label">Outreach photo</span></div>
        <div class="ng-body">
          <span class="ng-cat">Community</span>
          <h3>Datamex Students Lead Community Outreach in Partner Barangay</h3>
          <p>Over 300 student volunteers participated in the barangay adoption program, distributing goods and educational materials.</p>
          <div class="ng-meta"><span>Mar 10, 2026</span><span class="dot">◆</span><span>Student Affairs</span></div>
        </div>
      </a>

      <a href="#" class="ng-card" data-cat="academic" onclick="openModal('n3');return false;">
        <div class="ng-img ph-blue"><span class="ico">📐</span><span class="ph-label">Photo placeholder</span></div>
        <div class="ng-body">
          <span class="ng-cat">Academic</span>
          <h3>New MBA Program Launches This June 2026</h3>
          <p>Datamex's Graduate School opens its doors to working professionals with evening and weekend MBA classes.</p>
          <div class="ng-meta"><span>Mar 8, 2026</span><span class="dot">◆</span><span>Graduate School</span></div>
        </div>
      </a>

      <a href="#" class="ng-card" data-cat="sports" onclick="openModal('n4');return false;">
        <div class="ng-img ph-maroon"><span class="ico">🏀</span><span class="ph-label">Game photo</span></div>
        <div class="ng-body">
          <span class="ng-cat">Sports</span>
          <h3>Datamex Basketball Team Advances to Regional Finals</h3>
          <p>The Datamex Stallions clinched a spot in the regional collegiate basketball finals after a thrilling overtime win.</p>
          <div class="ng-meta"><span>Mar 5, 2026</span><span class="dot">◆</span><span>Sports Office</span></div>
        </div>
      </a>

      <a href="#" class="ng-card" data-cat="announcement" onclick="openModal('n5');return false;">
        <div class="ng-img ph-gold"><span class="ico">📢</span><span class="ph-label">Photo placeholder</span></div>
        <div class="ng-body">
          <span class="ng-cat">Announcement</span>
          <h3>NSTP Completion Requirements — Important Reminder for All Students</h3>
          <p>All NSTP-enrolled students are reminded of the mandatory 100% attendance requirement for remaining sessions.</p>
          <div class="ng-meta"><span>Mar 3, 2026</span><span class="dot">◆</span><span>NSTP Office</span></div>
        </div>
      </a>

      <a href="#" class="ng-card" data-cat="events" onclick="openModal('n6');return false;">
        <div class="ng-img ph-blue"><span class="ico">🎭</span><span class="ph-label">Event photo</span></div>
        <div class="ng-body">
          <span class="ng-cat">Events</span>
          <h3>Cultural Night &amp; Prom Night 2026 — Save the Date: April 10</h3>
          <p>The most anticipated social event of the year returns. Formal attire required. Tickets available at the OSA.</p>
          <div class="ng-meta"><span>Feb 28, 2026</span><span class="dot">◆</span><span>Student Affairs</span></div>
        </div>
      </a>

      <a href="#" class="ng-card" data-cat="academic" onclick="openModal('n7');return false;">
        <div class="ng-img ph-maroon"><span class="ico">🔬</span><span class="ph-label">STEM photo</span></div>
        <div class="ng-body">
          <span class="ng-cat">Academic</span>
          <h3>STEM Fair 2026 Showcases Student Innovation and Research</h3>
          <p>IT and Science students presented capstone projects, research papers, and working prototypes to faculty and industry judges.</p>
          <div class="ng-meta"><span>Feb 22, 2026</span><span class="dot">◆</span><span>College of IT</span></div>
        </div>
      </a>

      <a href="#" class="ng-card" data-cat="community" onclick="openModal('n8');return false;">
        <div class="ng-img ph-gold"><span class="ico">🌿</span><span class="ph-label">Outreach photo</span></div>
        <div class="ng-body">
          <span class="ng-cat">Community</span>
          <h3>Datamex Joins National Coastal Clean-up Drive</h3>
          <p>Environmental Stewards Society led the Datamex delegation to a coastal clean-up initiative with 5 partner schools.</p>
          <div class="ng-meta"><span>Feb 18, 2026</span><span class="dot">◆</span><span>Student Org</span></div>
        </div>
      </a>

      <a href="#" class="ng-card" data-cat="scholarship" onclick="openModal('n9');return false;">
        <div class="ng-img ph-blue"><span class="ico">💡</span><span class="ph-label">Photo placeholder</span></div>
        <div class="ng-body">
          <span class="ng-cat">Scholarship</span>
          <h3>CHED Scholarship Slots Available — Apply Before March 20</h3>
          <p>Qualified students may apply for CHED Tertiary Education Subsidy (TES) scholarship. Requirements available at the OSA.</p>
          <div class="ng-meta"><span>Feb 14, 2026</span><span class="dot">◆</span><span>OSA Office</span></div>
        </div>
      </a>

    </div>

    <div class="pagination">
      <button class="pg-btn">‹</button>
      <button class="pg-btn active">1</button>
      <button class="pg-btn">2</button>
      <button class="pg-btn">3</button>
      <button class="pg-btn">›</button>
    </div>

    <!-- ANNOUNCEMENTS LIST -->
    <div class="section-head" style="margin-top:2.5rem;">
      <div><span class="sh-eyebrow">Official Notices</span><div class="sh-title">Announcements</div></div>
      <a href="#" class="link-all">View All →</a>
    </div>

    <div class="ann-list">
      <a href="#" class="ann-row" onclick="openModal('a1');return false;">
        <div class="ann-date-block"><div class="adb-day">20</div><div class="adb-mon">Mar</div></div>
        <div class="ann-divider"></div>
        <div class="ann-body">
          <h4>1st Semester AY 2026–2027 Online Enrollment is Now Open</h4>
          <p>Proceed via the student portal. Coordination with academic adviser required before enlistment.</p>
        </div>
        <div class="ann-right"><span class="ann-tag at-enrollment">Enrollment</span><span class="ann-arr">›</span></div>
      </a>
      <a href="#" class="ann-row" onclick="openModal('a2');return false;">
        <div class="ann-date-block"><div class="adb-day">18</div><div class="adb-mon">Mar</div></div>
        <div class="ann-divider"></div>
        <div class="ann-body">
          <h4>Final Examination Schedule — 2nd Semester AY 2025–2026</h4>
          <p>Schedules are posted on department boards and accessible through the student portal.</p>
        </div>
        <div class="ann-right"><span class="ann-tag at-academic">Academic</span><span class="ann-arr">›</span></div>
      </a>
      <a href="#" class="ann-row" onclick="openModal('a3');return false;">
        <div class="ann-date-block"><div class="adb-day">15</div><div class="adb-mon">Mar</div></div>
        <div class="ann-divider"></div>
        <div class="ann-body">
          <h4>Merit Scholarship Application Deadline Extended to March 31</h4>
          <p>Students with GWA 1.50 and above — submit requirements to OSA before the extended deadline.</p>
        </div>
        <div class="ann-right"><span class="ann-tag at-enrollment">Scholarship</span><span class="ann-arr">›</span></div>
      </a>
      <a href="#" class="ann-row" onclick="openModal('a4');return false;">
        <div class="ann-date-block"><div class="adb-day">10</div><div class="adb-mon">Mar</div></div>
        <div class="ann-divider"></div>
        <div class="ann-body">
          <h4>Tuition Balance Deadline: April 5, 2026</h4>
          <p>Settle all outstanding balances to avoid holds on transcript and enrollment for the next semester.</p>
        </div>
        <div class="ann-right"><span class="ann-tag at-finance">Finance</span><span class="ann-arr">›</span></div>
      </a>
      <a href="#" class="ann-row" onclick="openModal('a5');return false;">
        <div class="ann-date-block"><div class="adb-day">5</div><div class="adb-mon">Mar</div></div>
        <div class="ann-divider"></div>
        <div class="ann-body">
          <h4>NSTP: Mandatory 100% Attendance Required for Remaining Sessions</h4>
          <p>All NSTP students must complete attendance. Non-compliance affects final grade. See NSTP coordinator for concerns.</p>
        </div>
        <div class="ann-right"><span class="ann-tag at-academic">Academic</span><span class="ann-arr">›</span></div>
      </a>
      <a href="#" class="ann-row" onclick="openModal('a6');return false;">
        <div class="ann-date-block"><div class="adb-day">1</div><div class="adb-mon">Mar</div></div>
        <div class="ann-divider"></div>
        <div class="ann-body">
          <h4>Online Clearance Processing Opens March 25</h4>
          <p>Students may process end-of-semester clearance through the student portal starting March 25, 2026.</p>
        </div>
        <div class="ann-right"><span class="ann-tag at-event">Registrar</span><span class="ann-arr">›</span></div>
      </a>
    </div>

    <!-- EVENTS CALENDAR STRIP -->
    <div class="section-head" style="margin-top:2.5rem;">
      <div><span class="sh-eyebrow">What's Coming</span><div class="sh-title">Upcoming Events</div></div>
      <a href="campus_life.php#events" class="link-all">All Events →</a>
    </div>

    <div class="event-band">
      <div class="ev-card">
        <div class="ev-header">
          <div class="ev-date-box"><div class="d">25</div><div class="m">MAR</div></div>
          <div class="ev-info"><h4>Campus Clean-up Drive</h4><p>7:00 AM · Whole Campus</p></div>
        </div>
        <p class="ev-desc">Annual campus-wide clean-up initiative. All students and faculty are encouraged to join. Wear PE uniform, bring gloves. NSTP and community service hours credited.</p>
        <div class="ev-tags"><span class="ann-tag at-event">Civic</span></div>
      </div>
      <div class="ev-card">
        <div class="ev-header">
          <div class="ev-date-box"><div class="d">28</div><div class="m">MAR</div></div>
          <div class="ev-info"><h4>Intramurals 2026</h4><p>March 28–30 · Gymnasium &amp; Fields</p></div>
        </div>
        <p class="ev-desc">The biggest sporting event of the year — three days of competition, cheerdance battles, and school spirit. Opening ceremonies at 8AM, March 28.</p>
        <div class="ev-tags"><span class="ann-tag at-academic">Sports</span></div>
      </div>
      <div class="ev-card">
        <div class="ev-header">
          <div class="ev-date-box"><div class="d">10</div><div class="m">APR</div></div>
          <div class="ev-info"><h4>Cultural Night &amp; Prom 2026</h4><p>6:00 PM · Grand Ballroom</p></div>
        </div>
        <p class="ev-desc">The most anticipated social event of the school year. Live performances, cultural program, and the crowning of Datamex's King and Queen. Formal attire required.</p>
        <div class="ev-tags"><span class="ann-tag at-enrollment">Cultural</span></div>
      </div>
      <div class="ev-card">
        <div class="ev-header">
          <div class="ev-date-box"><div class="d">15</div><div class="m">APR</div></div>
          <div class="ev-info"><h4>Graduation Ceremony 2026</h4><p>9:00 AM · Sports Complex</p></div>
        </div>
        <p class="ev-desc">The most momentous day for our Batch 2026 graduates. Doors open at 7:30AM. Family and guests are welcome. Graduates must report to departments by 8:00 AM.</p>
        <div class="ev-tags"><span class="ann-tag at-academic">Commencement</span></div>
      </div>
    </div>

  </div><!-- /main -->

  <!-- ASIDE -->
  <div class="aside">

    <div class="aside-widget">
      <div class="aw-head"><span class="awi">📬</span><h4>Newsletter</h4></div>
      <div class="aw-body">
        <p>Get the latest Datamex news and announcements delivered to your email.</p>
        <div class="nl-form">
          <input class="nl-input" type="text" placeholder="Your full name"/>
          <input class="nl-input" type="email" placeholder="Your email address"/>
          <button class="nl-btn">Subscribe</button>
        </div>
      </div>
    </div>

    <div class="aside-widget">
      <div class="aw-head"><span class="awi">📅</span><h4>Upcoming Events</h4></div>
      <div class="aw-body">
        <div class="recent-list">
          <a href="#" class="rl-item"><div class="rl-img c1">📋</div><div class="rl-body"><h5>Campus Clean-up Drive</h5><span>Mar 25 · Whole Campus</span></div></a>
          <a href="#" class="rl-item"><div class="rl-img c2">🏅</div><div class="rl-body"><h5>Intramurals 2026</h5><span>Mar 28–30 · Gymnasium</span></div></a>
          <a href="#" class="rl-item"><div class="rl-img c3">💼</div><div class="rl-body"><h5>Entrepreneurship Summit</h5><span>Apr 3 · Lecture Hall 1</span></div></a>
          <a href="#" class="rl-item"><div class="rl-img c4">🎭</div><div class="rl-body"><h5>Cultural Night &amp; Prom</h5><span>Apr 10 · Grand Ballroom</span></div></a>
          <a href="#" class="rl-item"><div class="rl-img c1">🎓</div><div class="rl-body"><h5>Graduation 2026</h5><span>Apr 15 · Sports Complex</span></div></a>
        </div>
      </div>
    </div>

    <div class="aside-widget">
      <div class="aw-head"><span class="awi">🏷️</span><h4>Browse by Topic</h4></div>
      <div class="aw-body">
        <div class="tag-cloud">
          <span class="tc-tag" onclick="filterNews('announcement',document.querySelector('.ftab'))">Announcements</span>
          <span class="tc-tag" onclick="filterNews('academic',document.querySelector('.ftab'))">Academic</span>
          <span class="tc-tag" onclick="filterNews('events',document.querySelector('.ftab'))">Events</span>
          <span class="tc-tag" onclick="filterNews('sports',document.querySelector('.ftab'))">Sports</span>
          <span class="tc-tag" onclick="filterNews('scholarship',document.querySelector('.ftab'))">Scholarships</span>
          <span class="tc-tag" onclick="filterNews('community',document.querySelector('.ftab'))">Community</span>
          <span class="tc-tag" onclick="filterNews('all',document.querySelector('.ftab'))">All News</span>
        </div>
      </div>
    </div>

    <div class="aside-widget">
      <div class="aw-head"><span class="awi">📰</span><h4>Recent Articles</h4></div>
      <div class="aw-body">
        <div class="recent-list">
          <a href="#" class="rl-item"><div class="rl-img c1">📋</div><div class="rl-body"><h5>Enrollment Now Open</h5><span>Mar 20, 2026</span></div></a>
          <a href="#" class="rl-item"><div class="rl-img c2">🎓</div><div class="rl-body"><h5>Merit Scholarship Deadline Extended</h5><span>Mar 15, 2026</span></div></a>
          <a href="#" class="rl-item"><div class="rl-img c3">🏅</div><div class="rl-body"><h5>Basketball Team to Regional Finals</h5><span>Mar 5, 2026</span></div></a>
          <a href="#" class="rl-item"><div class="rl-img c4">🔬</div><div class="rl-body"><h5>STEM Fair 2026 Highlights</h5><span>Feb 22, 2026</span></div></a>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- ARTICLE MODAL -->
<div class="modal-overlay" id="modalOverlay" onclick="closeModal(event)">
  <div class="modal" id="modalBox">
    <div class="modal-hero">
      <button class="modal-close" onclick="closeModal()">✕</button>
      <span class="modal-cat" id="mCat">Category</span>
      <h2 id="mTitle">Article Title</h2>
      <div class="modal-meta" id="mMeta">Date · Source</div>
    </div>
    <div class="modal-body">
      <div class="modal-img-ph">
        <div class="ph-text">
          <span class="ph-icon">🖼️</span>
          <span>Article image placeholder — replace with actual photo</span>
        </div>
      </div>
      <p id="mBody">Article content goes here. Replace this placeholder text with the full article body once content is provided by the Communications Office.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Datamex College continues its commitment to academic excellence and student development through programs, activities, and initiatives that go beyond the classroom.</p>
      <p>For more information, contact the <strong>Office of Communications</strong> at communications@datamex.edu.ph or visit the Admin Office, 2nd Floor, Main Building.</p>
      <div class="modal-tags" id="mTags"></div>
    </div>
    <div class="modal-footer">
      <button class="mf-btn mf-outline" onclick="closeModal()">Close</button>
      <button class="mf-btn mf-solid">Share Article</button>
    </div>
  </div>
</div>

<!-- CTA -->
<div class="cta-band">
  <div class="cta-text">
    <h2>Stay in the loop with Datamex.</h2>
    <p>Subscribe to our newsletter for the latest news and announcements.</p>
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
    <a href="campus_life.php">Campus Life</a>
  </div>
</div>

<script>
/* ── FILTER ── */
const articles = {
  feat:{cat:'📌 Featured · Enrollment',title:'Online Enrollment for 1st Semester AY 2026–2027 is Now Open',meta:'March 20, 2026 · Registrar\'s Office'},
  s1:{cat:'Academic',title:'Final Examination Schedule for 2nd Semester Released',meta:'March 18, 2026 · Academic Affairs'},
  s2:{cat:'Scholarship',title:'Saint Adeline Merit Scholarship — Application Deadline Extended to March 31',meta:'March 15, 2026 · OSA Office'},
  n1:{cat:'Events',title:'Intramurals 2026 — Opening Ceremony This March 28',meta:'March 14, 2026 · Sports Office'},
  n2:{cat:'Community',title:'Datamex Students Lead Community Outreach in Partner Barangay',meta:'March 10, 2026 · Student Affairs'},
  n3:{cat:'Academic',title:'New MBA Program Launches This June 2026',meta:'March 8, 2026 · Graduate School'},
  n4:{cat:'Sports',title:'Datamex Basketball Team Advances to Regional Finals',meta:'March 5, 2026 · Sports Office'},
  n5:{cat:'Announcement',title:'NSTP Completion Requirements — Important Reminder for All Students',meta:'March 3, 2026 · NSTP Office'},
  n6:{cat:'Events',title:'Cultural Night & Prom Night 2026 — Save the Date: April 10',meta:'February 28, 2026 · Student Affairs'},
  n7:{cat:'Academic',title:'STEM Fair 2026 Showcases Student Innovation and Research',meta:'February 22, 2026 · College of IT'},
  n8:{cat:'Community',title:'Datamex Joins National Coastal Clean-up Drive',meta:'February 18, 2026 · Student Org'},
  n9:{cat:'Scholarship',title:'CHED Scholarship Slots Available — Apply Before March 20',meta:'February 14, 2026 · OSA Office'},
  a1:{cat:'Announcement',title:'1st Semester AY 2026–2027 Online Enrollment is Now Open',meta:'March 20, 2026 · Registrar\'s Office'},
  a2:{cat:'Academic',title:'Final Examination Schedule — 2nd Semester AY 2025–2026',meta:'March 18, 2026 · Academic Affairs'},
  a3:{cat:'Scholarship',title:'Merit Scholarship Application Deadline Extended to March 31',meta:'March 15, 2026 · OSA'},
  a4:{cat:'Finance',title:'Tuition Balance Deadline: April 5, 2026',meta:'March 10, 2026 · Finance Office'},
  a5:{cat:'Academic',title:'NSTP: Mandatory 100% Attendance Required',meta:'March 5, 2026 · NSTP Office'},
  a6:{cat:'Registrar',title:'Online Clearance Processing Opens March 25',meta:'March 1, 2026 · Registrar'},
};

function openModal(id) {
  const d = articles[id];
  if (!d) return;
  document.getElementById('mCat').textContent = d.cat;
  document.getElementById('mTitle').textContent = d.title;
  document.getElementById('mMeta').textContent = d.meta;
  document.getElementById('mBody').textContent = 'This is a placeholder article body. Replace this content with the actual full text of the article once provided by the Datamex Communications Office. Content should include relevant details, quotes, and background information about the topic.';
  document.getElementById('mTags').innerHTML = `<span class="nc-tag nt-announcement">${d.cat}</span><span class="nc-tag nt-academic">Datamex</span><span class="nc-tag nt-events">AY 2025–2026</span>`;
  document.getElementById('modalOverlay').classList.add('open');
  document.body.style.overflow = 'hidden';
}
function closeModal(e) {
  if (e && e.target !== document.getElementById('modalOverlay')) return;
  document.getElementById('modalOverlay').classList.remove('open');
  document.body.style.overflow = '';
}

/* ── FILTER TABS ── */
function filterNews(cat, btn) {
  document.querySelectorAll('.ftab').forEach(b => b.classList.remove('on'));
  if (btn && btn.classList.contains('ftab')) btn.classList.add('on');
  const cards = document.querySelectorAll('#newsGrid .ng-card');
  let visible = 0;
  cards.forEach(c => {
    const match = cat === 'all' || c.dataset.cat === cat;
    c.style.display = match ? 'block' : 'none';
    if (match) visible++;
  });
  document.getElementById('countNum').textContent = cat === 'all' ? '12' : visible;
}

/* scroll highlight */
window.addEventListener('scroll', () => {
  const nav = document.querySelector('nav');
  nav.style.boxShadow = window.scrollY > 30 ? '0 4px 24px rgba(123,13,30,.35)' : '0 2px 16px rgba(123,13,30,.3)';
});
</script>
</body>
</html>
