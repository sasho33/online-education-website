<?php

// Include database connection
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/connection.php';

function getUserByID($userID) {
    $result = select('users', ['UserID' => $userID]);
    return $result ? $result[0] : null;
}

// Update a user by conditions
function updateUser($data, $conditions) {
    return update('users', $data, $conditions);
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate input
    if (empty($email)) {
        $errors[] = "Email is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        $user = select('users', ['email' => $email]);

        if ($user && password_verify($password, $user[0]['Password'])) {
            // Login successful: Store user info in session
            $_SESSION['user_id'] = $user[0]['UserID'];
            $_SESSION['user_name'] = $user[0]['first_name'] . ' ' . $user[0]['last_name'];
            $_SESSION['user_role'] = $user[0]['Role'];
        
            // Redirect based on role
            $redirectUrl = BASE_URL . "pages/" . ($_SESSION['user_role'] === 'admin' ? "teacher-dashboard.php" : "dashboard.php");
            echo "<script>window.location.href = '$redirectUrl';</script>";
            exit;
        }
         else {
            $errors[] = "Invalid email or password.";
        }
    }
} else {
    $email = '';
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $Role = isset($_POST['Role']) && $_POST['Role'] === 'admin' ? 'admin' : 'student';

    // Validation: Check first and last name length
    if (strlen($first_name) < 2) {
        $errors[] = "First name must be at least 2 characters.";
    }
    if (strlen($last_name) < 2) {
        $errors[] = "Last name must be at least 2 characters.";
    }

    // Validation: Check if passwords match
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Validation: Check if email is already registered
    if (empty($errors)) { // Only check email if there are no other errors
        $existingUser = select('users', ['email' => $email]);
        if ($existingUser) {
            $errors[] = "Email is already registered.";
        }
    }

    // If there are no errors, process the registration
    if (empty($errors)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert user into the database
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'Email' => $email,
            'Password' => $hashedPassword,
            'Role' => $Role
        ];
        
        // Assuming your insert function returns true if successful
        $result = insert('users', $data);
        

        // Check if the result is successful
        if ($result) {
            // Registration successful, redirect to login page
            echo "<script>
               window.location.href = '" . BASE_URL . "pages/login.php';
            </script>";
            exit();
        } else {
            // Insert failed
            $errors[] = "Registration failed. Please try again!";
        }
    }
} else {
    $first_name = '';
    $last_name = '';
    $email = '';
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_student'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $Role = isset($_POST['Role']) && $_POST['Role'] === 'admin' ? 'admin' : 'student';

    // Validation: Check first and last name length
    if (strlen($first_name) < 2) {
        $errors[] = "First name must be at least 2 characters.";
    }
    if (strlen($last_name) < 2) {
        $errors[] = "Last name must be at least 2 characters.";
    }

    // Validation: Check if passwords match
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Validation: Check if email is already registered
    if (empty($errors)) { // Only check email if there are no other errors
        $existingUser = select('users', ['email' => $email]);
        if ($existingUser) {
            $errors[] = "Email is already registered.";
        }
    }

    // If there are no errors, process the registration
    if (empty($errors)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert user into the database
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'Email' => $email,
            'Password' => $hashedPassword,
            'Role' => $Role
        ];
        
        // Assuming your insert function returns true if successful
        $result = insert('users', $data);
        

        // Check if the result is successful
        if ($result) {
            echo "<script>
            window.location.href = '" . BASE_URL . "pages/teacher-dashboard.php';
        </script>";
        exit();
        } else {
            // Insert failed
            $errors[] = "Registration failed. Please try again!";
        }
    }
} else {
    $first_name = '';
    $last_name = '';
    $email = '';
}


if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $studentId = intval($_GET['id']); 

    // Use the delete function to remove the student
    $result = delete('users', ['UserID' => $studentId]);

    if ($result) {
        echo "<script>
            
            window.location.href = '" . BASE_URL . "pages/teacher-dashboard.php';
        </script>";
    } else {
        echo "<script>
            alert('Failed to delete the student. Please try again.');
        </script>";
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_student'])) {
    $id = $_POST['UserID'];
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);

    // Validation
    if (strlen($first_name) < 2) {
        $errors[] = "First name must be at least 2 characters.";
    }
    if (strlen($last_name) < 2) {
        $errors[] = "Last name must be at least 2 characters.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    }

    if (empty($errors)) {
        // Update the student
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'Email' => $email,
        ];
        $conditions = ['UserID' => $id];
        $result = update('users', $data, $conditions);

        if ($result) {
            echo "<script>
               window.location.href = '" . BASE_URL . "pages/teacher-dashboard.php';
            </script>";
            exit();
        } else {
            $errors[] = "Failed to update student. Please try again.";
        }
    }
}



?>