<?php
// Include database connection
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/connection.php';

// Fetch user by ID
function getUserByID($userID) {
    $result = select('users', ['UserID' => $userID]);
    return $result ? $result[0] : null;
}

// Update a user by conditions
function updateUser($data, $conditions) {
    return update('users', $data, $conditions);
}

// Validate user data
function validateUser($first_name, $last_name, $email, $password = null, $confirm_password = null) {
    $errors = [];

    if (strlen($first_name) < 2) $errors[] = "First name must be at least 2 characters.";
    if (strlen($last_name) < 2) $errors[] = "Last name must be at least 2 characters.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";

    if ($password !== null) {
        $passwordErrors = validatePassword($password, $confirm_password);
        $errors = array_merge($errors, $passwordErrors);
    }

    return $errors;
}

// Validate login inputs
function validateLogin($email, $password) {
    $errors = [];
    if (empty($email)) {
        $errors[] = "Email is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }
    return $errors;
}


// Validate password
function validatePassword($password, $confirm_password) {
    $errors = [];

    if (strlen($password) < 4) {
        $errors[] = "Password must be at least 4 characters.";
    }
    if (!preg_match('/[a-zA-Z]/', $password)) {
        $errors[] = "Password must include at least one letter.";
    }
    if (!preg_match('/\d/', $password)) {
        $errors[] = "Password must include at least one digit.";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    return $errors;
}

// Redirect helper
function redirectTo($url, $message = null) {
    if ($message) {
        echo "<script>alert('$message');</script>";
    }
    echo "<script>window.location.href = '$url';</script>";
    exit();
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $errors = validateLogin($email, $password);
    if (empty($errors)) {
        $user = select('users', ['email' => $email]);
        if ($user && password_verify($password, $user[0]['Password'])) {
            // Login successful
            $_SESSION['user_id'] = $user[0]['UserID'];
            $_SESSION['user_name'] = $user[0]['first_name'] . ' ' . $user[0]['last_name'];
            $_SESSION['user_role'] = $user[0]['Role'];
            $redirectUrl = BASE_URL . "pages/" . ($_SESSION['user_role'] === 'admin' ? "teacher-dashboard.php" : "dashboard.php");
            redirectTo($redirectUrl);
        } else {
            $errors[] = "Invalid email or password.";
        }
    }
}

// Handle registration and adding a student
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['register']) || isset($_POST['add_student']))) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $role = isset($_POST['Role']) && $_POST['Role'] === 'admin' ? 'admin' : 'student';

    $errors = validateUser($first_name, $last_name, $email, $password, $confirm_password);
    if (empty($errors)) {
        $existingUser = select('users', ['email' => $email]);
        if ($existingUser) {
            $errors[] = "Email is already registered.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $data = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'Email' => $email,
                'Password' => $hashedPassword,
                'Role' => $role,
            ];
            $result = insert('users', $data);
            $redirectUrl = isset($_POST['register']) ? BASE_URL . "pages/login.php" : BASE_URL . "pages/teacher-dashboard.php";
            if ($result) redirectTo($redirectUrl);
            $errors[] = "Failed to add user. Please try again.";
        }
    }
}

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_student'])) {
    $id = $_POST['UserID'];
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    $errors = validateUser($first_name, $last_name, $email, $password, $confirm_password);
    if (empty($errors)) {
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'Email' => $email,
        ];
        if (!empty($password)) {
            $data['Password'] = password_hash($password, PASSWORD_BCRYPT);
        }
        if (updateUser($data, ['UserID' => $id])) {
            redirectTo(BASE_URL . "pages/teacher-dashboard.php", "Profile updated successfully.");
        } else {
            $errors[] = "Failed to update profile. Please try again.";
        }
    }
}

// Handle deletion
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $studentId = intval($_GET['id']);
    if (delete('users', ['UserID' => $studentId])) {
        redirectTo(BASE_URL . "pages/teacher-dashboard.php", "User deleted successfully.");
    } else {
        $errors[] = "Failed to delete the user.";
    }
}
