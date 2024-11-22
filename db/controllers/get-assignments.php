<?php
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/connection.php';
include 'assignments.php';

header('Content-Type: application/json');
echo json_encode(getAllAssignments());
?>