<?php

function requireAdmin() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Prevent browser from using cached version
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    if (!isset($_SESSION['admin'])) {
        header("Location: index.php?page=login");
        exit;
    }
}

function checkSession() {
    if (isset($_SESSION)) {
        header("Location: dashboard");
        exit();
    }
    return false;
}
