<?php 
// var_dump($count); die(); 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
print_r($_SESSION);
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
 // This will prevent access if not logged in

include 'views/layout/header.php'; 
?>

<div class="container mt-4">
    <h2 class="mb-4">Admin Dashboard</h2>
    <p>Total Users: <strong><?= $count ?></strong></p>
    <a href="index.php?page=add-user" class="btn btn-success mb-3">Add User</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $i => $u): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($u['name']) ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td><?= htmlspecialchars($u['phone']) ?></td>
                    <td>
                        <a href="index.php?page=edit-user&id=<?= $u['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?page=delete-user&id=<?= $u['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete user?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include 'views/layout/footer.php'; ?>
