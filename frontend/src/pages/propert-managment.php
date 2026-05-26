<?php $pageTitle = 'Property Management – Resource Housing'; ?>
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

<!-- ===== SECTION 1: HERO ===== -->
<section class="w-full py-16 bg-white">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">
    <div style="display:flex; align-items:center; gap:60px;">

      <!-- Left -->
      <div style="flex:1; min-width:0;">
<h1 style="font-family:'Abhaya Libre',serif; font-size:4.2rem; font-weight:700; color:#111111; line-height:1.15; margin:0 0 20px;">
          Welcome Home<br>with <span style="color:var(--brand-primary);">Resource<br>Housing</span>
        </h1>
        <p style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:#555555; line-height:1.75; margin:0 0 32px; max-width:480px;">
          At Resource Housing we provide more than just a place to live. We offer safe, supportive accommodation designed to help you move toward independent living. Our team gives you the comfort, stability, and personal support you need while helping you develop life skills or finding education or work opportunities.
        </p>
        <a href="#tenants-enquiry" class="design-btn-primary"
           style="display:inline-block; background:var(--brand-primary); color:#ffffff; font-family:'Abhaya Libre',serif; font-weight:600; font-size:1rem; padding:14px 32px; border-radius:0; border:1.5px solid var(--brand-primary); text-decoration:none; transition:background 0.25s ease, color 0.25s ease;">
          Apply Now
        </a>
      </div>

      <!-- Right: image -->
      <div style="flex:0 0 480px;">
        <img src="/public/assets/images/uk-houses/uk-6.jpg" alt="Resource Housing"
             style="width:100%; height:380px; object-fit:cover; display:block;">
      </div>

    </div>
  </div>
</section>

<!-- ===== SECTION 2: WHAT IS SUPPORTED ACCOMMODATION ===== -->
<section class="w-full py-20" style="background:#F8FAFC;">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">

    <h2 style="font-family:'Abhaya Libre',serif; font-size:3.2rem; font-weight:700; color:#111111; text-align:center; margin:0 0 52px;">
      What Is <span style="color:var(--brand-primary);">Supported Accommodation?</span>
    </h2>

    <div style="display:flex; align-items:center; gap:60px;">
      <div style="flex:1; min-width:0;">
        <img src="/public/assets/images/uk-houses/uk-7.jpg" alt="Supported Accommodation"
             style="width:100%; height:340px; object-fit:cover; display:block;">
      </div>
      <div style="flex:1; min-width:0;">
        <p style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:#555555; line-height:1.8; margin:0;">
          Supported accommodation is housing where you have your own space and privacy, while also getting access to support from trained staff who can help you in your daily life. We work with people who may need extra support to cope with life's challenges. Support may include assistance with benefits and applications. At Resource Housing, we believe everyone deserves a safe and supportive place to live. Our team is here to ensure that wherever you are in your journey, you always have the guidance and encouragement you need. We are committed to helping you move forward confidently toward a stable and fulfilling life.
        </p>
      </div>
    </div>

  </div>
</section>

<!-- ===== SECTION 3: WHO WE SUPPORT ===== -->
<section class="w-full py-20" style="background:var(--brand-primary);">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">
    <div style="display:flex; align-items:center; gap:60px;">

      <!-- Left: two stacked images -->
      <!-- Left: 3 images — 2 on top row, 1 on bottom -->
      <div style="flex:0 0 460px; display:flex; flex-direction:column; gap:10px;">
        <div style="display:flex; gap:10px;">
          <img src="/public/assets/images/uk-houses/uk-8.jpg" alt="Property"
               style="flex:1; min-width:0; height:210px; object-fit:cover; display:block;">
          <img src="/public/assets/images/uk-houses/uk-13.jpg" alt="Property"
               style="flex:1; min-width:0; height:210px; object-fit:cover; display:block;">
        </div>
        <img src="/public/assets/images/uk-houses/uk-11.jpg" alt="Property"
             style="width:100%; height:220px; object-fit:cover; display:block;">
      </div>

      <!-- Right: text -->
      <div style="flex:1; min-width:0;">
        <h2 style="font-family:'Abhaya Libre',serif; font-size:3.5rem; font-weight:700; color:#ffffff; margin:0 0 12px;">
          Who We Support
        </h2>
        <p style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:rgba(255,255,255,0.8); margin:0 0 24px; line-height:1.7;">
          We welcome referrals and applications from individuals who:
        </p>

        <?php
        $supportList = [
            'Are aged 18 or over',
            'Need a safe, stable home environment',
            'May have additional support needs',
            'Are ready to work with our team to build life skills and move toward independence',
        ];
        foreach ($supportList as $item): ?>
        <div style="display:flex; align-items:flex-start; gap:12px; margin-bottom:14px;">
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0; margin-top:2px;">
            <circle cx="11" cy="11" r="10" fill="#ffffff"/>
            <path d="M7 11l3 3 5-5" stroke="var(--brand-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:rgba(255,255,255,0.9); line-height:1.6;"><?= $item ?></span>
        </div>
        <?php endforeach; ?>

        <p style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:rgba(255,255,255,0.7); margin:20px 0 28px; line-height:1.6;">
          If you're unsure whether you qualify, get in touch — we'll guide you through the process.
        </p>

        <button onclick="document.getElementById('pmTenantModal').style.display='flex';" class="design-btn-outline"
                style="display:inline-block; border:1.5px solid #ffffff; color:#ffffff; background:transparent; font-family:'Abhaya Libre',serif; font-weight:600; font-size:0.95rem; padding:12px 28px; border-radius:0; cursor:pointer; transition:background 0.25s ease, color 0.25s ease;">
          Tenant Enquiry
        </button>
      </div>

    </div>
  </div>
</section>

<!-- ===== SECTION 4: YOUR RESPONSIBILITIES ===== -->
<section class="w-full py-20" style="background:#F8FAFC;">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">
    <div style="display:flex; align-items:center; gap:60px;">

      <!-- Left: text -->
      <div style="flex:1; min-width:0;">
        <h2 style="font-family:'Abhaya Libre',serif; font-size:3.5rem; font-weight:700; color:#111111; margin:0 0 16px;">
          Your <span style="color:var(--brand-primary);">Responsibilities</span>
        </h2>
        <p style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:#555555; line-height:1.75; margin:0 0 24px;">
          We believe in mutual respect and shared responsibility. As a tenant, you'll be expected to:
        </p>

        <?php
        $tenantResp = [
            'Pay rent or contribution through Benefits',
            'Respect your housemates, staff, and property',
            'Follow your tenancy agreement and house rules',
            'Engage with your support plan',
            'Communicate openly about concerns',
        ];
        foreach ($tenantResp as $item): ?>
        <div style="display:flex; align-items:flex-start; gap:12px; margin-bottom:14px;">
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0; margin-top:2px;">
            <circle cx="11" cy="11" r="10" fill="var(--brand-primary)"/>
            <path d="M7 11l3 3 5-5" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:#444444; line-height:1.6;"><?= $item ?></span>
        </div>
        <?php endforeach; ?>

        <p style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:#777777; margin-top:20px; line-height:1.6;">
          Our team will support you every step of the way — you'll never face these challenges alone.
        </p>
      </div>

      <!-- Right: image -->
      <div style="flex:1; min-width:0;">
        <img src="/public/assets/images/uk-houses/uk-2.jpg" alt="Responsibilities"
             style="width:100%; height:400px; object-fit:cover; display:block;">
      </div>

    </div>
  </div>
</section>

<!-- ===== SECTION 5: OUR RESPONSIBILITIES ===== -->
<section class="w-full py-20 bg-white">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">
    <div style="display:flex; align-items:center; gap:60px;">

      <!-- Left: image -->
      <div style="flex:1; min-width:0;">
        <img src="/public/assets/images/uk-houses/uk-15.jpg" alt="Our Responsibilities"
             style="width:100%; height:400px; object-fit:cover; display:block;">
      </div>

      <!-- Right: text -->
      <div style="flex:1; min-width:0;">
        <h2 style="font-family:'Abhaya Libre',serif; font-size:3.5rem; font-weight:700; color:#111111; margin:0 0 16px;">
          Our <span style="color:var(--brand-primary);">Responsibilities</span>
        </h2>
        <p style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:#555555; line-height:1.75; margin:0 0 24px;">
          We are committed to providing you with the best possible support and accommodation. Our responsibilities include:
        </p>

        <?php
        $ourResp = [
            'Providing safe, clean, and well-maintained accommodation',
            'Offering 24/7 support where needed',
            'Helping you develop life skills and independence',
            'Respecting your privacy and personal space',
            'Connecting you with community resources and services',
            'Supporting your transition to independent living',
        ];
        foreach ($ourResp as $item): ?>
        <div style="display:flex; align-items:flex-start; gap:12px; margin-bottom:14px;">
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0; margin-top:2px;">
            <circle cx="11" cy="11" r="10" fill="var(--brand-primary)"/>
            <path d="M7 11l3 3 5-5" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:#444444; line-height:1.6;"><?= $item ?></span>
        </div>
        <?php endforeach; ?>

        <p style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:#777777; margin-top:20px; line-height:1.6;">
          We're committed to being there for you and we'll be by your side to help you achieve your goals every step of the way.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ===== SECTION 6: HOW TO APPLY ===== -->
<section class="w-full py-20" style="background:#F8FAFC;">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">
    <div style="display:flex; align-items:center; gap:60px;">

      <!-- Left: steps -->
      <div style="flex:1; min-width:0;">
        <h2 style="font-family:'Abhaya Libre',serif; font-size:3.5rem; font-weight:700; color:#111111; margin:0 0 28px;">
          How to <span style="color:var(--brand-primary);">Apply</span>
        </h2>

        <?php
        $steps = [
            'Check your eligibility — fill out an online form to start a quick check',
            'Complete the application form — tell us a bit about your background and what you need',
            'Appointment meeting — we\'ll invite you for a friendly chat to understand your situation and how best we can support you',
            'Move in — once accepted, we\'ll help you settle in and begin your personalised support plan',
        ];
        foreach ($steps as $i => $step): ?>
        <div style="display:flex; align-items:flex-start; gap:12px; margin-bottom:20px;">
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0; margin-top:2px;">
            <circle cx="11" cy="11" r="10" fill="var(--brand-primary)"/>
            <path d="M7 11l3 3 5-5" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <p style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:#444444; line-height:1.7; margin:4px 0 0;"><?= $step ?></p>
        </div>
        <?php endforeach; ?>

        <p style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:#777777; margin-top:12px; line-height:1.6;">
          Need help with your application? Our team guide can walk you through every step — just call or email us.
        </p>
      </div>

      <!-- Right: image -->
      <div style="flex:1; min-width:0;">
        <img src="/public/assets/images/uk-houses/uk-12.jpg" alt="How to Apply"
             style="width:100%; height:420px; object-fit:cover; display:block;">
      </div>

    </div>
  </div>
</section>

<!-- ===== SECTION 7: NEED MORE INFORMATION ===== -->
<section class="w-full py-20" style="background:var(--brand-primary);">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">
    <div style="display:flex; align-items:center; gap:60px;">

      <!-- Left: image -->
      <div style="flex:1; min-width:0;">
        <img src="/public/assets/images/uk-houses/uk-10.jpg" alt="Contact"
             style="width:100%; height:380px; object-fit:cover; display:block;">
      </div>

      <!-- Right: contact info -->
      <div style="flex:1; min-width:0;">
        <h2 style="font-family:'Abhaya Libre',serif; font-size:3.5rem; font-weight:700; color:#ffffff; line-height:1.2; margin:0 0 16px;">
          Need More<br>Information?
        </h2>
        <p style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:rgba(255,255,255,0.8); line-height:1.75; margin:0 0 32px; max-width:420px;">
          Our team is ready to help with any questions about our services. Get in touch and we'll take care of the rest.
        </p>

        <div style="display:flex; align-items:flex-start; gap:14px; margin-bottom:18px;">
          <div style="flex-shrink:0; width:38px; height:38px; background:#ffffff; display:flex; align-items:center; justify-content:center;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="var(--brand-primary)"/>
            </svg>
          </div>
          <span style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:rgba(255,255,255,0.9); line-height:1.6; margin-top:8px;">1534 Country Road Birmingham B23 5TL</span>
        </div>

        <div style="display:flex; align-items:center; gap:14px; margin-bottom:18px;">
          <div style="flex-shrink:0; width:38px; height:38px; background:#ffffff; display:flex; align-items:center; justify-content:center;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z" fill="var(--brand-primary)"/>
            </svg>
          </div>
          <span style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:rgba(255,255,255,0.9);">01212345678</span>
        </div>

        <div style="display:flex; align-items:center; gap:14px;">
          <div style="flex-shrink:0; width:38px; height:38px; background:#ffffff; display:flex; align-items:center; justify-content:center;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" fill="var(--brand-primary)"/>
            </svg>
          </div>
          <span style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:rgba(255,255,255,0.9);">enquiries@resourcehousing.com</span>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- ===== SECTION 8: TENANTS ENQUIRY FORM ===== -->
<section id="tenants-enquiry" class="w-full py-20" style="background:#F8FAFC;">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">

    <h2 style="font-family:'Abhaya Libre',serif; font-size:3.5rem; font-weight:700; color:var(--brand-primary); text-align:center; margin:0 0 10px;">
      Tenants Enquiry
    </h2>
    <p style="font-family:'Abhaya Libre',serif; font-size:1.15rem; color:#777777; text-align:center; margin:0 0 48px;">
      Partner with Resource Housing for guaranteed rent and hassle-free management.
    </p>

    <form action="#" method="POST" style="max-width:860px; margin:0 auto;">

      <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">
        <input type="text" name="name" placeholder="Name" required
               style="width:100%; border:1px solid #dddddd; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1.05rem; color:#333; outline:none; box-sizing:border-box;">
        <input type="email" name="email" placeholder="Email"
               style="width:100%; border:1px solid #dddddd; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1.05rem; color:#333; outline:none; box-sizing:border-box;">
      </div>

      <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">
        <input type="date" name="date" id="enquiryDate"
               style="width:100%; border:1px solid #dddddd; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1.05rem; color:#333; outline:none; box-sizing:border-box; cursor:pointer;">
        <input type="tel" name="contact_number" placeholder="Contact Number"
               style="width:100%; border:1px solid #dddddd; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1.05rem; color:#333; outline:none; box-sizing:border-box;">
      </div>

      <div style="margin-bottom:28px;">
        <input type="text" name="address" placeholder="Address"
               style="width:100%; border:1px solid #dddddd; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1.05rem; color:#333; outline:none; box-sizing:border-box;">
      </div>

      <!-- Benefits checkboxes -->
      <div style="margin-bottom:24px;">
        <div style="display:flex; flex-wrap:wrap; gap:10px 28px;">
          <?php foreach ([
            'Universal Credit',
            'Housing Benefit',
            'Jobseeker\'s Allowance (JSA)',
            'Employment and Support Allowance (ESA)',
            'Personal Independence Payment (PIP)',
            'Disability Living Allowance (DLA)',
            'Income Support',
            'Carer\'s Allowance',
            'Pension Credit',
            'Other (please specify):',
          ] as $b): ?>
          <label style="display:flex; align-items:center; gap:8px; font-family:'Abhaya Libre',serif; font-size:1rem; color:#444; cursor:pointer;">
            <input type="checkbox" name="benefits[]" value="<?= htmlspecialchars($b) ?>" style="width:16px; height:16px; accent-color:var(--brand-primary);">
            <?= htmlspecialchars($b) ?>
            <?php if ($b === 'Other (please specify):'): ?>
            <input type="text" name="benefits_other" style="border:none; border-bottom:1px solid #aaa; outline:none; font-family:'Abhaya Libre',serif; font-size:1rem; width:140px; background:transparent;">
            <?php endif; ?>
          </label>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Textarea -->
      <div style="margin-bottom:24px;">
        <textarea name="situation" placeholder="Briefly describe your current situation or support needs..."
                  rows="4" style="width:100%; border:1px solid #dddddd; padding:14px 16px; font-family:'Abhaya Libre',serif; font-size:1.05rem; color:#333; outline:none; box-sizing:border-box; resize:vertical;"></textarea>
      </div>

      <!-- When do you need accommodation -->
      <div style="margin-bottom:20px;">
        <p style="font-family:'Abhaya Libre',serif; font-size:1rem; color:#444; margin:0 0 10px;">When do you need accommodation?</p>
        <div style="display:flex; gap:32px;">
          <?php foreach (['Immediately','Within 1 month','Flexible'] as $type): ?>
          <label style="display:flex; align-items:center; gap:8px; font-family:'Abhaya Libre',serif; font-size:1rem; color:#444; cursor:pointer;">
            <input type="radio" name="accommodation_when" value="<?= $type ?>" style="width:16px; height:16px; accent-color:var(--brand-primary);">
            <?= $type ?>
          </label>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Applying directly or through agency -->
      <div style="margin-bottom:24px;">
        <p style="font-family:'Abhaya Libre',serif; font-size:1rem; color:#444; margin:0 0 10px;">Are you applying directly or through an agency?</p>
        <div style="display:flex; gap:32px;">
          <?php foreach (['Myself','Referral agency'] as $src): ?>
          <label style="display:flex; align-items:center; gap:8px; font-family:'Abhaya Libre',serif; font-size:1rem; color:#444; cursor:pointer;">
            <input type="radio" name="application_source" value="<?= $src ?>" style="width:16px; height:16px; accent-color:var(--brand-primary);">
            <?= $src ?>
          </label>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Consent checkbox -->
      <div style="margin-bottom:28px;">
        <label style="display:flex; align-items:flex-start; gap:10px; font-family:'Abhaya Libre',serif; font-size:1rem; color:#444; cursor:pointer;">
          <input type="checkbox" name="consent" required style="width:16px; height:16px; flex-shrink:0; margin-top:3px; accent-color:var(--brand-primary);">
          I give consent for Resource Housing to use my information to process this application.
        </label>
      </div>

      <!-- Submit -->
      <div style="margin-bottom:20px;">
        <button type="submit" id="enquirySubmitBtn"
                style="width:100%; background:var(--brand-primary); color:#ffffff; font-family:'Abhaya Libre',serif; font-weight:600; font-size:1.05rem; padding:16px; border:1.5px solid var(--brand-primary); cursor:pointer; border-radius:0; letter-spacing:0.08em; display:flex; align-items:center; justify-content:center; gap:10px; transition:background 0.3s ease, color 0.3s ease, border-color 0.3s ease;">
          <span id="enquiryBtnText">SEND</span>
          <svg id="enquiryBtnTick" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:none;">
            <circle cx="10" cy="10" r="9" fill="rgba(255,255,255,0.25)"/>
            <path d="M6 10l3 3 5-5" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>

      <script>
      (function(){
        var form = document.getElementById('enquirySubmitBtn').closest('form');
        var btn  = document.getElementById('enquirySubmitBtn');
        var txt  = document.getElementById('enquiryBtnText');
        var tick = document.getElementById('enquiryBtnTick');
        if (!form || !btn) return;
        form.addEventListener('submit', function(e){
          e.preventDefault();
          txt.textContent = 'SUBMITTED';
          tick.style.display = 'block';
          tick.querySelector('circle').setAttribute('fill', 'rgba(0,0,0,0.1)');
          tick.querySelector('path').setAttribute('stroke', '#000000');
          btn.style.background = '#ffffff';
          btn.style.color = '#000000';
          btn.style.borderColor = 'var(--brand-primary)';
          btn.disabled = true;
          btn.style.cursor = 'default';
        });
      })();
      </script>

      <!-- Disclaimer -->
      <p style="font-family:'Abhaya Libre',serif; font-size:0.88rem; color:#888; text-align:center; line-height:1.6; margin:0;">
        Resource Housing complies with the Supported Accommodation Quality Standards and follows the National Statement of Expectations for Supported Housing to ensure every tenant receives safe, respectful, and high-quality support.
      </p>

    </form>
  </div>
</section>

</main>

<?php require __DIR__ . '/includes/becomeTenants.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>

<style>
  input[type="text"]::placeholder,
  input[type="email"]::placeholder,
  input[type="tel"]::placeholder { color:#aaa; }
  input[type="text"]:focus,
  input[type="email"]:focus,
  input[type="tel"]:focus { border-color: var(--brand-primary); }

  .design-btn-primary:hover { background:#ffffff !important; color:#000000 !important; }
  .design-btn-outline:hover  { background:#ffffff !important; color:#000000 !important; }
  #enquirySubmitBtn:hover:not(:disabled) { background:#ffffff !important; color:#000000 !important; border-color:var(--brand-primary) !important; }
</style>

</body>
</html>
