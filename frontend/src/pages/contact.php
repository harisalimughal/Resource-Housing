<?php $pageTitle = 'Contact Us – Resource Housing'; ?>
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
<section class="hero-bleed" style="position:relative; width:100%; min-height:580px; display:flex; align-items:center; overflow:hidden;">
  <img src="/public/assets/images/uk-houses/uk-10.jpg" alt="Contact Resource Housing"
       style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; object-position:center; display:block;">
  <div style="position:absolute; inset:0; background:rgba(0,0,0,0.70);"></div>
  <div class="max-w-screen-xl mx-auto px-8 md:px-16" style="position:relative; z-index:1; width:100%;">
    <div style="max-width:680px;">
      <h1 class="hero-anim-left hero-d1" style="font-family:'Abhaya Libre',serif; font-size:4.2rem; font-weight:700; color:#ffffff; line-height:1.15; margin:0 0 24px;">
        Resource Housing Ltd.
      </h1>
      <p class="hero-anim-left hero-d2" style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:rgba(255,255,255,0.82); line-height:1.75; margin:0; max-width:560px;">
        We are here to help you find what sits right for you. With properties and internationally, we are here to accommodate for your needs.
      </p>
    </div>
  </div>
</section>

<!-- ===== CONTACT FORM + INFO ===== -->
<section class="w-full py-20 bg-white">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">
    <div style="display:flex; align-items:flex-start; gap:80px;">

      <!-- Left: info -->
      <div data-animate="fade-left" style="flex:0 0 340px;">
        <h2 style="font-family:'Abhaya Libre',serif; font-size:2.6rem; font-weight:700; line-height:1.2; margin:0 0 20px;">
          <span style="color:#111111;">Get in touch<br></span>
          <span style="color:var(--brand-primary);">with us.</span>
        </h2>
        <p style="font-family:'Abhaya Libre',serif; font-size:1rem; color:#555555; line-height:1.8; margin:0 0 32px;">
          We are here to help you find what sits right for you. With properties and internationally, we are here to accommodate for your needs.
        </p>

        <!-- Address -->
        <div style="display:flex; align-items:flex-start; gap:12px; margin-bottom:16px;">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0; margin-top:3px;">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="var(--brand-primary)"/>
          </svg>
          <span style="font-family:'Abhaya Libre',serif; font-size:0.95rem; color:#444444; line-height:1.6;">1250 Coventry Road Birmingham, B25 8BJ</span>
        </div>

        <!-- Phone -->
        <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0;">
            <path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z" fill="var(--brand-primary)"/>
          </svg>
          <span style="font-family:'Abhaya Libre',serif; font-size:0.95rem; color:#444444;">07557538026</span>
        </div>

        <!-- Email -->
        <div style="display:flex; align-items:center; gap:12px;">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0;">
            <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" fill="var(--brand-primary)"/>
          </svg>
          <span style="font-family:'Abhaya Libre',serif; font-size:0.95rem; color:#444444;">resourcehousingwm@gmail.com</span>
        </div>
      </div>

      <!-- Right: form -->
      <div data-animate="fade-right" style="flex:1; min-width:0;">
        <form id="contactForm" action="#" method="POST">

          <div style="display:flex; gap:16px; margin-bottom:16px;">
            <input type="text" name="name" placeholder="Name"
                   style="flex:1; border:1px solid #dddddd; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1rem; color:#333; outline:none; box-sizing:border-box;">
            <input type="email" name="email" placeholder="Email"
                   style="flex:1; border:1px solid #dddddd; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1rem; color:#333; outline:none; box-sizing:border-box;">
          </div>

          <div style="display:flex; gap:16px; margin-bottom:16px;">
            <input type="tel" name="contact_number" placeholder="Contact Number"
                   style="flex:1; border:1px solid #dddddd; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1rem; color:#333; outline:none; box-sizing:border-box;">
            <input type="text" name="area" placeholder="Area"
                   style="flex:1; border:1px solid #dddddd; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1rem; color:#333; outline:none; box-sizing:border-box;">
          </div>

          <div style="margin-bottom:20px;">
            <textarea name="message" placeholder="Message..."
                      rows="5" style="width:100%; border:1px solid #dddddd; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1rem; color:#333; outline:none; box-sizing:border-box; resize:vertical;"></textarea>
          </div>

          <button type="submit" id="contactSubmitBtn"
                  style="background:var(--brand-primary); color:#ffffff; font-family:'Abhaya Libre',serif; font-weight:600; font-size:1rem; padding:14px 48px; border:1.5px solid var(--brand-primary); cursor:pointer; border-radius:0; letter-spacing:0.06em; display:inline-flex; align-items:center; gap:10px; transition:background 0.25s ease, color 0.25s ease;">
            <span id="contactBtnText">Submit</span>
            <svg id="contactBtnTick" width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:none;">
              <circle cx="10" cy="10" r="9" fill="rgba(0,0,0,0.1)"/>
              <path d="M6 10l3 3 5-5" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>

        </form>

        <script>
        (function(){
          var form = document.getElementById('contactForm');
          var btn  = document.getElementById('contactSubmitBtn');
          var txt  = document.getElementById('contactBtnText');
          var tick = document.getElementById('contactBtnTick');
          if (!form || !btn) return;
          form.addEventListener('submit', function(e){
            e.preventDefault();
            txt.textContent = 'Submitted';
            tick.style.display = 'inline-block';
            btn.style.background = '#ffffff';
            btn.style.color = '#000000';
            btn.style.borderColor = 'var(--brand-primary)';
            btn.disabled = true;
            btn.style.cursor = 'default';
          });
        })();
        </script>
      </div>

    </div>
  </div>
</section>

<!-- ===== MAP ===== -->
<section class="w-full" style="padding:0 0 80px; height:560px;">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16" data-animate="fade-up" style="height:100%;">
    <iframe
      src="https://maps.google.com/maps?q=1250+Coventry+Road+Birmingham+B25+8BJ+UK&t=&z=15&ie=UTF8&iwloc=&output=embed"
      width="100%" height="100%" style="border:0; display:block; min-height:480px;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
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
  }
  #contactSubmitBtn:hover:not(:disabled) { background:#ffffff !important; color:#000000 !important; border-color:var(--brand-primary) !important; }
  input::placeholder, textarea::placeholder { color:#aaa; }
  input:focus, textarea:focus { border-color:var(--brand-primary); }
</style>

</body>
</html>
