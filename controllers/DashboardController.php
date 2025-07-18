<?php 

require_once __DIR__ . '/../models/Admin.php';
require_once __DIR__ . '/../models/User.php';

class DashboardController {
    public function index() {
        $admin = new Admin();
        $count = $admin->countAll();

        $userModel = new User();
        $users = $userModel->getAll(); // <== changed from getAllUsers() to getAll()

        require_once __DIR__ . '/../views/dashboard/index.php';
    }
}
