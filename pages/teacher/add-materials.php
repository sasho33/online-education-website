<?php
include '../partials/header.php';
include '../../db/controllers/materials.php';
include '../../db/controllers/subjects.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}

// Initialize variables
$title = $description = $release_date = '';
$subject_id = '';
$success = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_material'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $release_date = $_POST['release_date'];
    $subject_id = $_POST['subject_id'];
    $uploaded_files = $_FILES['files']; // Capture multiple files

    // Validation
    if (strlen($title) < 2) {
        $errors[] = "Title must be at least 2 characters.";
    }
    if (strlen($description) < 5) {
        $errors[] = "Description must be at least 5 characters.";
    }
    if (empty($subject_id)) {
        $errors[] = "Subject is required.";
    }

    // Proceed if no errors
    if (empty($errors)) {
        // Insert material into the database
        $data = [
            'SubjectID' => $subject_id,
            'Title' => $title,
            'Description' => $description,
            'ReleaseDate' => $release_date,
        ];
        $material_id = insert('materials', $data);

        if ($material_id) {
            // Handle file uploads
            foreach ($uploaded_files['tmp_name'] as $key => $tmp_name) {
                if ($uploaded_files['error'][$key] === UPLOAD_ERR_OK) {
                    $file_name = $uploaded_files['name'][$key];
                    $file_path = '../../uploads/' . basename($file_name);
        
                    // Move file to uploads directory
                    if (move_uploaded_file($tmp_name, $file_path)) {
                        // Insert file record into material_files table
                        insert('material_files', [
                            'MaterialID' => $material_id,
                            'FilePath' => $file_path
                        ]);
                    } else {
                        $errors[] = "Failed to upload file: $file_name";
                    }
                }
            }
        
            // Success message
            $success = "Material and files uploaded successfully.";
        
            // Redirection after success
            echo "<script>
                window.location.href = '" . BASE_URL . "pages/teacher/modify-materials.php';
            </script>";
            exit();
        } else {
            $errors[] = "Failed to add material.";
        }
        
    }
}


// Fetch subjects from the database
$subjects = select('subjects');

?>

<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php'; ?>
        <!-- Content Area -->
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="content">
                <h3 class="teacher-dashboard-header">Add Material</h3>

                <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <?php if (!empty($success)): ?>
                <div class="alert alert-success">
                    <?= htmlspecialchars($success); ?>
                </div>
                <?php endif; ?>


                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="subject_id" class="form-label">Subject</label>
                        <select name="subject_id" id="subject_id" class="form-select" required>
                            <option value="">Select Subject</option>
                            <?php foreach ($subjects as $subject): ?>
                            <option value="<?= $subject['SubjectID']; ?>"
                                <?= $subject_id == $subject['SubjectID'] ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($subject['Name']); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Material Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="<?= htmlspecialchars($title); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Material Content</label>
                        <textarea name="description" id="description" class="form-control"
                            rows="5"><?= htmlspecialchars($description); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="uploadFile" class="form-label">Upload Files</label>
                        <input type="file" name="files[]" id="uploadFile" class="form-control" multiple required
                            onchange="displaySelectedFiles(this, 'fileList')">
                        <small class="text-muted">You can select multiple files.</small>
                    </div>
                    <div id="fileList" class="mt-2">
                        <h6>Selected Files:</h6>
                        <ul class="list-group"></ul>
                    </div>

                    <div class="mb-3">
                        <label for="release_date" class="form-label">Release Date</label>
                        <input type="date" name="release_date" id="release_date" class="form-control"
                            value="<?= htmlspecialchars($release_date); ?>">
                    </div>
                    <a href="modify-materials.php" name="cancel" class="btn btn-light">Cancel</a>
                    <button type="submit" name="add_material" class="btn btn-primary">Add Material</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>