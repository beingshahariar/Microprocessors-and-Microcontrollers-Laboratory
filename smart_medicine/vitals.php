<?php
// vitals.php — MediPulse Vitals
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vitals — MediPulse</title>

<link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&family=Google+Sans+Display:wght@400;500;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body{
  margin:0;
  font-family:'Google Sans',sans-serif;
  background:#F4FAFB;
  color:#161D1E;
  display:flex;
  min-height:100vh;
}
.nav-rail{
  width:80px;
  background:#EEF4F5;
  border-right:1px solid #BFC8CA;
  display:flex;
  flex-direction:column;
  align-items:center;
  padding:20px 0;
}
.nav-logo{
  width:42px;
  height:42px;
  background:#006875;
  color:white;
  border-radius:14px;
  display:grid;
  place-items:center;
  margin-bottom:30px;
}
.nav-item{
  text-decoration:none;
  color:#3F4D4F;
  font-size:11px;
  text-align:center;
  margin:8px 0;
}
.nav-indicator{
  width:56px;
  height:32px;
  border-radius:999px;
  display:grid;
  place-items:center;
}
.nav-item.active .nav-indicator{
  background:#CCE8EF;
}
.nav-item.active{
  font-weight:700;
}
.main{
  flex:1;
}
.top-app-bar{
  height:64px;
  background:#EEF4F5;
  border-bottom:1px solid #BFC8CA;
  display:flex;
  align-items:center;
  justify-content:space-between;
  padding:0 24px;
}
.top-bar-title{
  font-size:22px;
}
.top-bar-title strong{
  color:#006875;
}
.live-chip{
  background:#CCE8EF;
  color:#051F23;
  padding:7px 14px;
  border-radius:999px;
  font-size:13px;
  font-weight:600;
}
.page-body{
  padding:28px 24px 48px;
}
.section-eyebrow{
  font-size:11px;
  font-weight:700;
  letter-spacing:1.5px;
  text-transform:uppercase;
  color:#6F797B;
  margin-bottom:14px;
}
.vitals-grid{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
  gap:16px;
  margin-bottom:28px;
}
.card{
  background:white;
  border-radius:28px;
  padding:22px;
  box-shadow:0 1px 3px rgba(0,0,0,.12);
}
.card-title{
  font-size:12px;
  color:#6F797B;
  margin-bottom:8px;
}
.card-value{
  font-size:36px;
  font-weight:700;
  color:#006875;
}
.unit{
  font-size:15px;
  opacity:.6;
}
.progress{
  height:7px;
  background:#DBE4E6;
  border-radius:999px;
  margin-top:14px;
  overflow:hidden;
}
.progress-fill{
  height:100%;
  width:0%;
  background:#006875;
  border-radius:999px;
  transition:.4s;
}
.status-panel{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
  gap:16px;
  margin-bottom:28px;
}
.status-item{
  background:white;
  border-radius:24px;
  padding:18px;
  text-align:center;
  box-shadow:0 1px 3px rgba(0,0,0,.12);
}
.status-label{
  font-size:11px;
  color:#6F797B;
  text-transform:uppercase;
  letter-spacing:1px;
}
.status-value{
  font-size:22px;
  font-weight:700;
  margin-top:8px;
}
.chart-row{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:16px;
}
.chart-box{
  background:white;
  border-radius:28px;
  padding:24px;
  box-shadow:0 1px 3px rgba(0,0,0,.12);
}
.chart-wrap{
  height:220px;
}
.footer-bar{
  background:#EEF4F5;
  border-top:1px solid #BFC8CA;
  padding:12px 24px;
  color:#6F797B;
  font-size:12px;
}
@media(max-width:800px){
  .nav-rail{display:none;}
  .chart-row{grid-template-columns:1fr;}
}
</style>
</head>

<body>

<nav class="nav-rail">
  <div class="nav-logo">
    <span class="material-symbols-rounded">ecg_heart</span>
  </div>

  <a class="nav-item" href="index.php">
    <div class="nav-indicator"><span class="material-symbols-rounded">dashboard</span></div>
    Overview
  </a>

  <a class="nav-item active" href="vitals.php">
    <div class="nav-indicator"><span class="material-symbols-rounded">vital_signs</span></div>
    Vitals
  </a>

  <a class="nav-item" href="history.php">
    <div class="nav-indicator"><span class="material-symbols-rounded">history</span></div>
    History
  </a>

  <a class="nav-item" href="meds.php">
    <div class="nav-indicator"><span class="material-symbols-rounded">medication</span></div>
    Meds
  </a>

  <a class="nav-item" href="alerts.php">
    <div class="nav-indicator"><span class="material-symbols-rounded">notifications</span></div>
    Alerts
  </a>
</nav>

<div class="main">

<header class="top-app-bar">
  <div class="top-bar-title"><strong>MediPulse</strong> — Vitals Monitor</div>
  <div class="live-chip">Live · 2s</div>
</header>

<div class="page-body">

  <div class="section-eyebrow">Current Vital Signs</div>

  <div class="vitals-grid">

    <div class="card">
      <div class="card-title">Body Temperature</div>
      <div class="card-value" id="v-temp">--<span class="unit"> °C</span></div>
      <div class="progress"><div class="progress-fill" id="bar-temp"></div></div>
    </div>

    <div class="card">
      <div class="card-title">Heart Rate</div>
      <div class="card-value" id="v-heart">--<span class="unit"> BPM</span></div>
      <div class="progress"><div class="progress-fill" id="bar-heart"></div></div>
    </div>

    <div class="card">
      <div class="card-title">Oxygen Saturation</div>
      <div class="card-value" id="v-spo2">--<span class="unit"> %</span></div>
      <div class="progress"><div class="progress-fill" id="bar-spo2"></div></div>
    </div>

    <div class="card">
      <div class="card-title">Saline / Bag Weight</div>
      <div class="card-value" id="v-weight">--<span class="unit"> g</span></div>
      <div class="progress"><div class="progress-fill" id="bar-weight"></div></div>
    </div>

    <div class="card">
      <div class="card-title">Respiratory Rate</div>
      <div class="card-value" id="v-resp">--<span class="unit"> /min</span></div>
      <div class="progress"><div class="progress-fill" id="bar-resp"></div></div>
    </div>

    <div class="card">
      <div class="card-title">Blood Pressure</div>
      <div class="card-value" id="v-bp">--<span class="unit"> mmHg</span></div>
      <div class="progress"><div class="progress-fill" id="bar-bp"></div></div>
    </div>

  </div>

  <div class="section-eyebrow">Patient Summary</div>

  <div class="status-panel">
    <div class="status-item">
      <div class="status-label">Patient ID</div>
      <div class="status-value">PT-00142</div>
    </div>

    <div class="status-item">
      <div class="status-label">Ward / Bed</div>
      <div class="status-value">ICU-4B</div>
    </div>

    <div class="status-item">
      <div class="status-label">Last Updated</div>
      <div class="status-value" id="last-updated">—</div>
    </div>

    <div class="status-item">
      <div class="status-label">Overall Status</div>
      <div class="status-value" id="overall-status">—</div>
    </div>
  </div>

  <div class="section-eyebrow">Trend Analysis</div>

  <div class="chart-row">
    <div class="chart-box">
      <h3>Temperature Trend</h3>
      <div class="chart-wrap"><canvas id="tempChart"></canvas></div>
    </div>

    <div class="chart-box">
      <h3>Heart Rate Trend</h3>
      <div class="chart-wrap"><canvas id="heartChart"></canvas></div>
    </div>
  </div>

</div>

<div class="footer-bar">
  <strong>MediPulse</strong> — Auto-refresh every 2 seconds
</div>

</div>

<script>
Chart.defaults.font.family = "'Google Sans', sans-serif";

let tempLabels = [];
let tempData = [];
let heartLabels = [];
let heartData = [];

const tempChart = new Chart(document.getElementById('tempChart'), {
  type: 'line',
  data: {
    labels: tempLabels,
    datasets: [{
      label: 'Temperature °C',
      data: tempData,
      borderColor: '#006875',
      backgroundColor: 'rgba(0,104,117,.15)',
      borderWidth: 2,
      tension: .4,
      fill: true
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false
  }
});

const heartChart = new Chart(document.getElementById('heartChart'), {
  type: 'line',
  data: {
    labels: heartLabels,
    datasets: [{
      label: 'Heart Rate BPM',
      data: heartData,
      borderColor: '#BA1A1A',
      backgroundColor: 'rgba(186,26,26,.15)',
      borderWidth: 2,
      tension: .4,
      fill: true
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false
  }
});

function setBar(id, value) {
  const el = document.getElementById(id);
  if (el) {
    el.style.width = Math.max(0, Math.min(value, 100)) + '%';
  }
}

function safeNumber(value, fallback = 0) {
  const num = Number(value);
  return isNaN(num) ? fallback : num;
}

function loadVitals() {
  fetch('latest.php?page=vitals')
    .then(response => response.json())
    .then(data => {

      if (!Array.isArray(data) || data.length === 0) {
        console.log("No vitals data found");
        return;
      }

      const d = data[0];

      const temperature = safeNumber(d.temperature);
      const heartRate = safeNumber(d.heart_rate);
      const bagWeight = safeNumber(d.bag_weight);

      const spo2 = d.spo2 ? safeNumber(d.spo2) : 98;
      const resp = d.respiratory_rate ? safeNumber(d.respiratory_rate) : 16;
      const bp = d.blood_pressure ? d.blood_pressure : '120/80';

      document.getElementById('v-temp').innerHTML = temperature + '<span class="unit"> °C</span>';
      document.getElementById('v-heart').innerHTML = heartRate + '<span class="unit"> BPM</span>';
      document.getElementById('v-weight').innerHTML = bagWeight + '<span class="unit"> g</span>';
      document.getElementById('v-spo2').innerHTML = spo2 + '<span class="unit"> %</span>';
      document.getElementById('v-resp').innerHTML = resp + '<span class="unit"> /min</span>';
      document.getElementById('v-bp').innerHTML = bp + '<span class="unit"> mmHg</span>';

      document.getElementById('overall-status').textContent = d.status_text || 'NORMAL';
      document.getElementById('last-updated').textContent = d.created_at || new Date().toLocaleTimeString();

      setBar('bar-temp', ((temperature - 35) / 5) * 100);
      setBar('bar-heart', ((heartRate - 40) / 120) * 100);
      setBar('bar-weight', (bagWeight / 500) * 100);
      setBar('bar-spo2', spo2);
      setBar('bar-resp', ((resp - 8) / 22) * 100);

      const systolic = parseInt(String(bp).split('/')[0]) || 120;
      setBar('bar-bp', ((systolic - 70) / 110) * 100);

      const now = new Date().toLocaleTimeString();

      tempLabels.push(now);
      tempData.push(temperature);

      heartLabels.push(now);
      heartData.push(heartRate);

      if (tempLabels.length > 12) {
        tempLabels.shift();
        tempData.shift();
      }

      if (heartLabels.length > 12) {
        heartLabels.shift();
        heartData.shift();
      }

      tempChart.update();
      heartChart.update();
    })
    .catch(error => {
      console.log("Vitals loading error:", error);
    });
}

loadVitals();
setInterval(loadVitals, 2000);
</script>

</body>
</html>