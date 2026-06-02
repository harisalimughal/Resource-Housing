<!-- ===== HERO SECTION ===== -->
<section class="w-full pt-10 pb-24 overflow-x-hidden">

  <!-- Text row -->
  <div class="max-w-screen-xl mx-auto px-8 md:px-16 mb-10">
    <div class="flex flex-col md:flex-row md:items-center" style="height:300px; gap:10px;">

      <!-- Heading -->
      <div class="flex-1">
        <h1 class="hero-anim-left hero-d1 text-5xl md:text-6xl lg:text-7xl font-bold leading-tight text-black" style="font-family:'Abhaya Libre',serif;">
          Your Home, Your<br>Investment
        </h1>
        <h2 class="hero-anim-left hero-d2 text-5xl md:text-6xl lg:text-7xl font-bold leading-tight" style="font-family:'Abhaya Libre',serif; color: var(--brand-primary);">
          Your Peace of Mind
        </h2>
      </div>

      <!-- Sub-text -->
      <div class="hero-anim-right hero-d3 md:max-w-xs lg:max-w-sm">
        <p class="text-black text-base leading-relaxed" style="font-family:'Abhaya Libre',serif;">
          Whether you're looking for a quality home or a<br>
          reliable partner to manage your property,<br>
          Resource Housing delivers comfort, returns ,<br>
          care, and full property management
        </p>
      </div>

    </div>
  </div>

  <!-- Carousel row -->
  <div class="max-w-screen-xl mx-auto px-8 md:px-16 flex items-center justify-end gap-3 md:gap-4">

    <!-- Prev arrow -->
    <button id="heroSliderPrev" aria-label="Previous"
            class="flex-shrink-0 flex items-center justify-center transition-colors hover:bg-gray-100"
            style="width:40px;height:40px;border:1.5px solid #bbb;background:#fff;border-radius:0;flex-shrink:0;">
      <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
      </svg>
    </button>

    <!-- Outer wrapper: relative + no overflow so badge can straddle the bottom edge -->
    <div class="hero-anim hero-d4 relative" style="width:1170px; max-width:100%; height:401px;">

      <!-- Inner slides container: clips slides only -->
      <div class="absolute inset-0 overflow-hidden">
        <?php
          $slides = [
            '/public/assets/images/home-center.jpg',
            '/public/assets/images/home-center2.jpg',
            '/public/assets/images/home-center3.jpg',
            '/public/assets/images/home-center4.jpg',
          ];
        ?>
        <?php foreach ($slides as $i => $src): ?>
        <div class="hero-slide absolute inset-0 transition-opacity duration-700"
             style="opacity: <?= $i === 0 ? '1' : '0' ?>; pointer-events: <?= $i === 0 ? 'auto' : 'none' ?>;">
          <img src="<?= $src ?>" alt="Property <?= $i + 1 ?>" class="w-full h-full object-cover">
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Discover badge: sits on the bottom-right border, half in / half out -->
      <a href="/src/pages/properties.php"
         class="discover-badge absolute z-20"
         style="top:-80px; right:40px; width:160px; height:160px; text-decoration:none; display:block; border-radius:50%; background-color:var(--brand-primary);">
        <!-- Teal circle (background) -->
        <img src="/public/assets/images/circle-tag/circle.svg"
             class="absolute" style="width:80px;height:80px;left:40px;top:40px;">
        <!-- Rotating text ring -->
        <img src="/public/assets/images/circle-tag/image.png"
             class="discover-text-spin absolute" style="width:130px;height:130px;left:15px;top:15px;">
        <!-- Arrow centred on top -->
        <img src="/public/assets/images/circle-tag/arrow.svg"
             class="absolute z-10" style="width:34px;height:34px;left:63px;top:63px;">
      </a>

    </div>

    <!-- Next arrow -->
    <button id="heroSliderNext" aria-label="Next"
            class="flex-shrink-0 flex items-center justify-center transition-colors hover:bg-gray-100"
            style="width:40px;height:40px;border:1.5px solid #bbb;background:#fff;border-radius:0;flex-shrink:0;">
      <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
      </svg>
    </button>

  </div>

  <!-- Dot indicators -->
  <div class="flex justify-center gap-2 mt-4">
    <?php foreach ($slides as $i => $src): ?>
    <button class="hero-dot w-2 h-2 rounded-full transition-all duration-300"
            style="background-color: <?= $i === 0 ? 'var(--brand-primary)' : '#ccc' ?>;"
            data-index="<?= $i ?>"></button>
    <?php endforeach; ?>
  </div>

</section>

<style>
  @keyframes discover-text-rotate { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
  .discover-text-spin { animation: discover-text-rotate 10s linear infinite; transform-origin: center; }
  @media (prefers-reduced-motion: reduce) { .discover-text-spin { animation: none !important; } }

  @media (max-width: 767px) {
    /* Remove fixed height so headings don't get cut off */
    .flex.flex-col.md\\:flex-row { height:auto !important; padding-top:24px; padding-bottom:16px; }
    /* Shrink hero headings */
    .text-5xl { font-size:1.9rem !important; }
    /* Adjust discovery badge on mobile */
    .discover-badge { 
      display:block !important; 
      transform:scale(0.6);
      transform-origin: top right;
      top: -30px !important;
      right: 20px !important;
    }
    /* Shrink carousel height */
    .hero-slide img { height:240px !important; }
    div[style*="width:1170px"] { height:240px !important; }
  }
</style>

<script>
(function(){
  var slides   = document.querySelectorAll('.hero-slide');
  var dots     = document.querySelectorAll('.hero-dot');
  var prev     = document.getElementById('heroSliderPrev');
  var next     = document.getElementById('heroSliderNext');
  var current  = 0;
  var total    = slides.length;
  var autoTimer;

  function goTo(n) {
    slides[current].style.opacity = '0';
    slides[current].style.pointerEvents = 'none';
    dots[current].style.backgroundColor = '#ccc';
    current = (n + total) % total;
    slides[current].style.opacity = '1';
    slides[current].style.pointerEvents = 'auto';
    dots[current].style.backgroundColor = 'var(--brand-primary)';
  }

  function startAuto() { autoTimer = setInterval(function(){ goTo(current + 1); }, 5000); }
  function resetAuto()  { clearInterval(autoTimer); startAuto(); }

  if (prev) prev.addEventListener('click', function(){ goTo(current - 1); resetAuto(); });
  if (next) next.addEventListener('click', function(){ goTo(current + 1); resetAuto(); });

  dots.forEach(function(dot){
    dot.addEventListener('click', function(){
      goTo(parseInt(this.dataset.index));
      resetAuto();
    });
  });

  startAuto();
})();
</script>