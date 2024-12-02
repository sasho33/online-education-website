<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$currentPage = basename($_SERVER['PHP_SELF']); // Get the current file name

$_SESSION ? $studentID = $_SESSION['user_id'] : $studentID = null;

function getSubjectNameByStudentId($studentID)
{
    global $pdo; // Assuming $pdo is your database connection

    $sql = "
        SELECT s.Name AS SubjectName, s.SubjectID
        FROM users u
        JOIN module_subjects ms ON u.ModuleID = ms.ModuleID
        JOIN subjects s ON ms.SubjectID = s.SubjectID
        WHERE u.UserID = :studentID
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['studentID' => $studentID]);

    // Fetch all subject names and IDs as an associative array
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
