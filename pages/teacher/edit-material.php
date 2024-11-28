<?php
include '../partials/header.php';
include '../../db/controllers/materials.php';


if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    echo "<script>window.location.href = '" . BASE_URL . "index.php';</script>";
    exit();
}

$materialID = $_GET['id'] ?? null;
$material = getMaterialByID($materialID);

if (!$material) {
    echo "<script>
        alert('Material not found.');
        window.location.href = 'modify-materials.php';
    </script>";
    exit();
}

$subjects = getSubjectsForDropdown();
$files = getMaterialFiles($materialID);

?>

<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php'; ?>
        
        <!-- Content Area -->
        <div class="col-lg-9 col-md-8 col-sm-10 col-xs-12">
            <div class="content">
                <h3>Edit Material</h3>

                <!-- Display Errors -->
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Edit Material Form -->
                <form method="POST" action="../../db/controllers/materials.php" enctype="multipart/form-data">
                    <input type="hidden" name="edit_material" value="1">
                    <input type="hidden" name="material_id" value="<?= htmlspecialchars($materialID); ?>">

                    <div class="mb-3">
                        <label for="subject_id">Subject</label>
                        <select name="subject_id" id="subject_id" class="form-select" required>
                            <?php foreach ($subjects as $subject): ?>
                                <option value="<?= $subject['SubjectID']; ?>" 
                                    <?= $material['SubjectID'] == $subject['SubjectID'] ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($subject['Name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" 
                            value="<?= htmlspecialchars($material['Title']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5" required>
                            <?= htmlspecialchars($material['Description']); ?>
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label for="files">Upload Additional Files</label>
                        <input type="file" name="files[]" id="files" class="form-control" multiple>
                    </div>

                    <div class="mb-3">
                        <h6>Existing Files:</h6>
                        <ul class="list-group">
                            <?php foreach ($files as $file): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="<?= htmlspecialchars($file['FilePath']); ?>" target="_blank">
                                        <?= htmlspecialchars(basename($file['FilePath'])); ?>
                                    </a>
                                    <a href="delete-file.php?id=<?= $file['FileID']; ?>&material_id=<?= $materialID; ?>"    class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this file?');"> Remove </a>

                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div> 
                    <div class="mb-3">
    <label for="release_date">Release Date</label>
    <input type="date" name="release_date" id="release_date" class="form-control" 
           value="<?= htmlspecialchars($material['ReleaseDate']); ?>" required>
</div>


                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="modify-materials.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
