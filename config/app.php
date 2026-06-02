<?php
// config/app.php – Konfigurasi Aset Ilmu v2

define('APP_NAME',    'Aset Ilmu');
define('APP_TAGLINE', 'Investasi Terbaik adalah Ilmu');

// ── AUTO-DETECT BASE_URL ─────────────────────────────────────────────────────
if (!defined('BASE_URL')) {
    $scheme   = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host     = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    $baseDir  = rtrim($scriptDir, '/') . '/';
    define('BASE_URL', $scheme . '://' . $host . $baseDir);
}

define('BASE_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);

// Kredensial admin
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'asetilmu2025');

date_default_timezone_set('Asia/Jakarta');
