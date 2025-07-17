<?php
require_once 'config/Database.php';

class User {
    private $conn;
    private $table = 'users';

    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($name, $email, $phone) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, email, phone) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $phone]);
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $email, $phone) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET name=?, email=?, phone=? WHERE id=?");
        return $stmt->execute([$name, $email, $phone, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
