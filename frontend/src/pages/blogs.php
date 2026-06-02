<?php
$pageTitle = 'Blogs – Resource Housing';
require_once __DIR__ . '/../data/blogs.php';
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
<section class="hero-bleed" style="position:relative; width:100%; min-height:480px; display:flex; align-items:center; overflow:hidden;">
  <img src="/public/assets/images/home-center2.jpg" alt="Resource Housing Blogs"
       style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; object-position:center; display:block;">
  <div style="position:absolute; inset:0; background:rgba(0,0,0,0.68);"></div>
  <div class="max-w-screen-xl mx-auto px-8 md:px-16" style="position:relative; z-index:1; width:100%;">
    <div style="max-width:680px;">
      <p class="hero-anim-fade hero-d1" style="font-family:'Abhaya Libre',serif; font-size:0.85rem; font-weight:700; color:var(--brand-primary); letter-spacing:0.2em; text-transform:uppercase; margin:0 0 16px; background:rgba(255,255,255,0.1); display:inline-block; padding:6px 16px;">
        Latest Articles
      </p>
      <h1 class="hero-anim-left hero-d2" style="font-family:'Abhaya Libre',serif; font-size:4.2rem; font-weight:700; color:#ffffff; line-height:1.15; margin:0 0 20px;">
        News &amp; Insights
      </h1>
      <p class="hero-anim-left hero-d3" style="font-family:'Abhaya Libre',serif; font-size:1.1rem; color:rgba(255,255,255,0.82); line-height:1.75; margin:0; max-width:520px;">
        Housing advice, compliance updates, and insights from the Resource Housing team.
      </p>
    </div>
  </div>
</section>

<!-- ===== BLOG GRID ===== -->
<section class="w-full py-24 bg-white">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">

    <div class="blogs-grid" data-stagger="100">
      <?php foreach ($blogs as $blog): ?>
      <article class="blog-card" data-animate="fade-up">

        <!-- Image -->
        <div class="blog-card-img">
          <img src="<?= htmlspecialchars($blog['image']) ?>" alt="<?= htmlspecialchars($blog['title']) ?>">
        </div>

        <!-- Body -->
        <div class="blog-card-body">

          <!-- Date badge + date text -->
          <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
            <div style="background:var(--brand-primary); color:#fff; padding:8px 14px; text-align:center; line-height:1.2; flex-shrink:0;">
              <div style="font-family:'Abhaya Libre',serif; font-weight:700; font-size:1.3rem;"><?= htmlspecialchars($blog['day']) ?></div>
              <div style="font-family:'Abhaya Libre',serif; font-size:0.72rem; opacity:0.85; text-transform:uppercase; letter-spacing:0.08em;"><?= htmlspecialchars($blog['day_name']) ?></div>
            </div>
            <div>
              <span class="blog-category"><?= htmlspecialchars($blog['category']) ?></span>
              <p style="font-family:'Abhaya Libre',serif; font-size:0.82rem; color:#999; margin:4px 0 0;"><?= htmlspecialchars($blog['read_time']) ?></p>
            </div>
          </div>

          <!-- Title -->
          <h3 style="font-family:'Abhaya Libre',serif; font-weight:700; font-size:1.15rem; color:#111111; margin:0 0 10px; line-height:1.4;">
            <?= htmlspecialchars($blog['title']) ?>
          </h3>

          <!-- Excerpt -->
          <p style="font-family:'Abhaya Libre',serif; font-size:0.92rem; color:#666666; line-height:1.7; margin:0 0 20px; flex:1;">
            <?= htmlspecialchars($blog['excerpt']) ?>
          </p>

          <!-- Read More -->
          <a href="<?= htmlspecialchars($blog['link']) ?>" class="blog-read-more">
            Read More
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
          </a>

        </div>
      </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>

</main>

<?php require __DIR__ . '/includes/becomeTenants.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>

<style>
  .blogs-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
  }
  .blog-card {
    background: #ffffff;
    border: 1px solid #e8e8e8;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .blog-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 40px rgba(0,0,0,0.1);
  }
  .blog-card-img {
    height: 220px;
    overflow: hidden;
  }
  .blog-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
  }
  .blog-card:hover .blog-card-img img {
    transform: scale(1.05);
  }
  .blog-card-body {
    padding: 24px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  .blog-category {
    display: inline-block;
    background: rgba(9,79,79,0.08);
    color: var(--brand-primary);
    font-family: 'Abhaya Libre', serif;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 3px 10px;
  }
  .blog-read-more {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-family: 'Abhaya Libre', serif;
    font-size: 0.92rem;
    font-weight: 700;
    color: var(--brand-primary);
    text-decoration: none;
    margin-top: auto;
    transition: gap 0.2s ease;
  }
  .blog-card:hover .blog-read-more { gap: 10px; }

  @media (max-width: 900px)  { .blogs-grid { grid-template-columns: repeat(2, 1fr); } }
  @media (max-width: 560px)  { .blogs-grid { grid-template-columns: 1fr; } }
  @media (max-width: 767px)  {
    section[style*="min-height:480px"] { min-height:280px !important; }
    h1[style*="font-size:4.2rem"] { font-size:2rem !important; }
  }
</style>

</body>
</html>
