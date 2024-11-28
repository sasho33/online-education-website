<?php
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/connection.php';

// Fetch all admins (users with the role 'admin')
function getAllAdmins() {
    return select('users', ['Role' => 'admin']);
}

// Fetch a specific admin by ID
function getAdminByID($adminID) {
    $result = select('users', ['UserID' => $adminID]);
    return $result ? $result[0] : null;
}

// Add a new admin
function addAdmin($data) {
    return insert('users', $data);
}

// Update an existing admin
function updateAdmin($data, $conditions) {
    return update('users', $data, $conditions);
}

// Delete an admin
function deleteAdmin($adminID) {
    return delete('users', ['UserID' => $adminID]);
}
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_admin'])) {
    $adminID = intval($_GET['id']); // Fetch the admin ID from the URL
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    // Enhanced validation
    if (strlen($firstName) < 2) {
        $errors[] = "First name must be at least 2 characters.";
    }
    if (strlen($lastName) < 2) {
        $errors[] = "Last name must be at least 2 characters.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (!empty($password)) {
        if (strlen($password) < 4) {
            $errors[] = "Password must be at least 4 characters.";
        }
        if (!preg_match('/[a-zA-Z]/', $password)) {
            $errors[] = "Password must include at least one letter.";
        }
        if (!preg_match('/\d/', $password)) {
            $errors[] = "Password must include at least one digit.";
        }
        if ($password !== $confirmPassword) {
            $errors[] = "Passwords do not match.";
        }
    }

    if (empty($errors)) {
        // Prepare data for update
        $data = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'Email' => $email,
        ];

        // Include password if it's updated
        if (!empty($password)) {
            $data['Password'] = password_hash($password, PASSWORD_BCRYPT);
        }

        // Attempt update
        if (updateAdmin($data, ['UserID' => $adminID])) {
            echo "<script>
                alert('Admin updated successfully.');
                window.location.href = '" . BASE_URL . "pages/teacher/manage-teachers.php';
            </script>";
            exit();
        } else {
            $errors[] = "Failed to update admin. Please try again.";
        }
    }
}




?>
