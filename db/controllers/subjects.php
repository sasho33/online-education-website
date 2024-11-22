<?php
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/connection.php';

$errors = [];

// Add Subject
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_subject'])) {
    $subject_name = trim($_POST['subject_name']);
    $subject_description = trim($_POST['subject_description']);

    // Validation
    if (strlen($subject_name) < 3) {
        $errors[] = "Subject name must be at least 3 characters.";
    }
    if (strlen($subject_description) < 7) {
        $errors[] = "Subject description must be at least 7 characters.";
    }

    if (empty($errors)) {
        $data = [
            'Name' => $subject_name,
            'Description' => $subject_description
        ];
        if (insert('subjects', $data)) {
            echo "<script>
            window.location.href = '" . BASE_URL . "pages/teacher/subjects.php';
        </script>";
        exit();
        } else {
            $errors[] = "Failed to add subject. Please try again.";
        }
    }
}

// Fetch All Subjects
function getAllSubjects()
{
    return select('subjects');
}

function getSubjectById($id)
{
    $result = select('subjects', ['SubjectID' => $id]);
    return !empty($result) ? $result[0] : null;
}

// Delete Subject
if (isset($_GET['action'], $_GET['id']) && $_GET['action'] === 'delete') {
    $id = intval($_GET['id']);
    if (delete('subjects', ['SubjectID' => $id])) {
   
        echo "<script>
            window.location.href = '" . BASE_URL . "pages/teacher/subjects.php';
        </script>";
        exit();
        
    } else {
        $errors[] = "Failed to delete subject. Please try again.";
    }
}

$isEditMode = isset($_GET['action'], $_GET['id']) && $_GET['action'] === 'edit';
$editSubject = $isEditMode ? getSubjectById(intval($_GET['id'])) : null;

// Update logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_subject'])) {
    $subject_id = intval($_POST['subject_id']);
    $subject_name = trim($_POST['subject_name']);
    $subject_description = trim($_POST['subject_description']);

    // Validation
    if (strlen($subject_name) < 3) {
        $errors[] = "Subject name must be at least 3 characters.";
    }
    if (strlen($subject_description) < 7) {
        $errors[] = "Subject description must be at least 7 characters.";
    }

    if (empty($errors)) {
        $data = [
            'Name' => $subject_name,
            'Description' => $subject_description
        ];
        if (update('subjects', $data, ['SubjectID' => $subject_id])) {
            
        echo "<script>
        window.location.href = '" . BASE_URL . "pages/teacher/subjects.php';
    </script>";
    exit();
        } else {
            $errors[] = "Failed to update subject. Please try again.";
        }
    }
}
?>