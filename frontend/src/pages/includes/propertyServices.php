<!-- ===== PROPERTY SERVICES ===== -->
<section class="w-full py-16 bg-white">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">

    <!-- Section header -->
    <p class="text-xs font-semibold tracking-[0.2em] uppercase mb-3" style="color:#aaa; font-family:'Abhaya Libre',serif;">What We Provide</p>
    <h2 class="text-4xl md:text-5xl font-bold mb-12" style="color: var(--brand-primary); font-family:'Abhaya Libre',serif;">Property Services</h2>

    <!-- Cards grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 items-start" style="gap:24px;">

      <?php
      $cards = [
        [
          'title' => 'Property Management',
          'items' => ['Open for all','Quality and shared homes','All bills included','Free Wifi all properties','Available immediately'],
        ],
        [
          'title' => 'Property Compliances',
          'items' => ['Fire risk assessments','Asbestos management survey reports','Damp survey','Legionella','Pat testing','Fire detection certificate','Emergency lighting certificate','Property Maintenance'],
        ],
        [
          'title' => 'HMO',
          'items' => ['Diverse HMO Properties','Compliance & Safety','Professional Management','Supportive Environment','Convenient Locations'],
        ],
      ];
      foreach ($cards as $i => $card):
        $radius = '4px';
      ?>
      <div class="service-card" style="width:377px; max-width:100%; height:451px; padding:30px; border:1px solid #094F4F80; border-radius:<?= $radius ?>; overflow:hidden;">
        <div class="icon-box w-12 h-12 flex items-center justify-center mb-6" style="border-radius:4px;">
          <img src="/public/assets/images/house-black.svg" alt="<?= $card['title'] ?>" class="w-7 h-7 object-contain">
        </div>
        <h3 class="card-title text-xl font-bold mb-5" style="font-family:'Abhaya Libre',serif;"><?= $card['title'] ?></h3>
        <ul class="space-y-3">
          <?php foreach($card['items'] as $item): ?>
          <li class="flex items-center gap-3">
            <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 20 20" fill="none">
              <circle class="check-circle" cx="10" cy="10" r="9"/>
              <path class="check-path" d="M6 10l3 3 5-5" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="card-text text-sm" style="font-family:'Abhaya Libre',serif;"><?= $item ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<style>
  .service-card {
    background: #ffffff;
    transition: background-color 0.3s ease;
    cursor: default;
  }
  .service-card .icon-box        { background-color: #ffffff; border: 1.5px solid rgba(9,79,79,0.18); }
  .service-card .card-title      { color: #111111; }
  .service-card .card-text       { color: #4b5563; }
  .service-card .check-circle    { fill: var(--brand-primary); }

  /* Hover state */
  .service-card:hover                    { background-color: var(--brand-primary); border-color: var(--brand-primary) !important; }
  .service-card:hover .icon-box          { background-color: #ffffff; border-color: transparent; }
  .service-card:hover .card-title        { color: #ffffff; }
  .service-card:hover .card-text         { color: rgba(255,255,255,0.88); }
  .service-card:hover .check-circle      { fill: #ffffff; }
  .service-card:hover .check-path        { stroke: var(--brand-primary); }

  @media (max-width: 767px) {
    /* 1 column on mobile */
    .grid.grid-cols-1.md\\:grid-cols-3 { grid-template-columns:1fr !important; }
    /* Remove fixed height */
    .service-card { height:auto !important; }
  }
</style>