<?php
// index.php — Smart Medicine Dashboard | Google Material You · Medical Theme
// Data endpoint: latest.php?page=vitals
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>MediPulse — Smart Medicine Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&family=Google+Sans+Display:wght@400;500;700&family=Google+Sans+Mono&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
:root {
  --md-primary:#006875;
  --md-on-primary:#FFFFFF;
  --md-primary-container:#97F0FF;
  --md-on-primary-container:#001F24;
  --md-secondary:#4A6267;
  --md-on-secondary:#FFFFFF;
  --md-secondary-container:#CCE8EF;
  --md-on-secondary-container:#051F23;
  --md-tertiary:#525E7D;
  --md-on-tertiary:#FFFFFF;
  --md-tertiary-container:#DAE2FF;
  --md-on-tertiary-container:#0D1B37;
  --md-error:#BA1A1A;
  --md-on-error:#FFFFFF;
  --md-error-container:#FFDAD6;
  --md-on-error-container:#410002;
  --md-warning:#7D5700;
  --md-warning-container:#FFDEA0;
  --md-on-warning-container:#261900;
  --md-background:#F4FAFB;
  --md-on-background:#161D1E;
  --md-surface:#F4FAFB;
  --md-on-surface:#161D1E;
  --md-surface-variant:#DBE4E6;
  --md-on-surface-variant:#3F4D4F;
  --md-surface-container-lowest:#FFFFFF;
  --md-surface-container-low:#EEF4F5;
  --md-surface-container:#E8F0F1;
  --md-surface-container-high:#E2EAEB;
  --md-surface-container-highest:#DCE5E6;
  --md-outline:#6F797B;
  --md-outline-variant:#BFC8CA;
  --md-state-hover:rgba(0,104,117,.08);
  --md-state-pressed:rgba(0,104,117,.12);
  --md-elev-1:0 1px 2px rgba(0,0,0,.12),0 1px 3px rgba(0,0,0,.10);
  --md-elev-2:0 1px 2px rgba(0,0,0,.10),0 2px 6px rgba(0,0,0,.12);
  --md-elev-3:0 4px 8px rgba(0,0,0,.12),0 1px 3px rgba(0,0,0,.10);
  --shape-xs:4px;
  --shape-sm:8px;
  --shape-md:12px;
  --shape-lg:16px;
  --shape-xl:28px;
  --shape-full:9999px;
}

*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}

body{
  font-family:'Google Sans',sans-serif;
  background:var(--md-background);
  color:var(--md-on-background);
  min-height:100vh;
  display:flex;
  overflow-x:hidden;
}

.nav-rail{
  width:80px;
  min-height:100vh;
  background:var(--md-surface-container-low);
  display:flex;
  flex-direction:column;
  align-items:center;
  padding:20px 0 28px;
  flex-shrink:0;
  border-right:1px solid var(--md-outline-variant);
  position:sticky;
  top:0;
  height:100vh;
  z-index:100;
}

.nav-logo{
  width:40px;
  height:40px;
  background:var(--md-primary);
  border-radius:var(--shape-md);
  display:grid;
  place-items:center;
  margin-bottom:28px;
  box-shadow:var(--md-elev-2);
}

.nav-logo .material-symbols-rounded{color:var(--md-on-primary);font-size:22px;}

.nav-items{
  display:flex;
  flex-direction:column;
  align-items:center;
  gap:4px;
  width:100%;
  flex:1;
}

.nav-item{
  display:flex;
  flex-direction:column;
  align-items:center;
  gap:4px;
  width:100%;
  padding:0 8px;
  cursor:pointer;
  text-decoration:none;
}

.nav-indicator{
  width:56px;
  height:32px;
  border-radius:var(--shape-full);
  display:grid;
  place-items:center;
  transition:background .2s ease;
}

.nav-item:hover .nav-indicator{background:var(--md-state-hover);}
.nav-item.active .nav-indicator{background:var(--md-secondary-container);}

.nav-indicator .material-symbols-rounded{
  font-size:22px;
  color:var(--md-on-surface-variant);
}

.nav-item.active .nav-indicator .material-symbols-rounded{color:var(--md-on-secondary-container);}

.nav-label{
  font-size:11px;
  font-weight:500;
  color:var(--md-on-surface-variant);
  letter-spacing:.4px;
  text-align:center;
}

.nav-item.active .nav-label{font-weight:700;}

.nav-fab{
  width:56px;
  height:56px;
  background:var(--md-primary-container);
  border-radius:var(--shape-lg);
  display:grid;
  place-items:center;
  cursor:pointer;
  border:none;
  box-shadow:var(--md-elev-2);
  margin-top:auto;
  transition:box-shadow .2s,filter .2s;
}

.nav-fab:hover{box-shadow:var(--md-elev-3);filter:brightness(.96);}
.nav-fab .material-symbols-rounded{color:var(--md-on-primary-container);font-size:24px;}

.ripple{position:relative;overflow:hidden;}
.ripple::after{
  content:'';
  position:absolute;
  inset:0;
  background:radial-gradient(circle,rgba(0,104,117,.18) 1%,transparent 70%);
  transform:scale(0);
  opacity:0;
  transition:transform .4s ease,opacity .4s ease;
}
.ripple:active::after{transform:scale(2.5);opacity:1;transition:0s;}

.main{flex:1;min-width:0;display:flex;flex-direction:column;}

.top-app-bar{
  background:var(--md-surface-container-low);
  border-bottom:1px solid var(--md-outline-variant);
  padding:0 24px;
  height:64px;
  display:flex;
  align-items:center;
  justify-content:space-between;
  position:sticky;
  top:0;
  z-index:90;
  gap:16px;
}

.top-bar-title{
  font-family:'Google Sans Display',sans-serif;
  font-size:22px;
  font-weight:400;
  color:var(--md-on-surface);
  letter-spacing:-.2px;
}

.top-bar-title strong{font-weight:700;color:var(--md-primary);}
.top-bar-right{display:flex;align-items:center;gap:12px;}

.live-chip{
  display:flex;
  align-items:center;
  gap:6px;
  background:var(--md-secondary-container);
  color:var(--md-on-secondary-container);
  border-radius:var(--shape-full);
  padding:6px 16px 6px 10px;
  font-size:13px;
  font-weight:600;
  letter-spacing:.4px;
}

.live-dot{
  width:8px;
  height:8px;
  border-radius:50%;
  background:var(--md-primary);
  animation:livePulse 1.6s ease-in-out infinite;
}

@keyframes livePulse{
  0%,100%{opacity:1;transform:scale(1);}
  50%{opacity:.4;transform:scale(.75);}
}

.icon-btn{
  width:40px;
  height:40px;
  border-radius:var(--shape-full);
  border:none;
  background:transparent;
  cursor:pointer;
  display:grid;
  place-items:center;
  transition:background .2s;
  color:var(--md-on-surface-variant);
}

.icon-btn:hover{background:var(--md-state-hover);}
.icon-btn .material-symbols-rounded{font-size:22px;}

.avatar{
  width:36px;
  height:36px;
  border-radius:50%;
  background:var(--md-primary);
  display:grid;
  place-items:center;
  cursor:pointer;
  text-decoration:none;
}

.avatar .material-symbols-rounded{font-size:20px;color:var(--md-on-primary);}

.page-body{
  flex:1;
  padding:28px 24px 48px;
  max-width:1280px;
  width:100%;
}

.section-eyebrow{
  font-size:11px;
  font-weight:700;
  letter-spacing:1.5px;
  text-transform:uppercase;
  color:var(--md-outline);
  margin-bottom:14px;
  display:flex;
  align-items:center;
  gap:8px;
}

.section-eyebrow::after{
  content:'';
  flex:1;
  height:1px;
  background:var(--md-outline-variant);
}

.cards-grid{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(230px,1fr));
  gap:16px;
  margin-bottom:28px;
}

.m3-card{
  background:var(--md-surface-container-lowest);
  border-radius:var(--shape-xl);
  padding:20px 20px 18px;
  box-shadow:var(--md-elev-1);
  transition:box-shadow .25s ease,transform .25s ease;
  position:relative;
  overflow:hidden;
  cursor:default;
  animation:cardIn .35s cubic-bezier(.34,1.1,.64,1) both;
}

.m3-card::before{
  content:'';
  position:absolute;
  top:0;
  left:0;
  right:0;
  height:4px;
  background:var(--card-color,var(--md-primary));
  border-radius:var(--shape-xl) var(--shape-xl) 0 0;
}

.m3-card:hover{box-shadow:var(--md-elev-3);transform:translateY(-2px);}
.m3-card.clickable{cursor:pointer;}
.m3-card.clickable::after{
  content:'';
  position:absolute;
  inset:0;
  background:var(--card-color,var(--md-primary));
  opacity:0;
  border-radius:var(--shape-xl);
  transition:opacity .2s;
  pointer-events:none;
}
.m3-card.clickable:hover::after{opacity:.04;}
.m3-card.clickable:active::after{opacity:.10;}
.m3-card:nth-child(1){animation-delay:.05s;}
.m3-card:nth-child(2){animation-delay:.10s;}
.m3-card:nth-child(3){animation-delay:.15s;}
.m3-card:nth-child(4){animation-delay:.20s;}

.card-header{
  display:flex;
  align-items:center;
  justify-content:space-between;
  margin-bottom:20px;
}

.card-icon-container{
  width:44px;
  height:44px;
  border-radius:var(--shape-md);
  background:var(--card-container,var(--md-primary-container));
  display:grid;
  place-items:center;
}

.card-icon-container .material-symbols-rounded{
  font-size:22px;
  color:var(--card-on-container,var(--md-on-primary-container));
}

.card-badge{
  font-size:11px;
  font-weight:600;
  letter-spacing:.8px;
  text-transform:uppercase;
  padding:4px 10px;
  border-radius:var(--shape-full);
  background:var(--card-container,var(--md-primary-container));
  color:var(--card-on-container,var(--md-on-primary-container));
}

.card-label{
  font-size:12px;
  font-weight:500;
  color:var(--md-on-surface-variant);
  letter-spacing:.4px;
  margin-bottom:8px;
}

.card-value{
  font-family:'Google Sans Display',sans-serif;
  font-size:40px;
  font-weight:700;
  color:var(--card-color,var(--md-primary));
  letter-spacing:-1.5px;
  line-height:1;
  display:flex;
  align-items:baseline;
  gap:4px;
}

.card-unit{font-size:18px;font-weight:400;opacity:.65;letter-spacing:0;}

.card-sub{
  font-size:12px;
  color:var(--md-outline);
  margin-top:12px;
  display:flex;
  align-items:center;
  gap:6px;
}

.card-sub .material-symbols-rounded{font-size:14px;}

.card-temp{--card-color:#006875;--card-container:var(--md-primary-container);--card-on-container:var(--md-on-primary-container);}
.card-heart{--card-color:#BA1A1A;--card-container:var(--md-error-container);--card-on-container:var(--md-on-error-container);}
.card-weight{--card-color:#525E7D;--card-container:var(--md-tertiary-container);--card-on-container:var(--md-on-tertiary-container);}
.card-status{--card-color:#4A6267;--card-container:var(--md-secondary-container);--card-on-container:var(--md-on-secondary-container);}

@keyframes heartbeat{
  0%,100%{transform:scale(1);}
  14%{transform:scale(1.2);}
  28%{transform:scale(1);}
  42%{transform:scale(1.15);}
  70%{transform:scale(1);}
}
.heart-icon{animation:heartbeat 1.8s ease-in-out infinite;}

.m3-surface{
  background:var(--md-surface-container-lowest);
  border-radius:var(--shape-xl);
  box-shadow:var(--md-elev-1);
  padding:24px;
  margin-bottom:20px;
  animation:cardIn .35s cubic-bezier(.34,1.1,.64,1) both;
}

.m3-surface:nth-of-type(1){animation-delay:.25s;}
.m3-surface:nth-of-type(2){animation-delay:.32s;}

.surface-header{
  display:flex;
  justify-content:space-between;
  align-items:flex-start;
  margin-bottom:20px;
  flex-wrap:wrap;
  gap:12px;
}

.surface-title{
  font-family:'Google Sans Display',sans-serif;
  font-size:18px;
  font-weight:700;
  color:var(--md-on-surface);
  letter-spacing:-.3px;
}

.surface-subtitle{
  font-size:12px;
  color:var(--md-outline);
  margin-top:2px;
  letter-spacing:.2px;
}

.tonal-btn{
  display:inline-flex;
  align-items:center;
  gap:6px;
  background:var(--md-secondary-container);
  color:var(--md-on-secondary-container);
  border:none;
  border-radius:var(--shape-full);
  padding:8px 18px 8px 12px;
  font-family:'Google Sans',sans-serif;
  font-size:13px;
  font-weight:600;
  cursor:pointer;
  letter-spacing:.3px;
  transition:filter .2s;
}

.tonal-btn:hover{filter:brightness(.95);}
.tonal-btn .material-symbols-rounded{font-size:16px;}

.chart-wrapper{height:240px;}
.m3-divider{height:1px;background:var(--md-outline-variant);margin:0 -24px 20px;}
.table-scroll{overflow-x:auto;margin-top:4px;}

table{width:100%;border-collapse:collapse;min-width:740px;}

thead th{
  font-size:11px;
  font-weight:700;
  letter-spacing:1.5px;
  text-transform:uppercase;
  color:var(--md-on-surface-variant);
  padding:10px 16px;
  text-align:center;
  border-bottom:2px solid var(--md-outline-variant);
  white-space:nowrap;
}

tbody tr{border-bottom:1px solid var(--md-outline-variant);transition:background .15s;}
tbody tr:last-child{border-bottom:none;}
tbody tr:hover{background:var(--md-surface-container);}

td{
  padding:13px 16px;
  font-size:13px;
  text-align:center;
  font-family:'Google Sans Mono',monospace;
  color:var(--md-on-surface);
}

td.label-cell{
  font-family:'Google Sans',sans-serif;
  font-size:12px;
  color:var(--md-outline);
}

.status-chip{
  display:inline-flex;
  align-items:center;
  gap:6px;
  padding:5px 14px;
  border-radius:var(--shape-full);
  font-size:12px;
  font-weight:700;
  letter-spacing:.8px;
  text-transform:uppercase;
}

.status-chip .material-symbols-rounded{font-size:14px;}
.chip-normal{background:var(--md-primary-container);color:var(--md-on-primary-container);}
.chip-warning{background:var(--md-warning-container);color:var(--md-on-warning-container);}
.chip-critical{background:var(--md-error-container);color:var(--md-on-error-container);}

.modal-scrim{
  display:none;
  position:fixed;
  inset:0;
  z-index:999;
  background:rgba(0,0,0,.40);
  align-items:center;
  justify-content:center;
  padding:24px;
  backdrop-filter:blur(2px);
}

.modal-scrim.open{display:flex;animation:scrimIn .2s ease;}
@keyframes scrimIn{from{opacity:0;}to{opacity:1;}}

.m3-dialog{
  background:var(--md-surface-container-lowest);
  border-radius:var(--shape-xl);
  width:90%;
  max-width:860px;
  box-shadow:0 8px 32px rgba(0,0,0,.20);
  overflow:hidden;
  animation:dialogIn .25s cubic-bezier(.34,1.2,.64,1);
}

@keyframes dialogIn{
  from{transform:scale(.92) translateY(12px);opacity:0;}
  to{transform:scale(1) translateY(0);opacity:1;}
}

.dialog-header{
  padding:24px 24px 0;
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:20px;
}

.dialog-title{
  font-family:'Google Sans Display',sans-serif;
  font-size:20px;
  font-weight:700;
  color:var(--md-on-surface);
  letter-spacing:-.3px;
}

.dialog-close{
  width:40px;
  height:40px;
  border-radius:var(--shape-full);
  border:none;
  background:var(--md-surface-variant);
  cursor:pointer;
  display:grid;
  place-items:center;
  transition:background .2s;
  color:var(--md-on-surface-variant);
}

.dialog-close:hover{background:var(--md-outline-variant);}
.dialog-close .material-symbols-rounded{font-size:20px;}
.dialog-body{padding:0 24px 24px;}
.popup-chart-wrapper{height:340px;}

.footer-bar{
  background:var(--md-surface-container-low);
  border-top:1px solid var(--md-outline-variant);
  padding:12px 24px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  flex-wrap:wrap;
  gap:8px;
}

.footer-bar p{font-size:12px;color:var(--md-outline);letter-spacing:.3px;}
.footer-bar strong{color:var(--md-primary);font-weight:700;}

@keyframes cardIn{
  from{opacity:0;transform:translateY(16px);}
  to{opacity:1;transform:translateY(0);}
}

@media(max-width:768px){
  .nav-rail{display:none;}
  .page-body{padding:20px 16px 40px;}
  .top-bar-title{font-size:18px;}
  .card-value{font-size:32px;}
  .chart-wrapper{height:200px;}
  .popup-chart-wrapper{height:260px;}
}
</style>
</head>
<body>

<nav class="nav-rail">
  <div class="nav-logo">
    <span class="material-symbols-rounded">ecg_heart</span>
  </div>

  <div class="nav-items">
    <a class="nav-item active ripple" href="index.php">
      <div class="nav-indicator">
        <span class="material-symbols-rounded">dashboard</span>
      </div>
      <span class="nav-label">Overview</span>
    </a>

    <a class="nav-item ripple" href="vitals.php" style="margin-top:8px">
      <div class="nav-indicator">
        <span class="material-symbols-rounded">vital_signs</span>
      </div>
      <span class="nav-label">Vitals</span>
    </a>

    <a class="nav-item ripple" href="history.php" style="margin-top:8px">
      <div class="nav-indicator">
        <span class="material-symbols-rounded">history</span>
      </div>
      <span class="nav-label">History</span>
    </a>

    <a class="nav-item ripple" href="meds.php" style="margin-top:8px">
      <div class="nav-indicator">
        <span class="material-symbols-rounded">medication</span>
      </div>
      <span class="nav-label">Meds</span>
    </a>

    <a class="nav-item ripple" href="alerts.php" style="margin-top:8px">
      <div class="nav-indicator">
        <span class="material-symbols-rounded">notifications</span>
      </div>
      <span class="nav-label">Alerts</span>
    </a>
  </div>

  <button class="nav-fab ripple" title="Add Reading">
    <span class="material-symbols-rounded">add</span>
  </button>
</nav>

<div class="main">
  <header class="top-app-bar">
    <span class="top-bar-title"><strong>MediPulse</strong> Dashboard</span>
    <div class="top-bar-right">
      <div class="live-chip">
        <div class="live-dot"></div>
        Live · 2s
      </div>
      <button class="icon-btn ripple" title="Refresh" onclick="loadData()">
        <span class="material-symbols-rounded">refresh</span>
      </button>
      <button class="icon-btn ripple" title="Settings" onclick="window.location.href='setting.php'">
        <span class="material-symbols-rounded">settings</span>
      </button>
      <a class="avatar ripple" href="profile.php" title="Profile">
        <span class="material-symbols-rounded">person</span>
      </a>
    </div>
  </header>

  <div class="page-body">
    <div class="section-eyebrow">
      <span class="material-symbols-rounded" style="font-size:14px">monitoring</span>
      Patient Vitals Overview
    </div>

    <div class="cards-grid">
      <div class="m3-card clickable card-temp ripple" id="tempCard">
        <div class="card-header">
          <div class="card-icon-container">
            <span class="material-symbols-rounded">thermometer</span>
          </div>
          <span class="card-badge">Live</span>
        </div>
        <div class="card-label">Body Temperature</div>
        <div class="card-value" id="temp">--<span class="card-unit">°C</span></div>
        <div class="card-sub">
          <span class="material-symbols-rounded">touch_app</span>
          Tap to view graph
        </div>
      </div>

      <div class="m3-card card-heart">
        <div class="card-header">
          <div class="card-icon-container">
            <span class="material-symbols-rounded heart-icon">favorite</span>
          </div>
          <span class="card-badge">BPM</span>
        </div>
        <div class="card-label">Heart Rate</div>
        <div class="card-value" id="heart">--<span class="card-unit">BPM</span></div>
        <div class="card-sub">
          <span class="material-symbols-rounded">trending_up</span>
          Live graph below
        </div>
      </div>

      <div class="m3-card clickable card-weight ripple" id="weightCard">
        <div class="card-header">
          <div class="card-icon-container">
            <span class="material-symbols-rounded">water_drop</span>
          </div>
          <span class="card-badge">Saline</span>
        </div>
        <div class="card-label">Saline / Blood Weight</div>
        <div class="card-value" id="weight">--<span class="card-unit">g</span></div>
        <div class="card-sub">
          <span class="material-symbols-rounded">touch_app</span>
          Tap to view graph
        </div>
      </div>

      <div class="m3-card card-status">
        <div class="card-header">
          <div class="card-icon-container">
            <span class="material-symbols-rounded">personal_injury</span>
          </div>
          <span class="card-badge">Status</span>
        </div>
        <div class="card-label">Patient Status</div>
        <div class="card-value" id="status" style="font-size:28px;letter-spacing:-0.5px">Waiting</div>
        <div class="card-sub">
          <span class="material-symbols-rounded">sensors</span>
          Auto-updated · sensor data
        </div>
      </div>
    </div>

    <div class="section-eyebrow" style="margin-top:4px">
      <span class="material-symbols-rounded" style="font-size:14px">ecg</span>
      Cardiology Monitoring
    </div>

    <div class="m3-surface">
      <div class="surface-header">
        <div>
          <div class="surface-title">Real-Time Heart Rate</div>
          <div class="surface-subtitle">Continuous BPM — last 14 readings</div>
        </div>
        <button class="tonal-btn">
          <span class="material-symbols-rounded">download</span>
          Export
        </button>
      </div>
      <div class="chart-wrapper">
        <canvas id="heartChart"></canvas>
      </div>
    </div>

    <div class="section-eyebrow">
      <span class="material-symbols-rounded" style="font-size:14px">table_rows</span>
      Live Health Logs
    </div>

    <div class="m3-surface">
      <div class="surface-header">
        <div>
          <div class="surface-title">Sensor Log Records</div>
          <div class="surface-subtitle">Refreshed every 2 seconds from vitals table</div>
        </div>
        <button class="tonal-btn">
          <span class="material-symbols-rounded">filter_list</span>
          Filter
        </button>
      </div>
      <div class="m3-divider"></div>
      <div class="table-scroll">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Temperature</th>
              <th>Heart Rate</th>
              <th>Bag Weight</th>
              <th>Status</th>
              <th>Event</th>
              <th>Timestamp</th>
            </tr>
          </thead>
          <tbody id="tableBody">
            <tr>
              <td colspan="7" style="color:var(--md-outline);font-family:'Google Sans',sans-serif;padding:28px;font-size:14px">
                <span class="material-symbols-rounded" style="font-size:18px;vertical-align:middle;margin-right:8px">sensors</span>
                Initialising sensor connection…
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="footer-bar">
    <p>
      <span class="material-symbols-rounded" style="font-size:14px;vertical-align:middle;margin-right:4px">ecg_heart</span>
      <strong>MediPulse</strong> — Smart Medicine Dashboard
    </p>
    <p>Auto-refresh · <strong>every 2 seconds</strong> · Sensor Gateway Online</p>
  </div>
</div>

<div class="modal-scrim" id="graphModal">
  <div class="m3-dialog">
    <div class="dialog-header">
      <div class="dialog-title" id="modalTitle">Graph</div>
      <button class="dialog-close ripple" onclick="closeModal()">
        <span class="material-symbols-rounded">close</span>
      </button>
    </div>
    <div class="dialog-body">
      <div class="m3-divider"></div>
      <div class="popup-chart-wrapper">
        <canvas id="popupChart"></canvas>
      </div>
    </div>
  </div>
</div>

<script>
Chart.defaults.font.family = "'Google Sans', sans-serif";
Chart.defaults.color = '#6F797B';
Chart.defaults.borderColor = '#BFC8CA';

let latestData = [];
const labels = [];
const bpmData = [];
let popupChart = null;

function buildGradient(ctx, chartArea, colorTop, colorBot) {
  if (!chartArea) return colorTop;
  const g = ctx.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
  g.addColorStop(0, colorTop);
  g.addColorStop(1, colorBot);
  return g;
}

const heartCtx = document.getElementById('heartChart').getContext('2d');
const heartChart = new Chart(heartCtx, {
  type: 'line',
  data: {
    labels,
    datasets: [{
      label: 'Heart Rate (BPM)',
      data: bpmData,
      borderColor: '#BA1A1A',
      backgroundColor: (ctx) =>
        buildGradient(
          ctx.chart.ctx,
          ctx.chart.chartArea,
          'rgba(186,26,26,.22)',
          'rgba(186,26,26,.02)'
        ),
      borderWidth: 2.5,
      tension: 0.42,
      fill: true,
      pointRadius: 4,
      pointBackgroundColor: '#FFFFFF',
      pointBorderColor: '#BA1A1A',
      pointBorderWidth: 2.5,
      pointHoverRadius: 7,
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    interaction: { mode:'index', intersect:false },
    plugins: {
      legend: { display: false },
      tooltip: {
        backgroundColor: '#001F24',
        titleColor: '#97F0FF',
        bodyColor: '#CCE8EF',
        borderColor: '#97F0FF',
        borderWidth: 1,
        padding: 14,
        cornerRadius: 16,
        titleFont: { weight:'700', size:13 },
        bodyFont: { family:"'Google Sans Mono',monospace", size:13 },
        callbacks: { label: ctx => `  ${ctx.parsed.y} BPM` }
      }
    },
    scales: {
      x: {
        ticks:{color:'#6F797B',font:{size:11}},
        grid:{display:false},
        border:{display:false}
      },
      y: {
        beginAtZero:false,
        ticks:{color:'#6F797B',font:{size:11}},
        grid:{color:'#DBE4E6'},
        border:{display:false}
      }
    }
  }
});

function chipClass(s) {
  s = s || 'NORMAL';
  return s === 'NORMAL' ? 'chip-normal' : s === 'WARNING' ? 'chip-warning' : 'chip-critical';
}

function chipIcon(s) {
  s = s || 'NORMAL';
  return s === 'NORMAL' ? 'check_circle' : s === 'WARNING' ? 'warning' : 'error';
}

function statusColor(s) {
  s = s || 'NORMAL';
  return s === 'NORMAL' ? 'var(--md-primary)' : s === 'WARNING' ? 'var(--md-warning)' : 'var(--md-error)';
}

function valueOrDash(value) {
  return value === null || value === undefined || value === '' ? '--' : value;
}

function loadData() {
  fetch('latest.php?page=vitals')
    .then(r => r.json())
    .then(data => {
      if (!Array.isArray(data)) {
        console.log('Invalid response from latest.php:', data);
        document.getElementById('tableBody').innerHTML = `
          <tr>
            <td colspan="7" style="color:var(--md-error);font-family:'Google Sans',sans-serif;padding:28px;font-size:14px">
              latest.php response is not a valid JSON array.
            </td>
          </tr>`;
        return;
      }

      latestData = data;

      if (data.length > 0) {
        const latest = data[0];
        const status = latest.status_text || 'NORMAL';

        document.getElementById('temp').innerHTML =
          valueOrDash(latest.temperature) + '<span class="card-unit">°C</span>';
        document.getElementById('heart').innerHTML =
          valueOrDash(latest.heart_rate) + '<span class="card-unit">BPM</span>';
        document.getElementById('weight').innerHTML =
          valueOrDash(latest.bag_weight) + '<span class="card-unit">g</span>';

        const statusEl = document.getElementById('status');
        statusEl.textContent = status;
        statusEl.style.color = statusColor(status);

        labels.push(new Date().toLocaleTimeString());
        bpmData.push(Number(latest.heart_rate || 0));

        if (labels.length > 14) {
          labels.shift();
          bpmData.shift();
        }

        heartChart.update();
      } else {
        document.getElementById('temp').innerHTML = '--<span class="card-unit">°C</span>';
        document.getElementById('heart').innerHTML = '--<span class="card-unit">BPM</span>';
        document.getElementById('weight').innerHTML = '--<span class="card-unit">g</span>';
        document.getElementById('status').textContent = 'No Data';
      }

      let html = '';

      if (data.length === 0) {
        html = `
          <tr>
            <td colspan="7" style="color:var(--md-outline);font-family:'Google Sans',sans-serif;padding:28px;font-size:14px">
              No data found in vitals table.
            </td>
          </tr>`;
      } else {
        data.forEach(row => {
          const status = row.status_text || 'NORMAL';

          html += `
          <tr>
            <td style="color:var(--md-outline);font-size:12px">#${valueOrDash(row.id)}</td>
            <td style="color:var(--md-primary);font-weight:600">${valueOrDash(row.temperature)} °C</td>
            <td style="color:var(--md-error);font-weight:600">${valueOrDash(row.heart_rate)} BPM</td>
            <td style="color:var(--md-tertiary);font-weight:600">${valueOrDash(row.bag_weight)} g</td>
            <td>
              <span class="status-chip ${chipClass(status)}">
                <span class="material-symbols-rounded">${chipIcon(status)}</span>
                ${status}
              </span>
            </td>
            <td class="label-cell">${row.event_text || 'Vitals updated'}</td>
            <td class="label-cell">${valueOrDash(row.created_at)}</td>
          </tr>`;
        });
      }

      document.getElementById('tableBody').innerHTML = html;
    })
    .catch(err => {
      console.log('Dashboard error:', err);
      document.getElementById('tableBody').innerHTML = `
        <tr>
          <td colspan="7" style="color:var(--md-error);font-family:'Google Sans',sans-serif;padding:28px;font-size:14px">
            Could not load data from latest.php?page=vitals.
          </td>
        </tr>`;
    });
}

function openGraph(type) {
  if (latestData.length === 0) {
    alert('No data available yet.');
    return;
  }

  const graphData = [...latestData].reverse();
  const timeLabels = graphData.map(r => r.created_at || '');
  let title, label, dataValues, lineColor, topColor, botColor;

  if (type === 'temperature') {
    title = 'Body Temperature — Statistical View';
    label = 'Temperature (°C)';
    dataValues = graphData.map(r => Number(r.temperature || 0));
    lineColor = '#006875';
    topColor = 'rgba(0,104,117,.22)';
    botColor = 'rgba(0,104,117,.02)';
  } else {
    title = 'Saline / Blood Weight — Statistical View';
    label = 'Bag Weight (g)';
    dataValues = graphData.map(r => Number(r.bag_weight || 0));
    lineColor = '#525E7D';
    topColor = 'rgba(82,94,125,.22)';
    botColor = 'rgba(82,94,125,.02)';
  }

  document.getElementById('modalTitle').textContent = title;
  document.getElementById('graphModal').classList.add('open');

  if (popupChart) popupChart.destroy();

  const pCtx = document.getElementById('popupChart').getContext('2d');

  popupChart = new Chart(pCtx, {
    type: 'line',
    data: {
      labels: timeLabels,
      datasets: [{
        label,
        data: dataValues,
        borderColor: lineColor,
        backgroundColor: (ctx) => buildGradient(ctx.chart.ctx, ctx.chart.chartArea, topColor, botColor),
        borderWidth: 3,
        tension: 0.4,
        fill: true,
        pointRadius: 5,
        pointBackgroundColor: '#FFFFFF',
        pointBorderColor: lineColor,
        pointBorderWidth: 2.5,
        pointHoverRadius: 8,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      interaction: { mode:'index', intersect:false },
      plugins: {
        legend: { display:true, labels:{ color:'#3F4D4F', font:{weight:'600',size:13} } },
        tooltip: {
          backgroundColor:'#001F24',
          titleColor:'#97F0FF',
          bodyColor:'#CCE8EF',
          borderColor:lineColor,
          borderWidth:1,
          padding:14,
          cornerRadius:16,
          titleFont:{weight:'700',size:13},
          bodyFont:{family:"'Google Sans Mono',monospace",size:13},
        }
      },
      scales: {
        x: {
          ticks:{color:'#6F797B',maxRotation:45,minRotation:45,font:{size:10}},
          grid:{display:false},
          border:{display:false}
        },
        y: {
          beginAtZero:false,
          ticks:{color:'#6F797B',font:{size:11}},
          grid:{color:'#DBE4E6'},
          border:{display:false}
        }
      }
    }
  });
}

function closeModal() {
  document.getElementById('graphModal').classList.remove('open');
}

document.getElementById('tempCard').addEventListener('click', () => openGraph('temperature'));
document.getElementById('weightCard').addEventListener('click', () => openGraph('weight'));

window.addEventListener('click', e => {
  if (e.target === document.getElementById('graphModal')) closeModal();
});

document.addEventListener('keydown', e => {
  if (e.key === 'Escape') closeModal();
});

loadData();
setInterval(loadData, 2000);
</script>

</body>
</html>
