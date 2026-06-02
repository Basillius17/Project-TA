<?php
// app/controllers/AuthController.php – Login Admin
// BUG FIX: form action di login.php sebelumnya mengarah ke a=Login (kapital)
//           padahal method di sini bernama doLogin → sekarang form sudah diperbaiki ke a=doLogin

class AuthController extends Controller {

    private User $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login(): void {
        if ($this->isLoggedIn()) {
            $this->redirect(BASE_URL . '?c=auth&a=dashboard');
        }
        $flash = $this->getFlash();
        $this->view('auth/login', ['flash' => $flash]);
    }

    // FIX: method ini dipanggil via a=doLogin (sudah benar di form)
    public function doLogin(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect(BASE_URL . '?c=auth&a=login');
        }

        $username = $this->clean($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        $admin = $this->userModel->authenticate($username, $password);

        if ($admin) {
            $_SESSION['admin_id']   = $admin['id'];
            $_SESSION['admin_name'] = $admin['name'];
            $this->redirect(BASE_URL . '?c=auth&a=dashboard');
        } else {
            $this->setFlash('error', 'Username atau password salah!');
            $this->redirect(BASE_URL . '?c=auth&a=login');
        }
    }

    public function dashboard(): void {
        $this->requireLogin();
        $bookModel  = new Book();
        $testiModel = new Testimonial();
        $this->view('auth/dashboard', [
            'totalBooks'   => $bookModel->count(),
            'totalTesti'   => $testiModel->count(),
            'adminName'    => $_SESSION['admin_name'] ?? 'Admin',
            'books'        => $bookModel->findAll(),
            'testimonials' => $testiModel->findAll(),
        ]);
    }

    public function logout(): void {
        session_destroy();
        $this->redirect(BASE_URL . '?c=auth&a=login');
    }
}
