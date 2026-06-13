<?php
// meds.php — Medication Management | MediPulse · Material You

$settingUrl = "http://localhost/smart_medicine/setting.php";
$profileUrl = "http://localhost/smart_medicine/profile.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Medications — MediPulse</title>

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

/* Today stats */
.today-bar{
  background:linear-gradient(135deg,#006875,#4A6267);
  border-radius:var(--shape-xl);
  padding:24px 28px;
  margin-bottom:24px;
  display:flex;
  align-items:center;
  justify-content:space-between;
  flex-wrap:wrap;
  gap:16px;
  color:#fff;
  box-shadow:var(--md-elev-2);
  animation:cardIn .35s cubic-bezier(.34,1.1,.64,1) both;
}

.today-left h2{
  font-family:'Google Sans Display',sans-serif;
  font-size:22px;
  font-weight:700;
  margin-bottom:4px;
}

.today-left p{
  font-size:13px;
  opacity:.85;
}

.today-pills{
  display:flex;
  gap:12px;
  flex-wrap:wrap;
}

.today-pill{
  background:rgba(255,255,255,.18);
  border-radius:var(--shape-full);
  padding:8px 18px;
  font-size:13px;
  font-weight:600;
  display:flex;
  align-items:center;
  gap:7px;
}

.today-pill .material-symbols-rounded{
  font-size:16px;
}

/* Med schedule grid */
.med-grid{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
  gap:16px;
  margin-bottom:28px;
}

.med-card{
  background:var(--md-surface-container-lowest);
  border-radius:var(--shape-xl);
  box-shadow:var(--md-elev-1);
  overflow:hidden;
  transition:box-shadow .25s,transform .25s;
  animation:cardIn .35s cubic-bezier(.34,1.1,.64,1) both;
}

.med-card:hover{
  box-shadow:var(--md-elev-3);
  transform:translateY(-2px);
}

.med-card:nth-child(1){animation-delay:.05s;}
.med-card:nth-child(2){animation-delay:.10s;}
.med-card:nth-child(3){animation-delay:.15s;}
.med-card:nth-child(4){animation-delay:.20s;}
.med-card:nth-child(5){animation-delay:.25s;}
.med-card:nth-child(6){animation-delay:.30s;}

.med-header{
  padding:18px 20px 14px;
  display:flex;
  align-items:center;
  gap:14px;
  border-bottom:1px solid var(--md-outline-variant);
}

.med-icon{
  width:46px;
  height:46px;
  border-radius:var(--shape-md);
  display:grid;
  place-items:center;
  flex-shrink:0;
}

.med-icon .material-symbols-rounded{
  font-size:22px;
}

.med-name{
  font-family:'Google Sans Display',sans-serif;
  font-size:16px;
  font-weight:700;
  color:var(--md-on-surface);
}

.med-type{
  font-size:12px;
  color:var(--md-outline);
  margin-top:1px;
}

.med-body{
  padding:14px 20px;
}

.med-row{
  display:flex;
  justify-content:space-between;
  align-items:center;
  padding:6px 0;
  border-bottom:1px solid var(--md-outline-variant);
}

.med-row:last-child{
  border-bottom:none;
}

.med-row-label{
  font-size:12px;
  color:var(--md-on-surface-variant);
  font-weight:500;
  display:flex;
  align-items:center;
  gap:6px;
}

.med-row-label .material-symbols-rounded{
  font-size:15px;
  color:var(--md-outline);
}

.med-row-val{
  font-family:'Google Sans Mono',monospace;
  font-size:13px;
  font-weight:600;
  color:var(--md-on-surface);
}

.med-footer{
  padding:12px 20px;
  background:var(--md-surface-container-low);
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:10px;
}

.confirm-btn{
  display:inline-flex;
  align-items:center;
  gap:6px;
  padding:8px 18px;
  border-radius:var(--shape-full);
  border:none;
  font-family:'Google Sans',sans-serif;
  font-size:13px;
  font-weight:600;
  cursor:pointer;
  transition:all .2s;
}

.confirm-btn.pending{
  background:var(--md-primary);
  color:#fff;
}

.confirm-btn.pending:hover{
  filter:brightness(.9);
}

.confirm-btn.done{
  background:var(--md-success-container);
  color:var(--md-on-success-container);
  cursor:default;
}

.confirm-btn .material-symbols-rounded{
  font-size:16px;
}

.next-dose{
  font-size:11px;
  color:var(--md-outline);
  letter-spacing:.3px;
}

/* Saline tracker */
.saline-surface{
  background:var(--md-surface-container-lowest);
  border-radius:var(--shape-xl);
  box-shadow:var(--md-elev-1);
  padding:24px;
  margin-bottom:20px;
  animation:cardIn .35s .3s cubic-bezier(.34,1.1,.64,1) both;
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

.saline-grid{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
  gap:16px;
}

.saline-bag{
  background:var(--md-surface-container-low);
  border-radius:20px;
  padding:18px;
  text-align:center;
}

.bag-label{
  font-size:11px;
  font-weight:700;
  letter-spacing:1px;
  text-transform:uppercase;
  color:var(--md-outline);
  margin-bottom:12px;
}

.bag-visual{
  width:64px;
  height:80px;
  margin:0 auto 12px;
  position:relative;
}

.bag-outer{
  width:100%;
  height:100%;
  border-radius:12px 12px 20px 20px;
  border:2.5px solid var(--md-primary);
  position:relative;
  overflow:hidden;
  background:#fff;
}

.bag-fill{
  position:absolute;
  bottom:0;
  left:0;
  right:0;
  background:var(--md-primary-container);
  border-radius:0 0 18px 18px;
  transition:height 1.2s cubic-bezier(.34,1.1,.64,1);
}

.bag-pct{
  position:absolute;
  inset:0;
  display:grid;
  place-items:center;
  font-family:'Google Sans Display',sans-serif;
  font-size:15px;
  font-weight:700;
  color:var(--md-primary);
}

.bag-info{
  font-size:13px;
  font-weight:600;
  color:var(--md-on-surface);
}

.bag-sub{
  font-size:11px;
  color:var(--md-outline);
  margin-top:3px;
}

.bag-status-chip{
  display:inline-block;
  margin-top:10px;
  padding:4px 12px;
  border-radius:var(--shape-full);
  font-size:11px;
  font-weight:700;
  letter-spacing:.8px;
  text-transform:uppercase;
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
  .today-bar{flex-direction:column;}
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

    <a class="nav-item active ripple" href="meds.php" style="margin-top:8px">
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

  <button class="nav-fab ripple">
    <span class="material-symbols-rounded">add</span>
  </button>
</nav>

<div class="main">

  <header class="top-app-bar">
    <span class="top-bar-title"><strong>MediPulse</strong> — Medications</span>

    <div class="top-bar-right">
      <button class="icon-btn ripple" onclick="downloadMedicationCSV()" title="Download Medication Report">
        <span class="material-symbols-rounded">print</span>
      </button>

      <button class="icon-btn ripple" onclick="window.location.href='<?php echo $settingUrl; ?>'" title="Settings">
        <span class="material-symbols-rounded">settings</span>
      </button>

      <a class="avatar ripple" href="<?php echo $profileUrl; ?>" title="Profile">
        <span class="material-symbols-rounded">person</span>
      </a>
    </div>
  </header>

  <div class="page-body">

    <div class="today-bar">
      <div class="today-left">
        <h2>Today's Medication Schedule</h2>
        <p id="today-date">Loading date…</p>
      </div>

      <div class="today-pills">
        <div class="today-pill">
          <span class="material-symbols-rounded">check_circle</span>
          <span id="given-count">0</span> Given
        </div>

        <div class="today-pill">
          <span class="material-symbols-rounded">schedule</span>
          <span id="pending-count">0</span> Pending
        </div>

        <div class="today-pill">
          <span class="material-symbols-rounded">medication</span>
          6 Total
        </div>
      </div>
    </div>

    <div class="section-eyebrow">
      <span class="material-symbols-rounded" style="font-size:14px">medication</span>
      Prescribed Medications
    </div>

    <div class="med-grid" id="medGrid">

      <?php
      $meds = [
        ['name'=>'Paracetamol','type'=>'Tablet · Oral','dose'=>'500 mg','freq'=>'Every 8 hrs','route'=>'Oral','time'=>'08:00 AM','icon'=>'pill','color'=>'#006875','bg'=>'#97F0FF','fg'=>'#001F24'],
        ['name'=>'Amoxicillin','type'=>'Capsule · Oral','dose'=>'250 mg','freq'=>'Every 12 hrs','route'=>'Oral','time'=>'09:00 AM','icon'=>'capsules','color'=>'#BA1A1A','bg'=>'#FFDAD6','fg'=>'#410002'],
        ['name'=>'Saline 0.9%','type'=>'IV Infusion','dose'=>'500 mL','freq'=>'Continuous','route'=>'IV','time'=>'Ongoing','icon'=>'water_drop','color'=>'#525E7D','bg'=>'#DAE2FF','fg'=>'#0D1B37'],
        ['name'=>'Metformin','type'=>'Tablet · Oral','dose'=>'850 mg','freq'=>'Twice daily','route'=>'Oral','time'=>'01:00 PM','icon'=>'pill','color'=>'#4A6267','bg'=>'#CCE8EF','fg'=>'#051F23'],
        ['name'=>'Ondansetron','type'=>'Injection · IV','dose'=>'4 mg','freq'=>'As needed','route'=>'IV Push','time'=>'PRN','icon'=>'syringe','color'=>'#7D5700','bg'=>'#FFDEA0','fg'=>'#261900'],
        ['name'=>'Vitamin C','type'=>'Tablet · Oral','dose'=>'1000 mg','freq'=>'Once daily','route'=>'Oral','time'=>'07:00 AM','icon'=>'nutrition','color'=>'#1B6B34','bg'=>'#A6F4B8','fg'=>'#002111'],
      ];

      foreach($meds as $i=>$m):
      ?>

      <div class="med-card">
        <div class="med-header">
          <div class="med-icon" style="background:<?= $m['bg'] ?>">
            <span class="material-symbols-rounded" style="color:<?= $m['fg'] ?>">
              <?= $m['icon'] ?>
            </span>
          </div>

          <div>
            <div class="med-name"><?= $m['name'] ?></div>
            <div class="med-type"><?= $m['type'] ?></div>
          </div>
        </div>

        <div class="med-body">
          <div class="med-row">
            <span class="med-row-label">
              <span class="material-symbols-rounded">scale</span>
              Dosage
            </span>
            <span class="med-row-val"><?= $m['dose'] ?></span>
          </div>

          <div class="med-row">
            <span class="med-row-label">
              <span class="material-symbols-rounded">repeat</span>
              Frequency
            </span>
            <span class="med-row-val"><?= $m['freq'] ?></span>
          </div>

          <div class="med-row">
            <span class="med-row-label">
              <span class="material-symbols-rounded">arrow_forward</span>
              Route
            </span>
            <span class="med-row-val"><?= $m['route'] ?></span>
          </div>

          <div class="med-row">
            <span class="med-row-label">
              <span class="material-symbols-rounded">schedule</span>
              Next Dose
            </span>
            <span class="med-row-val" style="color:<?= $m['color'] ?>">
              <?= $m['time'] ?>
            </span>
          </div>
        </div>

        <div class="med-footer">
          <button class="confirm-btn pending ripple" onclick="confirmMed(this)" style="background:<?= $m['color'] ?>">
            <span class="material-symbols-rounded">check</span>
            Confirm Given
          </button>

          <span class="next-dose"><?= $m['time'] ?></span>
        </div>
      </div>

      <?php endforeach; ?>

    </div>

    <div class="section-eyebrow">
      <span class="material-symbols-rounded" style="font-size:14px">water_drop</span>
      IV Saline Bag Tracker
    </div>

    <div class="saline-surface">
      <div class="surface-header">
        <div>
          <div class="surface-title">Infusion Bag Status</div>
          <div class="surface-subtitle">Real-time weight-based monitoring</div>
        </div>

        <button class="tonal-btn">
          <span class="material-symbols-rounded">add</span>
          New Bag
        </button>
      </div>

      <div class="saline-grid" id="salineGrid">

        <div class="saline-bag">
          <div class="bag-label">Bag A · Right Arm</div>

          <div class="bag-visual">
            <div class="bag-outer">
              <div class="bag-fill" id="bagFillA" style="height:70%"></div>
              <div class="bag-pct" id="bagPctA">70%</div>
            </div>
          </div>

          <div class="bag-info" id="bagWeightA">350 g remaining</div>
          <div class="bag-sub">Started 06:00 AM</div>

          <span class="bag-status-chip" style="background:var(--md-primary-container);color:var(--md-on-primary-container)">
            Running
          </span>
        </div>

        <div class="saline-bag">
          <div class="bag-label">Bag B · Left Arm</div>

          <div class="bag-visual">
            <div class="bag-outer">
              <div class="bag-fill" id="bagFillB" style="height:25%"></div>
              <div class="bag-pct" id="bagPctB">25%</div>
            </div>
          </div>

          <div class="bag-info" id="bagWeightB">125 g remaining</div>
          <div class="bag-sub">Started 04:30 AM</div>

          <span class="bag-status-chip" style="background:var(--md-warning-container);color:var(--md-on-warning-container)">
            Low — Replace Soon
          </span>
        </div>

        <div class="saline-bag">
          <div class="bag-label">Bag C · Reserve</div>

          <div class="bag-visual">
            <div class="bag-outer">
              <div class="bag-fill" id="bagFillC" style="height:100%"></div>
              <div class="bag-pct" id="bagPctC">100%</div>
            </div>
          </div>

          <div class="bag-info">500 g · Full</div>
          <div class="bag-sub">Ready to use</div>

          <span class="bag-status-chip" style="background:var(--md-success-container);color:var(--md-on-success-container)">
            Standby
          </span>
        </div>

      </div>
    </div>

  </div>

  <div class="footer-bar">
    <p>
      <span class="material-symbols-rounded" style="font-size:14px;vertical-align:middle;margin-right:4px">ecg_heart</span>
      <strong>MediPulse</strong> — Medications
    </p>

    <p>Patient: <strong>PT-00142</strong> · Ward ICU-4B</p>
  </div>

</div>

<script>
let givenCount = 0;
let pendingCount = 6;

function updateCounts(){
  document.getElementById('given-count').textContent = givenCount;
  document.getElementById('pending-count').textContent = pendingCount;
}

function confirmMed(btn){
  if(btn.classList.contains('done')) return;

  btn.classList.remove('pending');
  btn.classList.add('done');
  btn.innerHTML = '<span class="material-symbols-rounded">done_all</span>Administered';
  btn.style.background = '';

  givenCount++;
  pendingCount--;

  updateCounts();
}

const now = new Date();

document.getElementById('today-date').textContent =
  now.toLocaleDateString('en-US', {
    weekday:'long',
    year:'numeric',
    month:'long',
    day:'numeric'
  });

updateCounts();

function updateSaline(){
  fetch('latest.php?page=vitals')
    .then(r => r.json())
    .then(data => {
      if(!Array.isArray(data) || !data.length) return;

      const w = Number(data[0].bag_weight || 0);
      const pctA = Math.min(Math.round((w / 500) * 100), 100);

      document.getElementById('bagFillA').style.height = pctA + '%';
      document.getElementById('bagPctA').textContent = pctA + '%';
      document.getElementById('bagWeightA').textContent = w + ' g remaining';
    })
    .catch(() => {});
}

function csvEscape(value){
  value = value === null || value === undefined ? '' : String(value);
  value = value.replace(/"/g, '""');
  return `"${value}"`;
}

function downloadMedicationCSV(){
  const rows = [];

  rows.push([
    'Medicine Name',
    'Type',
    'Dosage',
    'Frequency',
    'Route',
    'Next Dose',
    'Status'
  ]);

  document.querySelectorAll('.med-card').forEach(card => {
    const name = card.querySelector('.med-name')?.textContent.trim() || '';
    const type = card.querySelector('.med-type')?.textContent.trim() || '';

    const vals = [...card.querySelectorAll('.med-row-val')].map(v => v.textContent.trim());

    const dosage = vals[0] || '';
    const frequency = vals[1] || '';
    const route = vals[2] || '';
    const nextDose = vals[3] || '';

    const btn = card.querySelector('.confirm-btn');
    const status = btn?.classList.contains('done') ? 'Administered' : 'Pending';

    rows.push([
      name,
      type,
      dosage,
      frequency,
      route,
      nextDose,
      status
    ]);
  });

  rows.push([]);
  rows.push([
    'Saline Bag',
    'Weight / Status',
    'Percentage'
  ]);

  document.querySelectorAll('.saline-bag').forEach(bag => {
    const label = bag.querySelector('.bag-label')?.textContent.trim() || '';
    const info = bag.querySelector('.bag-info')?.textContent.trim() || '';
    const pct = bag.querySelector('.bag-pct')?.textContent.trim() || '';

    rows.push([
      label,
      info,
      pct
    ]);
  });

  const csvContent = rows.map(row => row.map(csvEscape).join(',')).join('\n');

  const blob = new Blob([csvContent], {
    type:'text/csv;charset=utf-8;'
  });

  const url = URL.createObjectURL(blob);
  const a = document.createElement('a');
  const date = new Date().toISOString().slice(0, 10);

  a.href = url;
  a.download = `medipulse_medications_${date}.csv`;

  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);

  URL.revokeObjectURL(url);
}

updateSaline();
setInterval(updateSaline, 2000);
</script>

</body>
</html>