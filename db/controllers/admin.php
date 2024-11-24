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
?>
