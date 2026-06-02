<?php
// app/models/Book.php

class Book extends Model {

    private string $title    = '';
    private float  $price    = 0;
    private string $category = '';
    private string $image    = '';

    protected string $dataFile = '';

    public function __construct() {
        $this->dataFile = BASE_PATH . 'data/books.json';
        parent::__construct();
    }

    protected function loadDefaults(): void {
        $this->items = [
            ['id'=>1,'title'=>'New Educators: How to Teach in the Digital Era','author'=>'Dr. Amira Listyaningrum','category'=>'Pendidikan','price'=>75000,'pages'=>220,'icon'=>'👩‍🏫','rating'=>4.8,'desc'=>'Panduan lengkap bagi pendidik baru dalam menghadapi era digital. Strategi mengajar efektif dengan teknologi modern.','is_bestseller'=>true,'image'=>''],
            ['id'=>2,'title'=>'The Magical Whale: A Journey Beyond the Stars','author'=>'Elena Setiawan','category'=>'Fiksi','price'=>65000,'pages'=>280,'icon'=>'🐋','rating'=>4.9,'desc'=>'Sebuah perjalanan luar biasa bersama paus ajaib yang membawa kita melampaui bintang-bintang. Kisah fiksi penuh imajinasi.','is_bestseller'=>true,'image'=>''],
            ['id'=>3,'title'=>'Digital Transformation','author'=>'Kevin Pratama','category'=>'Teknologi','price'=>89000,'pages'=>310,'icon'=>'🔄','rating'=>4.7,'desc'=>'Memahami dan menerapkan transformasi digital dalam organisasi. Dari strategi hingga implementasi nyata.','is_bestseller'=>false,'image'=>''],
            ['id'=>4,'title'=>"Harry Potter and the Sorcerer's Stone",'author'=>'J.K. Rowling','category'=>'Fiksi','price'=>85000,'pages'=>310,'icon'=>'⚡','rating'=>4.9,'desc'=>'Petualangan Harry Potter, seorang bocah yatim piatu yang menemukan dirinya adalah seorang penyihir berbakat.','is_bestseller'=>true,'image'=>''],
            ['id'=>5,'title'=>'Python Programming for Beginners','author'=>'Assencion Programming','category'=>'Teknologi','price'=>79000,'pages'=>256,'icon'=>'🐍','rating'=>4.8,'desc'=>'Belajar pemrograman Python dari nol hingga mahir. Disertai latihan praktis dan project nyata.','is_bestseller'=>false,'image'=>''],
            ['id'=>6,'title'=>'The Courage to Think Differently','author'=>'Rizky Andrian','category'=>'Pengembangan Diri','price'=>59000,'pages'=>190,'icon'=>'💪','rating'=>4.7,'desc'=>'Berani berpikir di luar batas konvensional. Temukan keberanian untuk melihat dunia dari sudut pandang berbeda.','is_bestseller'=>false,'image'=>''],
            ['id'=>7,'title'=>'Behind The Smile','author'=>'Sarah Maharani','category'=>'Pengembangan Diri','price'=>55000,'pages'=>175,'icon'=>'😊','rating'=>4.6,'desc'=>'Kisah inspiratif tentang ketulusan, perjuangan, dan makna kebahagiaan sejati di balik senyuman.','is_bestseller'=>false,'image'=>''],
            ['id'=>8,'title'=>'Effective Strategies to Grow Instagram Followers','author'=>'Dini Rahayu','category'=>'Bisnis','price'=>69000,'pages'=>165,'icon'=>'📸','rating'=>4.7,'desc'=>'Strategi terbukti untuk menumbuhkan follower Instagram secara organik. Konten, engagement, dan algoritma terungkap.','is_bestseller'=>true,'image'=>''],
            ['id'=>9,'title'=>'TikTok Marketing for Beginners','author'=>'Farhan Maulana','category'=>'Bisnis','price'=>72000,'pages'=>180,'icon'=>'🎵','rating'=>4.8,'desc'=>'Panduan pemasaran TikTok dari nol untuk bisnis pemula. Viral content, hashtag strategy, dan tips monetisasi.','is_bestseller'=>true,'image'=>''],
            ['id'=>10,'title'=>'The Price of Profit: Rethinking Corporate Social Responsibility','author'=>'Hendra Wijaya','category'=>'Bisnis','price'=>95000,'pages'=>320,'icon'=>'⚖️','rating'=>4.6,'desc'=>'Memikirkan ulang tanggung jawab sosial perusahaan di era modern.','is_bestseller'=>false,'image'=>''],
            ['id'=>11,'title'=>'Emotional Intelligence Groundwork','author'=>'Anita Dewi','category'=>'Pengembangan Diri','price'=>65000,'pages'=>200,'icon'=>'🧠','rating'=>4.8,'desc'=>'Membangun pondasi kecerdasan emosional yang kuat. Kenali, kelola, dan manfaatkan emosi untuk kehidupan lebih baik.','is_bestseller'=>false,'image'=>''],
            ['id'=>12,'title'=>'Instagram Growth Mistery: Blueprint to Grow & Monetize Instagram Fast','author'=>'Dini Rahayu','category'=>'Bisnis','price'=>79000,'pages'=>195,'icon'=>'🚀','rating'=>4.9,'desc'=>'Blueprint rahasia untuk tumbuh dan memonetisasi Instagram dengan cepat.','is_bestseller'=>true,'image'=>''],
            ['id'=>13,'title'=>'Inclusive Leadership in Action','author'=>'Dr. Budi Santoso','category'=>'Bisnis','price'=>85000,'pages'=>240,'icon'=>'🤝','rating'=>4.7,'desc'=>'Kepemimpinan inklusif dalam praktik nyata. Membangun tim yang beragam, solid, dan produktif.','is_bestseller'=>false,'image'=>''],
            ['id'=>14,'title'=>'Investing for Teens & Young Adults','author'=>'Farhan Maulana','category'=>'Keuangan','price'=>59000,'pages'=>160,'icon'=>'📈','rating'=>4.8,'desc'=>'Panduan investasi khusus untuk remaja dan dewasa muda. Saham, reksa dana, kripto dengan modal kecil.','is_bestseller'=>false,'image'=>''],
            ['id'=>15,'title'=>'The #Run Pain Free Program','author'=>'Dr. Rika Puspita','category'=>'Kesehatan','price'=>69000,'pages'=>185,'icon'=>'🏃','rating'=>4.7,'desc'=>'Program lari bebas nyeri untuk pelari pemula hingga menengah. Teknik, nutrisi, dan recovery.','is_bestseller'=>false,'image'=>''],
        ];
    }

    public function getTitle(): string { return $this->title; }
    public function setTitle(string $v): void { $this->title = htmlspecialchars(trim($v)); }
    public function getPrice(): float { return $this->price; }
    public function setPrice(float $v): void { $this->price = max(0, $v); }
    public function getCategory(): string { return $this->category; }
    public function setCategory(string $v): void { $this->category = htmlspecialchars(trim($v)); }
    public function getImage(): string { return $this->image; }
    public function setImage(string $v): void { $this->image = basename($v); }

    public function getBestsellers(): array {
        return array_values(array_filter($this->items, fn($b) => !empty($b['is_bestseller'])));
    }

    public function getCategories(): array {
        return array_unique(array_column($this->items, 'category'));
    }

    public static function formatPrice(float $price): string {
        return $price === 0.0 ? 'GRATIS' : 'Rp ' . number_format($price, 0, ',', '.');
    }

    public static function slugify(string $title): string {
        $s = strtolower($title);
        $s = str_replace(['&', '+'], '', $s);
        $s = preg_replace('/[^a-z0-9\s\-]/', '', $s);
        $s = preg_replace('/[\s]+/', '-', trim($s));
        $s = preg_replace('/-+/', '-', $s);
        return rtrim($s, '-');
    }

    public static function resolveImage(array $book): string {
        if (!empty($book['image']) && file_exists(BASE_PATH . 'uploads/books/' . $book['image'])) {
            return BASE_URL . 'uploads/books/' . htmlspecialchars($book['image']);
        }
        $slug = self::slugify($book['title'] ?? '');
        foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
            $path = BASE_PATH . 'assets/images/books/' . $slug . '.' . $ext;
            if (file_exists($path)) {
                return BASE_URL . 'assets/images/books/' . $slug . '.' . $ext;
            }
        }
        return '';
    }
}
