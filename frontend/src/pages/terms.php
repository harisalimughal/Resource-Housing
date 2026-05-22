<?php $pageTitle = 'Terms of Use – Resource Housing'; ?>
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

<?php require __DIR__ . '/header.php'; ?>

<main class="max-w-screen-xl mx-auto px-8 md:px-16 py-20">
  <h1 class="text-4xl font-bold mb-4" style="color: var(--brand-primary); font-family:'Abhaya Libre',serif;">Terms of Use</h1>
  <p class="text-gray-600 text-lg leading-relaxed max-w-2xl" style="font-family:'Abhaya Libre',serif;">
    By accessing and using the Resource Housing website, you agree to be bound by these terms and conditions of use.
  </p>
</main>

<?php require __DIR__ . '/becomeTenants.php'; ?>
<?php require __DIR__ . '/footer.php'; ?>

</body>
</html>
