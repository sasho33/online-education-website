<?php
// Fetch the student's module
function getStudentModule($studentID)
{
    global $pdo;
    $sql = "
        SELECT m.ModuleID, m.Name AS ModuleName, m.Description AS ModuleDescription, 
               CONCAT(u.first_name, ' ', u.last_name) AS HeadTeacher
        FROM modules m
        LEFT JOIN users u ON m.HeadTeacherID = u.UserID
        WHERE m.ModuleID = (
            SELECT ModuleID FROM users WHERE UserID = :studentID
        )
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['studentID' => $studentID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Fetch subjects assigned to the module
function getSubjectsByModule($moduleID)
{
    global $pdo;
    $sql = "
        SELECT s.SubjectID, s.Name, s.Description, s.ImagePath
        FROM module_subjects ms
        INNER JOIN subjects s ON ms.SubjectID = s.SubjectID
        WHERE ms.ModuleID = :moduleID
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['moduleID' => $moduleID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch assignments for the module
function getAssignmentsByModule($moduleID)
{
    global $pdo;
    $sql = "
        SELECT 
            a.AssignmentID, 
            a.Title, 
            a.Description, 
            a.DueDate, 
            a.Color, 
            s.Name AS SubjectName
        FROM assignments a
        JOIN subjects s ON a.SubjectID = s.SubjectID
        WHERE s.SubjectID IN (
            SELECT ms.SubjectID
            FROM module_subjects ms
            WHERE ms.ModuleID = :moduleID
        )
            
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['moduleID' => $moduleID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getLatestAnnouncements()
{
    global $pdo;
    $sql = "
        SELECT Title, Content, CreatedAt
        FROM news
        ORDER BY CreatedAt DESC
        LIMIT 4
    ";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
