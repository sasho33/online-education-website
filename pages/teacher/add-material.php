<?php
include '../partials/header.php';
include '../../db/controllers/materials.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}

$subjects = getSubjectsForDropdown();
?>

<div class="container">
    <div class="row flex-nowrap">
        <?php include '../partials/sidebar.php'; ?>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="content">
                <h3>Add Material</h3>

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul><?php foreach ($errors as $error) echo "<li>" . htmlspecialchars($error) . "</li>"; ?></ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="../../db/controllers/materials.php" enctype="multipart/form-data">
                                     
                    <div class="mb-3">
                        <label for="subject_id">Subject</label>
                        <select name="subject_id" id="subject_id" class="form-select" required>
                            <option value="">Select Subject</option>
                            <?php foreach ($subjects as $subject): ?>
                                <option value="<?= $subject['SubjectID']; ?>"><?= htmlspecialchars($subject['Name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    
                        <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5" required>
                            
                        </textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="files">Upload Files</label>
                        <input type="file" name="files[]" id="files" class="form-control" multiple onchange="displaySelectedFiles(this, 'fileList')">
                        <small class="text-muted">You can select multiple files.</small>
                    </div>
                    
                    <div id="fileList" class="mt-2">
                        <h6>Selected Files:</h6>
                        <ul class="list-group"></ul>
                    </div>
                    
                    <div class="mb-3">
                        <label for="release_date">Release Date</label>
                        <input type="date" name="release_date" id="release_date" class="form-control">
                    </div>
                    
                    <button type="submit" name="add_material" class="btn btn-primary">Add Material</button>
                    <a href="modify-materials.php" class="btn btn-secondary">Cancel</a>
                </form>

            </div>
        </div>
    </div>
</div>


<?php include '../partials/footer.php'; ?>
