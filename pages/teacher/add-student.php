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
                    <h3 class="teacher-dashboard-header">Add Student</h3>
                    <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger alert-div col-sm-6 mx-auto">
                        <ul class="mb-0">
                            <?php foreach ($errors as $error) : ?>
                            <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>


                    <form method="POST" action="add-student.php">

                        <div class="content">
                            <input type="hidden" value="<?=$id?>" name="id">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" value="<?=$first_name?>" name="first_name" id="first_name"
                                    class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" value="<?=$last_name?>" name="last_name" id="last_name"
                                    class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="<?=$email?>" name="email" id="email" class="form-control"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password"
                                    class="form-control form-control-sm" required>
                            </div>

                            <div class="mb-3">
                                <a href="../teacher-dashboard.php" type=" button" class="btn btn-secondary">Cancel</a>
                                <button type="submit" name="add_student" class="btn btn-primary">Add Student</button>
                            </div>
                        </div>
                    </form>

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