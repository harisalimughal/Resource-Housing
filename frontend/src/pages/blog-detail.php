<?php
$pageTitle = 'Blog – Resource Housing';
require_once __DIR__ . '/../data/blogs.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$current = null;
foreach ($blogs as $b) {
    if ($b['id'] === $id) { $current = $b; break; }
}
if (!$current) {
    header('Location: /src/pages/blogs.php');
    exit;
}

$pageTitle = htmlspecialchars($current['title']) . ' – Resource Housing';
$related   = array_slice(array_values(array_filter($blogs, fn($b) => $b['id'] !== $id)), 0, 3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageTitle ?></title>
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

<!-- ===== HERO / BREADCRUMB ===== -->
<section class="hero-bleed" style="position:relative; width:100%; min-height:420px; display:flex; align-items:flex-end; overflow:hidden; padding-bottom:48px;">
  <img src="<?= htmlspecialchars($current['hero_image']) ?>" alt="<?= htmlspecialchars($current['title']) ?>"
       style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; object-position:center; display:block;">
  <div style="position:absolute; inset:0; background:linear-gradient(to bottom, rgba(0,0,0,0.35) 0%, rgba(0,0,0,0.75) 100%);"></div>
  <div class="max-w-screen-xl mx-auto px-8 md:px-16" style="position:relative; z-index:1; width:100%;">

    <!-- Breadcrumb -->
    <nav style="display:flex; align-items:center; gap:8px; font-family:'Abhaya Libre',serif; font-size:0.9rem; color:rgba(255,255,255,0.65); margin-bottom:20px;">
      <a href="/src/pages/index.php" style="color:rgba(255,255,255,0.65); text-decoration:none; transition:color 0.2s;">Home</a>
      <span>›</span>
      <a href="/src/pages/blogs.php" style="color:rgba(255,255,255,0.65); text-decoration:none; transition:color 0.2s;">Blogs</a>
      <span>›</span>
      <span style="color:#ffffff;"><?= htmlspecialchars($current['category']) ?></span>
    </nav>

    <span class="hero-anim-fade hero-d1" style="display:inline-block; background:var(--brand-primary); color:#ffffff; font-family:'Abhaya Libre',serif; font-size:0.8rem; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; padding:5px 16px; margin-bottom:16px;">
      <?= htmlspecialchars($current['category']) ?>
    </span>
    <h1 class="hero-anim-left hero-d2" style="font-family:'Abhaya Libre',serif; font-size:3rem; font-weight:700; color:#ffffff; line-height:1.2; margin:0; max-width:800px;">
      <?= htmlspecialchars($current['title']) ?>
    </h1>

  </div>
</section>

<!-- ===== ARTICLE ===== -->
<div class="blog-article" data-animate="fade-up">

  <!-- Meta bar -->
  <div class="blog-meta">
    <span class="blog-meta-badge"><?= htmlspecialchars($current['category']) ?></span>
    <span class="blog-meta-item">
      <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
      </svg>
      <?= htmlspecialchars($current['date']) ?>
    </span>
    <span class="blog-meta-item">
      <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
      </svg>
      <?= htmlspecialchars($current['author']) ?>
    </span>
    <span class="blog-meta-item">
      <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
      </svg>
      <?= htmlspecialchars($current['read_time']) ?>
    </span>
  </div>

  <!-- Content -->
  <div class="blog-content">
    <?php
    $content_file = __DIR__ . '/../data/blog-content/' . $id . '.php';
    if (file_exists($content_file)) {
        include $content_file;
    } else {
        echo '<p>Article content coming soon.</p>';
    }
    ?>
  </div>

  <!-- Share bar -->
  <div class="share-bar">
    <span style="font-family:'Abhaya Libre',serif; font-size:0.95rem; font-weight:700; color:#111111;">Share this article:</span>
    <a href="https://twitter.com/intent/tweet?text=<?= urlencode($current['title']) ?>"
       target="_blank" rel="noopener" class="share-btn" style="background:#1da1f2;" title="Share on Twitter" aria-label="Share on Twitter">
      <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/></svg>
    </a>
    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode('https://resourcehousing.co.uk/blog-detail.php?id=' . $id) ?>"
       target="_blank" rel="noopener" class="share-btn" style="background:#0077b5;" title="Share on LinkedIn" aria-label="Share on LinkedIn">
      <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
    </a>
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('https://resourcehousing.co.uk/blog-detail.php?id=' . $id) ?>"
       target="_blank" rel="noopener" class="share-btn" style="background:#1877f2;" title="Share on Facebook" aria-label="Share on Facebook">
      <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
    </a>
  </div>

</div>

<!-- ===== RELATED ARTICLES ===== -->
<?php if (!empty($related)): ?>
<section style="background:#F8FAFC; padding:80px 0 100px;">
  <div class="max-w-screen-xl mx-auto px-8 md:px-16">

    <div style="text-align:center; margin-bottom:48px;">
      <p data-animate="fade-up" style="font-family:'Abhaya Libre',serif; font-size:0.82rem; font-weight:700; color:var(--brand-primary); letter-spacing:0.2em; text-transform:uppercase; margin:0 0 10px;">Keep Reading</p>
      <h2 data-animate="fade-up" data-animate-delay="100" style="font-family:'Abhaya Libre',serif; font-size:2.8rem; font-weight:700; color:#111111; margin:0;">Related Articles</h2>
    </div>

    <div class="related-grid" data-stagger="120">
      <?php foreach ($related as $rel): ?>
      <article class="related-card" data-animate="fade-up">
        <div class="related-card-img">
          <img src="<?= htmlspecialchars($rel['image']) ?>" alt="<?= htmlspecialchars($rel['title']) ?>">
        </div>
        <div class="related-card-body">
          <div style="display:flex; align-items:center; gap:10px; margin-bottom:12px;">
            <span class="blog-category-pill"><?= htmlspecialchars($rel['category']) ?></span>
            <span style="font-family:'Abhaya Libre',serif; font-size:0.82rem; color:#999;"><?= htmlspecialchars($rel['date']) ?></span>
          </div>
          <h3 style="font-family:'Abhaya Libre',serif; font-weight:700; font-size:1.1rem; color:#111111; margin:0 0 10px; line-height:1.4;">
            <?= htmlspecialchars($rel['title']) ?>
          </h3>
          <p style="font-family:'Abhaya Libre',serif; font-size:0.88rem; color:#666; line-height:1.65; margin:0 0 18px; flex:1;">
            <?= htmlspecialchars($rel['excerpt']) ?>
          </p>
          <a href="<?= htmlspecialchars($rel['link']) ?>" class="blog-read-more-sm">
            Read More
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
          </a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>
<?php endif; ?>

</main>

<?php require __DIR__ . '/includes/becomeTenants.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>

<style>
  /* ── Article layout ──────────────────────────────── */
  .blog-article {
    max-width: 860px;
    margin: 0 auto;
    padding: 72px 24px 80px;
  }

  /* Meta bar */
  .blog-meta {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 44px;
    padding-bottom: 24px;
    border-bottom: 1px solid #e8e8e8;
  }
  .blog-meta-badge {
    background: var(--brand-primary);
    color: #fff;
    font-family: 'Abhaya Libre', serif;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 5px 14px;
  }
  .blog-meta-item {
    display: flex;
    align-items: center;
    gap: 6px;
    font-family: 'Abhaya Libre', serif;
    font-size: 0.92rem;
    color: #888888;
  }

  /* Article content typography */
  .blog-content p {
    font-family: 'Abhaya Libre', serif;
    font-size: 1.05rem;
    line-height: 1.85;
    color: #444444;
    margin-bottom: 22px;
  }
  .blog-content h2 {
    font-family: 'Abhaya Libre', serif;
    font-weight: 700;
    font-size: 1.5rem;
    color: #111111;
    margin: 44px 0 18px;
    padding-left: 18px;
    border-left: 4px solid var(--brand-primary);
    line-height: 1.3;
  }
  .blog-content img {
    width: 100%;
    height: 380px;
    object-fit: cover;
    display: block;
    margin: 36px 0;
  }
  .blog-content strong { color: #111111; }
  .blog-content a { color: var(--brand-primary); font-weight: 600; }

  /* Share bar */
  .share-bar {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 24px 0;
    margin-top: 48px;
    border-top: 1px solid #e8e8e8;
  }
  .share-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    color: #fff;
    text-decoration: none;
    transition: opacity 0.2s ease;
  }
  .share-btn:hover { opacity: 0.82; }

  /* Related grid */
  .related-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
  }
  .related-card {
    background: #fff;
    border: 1px solid #e8e8e8;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .related-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 36px rgba(0,0,0,0.09);
  }
  .related-card-img {
    height: 190px;
    overflow: hidden;
  }
  .related-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
  }
  .related-card:hover .related-card-img img { transform: scale(1.05); }
  .related-card-body {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  .blog-category-pill {
    display: inline-block;
    background: rgba(9,79,79,0.08);
    color: var(--brand-primary);
    font-family: 'Abhaya Libre', serif;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 3px 10px;
  }
  .blog-read-more-sm {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-family: 'Abhaya Libre', serif;
    font-size: 0.88rem;
    font-weight: 700;
    color: var(--brand-primary);
    text-decoration: none;
    margin-top: auto;
    transition: gap 0.2s ease;
  }
  .related-card:hover .blog-read-more-sm { gap: 9px; }

  @media (max-width: 767px) {
    .blog-article  { padding: 44px 20px 56px; }
    .blog-content h2 { font-size: 1.2rem; }
    .blog-content p  { font-size: 0.98rem; }
    .blog-content img { height: 220px; }
    .related-grid  { grid-template-columns: 1fr !important; }
    h1[style*="font-size:3rem"] { font-size: 1.8rem !important; }
    section[style*="min-height:420px"] { min-height: 260px !important; }
  }
  @media (max-width: 900px) {
    .related-grid { grid-template-columns: repeat(2, 1fr); }
  }
</style>

</body>
</html>
