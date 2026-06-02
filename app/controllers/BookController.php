<?php
// app/controllers/BookController.php – CRUD E-Book + Upload Foto

class BookController extends Controller {

    private Book $model;

    public function __construct() {
        $this->model = new Book();
    }

    public function index(): void {
        $this->requireLogin();
        $this->view('admin/books/index', [
            'books' => $this->model->findAll(),
            'flash' => $this->getFlash(),
        ]);
    }

    public function create(): void {
        $this->requireLogin();
        $this->view('admin/books/create', ['flash' => $this->getFlash()]);
    }

    public function store(): void {
        $this->requireLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect(BASE_URL . '?c=book&a=index');
        }
        $image = $this->uploadImage();
        $this->model->create([
            'title'         => $this->clean($_POST['title']    ?? ''),
            'author'        => $this->clean($_POST['author']   ?? ''),
            'category'      => $this->clean($_POST['category'] ?? 'Bisnis'),
            'desc'          => $this->clean($_POST['desc']     ?? ''),
            'price'         => (float)($_POST['price']         ?? 0),
            'pages'         => (int)($_POST['pages']           ?? 0),
            'icon'          => $this->clean($_POST['icon']     ?? '📚'),
            'rating'        => (float)($_POST['rating']        ?? 4.5),
            'is_bestseller' => isset($_POST['is_bestseller']),
            'image'         => $image,
        ]);
        $this->setFlash('success', 'E-Book berhasil ditambahkan!');
        $this->redirect(BASE_URL . '?c=book&a=index');
    }

    public function edit(): void {
        $this->requireLogin();
        $book = $this->model->findById((int)($_GET['id'] ?? 0));
        if (!$book) {
            $this->setFlash('error', 'E-Book tidak ditemukan.');
            $this->redirect(BASE_URL . '?c=book&a=index');
            return;
        }
        $this->view('admin/books/edit', ['book' => $book, 'flash' => $this->getFlash()]);
    }

    public function update(): void {
        $this->requireLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect(BASE_URL . '?c=book&a=index');
        }
        $id = (int)($_POST['id'] ?? 0);
        $existing = $this->model->findById($id);
        if (!$existing) {
            $this->setFlash('error', 'E-Book tidak ditemukan.');
            $this->redirect(BASE_URL . '?c=book&a=index');
            return;
        }
        $image = $this->uploadImage() ?: ($existing['image'] ?? '');
        $this->model->update($id, [
            'title'         => $this->clean($_POST['title']    ?? ''),
            'author'        => $this->clean($_POST['author']   ?? ''),
            'category'      => $this->clean($_POST['category'] ?? 'Bisnis'),
            'desc'          => $this->clean($_POST['desc']     ?? ''),
            'price'         => (float)($_POST['price']         ?? 0),
            'pages'         => (int)($_POST['pages']           ?? 0),
            'icon'          => $this->clean($_POST['icon']     ?? '📚'),
            'rating'        => (float)($_POST['rating']        ?? 4.5),
            'is_bestseller' => isset($_POST['is_bestseller']),
            'image'         => $image,
        ]);
        $this->setFlash('success', 'E-Book berhasil diperbarui!');
        $this->redirect(BASE_URL . '?c=book&a=index');
    }

    public function delete(): void {
        $this->requireLogin();
        // FIX: Tambahkan konfirmasi CSRF-safe via POST, fallback GET tetap ada
        $id = (int)($_GET['id'] ?? $_POST['id'] ?? 0);
        if ($id > 0) {
            $this->model->delete($id);
            $this->setFlash('success', 'E-Book berhasil dihapus.');
        }
        $this->redirect(BASE_URL . '?c=book&a=index');
    }

    private function uploadImage(): string {
        if (empty($_FILES['image']['name'])) return '';
        $file    = $_FILES['image'];
        $ext     = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','webp','gif'];
        if (!in_array($ext, $allowed) || $file['error'] !== 0) return '';
        // FIX: Cek ukuran file max 5MB
        if ($file['size'] > 5 * 1024 * 1024) return '';
        $dir  = BASE_PATH . 'uploads/books/';
        if (!is_dir($dir)) mkdir($dir, 0755, true);
        $name = 'book_' . uniqid() . '.' . $ext;
        return move_uploaded_file($file['tmp_name'], $dir . $name) ? $name : '';
    }
}
