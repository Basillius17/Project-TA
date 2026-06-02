<?php // app/views/auth/login.php
// FIX: form action diperbaiki dari a=Login → a=doLogin
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Login Admin – Aset Ilmu</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body class="login-page">
<div class="login-wrap">
  <div class="login-deco deco1"></div>
  <div class="login-deco deco2"></div>
  <div class="login-card">
    <a href="<?= BASE_URL ?>" class="login-logo">📚 Aset<span>Ilmu</span></a>
    <h2>Selamat Datang 👋</h2>
    <p class="login-sub">Login ke panel admin Aset Ilmu</p>

    <?php if(!empty($flash)): ?>
    <div class="flash flash-<?= $flash['type'] ?>" style="position:relative;top:auto;right:auto;margin-bottom:1rem;animation:none">
      <?= htmlspecialchars($flash['message']) ?>
    </div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>?c=auth&a=doLogin" method="POST" class="login-form">
      <div class="fg">
        <label>Username</label>
        <input type="text" name="username" id="uname" placeholder="Masukkan username" value="admin" required autofocus>
      </div>
      <div class="fg">
        <label>Password</label>
        <div class="pass-wrap">
          <input type="password" name="password" id="passw" placeholder="Masukkan password" required>
          <button type="button" onclick="togglePw()" class="eye-btn">👁</button>
        </div>
      </div>
      <button type="submit" class="btn-primary btn-full">Masuk ke Dashboard</button>
    </form>
    <p class="login-hint">Default: <code>admin</code> / <code>asetilmu2025</code></p>
    <a href="<?= BASE_URL ?>" class="back-link">← Kembali ke Website</a>
  </div>
</div>
<script>
function togglePw(){
  const p = document.getElementById('passw');
  p.type = p.type === 'password' ? 'text' : 'password';
}
</script>
</body>
</html>
