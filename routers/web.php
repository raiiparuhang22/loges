<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Send no-cache headers to prevent back button after logout
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

require_once __DIR__ . '/../helpers/Auth.php';

$uri = $_GET['page'] ?? 'login';

function protectRoute() {
    if (!isset($_SESSION['admin'])) {
        header("Location: index.php?page=login");
        exit;
    }
}

if (!isset($_SESSION['admin'])) {
    // User not logged in: only allow login and register pages
    switch ($uri) {
        case 'login':
            require_once __DIR__ . '/../controllers/AdminController.php';
            (new AdminController())->login();
            break;
        case 'register':
            require_once __DIR__ . '/../controllers/AdminController.php';
            (new AdminController())->register();
            break;
        default:
            // Redirect to login page if accessing other pages without login
            header("Location: index.php?page=login");
            exit;
    }
} else {
    // User logged in: protect all other pages
    switch ($uri) {
        case 'login':
        case 'register':
            // Redirect logged-in users away from login/register pages
            header("Location: index.php?page=dashboard");
            exit;
        case 'dashboard':
            protectRoute();
            require_once __DIR__ . '/../controllers/DashboardController.php';
            (new DashboardController())->index();
            break;
        case 'add-user':
            protectRoute();
            require_once __DIR__ . '/../controllers/UserController.php';
            (new UserController())->addUser();
            break;
        case 'edit-user':
            protectRoute();
            require_once __DIR__ . '/../controllers/UserController.php';
            (new UserController())->editUser();
            break;
        case 'delete-user':
            protectRoute();
            require_once __DIR__ . '/../controllers/UserController.php';
            (new UserController())->deleteUser();
            break;
        case 'logout':
            require_once __DIR__ . '/../logout.php';
            break;
        default:
            echo "404 - Page Not Found!";
            break;
    }
}
