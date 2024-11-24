<?php
include '../partials/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/controllers/users.php'; // Use users.php controller functions

if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASE_URL . "index.php");
    exit();
}

// Initialize variables
$userID = $_SESSION['user_id'];
$user = getUserByID($userID); // Fetch user details using users.php

$errors = [];

if (!$user) {
    echo "<script>
        alert('User not found.');
        window.location.href = '" . BASE_URL . "index.php';
    </script>";
    exit();
}

$first_name = $user['first_name'];
$last_name = $user['last_name'];
$email = $user['Email'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validation
    if (strlen($first_name) < 2) {
        $errors[] = "First name must be at least 2 characters.";
    }
    if (strlen($last_name) < 2) {
        $errors[] = "Last name must be at least 2 characters.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (!empty($password) && $password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'Email' => $email,
        ];

        // Only update password if provided
        if (!empty($password)) {
            $data['Password'] = password_hash($password, PASSWORD_BCRYPT);
        }

        // Update user details using users.php
        if (updateUser($data, ['UserID' => $userID])) {
            echo "<script>
                alert('Profile updated successfully.');
                window.location.href = '" . BASE_URL . "pages/teacher/profile.php';
            </script>";
            exit();
        } else {
            $errors[] = "Failed to update profile. Please try again.";
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
            <div class="content">
                <div class="manage-student_wraper">
                    <h3 class="teacher-dashboard-header">Edit Profile</h3>
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
                        <form method="POST" action="" class="w-50 mx-auto">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" value="<?= htmlspecialchars($first_name); ?>" name="first_name"
                                    id="first_name" class="form-control form-control-sm" required>
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" value="<?= htmlspecialchars($last_name); ?>" name="last_name"
                                    id="last_name" class="form-control form-control-sm" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="<?= htmlspecialchars($email); ?>" name="email" id="email"
                                    class="form-control form-control-sm" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password (optional)</label>
                                <input type="password" name="password" id="password" class="form-control form-control-sm">
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password"
                                    class="form-control form-control-sm">
                            </div>

                            <button type="submit" name="update_profile" class="btn btn-primary btn-sm w-100">Save
                                Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Calendar Section -->
        <?php include '../partials/teacher-calendar.php'; ?>
    </div>
</div>

<!-- Footer -->
<?php include '../partials/footer.php'; ?>
