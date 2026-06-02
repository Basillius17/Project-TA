<?php
// app/models/User.php

class User extends Model {

    private string $username = '';
    private string $role     = 'admin';
    private array  $admins   = [];

    public function __construct() {
        $this->loadDefaults();
    }

    protected function loadDefaults(): void {
        $this->admins = [
            [
                'id'       => 1,
                'username' => ADMIN_USERNAME,
                'password' => password_hash(ADMIN_PASSWORD, PASSWORD_DEFAULT),
                'role'     => 'admin',
                'name'     => 'Administrator',
            ]
        ];
        $this->items = $this->admins;
    }

    public function getUsername(): string { return $this->username; }
    public function setUsername(string $v): void {
        $this->username = htmlspecialchars(trim($v));
    }
    public function getRole(): string { return $this->role; }

    public function authenticate(string $username, string $password): ?array {
        foreach ($this->admins as $admin) {
            if ($admin['username'] === $username &&
                password_verify($password, $admin['password'])) {
                return $admin;
            }
        }
        return null;
    }
}
