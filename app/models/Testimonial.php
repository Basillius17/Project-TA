<?php
// app/models/Testimonial.php

class Testimonial extends Model {

    private string $name    = '';
    private string $message = '';
    private int    $rating  = 5;

    protected string $dataFile = '';

    public function __construct() {
        $this->dataFile = BASE_PATH . 'data/testimonials.json';
        parent::__construct();
    }

    protected function loadDefaults(): void {
        $this->items = [
            ['id'=>1,'name'=>'Dita Pramesti','role'=>'Founder Startup EdTech','avatar'=>'D','rating'=>5,'message'=>'Aset Ilmu benar-benar mengubah cara saya berpikir tentang bisnis. Buku Growth Hacking Startup sudah saya baca 3 kali!'],
            ['id'=>2,'name'=>'Arya Nugraha','role'=>'Software Engineer','avatar'=>'A','rating'=>5,'message'=>'Kode & Uang adalah buku terbaik yang pernah saya baca. Akhirnya bisa launch produk SaaS sendiri setelah 2 bulan baca.'],
            ['id'=>3,'name'=>'Sinta Maharani','role'=>'Content Creator & Investor','avatar'=>'S','rating'=>5,'message'=>'Investasi Cerdas Gen-Z sangat praktikal. Portfolio saya sudah tumbuh 40% dalam setahun!'],
            ['id'=>4,'name'=>'Budi Kurniawan','role'=>'Product Manager','avatar'=>'B','rating'=>4,'message'=>'The Digital Founder lengkap banget, dari ideasi sampai fundraising. Wajib baca untuk semua yang mau bikin startup.'],
        ];
    }

    public function getName(): string { return $this->name; }
    public function setName(string $v): void { $this->name = htmlspecialchars(trim($v)); }
    public function getMessage(): string { return $this->message; }
    public function setMessage(string $v): void { $this->message = htmlspecialchars(trim($v)); }
    public function getRating(): int { return $this->rating; }
    public function setRating(int $v): void { $this->rating = max(1, min(5, $v)); }

    public static function renderStars(int $rating): string {
        return str_repeat('★', $rating) . str_repeat('☆', 5 - $rating);
    }
}
