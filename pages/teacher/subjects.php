<?php
include '../partials/header.php';
include '../../db/controllers/subjects.php'; // Controller for handling subjects

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}

 $subjects = getAllSubjects(); // Fetch all subjects
?>

<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php'; ?>

        <!-- Content Area -->
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="content">
                <h3 class="teacher-dashboard-header"><?= $isEditMode ? 'Edit Subject' : 'Manage Subjects'; ?></h3>

                <!-- Display Errors -->
                <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger alert-div col-sm-6 mx-auto">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error) : ?>
                        <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <!-- Add/Edit Subject Form -->
                <form method="POST" action="subjects.php<?= $isEditMode ? '?action=edit&id=' . intval($_GET['id']) : ''; ?>" enctype="multipart/form-data">
    <?php if ($isEditMode): ?>
    <input type="hidden" name="subject_id" value="<?= htmlspecialchars($editSubject['SubjectID']); ?>">
    <?php endif; ?>
    <div class="mb-3">
        <label for="subject_name" class="form-label">Subject Name</label>
        <input type="text" class="form-control" id="subject_name" name="subject_name"
            value="<?= $isEditMode ? htmlspecialchars($editSubject['Name']) : ''; ?>" required>
    </div>
    <div class="mb-3">
        <label for="subject_description" class="form-label">Subject Description</label>
        <textarea class="form-control" id="subject_description" name="subject_description" rows="3"
            required><?= $isEditMode ? htmlspecialchars($editSubject['Description']) : ''; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="subject_image" class="form-label">Subject Image (Optional)</label>
        <input type="file" class="form-control" id="subject_image" name="subject_image" accept="image/*">
        <?php if ($isEditMode && !empty($editSubject['ImagePath'])): ?>
            <p class="mt-2">Current Image: <img src="<?= htmlspecialchars($editSubject['ImagePath']); ?>" alt="Subject Image" style="max-height: 50px;"></p>
        <?php endif; ?>
    </div>
    <button type="submit" name="<?= $isEditMode ? 'edit_subject' : 'add_subject'; ?>" class="btn btn-primary">
        <?= $isEditMode ? 'Update Subject' : 'Add Subject'; ?>
    </button>
</form>


                <?php if (!$isEditMode): ?>
                <!-- Subject List -->
                <h3 class="mt-5">Existing Subjects</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($subjects as $subject): ?>
                        <tr>
                            <td><?= htmlspecialchars($subject['SubjectID']); ?></td>
                            <td><?= htmlspecialchars($subject['Name']); ?></td>
                            <td><?= htmlspecialchars(substr($subject['Description'], 0, 180)) . (strlen($subject['Description']) > 180 ? '...' : ''); ?></td>
                            <td>
    <?php if (!empty($subject['ImagePath'])): ?>
        <img src="<?= htmlspecialchars($subject['ImagePath']); ?>" alt="Subject Image" style="max-height: 50px;">
    <?php else: ?>
        No Image
    <?php endif; ?>
</td>

                            <td>
                                <a href="?action=edit&id=<?= $subject['SubjectID']; ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?action=delete&id=<?= $subject['SubjectID']; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete <?= $subject['Name']; ?>?');">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include '../partials/footer.php'; ?>