<?php
include './partials/header.php';
include '../db/controllers/users.php';
?>

<div class="container mt-5 mb-5 mw-60 mx-auto">
    <h2 class="register text-center">Register</h2>
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
    <form method="POST" action="registration.php" class="w-50 mx-auto needs-validation" novalidate>
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" value="<?= $first_name ?>" name="first_name" id="first_name" class="form-control form-control-sm" required>
            <div class="invalid-feedback">Please enter a first name.</div>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" value="<?= $last_name ?>" name="last_name" id="last_name" class="form-control form-control-sm" required>
            <div class="invalid-feedback">Please enter a last name.</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" value="<?= $email ?>" name="email" id="email" class="form-control form-control-sm" required>
            <div class="invalid-feedback">Please enter a valid email.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control form-control-sm" required>
            <div class="invalid-feedback">Please enter a password.</div>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-sm" required>
            <div class="invalid-feedback">Passwords do not match.</div>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="Role" value="admin" id="Role" class="form-check-input">
            <label class="form-check-label" for="Role">Register as Admin</label>
        </div>
        <button type="submit" name="register" class="btn btn-primary btn-sm w-100">Register</button>
    </form>

</div>

<script src="../js/user-validation.js">

</script>

<!-- Footer -->
<?php include './partials/footer.php'; ?>