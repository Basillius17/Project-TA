<?php
// index.php – Router MVC Aset Ilmu v2

// ── SESSION ISOLASI PER FOLDER ────────────────────────────────────────────────
$_folderName = strtoupper(trim(basename(dirname(__FILE__)), '/\\'));
$_sessName   = preg_replace('/[^A-Z0-9]/', '_', $_folderName) . '_SESS';
session_name($_sessName);
$_cookiePath = '/' . basename(dirname(__FILE__)) . '/';
session_set_cookie_params(['path' => $_cookiePath]);
session_start();
// ─────────────────────────────────────────────────────────────────────────────

require_once 'config/app.php';

require_once 'app/models/Model.php';
require_once 'app/models/Book.php';
require_once 'app/models/Testimonial.php';
require_once 'app/models/User.php';

require_once 'app/controllers/Controller.php';
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/AuthController.php';
require_once 'app/controllers/BookController.php';
require_once 'app/controllers/TestimonialController.php';

$c = $_GET['c'] ?? 'home';
$a = $_GET['a'] ?? 'index';

$routes = [
    'home'        => 'HomeController',
    'auth'        => 'AuthController',
    'book'        => 'BookController',
    'testimonial' => 'TestimonialController',
];

$class = $routes[$c] ?? 'HomeController';
$ctrl  = new $class();
method_exists($ctrl, $a) ? $ctrl->$a() : (new HomeController())->index();
