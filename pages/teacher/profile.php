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
                <div class="manage-student_wraper">
                    <h3 class="teacher-dashboard-header">Change account information</h3>
                    <div class="container mt-5 mb-5 mw-60 mx-auto">

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
                        <form method="POST" action="registration.php" class="w-50 mx-auto">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">Change First Name</label>
                                <input type="text" value="<?=$first_name?>" name=" first_name" id="first_name"
                                    class="form-control form-control-sm" required>
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Change Last Name</label>
                                <input type="text" value="<?=$last_name?>" name="last_name" id="last_name"
                                    class="form-control form-control-sm" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Change Email</label>
                                <input type="email" value="<?=$email?>" name="email" id="email"
                                    class="form-control form-control-sm" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Enter New Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control form-control-sm" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password"
                                    class="form-control form-control-sm" required>
                            </div>

                            <button type="submit" name="register" class="btn btn-primary btn-sm w-100">Save
                                changes</button>
                        </form>
                    </div>
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