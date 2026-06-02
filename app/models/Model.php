<?php
// app/models/Model.php – Abstract Base Model dengan JSON storage

abstract class Model {

    protected array  $items    = [];
    protected string $dataFile = '';

    public function __construct() {
        $this->loadData();
    }

    protected function loadData(): void {
        if (!empty($this->dataFile) && file_exists($this->dataFile)) {
            $json = file_get_contents($this->dataFile);
            $this->items = json_decode($json, true) ?? [];
        } else {
            $this->loadDefaults();
            $this->saveData();
        }
    }

    abstract protected function loadDefaults(): void;

    protected function saveData(): bool {
        if (empty($this->dataFile)) return false;
        $dir = dirname($this->dataFile);
        if (!is_dir($dir)) mkdir($dir, 0755, true);
        return file_put_contents(
            $this->dataFile,
            json_encode($this->items, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        ) !== false;
    }

    public function findAll(): array { return $this->items; }

    public function findById(int $id): ?array {
        foreach ($this->items as $item) {
            if (($item['id'] ?? 0) === $id) return $item;
        }
        return null;
    }

    public function create(array $data): bool {
        $maxId = 0;
        foreach ($this->items as $item) {
            if (($item['id'] ?? 0) > $maxId) $maxId = $item['id'];
        }
        $data['id'] = $maxId + 1;
        $this->items[] = $data;
        return $this->saveData();
    }

    public function update(int $id, array $data): bool {
        foreach ($this->items as &$item) {
            if (($item['id'] ?? 0) === $id) {
                $data['id'] = $id;
                $item = $data;
                return $this->saveData();
            }
        }
        return false;
    }

    public function delete(int $id): bool {
        $this->items = array_values(
            array_filter($this->items, fn($i) => ($i['id'] ?? 0) !== $id)
        );
        return $this->saveData();
    }

    public function count(): int { return count($this->items); }

    public function take(int $n): array { return array_slice($this->items, 0, $n); }

    public function findByCategory(string $cat): array {
        return array_values(
            array_filter($this->items, fn($i) => ($i['category'] ?? '') === $cat)
        );
    }
}
