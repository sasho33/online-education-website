<?php
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/connection.php';

$errors = [];

// Fetch all materials with optional subject filter
function getAllMaterials($subjectID = null) {
    global $pdo;
    $sql = "
    SELECT m.MaterialID, m.Title, m.ReleaseDate, s.Name AS SubjectName
    FROM materials m
    LEFT JOIN subjects s ON m.SubjectID = s.SubjectID
    ";
    if ($subjectID) {
        $sql .= " WHERE m.SubjectID = :subjectID";
    }
    $stmt = $pdo->prepare($sql);
    $stmt->execute($subjectID ? ['subjectID' => $subjectID] : []);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch a single material by ID
function getMaterialByID($materialID) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM materials WHERE MaterialID = :materialID");
    $stmt->execute(['materialID' => $materialID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Fetch associated files for a material
function getMaterialFiles($materialID) {
    return select('material_files', ['MaterialID' => $materialID]);
}

// Fetch all subjects for dropdown
function getSubjectsForDropdown() {
    return select('subjects');
}

// Save material (add or update)
function saveMaterial($data, $materialID = null) {
    return $materialID ? update('materials', $data, ['MaterialID' => $materialID]) : insert('materials', $data);
}

// Save uploaded files and associate them with a material
function saveUploadedFiles($materialID, $files) {
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/online-education/uploads/materials/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    foreach ($files['name'] as $key => $fileName) {
        if ($files['error'][$key] === UPLOAD_ERR_OK) {
            $tmpName = $files['tmp_name'][$key];
            $filePath = $uploadDir . basename($fileName);
            $webPath = '/online-education/uploads/materials/' . basename($fileName);

            if (move_uploaded_file($tmpName, $filePath)) {
                insert('material_files', [
                    'MaterialID' => $materialID,
                    'FilePath' => $webPath
                ]);
            }
        } else {
            global $errors;
            $errors[] = "Failed to upload file: $fileName";
        }
    }
}

// Delete material and associated files
function deleteMaterial($materialID) {
    global $pdo;
    $pdo->beginTransaction();
    try {
        $files = select('material_files', ['MaterialID' => $materialID]);
        foreach ($files as $file) {
            $filePath = $_SERVER['DOCUMENT_ROOT'] . $file['FilePath'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        delete('material_files', ['MaterialID' => $materialID]);
        delete('materials', ['MaterialID' => $materialID]);
        $pdo->commit();
        return true;
    } catch (Exception $e) {
        $pdo->rollBack();
        return false;
    }
}

// Handle GET actions (Delete)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action'], $_GET['id']) && $_GET['action'] === 'delete') {
        $materialID = intval($_GET['id']);
        if (deleteMaterial($materialID)) {
            echo "<script>
                
                window.location.href = '/online-education/pages/teacher/modify-materials.php';
            </script>";
        } else {
            echo "<script>
                alert('Failed to delete material.');
            </script>";
        }
        exit();
    }
}

// Handle POST actions (Add/Edit)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_material'])) {
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $release_date = !empty($_POST['release_date']) ? $_POST['release_date'] : date('Y-m-d');
        $subject_id = intval($_POST['subject_id']);
        $materialID = $_POST['material_id'] ?? null;

        // Validation
        if (strlen($title) < 2) $errors[] = "Title must be at least 2 characters.";
        if (strlen($description) < 5) $errors[] = "Description must be at least 5 characters.";
        if (!$subject_id) $errors[] = "Subject is required.";

        if (empty($errors)) {
            $data = [
                'Title' => $title,
                'Description' => $description,
                'ReleaseDate' => $release_date,
                'SubjectID' => $subject_id,
            ];

            if (saveMaterial($data, $materialID)) {
                // Handle file uploads
                if (!empty($_FILES['files']['name'][0])) {
                    $materialID = $materialID ?: $pdo->lastInsertId();
                    saveUploadedFiles($materialID, $_FILES['files']);
                }

                echo "<script>
                   window.location.href = '/online-education/pages/teacher/modify-materials.php';
                </script>";
                exit();
            } else {
                $errors[] = isset($materialID) ? "Failed to update material." : "Failed to add material.";
            }
        }
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_material'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $release_date = !empty($_POST['release_date']) ? $_POST['release_date'] : date('Y-m-d');
    $subject_id = intval($_POST['subject_id']);
    $materialID = $_POST['material_id'] ?? null;

    // Validation
    if (strlen($title) < 2) $errors[] = "Title must be at least 2 characters.";
    if (strlen($description) < 5) $errors[] = "Description must be at least 5 characters.";
    if (!$subject_id) $errors[] = "Subject is required.";

    if (empty($errors)) {
        $data = [
            'Title' => $title,
            'Description' => $description,
            'ReleaseDate' => $release_date,
            'SubjectID' => $subject_id,
        ];

        if (saveMaterial($data, $materialID)) {
            // Handle file uploads
            if (!empty($_FILES['files']['name'][0])) {
                $materialID = $materialID ?: $pdo->lastInsertId();
                saveUploadedFiles($materialID, $_FILES['files']);
            }

            echo "<script>
               window.location.href = '/online-education/pages/teacher/modify-materials.php';
            </script>";
            exit();
        } else {
            $errors[] = isset($materialID) ? "Failed to update material." : "Failed to add material.";
        }
    }

}
?>
