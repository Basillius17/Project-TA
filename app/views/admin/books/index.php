<?php
// app/views/admin/books/index.php
$pageTitle = 'Manajemen E-Book';
include BASE_PATH . 'app/views/layouts/admin_header.php';
?>
<div class="adm-page-hd">
  <h2>📚 Daftar E-Book</h2>
  <a href="<?= BASE_URL ?>?c=book&a=create" class="btn-primary">+ Tambah E-Book</a>
</div>

<div class="adm-card">
  <table class="adm-table">
    <thead>
      <tr><th>#</th><th>Cover</th><th>Judul & Penulis</th><th>Kategori</th><th>Harga</th><th>Rating</th><th>Bestseller</th><th>Aksi</th></tr>
    </thead>
    <tbody>
      <?php if(!empty($books)): $i=1; foreach($books as $b): ?>
      <tr>
        <td><?= $i++ ?></td>
        <td>
          <?php $imgSrc = Book::resolveImage($b); ?>
          <?php if($imgSrc): ?>
            <img src="<?= $imgSrc ?>" class="adm-thumb" alt="">
          <?php else: ?>
            <div class="adm-thumb-ph"><?= $b['icon'] ?? '📚' ?></div>
          <?php endif; ?>
        </td>
        <td>
          <strong><?= htmlspecialchars($b['title']) ?></strong><br>
          <small style="color:var(--gray-l)">✍️ <?= htmlspecialchars($b['author']) ?></small>
        </td>
        <td><span class="d-badge"><?= htmlspecialchars($b['category']) ?></span></td>
        <td style="font-weight:700;color:#ff6b35"><?= Book::formatPrice((float)$b['price']) ?></td>
        <td>⭐ <?= $b['rating'] ?></td>
        <td><?= !empty($b['is_bestseller']) ? '<span style="color:#f6c90e">🔥 Ya</span>' : '<span style="color:var(--gray-l)">Tidak</span>' ?></td>
        <td class="adm-actions">
          <a href="<?= BASE_URL ?>?c=book&a=edit&id=<?= $b['id'] ?>" class="btn-adm-edit">✏️ Edit</a>
          <a href="<?= BASE_URL ?>?c=book&a=delete&id=<?= $b['id'] ?>" class="btn-adm-del" onclick="return confirm('Hapus e-book ini?')">🗑 Hapus</a>
        </td>
      </tr>
      <?php endforeach; else: ?>
      <tr><td colspan="8" class="adm-empty">Belum ada e-book. <a href="<?= BASE_URL ?>?c=book&a=create">Tambah sekarang</a></td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php include BASE_PATH . 'app/views/layouts/admin_footer.php'; ?>
