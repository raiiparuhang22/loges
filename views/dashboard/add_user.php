<?php 
// ✅ Start session only if not already started

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin'])) {
    header("Location: index.php?page=login");
    exit;
}

// No-cache headers to prevent caching after logout/back button
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include 'views/layout/header.php';

?>

<div class="container mt-4">
    <h2>Add New User</h2>
    <form method="post">
        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input name="phone" class="form-control" required>
        </div>
        <button class="btn btn-primary">Add</button>
        <a href="index.php?page=dashboard" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include 'views/layout/footer.php'; ?>
