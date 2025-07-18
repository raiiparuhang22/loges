<?php

require_once __DIR__ . '/../models/User.php';

class UserController {
    private $user;

    public function __construct() {
        // Remove session_start if it's already called in index.php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->user = new User();
    }

    private function protectRoute() {
        if (!isset($_SESSION['admin'])) {
            header("Location: index.php?page=login");
            exit;
        }

        // Prevent browser caching after logout
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }

    public function dashboard() {
        $this->protectRoute();

        $users = $this->user->getAll();
        $count = count($users);
        include 'views/dashboard/index.php';
    }

    public function addUser() {
        $this->protectRoute();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->add($_POST['name'], $_POST['email'], $_POST['phone']);
            header("Location: index.php?page=dashboard");
        } else {
            include 'views/dashboard/add_user.php';
        }
    }

    public function editUser() {
        $this->protectRoute();

        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->update($id, $_POST['name'], $_POST['email'], $_POST['phone']);
            header("Location: index.php?page=dashboard");
        } else {
            $user = $this->user->find($id);
            include 'views/dashboard/edit_user.php';
        }
    }

    public function deleteUser() {
        $this->protectRoute();

        $id = $_GET['id'];
        $this->user->delete($id);
        header("Location: index.php?page=dashboard");
    }
}
