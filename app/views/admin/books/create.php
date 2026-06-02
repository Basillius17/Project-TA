<?php
// app/views/admin/books/create.php
$pageTitle = 'Tambah E-Book';
include BASE_PATH . 'app/views/layouts/admin_header.php';
?>
<div class="adm-page-hd">
  <h2>+ Tambah E-Book Baru</h2>
  <a href="<?= BASE_URL ?>?c=book&a=index" class="btn-ghost">← Kembali</a>
</div>
<div class="adm-card adm-form-wrap">
  <form action="<?= BASE_URL ?>?c=book&a=store" method="POST" enctype="multipart/form-data" class="adm-form">
    <div class="form-row2">
      <div class="fg"><label>Judul E-Book *</label><input type="text" name="title" required placeholder="Judul buku..."></div>
      <div class="fg"><label>Penulis *</label><input type="text" name="author" required placeholder="Nama penulis..."></div>
    </div>
    <div class="fg"><label>Deskripsi</label><textarea name="desc" rows="3" placeholder="Deskripsi singkat e-book..."></textarea></div>
    <div class="form-row2">
      <div class="fg">
        <label>Kategori</label>
        <select name="category">
          <option>Bisnis</option><option>Teknologi</option><option>Pengembangan Diri</option><option>Keuangan</option><option>Pendidikan</option><option>Fiksi</option><option>Kesehatan</option>
        </select>
      </div>
      <div class="fg"><label>Harga (Rp, isi 0 = GRATIS)</label><input type="number" name="price" min="0" step="1000" value="0"></div>
    </div>
    <div class="form-row2">
      <div class="fg"><label>Jumlah Halaman</label><input type="number" name="pages" min="1" value="100"></div>
      <div class="fg"><label>Rating (1-5)</label><input type="number" name="rating" min="1" max="5" step="0.1" value="4.5"></div>
    </div>
    <div class="form-row2">
      <div class="fg"><label>Emoji Icon (jika tidak ada foto)</label><input type="text" name="icon" value="📚" placeholder="📚"></div>
      <div class="fg">
        <label><input type="checkbox" name="is_bestseller" value="1"> Tandai sebagai Bestseller 🔥</label>
      </div>
    </div>
    <div class="fg">
      <label>Upload Cover Foto</label>
      <div class="upload-zone" id="uploadZone">
        <input type="file" name="image" id="imgFile" accept="image/*" onchange="previewCover(this)">
        <div class="uz-placeholder" id="uzPlaceholder">
          <span style="font-size:2.5rem">🖼️</span>
          <p>Klik atau drag & drop foto cover di sini</p>
          <small>JPG, PNG, WEBP – Max 5MB</small>
        </div>
        <img id="coverPreview" style="display:none;max-height:200px;border-radius:8px;margin-top:.5rem" alt="">
      </div>
    </div>
    <div class="adm-form-actions">
      <button type="submit" class="btn-primary">Simpan E-Book 💾</button>
      <a href="<?= BASE_URL ?>?c=book&a=index" class="btn-ghost">Batal</a>
    </div>
  </form>
</div>
<?php include BASE_PATH . 'app/views/layouts/admin_footer.php'; ?>
