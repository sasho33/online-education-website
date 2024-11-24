<?php
include '../partials/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/controllers/admin.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_admin'])) {
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    // Validation
    if (strlen($firstName) < 2) {
        $errors[] = "First name must be at least 2 characters.";
    }
    if (strlen($lastName) < 2) {
        $errors[] = "Last name must be at least 2 characters.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'Email' => $email,
            'Password' => $hashedPassword,
            'Role' => 'admin',
        ];

        if (addAdmin($data)) {
            echo "<script>
                window.location.href = '" . BASE_URL . "pages/teacher/manage-teachers.php';
            </script>";
            exit();
        } else {
            $errors[] = "Failed to add admin. Please try again.";
        }
    }
}
?>

<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php'; ?>
        <!-- Content Area -->
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h3>Add New Admin</h3>
            <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <form method="POST" action="add-admin.php">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                </div>
                <button type="submit" name="add_admin" class="btn btn-primary">Add Admin</button>
                <a href="manage-teachers.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
