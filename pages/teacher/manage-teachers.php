<?php
include '../partials/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/controllers/admin.php'; 

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}

// Handle admin deletion
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $adminID = $_GET['id'];
    deleteAdmin($adminID);

    echo "<script>
    window.location.href = '" . BASE_URL . "pages/teacher/manage-teachers.php';
</script>";
exit();
}

// Fetch all admins
$admins = getAllAdmins();
?>

<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php' ?>
        <!-- Content Area -->
        <div class="col-lg-9 col-md-8 col-sm-10 col-xs-12">
            <div class="content">
                <div class="manage-teachers_wrapper">
                    <h3 class="teacher-dashboard-header">Manage Admins</h3>
                    <div class="mb-3">
    <a href="add-admin.php" class="btn btn-primary">
    <i class="fa fa-user-plus"></i> Add Admin
    </a>
</div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($admins as $admin): ?>
                            <tr>
                                <td><?= htmlspecialchars($admin['UserID']); ?></td>
                                <td><?= htmlspecialchars($admin['first_name'] . ' ' . $admin['last_name']); ?></td>
                                <td><?= htmlspecialchars($admin['Email']); ?></td>
                                <td>
    <a href="edit-teacher.php?id=<?= $admin['UserID']; ?>" class="btn btn-warning btn-sm">
        <i class="fa fa-edit"></i>
    </a>
    <a href="?action=delete&id=<?= $admin['UserID']; ?>"
        onclick="return confirm('Are you sure you want to delete this admin?');" class="btn btn-danger btn-sm">
        <i class="fa fa-trash"></i>
    </a>
</td>

                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Calendar Section -->
        <?php include '../partials/teacher-calendar.php' ?>
    </div>
</div>

<!-- Add Admin Modal -->
<div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="add-admin.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminModalLabel">Add New Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="add_admin" class="btn btn-primary">Add Admin</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <!-- Calendar Section -->
        <?php include '../partials/teacher-calendar.php'?>
    </div>
</div>

<!-- Footer -->
<?php include '../partials/footer.php' ?>
