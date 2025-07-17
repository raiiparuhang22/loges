<?php

class Database {
    private $host = 'localhost';
    private $db = 'loges_db';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';

    public function connect() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        try {
            return new PDO($dsn, $this->user, $this->pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            die("DB Error: " . $e->getMessage());
        }
    }
}
