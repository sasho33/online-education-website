<?php



// Fetch all modules with students
function getAllModulesWithStudents()
{
    global $pdo;

    // Fetch modules with head teacher
    $sql = "
        SELECT 
            m.ModuleID,
            m.Name,
            m.Description,
            CONCAT(u.first_name, ' ', u.last_name) AS HeadTeacher
        FROM modules m
        LEFT JOIN users u ON m.HeadTeacherID = u.UserID
    ";
    $stmt = $pdo->query($sql);
    $modules = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch students and subjects for each module
    foreach ($modules as &$module) {
        // Get students
        $studentsSql = "
            SELECT 
                u.UserID, 
                u.first_name, 
                u.last_name 
            FROM users u 
            WHERE u.ModuleID = :moduleID
        ";
        $studentsStmt = $pdo->prepare($studentsSql);
        $studentsStmt->execute(['moduleID' => $module['ModuleID']]);
        $module['Students'] = $studentsStmt->fetchAll(PDO::FETCH_ASSOC);

        // Get subjects
        $subjectsSql = "
            SELECT 
                s.SubjectID, 
                s.Name 
            FROM module_subjects ms
            JOIN subjects s ON ms.SubjectID = s.SubjectID
            WHERE ms.ModuleID = :moduleID
        ";
        $subjectsStmt = $pdo->prepare($subjectsSql);
        $subjectsStmt->execute(['moduleID' => $module['ModuleID']]);
        $module['Subjects'] = $subjectsStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $modules;
}


// Fetch all modules
function getAllModules()
{
    global $pdo;
    $sql = "
        SELECT m.ModuleID, m.Name, m.Description, 
               CONCAT(u.first_name, ' ', u.last_name) AS HeadTeacher
        FROM modules m
        LEFT JOIN users u ON m.HeadTeacherID = u.UserID
    ";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Fetch all subjects
function getAllSubjects()
{
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM subjects");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch all teachers
function getAllTeachers()
{
    global $pdo;
    $stmt = $pdo->query("SELECT UserID, first_name, last_name FROM users WHERE Role = 'admin'");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch all students
function getAllStudents()
{
    global $pdo;
    $stmt = $pdo->query("SELECT UserID, first_name, last_name FROM users WHERE Role = 'student'");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch students not enrolled in any module
function getUnenrolledStudents()
{
    global $pdo;

    $sql = "
    SELECT UserID, first_name, last_name 
    FROM users 
    WHERE Role = 'student' AND ModuleID IS NULL
    ";

    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getStudentsByModule($moduleID)
{
    global $pdo;

    $sql = "
        SELECT u.UserID, u.first_name, u.last_name
        FROM users u
        WHERE u.Role = 'student' AND u.ModuleID = :moduleID
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['moduleID' => $moduleID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getSubjectsByModule($moduleID)
{
    global $pdo;

    $sql = "
        SELECT s.SubjectID, s.Name
        FROM subjects s
        INNER JOIN module_subjects ms ON s.SubjectID = ms.SubjectID
        WHERE ms.ModuleID = :moduleID
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['moduleID' => $moduleID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getModuleByID($moduleID)
{
    global $pdo;

    $sql = "
        SELECT 
            m.ModuleID,
            m.Name AS ModuleName,
            m.Description AS ModuleDescription,
            m.HeadTeacherID,
            m.CreatedAt AS ModuleCreatedAt,
            CONCAT(u.first_name, ' ', u.last_name) AS HeadTeacher
        FROM modules m
        LEFT JOIN users u ON m.HeadTeacherID = u.UserID
        WHERE m.ModuleID = :moduleID
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['moduleID' => $moduleID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}







// Add a new module
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_module'])) {
    $moduleName = trim($_POST['module_name']);
    $moduleDescription = trim($_POST['module_description']);
    $headTeacherID = intval($_POST['head_teacher_id']);
    $studentIDs = $_POST['student_ids'] ?? [];
    $subjectIDs = $_POST['subject_ids'] ?? [];
    // Temporary module ID
    $errors = [];

    if (strlen($moduleName) < 3) $errors[] = "Module name must be at least 3 characters.";
    if (strlen($moduleDescription) < 5) $errors[] = "Description must be at least 5 characters.";
    if (!$headTeacherID) $errors[] = "Head Teacher is required.";

    if (empty($errors)) {
        global $pdo;
        try {
            $pdo->beginTransaction();

            // Insert module
            $stmt = $pdo->prepare("INSERT INTO modules (Name, Description, HeadTeacherID) VALUES (:name, :description, :head_teacher_id)");
            $stmt->execute([
                'name' => $moduleName,
                'description' => $moduleDescription,
                'head_teacher_id' => $headTeacherID,
            ]);
            $moduleID = $pdo->lastInsertId();



            // // Assign students
            foreach ($studentIDs as $studentID) {
                $stmt = $pdo->prepare("UPDATE users SET ModuleID = :module_id WHERE UserID = :user_id");

                $stmt->execute([
                    'module_id' => $moduleID,
                    'user_id' => $studentID,
                ]);
            }

            // Assign subjects            
            foreach ($subjectIDs as $subjectID) {
                $insertSubjectSQL = "
                    INSERT INTO module_subjects (ModuleID, SubjectID) 
                    VALUES (:module_id, :subject_id)
                ";
                $stmt = $pdo->prepare($insertSubjectSQL);
                $stmt->execute([
                    'module_id' => $moduleID,
                    'subject_id' => $subjectID,
                ]);
            }

            $pdo->commit();

            echo "<script>window.location.href = '/online-education/pages/teacher/manage-modules.php';</script>";
        } catch (Exception $e) {
            $pdo->rollBack();
            error_log("Error in adding module: " . $e->getMessage());
            $errors[] = "Failed to add module.";
        }
    }
}




// Handle module editing
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_module'])) {
    $moduleID = intval($_POST['module_id']);
    $moduleName = trim($_POST['module_name']);
    $moduleDescription = trim($_POST['module_description']);
    $headTeacherID = intval($_POST['head_teacher_id']);
    $studentIDs = $_POST['student_ids'] ?? [];
    $subjectIDs = $_POST['subject_ids'] ?? [];

    $errors = [];

    // Validation
    if (strlen($moduleName) < 3) $errors[] = "Module name must be at least 3 characters.";
    if (strlen($moduleDescription) < 5) $errors[] = "Description must be at least 5 characters.";
    if (!$headTeacherID) $errors[] = "Head Teacher is required.";

    if (empty($errors)) {
        global $pdo;
        try {
            $pdo->beginTransaction();

            // Update the module details
            $updateModuleSQL = "
                UPDATE modules
                SET Name = :name, Description = :description, HeadTeacherID = :head_teacher_id
                WHERE ModuleID = :module_id
            ";
            $stmt = $pdo->prepare($updateModuleSQL);
            $stmt->execute([
                'name' => $moduleName,
                'description' => $moduleDescription,
                'head_teacher_id' => $headTeacherID,
                'module_id' => $moduleID,
            ]);

            // Update students
            $clearStudentsSQL = "UPDATE users SET ModuleID = NULL WHERE ModuleID = :module_id";
            $stmt = $pdo->prepare($clearStudentsSQL);
            $stmt->execute(['module_id' => $moduleID]);

            foreach ($studentIDs as $studentID) {
                $updateStudentSQL = "UPDATE users SET ModuleID = :module_id WHERE UserID = :user_id";
                $stmt = $pdo->prepare($updateStudentSQL);
                $stmt->execute([
                    'module_id' => $moduleID,
                    'user_id' => $studentID,
                ]);
            }

            // Update subjects
            $deleteSubjectsSQL = "DELETE FROM module_subjects WHERE ModuleID = :module_id";
            $stmt = $pdo->prepare($deleteSubjectsSQL);
            $stmt->execute(['module_id' => $moduleID]);

            foreach ($subjectIDs as $subjectID) {
                $insertSubjectSQL = "
                    INSERT INTO module_subjects (ModuleID, SubjectID) 
                    VALUES (:module_id, :subject_id)
                ";
                $stmt = $pdo->prepare($insertSubjectSQL);
                $stmt->execute([
                    'module_id' => $moduleID,
                    'subject_id' => $subjectID,
                ]);
            }

            $pdo->commit();
            echo "<script>window.location.href = '/online-education/pages/teacher/manage-modules.php';</script>";
            exit();
        } catch (Exception $e) {
            $pdo->rollBack();
            $errors[] = "Failed to update the module. Please try again.";
        }
    }
}




// Delete a module
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'], $_GET['id']) && $_GET['action'] === 'delete') {
    $moduleID = intval($_GET['id']);
    $stmt = $pdo->prepare("DELETE FROM modules WHERE ModuleID = :moduleID");
    if ($stmt->execute(['moduleID' => $moduleID])) {
        echo "<script>
            window.location.href = '/online-education/pages/teacher/manage-modules.php';
        </script>";
    } else {
        echo "<script>alert('Failed to delete module.');</script>";
    }
    exit();
}
