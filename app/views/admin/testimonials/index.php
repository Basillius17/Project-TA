<?php
// app/views/admin/testimonials/index.php
$pageTitle = 'Manajemen Testimoni';
include BASE_PATH . 'app/views/layouts/admin_header.php';
?>
<div class="adm-page-hd">
  <h2>⭐ Daftar Testimoni</h2>
  <a href="<?= BASE_URL ?>?c=testimonial&a=create" class="btn-primary">+ Tambah Testimoni</a>
</div>
<div class="adm-card">
  <table class="adm-table">
    <thead><tr><th>#</th><th>Avatar</th><th>Nama</th><th>Jabatan</th><th>Rating</th><th>Pesan</th><th>Aksi</th></tr></thead>
    <tbody>
      <?php if(!empty($testimonials)): $i=1; foreach($testimonials as $t): ?>
      <tr>
        <td><?= $i++ ?></td>
        <td><div class="testi-avatar" style="width:38px;height:38px;font-size:.9rem"><?= htmlspecialchars($t['avatar']) ?></div></td>
        <td><strong><?= htmlspecialchars($t['name']) ?></strong></td>
        <td style="color:var(--gray-l);font-size:.85rem"><?= htmlspecialchars($t['role']) ?></td>
        <td style="color:#f6c90e"><?= Testimonial::renderStars((int)$t['rating']) ?></td>
        <td style="font-size:.83rem;color:var(--gray-l)"><?= mb_strimwidth(htmlspecialchars($t['message']),0,60,'...') ?></td>
        <td class="adm-actions">
          <a href="<?= BASE_URL ?>?c=testimonial&a=edit&id=<?= $t['id'] ?>" class="btn-adm-edit">✏️ Edit</a>
          <a href="<?= BASE_URL ?>?c=testimonial&a=delete&id=<?= $t['id'] ?>" class="btn-adm-del" onclick="return confirm('Hapus testimoni?')">🗑 Hapus</a>
        </td>
      </tr>
      <?php endforeach; else: ?>
      <tr><td colspan="7" class="adm-empty">Belum ada testimoni.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php include BASE_PATH . 'app/views/layouts/admin_footer.php'; ?>
