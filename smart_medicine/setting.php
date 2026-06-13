<?php
// setting.php — MediPulse Settings

$dashboardUrl = "http://localhost/smart_medicine/index.php";
$profileUrl   = "http://localhost/smart_medicine/profile.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Settings — MediPulse</title>

<link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&family=Google+Sans+Display:wght@400;500;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">

<style>
:root{
  --md-primary:#006875;
  --md-primary-container:#97F0FF;
  --md-on-primary-container:#001F24;
  --md-secondary-container:#CCE8EF;
  --md-on-secondary-container:#051F23;
  --md-background:#F4FAFB;
  --md-on-surface:#161D1E;
  --md-surface-container-low:#EEF4F5;
  --md-surface-container-lowest:#FFFFFF;
  --md-outline:#6F797B;
  --md-outline-variant:#BFC8CA;
  --shape-xl:28px;
  --shadow:0 1px 3px rgba(0,0,0,.12);
}

*{
  box-sizing:border-box;
  margin:0;
  padding:0;
}

body{
  font-family:'Google Sans',sans-serif;
  background:var(--md-background);
  color:var(--md-on-surface);
  min-height:100vh;
}

.top-app-bar{
  height:64px;
  background:var(--md-surface-container-low);
  border-bottom:1px solid var(--md-outline-variant);
  display:flex;
  align-items:center;
  justify-content:space-between;
  padding:0 24px;
}

.top-title{
  font-size:22px;
  font-family:'Google Sans Display',sans-serif;
  color:var(--md-on-surface);
  text-decoration:none;
  cursor:pointer;
}

.top-title strong{
  color:var(--md-primary);
}

.top-title:hover strong{
  text-decoration:underline;
}

.actions{
  display:flex;
  gap:10px;
  align-items:center;
}

.icon-btn{
  width:40px;
  height:40px;
  border:none;
  border-radius:50%;
  display:grid;
  place-items:center;
  cursor:pointer;
  background:transparent;
  color:#3F4D4F;
}

.icon-btn:hover{
  background:rgba(0,104,117,.08);
}

.page{
  max-width:1000px;
  margin:0 auto;
  padding:28px 20px 60px;
}

.section-title{
  font-size:12px;
  text-transform:uppercase;
  letter-spacing:1.5px;
  color:var(--md-outline);
  font-weight:700;
  margin:22px 0 14px;
}

.grid{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
  gap:16px;
}

.card{
  background:var(--md-surface-container-lowest);
  border-radius:var(--shape-xl);
  box-shadow:var(--shadow);
  padding:22px;
}

.card-title{
  font-size:17px;
  font-weight:700;
  margin-bottom:16px;
  display:flex;
  align-items:center;
  gap:8px;
}

.card-title .material-symbols-rounded{
  color:var(--md-primary);
}

.setting-row{
  display:flex;
  justify-content:space-between;
  align-items:center;
  padding:13px 0;
  border-bottom:1px solid var(--md-outline-variant);
  gap:16px;
}

.setting-row:last-child{
  border-bottom:none;
}

.setting-text strong{
  display:block;
  font-size:14px;
}

.setting-text span{
  font-size:12px;
  color:var(--md-outline);
}

.switch{
  position:relative;
  width:52px;
  height:32px;
  flex-shrink:0;
}

.switch input{
  display:none;
}

.track{
  position:absolute;
  inset:0;
  border-radius:999px;
  background:#BFC8CA;
  transition:.2s;
}

.thumb{
  position:absolute;
  width:20px;
  height:20px;
  left:6px;
  top:6px;
  background:white;
  border-radius:50%;
  transition:.2s;
}

.switch input:checked + .track{
  background:var(--md-primary);
}

.switch input:checked + .track .thumb{
  left:26px;
}

.input-row{
  display:grid;
  grid-template-columns:1fr 90px;
  gap:10px;
  align-items:center;
  margin-bottom:12px;
}

label{
  font-size:13px;
  color:#3F4D4F;
  font-weight:600;
}

input,select{
  width:100%;
  border:1.5px solid var(--md-outline-variant);
  border-radius:14px;
  padding:10px 12px;
  font-family:'Google Sans',sans-serif;
  outline:none;
  background:#fff;
}

input:focus,select:focus{
  border-color:var(--md-primary);
}

.btn{
  border:none;
  border-radius:999px;
  padding:11px 20px;
  font-family:'Google Sans',sans-serif;
  font-weight:700;
  cursor:pointer;
  background:var(--md-primary);
  color:white;
}

.btn.secondary{
  background:var(--md-secondary-container);
  color:var(--md-on-secondary-container);
}

.btn-row{
  display:flex;
  gap:10px;
  flex-wrap:wrap;
  margin-top:18px;
}

.notice{
  margin-top:14px;
  background:var(--md-primary-container);
  color:var(--md-on-primary-container);
  padding:12px 16px;
  border-radius:18px;
  font-size:13px;
  display:none;
}

@media(max-width:700px){
  .top-title{
    font-size:19px;
  }
}
</style>
</head>

<body>

<header class="top-app-bar">
  <a class="top-title" href="<?php echo $dashboardUrl; ?>" title="Go to Dashboard">
    <strong>MediPulse</strong> — Settings
  </a>

  <div class="actions">
    <button class="icon-btn" onclick="window.location.href='<?php echo $dashboardUrl; ?>'" title="Dashboard">
      <span class="material-symbols-rounded">dashboard</span>
    </button>

    <button class="icon-btn" onclick="window.location.href='<?php echo $profileUrl; ?>'" title="Profile">
      <span class="material-symbols-rounded">person</span>
    </button>
  </div>
</header>

<main class="page">

  <div class="section-title">System Preferences</div>

  <div class="grid">

    <div class="card">
      <div class="card-title">
        <span class="material-symbols-rounded">tune</span>
        Dashboard Controls
      </div>

      <div class="setting-row">
        <div class="setting-text">
          <strong>Auto Refresh</strong>
          <span>Refresh sensor data every 2 seconds</span>
        </div>
        <label class="switch">
          <input type="checkbox" id="autoRefresh" checked>
          <span class="track"><span class="thumb"></span></span>
        </label>
      </div>

      <div class="setting-row">
        <div class="setting-text">
          <strong>Sound Alerts</strong>
          <span>Play sound for critical status</span>
        </div>
        <label class="switch">
          <input type="checkbox" id="soundAlerts" checked>
          <span class="track"><span class="thumb"></span></span>
        </label>
      </div>

      <div class="setting-row">
        <div class="setting-text">
          <strong>Emergency Mode</strong>
          <span>Highlight CRITICAL values strongly</span>
        </div>
        <label class="switch">
          <input type="checkbox" id="emergencyMode" checked>
          <span class="track"><span class="thumb"></span></span>
        </label>
      </div>
    </div>

    <div class="card">
      <div class="card-title">
        <span class="material-symbols-rounded">notifications</span>
        Alert Thresholds
      </div>

      <div class="input-row">
        <label>Temperature High</label>
        <input type="number" step="0.1" id="tempHigh" value="38.5">
      </div>

      <div class="input-row">
        <label>Temperature Low</label>
        <input type="number" step="0.1" id="tempLow" value="35.5">
      </div>

      <div class="input-row">
        <label>Heart Rate High</label>
        <input type="number" id="heartHigh" value="110">
      </div>

      <div class="input-row">
        <label>Heart Rate Low</label>
        <input type="number" id="heartLow" value="50">
      </div>

      <div class="input-row">
        <label>Bag Weight Low</label>
        <input type="number" id="bagLow" value="80">
      </div>
    </div>

    <div class="card">
      <div class="card-title">
        <span class="material-symbols-rounded">palette</span>
        Display
      </div>

      <div class="input-row">
        <label>Theme Mode</label>
        <select id="themeMode">
          <option value="light">Light</option>
          <option value="clinical">Clinical</option>
          <option value="compact">Compact</option>
        </select>
      </div>

      <div class="input-row">
        <label>Data Limit</label>
        <select id="dataLimit">
          <option value="30">30 Rows</option>
          <option value="50">50 Rows</option>
          <option value="100">100 Rows</option>
        </select>
      </div>
    </div>

  </div>

  <div class="btn-row">
    <button class="btn" onclick="saveSettings()">Save Settings</button>
    <button class="btn secondary" onclick="resetSettings()">Reset</button>
    <button class="btn secondary" onclick="window.location.href='<?php echo $dashboardUrl; ?>'">Back to Dashboard</button>
    <button class="btn secondary" onclick="window.location.href='<?php echo $profileUrl; ?>'">Go to Profile</button>
  </div>

  <div class="notice" id="notice">Settings saved successfully.</div>

</main>

<script>
function saveSettings(){
  const settings = {
    autoRefresh: document.getElementById('autoRefresh').checked,
    soundAlerts: document.getElementById('soundAlerts').checked,
    emergencyMode: document.getElementById('emergencyMode').checked,
    tempHigh: document.getElementById('tempHigh').value,
    tempLow: document.getElementById('tempLow').value,
    heartHigh: document.getElementById('heartHigh').value,
    heartLow: document.getElementById('heartLow').value,
    bagLow: document.getElementById('bagLow').value,
    themeMode: document.getElementById('themeMode').value,
    dataLimit: document.getElementById('dataLimit').value
  };

  localStorage.setItem('medipulse_settings', JSON.stringify(settings));

  const notice = document.getElementById('notice');
  notice.style.display = 'block';
  notice.textContent = 'Settings saved successfully.';
}

function loadSettings(){
  const saved = localStorage.getItem('medipulse_settings');
  if(!saved) return;

  const s = JSON.parse(saved);

  document.getElementById('autoRefresh').checked = s.autoRefresh ?? true;
  document.getElementById('soundAlerts').checked = s.soundAlerts ?? true;
  document.getElementById('emergencyMode').checked = s.emergencyMode ?? true;
  document.getElementById('tempHigh').value = s.tempHigh ?? 38.5;
  document.getElementById('tempLow').value = s.tempLow ?? 35.5;
  document.getElementById('heartHigh').value = s.heartHigh ?? 110;
  document.getElementById('heartLow').value = s.heartLow ?? 50;
  document.getElementById('bagLow').value = s.bagLow ?? 80;
  document.getElementById('themeMode').value = s.themeMode ?? 'light';
  document.getElementById('dataLimit').value = s.dataLimit ?? '30';
}

function resetSettings(){
  localStorage.removeItem('medipulse_settings');
  location.reload();
}

loadSettings();
</script>

</body>
</html>