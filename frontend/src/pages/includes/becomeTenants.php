<!-- ===== BECOME A TENANT ===== -->
<section class="px-8 md:px-16 py-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="relative rounded-lg overflow-hidden py-20 px-6 text-center"
         style="background-image: url('/public/assets/images/home-center2.jpg'); background-size: cover; background-position: center;">

      <!-- Teal overlay -->
      <div class="absolute inset-0" style="background-color: rgba(9, 79, 79, 0.78);"></div>

      <!-- Content -->
      <div class="relative z-10 max-w-xl mx-auto">
        <h2 class="text-white text-4xl font-bold mb-4" style="font-family:'Abhaya Libre',serif;">
          Become a Tenants
        </h2>
        <p class="text-white/80 text-sm leading-relaxed mb-8" style="font-family:'Abhaya Libre',serif;">
          Take the next step toward independent living with safe, supportive housing designed to help you build
          confidence, stability, and long-term tenancy skills.
        </p>
        <?php
        $onPmPage = isset($_SERVER['PHP_SELF']) && basename($_SERVER['PHP_SELF']) === 'propert-managment.php';
        $enquiryHref = $onPmPage ? '#tenants-enquiry' : '/src/pages/propert-managment.php#tenants-enquiry';
        ?>
        <a href="<?= $enquiryHref ?>"
           class="become-tenant-btn inline-block bg-white text-black text-sm font-semibold px-8 py-2.5 transition-all duration-200"
           style="font-family:'Abhaya Libre',serif; border: 1.5px solid white;">
          Tenants Enquiry
        </a>
      </div>

    </div>
  </div>
</section>

<style>
  .become-tenant-btn {
    border-radius: 0;
    text-decoration: none;
  }
  .become-tenant-btn:hover {
    background: transparent !important;
    color: #ffffff;
  }
</style>
