<?php
include '../partials/header.php';
include '../../db/controllers/materials.php';
include '../../db/controllers/subjects.php';


if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}

$materialID = $_GET['id'] ?? null;
$material = getMaterialByID($materialID);

if (!$material) {
    echo "<script>
        alert('Material not found.');
        window.location.href = '" . BASE_URL . "pages/teacher/modify-materials.php';
    </script>";
    exit();
}

$title = $material['Title'];
$description = $material['Description'];
$release_date = $material['ReleaseDate'];
$subject_id = $material['SubjectID'];

// Fetch subjects from the database
$subjects = select('subjects');

// Fetch associated files for the material
$files = select('material_files', ['MaterialID' => $materialID]);


?>

<div class="container">
    <h3>Edit Material</h3>
    <?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="subject_id" class="form-label">Subject</label>
            <select name="subject_id" id="subject_id" class="form-select" required>
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
            <input type="text" name="title" id="title" class="form-control" value="<?= htmlspecialchars($title); ?>"
                required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Material Description</label>
            <textarea name="description" id="description" class="form-control" rows="5"
                required><?= htmlspecialchars($description); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" name="release_date" id="release_date" class="form-control"
                value="<?= htmlspecialchars($release_date); ?>" required>
        </div>
        <div class="mb-3">
            <label for="uploadFile" class="form-label">Upload Additional Files</label>
            <input type="file" name="files[]" id="uploadFile" class="form-control" multiple>
        </div>
        <div id="fileList" class="mt-3">
            <h6>Existing Files:</h6>
            <ul class="list-group">
                <?php foreach ($files as $file): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="<?= htmlspecialchars($file['FilePath']); ?>" target="_blank">
                        <?= htmlspecialchars(basename($file['FilePath'])); ?>
                    </a>
                    <a href="#" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure you want to delete this file?');">
                        Remove
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <button type="submit" name="edit_material" class="btn btn-primary">Save Changes</button>
        <a href="<?= BASE_URL; ?>pages/teacher/modify-materials.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include '../partials/footer.php'; ?>