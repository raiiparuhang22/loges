<?php
require_once __DIR__.'./../models/Admin.php';
require_once __DIR__ . './../controllers/AdminController.php';

class AdminController {

    public function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        // Prevent caching after logout
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    
        if (isset($_SESSION['admin'])) {
            header('Location: index.php?page=dashboard');
            exit;
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $admin = new Admin();
            $result = $admin->login($_POST['email'], $_POST['password']);
    
            if ($result) {
                $_SESSION['admin'] = $result;
                header('Location: index.php?page=dashboard');
                exit;
            } else {
                $error = "Invalid Credentials";
                include 'views/auth/login.php';
            }
        } else {
            include 'views/auth/login.php';
        }
    }
    

    public function register() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        // 🛡 Prevent cached pages after logout
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    
        if (isset($_SESSION['admin'])) {
            header('Location: index.php?page=dashboard');
            exit;
        }
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $admin = new Admin();
            $admin->register($_POST['name'], $_POST['email'], $_POST['password']);
            header('Location: index.php?page=login');
            exit;
        } else {
            include 'views/auth/register.php';
        }
    }
    
}
