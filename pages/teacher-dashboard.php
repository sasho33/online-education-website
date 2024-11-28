<?php include './partials/header.php'; 
include '../db/controllers/users.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}
?>

<!-- Main Container -->
<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include 'partials/sidebar.php'?>
        <!-- Content Area -->
        <div class="col-md-8 col-sm-8 col-xs-12">

            <div class="content">
                <div class="manage-students_wraper">
                    <h3 class="teacher-dashboard-header">Manage Students</h3>
                    <div class="mb-3">
                        <a href="teacher/add-student.php" class=" btn btn-primary">
                            <i class="fa fa-user-plus"></i> Add Student
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
                            <?php
        // Fetch students from the database
        $students = select('users', ['Role' => 'student']);
        foreach ($students as $student): ?>
                            <tr>
                                <td><?= htmlspecialchars($student['UserID']); ?></td>
                                <td><?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']); ?></td>
                                <td><?= htmlspecialchars($student['Email']); ?></td>
                                <td>
                                    <a href="teacher/edit-student.php?id=<?= $student['UserID']; ?>"
                                        class="btn btn-warning btn-sm mt-1">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="?action=delete&id=<?= $student['UserID']; ?>" class="btn btn-danger btn-sm mt-1"
                                        onclick="return confirm('Are you sure you want to delete student <?= $student['first_name'] . ' ' . $student['last_name']; ?>?');">
                                        <i class="fa fa-trash"></i> </a>
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
        <?php include 'partials/teacher-calendar.php'?>
    </div>
</div>

<!-- Footer -->
<?php 

include './partials/footer.php'; ?>