<?php
$pageTitle = 'Property Detail – Resource Housing';
require __DIR__ . '/../data/properties.php';

$id  = (int)($_GET['id'] ?? 0);
$all = getProperties();

$property = null;
foreach ($all as $p) {
    if ($p['id'] === $id) { $property = $p; break; }
}
if (!$property) {
    header('Location: /src/pages/properties.php');
    exit;
}

$similar = array_values(array_filter($all, fn($p) => $p['id'] !== $id));

$rooms_available = $property['rooms_available'] ?? [
    'Sparkbrook','Balsall Heath','Hall Green','Yardley Wood',
    'Sparkhill','Moseley','Kings Heath','Winson Green',
];
$description = $property['description'] ??
    'We have ' . $property['bedrooms'] . ' rooms available in this ' . $property['bedrooms'] .
    ' bedroom #supportedaccommodation in ' . $property['area'] . ' ' . $property['location'] .
    '. As you can see it\'s a stunning large property with huge double rooms.';

$property_features = [
    'Fully furnished rooms with all essentials provided',
    'Professional cleaning service for communal areas',
    'All bills inclusive, including unlimited Fast WiFi',
    'Prime and desired locations',
];

$allUkImages = [
    '/public/assets/images/uk-houses/uk-1.jpg',
    '/public/assets/images/uk-houses/uk-2.jpg',
    '/public/assets/images/uk-houses/uk-3.jpg',
    '/public/assets/images/uk-houses/uk-4.jpg',
    '/public/assets/images/uk-houses/uk-5.jpg',
    '/public/assets/images/uk-houses/uk-6.jpg',
];
$thumbs = [$property['image']];
foreach ($allUkImages as $img) {
    if ($img !== $property['image'] && count($thumbs) < 4) $thumbs[] = $img;
}

$propertyId = 'H' . str_pad($property['id'], 3, '0', STR_PAD_LEFT);
$_navPage   = 'properties.php';
?>
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

<!-- ===== BREADCRUMB ===== -->
<section style="position:relative; width:100%; min-height:110px; display:flex; align-items:center; overflow:hidden;">
  <img src="<?= htmlspecialchars($property['image']) ?>" alt=""
       style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; object-position:center;">
  <div style="position:absolute; inset:0; background:rgba(0,0,0,0.72);"></div>
  <div class="max-w-screen-xl mx-auto px-8 md:px-16" style="position:relative; z-index:1; width:100%;">
    <nav style="display:flex; align-items:center; gap:8px; font-family:'Abhaya Libre',serif; font-size:0.92rem; color:rgba(255,255,255,0.72);">
      <a href="/src/pages/index.php" style="color:rgba(255,255,255,0.72); text-decoration:none;">Home</a>
      <span>›</span>
      <a href="/src/pages/properties.php" style="color:rgba(255,255,255,0.72); text-decoration:none;">Property Listing</a>
      <span>›</span>
      <span style="color:#ffffff;"><?= htmlspecialchars($property['title']) ?></span>
    </nav>
  </div>
</section>

<!-- ===== MAIN DETAIL ===== -->
<section class="w-full bg-white" style="padding:64px 0;">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">
    <div style="display:flex; gap:56px; align-items:flex-start;">

      <!-- LEFT: Gallery -->
      <div style="flex:0 0 420px;">
        <img id="mainImg" src="<?= htmlspecialchars($property['image']) ?>" alt="<?= htmlspecialchars($property['title']) ?>"
             style="width:100%; height:340px; object-fit:cover; display:block; margin-bottom:10px;">
        <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:8px;">
          <?php foreach ($thumbs as $i => $thumb): ?>
          <img src="<?= htmlspecialchars($thumb) ?>" alt="Gallery <?= $i+1 ?>"
               class="thumb-img"
               style="width:100%; height:88px; object-fit:cover; display:block; cursor:pointer; border:2px solid <?= $i===0 ? 'var(--brand-primary)' : 'transparent' ?>;"
               onclick="
                 document.getElementById('mainImg').src=this.src;
                 document.querySelectorAll('.thumb-img').forEach(function(t){t.style.borderColor='transparent';});
                 this.style.borderColor='var(--brand-primary)';
               ">
          <?php endforeach; ?>
        </div>
      </div>

      <!-- RIGHT: Details -->
      <div style="flex:1; min-width:0;">

        <h1 style="font-family:'Abhaya Libre',serif; font-size:2.9rem; font-weight:800; color:#111111; margin:0 0 10px; line-height:1.2;">
          <?= htmlspecialchars($property['title']) ?>
        </h1>

        <!-- Stars -->
        <div style="display:flex; align-items:center; gap:8px; margin-bottom:10px;">
          <div style="display:flex; gap:2px;">
            <?php for ($i=0; $i<5; $i++): ?>
            <svg width="15" height="15" viewBox="0 0 20 20" fill="#F5A623"><path d="M10 15.27L16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z"/></svg>
            <?php endfor; ?>
          </div>
          <span style="font-family:'Abhaya Libre',serif; font-size:1rem; color:#888888;">54 Reviews</span>
        </div>

        <!-- Address -->
        <div style="display:flex; align-items:center; gap:6px; margin-bottom:20px;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--brand-primary)" style="flex-shrink:0;">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
          </svg>
          <span style="font-family:'Abhaya Libre',serif; font-size:1.05rem; color:#666666;"><?= htmlspecialchars($property['address']) ?></span>
        </div>

        <hr style="border:none; border-top:1px solid #eeeeee; margin:0 0 18px;">

        <!-- Overview row -->
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:18px;">
          <span style="font-family:'Abhaya Libre',serif; font-size:1.2rem; font-weight:800; color:#111111;">Overview</span>
          <span style="font-family:'Abhaya Libre',serif; font-size:1rem; color:#888888;">Property ID: <?= $propertyId ?></span>
        </div>

        <!-- Stats -->
        <div style="display:flex; border:1px solid #eeeeee; margin-bottom:22px;">
          <?php
          $stats = [
            ['icon'=>'<svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M3 12V7a1 1 0 011-1h16a1 1 0 011 1v5M3 12v5h18v-5M3 12h18M7 12V9h4v3" stroke="var(--brand-primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>', 'value'=>$property['bedrooms'], 'label'=>'Bedrooms'],
            ['icon'=>'<svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M4 12h16v3a5 5 0 01-5 5H9a5 5 0 01-5-5v-3zM6 12V6a3 3 0 013-3h1a2 2 0 012 2v1" stroke="var(--brand-primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>', 'value'=>$property['bathrooms'], 'label'=>'Bathrooms'],
            ['icon'=>'<svg width="20" height="20" viewBox="0 0 24 24" fill="none"><rect x="2" y="11" width="20" height="10" rx="1" stroke="var(--brand-primary)" stroke-width="1.5"/><path d="M5 11V7a7 7 0 0114 0v4" stroke="var(--brand-primary)" stroke-width="1.5"/></svg>', 'value'=>2, 'label'=>'Garage'],
            ['icon'=>'<svg width="20" height="20" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="18" rx="2" stroke="var(--brand-primary)" stroke-width="1.5"/><path d="M3 9h18M8 2v4M16 2v4" stroke="var(--brand-primary)" stroke-width="1.5" stroke-linecap="round"/></svg>', 'value'=>2022, 'label'=>'Year Built'],
            ['icon'=>'<svg width="20" height="20" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" stroke="var(--brand-primary)" stroke-width="1.5"/><path d="M3 9h18M9 3v18" stroke="var(--brand-primary)" stroke-width="1.5"/></svg>', 'value'=>'1,334', 'label'=>'Area Size'],
          ];
          foreach ($stats as $i => $s):
          ?>
          <div style="flex:1; padding:14px 10px; text-align:center; <?= $i < 4 ? 'border-right:1px solid #eeeeee;' : '' ?>">
            <div style="display:flex; justify-content:center; margin-bottom:5px;"><?= $s['icon'] ?></div>
            <div style="font-family:'Abhaya Libre',serif; font-size:1.1rem; font-weight:700; color:#111111;"><?= $s['value'] ?></div>
            <div style="font-family:'Abhaya Libre',serif; font-size:0.9rem; color:#999999; margin-top:2px;"><?= $s['label'] ?></div>
          </div>
          <?php endforeach; ?>
        </div>

        <hr style="border:none; border-top:1px solid #eeeeee; margin:0 0 18px;">

        <!-- Description -->
        <h3 style="font-family:'Abhaya Libre',serif; font-size:1.3rem; font-weight:800; color:#111111; margin:0 0 8px;">Supported Shared Accommodation</h3>
        <p style="font-family:'Abhaya Libre',serif; font-size:1.05rem; color:#555555; line-height:1.75; margin:0 0 22px;">
          <?= nl2br(htmlspecialchars($description)) ?>
        </p>

        <!-- Rooms Available -->
        <h3 style="font-family:'Abhaya Libre',serif; font-size:1.3rem; font-weight:800; color:#111111; margin:0 0 10px;">Rooms Also Available In</h3>
        <div style="border:1px solid #eeeeee; padding:14px 18px; margin-bottom:18px;">
          <div style="display:flex; flex-wrap:wrap; gap:12px 24px;">
            <?php foreach ($rooms_available as $room): ?>
            <div style="display:flex; align-items:center; gap:6px;">
              <svg width="15" height="15" viewBox="0 0 20 20" fill="none" style="flex-shrink:0;">
                <circle cx="10" cy="10" r="9" fill="var(--brand-primary)"/>
                <path d="M6 10l3 3 5-5" stroke="#ffffff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <span style="font-family:'Abhaya Libre',serif; font-size:1rem; color:#444444;"><?= htmlspecialchars($room) ?></span>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- All properties have -->
        <h3 style="font-family:'Abhaya Libre',serif; font-size:1.3rem; font-weight:800; color:#111111; margin:0 0 10px;">All properties have</h3>
        <div style="border:1px solid #eeeeee; padding:14px 18px; margin-bottom:22px;">
          <?php foreach ($property_features as $idx => $feat): ?>
          <div style="display:flex; align-items:center; gap:10px; <?= $idx < count($property_features)-1 ? 'margin-bottom:10px;' : '' ?>">
            <svg width="15" height="15" viewBox="0 0 20 20" fill="none" style="flex-shrink:0;">
              <circle cx="10" cy="10" r="9" fill="var(--brand-primary)"/>
              <path d="M6 10l3 3 5-5" stroke="#ffffff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span style="font-family:'Abhaya Libre',serif; font-size:1rem; color:#444444;"><?= htmlspecialchars($feat) ?></span>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Book CTA -->
        <p style="font-family:'Abhaya Libre',serif; font-size:1.3rem; font-weight:800; color:#111111; line-height:1.5; margin:0 0 16px;">
          Book Your Room Now With Us And Live A Hassle And Stress-Free Life.
        </p>
        <div style="background:#f5f5f5; padding:20px 24px; display:flex; gap:12px; flex-wrap:wrap;">
          <a href="https://wa.me/447557538026" target="_blank" class="det-btn-primary"
             style="flex:1; display:inline-flex; align-items:center; justify-content:center; gap:10px; background:var(--brand-primary); color:#ffffff; font-family:'Abhaya Libre',serif; font-weight:600; font-size:0.95rem; padding:12px 28px; text-decoration:none; border:1.5px solid var(--brand-primary); transition:background 0.25s ease, color 0.25s ease;">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            Whatsapp
          </a>
          <button onclick="document.getElementById('tenantModal').style.display='flex';" class="det-btn-outline"
             style="flex:1; display:inline-flex; align-items:center; justify-content:center; background:#ffffff; color:#111111; font-family:'Abhaya Libre',serif; font-weight:600; font-size:0.95rem; padding:12px 28px; border:1.5px solid #cccccc; cursor:pointer; transition:background 0.25s ease, color 0.25s ease, border-color 0.25s ease;">
            Tenants Enquiry
          </button>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- ===== SIMILAR PROPERTIES ===== -->
<section class="w-full bg-white" style="padding:64px 0; border-top:1px solid #f0f0f0;">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">

    <p style="font-family:'Abhaya Libre',serif; font-size:0.75rem; font-weight:700; color:var(--brand-primary); letter-spacing:0.12em; text-transform:uppercase; margin:0 0 6px;">FEATURED LISTING</p>
    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:208px;">
      <h2 style="font-family:'Abhaya Libre',serif; font-size:2.9rem; font-weight:800; color:#111111; margin:0;">Similar Properties</h2>
      <a href="/src/pages/properties.php"
         style="background:var(--brand-primary); color:#ffffff; font-family:'Abhaya Libre',serif; font-weight:600; font-size:0.9rem; padding:10px 24px; text-decoration:none; border:1.5px solid var(--brand-primary);">
        View All
      </a>
    </div>

    <div class="sim-carousel-outer" style="overflow-x:clip; overflow-y:visible;">
      <div class="sim-carousel" style="display:flex; gap:20px; height:362px; align-items:flex-start; transition:transform 0.5s ease;">
        <?php foreach ($similar as $sp): ?>
        <div class="sim-card" style="flex:0 0 calc(25% - 15px); min-width:0; cursor:pointer;">
          <img src="<?= htmlspecialchars($sp['image']) ?>" alt="<?= htmlspecialchars($sp['title']) ?>"
               style="width:100%; height:362px; object-fit:cover; display:block; flex-shrink:0;">
          <div class="sim-hover-panel" style="background:#ffffff; padding:16px 22px 28px;">
            <h3 style="font-family:'Abhaya Libre',serif; font-weight:700; font-size:1.1rem; color:#111111; margin:0 0 2px;">
              <?= htmlspecialchars($sp['title']) ?>
            </h3>
            <p style="font-family:'Abhaya Libre',serif; font-size:0.82rem; color:#777777; margin:0 0 10px;">
              <?= htmlspecialchars($sp['address']) ?>
            </p>
            <div style="display:flex; align-items:center; justify-content:center; gap:22px; margin-bottom:12px;">
              <span class="sim-meta-item">
                <svg width="18" height="14" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right:5px; flex-shrink:0;">
                  <path d="M1 15V5a2 2 0 012-2h16a2 2 0 012 2v10M1 9h20M1 15h20M7 9V6a1 1 0 011-1h6a1 1 0 011 1v3" stroke="var(--brand-primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <?= $sp['bedrooms'] ?> Beds
              </span>
              <span class="sim-meta-item">
                <svg width="18" height="16" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right:5px; flex-shrink:0;">
                  <path d="M3 10h16v2a6 6 0 01-6 6H9a6 6 0 01-6-6v-2zM3 10V3a2 2 0 014 0v7" stroke="var(--brand-primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <?= $sp['bathrooms'] ?> Bath
              </span>
            </div>
            <a href="/src/pages/property-detail.php?id=<?= $sp['id'] ?>"
               style="display:block; background:var(--brand-primary); color:#ffffff; text-align:center; padding:10px; font-family:'Abhaya Libre',serif; font-weight:600; font-size:0.9rem; text-decoration:none; border-radius:0;">
              View Property
            </a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div style="display:flex; align-items:center; justify-content:center; gap:12px; margin-top:24px;">
      <button id="simPrev" style="width:40px; height:40px; border:1.5px solid #bbb; display:flex; align-items:center; justify-content:center; background:#fff; cursor:pointer; border-radius:0;">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
      </button>
      <button id="simNext" style="width:40px; height:40px; border:1.5px solid #bbb; display:flex; align-items:center; justify-content:center; background:#fff; cursor:pointer; border-radius:0;">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </button>
    </div>

  </div>
</section>

<style>
  .sim-card {
    display: flex;
    flex-direction: column;
    height: 362px;
    overflow: hidden;
    border: 1px solid #094F4F99;
    transition: height 0.35s ease, transform 0.35s ease;
  }
  .sim-card:hover {
    height: 542px;
    transform: translateY(-180px);
  }
  .sim-hover-panel { flex-shrink: 0; }
  .sim-card img { transition: filter 0.25s ease; }
  .sim-card:hover img { filter: brightness(0.92); }
  .sim-meta-item {
    display: flex;
    align-items: center;
    font-family: 'Abhaya Libre', serif;
    font-size: 0.9rem;
    color: #333333;
  }
</style>

<script>
(function(){
  var carousel = document.querySelector('.sim-carousel');
  var prevBtn  = document.getElementById('simPrev');
  var nextBtn  = document.getElementById('simNext');
  if (!carousel || !prevBtn || !nextBtn) return;

  var total   = <?= count($similar) ?>;
  var pages   = Math.ceil(total / 4);
  var current = 0;

  function update() {
    carousel.style.transform = 'translateX(-' + (current * 100) + '%)';
    prevBtn.style.opacity = current === 0 ? '0.4' : '1';
    nextBtn.style.opacity = current === pages - 1 ? '0.4' : '1';
  }

  prevBtn.addEventListener('click', function(){ if (current > 0) { current--; update(); } });
  nextBtn.addEventListener('click', function(){ if (current < pages - 1) { current++; update(); } });

  update();
})();
</script>

<!-- ===== TENANT ENQUIRY MODAL ===== -->
<div id="tenantModal"
     style="display:none; position:fixed; inset:0; z-index:9999; overflow-y:auto; padding:40px 24px;"
     onclick="if(event.target===this) this.style.display='none';">
  <!-- Backdrop -->
  <div style="position:fixed; inset:0; background:rgba(0,0,0,0.55); backdrop-filter:blur(5px); -webkit-backdrop-filter:blur(5px); pointer-events:none;"></div>

  <!-- Modal card -->
  <div style="position:relative; z-index:1; background:#ffffff; width:1076px; max-width:calc(100% - 0px); max-height:90vh; overflow-y:auto; padding:100px; display:flex; flex-direction:column; gap:82px; box-sizing:border-box; margin:auto;">

    <!-- Close -->
    <button onclick="document.getElementById('tenantModal').style.display='none';"
            style="position:absolute; top:16px; right:20px; background:none; border:none; font-size:1.4rem; color:#888; cursor:pointer; line-height:1;">&#x2715;</button>

    <!-- Heading block -->
    <div style="text-align:center;">
      <h2 style="font-family:'Abhaya Libre',serif; font-size:2.8rem; font-weight:800; color:var(--brand-primary); margin:0 0 12px;">Tenants Enquiry</h2>
      <p style="font-family:'Abhaya Libre',serif; font-size:1rem; color:#666666; margin:0; line-height:1.6;">
        Partner with Resource Housing for guaranteed rent and hassle-free management.
      </p>
    </div>

    <!-- Form block -->
    <form id="tenantForm" style="display:flex; flex-direction:column; gap:16px;">

      <!-- Row 1: Name + Email -->
      <div style="display:flex; gap:16px;">
        <input type="text" name="name" placeholder="Name"
               style="flex:1; min-width:0; border:1px solid #cccccc; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1rem; color:#333; outline:none; box-sizing:border-box;">
        <input type="email" name="email" placeholder="Email"
               style="flex:1; min-width:0; border:1px solid #cccccc; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1rem; color:#333; outline:none; box-sizing:border-box;">
      </div>

      <!-- Row 2: Date + Contact -->
      <div style="display:flex; gap:16px;">
        <input type="date" name="dob"
               style="flex:1; min-width:0; border:1px solid #cccccc; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1rem; color:#333; outline:none; box-sizing:border-box;">
        <input type="tel" name="contact_number" placeholder="Contact Number"
               style="flex:1; min-width:0; border:1px solid #cccccc; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1rem; color:#333; outline:none; box-sizing:border-box;">
      </div>

      <!-- Address -->
      <div>
        <input type="text" name="address" placeholder="Address"
               style="width:100%; border:1px solid #cccccc; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1rem; color:#333; outline:none; box-sizing:border-box;">
      </div>

      <!-- Benefits checkboxes -->
      <div style="display:flex; flex-wrap:wrap; gap:10px 0; row-gap:10px;">
        <?php
        $benefits = [
            'Universal Credit', 'Housing Benefit', "Jobseeker's Allowance (JSA)", 'Employment and Support Allowance (ESA)',
            'Personal Independence Payment (PIP)', 'Disability Living Allowance (DLA)', 'Income Support', "Carer's Allowance",
            'Pension Credit',
        ];
        foreach ($benefits as $b):
        ?>
        <label style="display:flex; align-items:center; gap:8px; font-family:'Abhaya Libre',serif; font-size:0.92rem; color:#333333; margin-right:20px; cursor:pointer; white-space:nowrap;">
          <input type="checkbox" name="benefits[]" value="<?= htmlspecialchars($b) ?>"
                 style="width:18px; height:18px; border:1.5px solid #aaaaaa; accent-color:var(--brand-primary); cursor:pointer; flex-shrink:0;">
          <?= htmlspecialchars($b) ?>
        </label>
        <?php endforeach; ?>
        <!-- Other -->
        <label style="display:flex; align-items:center; gap:8px; font-family:'Abhaya Libre',serif; font-size:0.92rem; color:#333333; cursor:pointer;">
          <input type="checkbox" name="benefits[]" value="other"
                 style="width:18px; height:18px; border:1.5px solid #aaaaaa; accent-color:var(--brand-primary); cursor:pointer; flex-shrink:0;">
          Other (please specify):
          <input type="text" name="other_benefit"
                 style="border:none; border-bottom:1px solid #999; outline:none; font-family:'Abhaya Libre',serif; font-size:0.92rem; width:140px; padding:2px 4px;">
        </label>
      </div>

      <!-- Situation textarea -->
      <div>
        <textarea name="situation" placeholder="Briefly describe your current situation or support needs..."
                  rows="5" style="width:100%; border:1px solid #cccccc; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1rem; color:#333; outline:none; box-sizing:border-box; resize:vertical;"></textarea>
      </div>

      <!-- Consent -->
      <label style="display:flex; align-items:flex-start; gap:10px; font-family:'Abhaya Libre',serif; font-size:0.92rem; color:#444444; cursor:pointer; line-height:1.5;">
        <input type="checkbox" name="consent" required
               style="width:18px; height:18px; border:1.5px solid #aaaaaa; accent-color:var(--brand-primary); cursor:pointer; flex-shrink:0; margin-top:2px;">
        I give consent for Resource Housing to use my information to process this application.
      </label>

      <!-- Submit -->
      <button type="submit" id="tenantSubmitBtn"
              style="width:100%; background:var(--brand-primary); color:#ffffff; font-family:'Abhaya Libre',serif; font-weight:700; font-size:1rem; letter-spacing:0.08em; padding:16px; border:none; cursor:pointer; transition:background 0.25s ease;">
        SEND
      </button>

    </form>

    <script>
    (function(){
      var form = document.getElementById('tenantForm');
      var btn  = document.getElementById('tenantSubmitBtn');
      if (!form) return;
      form.addEventListener('submit', function(e){
        e.preventDefault();
        btn.textContent = 'SENT ✓';
        btn.style.background = '#ffffff';
        btn.style.color = 'var(--brand-primary)';
        btn.style.border = '1.5px solid var(--brand-primary)';
        btn.disabled = true;
        btn.style.cursor = 'default';
        setTimeout(function(){ document.getElementById('tenantModal').style.display='none'; }, 1800);
      });
    })();
    </script>

  </div>
</div>

</main>

<?php require __DIR__ . '/includes/becomeTenants.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>

<style>
  .det-btn-primary:hover { background:#ffffff !important; color:#000000 !important; }
  .det-btn-outline:hover  { background:var(--brand-primary) !important; color:#ffffff !important; border-color:var(--brand-primary) !important; }
  .sim-btn:hover          { background:#ffffff !important; color:#000000 !important; }
  #tenantSubmitBtn:hover:not(:disabled) { background:#063a3a !important; }
  #tenantModal input::placeholder, #tenantModal textarea::placeholder { color:#aaa; }
  #tenantModal input[type="text"]:focus, #tenantModal input[type="email"]:focus,
  #tenantModal input[type="tel"]:focus, #tenantModal input[type="date"]:focus,
  #tenantModal textarea:focus { border-color:var(--brand-primary); }
</style>

</body>
</html>
