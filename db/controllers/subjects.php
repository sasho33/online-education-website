<?php
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/connection.php';

function uploadFile($file) {
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/online-education/uploads/subjects/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
    }

    $fileName = basename($file['name']);
    $filePath = $uploadDir . $fileName;
    $webPath = '/online-education/uploads/subjects/' . $fileName;

    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        return $webPath; // Return the web-accessible path
    }
    return null; // Return null if upload fails
}

function getAllSubjects()
{
    return select('subjects');
}

function getSubjectById($id)
{
    $result = select('subjects', ['SubjectID' => $id]);
    return !empty($result) ? $result[0] : null;
}


$errors = [];

// Add Subject
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_subject'])) {
    $subject_name = trim($_POST['subject_name']);
    $subject_description = trim($_POST['subject_description']);
    $imagePath = !empty($_FILES['subject_image']['name']) ? uploadFile($_FILES['subject_image']) : null;
    

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
            'Description' => $subject_description,
            'ImagePath' => $imagePath
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

// Delete Subject
if (isset($_GET['action'], $_GET['id']) && $_GET['action'] === 'delete') {
    $id = intval($_GET['id']);
    try {
        if (delete('subjects', ['SubjectID' => $id])) {
            echo "<script>
                                window.location.href = '" . BASE_URL . "pages/teacher/subjects.php';
            </script>";
        } else {
            throw new Exception('Failed to delete subject.');
        }
    } catch (Exception $e) {
        echo "<script>
            alert('Cannot delete subject. It may be associated with existing materials.');
            window.location.href = '" . BASE_URL . "pages/teacher/subjects.php';
        </script>";
    }
    exit();
}


$isEditMode = isset($_GET['action'], $_GET['id']) && $_GET['action'] === 'edit';
$editSubject = $isEditMode ? getSubjectById(intval($_GET['id'])) : null;

if ($isEditMode && !$editSubject) {
    echo "<script>
        alert('Subject not found.');
        window.location.href = '" . BASE_URL . "pages/teacher/subjects.php';
    </script>";
    exit();
}

// Update logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_subject'])) {
    $subject_id = intval($_POST['subject_id']);
    $subject_name = trim($_POST['subject_name']);
    $subject_description = trim($_POST['subject_description']);
    $imagePath = !empty($_FILES['subject_image']['name']) ? uploadFile($_FILES['subject_image']) : $editSubject['ImagePath'];

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
            'Description' => $subject_description,
            'ImagePath' => $imagePath
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