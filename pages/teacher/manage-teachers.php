<?php include '../partials/header.php'; 
include '../../db/controllers/users.php';
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}
?>

<!-- Main Container -->
<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php'?>
        <!-- Content Area -->
        <div class="col-md-8 col-sm-8 col-xs-12">

            <div class="content">
                <div class="manage-students_wraper">
                    <h3 class="teacher-dashboard-header">Manage Teachers</h3>
                    <div class="mb-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeacherModal">
                            Add Teacher
                        </button>
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
                            <!-- Sample student entry -->
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>janesmith@example.com</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Michael Brown</td>
                                <td>michaelbrown@example.com</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Emily Davis</td>
                                <td>emilydavis@example.com</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <!-- Add more students here -->
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
    <div class="row">
        <!-- Calendar Section -->
        <?php include '../partials/teacher-calendar.php'?>
    </div>
</div>

<!-- Footer -->
<?php 

include '../partials/footer.php'; ?>