<?php
include '../partials/header.php';
include '../../db/controllers/materials.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}

$selectedSubjectID = $_GET['subject_id'] ?? null;
$subjects = getSubjectsForDropdown();
$materials = getAllMaterials($selectedSubjectID);
?>

<div class="container">
    <div class="row flex-nowrap">
        <?php include '../partials/sidebar.php'; ?>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="content">
                <h3>Modify Materials</h3>

                <a href="add-material.php" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Add Material</a>

                <form method="GET" action="" class="mb-3">
                    <label for="subject_filter">Filter by Subject</label>
                    <select name="subject_id" id="subject_filter" class="form-select" onchange="this.form.submit()">
                        <option value="">All Subjects</option>
                        <?php foreach ($subjects as $subject): ?>
                            <option value="<?= $subject['SubjectID']; ?>" <?= $selectedSubjectID == $subject['SubjectID'] ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($subject['Name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Release Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($materials): ?>
                            <?php foreach ($materials as $material): ?>
                                <tr>
                                    <td><?= htmlspecialchars($material['MaterialID']); ?></td>
                                    <td><?= htmlspecialchars($material['Title']); ?></td>
                                    <td><?= htmlspecialchars($material['SubjectName']); ?></td>
                                    <td><?= htmlspecialchars($material['ReleaseDate']); ?></td>
                                    <td>
                                        <a href="edit-material.php?id=<?= $material['MaterialID']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="?action=delete&id=<?= $material['MaterialID']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">No materials found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
