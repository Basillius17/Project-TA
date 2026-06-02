<?php
// app/views/admin/testimonials/edit.php
$pageTitle = 'Edit Testimoni';
include BASE_PATH . 'app/views/layouts/admin_header.php';
?>
<div class="adm-page-hd">
  <h2>✏️ Edit Testimoni</h2>
  <a href="<?= BASE_URL ?>?c=testimonial&a=index" class="btn-ghost">← Kembali</a>
</div>
<div class="adm-card adm-form-wrap">
  <form action="<?= BASE_URL ?>?c=testimonial&a=update" method="POST" class="adm-form">
    <input type="hidden" name="id" value="<?= $item['id'] ?>">
    <div class="form-row2">
      <div class="fg"><label>Nama *</label><input type="text" name="name" required value="<?= htmlspecialchars($item['name']) ?>"></div>
      <div class="fg"><label>Jabatan / Role</label><input type="text" name="role" value="<?= htmlspecialchars($item['role']) ?>"></div>
    </div>
    <div class="fg">
      <label>Rating</label>
      <select name="rating">
        <?php for($r=5;$r>=1;$r--): ?>
        <option value="<?= $r ?>" <?= $item['rating']==$r?'selected':'' ?>><?= str_repeat('⭐',$r) ?> (<?= $r ?>)</option>
        <?php endfor; ?>
      </select>
    </div>
    <div class="fg"><label>Pesan / Review *</label><textarea name="message" rows="4" required><?= htmlspecialchars($item['message']) ?></textarea></div>
    <div class="adm-form-actions">
      <button type="submit" class="btn-primary">Update Testimoni</button>
      <a href="<?= BASE_URL ?>?c=testimonial&a=index" class="btn-ghost">Batal</a>
    </div>
  </form>
</div>
<?php include BASE_PATH . 'app/views/layouts/admin_footer.php'; ?>
