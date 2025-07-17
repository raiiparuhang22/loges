<?php
require_once __DIR__ . './../controllers/AdminController.php';
require_once __DIR__ . './../helpers/Auth.php';
$uri = $_GET['page'] ?? 'login';

session_start();

if (!isset($_SESSION) || (isset($_SESSION) && empty($_SESSION))) {
    switch ($uri) {
        case ($uri == 'login'):
            $admin = new AdminController();
            $admin->login();
            break;
        case ($uri == 'register'):
            require_once __DIR__ . './../controllers/AdminController.php';
            (new AdminController())->register();
            break;
        default:
            require_once __DIR__ . './../controllers/AdminController.php';
            (new AdminController())->login();
            break;
    }
    
} else {
    switch ($uri) {
        // case 'login':
        //     checkSession();
        //     include 'views/dashboard/index.php'; // or wherever your dashboard view is
        //     break;
        // case ($uri == 'register'):
        //     checkSession();
        //     require_once __DIR__ . './../controllers/AdminController.php';
        //     (new AdminController())->register();
        //     break;
        case 'dashboard':
            requireAdmin(); // 🔒 This ensures admin is logged in
            include 'views/dashboard/index.php'; // or wherever your dashboard view is
            break;        
        case 'add-user':
            require 'controllers/UserController.php';
            (new UserController())->addUser();
            break;
        case 'edit-user':
            require 'controllers/UserController.php';
            (new UserController())->editUser();
            break;
        case 'delete-user':
            require 'controllers/UserController.php';
            (new UserController())->deleteUser();
            break;
        case 'logout':
            require 'logout.php';
            break;
        default:
            echo "404 - Page Not Found!";
    }
    
}

