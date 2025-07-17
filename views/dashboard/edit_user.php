<?php 

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../../index.php?page=login");
    exit;
}




include 'views/layout/header.php'; ?>

<div class="container mt-4">
    <h2>Edit User</h2>
    <form method="post">
        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input name="phone" class="form-control" value="<?= htmlspecialchars($user['phone']) ?>" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="index.php?page=dashboard" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include 'views/layout/footer.php'; ?>
