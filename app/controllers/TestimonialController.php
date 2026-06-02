<?php
// app/controllers/TestimonialController.php – CRUD Testimoni

class TestimonialController extends Controller {

    private Testimonial $model;

    public function __construct() {
        $this->model = new Testimonial();
    }

    public function index(): void {
        $this->requireLogin();
        $this->view('admin/testimonials/index', [
            'testimonials' => $this->model->findAll(),
            'flash'        => $this->getFlash(),
        ]);
    }

    public function create(): void {
        $this->requireLogin();
        $this->view('admin/testimonials/create', ['flash' => $this->getFlash()]);
    }

    public function store(): void {
        $this->requireLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect(BASE_URL . '?c=testimonial&a=index');
        }
        $name = $this->clean($_POST['name'] ?? '');
        $this->model->create([
            'name'    => $name,
            'role'    => $this->clean($_POST['role']    ?? ''),
            'avatar'  => strtoupper(mb_substr($name, 0, 1)),
            'rating'  => (int)($_POST['rating']          ?? 5),
            'message' => $this->clean($_POST['message']  ?? ''),
        ]);
        $this->setFlash('success', 'Testimoni berhasil ditambahkan!');
        $this->redirect(BASE_URL . '?c=testimonial&a=index');
    }

    public function edit(): void {
        $this->requireLogin();
        $item = $this->model->findById((int)($_GET['id'] ?? 0));
        if (!$item) {
            $this->setFlash('error', 'Testimoni tidak ditemukan.');
            $this->redirect(BASE_URL . '?c=testimonial&a=index');
            return;
        }
        $this->view('admin/testimonials/edit', ['item' => $item, 'flash' => $this->getFlash()]);
    }

    public function update(): void {
        $this->requireLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect(BASE_URL . '?c=testimonial&a=index');
        }
        $id   = (int)($_POST['id'] ?? 0);
        $name = $this->clean($_POST['name'] ?? '');
        $this->model->update($id, [
            'name'    => $name,
            'role'    => $this->clean($_POST['role']    ?? ''),
            'avatar'  => strtoupper(mb_substr($name, 0, 1)),
            'rating'  => (int)($_POST['rating']          ?? 5),
            'message' => $this->clean($_POST['message']  ?? ''),
        ]);
        $this->setFlash('success', 'Testimoni berhasil diperbarui!');
        $this->redirect(BASE_URL . '?c=testimonial&a=index');
    }

    public function delete(): void {
        $this->requireLogin();
        $id = (int)($_GET['id'] ?? $_POST['id'] ?? 0);
        if ($id > 0) {
            $this->model->delete($id);
            $this->setFlash('success', 'Testimoni berhasil dihapus.');
        }
        $this->redirect(BASE_URL . '?c=testimonial&a=index');
    }
}
