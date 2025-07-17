<?php
// Only include if not already in session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (isset($_SESSION['admin'])) {
    header("Location: index.php?page=dashboard");
    exit;
}

include 'views/layout/auth_header.php';
?>


<div class="container mt-5" style="max-width: 400px;">
    <h3 class="mb-4 text-center">Admin Login</h3>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label>Email</label>
            <input name="email" type="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input name="password" type="password" class="form-control" required>
        </div>
        <button class="btn btn-dark w-100">Login</button>
    </form>

    <p class="text-center mt-3">
        Don't have an account? <a href="index.php?page=register">Register</a>
    </p>
</div>

