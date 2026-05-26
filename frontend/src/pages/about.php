<?php $pageTitle = 'About Us – Resource Housing'; ?>
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

<!-- ===== SECTION 1: ABOUT INTRO ===== -->
<section class="w-full py-20 bg-white">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">
    <div style="display:flex; align-items:flex-start; gap:60px;">

      <!-- Left: heading + text + image -->
      <div style="flex:1; min-width:0;">
        <h1 style="font-family:'Abhaya Libre',serif; font-size:5rem; font-weight:700; line-height:1.15; margin:0 0 24px;">
          <span style="color:#111111;">About </span><span style="color:var(--brand-primary);">Resource<br>Housing Ltd.</span>
        </h1>
        <p style="font-family:'Abhaya Libre',serif; font-size:1.05rem; color:#555555; line-height:1.8; margin:0 0 32px; max-width:580px;">
          Resource Housing is a Managing Agent and accommodation provider. With a strong presence in the local market, and an increasing presence internationally, we specialise in three key categories: HMOs (House in Multiple Occupation), property developments and sales management.
        </p>
        <img src="/public/assets/images/uk-houses/uk-1.jpg" alt="Resource Housing Property"
             style="width:100%; height:260px; object-fit:cover; display:block;">
      </div>

      <!-- Right: single image -->
      <div style="flex:0 0 380px; align-self:flex-end;">
        <img src="/public/assets/images/uk-houses/uk-14.png" alt="Resource Housing"
             style="width:100%; height:100%; min-height:480px; object-fit:cover; display:block;">
      </div>

    </div>
  </div>
</section>

<!-- ===== SECTION 2: WHY CHOOSE ===== -->
<section class="w-full py-20 bg-white">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">

    <h2 style="font-family:'Abhaya Libre',serif; font-size:3.2rem; font-weight:800; text-align:center; margin:0 0 36px; line-height:1.2;">
      <span style="color:#111111;">Why Choose </span><span style="color:var(--brand-primary);">Resource Housing?</span>
    </h2>

    <p style="font-family:'Abhaya Libre',serif; font-size:1.05rem; color:#555555; line-height:1.85; margin:0 0 4px; text-align:center;">
      Since January 2020, Resource Housing has been a trusted provider of HMO / Supported Accommodation, Serviced Accommodation, and Transitional Housing. We specialise in creating safe, comfortable, and well-managed homes for individuals, while providing landlords with professional property management that maximises their investment.
    </p>
    <p style="font-family:'Abhaya Libre',serif; font-size:1.05rem; color:#555555; line-height:1.85; margin:0 0 48px; text-align:center;">
      With deep knowledge of property market and an expanding presence, we deliver tailored solutions that benefit both landlords and tenants. From expert HMO management to serviced accommodation nationwide and Transitional Housing for individuals, Resource Housing combines professionalism, care, and results-driven service. Choose Resource Housing for a partner who creates thriving homes, supports landlords, and expands innovative accommodation services.
    </p>

    <img src="/public/assets/images/uk-houses/uk-9.jpg" alt="Resource Housing"
         style="width:100%; height:380px; object-fit:cover; display:block;">

  </div>
</section>

<!-- ===== SECTION 3: COMPLIANCE SERVICES ===== -->
<?php
$aboutServices = [
  'Fire risk assessments',
  'Asbestos management survey reports',
  'Damp survey',
  'Legionella',
  'Pat testing',
  'Fire detection certificate',
  'Emergency lighting certificate',
  'Property Maintenance',
];
?>
<section class="w-full py-12 bg-white">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">

    <!-- Teal inset container -->
    <div style="position:relative; overflow:hidden; background:var(--brand-primary); padding:64px 64px 72px;">

      <!-- Faint bg image -->
      <img src="/public/assets/images/home-center2.jpg" alt="" aria-hidden="true"
           style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; opacity:0.15; pointer-events:none;">

      <div style="position:relative; z-index:1;">

        <p style="font-family:'Abhaya Libre',serif; font-size:2rem; font-weight:700; color:#ffffff; text-align:center; line-height:1.45; margin:0 auto 52px; max-width:640px;">
          We provide HMO rooms to general public 18<br>and over with our compliances services
        </p>

        <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:14px;">
          <?php foreach ($aboutServices as $svc): ?>
          <div class="about-svc-card" style="background:#ffffff; padding:22px 20px; display:flex; align-items:center; gap:14px; transition:background 0.25s ease; cursor:pointer;">
            <span style="flex-shrink:0; width:32px; height:32px; border-radius:50%; background:var(--brand-primary); display:flex; align-items:center; justify-content:center;">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 7h10M8 3l4 4-4 4" stroke="#ffffff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
            <span style="font-family:'Abhaya Libre',serif; font-size:0.95rem; color:#111111; line-height:1.4;">
              <?= htmlspecialchars($svc) ?>
            </span>
          </div>
          <?php endforeach; ?>
        </div>

      </div>
    </div>

  </div>
</section>

</main>

<?php require __DIR__ . '/includes/becomeTenants.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>

<style>
  .about-svc-card:hover { background: var(--brand-primary) !important; }
  .about-svc-card:hover span:last-child { color: #ffffff !important; }
</style>

</body>
</html>
