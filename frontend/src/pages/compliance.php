<?php $pageTitle = 'Property Compliance – Resource Housing'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="/public/assets/css/style.css">
  <link rel="stylesheet" href="/public/assets/css/variables.css">
  <link rel="stylesheet" href="/public/assets/css/main.css">
  <link rel="icon" type="image/png" href="/public/assets/images/logo.png">
</head>
<body class="bg-white">

<?php require __DIR__ . '/includes/header.php'; ?>

<main>

<!-- ===== HERO SECTION ===== -->
<section class="hero-bleed" style="position:relative; width:100%; min-height:580px; display:flex; align-items:center; overflow:hidden;">

  <!-- Background image -->
  <img src="/public/assets/images/uk-houses/uk-4.jpg" alt="Property Compliance"
       style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; object-position:center; display:block;">

  <!-- Dark overlay -->
  <div style="position:absolute; inset:0; background:rgba(0,0,0,0.70);"></div>

  <!-- Content -->
  <div class="max-w-screen-xl mx-auto px-8 md:px-16" style="position:relative; z-index:1; width:100%;">
    <div style="max-width:700px;">
      <h1 style="font-family:'Abhaya Libre',serif; font-size:4.2rem; font-weight:700; color:#ffffff; line-height:1.15; margin:0 0 24px;">
        Stay Compliant.<br>Stay Protected.
      </h1>
      <p style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:rgba(255,255,255,0.82); line-height:1.75; margin:0; max-width:580px;">
        We provide reliable, end-to-end compliance services to ensure your property meets safety regulations, protects occupants, and avoids costly risks. From inspections to certifications, we've got every detail covered.
      </p>
    </div>
  </div>

</section>

<!-- ===== HOW DOES COMPLIANCE WORK ===== -->
<section class="w-full py-24 bg-white">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">
    <div style="display:flex; align-items:center; gap:80px;">

      <!-- Left: text -->
      <div style="flex:1; min-width:0;">
        <h2 style="font-family:'Abhaya Libre',serif; font-size:4rem; font-weight:700; line-height:1.15; margin:0 0 32px;">
          <span style="color:#111111;">How Does</span><br>
          <span style="color:var(--brand-primary);">Compliance Work?</span>
        </h2>
        <p style="font-family:'Abhaya Libre',serif; font-size:1.1rem; color:#444444; line-height:1.8; margin:0;">
          If you're managing a property, staying compliant with safety regulations can feel overwhelming. That's where we step in. Our team ensures your property meets all required standards through reliable inspections, certifications, and ongoing maintenance support.<br>
          We handle everything from fire safety and electrical testing to health risk assessments and property upkeep—so you can focus on managing your investment with confidence. Whether it's a single property or a full portfolio, we make compliance simple, efficient, and stress-free.
        </p>
      </div>

      <!-- Right: image -->
      <div style="flex:0 0 500px;">
        <img src="/public/assets/images/uk-houses/uk-5.jpg" alt="Property Compliance"
             style="width:100%; height:500px; object-fit:cover; display:block;">
      </div>

    </div>
  </div>
</section>

<!-- ===== COMPLIANCE SERVICES SECTION ===== -->
<?php
$complianceServices = [
  [
    'title' => 'Fire risk assessments',
    'body'  => 'Identify potential fire hazards and ensure your property meets all legal safety requirements. Our thorough assessments help you minimize risk and protect lives.',
    'img'   => '/public/assets/images/compilance-services/fire.png',
  ],
  [
    'title' => 'Asbestos management survey reports',
    'body'  => 'Detect and manage asbestos safely with detailed surveys and clear reports. We help you stay compliant while safeguarding occupants and workers.',
    'img'   => '/public/assets/images/compilance-services/asbestos.png',
  ],
  [
    'title' => 'Damp survey',
    'body'  => 'Uncover hidden moisture issues before they become costly problems. Our damp surveys help maintain structural integrity and healthy living conditions.',
    'img'   => '/public/assets/images/compilance-services/damp.png',
  ],
  [
    'title' => 'Legionella',
    'body'  => 'Protect water systems from harmful bacteria. We assess, monitor, and guide you on controlling Legionella risks to meet health regulations.',
    'img'   => '/public/assets/images/compilance-services/legionella.png',
  ],
  [
    'title' => 'Pat testing',
    'body'  => 'Ensure all electrical appliances are safe to use. Our PAT testing service reduces electrical hazards and keeps your property compliant.',
    'img'   => '/public/assets/images/compilance-services/pat.png',
  ],
  [
    'title' => 'Fire detection certificate',
    'body'  => 'Verify that your fire detection systems are fully functional and compliant with safety standards through professional inspection and certification.',
    'img'   => '/public/assets/images/compilance-services/firedetection.png',
  ],
  [
    'title' => 'Emergency lighting certificate',
    'body'  => 'Ensure emergency lighting systems are operational and ready when needed. We test and certify your systems for full compliance and safety.',
    'img'   => '/public/assets/images/compilance-services/emergency-light.png',
  ],
  [
    'title' => 'Property Maintenance',
    'body'  => 'Keep your property in top condition with ongoing maintenance services. We handle repairs, inspections, and upkeep to ensure long-term compliance.',
    'img'   => '/public/assets/images/compilance-services/propertymaintenance.png',
  ],
];
?>
<section class="w-full py-24" style="background:var(--brand-primary);">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">

    <!-- Heading block -->
    <div style="text-align:center; margin-bottom:56px;">
      <h2 style="font-family:'Abhaya Libre',serif; font-size:3.6rem; font-weight:700; color:#ffffff; margin:0 0 20px; line-height:1.2;">
        Compliance Services You Can Trust
      </h2>
      <p style="font-family:'Abhaya Libre',serif; font-size:1.1rem; color:rgba(255,255,255,0.78); line-height:1.75; margin:0 auto; max-width:640px;">
        Comprehensive safety checks, certifications, and maintenance solutions to keep your property fully compliant, secure, and operating without risk or disruption.
      </p>
    </div>

    <!-- Cards grid -->
    <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:16px;">
      <?php foreach ($complianceServices as $s): ?>
      <div class="compliance-card" style="background:#ffffff; display:flex; flex-direction:column;">
        <div style="padding-top:3px;">
          <img src="<?= $s['img'] ?>" alt="<?= htmlspecialchars($s['title']) ?>"
               style="width:100%; height:200px; object-fit:cover; display:block;">
        </div>
        <div style="padding:22px 22px 28px; flex:1;">
          <h3 style="font-family:'Abhaya Libre',serif; font-size:1.1rem; font-weight:700; color:#111111; margin:0 0 12px; line-height:1.4;">
            <?= htmlspecialchars($s['title']) ?>
          </h3>
          <p style="font-family:'Abhaya Libre',serif; font-size:0.92rem; color:#555555; line-height:1.75; margin:0;">
            <?= htmlspecialchars($s['body']) ?>
          </p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<style>
  .compliance-card { transition: background 0.25s ease; cursor: pointer; }
  .compliance-card:hover { background: var(--brand-primary) !important; }
  .compliance-card:hover h3 { color: #ffffff !important; }
  .compliance-card:hover p  { color: #ffffff !important; }

  @media (max-width: 767px) {
    /* Shrink hero */
    section[style*="min-height:580px"] { min-height:280px !important; }
    h1[style*="font-size:4.2rem"] { font-size:2rem !important; }
    /* How it works: stack */
    div[style*="display:flex; align-items:center; gap:80px"] { flex-direction:column !important; gap:24px !important; }
    div[style*="flex:0 0 500px"] { flex:unset !important; width:100% !important; }
    img[style*="height:500px"] { height:220px !important; }
    h2[style*="font-size:4rem"] { font-size:2rem !important; }
    /* Services grid: 2 columns */
    div[style*="grid-template-columns:repeat(4,1fr)"] { grid-template-columns:1fr 1fr !important; }
    h2[style*="font-size:3.6rem"] { font-size:1.8rem !important; }
  }
</style>

</main>

<?php require __DIR__ . '/includes/becomeTenants.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
