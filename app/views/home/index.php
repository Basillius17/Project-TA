<?php
// app/views/home/index.php – Landing Page Aset Ilmu
include BASE_PATH . 'app/views/layouts/header.php';
?>

<!-- ══ HERO ════════════════════════════════════════ -->
<section class="hero" id="beranda">
  <div class="hero-bg-orb orb1"></div>
  <div class="hero-bg-orb orb2"></div>
  <div class="hero-bg-orb orb3"></div>
  <div class="hero-inner">
    <div class="hero-text">
      <div class="hero-chip">🎯 Platform E-Book Startup Digital #1</div>
      <h1 class="hero-title">
        Bangun <span class="grad-text">Bisnis Digital</span><br>
        Mulai dari <span class="grad-text-orange">Ilmu yang Tepat</span>
      </h1>
      <p class="hero-desc">
        Ribuan founder, developer, dan investor sukses memulai perjalanan mereka dari
        koleksi e-book premium Aset Ilmu. Investasi terbaik adalah ilmu yang bisa
        langsung dipraktikkan.
      </p>
      <div class="hero-btns">
        <a href="#katalog" class="btn-primary btn-lg">Jelajahi Katalog 📚</a>
        <a href="#tentang" class="btn-ghost btn-lg">Pelajari Lebih ↓</a>
      </div>
      <div class="hero-badges">
        <div class="hb-item"><span>📚</span> <?= $totalBooks ?>+ E-Book</div>
        <div class="hb-item"><span>⭐</span> 4.8 Rating</div>
        <div class="hb-item"><span>👥</span> 10.000+ Pembaca</div>
        <div class="hb-item"><span>🔄</span> Update Rutin</div>
      </div>
    </div>
    <div class="hero-visual">
      <div class="hv-grid">
        <?php foreach(array_slice($bestsellers, 0, 6) as $i => $b):
          $img = Book::resolveImage($b);
        ?>
        <div class="hv-card hv-anim-<?= $i ?>">
          <div class="hvc-cover">
            <?php if($img): ?>
              <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($b['title']) ?>">
            <?php else: ?>
              <span class="hvc-icon"><?= $b['icon'] ?></span>
            <?php endif; ?>
          </div>
          <div class="hvc-info">
            <strong class="hvc-title"><?= htmlspecialchars($b['title']) ?></strong>
            <small class="hvc-author"><?= htmlspecialchars($b['author']) ?></small>
          </div>
          <div class="hvc-price"><?= Book::formatPrice((float)$b['price']) ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ══ ABOUT ═══════════════════════════════════════ -->
<section class="section" id="tentang">
  <div class="container">
    <div class="about-grid">
      <div class="about-left">
        <div class="section-tag">Tentang Kami</div>
        <h2 class="section-title">Kenapa <span class="grad-text">Aset Ilmu</span>?</h2>
        <p class="section-desc">Kami hadir untuk menjembatani gap antara teori dan praktik. Setiap e-book ditulis oleh praktisi nyata yang telah membuktikan hasilnya.</p>
        <div class="about-points">
          <div class="ap-row"><span class="ap-icon">✅</span><div><strong>Ditulis Praktisi</strong><p>Bukan teori belaka, ditulis oleh founder dan profesional yang sudah terbukti.</p></div></div>
          <div class="ap-row"><span class="ap-icon">✅</span><div><strong>Langsung Praktik</strong><p>Setiap bab dilengkapi action plan yang bisa langsung kamu implementasikan.</p></div></div>
          <div class="ap-row"><span class="ap-icon">✅</span><div><strong>Update Berkala</strong><p>Konten terus diperbarui sesuai tren dan perkembangan industri terkini.</p></div></div>
          <div class="ap-row"><span class="ap-icon">✅</span><div><strong>Komunitas Aktif</strong><p>Bergabung dengan ribuan pebisnis digital yang saling support dan bertukar ilmu.</p></div></div>
        </div>
      </div>
      <div class="about-right">
        <div class="stats-grid">
          <div class="stat-box"><div class="sb-num">10K+</div><div>Pembaca Aktif</div></div>
          <div class="stat-box"><div class="sb-num"><?= $totalBooks ?>+</div><div>Judul E-Book</div></div>
          <div class="stat-box"><div class="sb-num">4.8⭐</div><div>Rating Rata-rata</div></div>
          <div class="stat-box"><div class="sb-num">98%</div><div>Puas & Rekomen</div></div>
        </div>
        <div class="about-quote">
          <span class="quote-mark">"</span>
          Investasi pada ilmu pengetahuan selalu memberikan bunga terbaik.
          <span class="quote-author">— Benjamin Franklin</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══ KATALOG / PRODUK ═════════════════════════════ -->
<section class="section section-dark" id="katalog">
  <div class="container">
    <div class="section-header">
      <div class="section-tag">Katalog E-Book</div>
      <h2 class="section-title">Koleksi <span class="grad-text">Pilihan Terbaik</span></h2>
      <p class="section-desc">Temukan e-book yang tepat untuk perjalanan digitalmu</p>
    </div>
    <!-- Filter -->
    <div class="filter-row" id="filterRow">
      <button class="filt-btn active" data-cat="all">Semua</button>
      <?php foreach($categories as $cat): ?>
      <button class="filt-btn" data-cat="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></button>
      <?php endforeach; ?>
    </div>
    <!-- Grid Buku -->
    <div class="books-grid" id="booksGrid">
      <?php foreach($books as $b): ?>
      <div class="book-card" data-cat="<?= htmlspecialchars($b['category']) ?>">
        <?php if($b['is_bestseller']): ?>
          <div class="best-badge">🔥 Bestseller</div>
        <?php endif; ?>
        <?php $imgSrc = Book::resolveImage($b); ?>
        <div class="book-cover <?= $imgSrc ? 'has-img' : '' ?>">
          <?php if($imgSrc): ?>
            <img src="<?= $imgSrc ?>" alt="<?= htmlspecialchars($b['title']) ?>" class="book-cover-img">
          <?php else: ?>
            <div class="book-icon"><?= $b['icon'] ?></div>
          <?php endif; ?>
          <div class="book-cat"><?= htmlspecialchars($b['category']) ?></div>
        </div>
        <div class="book-body">
          <h3><?= htmlspecialchars($b['title']) ?></h3>
          <p class="book-author">✍️ <?= htmlspecialchars($b['author']) ?></p>
          <p class="book-desc collapsed"><?= htmlspecialchars($b['desc']) ?></p>
          <button class="btn-readmore" onclick="toggleDesc(this)" type="button">Selengkapnya ▾</button>
          <div class="book-meta">
            <span>📄 <?= $b['pages'] ?> hal</span>
            <span>⭐ <?= $b['rating'] ?></span>
          </div>
          <div class="book-footer">
            <span class="book-price"><?= Book::formatPrice((float)$b['price']) ?></span>
            <a href="#kontak" class="btn-buy">Dapatkan →</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══ TESTIMONI ═══════════════════════════════════ -->
<section class="section" id="testimoni">
  <div class="container">
    <div class="section-header">
      <div class="section-tag">Testimoni</div>
      <h2 class="section-title">Kata <span class="grad-text">Mereka</span> yang Sudah Buktikan</h2>
      <p class="section-desc">Lebih dari 10.000 pembaca telah merasakan manfaat langsung dari e-book Aset Ilmu</p>
    </div>
    <div class="testi-grid">
      <?php foreach($testimonials as $t): ?>
      <div class="testi-card">
        <div class="testi-top">
          <div class="testi-avatar"><?= $t['avatar'] ?></div>
          <div>
            <strong><?= htmlspecialchars($t['name']) ?></strong>
            <small><?= htmlspecialchars($t['role']) ?></small>
          </div>
          <div class="testi-stars"><?= Testimonial::renderStars($t['rating']) ?></div>
        </div>
        <p class="testi-msg">"<?= htmlspecialchars($t['message']) ?>"</p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══ CTA BANNER ══════════════════════════════════ -->
<section class="cta-banner">
  <div class="container cta-inner">
    <div class="cta-text">
      <h2>Siap Investasi pada Dirimu Sendiri?</h2>
      <p>Bergabunglah dengan ribuan pebisnis digital yang sudah membuktikan hasilnya.</p>
    </div>
    <a href="#katalog" class="btn-primary btn-lg">Mulai Sekarang 🚀</a>
  </div>
</section>

<?php include BASE_PATH . 'app/views/layouts/footer.php'; ?>
