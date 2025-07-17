<?php include 'views/layout/header.php'; 

require_once __DIR__ . '../../helpers/Auth.php';
requireAdmin();

?>



<div class="container mt-5" style="max-width: 400px;">
    <h3 class="mb-4 text-center">Admin Register</h3>

    <form method="post">
        <div class="mb-3">
            <label>Name</label>
            <input name="name" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input name="email" type="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input name="password" type="password" class="form-control" required>
        </div>
        <button class="btn btn-success w-100">Register</button>
    </form>

    <p class="text-center mt-3">
        Already have an account? <a href="index.php?page=login">Login</a>
    </p>
</div>

<?php include 'views/layout/footer.php'; ?>
