<?php 
include '../partials/header.php';
include '../../db/controllers/users.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : null;
if (!$id) {
    echo "<script>alert('Invalid student ID.'); window.location.href='" . BASE_URL . "pages/teacher-dashboard.php';</script>";
    exit();
}

$student = select('users', ['UserID' => $id, 'Role' => 'student']);
if (!$student) {
    echo "<script>alert('Student not found.'); window.location.href='" . BASE_URL . "pages/teacher-dashboard.php';</script>";
    exit();
}

$student = $student[0]; // Fetch the first (and only) row
?>

<!-- Main Container -->
<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php'; ?>

        <!-- Content Area -->
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="content">
                <div class="manage-students_wraper">
                    <h3 class="teacher-dashboard-header">Edit Student</h3>
                    <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger alert-div col-sm-6 mx-auto">
                        <ul class="mb-0">
                            <?php foreach ($errors as $error) : ?>
                            <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <form method="POST" action="edit-student.php?id=<?= $id; ?>">
                        <div class="content">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" value="<?= htmlspecialchars($student['first_name']); ?>"
                                    name="first_name" id="first_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" value="<?= htmlspecialchars($student['last_name']); ?>"
                                    name="last_name" id="last_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="<?= htmlspecialchars($student['Email']); ?>" name="email"
                                    id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <a href="../teacher-dashboard.php" class="btn btn-secondary">Cancel</a>
                                <button type="submit" name="edit_student" class="btn btn-primary">Update
                                    Student</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<?php 

include '../partials/footer.php'; ?>