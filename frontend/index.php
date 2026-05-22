<?php
// Simple front controller so the PHP built-in server can serve the site from the `frontend/` folder.
// It includes the existing page which lives at `src/pages/hero.php`.
require __DIR__ . '/src/pages/home.php';