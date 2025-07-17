<?php

require_once __DIR__. './../config/Database.php';

class Admin {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM admins WHERE email = ?");
        $stmt->execute([$email]);
        $admin = $stmt->fetch();
        if ($admin && password_verify($password, $admin['password'])) {
            session_start();
            $_SESSION['admin'] = $admin;
            return true;
        }
        return false;
    }

    public function register($name, $email, $password) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->conn->prepare("INSERT INTO admins (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $hash]);
    }
}
