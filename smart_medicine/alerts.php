<?php
// alerts.php — Alerts & Notifications | MediPulse · Material You
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Alerts — MediPulse</title>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&family=Google+Sans+Display:wght@400;500;700&family=Google+Sans+Mono&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" rel="stylesheet"/>
<style>
:root{
  --md-primary:#006875;--md-on-primary:#fff;
  --md-primary-container:#97F0FF;--md-on-primary-container:#001F24;
  --md-secondary:#4A6267;--md-on-secondary:#fff;
  --md-secondary-container:#CCE8EF;--md-on-secondary-container:#051F23;
  --md-tertiary:#525E7D;--md-on-tertiary:#fff;
  --md-tertiary-container:#DAE2FF;--md-on-tertiary-container:#0D1B37;
  --md-error:#BA1A1A;--md-on-error:#fff;
  --md-error-container:#FFDAD6;--md-on-error-container:#410002;
  --md-warning:#7D5700;--md-warning-container:#FFDEA0;--md-on-warning-container:#261900;
  --md-success:#1B6B34;--md-success-container:#A6F4B8;--md-on-success-container:#002111;
  --md-background:#F4FAFB;--md-on-surface:#161D1E;
  --md-surface-variant:#DBE4E6;--md-on-surface-variant:#3F4D4F;
  --md-surface-container-lowest:#fff;
  --md-surface-container-low:#EEF4F5;
  --md-surface-container:#E8F0F1;
  --md-outline:#6F797B;--md-outline-variant:#BFC8CA;
  --md-state-hover:rgba(0,104,117,.08);
  --md-elev-1:0 1px 2px rgba(0,0,0,.12),0 1px 3px rgba(0,0,0,.10);
  --md-elev-2:0 1px 2px rgba(0,0,0,.10),0 2px 6px rgba(0,0,0,.12);
  --md-elev-3:0 4px 8px rgba(0,0,0,.12),0 1px 3px rgba(0,0,0,.10);
  --shape-md:12px;--shape-lg:16px;--shape-xl:28px;--shape-full:9999px;
}
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
body{font-family:'Google Sans',sans-serif;background:var(--md-background);color:var(--md-on-surface);min-height:100vh;display:flex;overflow-x:hidden;}

/* Nav Rail */
.nav-rail{width:80px;min-height:100vh;background:var(--md-surface-container-low);display:flex;flex-direction:column;align-items:center;padding:20px 0 28px;flex-shrink:0;border-right:1px solid var(--md-outline-variant);position:sticky;top:0;height:100vh;z-index:100;}
.nav-logo{width:40px;height:40px;background:var(--md-primary);border-radius:var(--shape-md);display:grid;place-items:center;margin-bottom:28px;box-shadow:var(--md-elev-2);}
.nav-logo .material-symbols-rounded{color:var(--md-on-primary);font-size:22px;}
.nav-items{display:flex;flex-direction:column;align-items:center;gap:4px;width:100%;flex:1;}
.nav-item{display:flex;flex-direction:column;align-items:center;gap:4px;width:100%;padding:0 8px;cursor:pointer;text-decoration:none;}
.nav-indicator{width:56px;height:32px;border-radius:var(--shape-full);display:grid;place-items:center;transition:background .2s;}
.nav-item:hover .nav-indicator{background:var(--md-state-hover);}
.nav-item.active .nav-indicator{background:var(--md-secondary-container);}
.nav-indicator .material-symbols-rounded{font-size:22px;color:var(--md-on-surface-variant);}
.nav-item.active .nav-indicator .material-symbols-rounded{color:var(--md-on-secondary-container);}
.nav-label{font-size:11px;font-weight:500;color:var(--md-on-surface-variant);letter-spacing:.4px;text-align:center;}
.nav-item.active .nav-label{font-weight:700;}

/* badge on alert nav */
.nav-badge{position:relative;}
.nav-badge::after{content:'3';position:absolute;top:-4px;right:2px;width:16px;height:16px;border-radius:50%;background:var(--md-error);color:#fff;font-size:9px;font-weight:700;display:grid;place-items:center;border:2px solid var(--md-surface-container-low);}

.nav-fab{width:56px;height:56px;background:var(--md-primary-container);border-radius:var(--shape-lg);display:grid;place-items:center;cursor:pointer;border:none;box-shadow:var(--md-elev-2);margin-top:auto;transition:box-shadow .2s,filter .2s;}
.nav-fab:hover{box-shadow:var(--md-elev-3);filter:brightness(.96);}
.nav-fab .material-symbols-rounded{color:var(--md-on-primary-container);font-size:24px;}
.ripple{position:relative;overflow:hidden;}
.ripple::after{content:'';position:absolute;inset:0;background:radial-gradient(circle,rgba(0,104,117,.18) 1%,transparent 70%);transform:scale(0);opacity:0;transition:transform .4s,opacity .4s;}
.ripple:active::after{transform:scale(2.5);opacity:1;transition:0s;}

/* Layout */
.main{flex:1;min-width:0;display:flex;flex-direction:column;}
.top-app-bar{background:var(--md-surface-container-low);border-bottom:1px solid var(--md-outline-variant);padding:0 24px;height:64px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:90;gap:16px;}
.top-bar-title{font-family:'Google Sans Display',sans-serif;font-size:22px;font-weight:400;color:var(--md-on-surface);}
.top-bar-title strong{font-weight:700;color:var(--md-primary);}
.top-bar-right{display:flex;align-items:center;gap:12px;}
.icon-btn{width:40px;height:40px;border-radius:var(--shape-full);border:none;background:transparent;cursor:pointer;display:grid;place-items:center;transition:background .2s;color:var(--md-on-surface-variant);}
.icon-btn:hover{background:var(--md-state-hover);}
.icon-btn .material-symbols-rounded{font-size:22px;}
.avatar{width:36px;height:36px;border-radius:50%;background:var(--md-primary);display:grid;place-items:center;cursor:pointer;}
.avatar .material-symbols-rounded{font-size:20px;color:var(--md-on-primary);}
.page-body{flex:1;padding:28px 24px 48px;max-width:1280px;width:100%;}
.section-eyebrow{font-size:11px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:var(--md-outline);margin-bottom:14px;display:flex;align-items:center;gap:8px;}
.section-eyebrow::after{content:'';flex:1;height:1px;background:var(--md-outline-variant);}

/* Alert stat cards */
.alert-stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:14px;margin-bottom:24px;}
.astat{border-radius:20px;padding:18px 16px;display:flex;flex-direction:column;align-items:flex-start;gap:8px;box-shadow:var(--md-elev-1);animation:cardIn .35s cubic-bezier(.34,1.1,.64,1) both;}
.astat:nth-child(1){animation-delay:.05s;background:var(--md-error-container);}
.astat:nth-child(2){animation-delay:.10s;background:var(--md-warning-container);}
.astat:nth-child(3){animation-delay:.15s;background:var(--md-primary-container);}
.astat:nth-child(4){animation-delay:.20s;background:var(--md-success-container);}
.astat-icon .material-symbols-rounded{font-size:26px;}
.astat-num{font-family:'Google Sans Display',sans-serif;font-size:32px;font-weight:700;letter-spacing:-1px;line-height:1;}
.astat-label{font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;opacity:.75;}

/* Alert Feed */
.alert-feed{display:flex;flex-direction:column;gap:0;background:var(--md-surface-container-lowest);border-radius:var(--shape-xl);box-shadow:var(--md-elev-1);overflow:hidden;margin-bottom:20px;animation:cardIn .35s .22s cubic-bezier(.34,1.1,.64,1) both;}

.feed-header{padding:18px 22px 0;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;margin-bottom:4px;}
.feed-title{font-family:'Google Sans Display',sans-serif;font-size:17px;font-weight:700;color:var(--md-on-surface);}
.tonal-btn{display:inline-flex;align-items:center;gap:6px;background:var(--md-secondary-container);color:var(--md-on-secondary-container);border:none;border-radius:var(--shape-full);padding:8px 18px 8px 12px;font-family:'Google Sans',sans-serif;font-size:13px;font-weight:600;cursor:pointer;transition:filter .2s;}
.tonal-btn:hover{filter:brightness(.95);}
.tonal-btn .material-symbols-rounded{font-size:16px;}

.feed-divider{height:1px;background:var(--md-outline-variant);margin:12px 22px;}

.alert-item{display:flex;align-items:flex-start;gap:14px;padding:16px 22px;border-bottom:1px solid var(--md-outline-variant);transition:background .15s;cursor:pointer;animation:slideIn .3s ease both;}
.alert-item:last-child{border-bottom:none;}
.alert-item:hover{background:var(--md-surface-container);}
@keyframes slideIn{from{opacity:0;transform:translateX(-12px);}to{opacity:1;transform:translateX(0);}}

.alert-dot-col{display:flex;flex-direction:column;align-items:center;gap:6px;padding-top:2px;flex-shrink:0;}
.alert-dot{width:10px;height:10px;border-radius:50%;flex-shrink:0;}
.dot-critical{background:var(--md-error);box-shadow:0 0 8px rgba(186,26,26,.5);animation:critPulse 1.5s ease-in-out infinite;}
.dot-warning{background:var(--md-warning);}
.dot-info{background:var(--md-primary);}
.dot-ok{background:var(--md-success);}
@keyframes critPulse{0%,100%{box-shadow:0 0 6px rgba(186,26,26,.5);}50%{box-shadow:0 0 14px rgba(186,26,26,.8);}}

.alert-icon-wrap{width:42px;height:42px;border-radius:var(--shape-md);display:grid;place-items:center;flex-shrink:0;}
.alert-icon-wrap .material-symbols-rounded{font-size:20px;}

.alert-content{flex:1;min-width:0;}
.alert-title{font-size:14px;font-weight:700;color:var(--md-on-surface);margin-bottom:3px;}
.alert-desc{font-size:12px;color:var(--md-on-surface-variant);line-height:1.5;}
.alert-meta{display:flex;align-items:center;gap:12px;margin-top:8px;flex-wrap:wrap;}
.alert-time{font-family:'Google Sans Mono',monospace;font-size:11px;color:var(--md-outline);}
.alert-source{font-size:11px;font-weight:600;letter-spacing:.6px;text-transform:uppercase;color:var(--md-outline);}

.alert-badge{padding:4px 12px;border-radius:var(--shape-full);font-size:11px;font-weight:700;letter-spacing:.8px;text-transform:uppercase;flex-shrink:0;align-self:flex-start;margin-top:2px;}
.badge-critical{background:var(--md-error-container);color:var(--md-on-error-container);}
.badge-warning {background:var(--md-warning-container);color:var(--md-on-warning-container);}
.badge-info    {background:var(--md-primary-container);color:var(--md-on-primary-container);}
.badge-ok      {background:var(--md-success-container);color:var(--md-on-success-container);}

.dismiss-btn{width:32px;height:32px;border-radius:var(--shape-full);border:none;background:transparent;cursor:pointer;display:grid;place-items:center;transition:background .2s;color:var(--md-outline);flex-shrink:0;}
.dismiss-btn:hover{background:var(--md-error-container);color:var(--md-on-error-container);}
.dismiss-btn .material-symbols-rounded{font-size:17px;}

/* Settings surface */
.settings-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:16px;margin-bottom:20px;animation:cardIn .35s .3s cubic-bezier(.34,1.1,.64,1) both;}
.setting-card{background:var(--md-surface-container-lowest);border-radius:var(--shape-xl);box-shadow:var(--md-elev-1);padding:20px;}
.setting-card-title{font-family:'Google Sans Display',sans-serif;font-size:15px;font-weight:700;color:var(--md-on-surface);margin-bottom:16px;display:flex;align-items:center;gap:8px;}
.setting-card-title .material-symbols-rounded{font-size:19px;color:var(--md-primary);}
.setting-row{display:flex;justify-content:space-between;align-items:center;padding:10px 0;border-bottom:1px solid var(--md-outline-variant);}
.setting-row:last-child{border-bottom:none;padding-bottom:0;}
.setting-label{font-size:13px;color:var(--md-on-surface-variant);}
.setting-label strong{display:block;font-size:13px;font-weight:600;color:var(--md-on-surface);}
/* M3 Switch */
.m3-switch{position:relative;width:52px;height:32px;cursor:pointer;flex-shrink:0;}
.m3-switch input{opacity:0;width:0;height:0;position:absolute;}
.switch-track{position:absolute;inset:0;border-radius:var(--shape-full);background:var(--md-outline-variant);transition:background .2s;}
.m3-switch input:checked ~ .switch-track{background:var(--md-primary);}
.switch-thumb{position:absolute;top:50%;left:4px;transform:translateY(-50%);width:16px;height:16px;border-radius:50%;background:#fff;transition:left .2s,width .15s;box-shadow:0 1px 4px rgba(0,0,0,.2);}
.m3-switch input:checked ~ .switch-track .switch-thumb{left:32px;}
.m3-switch:hover .switch-thumb{width:18px;}

/* Threshold inputs */
.threshold-row{display:flex;align-items:center;gap:10px;padding:8px 0;border-bottom:1px solid var(--md-outline-variant);}
.threshold-row:last-child{border-bottom:none;}
.threshold-name{font-size:13px;color:var(--md-on-surface-variant);flex:1;}
.threshold-input{width:70px;padding:7px 10px;border:1.5px solid var(--md-outline-variant);border-radius:var(--shape-md);font-family:'Google Sans Mono',monospace;font-size:13px;color:var(--md-on-surface);background:var(--md-surface-container-low);outline:none;text-align:center;transition:border-color .2s;}
.threshold-input:focus{border-color:var(--md-primary);}
.threshold-unit{font-size:12px;color:var(--md-outline);width:32px;}

.footer-bar{background:var(--md-surface-container-low);border-top:1px solid var(--md-outline-variant);padding:12px 24px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:8px;}
.footer-bar p{font-size:12px;color:var(--md-outline);}
.footer-bar strong{color:var(--md-primary);font-weight:700;}
@keyframes cardIn{from{opacity:0;transform:translateY(16px);}to{opacity:1;transform:translateY(0);}}
@media(max-width:768px){.nav-rail{display:none;}.page-body{padding:20px 16px 40px;}}
</style>
</head>
<body>

<nav class="nav-rail">
  <div class="nav-logo"><span class="material-symbols-rounded">ecg_heart</span></div>
  <div class="nav-items">
    <a class="nav-item ripple" href="index.php"><div class="nav-indicator"><span class="material-symbols-rounded">dashboard</span></div><span class="nav-label">Overview</span></a>
    <a class="nav-item ripple" href="vitals.php" style="margin-top:8px"><div class="nav-indicator"><span class="material-symbols-rounded">vital_signs</span></div><span class="nav-label">Vitals</span></a>
    <a class="nav-item ripple" href="history.php" style="margin-top:8px"><div class="nav-indicator"><span class="material-symbols-rounded">history</span></div><span class="nav-label">History</span></a>
    <a class="nav-item ripple" href="meds.php" style="margin-top:8px"><div class="nav-indicator"><span class="material-symbols-rounded">medication</span></div><span class="nav-label">Meds</span></a>
    <a class="nav-item active ripple" href="alerts.php" style="margin-top:8px">
      <div class="nav-indicator nav-badge"><span class="material-symbols-rounded">notifications</span></div>
      <span class="nav-label">Alerts</span>
    </a>
  </div>
  <button class="nav-fab ripple"><span class="material-symbols-rounded">add</span></button>
</nav>

<div class="main">
  <header class="top-app-bar">
    <span class="top-bar-title"><strong>MediPulse</strong> — Alerts</span>
    <div class="top-bar-right">
      <button class="icon-btn ripple" onclick="loadAlerts()"><span class="material-symbols-rounded">refresh</span></button>
      <button class="icon-btn ripple" onclick="clearAll()"><span class="material-symbols-rounded">clear_all</span></button>
      <div class="avatar ripple"><span class="material-symbols-rounded">person</span></div>
    </div>
  </header>

  <div class="page-body">

    <!-- Alert Stats -->
    <div class="section-eyebrow"><span class="material-symbols-rounded" style="font-size:14px">bar_chart</span>Alert Summary</div>

    <div class="alert-stats">
      <div class="astat">
        <div class="astat-icon" style="color:var(--md-on-error-container)"><span class="material-symbols-rounded">error</span></div>
        <div class="astat-num" id="crit-count" style="color:var(--md-on-error-container)">0</div>
        <div class="astat-label" style="color:var(--md-on-error-container)">Critical</div>
      </div>
      <div class="astat">
        <div class="astat-icon" style="color:var(--md-on-warning-container)"><span class="material-symbols-rounded">warning</span></div>
        <div class="astat-num" id="warn-count" style="color:var(--md-on-warning-container)">0</div>
        <div class="astat-label" style="color:var(--md-on-warning-container)">Warnings</div>
      </div>
      <div class="astat">
        <div class="astat-icon" style="color:var(--md-on-primary-container)"><span class="material-symbols-rounded">info</span></div>
        <div class="astat-num" id="info-count" style="color:var(--md-on-primary-container)">0</div>
        <div class="astat-label" style="color:var(--md-on-primary-container)">Info</div>
      </div>
      <div class="astat">
        <div class="astat-icon" style="color:var(--md-on-success-container)"><span class="material-symbols-rounded">check_circle</span></div>
        <div class="astat-num" id="ok-count" style="color:var(--md-on-success-container)">0</div>
        <div class="astat-label" style="color:var(--md-on-success-container)">Resolved</div>
      </div>
    </div>

    <!-- Live Alert Feed -->
    <div class="section-eyebrow"><span class="material-symbols-rounded" style="font-size:14px">notifications_active</span>Live Alert Feed</div>

    <div class="alert-feed" id="alertFeed">
      <div class="feed-header">
        <div class="feed-title">Active Alerts</div>
        <button class="tonal-btn ripple" onclick="clearAll()"><span class="material-symbols-rounded">done_all</span>Mark All Read</button>
      </div>
      <div class="feed-divider"></div>
      <div id="alertList">
        <div style="padding:32px;text-align:center;color:var(--md-outline);font-size:14px">
          <span class="material-symbols-rounded" style="font-size:40px;display:block;margin-bottom:10px;opacity:.35">notifications_none</span>
          Checking for alerts…
        </div>
      </div>
    </div>

    <!-- Settings -->
    <div class="section-eyebrow"><span class="material-symbols-rounded" style="font-size:14px">tune</span>Alert Settings</div>

    <div class="settings-grid">

      <!-- Notification channels -->
      <div class="setting-card">
        <div class="setting-card-title"><span class="material-symbols-rounded">notifications</span>Notification Channels</div>
        <div class="setting-row">
          <div class="setting-label"><strong>Dashboard Alerts</strong>In-app real-time alerts</div>
          <label class="m3-switch"><input type="checkbox" checked/><div class="switch-track"><div class="switch-thumb"></div></div></label>
        </div>
        <div class="setting-row">
          <div class="setting-label"><strong>Sound Alerts</strong>Audible alarm on critical</div>
          <label class="m3-switch"><input type="checkbox" checked/><div class="switch-track"><div class="switch-thumb"></div></div></label>
        </div>
        <div class="setting-row">
          <div class="setting-label"><strong>SMS Notification</strong>Send to nurse station</div>
          <label class="m3-switch"><input type="checkbox"/><div class="switch-track"><div class="switch-thumb"></div></div></label>
        </div>
        <div class="setting-row">
          <div class="setting-label"><strong>Email Report</strong>Daily summary email</div>
          <label class="m3-switch"><input type="checkbox" checked/><div class="switch-track"><div class="switch-thumb"></div></div></label>
        </div>
      </div>

      <!-- Alert types -->
      <div class="setting-card">
        <div class="setting-card-title"><span class="material-symbols-rounded">category</span>Alert Types</div>
        <div class="setting-row">
          <div class="setting-label"><strong>Temperature Alerts</strong>Fever / Hypothermia</div>
          <label class="m3-switch"><input type="checkbox" checked/><div class="switch-track"><div class="switch-thumb"></div></div></label>
        </div>
        <div class="setting-row">
          <div class="setting-label"><strong>Heart Rate Alerts</strong>Tachycardia / Bradycardia</div>
          <label class="m3-switch"><input type="checkbox" checked/><div class="switch-track"><div class="switch-thumb"></div></div></label>
        </div>
        <div class="setting-row">
          <div class="setting-label"><strong>Saline Bag Empty</strong>Infusion bag low / empty</div>
          <label class="m3-switch"><input type="checkbox" checked/><div class="switch-track"><div class="switch-thumb"></div></div></label>
        </div>
        <div class="setting-row">
          <div class="setting-label"><strong>Medicine Due</strong>Scheduled dose reminders</div>
          <label class="m3-switch"><input type="checkbox" checked/><div class="switch-track"><div class="switch-thumb"></div></div></label>
        </div>
      </div>

      <!-- Thresholds -->
      <div class="setting-card">
        <div class="setting-card-title"><span class="material-symbols-rounded">schema</span>Alert Thresholds</div>
        <div class="threshold-row">
          <span class="threshold-name">Temp — High</span>
          <input class="threshold-input" type="number" value="38.5"/>
          <span class="threshold-unit">°C</span>
        </div>
        <div class="threshold-row">
          <span class="threshold-name">Temp — Low</span>
          <input class="threshold-input" type="number" value="35.5"/>
          <span class="threshold-unit">°C</span>
        </div>
        <div class="threshold-row">
          <span class="threshold-name">Heart Rate — High</span>
          <input class="threshold-input" type="number" value="110"/>
          <span class="threshold-unit">BPM</span>
        </div>
        <div class="threshold-row">
          <span class="threshold-name">Heart Rate — Low</span>
          <input class="threshold-input" type="number" value="50"/>
          <span class="threshold-unit">BPM</span>
        </div>
        <div class="threshold-row">
          <span class="threshold-name">Bag Weight — Low</span>
          <input class="threshold-input" type="number" value="80"/>
          <span class="threshold-unit">g</span>
        </div>
      </div>

    </div>

  </div>

  <div class="footer-bar">
    <p><span class="material-symbols-rounded" style="font-size:14px;vertical-align:middle;margin-right:4px">ecg_heart</span><strong>MediPulse</strong> — Alerts & Notifications</p>
    <p>Auto-refresh · <strong>every 2 seconds</strong></p>
  </div>
</div>

<script>
let alertLog = [];
let critCount=0, warnCount=0, infoCount=0, okCount=0;

function severity(row){
  const s=row.status_text;
  if(s==='CRITICAL') return 'critical';
  if(s==='WARNING')  return 'warning';
  return 'info';
}

function alertIcon(sev){ return sev==='critical'?'emergency':sev==='warning'?'warning':'info'; }
function alertColors(sev){
  if(sev==='critical') return {bg:'var(--md-error-container)',fg:'var(--md-on-error-container)'};
  if(sev==='warning')  return {bg:'var(--md-warning-container)',fg:'var(--md-on-warning-container)'};
  return {bg:'var(--md-primary-container)',fg:'var(--md-on-primary-container)'};
}
function badgeClass(sev){ return sev==='critical'?'badge-critical':sev==='warning'?'badge-warning':'badge-info'; }
function dotClass(sev){ return sev==='critical'?'dot-critical':sev==='warning'?'dot-warning':'dot-info'; }
function alertTitle(row){
  if(row.status_text==='CRITICAL') return '🚨 Critical Alert — '+row.event_text;
  if(row.status_text==='WARNING')  return '⚠️ Warning — '+row.event_text;
  return 'ℹ️ Sensor Update — '+row.event_text;
}
function alertDesc(row){
  return `Temp: ${row.temperature}°C · Heart: ${row.heart_rate} BPM · Bag: ${row.bag_weight}g — Recorded at ${row.created_at}`;
}

function renderAlerts(data){
  critCount=data.filter(r=>r.status_text==='CRITICAL').length;
  warnCount=data.filter(r=>r.status_text==='WARNING').length;
  infoCount=data.filter(r=>r.status_text==='NORMAL').length;
  okCount=0;

  document.getElementById('crit-count').textContent=critCount;
  document.getElementById('warn-count').textContent=warnCount;
  document.getElementById('info-count').textContent=infoCount;
  document.getElementById('ok-count').textContent=okCount;

  if(!data.length){
    document.getElementById('alertList').innerHTML='<div style="padding:40px;text-align:center;color:var(--md-outline)"><span class="material-symbols-rounded" style="font-size:40px;display:block;margin-bottom:10px;opacity:.35">notifications_none</span>No alerts at this time.</div>';
    return;
  }

  let html='';
  data.slice(0,20).forEach((row,i)=>{
    const sev=severity(row);
    const col=alertColors(sev);
    html+=`
    <div class="alert-item" id="alert-${row.id}" style="animation-delay:${i*0.04}s">
      <div class="alert-dot-col"><div class="alert-dot ${dotClass(sev)}"></div></div>
      <div class="alert-icon-wrap" style="background:${col.bg}">
        <span class="material-symbols-rounded" style="color:${col.fg}">${alertIcon(sev)}</span>
      </div>
      <div class="alert-content">
        <div class="alert-title">${alertTitle(row)}</div>
        <div class="alert-desc">${alertDesc(row)}</div>
        <div class="alert-meta">
          <span class="alert-time">${row.created_at}</span>
          <span class="alert-source">Sensor #${row.id}</span>
        </div>
      </div>
      <span class="alert-badge ${badgeClass(sev)}">${row.status_text}</span>
      <button class="dismiss-btn ripple" onclick="dismissAlert(${row.id})"><span class="material-symbols-rounded">close</span></button>
    </div>`;
  });
  document.getElementById('alertList').innerHTML=html;
}

function dismissAlert(id){
  const el=document.getElementById('alert-'+id);
  if(el){el.style.transition='opacity .3s,transform .3s';el.style.opacity='0';el.style.transform='translateX(20px)';setTimeout(()=>el.remove(),320);}
}

function clearAll(){
  document.querySelectorAll('.alert-item').forEach(el=>{
    el.style.transition='opacity .25s';el.style.opacity='0';
    setTimeout(()=>el.remove(),260);
  });
  setTimeout(()=>{
    document.getElementById('alertList').innerHTML='<div style="padding:40px;text-align:center;color:var(--md-outline)"><span class="material-symbols-rounded" style="font-size:40px;display:block;margin-bottom:10px;opacity:.35">done_all</span>All alerts cleared.</div>';
  },320);
}

function loadAlerts(){
  fetch('latest.php').then(r=>r.json()).then(data=>{
    alertLog=data;
    renderAlerts(data);
  }).catch(e=>console.log(e));
}

loadAlerts();
setInterval(loadAlerts,2000);
</script>
</body>
</html>
