<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin'])) {
    header("Location: ../../index.php?page=login");
    exit;
}

include 'views/layout/header.php'; ?>




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
