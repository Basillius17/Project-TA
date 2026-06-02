<?php
// app/controllers/Controller.php – Base Controller

class Controller {

    protected function view(string $path, array $data = []): void {
        extract($data);
        $file = BASE_PATH . 'app/views/' . $path . '.php';
        file_exists($file) ? require $file : print("<p>View tidak ditemukan: $path</p>");
    }

    protected function redirect(string $url): void {
        header("Location: $url");
        exit;
    }

    protected function isLoggedIn(): bool {
        return !empty($_SESSION['admin_id']);
    }

    protected function requireLogin(): void {
        if (!$this->isLoggedIn()) {
            $this->redirect(BASE_URL . '?c=auth&a=login');
        }
    }

    protected function setFlash(string $type, string $msg): void {
        $_SESSION['flash'] = ['type' => $type, 'message' => $msg];
    }

    protected function getFlash(): ?array {
        if (!empty($_SESSION['flash'])) {
            $f = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $f;
        }
        return null;
    }

    protected function clean(string $input): string {
        return htmlspecialchars(trim($input));
    }
}
