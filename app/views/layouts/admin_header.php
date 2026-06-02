<?php // app/views/layouts/admin_header.php
// FIX: Pengecekan aktif sidebar diperbaiki agar akurat di semua halaman
$currentC = $_GET['c'] ?? '';
$currentA = $_GET['a'] ?? '';

// FIX: Dashboard aktif hanya saat benar-benar di halaman dashboard, bukan semua auth
$isDashboard = ($currentC === 'auth' && $currentA === 'dashboard');
$isBooks     = ($currentC === 'book');
$isTesti     = ($currentC === 'testimonial');
?><!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= $pageTitle ?? 'Admin' ?> – Aset Ilmu</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body class="dash-page">
<div class="dash-wrap">
  <aside class="dash-side">
    <div class="ds-logo">📚 Aset<span>Ilmu</span></div>
    <nav>
      <p class="ds-label">Konten</p>
      <a href="<?= BASE_URL ?>?c=book&a=index"        class="ds-link <?= $isBooks  ? 'active' : '' ?>">📚 E-Book</a>
      <a href="<?= BASE_URL ?>?c=testimonial&a=index" class="ds-link <?= $isTesti  ? 'active' : '' ?>">⭐ Testimoni</a>
      <p class="ds-label">Lainnya</p>
      <a href="<?= BASE_URL ?>?c=auth&a=dashboard"    class="ds-link <?= $isDashboard ? 'active' : '' ?>">📊 Dashboard</a>
      <a href="<?= BASE_URL ?>"                        class="ds-link" target="_blank">🌐 Lihat Website</a>
      <a href="<?= BASE_URL ?>?c=auth&a=logout"        class="ds-link ds-logout">🚪 Logout</a>
    </nav>
    <div class="ds-side-footer">
      <div class="ds-admin-info">
        <div class="ds-avatar"><?= strtoupper(substr($_SESSION['admin_name'] ?? 'A', 0, 1)) ?></div>
        <div class="ds-admin-detail">
          <span class="ds-admin-name"><?= htmlspecialchars($_SESSION['admin_name'] ?? 'Admin') ?></span>
          <span class="ds-admin-role">Administrator</span>
        </div>
      </div>
    </div>
  </aside>
  <div class="dash-main">
    <header class="dash-top">
      <div class="dash-top-left">
        <?php if (!$isDashboard): ?>
        <a href="<?= BASE_URL ?>?c=auth&a=dashboard" class="dash-back-btn">← Dashboard</a>
        <?php endif; ?>
        <h1 class="dash-top-title"><?= $pageTitle ?? 'Admin' ?></h1>
      </div>
      <div class="dash-top-right">
        <a href="<?= BASE_URL ?>" target="_blank" class="dash-top-icon-btn" title="Lihat Website">🌐</a>
        <div class="dash-notif-btn" title="Notifikasi"><span>🔔</span></div>
        <div class="dash-admin-badge">
          <div class="dab-avatar"><?= strtoupper(substr($_SESSION['admin_name'] ?? 'A', 0, 1)) ?></div>
          <div class="dab-info">
            <span class="dab-name"><?= htmlspecialchars($_SESSION['admin_name'] ?? 'Admin') ?></span>
            <span class="dab-role">Admin</span>
          </div>
        </div>
      </div>
    </header>
    <?php if(!empty($flash)): ?>
    <div class="flash flash-<?= $flash['type'] ?>">
      <?= htmlspecialchars($flash['message']) ?>
      <button onclick="this.parentElement.remove()">×</button>
    </div>
    <?php endif; ?>
    <div class="admin-body-content">
