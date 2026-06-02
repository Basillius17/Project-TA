<?php // app/views/layouts/header.php ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Aset Ilmu – Platform e-book startup digital terpercaya. Investasikan waktumu untuk ilmu yang menghasilkan.">
<title><?= $pageTitle ?? 'Aset Ilmu – Investasi Terbaik adalah Ilmu' ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css?v=<?= filemtime(BASE_PATH.'assets/css/style.css') ?>">
</head>
<body>

<nav class="navbar" id="navbar">
  <div class="nav-inner">
    <a href="<?= BASE_URL ?>" class="nav-logo">
      <span class="logo-mark">📚</span>
      <span class="logo-name">Aset<span class="logo-accent">Ilmu</span></span>
    </a>
    <ul class="nav-menu" id="navMenu">
      <li><a href="<?= BASE_URL ?>#beranda"   class="nav-link">Beranda</a></li>
      <li><a href="<?= BASE_URL ?>#tentang"   class="nav-link">Tentang</a></li>
      <li><a href="<?= BASE_URL ?>#katalog"   class="nav-link">Katalog</a></li>
      <li><a href="<?= BASE_URL ?>#testimoni" class="nav-link">Testimoni</a></li>
      <li><a href="<?= BASE_URL ?>#info-kontak"    class="nav-link">Kontak</a></li>
    </ul>
    <div class="nav-cta">
      <?php if (!empty($_SESSION['admin_id'])): ?>
        <a href="<?= BASE_URL ?>?c=auth&a=dashboard" class="btn-admin">Dashboard</a>
        <a href="<?= BASE_URL ?>?c=auth&a=logout"    class="btn-logout">Logout</a>
      <?php else: ?>
        <a href="<?= BASE_URL ?>?c=auth&a=login" class="btn-login">Login Admin</a>
        <a href="<?= BASE_URL ?>#katalog"         class="btn-cta-nav">Mulai Belajar ✨</a>
      <?php endif; ?>
    </div>
    <button class="burger" id="burger">&#9776;</button>
  </div>
</nav>

<?php if (!empty($flash)): ?>
<div class="flash flash-<?= $flash['type'] ?>" id="flashEl">
  <?= htmlspecialchars($flash['message']) ?>
  <button onclick="this.parentElement.remove()">×</button>
</div>
<?php endif; ?>
