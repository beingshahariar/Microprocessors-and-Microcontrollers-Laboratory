<?php
// history.php — Health History Log | MediPulse · Material You
$profileUrl = "http://localhost/smart_medicine/profile.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>History — MediPulse</title>

<link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&family=Google+Sans+Display:wght@400;500;700&family=Google+Sans+Mono&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

*,*::before,*::after{
  margin:0;
  padding:0;
  box-sizing:border-box;
}

body{
  font-family:'Google Sans',sans-serif;
  background:var(--md-background);
  color:var(--md-on-surface);
  min-height:100vh;
  display:flex;
  overflow-x:hidden;
}

/* Nav Rail */
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

.nav-logo .material-symbols-rounded{
  color:var(--md-on-primary);
  font-size:22px;
}

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
  transition:background .2s;
}

.nav-item:hover .nav-indicator{
  background:var(--md-state-hover);
}

.nav-item.active .nav-indicator{
  background:var(--md-secondary-container);
}

.nav-indicator .material-symbols-rounded{
  font-size:22px;
  color:var(--md-on-surface-variant);
}

.nav-item.active .nav-indicator .material-symbols-rounded{
  color:var(--md-on-secondary-container);
}

.nav-label{
  font-size:11px;
  font-weight:500;
  color:var(--md-on-surface-variant);
  letter-spacing:.4px;
  text-align:center;
}

.nav-item.active .nav-label{
  font-weight:700;
}

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

.nav-fab:hover{
  box-shadow:var(--md-elev-3);
  filter:brightness(.96);
}

.nav-fab .material-symbols-rounded{
  color:var(--md-on-primary-container);
  font-size:24px;
}

.ripple{
  position:relative;
  overflow:hidden;
}

.ripple::after{
  content:'';
  position:absolute;
  inset:0;
  background:radial-gradient(circle,rgba(0,104,117,.18) 1%,transparent 70%);
  transform:scale(0);
  opacity:0;
  transition:transform .4s,opacity .4s;
}

.ripple:active::after{
  transform:scale(2.5);
  opacity:1;
  transition:0s;
}

/* Layout */
.main{
  flex:1;
  min-width:0;
  display:flex;
  flex-direction:column;
}

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

.top-bar-title strong{
  font-weight:700;
  color:var(--md-primary);
}

.top-bar-right{
  display:flex;
  align-items:center;
  gap:12px;
}

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

.icon-btn:hover{
  background:var(--md-state-hover);
}

.icon-btn .material-symbols-rounded{
  font-size:22px;
}

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

.avatar .material-symbols-rounded{
  font-size:20px;
  color:var(--md-on-primary);
}

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

/* Summary stats row */
.stat-row{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(160px,1fr));
  gap:14px;
  margin-bottom:24px;
}

.stat-chip{
  background:var(--md-surface-container-lowest);
  border-radius:20px;
  padding:16px 18px;
  box-shadow:var(--md-elev-1);
  display:flex;
  align-items:center;
  gap:14px;
  animation:cardIn .35s cubic-bezier(.34,1.1,.64,1) both;
}

.stat-chip:nth-child(1){animation-delay:.05s;}
.stat-chip:nth-child(2){animation-delay:.10s;}
.stat-chip:nth-child(3){animation-delay:.15s;}
.stat-chip:nth-child(4){animation-delay:.20s;}

.stat-icon{
  width:44px;
  height:44px;
  border-radius:var(--shape-md);
  display:grid;
  place-items:center;
  flex-shrink:0;
}

.stat-icon .material-symbols-rounded{
  font-size:22px;
}

.stat-text-label{
  font-size:11px;
  font-weight:600;
  letter-spacing:.8px;
  text-transform:uppercase;
  color:var(--md-outline);
}

.stat-text-val{
  font-family:'Google Sans Display',sans-serif;
  font-size:26px;
  font-weight:700;
  color:var(--md-on-surface);
  letter-spacing:-1px;
}

/* Filter bar */
.filter-bar{
  background:var(--md-surface-container-lowest);
  border-radius:var(--shape-xl);
  box-shadow:var(--md-elev-1);
  padding:18px 22px;
  margin-bottom:20px;
  display:flex;
  align-items:center;
  gap:14px;
  flex-wrap:wrap;
  animation:cardIn .35s .2s cubic-bezier(.34,1.1,.64,1) both;
}

.filter-label{
  font-size:13px;
  font-weight:600;
  color:var(--md-on-surface-variant);
  letter-spacing:.3px;
  white-space:nowrap;
}

.filter-chip{
  display:inline-flex;
  align-items:center;
  gap:6px;
  padding:7px 16px;
  border-radius:var(--shape-full);
  border:1.5px solid var(--md-outline-variant);
  background:transparent;
  font-family:'Google Sans',sans-serif;
  font-size:13px;
  font-weight:600;
  color:var(--md-on-surface-variant);
  cursor:pointer;
  transition:all .2s;
}

.filter-chip:hover{
  background:var(--md-state-hover);
  border-color:var(--md-primary);
  color:var(--md-primary);
}

.filter-chip.active{
  background:var(--md-primary-container);
  border-color:var(--md-primary);
  color:var(--md-on-primary-container);
}

.filter-chip .material-symbols-rounded{
  font-size:15px;
}

.filter-search{
  flex:1;
  min-width:160px;
  display:flex;
  align-items:center;
  gap:8px;
  background:var(--md-surface-container-low);
  border-radius:var(--shape-full);
  padding:8px 16px;
  border:1.5px solid var(--md-outline-variant);
}

.filter-search input{
  border:none;
  background:transparent;
  font-family:'Google Sans',sans-serif;
  font-size:13px;
  color:var(--md-on-surface);
  outline:none;
  flex:1;
}

.filter-search input::placeholder{
  color:var(--md-outline);
}

.filter-search .material-symbols-rounded{
  font-size:18px;
  color:var(--md-outline);
}

/* Chart strip */
.history-chart-surface{
  background:var(--md-surface-container-lowest);
  border-radius:var(--shape-xl);
  box-shadow:var(--md-elev-1);
  padding:24px;
  margin-bottom:20px;
  animation:cardIn .35s .22s cubic-bezier(.34,1.1,.64,1) both;
}

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
  font-size:17px;
  font-weight:700;
  color:var(--md-on-surface);
  letter-spacing:-.3px;
}

.surface-subtitle{
  font-size:12px;
  color:var(--md-outline);
  margin-top:2px;
}

.chart-wrap{
  height:200px;
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
  transition:filter .2s;
}

.tonal-btn:hover{
  filter:brightness(.95);
}

.tonal-btn .material-symbols-rounded{
  font-size:16px;
}

/* Table surface */
.m3-surface{
  background:var(--md-surface-container-lowest);
  border-radius:var(--shape-xl);
  box-shadow:var(--md-elev-1);
  padding:24px;
  margin-bottom:20px;
  animation:cardIn .35s .28s cubic-bezier(.34,1.1,.64,1) both;
}

.m3-divider{
  height:1px;
  background:var(--md-outline-variant);
  margin:0 -24px 20px;
}

.table-scroll{
  overflow-x:auto;
}

table{
  width:100%;
  border-collapse:collapse;
  min-width:740px;
}

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

tbody tr{
  border-bottom:1px solid var(--md-outline-variant);
  transition:background .15s;
}

tbody tr:last-child{
  border-bottom:none;
}

tbody tr:hover{
  background:var(--md-surface-container);
}

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

.status-chip .material-symbols-rounded{
  font-size:14px;
}

.chip-normal{
  background:var(--md-primary-container);
  color:var(--md-on-primary-container);
}

.chip-warning{
  background:var(--md-warning-container);
  color:var(--md-on-warning-container);
}

.chip-critical{
  background:var(--md-error-container);
  color:var(--md-on-error-container);
}

/* Pagination */
.pagination{
  display:flex;
  align-items:center;
  justify-content:space-between;
  margin-top:18px;
  flex-wrap:wrap;
  gap:12px;
}

.page-info{
  font-size:13px;
  color:var(--md-outline);
}

.page-btns{
  display:flex;
  gap:8px;
}

.page-btn{
  width:36px;
  height:36px;
  border-radius:var(--shape-full);
  border:1.5px solid var(--md-outline-variant);
  background:transparent;
  cursor:pointer;
  display:grid;
  place-items:center;
  transition:all .2s;
  color:var(--md-on-surface-variant);
}

.page-btn:hover{
  background:var(--md-state-hover);
  border-color:var(--md-primary);
}

.page-btn.active{
  background:var(--md-primary);
  border-color:var(--md-primary);
  color:#fff;
}

.page-btn .material-symbols-rounded{
  font-size:18px;
}

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

.footer-bar p{
  font-size:12px;
  color:var(--md-outline);
  letter-spacing:.3px;
}

.footer-bar strong{
  color:var(--md-primary);
  font-weight:700;
}

@keyframes cardIn{
  from{opacity:0;transform:translateY(16px);}
  to{opacity:1;transform:translateY(0);}
}

@media(max-width:768px){
  .nav-rail{display:none;}
  .page-body{padding:20px 16px 40px;}
}
</style>
</head>

<body>

<nav class="nav-rail">
  <div class="nav-logo">
    <span class="material-symbols-rounded">ecg_heart</span>
  </div>

  <div class="nav-items">
    <a class="nav-item ripple" href="index.php">
      <div class="nav-indicator"><span class="material-symbols-rounded">dashboard</span></div>
      <span class="nav-label">Overview</span>
    </a>

    <a class="nav-item ripple" href="vitals.php" style="margin-top:8px">
      <div class="nav-indicator"><span class="material-symbols-rounded">vital_signs</span></div>
      <span class="nav-label">Vitals</span>
    </a>

    <a class="nav-item active ripple" href="history.php" style="margin-top:8px">
      <div class="nav-indicator"><span class="material-symbols-rounded">history</span></div>
      <span class="nav-label">History</span>
    </a>

    <a class="nav-item ripple" href="meds.php" style="margin-top:8px">
      <div class="nav-indicator"><span class="material-symbols-rounded">medication</span></div>
      <span class="nav-label">Meds</span>
    </a>

    <a class="nav-item ripple" href="alerts.php" style="margin-top:8px">
      <div class="nav-indicator"><span class="material-symbols-rounded">notifications</span></div>
      <span class="nav-label">Alerts</span>
    </a>
  </div>

  <button class="nav-fab ripple">
    <span class="material-symbols-rounded">add</span>
  </button>
</nav>

<div class="main">

  <header class="top-app-bar">
    <span class="top-bar-title"><strong>MediPulse</strong> — Health History</span>

    <div class="top-bar-right">
      <div class="live-chip">
        <div class="live-dot"></div>
        Live · 2s
      </div>

      <!-- Refresh button removed as requested -->

      <button class="icon-btn ripple" onclick="downloadCSV()" title="Download CSV">
        <span class="material-symbols-rounded">download</span>
      </button>

      <a class="avatar ripple" href="<?php echo $profileUrl; ?>" title="Profile">
        <span class="material-symbols-rounded">person</span>
      </a>
    </div>
  </header>

  <div class="page-body">

    <div class="section-eyebrow">
      <span class="material-symbols-rounded" style="font-size:14px">bar_chart</span>
      Summary Statistics
    </div>

    <div class="stat-row">
      <div class="stat-chip">
        <div class="stat-icon" style="background:var(--md-primary-container)">
          <span class="material-symbols-rounded" style="color:var(--md-on-primary-container)">receipt_long</span>
        </div>
        <div>
          <div class="stat-text-label">Total Records</div>
          <div class="stat-text-val" id="stat-total">—</div>
        </div>
      </div>

      <div class="stat-chip">
        <div class="stat-icon" style="background:var(--md-error-container)">
          <span class="material-symbols-rounded" style="color:var(--md-on-error-container)">error</span>
        </div>
        <div>
          <div class="stat-text-label">Critical Events</div>
          <div class="stat-text-val" id="stat-critical">—</div>
        </div>
      </div>

      <div class="stat-chip">
        <div class="stat-icon" style="background:var(--md-warning-container)">
          <span class="material-symbols-rounded" style="color:var(--md-on-warning-container)">warning</span>
        </div>
        <div>
          <div class="stat-text-label">Warnings</div>
          <div class="stat-text-val" id="stat-warn">—</div>
        </div>
      </div>

      <div class="stat-chip">
        <div class="stat-icon" style="background:var(--md-primary-container)">
          <span class="material-symbols-rounded" style="color:var(--md-on-primary-container)">check_circle</span>
        </div>
        <div>
          <div class="stat-text-label">Normal Readings</div>
          <div class="stat-text-val" id="stat-normal">—</div>
        </div>
      </div>
    </div>

    <div class="section-eyebrow">
      <span class="material-symbols-rounded" style="font-size:14px">timeline</span>
      Historical Trend
    </div>

    <div class="history-chart-surface">
      <div class="surface-header">
        <div>
          <div class="surface-title">Temperature & Heart Rate Over Time</div>
          <div class="surface-subtitle">All recorded readings from sensor</div>
        </div>

        <button class="tonal-btn" onclick="downloadCSV()">
          <span class="material-symbols-rounded">download</span>
          Export CSV
        </button>
      </div>

      <div class="chart-wrap">
        <canvas id="historyChart"></canvas>
      </div>
    </div>

    <div class="section-eyebrow">
      <span class="material-symbols-rounded" style="font-size:14px">table_rows</span>
      Full Log Records
    </div>

    <div class="filter-bar">
      <span class="filter-label">Filter:</span>

      <button class="filter-chip active" data-filter="all">
        <span class="material-symbols-rounded">select_all</span>
        All
      </button>

      <button class="filter-chip" data-filter="NORMAL">
        <span class="material-symbols-rounded">check_circle</span>
        Normal
      </button>

      <button class="filter-chip" data-filter="WARNING">
        <span class="material-symbols-rounded">warning</span>
        Warning
      </button>

      <button class="filter-chip" data-filter="CRITICAL">
        <span class="material-symbols-rounded">error</span>
        Critical
      </button>

      <div class="filter-search">
        <span class="material-symbols-rounded">search</span>
        <input type="text" id="searchInput" placeholder="Search records…"/>
      </div>
    </div>

    <div class="m3-surface">
      <div class="surface-header">
        <div>
          <div class="surface-title">Sensor Log Records</div>
          <div class="surface-subtitle" id="record-count">Loading…</div>
        </div>
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

          <tbody id="historyBody">
            <tr>
              <td colspan="7" class="label-cell" style="padding:28px">
                Loading records…
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="pagination">
        <span class="page-info" id="page-info">— records</span>

        <div class="page-btns">
          <button class="page-btn" id="prevBtn">
            <span class="material-symbols-rounded">chevron_left</span>
          </button>

          <button class="page-btn active" id="page1">1</button>

          <button class="page-btn" id="nextBtn">
            <span class="material-symbols-rounded">chevron_right</span>
          </button>
        </div>
      </div>
    </div>

  </div>

  <div class="footer-bar">
    <p>
      <span class="material-symbols-rounded" style="font-size:14px;vertical-align:middle;margin-right:4px">ecg_heart</span>
      <strong>MediPulse</strong> — Health History
    </p>

    <p>Auto-refresh · <strong>every 2 seconds</strong></p>
  </div>

</div>

<script>
Chart.defaults.font.family = "'Google Sans',sans-serif";
Chart.defaults.color = '#6F797B';
Chart.defaults.borderColor = '#BFC8CA';

let allData = [];
let filterStatus = 'all';
let searchVal = '';
const PAGE_SIZE = 10;
let currentPage = 1;

function valueOrDash(value){
  return value === null || value === undefined || value === '' ? '--' : value;
}

function safeStatus(status){
  return status || 'NORMAL';
}

function safeEvent(row){
  return row.event_text || row.alert_message || 'Vitals updated';
}

function mkGrad(ctx, ca, t, b){
  if(!ca) return t;
  const g = ctx.createLinearGradient(0, ca.top, 0, ca.bottom);
  g.addColorStop(0, t);
  g.addColorStop(1, b);
  return g;
}

const histChart = new Chart(document.getElementById('historyChart').getContext('2d'), {
  type:'line',
  data:{
    labels:[],
    datasets:[
      {
        label:'Temp °C',
        data:[],
        borderColor:'#006875',
        backgroundColor:ctx => mkGrad(
          ctx.chart.ctx,
          ctx.chart.chartArea,
          'rgba(0,104,117,.18)',
          'rgba(0,104,117,.01)'
        ),
        borderWidth:2,
        tension:.4,
        fill:true,
        pointRadius:3,
        pointBackgroundColor:'#fff',
        pointBorderColor:'#006875',
        pointBorderWidth:2,
        yAxisID:'y'
      },
      {
        label:'BPM',
        data:[],
        borderColor:'#BA1A1A',
        backgroundColor:'transparent',
        borderWidth:2,
        tension:.4,
        fill:false,
        pointRadius:3,
        pointBackgroundColor:'#fff',
        pointBorderColor:'#BA1A1A',
        pointBorderWidth:2,
        yAxisID:'y1',
        borderDash:[6,3]
      }
    ]
  },
  options:{
    responsive:true,
    maintainAspectRatio:false,
    interaction:{mode:'index',intersect:false},
    plugins:{
      legend:{
        display:true,
        labels:{
          color:'#3F4D4F',
          font:{weight:'600',size:12}
        }
      },
      tooltip:{
        backgroundColor:'#001F24',
        titleColor:'#97F0FF',
        bodyColor:'#CCE8EF',
        borderColor:'#97F0FF',
        borderWidth:1,
        padding:12,
        cornerRadius:14
      }
    },
    scales:{
      x:{
        ticks:{
          color:'#6F797B',
          font:{size:10},
          maxRotation:45,
          minRotation:45
        },
        grid:{display:false},
        border:{display:false}
      },
      y:{
        type:'linear',
        position:'left',
        beginAtZero:false,
        ticks:{color:'#006875',font:{size:11}},
        grid:{color:'#DBE4E6'},
        border:{display:false},
        title:{
          display:true,
          text:'Temp (°C)',
          color:'#006875',
          font:{size:11}
        }
      },
      y1:{
        type:'linear',
        position:'right',
        beginAtZero:false,
        ticks:{color:'#BA1A1A',font:{size:11}},
        grid:{display:false},
        border:{display:false},
        title:{
          display:true,
          text:'BPM',
          color:'#BA1A1A',
          font:{size:11}
        }
      }
    }
  }
});

function chipClass(s){
  s = safeStatus(s);
  return s === 'NORMAL' ? 'chip-normal' : s === 'WARNING' ? 'chip-warning' : 'chip-critical';
}

function chipIcon(s){
  s = safeStatus(s);
  return s === 'NORMAL' ? 'check_circle' : s === 'WARNING' ? 'warning' : 'error';
}

function getFiltered(){
  return allData.filter(r => {
    const status = safeStatus(r.status_text);
    const eventText = safeEvent(r).toLowerCase();
    const createdAt = String(r.created_at || '').toLowerCase();
    const id = String(r.id || '').toLowerCase();

    const matchFilter = filterStatus === 'all' || status === filterStatus;
    const matchSearch =
      !searchVal ||
      id.includes(searchVal) ||
      eventText.includes(searchVal) ||
      createdAt.includes(searchVal);

    return matchFilter && matchSearch;
  });
}

function renderTable(){
  const filtered = getFiltered();
  const total = filtered.length;
  const start = (currentPage - 1) * PAGE_SIZE;
  const page = filtered.slice(start, start + PAGE_SIZE);

  document.getElementById('record-count').textContent = total + ' records found';

  if(total === 0){
    document.getElementById('page-info').textContent = 'No records';
  }else{
    document.getElementById('page-info').textContent =
      `Showing ${start + 1}–${Math.min(start + PAGE_SIZE, total)} of ${total}`;
  }

  if(!page.length){
    document.getElementById('historyBody').innerHTML = `
      <tr>
        <td colspan="7" style="padding:36px;color:var(--md-outline);font-family:'Google Sans',sans-serif;font-size:14px">
          <span class="material-symbols-rounded" style="display:block;font-size:36px;margin-bottom:8px;opacity:.3">search_off</span>
          No records match your filter.
        </td>
      </tr>`;
    return;
  }

  let html = '';

  page.forEach(row => {
    const status = safeStatus(row.status_text);

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
      <td class="label-cell">${safeEvent(row)}</td>
      <td class="label-cell">${valueOrDash(row.created_at)}</td>
    </tr>`;
  });

  document.getElementById('historyBody').innerHTML = html;
}

function loadHistory(){
  fetch('latest.php?page=history')
    .then(r => r.json())
    .then(data => {
      if(!Array.isArray(data)){
        console.log('Invalid response:', data);
        document.getElementById('historyBody').innerHTML = `
          <tr>
            <td colspan="7" style="padding:28px;color:var(--md-error);font-family:'Google Sans',sans-serif">
              latest.php?page=history did not return a valid JSON array.
            </td>
          </tr>`;
        return;
      }

      allData = data;

      const total = data.length;
      const crit = data.filter(r => safeStatus(r.status_text) === 'CRITICAL').length;
      const warn = data.filter(r => safeStatus(r.status_text) === 'WARNING').length;
      const norm = data.filter(r => safeStatus(r.status_text) === 'NORMAL').length;

      document.getElementById('stat-total').textContent = total;
      document.getElementById('stat-critical').textContent = crit;
      document.getElementById('stat-warn').textContent = warn;
      document.getElementById('stat-normal').textContent = norm;

      const rev = [...data].reverse();

      histChart.data.labels = rev.map(r => r.created_at || '');
      histChart.data.datasets[0].data = rev.map(r => Number(r.temperature || 0));
      histChart.data.datasets[1].data = rev.map(r => Number(r.heart_rate || 0));
      histChart.update();

      renderTable();
    })
    .catch(e => {
      console.log(e);
      document.getElementById('historyBody').innerHTML = `
        <tr>
          <td colspan="7" style="padding:28px;color:var(--md-error);font-family:'Google Sans',sans-serif">
            Could not load history data.
          </td>
        </tr>`;
    });
}

function csvEscape(value){
  value = value === null || value === undefined ? '' : String(value);
  value = value.replace(/"/g, '""');
  return `"${value}"`;
}

function downloadCSV(){
  const rows = getFiltered();

  if(!rows.length){
    alert('No history data available to download.');
    return;
  }

  const headers = [
    'ID',
    'Temperature',
    'Heart Rate',
    'Bag Weight',
    'Status',
    'Event',
    'Timestamp'
  ];

  const csvRows = [];
  csvRows.push(headers.map(csvEscape).join(','));

  rows.forEach(row => {
    csvRows.push([
      row.id,
      row.temperature,
      row.heart_rate,
      row.bag_weight,
      safeStatus(row.status_text),
      safeEvent(row),
      row.created_at
    ].map(csvEscape).join(','));
  });

  const csvContent = csvRows.join('\n');
  const blob = new Blob([csvContent], { type:'text/csv;charset=utf-8;' });
  const url = URL.createObjectURL(blob);

  const a = document.createElement('a');
  const date = new Date().toISOString().slice(0,10);

  a.href = url;
  a.download = `medipulse_history_${date}.csv`;
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);

  URL.revokeObjectURL(url);
}

document.querySelectorAll('.filter-chip').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.filter-chip').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    filterStatus = btn.dataset.filter;
    currentPage = 1;
    renderTable();
  });
});

document.getElementById('searchInput').addEventListener('input', e => {
  searchVal = e.target.value.toLowerCase().trim();
  currentPage = 1;
  renderTable();
});

document.getElementById('prevBtn').addEventListener('click', () => {
  if(currentPage > 1){
    currentPage--;
    renderTable();
  }
});

document.getElementById('nextBtn').addEventListener('click', () => {
  const total = getFiltered().length;

  if(currentPage * PAGE_SIZE < total){
    currentPage++;
    renderTable();
  }
});

loadHistory();
setInterval(loadHistory, 2000);
</script>

</body>
</html>