<?php
// profile.php — MediPulse Profile

$dashboardUrl = "http://localhost/smart_medicine/index.php";
$settingUrl   = "http://localhost/smart_medicine/setting.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile — MediPulse</title>

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

.profile-header{
  background:linear-gradient(135deg,#006875,#4A6267);
  color:white;
  border-radius:32px;
  padding:28px;
  display:flex;
  align-items:center;
  gap:20px;
  box-shadow:var(--shadow);
  margin-bottom:24px;
}

.avatar-large{
  width:86px;
  height:86px;
  border-radius:50%;
  background:rgba(255,255,255,.2);
  display:grid;
  place-items:center;
  flex-shrink:0;
}

.avatar-large .material-symbols-rounded{
  font-size:48px;
}

.profile-name{
  font-size:28px;
  font-weight:700;
}

.profile-sub{
  opacity:.85;
  margin-top:5px;
  font-size:14px;
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

.form-row{
  margin-bottom:14px;
}

label{
  display:block;
  font-size:13px;
  color:#3F4D4F;
  font-weight:700;
  margin-bottom:7px;
}

input,select,textarea{
  width:100%;
  border:1.5px solid var(--md-outline-variant);
  border-radius:14px;
  padding:11px 13px;
  font-family:'Google Sans',sans-serif;
  outline:none;
  background:#fff;
}

textarea{
  min-height:80px;
  resize:vertical;
}

input:focus,select:focus,textarea:focus{
  border-color:var(--md-primary);
}

.info-list{
  display:flex;
  flex-direction:column;
  gap:12px;
}

.info-item{
  background:var(--md-surface-container-low);
  border-radius:18px;
  padding:14px;
}

.info-label{
  font-size:11px;
  text-transform:uppercase;
  letter-spacing:1px;
  color:var(--md-outline);
  font-weight:700;
}

.info-value{
  margin-top:4px;
  font-size:16px;
  font-weight:700;
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
  .profile-header{
    flex-direction:column;
    align-items:flex-start;
  }

  .top-title{
    font-size:19px;
  }
}
</style>
</head>

<body>

<header class="top-app-bar">
  <a class="top-title" href="<?php echo $dashboardUrl; ?>" title="Go to Dashboard">
    <strong>MediPulse</strong> — Profile
  </a>

  <div class="actions">
    <button class="icon-btn" onclick="window.location.href='<?php echo $dashboardUrl; ?>'" title="Dashboard">
      <span class="material-symbols-rounded">dashboard</span>
    </button>

    <button class="icon-btn" onclick="window.location.href='<?php echo $settingUrl; ?>'" title="Settings">
      <span class="material-symbols-rounded">settings</span>
    </button>
  </div>
</header>

<main class="page">

  <section class="profile-header">
    <div class="avatar-large">
      <span class="material-symbols-rounded">person</span>
    </div>

    <div>
      <div class="profile-name" id="displayName">Admin User</div>
      <div class="profile-sub" id="displayRole">Smart Medicine Operator</div>
      <div class="profile-sub">MediPulse Monitoring Dashboard</div>
    </div>
  </section>

  <div class="grid">

    <div class="card">
      <div class="card-title">
        <span class="material-symbols-rounded">badge</span>
        User Profile
      </div>

      <div class="form-row">
        <label>Full Name</label>
        <input type="text" id="fullName" value="Admin User">
      </div>

      <div class="form-row">
        <label>Role</label>
        <select id="role">
          <option>Smart Medicine Operator</option>
          <option>Doctor</option>
          <option>Nurse</option>
          <option>Caregiver</option>
          <option>Admin</option>
        </select>
      </div>

      <div class="form-row">
        <label>Email</label>
        <input type="email" id="email" value="admin@medipulse.local">
      </div>

      <div class="form-row">
        <label>Phone</label>
        <input type="text" id="phone" value="+880 1XXXXXXXXX">
      </div>
    </div>

    <div class="card">
      <div class="card-title">
        <span class="material-symbols-rounded">personal_injury</span>
        Patient Info
      </div>

      <div class="form-row">
        <label>Patient ID</label>
        <input type="text" id="patientId" value="PT-00142">
      </div>

      <div class="form-row">
        <label>Ward / Bed</label>
        <input type="text" id="wardBed" value="ICU-4B">
      </div>

      <div class="form-row">
        <label>Blood Group</label>
        <select id="bloodGroup">
          <option>A+</option>
          <option>A-</option>
          <option>B+</option>
          <option>B-</option>
          <option>O+</option>
          <option>O-</option>
          <option>AB+</option>
          <option>AB-</option>
        </select>
      </div>

      <div class="form-row">
        <label>Medical Notes</label>
        <textarea id="notes">Patient is under continuous monitoring.</textarea>
      </div>
    </div>

    <div class="card">
      <div class="card-title">
        <span class="material-symbols-rounded">summarize</span>
        Summary
      </div>

      <div class="info-list">
        <div class="info-item">
          <div class="info-label">Name</div>
          <div class="info-value" id="summaryName">Admin User</div>
        </div>

        <div class="info-item">
          <div class="info-label">Role</div>
          <div class="info-value" id="summaryRole">Smart Medicine Operator</div>
        </div>

        <div class="info-item">
          <div class="info-label">Patient</div>
          <div class="info-value" id="summaryPatient">PT-00142</div>
        </div>

        <div class="info-item">
          <div class="info-label">Ward</div>
          <div class="info-value" id="summaryWard">ICU-4B</div>
        </div>
      </div>
    </div>

  </div>

  <div class="btn-row">
    <button class="btn" onclick="saveProfile()">Save Profile</button>
    <button class="btn secondary" onclick="resetProfile()">Reset</button>
    <button class="btn secondary" onclick="window.location.href='<?php echo $dashboardUrl; ?>'">Back to Dashboard</button>
    <button class="btn secondary" onclick="window.location.href='<?php echo $settingUrl; ?>'">Go to Settings</button>
  </div>

  <div class="notice" id="notice">Profile saved successfully.</div>

</main>

<script>
function collectProfile(){
  return {
    fullName: document.getElementById('fullName').value,
    role: document.getElementById('role').value,
    email: document.getElementById('email').value,
    phone: document.getElementById('phone').value,
    patientId: document.getElementById('patientId').value,
    wardBed: document.getElementById('wardBed').value,
    bloodGroup: document.getElementById('bloodGroup').value,
    notes: document.getElementById('notes').value
  };
}

function applyProfile(p){
  document.getElementById('fullName').value = p.fullName || 'Admin User';
  document.getElementById('role').value = p.role || 'Smart Medicine Operator';
  document.getElementById('email').value = p.email || 'admin@medipulse.local';
  document.getElementById('phone').value = p.phone || '+880 1XXXXXXXXX';
  document.getElementById('patientId').value = p.patientId || 'PT-00142';
  document.getElementById('wardBed').value = p.wardBed || 'ICU-4B';
  document.getElementById('bloodGroup').value = p.bloodGroup || 'A+';
  document.getElementById('notes').value = p.notes || 'Patient is under continuous monitoring.';

  document.getElementById('displayName').textContent = p.fullName || 'Admin User';
  document.getElementById('displayRole').textContent = p.role || 'Smart Medicine Operator';
  document.getElementById('summaryName').textContent = p.fullName || 'Admin User';
  document.getElementById('summaryRole').textContent = p.role || 'Smart Medicine Operator';
  document.getElementById('summaryPatient').textContent = p.patientId || 'PT-00142';
  document.getElementById('summaryWard').textContent = p.wardBed || 'ICU-4B';
}

function saveProfile(){
  const profile = collectProfile();

  localStorage.setItem('medipulse_profile', JSON.stringify(profile));
  applyProfile(profile);

  const notice = document.getElementById('notice');
  notice.style.display = 'block';
  notice.textContent = 'Profile saved successfully.';
}

function loadProfile(){
  const saved = localStorage.getItem('medipulse_profile');

  if(saved){
    applyProfile(JSON.parse(saved));
  } else {
    applyProfile(collectProfile());
  }
}

function resetProfile(){
  localStorage.removeItem('medipulse_profile');
  location.reload();
}

document.querySelectorAll('input, select, textarea').forEach(el => {
  el.addEventListener('input', () => applyProfile(collectProfile()));
});

loadProfile();
</script>

</body>
</html>