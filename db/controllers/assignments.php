<?php
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/connection.php'; // Include database connection

// Fetch all assignments
function getAllAssignments()
{
    global $pdo; // Database connection
    $sql = "SELECT AssignmentID, Title, Description, DueDate, Color FROM assignments";
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function getAssingmentForCalendar()
{
    global $pdo; // Database connection
    $sql = "SELECT a.Title, a.Description, s.Name, a.DueDate, a.Color, a.AssignmentID
            FROM assignments a
            JOIN subjects s ON a.SubjectID = s.SubjectID";
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function getAssingmentForCalendarByUserId($userId)
{
    global $pdo; // Database connection
    $sql = "
        SELECT a.Title, a.Description, s.Name, a.DueDate, a.Color, a.AssignmentID
        FROM assignments a
        JOIN subjects s ON a.SubjectID = s.SubjectID
        JOIN module_subjects ms ON s.SubjectID = ms.SubjectID
        JOIN users u ON ms.ModuleID = u.ModuleID
        WHERE u.UserID = :userId
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userId' => $userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllAssignmentsWithSubjects()
{
    global $pdo;
    $sql = "
        SELECT a.AssignmentID, a.Title, a.Description, a.DueDate, a.Color, s.Name AS SubjectName
        FROM assignments a
        JOIN subjects s ON a.SubjectID = s.SubjectID
    ";
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


// Fetch assignment by ID
function getAssignmentByID($assignmentID)
{
    $result = select('assignments', ['AssignmentID' => $assignmentID]);
    return $result ? $result[0] : null;
}

// Add a new assignment
function addAssignment($data)
{
    return insert('assignments', $data);
}

// Update an assignment
function updateAssignment($data, $conditions)
{
    return update('assignments', $data, $conditions);
}

// Fetch all subjects
function getAllSubjects()
{
    global $pdo;
    $sql = "SELECT SubjectID, Name FROM subjects";
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

$subjects = getAllSubjects();

// Delete an assignment
function deleteAssignment($assignmentID)
{
    return delete('assignments', ['AssignmentID' => $assignmentID]);
}
// Handle form submission for adding or editing an assignment
$errors = [];
$title = $description = $due_date = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_assignment'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $due_date = $_POST['due_date'];
    $subject_id = intval($_POST['subject_id']); // Get selected SubjectID
    $color = $_POST['color'];

    // Validation
    if (strlen($title) < 3) $errors[] = "Assignment title must be at least 3 characters.";
    if (strlen($description) < 5) $errors[] = "Assignment description must be at least 5 characters.";
    if (empty($due_date)) $errors[] = "Due date is required.";
    if (empty($subject_id)) $errors[] = "Please select a subject.";

    if (empty($errors)) {
        $data = [
            'Title' => $title,
            'Description' => $description,
            'DueDate' => $due_date,
            'SubjectID' => $subject_id, // Include SubjectID in data
            'Color' => $color,
        ];

        if (!empty($_POST['assignment_id'])) {
            // Update existing assignment
            updateAssignment($data, ['AssignmentID' => $_POST['assignment_id']]);
        } else {
            // Add new assignment
            addAssignment($data);
        }

        echo "<script>window.location.href = '" . BASE_URL . "pages/teacher/assignments.php';</script>";
        exit();
    }
}


// Handle assignment deletion
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $assignmentID = $_GET['id'];
    deleteAssignment($assignmentID);

    echo "<script>
        window.location.href = '" . BASE_URL . "pages/teacher/assignments.php';
    </script>";
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    $assignmentID = $_GET['id'];
    $assignment = getAssignmentByID($assignmentID);

    if ($assignment) {
        $title = $assignment['Title'];
        $description = $assignment['Description'];
        $due_date = $assignment['DueDate'];
        $color = $assignment['Color']; // Fetch the color
    } else {
        echo "<script>
            alert('Assignment not found.');
            window.location.href = '" . BASE_URL . "pages/teacher/assignments.php';
        </script>";
        exit();
    }
}



// Handle form submission for adding or editing an assignment
