<?php // app/views/auth/dashboard.php
$pageTitle = 'Dashboard';
include BASE_PATH . 'app/views/layouts/admin_header.php';

// Hitung kategori dari semua buku
$categoryCounts = [];
foreach (($books ?? []) as $b) {
    $cat = $b['category'] ?? 'Lainnya';
    $categoryCounts[$cat] = ($categoryCounts[$cat] ?? 0) + 1;
}
arsort($categoryCounts);

// Bestseller
$bestsellers = array_values(array_filter($books ?? [], fn($b) => !empty($b['is_bestseller'])));

// Avg rating
$ratings = array_filter(array_column($books ?? [], 'rating'));
$avgRating = count($ratings) ? round(array_sum($ratings) / count($ratings), 1) : 0;
?>

<!-- ── WELCOME BANNER ── -->
<div class="db-welcome">
  <div class="db-welcome-text">
    <h2>Selamat Datang, <?= htmlspecialchars($adminName ?? $_SESSION['admin_name'] ?? 'Admin') ?>! 👋</h2>
    <p>Ringkasan data platform AsetIlmu — semua dalam satu tempat.</p>
  </div>
  <div class="db-welcome-actions">
    <a href="<?= BASE_URL ?>?c=book&a=create" class="dq-btn">+ Tambah E-Book</a>
    <a href="<?= BASE_URL ?>?c=testimonial&a=create" class="dq-btn dq-outline">+ Testimoni</a>
  </div>
</div>

<!-- ── STAT CARDS ── -->
<div class="dash-stats">
  <div class="ds-card">
    <div class="dsc-icon">📚</div>
    <div class="dsc-num"><?= (int)($totalBooks ?? 0) ?></div>
    <div class="dsc-label">Total E-Book</div>
    <div class="dsc-sub">Produk aktif</div>
  </div>
  <div class="ds-card">
    <div class="dsc-icon">💬</div>
    <div class="dsc-num"><?= (int)($totalTesti ?? 0) ?></div>
    <div class="dsc-label">Testimoni</div>
    <div class="dsc-sub">Ulasan pembaca</div>
  </div>
  <div class="ds-card">
    <div class="dsc-icon">⭐</div>
    <div class="dsc-num dsc-yellow"><?= $avgRating ?></div>
    <div class="dsc-label">Rating Rata-rata</div>
    <div class="dsc-sub">Dari skala 1–5</div>
  </div>
  <div class="ds-card">
    <div class="dsc-icon">🏆</div>
    <div class="dsc-num"><?= count($bestsellers) ?></div>
    <div class="dsc-label">Bestseller</div>
    <div class="dsc-sub">Buku unggulan</div>
  </div>
</div>

<!-- ── MAIN GRID ── -->
<div class="db-main-grid">

  <!-- TABEL SEMUA E-BOOK -->
  <div class="dash-card db-books-full">
    <div class="dash-card-head">
      <div class="dch-left">
        <h3>📚 Semua E-Book</h3>
        <span class="dch-count"><?= count($books ?? []) ?> produk</span>
      </div>
      <a href="<?= BASE_URL ?>?c=book&a=index" class="dch-link">Kelola semua →</a>
    </div>

    <!-- Filter Kategori -->
    <div class="db-filter-bar">
      <button class="db-filt active" data-cat="all">Semua</button>
      <?php foreach (array_keys($categoryCounts) as $cat): ?>
        <button class="db-filt" data-cat="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></button>
      <?php endforeach; ?>
    </div>

    <div class="db-books-grid" id="booksGrid">
      <?php foreach ($books ?? [] as $b):
        $imgSrc = Book::resolveImage($b);
        $isBest = !empty($b['is_bestseller']);
      ?>
      <div class="db-book-card" data-cat="<?= htmlspecialchars($b['category'] ?? '') ?>">
        <?php if ($isBest): ?><span class="db-best-badge">🔥 Best</span><?php endif; ?>
        <div class="db-book-cover">
          <?php if ($imgSrc): ?>
            <img src="<?= htmlspecialchars($imgSrc) ?>" alt="<?= htmlspecialchars($b['title']) ?>" class="db-book-img">
          <?php else: ?>
            <span class="db-book-icon"><?= $b['icon'] ?? '📖' ?></span>
          <?php endif; ?>
          <span class="db-cat-tag"><?= htmlspecialchars($b['category'] ?? '') ?></span>
        </div>
        <div class="db-book-body">
          <h4 class="db-book-title"><?= htmlspecialchars($b['title']) ?></h4>
          <p class="db-book-author">✍️ <?= htmlspecialchars($b['author'] ?? '') ?></p>
          <div class="db-book-footer">
            <span class="db-book-price"><?= Book::formatPrice((float)($b['price'] ?? 0)) ?></span>
            <a href="<?= BASE_URL ?>?c=book&a=edit&id=<?= $b['id'] ?>" class="btn-adm-edit">✏️ Edit</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- SIDEBAR KANAN -->
  <div class="db-sidebar">

    <!-- Kategori -->
    <div class="dash-card">
      <div class="dash-card-head">
        <h3>📂 Kategori</h3>
      </div>
      <ul class="db-cat-list">
        <?php foreach ($categoryCounts as $cat => $count): ?>
        <li>
          <span class="db-cat-name"><?= htmlspecialchars($cat) ?></span>
          <span class="db-cat-badge"><?= $count ?> Buku</span>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <!-- Bestseller -->
    <div class="dash-card" style="margin-top:1.25rem">
      <div class="dash-card-head">
        <h3>🏆 Bestseller</h3>
      </div>
      <?php if (!empty($bestsellers)): ?>
      <ul class="db-bs-list">
        <?php foreach ($bestsellers as $i => $b): ?>
        <li class="db-bs-item">
          <span class="db-bs-num"><?= $i + 1 ?></span>
          <div class="db-bs-info">
            <span class="db-bs-title"><?= htmlspecialchars($b['title']) ?></span>
            <span class="db-bs-author"><?= htmlspecialchars($b['author'] ?? '') ?></span>
          </div>
          <span class="db-bs-price"><?= Book::formatPrice((float)($b['price'] ?? 0)) ?></span>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php else: ?>
        <p style="color:var(--gray-l);font-size:.85rem;padding:1rem 1.5rem;">Belum ada bestseller.</p>
      <?php endif; ?>
    </div>

    <!-- Testimoni Terbaru -->
    <div class="dash-card" style="margin-top:1.25rem">
      <div class="dash-card-head">
        <h3>💬 Testimoni Terbaru</h3>
        <a href="<?= BASE_URL ?>?c=testimonial&a=index" class="dch-link">Lihat →</a>
      </div>
      <?php if (!empty($testimonials)): ?>
      <ul class="db-testi-list">
        <?php foreach (array_slice($testimonials, 0, 4) as $t): ?>
        <li class="db-testi-item">
          <div class="db-testi-top">
            <div class="db-testi-avatar"><?= strtoupper(substr($t['name'] ?? 'A', 0, 1)) ?></div>
            <div class="db-testi-meta">
              <span class="db-testi-name"><?= htmlspecialchars($t['name'] ?? '') ?></span>
              <span class="db-testi-stars"><?= Testimonial::renderStars((int)($t['rating'] ?? 5)) ?></span>
            </div>
          </div>
          <p class="db-testi-msg"><?= htmlspecialchars($t['message'] ?? '') ?></p>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php else: ?>
        <p style="color:var(--gray-l);font-size:.85rem;padding:1rem 1.5rem;">Belum ada testimoni.</p>
      <?php endif; ?>
    </div>

  </div><!-- /db-sidebar -->
</div><!-- /db-main-grid -->

<script>
// Filter kategori
document.querySelectorAll('.db-filt').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.db-filt').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const cat = btn.dataset.cat;
    document.querySelectorAll('.db-book-card').forEach(card => {
      card.style.display = (cat === 'all' || card.dataset.cat === cat) ? '' : 'none';
    });
  });
});
</script>

<?php include BASE_PATH . 'app/views/layouts/admin_footer.php'; ?>
