// assets/js/main.js - Aset Ilmu

// Toggle deskripsi buku selengkapnya / sembunyikan
function toggleDesc(btn) {
  const desc = btn.previousElementSibling;
  const isOpen = desc.classList.contains('expanded');
  if (isOpen) {
    desc.classList.remove('expanded');
    btn.textContent = 'Selengkapnya ▾';
    btn.classList.remove('open');
  } else {
    desc.classList.add('expanded');
    btn.textContent = 'Sembunyikan ▴';
    btn.classList.add('open');
  }
}

// Navbar scroll
window.addEventListener('scroll', () => {
  document.getElementById('navbar')?.classList.toggle('scrolled', window.scrollY > 50);
});

// Hamburger
document.getElementById('burger')?.addEventListener('click', () => {
  document.getElementById('navMenu')?.classList.toggle('open');
});

// Category filter
document.querySelectorAll('.filt-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.filt-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const cat = btn.dataset.cat;
    document.querySelectorAll('.book-card').forEach(card => {
      card.style.display = (cat === 'all' || card.dataset.cat === cat) ? 'block' : 'none';
    });
  });
});

// ── WhatsApp Modal ──────────────────────────────────────
let _waUrl = '';

function handleContact(e) {
  e.preventDefault();
  const form  = e.target;
  const noWA  = '6281357441144';
  const nama  = form.querySelector('[name=name]').value.trim();
  const email = form.querySelector('[name=email]').value.trim();
  const pesan = form.querySelector('[name=message]').value.trim();

  const teks =
    `Halo Aset Ilmu! 👋\n\nNama  : ${nama}\nEmail : ${email}\n\nPesan :\n${pesan}`;

  _waUrl = `https://wa.me/${noWA}?text=${encodeURIComponent(teks)}`;

  // Isi preview di modal
  document.getElementById('waPreview').textContent = teks;

  // Tampilkan modal
  const modal = document.getElementById('waModal');
  modal.style.display = 'flex';
  // Simpan referensi form untuk direset setelah kirim
  modal._form = form;
}

function waSend() {
  // Buka WhatsApp via anchor (tidak diblokir browser)
  const a = document.createElement('a');
  a.href   = _waUrl;
  a.target = '_blank';
  a.rel    = 'noopener noreferrer';
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);

  // Reset form & tutup modal
  const modal = document.getElementById('waModal');
  if (modal._form) modal._form.reset();
  waClose();
}

function waClose() {
  document.getElementById('waModal').style.display = 'none';
}

// Tutup modal jika klik di luar konten
document.addEventListener('click', function(e) {
  const modal = document.getElementById('waModal');
  if (modal && e.target === modal) waClose();
});

// Scroll animations
const observer = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.1 });
document.querySelectorAll('.book-card,.testi-card,.stat-box,.ap-row').forEach(el => observer.observe(el));

// Auto dismiss flash
const fl = document.getElementById('flashEl');
if (fl) setTimeout(() => fl.remove(), 5000);

// Cover photo preview for admin forms
function previewCover(input) {
  const prev = document.getElementById('coverPreview');
  const ph   = document.getElementById('uzPlaceholder');
  if (!input.files[0]) return;
  const reader = new FileReader();
  reader.onload = e => {
    if (prev) { prev.src = e.target.result; prev.style.display = 'block'; }
    if (ph)   ph.style.display = 'none';
  };
  reader.readAsDataURL(input.files[0]);
}

// Inject scroll animation styles
const s = document.createElement('style');
s.textContent = `.book-card,.testi-card,.stat-box,.ap-row{opacity:0;transform:translateY(20px);transition:opacity .5s ease,transform .5s ease}.book-card.visible,.testi-card.visible,.stat-box.visible,.ap-row.visible{opacity:1;transform:translateY(0)}`;
document.head.appendChild(s);
