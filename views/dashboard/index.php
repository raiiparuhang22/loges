<?php 
// var_dump($count); die(); 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'helpers/Auth.php';
requireAdmin(); // This will prevent access if not logged in

include 'views/layout/header.php'; ?>

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
