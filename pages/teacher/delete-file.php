<?php
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/connection.php';


// Validate inputs
$fileID = $_GET['id'] ?? null;
$materialID = $_GET['material_id'] ?? null;

if (!$fileID || !$materialID) {
    echo "<script>
        alert('Invalid file or material ID.');
        window.location.href = '/online-education/pages/teacher/modify-materials.php';
    </script>";
    exit();
}

// Fetch file details
$file = select('material_files', ['FileID' => $fileID, 'MaterialID' => $materialID]);
if (!$file) {
    echo "<script>
        alert('File not found.');
        window.location.href = '/online-education/pages/teacher/edit-material.php?id=$materialID';
    </script>";
    exit();
}

$filePath = $_SERVER['DOCUMENT_ROOT'] . $file[0]['FilePath'];

// Delete the file from the server
if (file_exists($filePath)) {
    unlink($filePath);
}

// Delete the file record from the database
delete('material_files', ['FileID' => $fileID]);

echo "<script>
    
    window.location.href = '/online-education/pages/teacher/edit-material.php?id=$materialID';
</script>";
exit();
