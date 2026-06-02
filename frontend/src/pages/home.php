<?php
$pageTitle = 'Resource Housing - Your Home, Your Investment';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <link rel="icon" type="image/png" href="/public/assets/images/logo.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="/public/assets/css/style.css">
  <link rel="stylesheet" href="/public/assets/css/variables.css">
  <link rel="stylesheet" href="/public/assets/css/main.css">
</head>
<body class="bg-white">

<?php require __DIR__ . '/includes/header.php'; ?>

<main>
  <?php require __DIR__ . '/includes/heroSection.php'; ?>
  <?php require __DIR__ . '/includes/propertyServices.php'; ?>
  <?php require __DIR__ . '/includes/howItWorks.php'; ?>
  <?php require __DIR__ . '/includes/availableProperties.php'; ?>
  <?php require __DIR__ . '/includes/expertSection.php'; ?>
  <?php require __DIR__ . '/includes/testimonialsSection.php'; ?>
</main>

<?php require __DIR__ . '/includes/becomeTenants.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
