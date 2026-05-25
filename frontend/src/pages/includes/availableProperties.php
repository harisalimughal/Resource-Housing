<!-- ===== AVAILABLE HMO PROPERTIES ===== -->
<section class="w-full py-20 bg-white">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">

    <!-- Header row -->
    <div class="flex items-end justify-between mb-52">
      <div>
        <p class="text-xs font-semibold tracking-[0.2em] uppercase mb-3" style="color:#aaa; font-family:'Abhaya Libre',serif;">Featured Listing</p>
        <h2 class="text-5xl md:text-6xl font-bold leading-tight" style="font-family:'Abhaya Libre',serif;">
          <span style="color:#111111;">Available </span><span style="color:var(--brand-primary);">HMO Properties</span>
        </h2>
      </div>
      <a href="/src/pages/properties.php"
         class="flex-shrink-0 text-sm font-semibold px-6 py-3"
         style="background:var(--brand-primary); color:#ffffff; font-family:'Abhaya Libre',serif; text-decoration:none; border-radius:0; margin-bottom:6px;">
        View All
      </a>
    </div>

    <?php
    require_once __DIR__ . '/../../data/properties.php';
    $allProps   = getProperties();
    $perPage    = 4;
    $totalCards = count($allProps);
    $totalPages = (int) ceil($totalCards / $perPage);
    // Flatten to the shape the template expects
    $props = array_map(fn($p) => [
        'title'   => $p['title'],
        'address' => $p['address'],
        'beds'    => $p['bedrooms'],
        'baths'   => $p['bathrooms'],
        'image'   => $p['image'],
    ], $allProps);
    ?>

    <div class="prop-carousel-outer" style="overflow-x: clip; overflow-y: visible;">
      <div class="prop-carousel" style="display:flex; gap:20px; height:362px; align-items:flex-start; transition:transform 0.5s ease;">
        <?php foreach ($props as $i => $prop): ?>
        <div class="prop-card" style="flex:0 0 calc(25% - 15px); min-width:0; cursor:pointer;">

          <!-- Image — always full 362px, flex-shrink:0 so it never compresses -->
          <img src="<?= $prop['image'] ?>" alt="<?= htmlspecialchars($prop['title']) ?>"
               style="width:100%; height:362px; object-fit:cover; display:block; flex-shrink:0;">

          <!-- Panel in normal flow below image -->
          <div class="prop-hover-panel" style="background:#ffffff; padding:16px 22px 28px 22px;">
            <h3 style="font-family:'Abhaya Libre',serif; font-weight:700; font-size:1.1rem; color:#111111; margin:0 0 2px;">
              <?= htmlspecialchars($prop['title']) ?>
            </h3>
            <p style="font-family:'Abhaya Libre',serif; font-size:0.82rem; color:#777777; margin:0 0 10px;">
              <?= htmlspecialchars($prop['address']) ?>
            </p>
            <div style="display:flex; align-items:center; justify-content:center; gap:22px; margin-bottom:12px;">
              <span class="prop-meta-item">
                <svg width="18" height="14" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right:5px; flex-shrink:0;">
                  <path d="M1 15V5a2 2 0 012-2h16a2 2 0 012 2v10M1 9h20M1 15h20M7 9V6a1 1 0 011-1h6a1 1 0 011 1v3" stroke="var(--brand-primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <?= $prop['beds'] ?> Beds
              </span>
              <span class="prop-meta-item">
                <svg width="18" height="16" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right:5px; flex-shrink:0;">
                  <path d="M3 10h16v2a6 6 0 01-6 6H9a6 6 0 01-6-6v-2zM3 10V3a2 2 0 014 0v7" stroke="var(--brand-primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <?= $prop['baths'] ?> Bath
              </span>
            </div>
            <a href="/src/pages/properties.php"
               style="display:block; background:var(--brand-primary); color:#ffffff; text-align:center;
                      padding:10px; font-family:'Abhaya Libre',serif; font-weight:600; font-size:0.9rem;
                      text-decoration:none; border-radius:0;">
              View Property
            </a>
          </div>

        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Navigation arrows -->
    <div class="flex items-center justify-center gap-3 mt-6">
      <button id="propPrev" aria-label="Previous properties"
              class="flex items-center justify-center transition-colors hover:bg-gray-100"
              style="width:40px;height:40px;border:1.5px solid #bbb;background:#fff;border-radius:0;flex-shrink:0;">
        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
        </svg>
      </button>
      <button id="propNext" aria-label="Next properties"
              class="flex items-center justify-center transition-colors hover:bg-gray-100"
              style="width:40px;height:40px;border:1.5px solid #bbb;background:#fff;border-radius:0;flex-shrink:0;">
        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
      </button>
    </div>

  </div>
</section>

<style>
  .prop-card {
    display: flex;
    flex-direction: column;
    height: 362px;
    overflow: hidden;
    border: 1px solid #094F4F99;
    transition: height 0.35s ease, transform 0.35s ease;
  }
  .prop-card:hover {
    height: 542px;
    transform: translateY(-180px);
  }
  .prop-hover-panel {
    flex-shrink: 0;
  }
  .prop-card img {
    transition: filter 0.25s ease;
  }
  .prop-card:hover img {
    filter: brightness(0.92);
  }
  .prop-meta-item {
    display: flex;
    align-items: center;
    font-family: 'Abhaya Libre', serif;
    font-size: 0.9rem;
    color: #333333;
  }
</style>

<script>
(function(){
  var carousel  = document.querySelector('.prop-carousel');
  var prevBtn   = document.getElementById('propPrev');
  var nextBtn   = document.getElementById('propNext');
  if (!carousel || !prevBtn || !nextBtn) return;

  var perPage   = 4;
  var total     = <?= (int)$totalCards ?>;
  var pages     = <?= (int)$totalPages ?>;
  var current   = 0;

  function updateCarousel() {
    var pct = current * 100;
    carousel.style.transform = 'translateX(-' + pct + '%)';
    prevBtn.style.opacity = current === 0 ? '0.4' : '1';
    nextBtn.style.opacity = current === pages - 1 ? '0.4' : '1';
  }

  prevBtn.addEventListener('click', function(){
    if (current > 0) { current--; updateCarousel(); }
  });
  nextBtn.addEventListener('click', function(){
    if (current < pages - 1) { current++; updateCarousel(); }
  });

  updateCarousel();
})();
</script>
