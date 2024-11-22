<?php
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/connection.php'; // Include database connection

// Fetch all assignments
function getAllAssignments() {
    return select('assignments');
}

// Fetch assignment by ID
function getAssignmentByID($assignmentID) {
    $result = select('assignments', ['AssignmentID' => $assignmentID]);
    return $result ? $result[0] : null;
}

// Add a new assignment
function addAssignment($data) {
    return insert('assignments', $data);
}

// Update an assignment
function updateAssignment($data, $conditions) {
    return update('assignments', $data, $conditions);
}

// Delete an assignment
function deleteAssignment($assignmentID) {
    return delete('assignments', ['AssignmentID' => $assignmentID]);
}
?>