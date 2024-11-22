<?php
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/connection.php';

// Fetch all materials
function getAllMaterials() {
$sql = "
SELECT m.MaterialID, m.Title, m.ReleaseDate, s.Name AS SubjectName
FROM materials m
LEFT JOIN subjects s ON m.SubjectID = s.SubjectID
";
global $pdo;
$stmt = $pdo->query($sql);
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch materials by subject
function getMaterialsBySubject($subjectID) {
$sql = "
SELECT m.MaterialID, m.Title, m.ReleaseDate, s.Name AS SubjectName
FROM materials m
LEFT JOIN subjects s ON m.SubjectID = s.SubjectID
WHERE m.SubjectID = :subjectID
";
global $pdo;
$stmt = $pdo->prepare($sql);
$stmt->execute(['subjectID' => $subjectID]);
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function deleteMaterial($materialID) {
    global $pdo;
    
    // Begin transaction to ensure data integrity
    $pdo->beginTransaction();

    try {
        // Delete associated files
        $files = select('material_files', ['MaterialID' => $materialID]);
        foreach ($files as $file) {
            if (file_exists($file['FilePath'])) {
                unlink($file['FilePath']); // Remove the file from the server
            }
        }
        delete('material_files', ['MaterialID' => $materialID]); // Remove file records

        // Delete the material record
        delete('materials', ['MaterialID' => $materialID]);

        // Commit transaction
        $pdo->commit();

        return true;
    } catch (Exception $e) {
        // Rollback in case of error
        $pdo->rollBack();
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'], $_GET['id']) && $_GET['action'] === 'delete') {
    $materialID = intval($_GET['id']);
    if (deleteMaterial($materialID)) {
        echo "<script>
            window.location.href = '" . BASE_URL . "pages/teacher/modify-materials.php';
        </script>";
    } else {
        echo "<script>
            alert('Failed to delete material.');
        </script>";
    }
}


// Update material function
function updateMaterial($materialID, $data) {
    return update('materials', $data, ['MaterialID' => $materialID]);
}

// Fetch a single material
function getMaterialByID($materialID) {
    $materials = select('materials', ['MaterialID' => $materialID]);
    return $materials[0] ?? null;
}





// Fetch subjects for dropdown
// Delete material function

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_material'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $release_date = $_POST['release_date'];
    $subject_id = $_POST['subject_id'];

    // Validation
    $errors = [];
    if (strlen($title) < 2) {
        $errors[] = "Title must be at least 2 characters.";
    }
    if (strlen($description) < 5) {
        $errors[] = "Description must be at least 5 characters.";
    }

    if (empty($errors)) {
        // Update material in the database
        $data = [
            'SubjectID' => $subject_id,
            'Title' => $title,
            'Description' => $description,
            'ReleaseDate' => $release_date,
        ];
        $result = update('materials', $data, ['MaterialID' => $materialID]);

        if ($result) {
            echo "<script>
                window.location.href = '" . BASE_URL . "pages/teacher/modify-materials.php';
            </script>";
            exit();
        } else {
            $errors[] = "Failed to update material.";
        }
    }
}





?>