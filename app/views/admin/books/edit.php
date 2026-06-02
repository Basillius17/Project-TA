<?php
// app/views/admin/books/edit.php
$pageTitle = 'Edit E-Book';
include BASE_PATH . 'app/views/layouts/admin_header.php';
$imgPath = !empty($book['image']) && file_exists(BASE_PATH.'uploads/books/'.$book['image'])
    ? BASE_URL.'uploads/books/'.htmlspecialchars($book['image']) : '';
?>
<div class="adm-page-hd">
  <h2>✏️ Edit E-Book</h2>
  <a href="<?= BASE_URL ?>?c=book&a=index" class="btn-ghost">← Kembali</a>
</div>
<div class="adm-card adm-form-wrap">
  <form action="<?= BASE_URL ?>?c=book&a=update" method="POST" enctype="multipart/form-data" class="adm-form">
    <input type="hidden" name="id" value="<?= $book['id'] ?>">
    <div class="form-row2">
      <div class="fg"><label>Judul E-Book *</label><input type="text" name="title" required value="<?= htmlspecialchars($book['title']) ?>"></div>
      <div class="fg"><label>Penulis *</label><input type="text" name="author" required value="<?= htmlspecialchars($book['author']) ?>"></div>
    </div>
    <div class="fg"><label>Deskripsi</label><textarea name="desc" rows="3"><?= htmlspecialchars($book['desc'] ?? '') ?></textarea></div>
    <div class="form-row2">
      <div class="fg">
        <label>Kategori</label>
        <select name="category">
          <?php foreach(['Bisnis','Teknologi','Pengembangan Diri','Keuangan','Pendidikan','Fiksi','Kesehatan'] as $cat): ?>
          <option <?= ($book['category']==$cat)?'selected':'' ?>><?= $cat ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="fg"><label>Harga (Rp)</label><input type="number" name="price" min="0" step="1000" value="<?= $book['price'] ?>"></div>
    </div>
    <div class="form-row2">
      <div class="fg"><label>Jumlah Halaman</label><input type="number" name="pages" min="1" value="<?= $book['pages'] ?>"></div>
      <div class="fg"><label>Rating</label><input type="number" name="rating" min="1" max="5" step="0.1" value="<?= $book['rating'] ?>"></div>
    </div>
    <div class="form-row2">
      <div class="fg"><label>Emoji Icon</label><input type="text" name="icon" value="<?= htmlspecialchars($book['icon'] ?? '📚') ?>"></div>
      <div class="fg" style="justify-content:flex-end;padding-top:1.5rem">
        <label><input type="checkbox" name="is_bestseller" value="1" <?= !empty($book['is_bestseller'])?'checked':'' ?>> Bestseller 🔥</label>
      </div>
    </div>
    <div class="fg">
      <label>Cover Foto (kosongkan jika tidak diganti)</label>
      <?php if($imgPath): ?>
        <div style="margin-bottom:.75rem">
          <p style="font-size:.8rem;color:var(--gray-l);margin-bottom:.4rem">Cover saat ini:</p>
          <img src="<?= $imgPath ?>" style="max-height:160px;border-radius:10px;border:1px solid var(--border)" id="coverPreview" alt="">
        </div>
      <?php else: ?>
        <img id="coverPreview" style="display:none;max-height:160px;border-radius:10px;margin-bottom:.5rem" alt="">
      <?php endif; ?>
      <div class="upload-zone">
        <input type="file" name="image" accept="image/*" onchange="previewCover(this)">
        <div class="uz-placeholder"><span>📁</span><p>Pilih foto baru untuk mengganti</p></div>
      </div>
    </div>
    <div class="adm-form-actions">
      <button type="submit" class="btn-primary">Update E-Book 💾</button>
      <a href="<?= BASE_URL ?>?c=book&a=index" class="btn-ghost">Batal</a>
    </div>
  </form>
</div>
<?php include BASE_PATH . 'app/views/layouts/admin_footer.php'; ?>
