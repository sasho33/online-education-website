<?php
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/connection.php';

// Fetch student profile information
function getStudentData($userID) {
    global $pdo;
    $sql = "SELECT CONCAT(first_name, ' ', last_name) AS name, student_number, course, progress FROM students WHERE UserID = :userID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userID' => $userID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Fetch enrolled subjects
function getEnrolledSubjects($userID) {
    global $pdo;
    $sql = "
        SELECT s.Name, s.Description, s.ImagePath, CONCAT('/pages/student/', s.Link) AS Link
        FROM subjects s
        INNER JOIN enrollments e ON s.SubjectID = e.SubjectID
        WHERE e.UserID = :userID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userID' => $userID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch assignments for a student
function getStudentAssignments($userID) {
    global $pdo;
    $sql = "
        SELECT a.Title, a.DueDate, CONCAT('/assignments/view.php?id=', a.AssignmentID) AS Link, s.Name AS SubjectName
        FROM assignments a
        INNER JOIN enrollments e ON a.SubjectID = e.SubjectID
        INNER JOIN subjects s ON a.SubjectID = s.SubjectID
        WHERE e.UserID = :userID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userID' => $userID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch announcements for a student
function getStudentAnnouncements($userID) {
    global $pdo;
    $sql = "
        SELECT n.Title, n.Content
        FROM news n
        INNER JOIN enrollments e ON n.SubjectID = e.SubjectID
        WHERE e.UserID = :userID
        LIMIT 5";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userID' => $userID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
