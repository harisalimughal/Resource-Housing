<!-- ===== TESTIMONIALS SECTION ===== -->
<?php
$testimonials = [
    [
        'quote'  => 'Resource Housing made the entire process of finding an HMO seamless and stress-free. The team was professional, responsive, and genuinely cared about finding us the right fit for our lifestyle and budget.',
        'name'   => 'JAMES WHITFIELD',
        'location' => '-Birmingham, UK',
        'avatar' => 'https://i.pravatar.cc/100?img=33',
    ],
    [
        'quote'  => 'As a landlord I have worked with many property managers, but Resource Housing stands out. They handle everything with transparency and keep me updated at every step. My properties have never been better managed.',
        'name'   => 'SARAH THOMPSON',
        'location' => '-Manchester, UK',
        'avatar' => 'https://i.pravatar.cc/100?img=47',
    ],
    [
        'quote'  => 'Crafted for your comfort, Resource Housing enhanced the quality of our living situation and paved the way for a more harmonious and stable future for both myself and my family. Truly exceptional service.',
        'name'   => 'AHMED HUSSAIN',
        'location' => '-Leeds, UK',
        'avatar' => 'https://i.pravatar.cc/100?img=11',
    ],
];
?>
<section class="w-full py-24" style="background:#f7f7f5;">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">
    <div style="display:flex; align-items:center; gap:80px;">

      <!-- ===== LEFT ===== -->
      <div style="flex:0 0 360px;">
        <h2 style="font-family:'Abhaya Libre',serif; font-size:3rem; font-weight:700; line-height:1.2; color:#111111; margin:0 0 40px;">
          What Our Clients<br>
          Says <span style="color:var(--brand-primary);">About Us</span>
        </h2>

        <div style="display:flex; gap:10px;">
          <button id="testimPrev" aria-label="Previous testimonial"
                  class="flex items-center justify-center transition-colors hover:bg-gray-100"
                  style="width:44px;height:44px;border:1.5px solid #bbb;background:#fff;border-radius:0;flex-shrink:0;">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
          </button>
          <button id="testimNext" aria-label="Next testimonial"
                  class="flex items-center justify-center transition-colors hover:bg-gray-100"
                  style="width:44px;height:44px;border:1.5px solid #bbb;background:#fff;border-radius:0;flex-shrink:0;">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
          </button>
        </div>
      </div>

      <!-- ===== RIGHT ===== -->
      <div style="flex:1; min-width:0; position:relative;">

        <?php foreach ($testimonials as $i => $t): ?>
        <div class="testimonial-slide" data-index="<?= $i ?>"
             style="display:<?= $i === 0 ? 'block' : 'none' ?>; transition:opacity 0.4s ease;">

          <!-- Opening quote -->
          <div style="font-family:'Abhaya Libre',serif; font-size:8rem; line-height:0.8; color:#94b8b8; margin-bottom:16px; height:68px;">&ldquo;</div>

          <!-- Quote text -->
          <p style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:#333333; line-height:1.75; margin:0 0 32px; max-width:640px;">
            <?= htmlspecialchars($t['quote']) ?>
          </p>

          <!-- Client row + closing quote -->
          <div style="display:flex; align-items:center; justify-content:space-between;">

            <div style="display:flex; align-items:center; gap:16px;">
              <!-- Avatar -->
              <img src="<?= $t['avatar'] ?>" alt="<?= htmlspecialchars($t['name']) ?>"
                   style="width:58px; height:58px; border-radius:50%; object-fit:cover; flex-shrink:0; display:block;">
              <!-- Name + location -->
              <div>
                <p style="font-family:'Abhaya Libre',serif; font-size:0.9rem; font-weight:700; color:#111111; letter-spacing:0.08em; margin:0 0 3px;">
                  <?= htmlspecialchars($t['name']) ?>
                </p>
                <p style="font-family:'Abhaya Libre',serif; font-size:0.82rem; color:#888888; letter-spacing:0.1em; margin:0;">
                  <?= htmlspecialchars($t['location']) ?>
                </p>
              </div>
            </div>

            <!-- Closing quote -->
            <div style="font-family:'Abhaya Libre',serif; font-size:8rem; line-height:0.8; color:#94b8b8; align-self:flex-end; height:68px;">&rdquo;</div>

          </div>

        </div>
        <?php endforeach; ?>

      </div>

    </div>
  </div>
</section>

<script>
(function(){
  var slides  = document.querySelectorAll('.testimonial-slide');
  var prev    = document.getElementById('testimPrev');
  var next    = document.getElementById('testimNext');
  if (!slides.length || !prev || !next) return;

  var current = 0;
  var total   = slides.length;

  function goTo(n) {
    slides[current].style.display = 'none';
    current = (n + total) % total;
    slides[current].style.display = 'block';
  }

  prev.addEventListener('click', function(){ goTo(current - 1); });
  next.addEventListener('click', function(){ goTo(current + 1); });
})();
</script>

<style>
  @media (max-width: 767px) {
    /* Stack left/right */
    section[style*="background:#f7f7f5"] > div > div[style*="display:flex"] { flex-direction:column !important; gap:32px !important; }
    /* Left panel: shrink fixed width */
    section[style*="background:#f7f7f5"] div[style*="flex:0 0 360px"] { flex:unset !important; width:100% !important; }
    /* Shrink heading */
    section[style*="background:#f7f7f5"] h2 { font-size:2rem !important; }
    /* Shrink quote marks */
    section[style*="background:#f7f7f5"] div[style*="font-size:8rem"] { font-size:4rem !important; height:36px !important; }
  }
</style>
