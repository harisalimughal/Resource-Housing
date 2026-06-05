<?php
$_navPage    = basename($_SERVER["PHP_SELF"] ?? "");
$_isHome     = in_array($_navPage, ["index.php", "home.php"]);
$_isHmo        = ($_navPage === "hmo.php");
$_isPM         = ($_navPage === "propert-managment.php");
$_isCompliance = ($_navPage === "compliance.php");
$_isProps      = ($_navPage === "properties.php");
$_isAbout      = ($_navPage === "about.php");
$_isContact    = ($_navPage === "contact.php");
?>
<!-- ===== HEADER ===== -->
<header id="mainHeader" style="background-color: var(--brand-primary); position:sticky; top:0; z-index:100;" class="w-full">
  <div class="max-w-screen-xl mx-auto px-8 md:px-12 py-4 flex items-center justify-between">

    <!-- Logo -->
    <a href="/src/pages/index.php" class="no-underline" style="text-decoration:none;">
      <img src="/public/assets/images/logo.png" alt="Resource Housing" class="h-20 w-auto object-contain">
    </a>

    <!-- Desktop Navigation -->
    <nav class="hidden md:flex items-center gap-6">
      <a href="/src/pages/index.php"           class="header-nav-link <?= $_isHome       ? 'font-bold' : '' ?>">Home</a>
      <a href="/src/pages/hmo.php"             class="header-nav-link <?= $_isHmo        ? 'font-bold' : '' ?>">Co-living</a>
      <a href="/src/pages/propert-managment.php" class="header-nav-link <?= $_isPM       ? 'font-bold' : '' ?>">Property Management</a>
      <a href="/src/pages/compliance.php"      class="header-nav-link <?= $_isCompliance ? 'font-bold' : '' ?>">Property Compliance</a>
      <a href="/src/pages/properties.php"      class="header-nav-link <?= $_isProps      ? 'font-bold' : '' ?>">Properties</a>
      <a href="/src/pages/about.php"           class="header-nav-link <?= $_isAbout      ? 'font-bold' : '' ?>">About Us</a>
      <a href="/src/pages/contact.php"         class="header-nav-link <?= $_isContact    ? 'font-bold' : '' ?>">Contact Us</a>
    </nav>

    <!-- CTA -->
    <div class="hidden md:block">
      <a href="/src/pages/contact.php"
         class="header-cta-btn text-black text-sm font-semibold px-6 py-2 transition-all duration-200"
         style="background:#fff; border: 1.5px solid white; font-family:'Abhaya Libre',serif;">
        Get in Touch
      </a>
    </div>

    <!-- Mobile menu toggle -->
    <button id="mobileMenuBtn" class="md:hidden p-2 text-white focus:outline-none" aria-label="Open menu">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
  </div>

  <!-- Mobile menu backdrop -->
  <div id="mobileMenuBackdrop" class="hidden fixed inset-0 bg-black/60 z-40"></div>

  <!-- Mobile menu panel -->
  <div id="mobileMenu" class="md:hidden hidden fixed inset-0 z-50 overflow-auto">
    <div class="flex items-start justify-center min-h-full pt-16 px-4 pb-6">
      <div id="mobileMenuPanel"
           class="w-full max-w-md rounded-2xl shadow-2xl overflow-hidden pointer-events-auto opacity-0 scale-95 translate-y-2 transform transition-all duration-300 ease-out"
           style="background-color: var(--brand-primary); border: 1px solid rgba(255,255,255,0.15);">

        <!-- Panel header -->
        <div class="flex items-center justify-between px-6 py-4" style="border-bottom: 1px solid rgba(255,255,255,0.15);">
          <div>
            <img src="/public/assets/images/logo.png" alt="Resource Housing" class="h-10 w-auto object-contain">
          </div>
          <button id="mobileMenuCloseBtn" class="p-2 rounded text-white hover:bg-white/10 transition-colors" aria-label="Close menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>

        <!-- Nav links -->
        <div class="px-6 py-4 space-y-1">
          <a href="/src/pages/index.php"             class="block py-2 text-white hover:text-white/70 transition-colors <?= $_isHome       ? 'font-bold' : '' ?>">Home</a>
          <a href="/src/pages/hmo.php"               class="block py-2 text-white/90 hover:text-white transition-colors <?= $_isHmo        ? 'font-bold' : '' ?>">Co-living</a>
          <a href="/src/pages/propert-managment.php" class="block py-2 text-white/90 hover:text-white transition-colors <?= $_isPM         ? 'font-bold' : '' ?>">Property Management</a>
          <a href="/src/pages/compliance.php"        class="block py-2 text-white/90 hover:text-white transition-colors <?= $_isCompliance ? 'font-bold' : '' ?>">Property Compliance</a>
          <a href="/src/pages/properties.php"        class="block py-2 text-white/90 hover:text-white transition-colors <?= $_isProps      ? 'font-bold' : '' ?>">Properties</a>
          <a href="/src/pages/about.php"             class="block py-2 text-white/90 hover:text-white transition-colors <?= $_isAbout      ? 'font-bold' : '' ?>">About Us</a>
          <a href="/src/pages/contact.php"           class="block py-2 text-white/90 hover:text-white transition-colors <?= $_isContact    ? 'font-bold' : '' ?>">Contact Us</a>

          <div class="pt-4 flex justify-center">
            <a href="/src/pages/contact.php"
               class="header-cta-btn text-center text-black text-sm font-semibold px-6 py-2.5 transition-all duration-200"
               style="background:#fff; border: 1.5px solid white; font-family:'Abhaya Libre',serif;">
              Get in Touch
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<style>
  .header-nav-link {
    color: rgba(255, 255, 255, 0.85);
    font-size: 1.1rem;
    font-family: 'Abhaya Libre', serif;
    transition: color 0.2s ease;
    text-decoration: none;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    display: inline-flex;
    align-items: center;
    height: 30px;
    min-width: 50px;
    opacity: 1;
    transform: rotate(0deg);
  }
  .header-nav-link:hover,
  .header-nav-link.font-bold {
    color: #ffffff;
  }
  .header-cta-btn {
    border-radius: 0;
    display: inline-block;
    text-decoration: none;
  }
  .header-cta-btn:hover {
    background: transparent !important;
    color: #ffffff;
  }
</style>

<!-- Splash screen -->
<div id="splashScreen" aria-hidden="true" class="fixed inset-0 z-50 flex items-center justify-center"
     style="background: rgba(9,79,79,0.92); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px); transition: opacity .35s ease, visibility .35s;">
  <div class="flex flex-col items-center gap-6">
    <img src="/public/assets/images/logo.png" alt="Resource Housing"
         style="width:100px;height:100px;object-fit:contain;">
    <div class="splash-dots">
      <span class="splash-dot" style="animation-delay: 0s;"></span>
      <span class="splash-dot" style="animation-delay: 0.18s;"></span>
      <span class="splash-dot" style="animation-delay: 0.36s;"></span>
    </div>
  </div>
</div>

<style>
  .splash-dots { display: flex; align-items: center; gap: 10px; }
  .splash-dot {
    width: 10px; height: 10px;
    border-radius: 50%;
    background: #ffffff;
    display: inline-block;
    animation: splash-bounce 0.7s ease-in-out infinite alternate;
  }
  @keyframes splash-bounce {
    from { transform: translateY(0);    opacity: 0.5; }
    to   { transform: translateY(-10px); opacity: 1;   }
  }
  @media (prefers-reduced-motion: reduce) { .splash-dot { animation: none !important; } }
  #splashScreen.hidden { opacity: 0 !important; visibility: hidden !important; pointer-events: none !important; }
</style>

<script>
(function(){
  var splash = document.getElementById('splashScreen');
  if (!splash) return;
  function hideSplash() { splash.classList.add('hidden'); }

  // Hide immediately when browser restores page from cache (back/forward navigation)
  window.addEventListener('pageshow', function(e) {
    if (e.persisted) { hideSplash(); }
  });

  var t = setTimeout(hideSplash, 1400);
  window.addEventListener('load', function(){ clearTimeout(t); setTimeout(hideSplash, 350); });

  document.addEventListener('click', function(e){
    var a = e.target.closest && e.target.closest('a');
    if (!a) return;
    var href = a.getAttribute('href');
    if (!href || href.indexOf('#') === 0 || href.indexOf('mailto:') === 0 || href.indexOf('tel:') === 0) return;
    if (a.target === '_blank') return;
    try { if (new URL(href, location.href).origin !== location.origin) return; } catch(x){ return; }
    e.preventDefault();
    splash.classList.remove('hidden');
    setTimeout(function(){ location.href = a.href; }, 550);
  }, true);

  // Mobile menu
  var btn      = document.getElementById('mobileMenuBtn');
  var closeBtn = document.getElementById('mobileMenuCloseBtn');
  var menu     = document.getElementById('mobileMenu');
  var panel    = document.getElementById('mobileMenuPanel');
  var backdrop = document.getElementById('mobileMenuBackdrop');

  function openMenu() {
    menu.classList.remove('hidden');
    backdrop.classList.remove('hidden');
    requestAnimationFrame(function(){
      panel.classList.remove('opacity-0','scale-95','translate-y-2');
      panel.classList.add('opacity-100','scale-100','translate-y-0');
    });
    document.body.style.overflow = 'hidden';
  }
  function closeMenu() {
    panel.classList.add('opacity-0','scale-95','translate-y-2');
    panel.classList.remove('opacity-100','scale-100','translate-y-0');
    setTimeout(function(){
      menu.classList.add('hidden');
      backdrop.classList.add('hidden');
      document.body.style.overflow = '';
    }, 300);
  }

  if (btn)      btn.addEventListener('click', openMenu);
  if (closeBtn) closeBtn.addEventListener('click', closeMenu);
  if (backdrop) backdrop.addEventListener('click', closeMenu);

})();
</script>
