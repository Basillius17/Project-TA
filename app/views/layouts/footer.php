<?php // app/views/layouts/footer.php ?>

<!-- ══ SECTION INFORMASI KONTAK ══════════════════════════ -->
<section class="section info-kontak-section" id="info-kontak">
  <div class="container">
    <div class="section-header">
      <div class="section-tag">Hubungi Kami</div>
      <h2 class="section-title">Informasi <span class="grad-text">Kontak</span></h2>
      <p class="section-desc">Kami siap membantu Anda setiap hari.</p>
    </div>
    <div class="ik-grid">
      <!-- Kiri: info kontak -->
      <div class="ik-info">
        <div class="ik-item">
          <div class="ik-label">TELEPON</div>
          <div class="ik-val">(+62) 813 5744 1144</div>
        </div>
        <div class="ik-item">
          <div class="ik-label">EMAIL</div>
          <div class="ik-val">hello@asetilmu.id</div>
        </div>
        <div class="ik-item">
          <div class="ik-label">ALAMAT</div>
          <div class="ik-val">Jl. Raya Situbondo, Blindungan,<br>Kec. Bondowoso, Jawa Timur</div>
        </div>
        <div class="ik-item">
          <div class="ik-label">JAM OPERASIONAL</div>
          <div class="ik-hours">
            <div class="ik-hour-row"><span>Senin – Jumat</span><span class="ik-time">08.00 – 17.00 WIB</span></div>
            <div class="ik-hour-row"><span>Sabtu – Minggu</span><span class="ik-time">09.00 – 15.00 WIB</span></div>
          </div>
        </div>
        <div class="ik-item">
          <div class="ik-label">MEDIA SOSIAL</div>
          <div class="ik-socials">
            <div class="ik-social-row"><span>Instagram</span><span class="ik-social-handle">@asetilmu.id</span></div>
            <div class="ik-social-row"><span>Facebook</span><span class="ik-social-handle">AsetIlmu Official</span></div>
            <div class="ik-social-row"><span>Twitter / X</span><span class="ik-social-handle">@AsetIlmu</span></div>
            <div class="ik-social-row"><span>YouTube</span><span class="ik-social-handle">AsetIlmu Official</span></div>
            <div class="ik-social-row"><span>TikTok</span><span class="ik-social-handle">@asetilmu.id</span></div>
          </div>
        </div>
        <a href="https://wa.me/6281357441144" target="_blank" rel="noopener noreferrer" class="btn-wa-big">💬 Chat WhatsApp Sekarang</a>
      </div>
      <!-- Kanan: Google Maps -->
      <div class="ik-right">
        <div class="ik-map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.3!2d113.8234!3d-7.9093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e3e1b1b1b1b1%3A0x1!2sJl.+Raya+Situbondo%2C+Blindungan%2C+Bondowoso%2C+Jawa+Timur!5e0!3m2!1sid!2sid!4v1"
            width="100%" height="100%" style="border:0;border-radius:16px;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Lokasi AsetIlmu">
          </iframe>
        </div>
      </div>
    </div>

    <!-- Footer bawah: brand + navigasi -->
    <div class="ik-footer-wrap">
      <div class="footer-col footer-brand">
        <div class="footer-logo">📚 Aset<span>Ilmu</span></div>
        <p>Platform e-book startup digital terpercaya. Kami percaya bahwa investasi terbaik adalah ilmu yang bisa langsung dipraktikkan.</p>
        <div class="footer-socials">
          <a href="#" title="Instagram">📸</a>
          <a href="#" title="LinkedIn">💼</a>
          <a href="#" title="Twitter/X">🐦</a>
          <a href="#" title="YouTube">▶️</a>
          <a href="#" title="TikTok">🎵</a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Katalog</h4>
        <ul>
          <li><a href="#">Bisnis & Startup</a></li>
          <li><a href="#">Teknologi</a></li>
          <li><a href="#">Pengembangan Diri</a></li>
          <li><a href="#">Keuangan</a></li>
          <li><a href="#">Bestseller</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Perusahaan</h4>
        <ul>
          <li><a href="#tentang">Tentang Kami</a></li>
          <li><a href="#katalog">Katalog Buku</a></li>
          <li><a href="#testimoni">Testimoni</a></li>
          <li><a href="#info-kontak">Kontak</a></li>
        </ul>
      </div>
      <div class="footer-col footer-contact">
        <h4>Kontak</h4>
        <p>📍 Jl. Raya Situbondo, Blindungan, Kec. Bondowoso, Jawa Timur</p>
        <p>📧 hello@asetilmu.id</p>
        <p>💬 <a href="https://wa.me/6281357441144" target="_blank" style="color:#4cc88a;font-weight:600">+62 813 5744 1144</a> <span style="font-size:.75rem;color:var(--gray-l)">(WhatsApp)</span></p>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© <?= date('Y') ?> AsetIlmu. All rights reserved.</p>
    </div>
  </div>
</section>

<!-- ══ MODAL KONFIRMASI WHATSAPP ══════════════════════════ -->
<div id="waModal" style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(0,0,0,.65);backdrop-filter:blur(6px);align-items:center;justify-content:center">
  <div style="background:#1e1b2e;border:1px solid rgba(255,255,255,.1);border-radius:20px;padding:2rem;max-width:420px;width:90%;box-shadow:0 30px 80px rgba(0,0,0,.6);animation:modalIn .25s ease">
    <!-- Header -->
    <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:1.25rem">
      <div style="width:46px;height:46px;border-radius:50%;background:linear-gradient(135deg,#25d366,#128c7e);display:flex;align-items:center;justify-content:center;font-size:1.4rem;flex-shrink:0">💬</div>
      <div>
        <div style="font-weight:800;font-size:1rem">Kirim via WhatsApp</div>
        <div style="font-size:.78rem;color:#9ca3af">Pesan akan dikirim ke nomor berikut:</div>
      </div>
    </div>
    <!-- Nomor tujuan -->
    <div style="background:rgba(37,211,102,.08);border:1px solid rgba(37,211,102,.25);border-radius:10px;padding:.65rem 1rem;margin-bottom:1rem;display:flex;align-items:center;gap:.5rem;font-weight:700;color:#25d366;font-size:.92rem">
      📱 +62 813 5744 1144
    </div>
    <!-- Preview pesan -->
    <div style="margin-bottom:1.25rem">
      <div style="font-size:.75rem;color:#9ca3af;font-weight:600;text-transform:uppercase;letter-spacing:.06em;margin-bottom:.4rem">Preview Pesan</div>
      <div id="waPreview" style="background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);border-radius:10px;padding:.85rem 1rem;font-size:.83rem;color:#e5e7eb;line-height:1.75;white-space:pre-wrap;max-height:150px;overflow-y:auto"></div>
    </div>
    <!-- Tombol aksi -->
    <div style="display:flex;gap:.75rem">
      <button id="waBtnSend" onclick="waSend()" style="flex:1;background:linear-gradient(135deg,#25d366,#128c7e);color:#fff;border:none;border-radius:50px;padding:.8rem 1rem;font-weight:700;font-size:.92rem;cursor:pointer;transition:all .2s">
        Kirim Sekarang 🚀
      </button>
      <button onclick="waClose()" style="background:rgba(255,255,255,.07);color:#9ca3af;border:1px solid rgba(255,255,255,.1);border-radius:50px;padding:.8rem 1.25rem;font-weight:600;font-size:.92rem;cursor:pointer;transition:all .2s">
        Batal
      </button>
    </div>
  </div>
</div>

<style>
@keyframes modalIn{from{opacity:0;transform:scale(.92)}to{opacity:1;transform:scale(1)}}
</style>

<script src="<?= BASE_URL ?>assets/js/main.js?v=<?= filemtime(BASE_PATH.'assets/js/main.js') ?>"></script>
</body>
</html>
