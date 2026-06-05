<!-- ===== EXPERTS SECTION ===== -->
<section style="position:relative; background:#0d3535; overflow:hidden; padding:90px 0;">

  <!-- Background image with teal overlay -->
  <img src="/public/assets/images/uk-houses/uk-9.jpg"
       alt="" aria-hidden="true"
       style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; opacity:0.45; pointer-events:none;">

  <div class="max-w-screen-xl mx-auto px-8 md:px-16" style="position:relative; z-index:1; display:flex; align-items:center; gap:72px;">

    <!-- ===== LEFT: Text + Stats ===== -->
    <div style="flex:1; min-width:0;">

      <h2 data-animate="fade-left" style="font-family:'Abhaya Libre',serif; font-size:3.4rem; font-weight:700; color:#ffffff; line-height:1.15; margin:0 0 24px;">
        The experts in local<br>and international<br>property
      </h2>

      <p data-animate="fade-left" data-animate-delay="120" style="font-family:'Abhaya Libre',serif; font-size:1rem; color:rgba(255,255,255,0.75); line-height:1.7; margin:0 0 44px; max-width:460px;">
        More than 100 House In Multiple Occupation and residential properties managed across Birmingham.
        Landlords and tenants choose Resource Housing because our standards are different.
      </p>

      <!-- Stats row -->
      <div style="display:flex; gap:12px;">
        <div class="expert-stat" data-animate="zoom-in" data-animate-delay="0">
          <span class="expert-stat-num" data-count="300+">300+</span>
          <span class="expert-stat-label">Happy Customers</span>
        </div>
        <div class="expert-stat" data-animate="zoom-in" data-animate-delay="140">
          <span class="expert-stat-num" data-count="900+">900+</span>
          <span class="expert-stat-label">Amazing Projects</span>
        </div>
        <div class="expert-stat" data-animate="zoom-in" data-animate-delay="280">
          <span class="expert-stat-num" data-count="20+">20+</span>
          <span class="expert-stat-label">Awards Winning</span>
        </div>
      </div>

    </div>

    <!-- ===== RIGHT: Image grid + badge ===== -->
    <div data-animate="fade-right" style="flex:1; min-width:0; position:relative;">

      <!-- Top image -->
      <img src="/public/assets/images/uk-houses/uk-5.jpg" alt="Property"
           style="width:100%; height:270px; object-fit:cover; display:block;">

      <!-- Bottom two images -->
      <div style="display:flex; gap:6px; margin-top:6px;">
        <img src="/public/assets/images/uk-houses/uk-11.jpg" alt="Property"
             style="flex:1; min-width:0; height:220px; object-fit:cover; display:block;">
        <img src="/public/assets/images/uk-houses/uk-12.jpg" alt="Property"
             style="flex:1; min-width:0; height:220px; object-fit:cover; display:block;">
      </div>

      <!-- Circle badge centred at the image junction -->
      <a href="/src/pages/properties.php"
         class="discover-badge"
         style="position:absolute; top:273px; left:50%; transform:translate(-50%,-50%);
                width:140px; height:140px; border-radius:50%;
                background-color:var(--brand-primary); display:block; text-decoration:none; z-index:10;">
        <img src="/public/assets/images/circle-tag/circle.svg"
             class="absolute" style="width:68px;height:68px;left:36px;top:36px;">
        <img src="/public/assets/images/circle-tag/image.png"
             class="discover-text-spin absolute" style="width:114px;height:114px;left:13px;top:13px;">
        <img src="/public/assets/images/circle-tag/arrow.svg"
             class="absolute z-10" style="width:30px;height:30px;left:55px;top:55px;">
      </a>

    </div>

  </div>
</section>

<style>
  .expert-stat {
    width: 175px;
    height: 145px;
    flex: 0 0 175px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    gap: 8px;
    padding: 15px 20px;
    box-sizing: border-box;
    /* Frosted glass */
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.28);
    backdrop-filter: blur(14px) saturate(1.6);
    -webkit-backdrop-filter: blur(14px) saturate(1.6);
    box-shadow:
      inset 0 1px 0 rgba(255,255,255,0.30),
      inset 1px 0 0 rgba(255,255,255,0.15),
      0 4px 24px rgba(0,0,0,0.15);
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .expert-stat:hover {
    transform: translateY(-4px);
    box-shadow:
      inset 0 1px 0 rgba(255,255,255,0.30),
      inset 1px 0 0 rgba(255,255,255,0.15),
      0 12px 36px rgba(0,0,0,0.22);
  }
  /* Top-left shine streak */
  .expert-stat::before {
    content: '';
    position: absolute;
    top: -40px;
    right: -20px;
    width: 80px;
    height: 200px;
    background: rgba(255,255,255,0.07);
    transform: rotate(25deg);
    pointer-events: none;
  }

  .expert-stat-num {
    font-family: 'Abhaya Libre', serif;
    font-size: 2.8rem;
    font-weight: 700;
    color: #ffffff;
    line-height: 1;
    margin-bottom: 6px;
  }
  .expert-stat-label {
    font-family: 'Abhaya Libre', serif;
    font-size: 0.9rem;
    color: rgba(255,255,255,0.7);
  }

  @media (max-width: 767px) {
    /* Stack columns */
    section[style*="background:#0d3535"] > div[style*="display:flex"] { flex-direction:column !important; gap:36px !important; }
    /* Shrink heading */
    section[style*="background:#0d3535"] h2 { font-size:2rem !important; }
    /* Shrink images */
    section[style*="background:#0d3535"] img[style*="height:270px"] { height:200px !important; }
    section[style*="background:#0d3535"] img[style*="height:220px"] { height:160px !important; }
    /* Stack stats */
    section[style*="background:#0d3535"] div[style*="display:flex; gap:12px"] { flex-wrap:wrap; }
    .expert-stat { min-width:calc(50% - 6px); }
    .expert-stat-num { font-size:2rem !important; }
    /* Hide badge on mobile */
    section[style*="background:#0d3535"] .discover-badge { display:none !important; }
  }
</style>
