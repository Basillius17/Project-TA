<?php
// app/views/admin/testimonials/create.php
$pageTitle = 'Tambah Testimoni';
include BASE_PATH . 'app/views/layouts/admin_header.php';
?>
<div class="adm-page-hd">
  <h2>+ Tambah Testimoni</h2>
  <a href="<?= BASE_URL ?>?c=testimonial&a=index" class="btn-ghost">← Kembali</a>
</div>
<div class="adm-card adm-form-wrap">
  <form action="<?= BASE_URL ?>?c=testimonial&a=store" method="POST" class="adm-form">
    <div class="form-row2">
      <div class="fg"><label>Nama *</label><input type="text" name="name" required placeholder="Nama pelanggan"></div>
      <div class="fg"><label>Jabatan / Role</label><input type="text" name="role" placeholder="CEO, Developer, dll."></div>
    </div>
    <div class="fg">
      <label>Rating</label>
      <select name="rating">
        <option value="5">⭐⭐⭐⭐⭐ (5)</option>
        <option value="4">⭐⭐⭐⭐ (4)</option>
        <option value="3">⭐⭐⭐ (3)</option>
        <option value="2">⭐⭐ (2)</option>
        <option value="1">⭐ (1)</option>
      </select>
    </div>
    <div class="fg"><label>Pesan / Review *</label><textarea name="message" rows="4" required placeholder="Tulis ulasan..."></textarea></div>
    <div class="adm-form-actions">
      <button type="submit" class="btn-primary">Simpan Testimoni</button>
      <a href="<?= BASE_URL ?>?c=testimonial&a=index" class="btn-ghost">Batal</a>
    </div>
  </form>
</div>
<?php include BASE_PATH . 'app/views/layouts/admin_footer.php'; ?>
