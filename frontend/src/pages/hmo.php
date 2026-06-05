<?php $pageTitle = 'Co-living – Resource Housing'; ?>
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
  <img src="/public/assets/images/uk-houses/uk-3.jpg" alt="HMO Property"
       style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; object-position:center; display:block;">

  <!-- Dark overlay -->
  <div style="position:absolute; inset:0; background:rgba(0,0,0,0.70);"></div>

  <!-- Content -->
  <div class="max-w-screen-xl mx-auto px-8 md:px-16" style="position:relative; z-index:1; width:100%;">
    <div style="max-width:680px;">
      <h1 class="hero-anim-left hero-d1" style="font-family:'Abhaya Libre',serif; font-size:4.2rem; font-weight:700; color:#ffffff; line-height:1.15; margin:0 0 24px;">
        House In Multiple<br>Occupation (Co-living)
      </h1>
      <p class="hero-anim-left hero-d2" style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:rgba(255,255,255,0.82); line-height:1.75; margin:0; max-width:560px;">
        At Resource Housing, we specialise in providing high-quality House In Multiple Occupation (Co-living) properties. Here's what you need to know about our Co-living services.
      </p>
    </div>
  </div>

</section>

<!-- ===== HMO FEATURES SECTION ===== -->
<?php
$hmoFeatures = [
  [
    'title' => 'Diverse Co-living Properties',
    'body'  => 'Our portfolio includes a wide range of House In Multiple Occupation properties, from spacious houses to comfortable shared flats. We understand the unique needs of our tenants and offer suitable accommodation options.',
  ],
  [
    'title' => 'Compliance & Safety',
    'body'  => 'Your safety is our top priority. All our House In Multiple Occupation properties meet or exceed local regulations and licensing requirements. We invest in fire safety measures, annual gas safety checks, and electrical safety certifications to ensure your peace of mind.',
  ],
  [
    'title' => 'Professional Management',
    'body'  => 'Managing a House In Multiple Occupation property can be complex, but we\'ve got it covered. Our dedicated property management team handles all aspects, from maintenance of common areas to resolving tenant concerns. We make your Co-living experience hassle-free.',
  ],
  [
    'title' => 'Supportive Environment',
    'body'  => 'We believe in fostering a supportive and inclusive environment in our House In Multiple Occupation properties. We encourage positive tenant interactions and provide a comfortable living space for all residents.',
  ],
  [
    'title' => 'Convenient Locations',
    'body'  => 'Our House In Multiple Occupation properties are strategically located near essential amenities, transportation links, and educational institutions, making your daily life more convenient.',
  ],
];
?>
<section class="w-full py-20" style="background:#F8FAFC;">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">

    <?php
    $rows = [array_slice($hmoFeatures, 0, 3), array_slice($hmoFeatures, 3)];
    foreach ($rows as $ri => $row): ?>

    <!-- grid-template-columns: 1fr 1px 1fr 1px 1fr | grid-template-rows: heading | body -->
    <div data-animate="fade-up" data-animate-delay="<?= $ri * 150 ?>" style="display:grid; grid-template-columns:1fr 1px 1fr 1px 1fr; grid-template-rows:auto auto;">

      <?php foreach ($row as $col => $f):
        $gcol  = $col * 2 + 1;
        $padL  = $col === 0 ? '0' : '48px';
        $padR  = $col === 2 ? '0' : '48px';
      ?>

        <?php if ($col > 0): ?>
        <!-- vertical separator spanning both rows -->
        <div style="grid-column:<?= $col * 2 ?>; grid-row:1/3; background:#d0d8d8; margin:40px 0;"></div>
        <?php endif; ?>

        <!-- heading -->
        <div style="grid-column:<?= $gcol ?>; grid-row:1; padding:48px <?= $padR ?> 16px <?= $padL ?>;">
          <h3 style="font-family:'Abhaya Libre',serif; font-size:1.35rem; font-weight:700; color:#111111; margin:0; white-space:nowrap; padding-left:48px;">
            <?= htmlspecialchars($f['title']) ?>
          </h3>
        </div>

        <!-- body -->
        <div style="grid-column:<?= $gcol ?>; grid-row:2; padding:0 <?= $padR ?> 48px <?= $padL ?>;">
          <div style="display:flex; align-items:flex-start; gap:16px;">
            <svg width="32" height="32" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0; margin-top:50px;">
              <circle cx="18" cy="18" r="18" fill="var(--brand-primary)"/>
              <path d="M11 18l5 5 9-9" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p style="font-family:'Abhaya Libre',serif; font-size:1rem; color:#444444; line-height:1.75; margin:0;">
              <?= htmlspecialchars($f['body']) ?>
            </p>
          </div>
        </div>

      <?php endforeach; ?>

    </div>

    <?php endforeach; ?>

  </div>
</section>

<!-- ===== SUPPORTED ACCOMMODATION SECTION ===== -->
<?php
$suppFeatures = [
  [
    'title' => 'Tailored Support',
    'body'  => 'Personalised care for every resident\'s unique needs. Support for disabilities, mental health, or transitional housing',
  ],
  [
    'title' => 'Regulatory Compliance',
    'body'  => 'Fully compliant with housing and care standards. Safety and quality at the heart of every property',
  ],
  [
    'title' => 'Diverse Housing Options',
    'body'  => 'Houses, flats, and self-contained units. Flexible spaces designed for comfort and independence',
  ],
  [
    'title' => 'Community Partnerships',
    'body'  => 'Working with local authorities and organisations. Delivering meaningful support through collaboration',
  ],
  [
    'title' => 'Comprehensive Services',
    'body'  => 'Access to counselling, life skills, and healthcare. Empowering residents toward stability and independence',
  ],
  [
    'title' => 'Our Mission',
    'body'  => 'Helping individuals build brighter, independent futures. Creating safe, supportive environments for all',
  ],
];
?>
<section class="w-full py-24" style="background:var(--brand-primary);">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">

    <!-- Heading -->
    <h2 data-animate="fade-up" style="font-family:'Abhaya Libre',serif; font-size:3.8rem; font-weight:700; color:#ffffff; text-align:center; margin:0 0 20px;">
      Supported Accommodation
    </h2>
    <p data-animate="fade-up" data-animate-delay="100" style="font-family:'Abhaya Libre',serif; font-size:1.1rem; color:rgba(255,255,255,0.78); text-align:center; line-height:1.75; margin:0 auto 64px; max-width:700px;">
      Resource Housing also offers supported accommodation services designed to provide additional support to individuals with specific needs or vulnerabilities. Here's what you can expect from our supported accommodation:
    </p>

    <!-- Feature rows -->
    <?php $suppRows = [array_slice($suppFeatures, 0, 3), array_slice($suppFeatures, 3)];
    foreach ($suppRows as $ri => $row): ?>

    <div data-animate="fade-up" data-animate-delay="<?= $ri * 150 ?>" style="display:grid; grid-template-columns:1fr 1px 1fr 1px 1fr; grid-template-rows:auto auto; <?= $ri === 1 ? 'margin-top:48px;' : '' ?>">

      <?php foreach ($row as $col => $f):
        $gcol = $col * 2 + 1;
        $padL = $col === 0 ? '0' : '48px';
        $padR = $col === 2 ? '0' : '48px';
      ?>

        <?php if ($col > 0): ?>
        <div style="grid-column:<?= $col * 2 ?>; grid-row:1/3; background:rgba(255,255,255,0.2); margin:20px 0;"></div>
        <?php endif; ?>

        <!-- heading -->
        <div style="grid-column:<?= $gcol ?>; grid-row:1; padding:0 <?= $padR ?> 16px <?= $padL ?>;">
          <h3 style="font-family:'Abhaya Libre',serif; font-size:1.35rem; font-weight:700; color:#ffffff; margin:0; white-space:nowrap; padding-left:48px;">
            <?= htmlspecialchars($f['title']) ?>
          </h3>
        </div>

        <!-- body -->
        <div style="grid-column:<?= $gcol ?>; grid-row:2; padding:0 <?= $padR ?> 0 <?= $padL ?>;">
          <div style="display:flex; align-items:flex-start; gap:16px;">
            <svg width="32" height="32" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0; margin-top:6px;">
              <circle cx="18" cy="18" r="18" fill="#ffffff"/>
              <path d="M11 18l5 5 9-9" stroke="var(--brand-primary)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p style="font-family:'Abhaya Libre',serif; font-size:1rem; color:rgba(255,255,255,0.82); line-height:1.75; margin:0;">
              <?= htmlspecialchars($f['body']) ?>
            </p>
          </div>
        </div>

      <?php endforeach; ?>
    </div>

    <?php endforeach; ?>

    <!-- Bottom closing text -->
    <p data-animate="fade-up" style="font-family:'Abhaya Libre',serif; font-size:1rem; color:rgba(255,255,255,0.75); text-align:center; line-height:1.8; margin:64px auto 0; max-width:820px;">
      At Resource Housing, We Are Dedicated To Providing Safe, Comfortable, And Supportive Living Environments For All Our Tenants. Whether They Are Seeking A House In Multiple Occupation Property Or Supported Accommodation. Your Well-Being And Satisfaction Are Our Top Priorities.
    </p>

  </div>
</section>

</main>

<?php require __DIR__ . '/includes/becomeTenants.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>

<style>
  @media (max-width: 767px) {
    /* Shrink hero */
    section[style*="min-height:580px"] { min-height:300px !important; }
    h1[style*="font-size:4.2rem"] { font-size:2rem !important; }
    /* Features: hide desktop grid, show as single column list */
    div[style*="grid-template-columns:1fr 1px 1fr 1px 1fr"] { display:flex !important; flex-direction:column !important; }
    div[style*="grid-column"][style*="grid-row:1"] { padding:16px 0 4px !important; }
    div[style*="grid-column"][style*="grid-row:2"] { padding:0 0 20px !important; border-bottom:1px solid rgba(255,255,255,0.15); }
    div[style*="background:#d0d8d8; margin:40px 0"] { display:none !important; }
    div[style*="background:rgba(255,255,255,0.2); margin:20px 0"] { display:none !important; }
    /* Shrink supported accommodation heading */
    h2[style*="font-size:3.8rem"] { font-size:2rem !important; }
    /* Remove nowrap on headings */
    h3[style*="white-space:nowrap"] { white-space:normal !important; padding-left:0 !important; }
  }
</style>

</body>
</html>
