<?php
include './partials/header.php';
include '../db/controllers/users.php';

?>
<div class="container mt-5 mb-5 mw-60 mx-auto">
    <h2 class="login text-center">Login</h2>
    <!-- Display Validation Errors -->
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger alert-div col-sm-6 mx-auto">
            <ul class="mb-0">
                <?php foreach ($errors as $error) : ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form method="POST" action="<?= BASE_URL; ?>pages/login.php" class="w-50 mx-auto">
        <div class="mb-3">
            <label for="email" class=" form-label">Email</label>
            <input type="email" value="<?= $email ?>" name="email" id="email" class="form-control form-control-sm"
                required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control form-control-sm" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary btn-sm w-100">Login</button>
        <div class="mt-3 text-center">
            <a href="<?= BASE_URL; ?>pages/registration.php">Don't have an account? Register</a>
        </div>
    </form>
</div>

<!-- Footer -->
<?php include './partials/footer.php'; ?>