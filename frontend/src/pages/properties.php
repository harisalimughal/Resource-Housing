<?php
$pageTitle = 'Properties – Resource Housing';
require __DIR__ . '/../data/properties.php';

// Filters from GET
$filters = [
    'location'      => $_GET['location'] ?? '',
    'area'          => $_GET['area']     ?? '',
    'type'          => $_GET['type']     ?? '',
    'bedrooms_min'  => $_GET['beds']     ?? '',
    'bathrooms_min' => $_GET['baths']    ?? '',
];
$page    = max(1, (int)($_GET['page'] ?? 1));
$perPage = 4;

$all        = getProperties();
$filtered   = filterProperties($all, $filters);
$paginated  = paginateProperties($filtered, $page, $perPage);
$properties = $paginated['properties'];
$pagination = $paginated['pagination'];

// Unique values for dropdowns
$areas = array_unique(array_column($all, 'area'));
$types = array_unique(array_column($all, 'type'));
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

<!-- ===== HERO ===== -->
<section class="hero-bleed" style="position:relative; width:100%; min-height:300px; display:flex; align-items:center; overflow:hidden;">
  <img src="/public/assets/images/uk-houses/uk-5.jpg" alt="All Properties"
       style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; object-position:center;">
  <div style="position:absolute; inset:0; background:rgba(0,0,0,0.62);"></div>
  <div class="max-w-screen-xl mx-auto px-8 md:px-16" style="position:relative; z-index:1; width:100%;">
    <h1 class="hero-anim-left hero-d1" style="font-family:'Abhaya Libre',serif; font-size:3.8rem; font-weight:700; color:#ffffff; line-height:1.15; margin:0 0 16px;">
      All Properties
    </h1>
    <p class="hero-anim-left hero-d2" style="font-family:'Abhaya Libre',serif; font-size:1.05rem; color:rgba(255,255,255,0.82); margin:0;">
      Discover your perfect home from our extensive collection.
    </p>
  </div>
</section>

<!-- ===== FILTER BAR ===== -->
<section class="w-full bg-white py-10">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">
    <form id="filterForm" data-animate="fade-up" method="GET" action="" style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">

      <?php
      $chevron = '<svg width="13" height="13" viewBox="0 0 20 20" fill="currentColor" style="flex-shrink:0;color:#888;"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>';

      // Helper: build a custom dropdown
      function renderDropdown(string $name, string $label, array $options, string $selected, string $flex = '1', string $minWidth = '150px'): void {
          $displayLabel = $selected !== '' ? $selected : $label;
          $chevron = '<svg width="13" height="13" viewBox="0 0 20 20" fill="currentColor" style="flex-shrink:0;color:#888;"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>';
          echo '<div class="cdd-wrap" data-name="' . $name . '" style="position:relative;flex:' . $flex . ';min-width:' . $minWidth . ';">';
          echo '  <input type="hidden" name="' . $name . '" value="' . htmlspecialchars($selected) . '" class="cdd-val">';
          echo '  <button type="button" class="cdd-trigger" style="width:100%;border:1px solid #dddddd;padding:12px 14px;font-family:\'Abhaya Libre\',serif;font-size:0.95rem;color:#555;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:space-between;gap:8px;white-space:nowrap;">';
          echo '    <span class="cdd-label">' . htmlspecialchars($displayLabel) . '</span>' . $chevron;
          echo '  </button>';
          echo '  <div class="cdd-panel" style="display:none;position:absolute;top:calc(100% + 4px);left:0;min-width:100%;background:#fff;border:1px solid #dddddd;z-index:999;box-shadow:0 4px 16px rgba(0,0,0,0.08);">';
          foreach ($options as $val => $text) {
              $active = ($selected === (string)$val) ? 'background:#cddcdb;' : '';
              echo '    <div class="cdd-option" data-val="' . htmlspecialchars((string)$val) . '" data-label="' . htmlspecialchars($label) . '" data-text="' . htmlspecialchars($text) . '" style="padding:11px 16px;font-family:\'Abhaya Libre\',serif;font-size:0.95rem;color:#333;cursor:pointer;' . $active . '">' . htmlspecialchars($text) . '</div>';
          }
          echo '  </div>';
          echo '</div>';
      }

      $locationOptions = ['' => 'All', 'Birmingham' => 'Birmingham', 'Greenwich' => 'Greenwich', 'Islington' => 'Islington', 'Camden' => 'Camden'];
      renderDropdown('location', 'Location', $locationOptions, $_GET['location'] ?? '', '1', '150px');
      $locationAreas = [
          'Birmingham' => ['Erdington', 'Hodge Hill', 'Lozells', 'Spark Hill'],
          'Greenwich'  => ['Greenwich', 'Woolwich', 'Charlton', 'Eltham'],
          'Islington'  => ['Angel', 'Finsbury Park', 'Highbury', 'Holloway'],
          'Camden'     => ['Camden Town', 'Hampstead', 'Kentish Town', 'Primrose Hill'],
      ];
      $selLoc = $_GET['location'] ?? '';
      $availableAreas = (!empty($selLoc) && isset($locationAreas[$selLoc]))
          ? $locationAreas[$selLoc]
          : array_merge(...array_values($locationAreas));
      $areaOptions = array_merge(['' => 'All'], array_combine($availableAreas, $availableAreas));
      renderDropdown('area', 'Select Your Area', $areaOptions, $filters['area'], '1', '180px');
      renderDropdown('type', 'Select Property Type', ['' => 'All', 'Home' => 'Home', 'Flats' => 'Flats'], $filters['type'], '1', '200px');
      renderDropdown('beds', 'Beds', ['' => 'All', '1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6'], $filters['bedrooms_min'], '0 0 auto', '110px');
      renderDropdown('baths', 'Baths', ['' => 'All', '1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'], $filters['bathrooms_min'], '0 0 auto', '110px');
      ?>

      <!-- Search -->
      <button type="submit"
              style="background:var(--brand-primary); color:#ffffff; font-family:'Abhaya Libre',serif; font-weight:600; font-size:1rem; padding:12px 32px; border:1.5px solid var(--brand-primary); cursor:pointer; border-radius:0; white-space:nowrap; transition:background 0.25s ease, color 0.25s ease; flex-shrink:0;">
        Search
      </button>

    </form>
  </div>
</section>

<script>
(function(){
  var locationAreas = <?= json_encode($locationAreas) ?>;

  function rebuildAreaDropdown(locationVal) {
    var areaWrap = document.querySelector('.cdd-wrap[data-name="area"]');
    if (!areaWrap) return;
    var areas = (locationVal && locationAreas[locationVal]) ? locationAreas[locationVal] : [];
    // Reset area selection
    areaWrap.querySelector('.cdd-val').value = '';
    areaWrap.querySelector('.cdd-label').textContent = 'Select Your Area';
    // Rebuild panel options
    var panel = areaWrap.querySelector('.cdd-panel');
    panel.innerHTML = '';
    var allOpt = document.createElement('div');
    allOpt.className = 'cdd-option';
    allOpt.dataset.val   = '';
    allOpt.dataset.label = 'Select Your Area';
    allOpt.dataset.text  = 'All';
    allOpt.style.cssText = "padding:11px 16px;font-family:'Abhaya Libre',serif;font-size:0.95rem;color:#333;cursor:pointer;";
    allOpt.textContent = 'All';
    panel.appendChild(allOpt);
    areas.forEach(function(area) {
      var div = document.createElement('div');
      div.className = 'cdd-option';
      div.dataset.val   = area;
      div.dataset.label = 'Select Your Area';
      div.dataset.text  = area;
      div.style.cssText = "padding:11px 16px;font-family:'Abhaya Libre',serif;font-size:0.95rem;color:#333;cursor:pointer;";
      div.textContent = area;
      panel.appendChild(div);
    });
  }

  document.addEventListener('click', function(e){
    var trigger = e.target.closest('.cdd-trigger');
    var option  = e.target.closest('.cdd-option');

    // Close all panels first
    document.querySelectorAll('.cdd-panel').forEach(function(p){ p.style.display = 'none'; });

    if (trigger) {
      var panel = trigger.nextElementSibling;
      panel.style.display = panel.style.display === 'block' ? 'none' : 'block';
    }

    if (option) {
      var w     = option.closest('.cdd-wrap');
      var val   = option.dataset.val;
      var text  = option.dataset.text;
      var label = option.dataset.label;
      w.querySelector('.cdd-val').value = val;
      w.querySelector('.cdd-label').textContent = val === '' ? label : text;
      w.querySelectorAll('.cdd-option').forEach(function(o){
        o.style.background = o.dataset.val === val ? '#cddcdb' : '';
      });
      // Cascade: if location changed, rebuild area options
      if (w.dataset.name === 'location') {
        rebuildAreaDropdown(val);
      }
    }
  });
})();
</script>

<!-- ===== PROPERTY CARDS ===== -->
<section class="w-full pb-16 bg-white">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">

    <?php if (empty($properties)): ?>
    <p style="font-family:'Abhaya Libre',serif; font-size:1.1rem; color:#777; text-align:center; padding:60px 0;">
      No properties found matching your search.
    </p>
    <?php else: ?>

    <div class="prop-grid" data-stagger="100" style="display:grid; gap:20px; margin-bottom:32px;">
      <?php foreach ($properties as $p): ?>
      <div data-animate="fade-up" style="border:1px solid #e8e8e8; display:flex; flex-direction:column; background:#fff;">

        <!-- Image -->
        <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['title']) ?>"
             style="width:100%; height:190px; object-fit:cover; display:block; flex-shrink:0;">

        <!-- Info -->
        <div style="padding:22px 22px 22px; flex:1; display:flex; flex-direction:column;">
          <h3 style="font-family:'Abhaya Libre',serif; font-size:1.4rem; font-weight:800; color:#111111; margin:0 0 8px; line-height:1.2;">
            <?= htmlspecialchars($p['title']) ?>
          </h3>
          <p style="font-family:'Abhaya Libre',serif; font-size:0.9rem; color:#888888; margin:0 0 18px; line-height:1.4;">
            <?= htmlspecialchars($p['address']) ?>
          </p>

          <!-- Beds + Baths -->
          <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
            <div style="display:flex; align-items:center; gap:10px;">
              <svg width="22" height="18" viewBox="0 0 34 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 25V13M1 13V3a1 1 0 011-1h30a1 1 0 011 1v10M1 13h32M33 13v12M1 25h32M7 13V8h8v5" stroke="var(--brand-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <span style="font-family:'Abhaya Libre',serif; font-size:1rem; color:#444;"><?= $p['bedrooms'] ?> Beds</span>
            </div>
            <div style="display:flex; align-items:center; gap:10px;">
              <svg width="20" height="18" viewBox="0 0 32 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 14h28v5a9 9 0 01-9 9H11a9 9 0 01-9-9v-5zM6 14V6a5 5 0 0110 0v8" stroke="var(--brand-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <span style="font-family:'Abhaya Libre',serif; font-size:1rem; color:#444;"><?= $p['bathrooms'] ?> Bath</span>
            </div>
          </div>

          <!-- Button -->
          <a href="/src/pages/property-detail.php?id=<?= $p['id'] ?>" class="prop-view-btn"
             style="display:block; text-align:center; background:var(--brand-primary); color:#ffffff; font-family:'Abhaya Libre',serif; font-weight:600; font-size:1rem; padding:14px 16px; text-decoration:none; border:1.5px solid var(--brand-primary); margin-top:auto; transition:background 0.25s ease, color 0.25s ease;">
            View Property
          </a>
        </div>

      </div>
      <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <div style="display:flex; align-items:center; justify-content:space-between;">
      <p style="font-family:'Abhaya Libre',serif; font-size:0.9rem; color:#777;">
        Showing <?= count($properties) ?> of <?= $pagination['total_properties'] ?> properties
      </p>
      <div style="display:flex; gap:8px;">
        <?php
        $prevPage = $page - 1;
        $nextPage = $page + 1;
        $queryBase = http_build_query(array_filter(array_merge($_GET, ['page' => null])));
        ?>
        <a href="?<?= http_build_query(array_merge($_GET, ['page' => $prevPage])) ?>"
           style="width:38px; height:38px; border:1.5px solid #bbb; display:flex; align-items:center; justify-content:center; text-decoration:none; color:#555; <?= !$pagination['has_prev'] ? 'opacity:0.4; pointer-events:none;' : '' ?>">
          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <a href="?<?= http_build_query(array_merge($_GET, ['page' => $nextPage])) ?>"
           style="width:38px; height:38px; border:1.5px solid #bbb; display:flex; align-items:center; justify-content:center; text-decoration:none; color:#555; <?= !$pagination['has_next'] ? 'opacity:0.4; pointer-events:none;' : '' ?>">
          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>

    <?php endif; ?>
  </div>
</section>

</main>

<?php require __DIR__ . '/includes/becomeTenants.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>

<style>
  .prop-view-btn:hover { background:#ffffff !important; color:#000000 !important; }
  select:focus { border-color: var(--brand-primary); outline:none; }
  button[type="submit"]:hover { background:#ffffff !important; color:#000000 !important; }

  /* Responsive grid: 1 col mobile, 2 col tablet, 4 col desktop */
  .prop-grid { grid-template-columns: 1fr; }
  @media (min-width: 640px)  { .prop-grid { grid-template-columns: repeat(2, 1fr); } }
  @media (min-width: 1024px) { .prop-grid { grid-template-columns: repeat(4, 1fr); } }
</style>

</body>
</html>
