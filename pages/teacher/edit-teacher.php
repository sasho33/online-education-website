<?php
include '../partials/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/controllers/admin.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}

$adminID = $_GET['id'] ?? null;
if (!$adminID) {
    echo "<script>
        alert('Invalid admin ID.');
        window.location.href = '" . BASE_URL . "pages/teacher/manage-teachers.php';
    </script>";
    exit();
}

// Fetch admin details
$admin = getAdminByID($adminID);
if (!$admin) {
    echo "<script>
        alert('Admin not found.');
        window.location.href = '" . BASE_URL . "pages/teacher/manage-teachers.php';
    </script>";
    exit();
}


$firstName = $admin['first_name'];
$lastName = $admin['last_name'];
$email = $admin['Email'];


?>

<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php'; ?>
        <!-- Content Area -->
        <div class="col-lg-9 col-md-8 col-sm-10 col-xs-12">
            <h3>Edit Admin</h3>
            <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <form method="POST" action="edit-teacher.php?id=<?= $adminID; ?>">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control"
                        value="<?= htmlspecialchars($firstName); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control"
                        value="<?= htmlspecialchars($lastName); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($email); ?>"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password (leave blank to keep current password)</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                </div>
                <button type="submit" name="edit_admin" class="btn btn-primary">Save Changes</button>
                <a href="manage-teachers.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
