<?php
include '../partials/header.php';
include '../../db/controllers/modules.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    echo "<script>window.location.href = '" . BASE_URL . "index.php';</script>";
    exit();
}

// Fetch module data
$moduleID = $_GET['id'] ?? null;
if (!$moduleID) {
    echo "<script>
        alert('Module ID is required.');
        window.location.href = 'manage-modules.php';
    </script>";
    exit();
}

$module = getModuleByID($moduleID); // Fetch the module details
if (!$module) {
    echo "<script>
        alert('Module not found.');
        window.location.href = 'manage-modules.php';
    </script>";
    exit();
}

$teachers = getAllTeachers();
$unenrolledStudents = getUnenrolledStudents();
$availableSubjects = getAllSubjects();
$enrolledStudents = getStudentsByModule($moduleID);
$assignedSubjects = getSubjectsByModule($moduleID);
?>

<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php'; ?>

        <!-- Content Area -->
        <div class="col-lg-9 col-md-8 col-sm-10 col-xs-12">
            <div class="content">
                <h3>Edit Module</h3>

                <!-- Edit Module Form -->
                <form id="editModuleForm" method="POST" action="../../db/controllers/modules.php">
                    <input type="hidden" name="edit_module" value="1">
                    <input type="hidden" name="module_id" value="<?= htmlspecialchars($module['ModuleID']); ?>">

                    <!-- Module Name -->
        <div class="mb-3">
        <label for="module_name" class="form-label">Module Name</label>
        <input type="text" class="form-control" name="module_name" id="module_name"
        value="<?= htmlspecialchars($module['ModuleName']); ?>" required>
        </div>

            <!-- Module Description -->
        <div class="mb-3">
            <label for="module_description" class="form-label">Description</label>
                <textarea class="form-control" name="module_description" id="module_description"
                rows="3"><?= htmlspecialchars($module['ModuleDescription']); ?></textarea>
        </div>


                    <!-- Head Teacher -->
                    <div class="mb-3">
                        <label for="head_teacher_id" class="form-label">Head Teacher</label>
                        <select name="head_teacher_id" id="head_teacher_id" class="form-select" required>
                            <option value="">Select Head Teacher</option>
                            <?php foreach ($teachers as $teacher): ?>
                                <option value="<?= $teacher['UserID']; ?>"
                                    <?= $module['HeadTeacherID'] == $teacher['UserID'] ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($teacher['first_name'] . ' ' . $teacher['last_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Assign Students -->
                    <div class="mb-3 ">
                        <label for="student_id" class="form-label">Edit Students:</label>
                        <select id="student_id" class="form-select">
                            <option value="">Select Student</option>
                            <?php foreach ($unenrolledStudents as $student): ?>
                                <option value="<?= $student['UserID']; ?>">
                                    <?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                    </div>

                    <!-- Student List -->
                    <div class="mb-3">
                        <h5>Enrolled Students:</h5>
                        <ul id="studentList" class="list-group">
                            <?php foreach ($enrolledStudents as $student): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']); ?>
                                    <input type="hidden" name="student_ids[]" value="<?= $student['UserID']; ?>">
                                    <button type="button" class="btn btn-sm btn-danger remove-item"><i class="fa fa-trash"></i></button>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Assign Subjects -->
                    <div class="mb-3">
                        <label for="subject_id" class="form-label">Edit Subjects</label>
                        <select id="subject_id" class="form-select">
                            <option value="">Select Subject</option>
                            <?php foreach ($availableSubjects as $subject): ?>
                                <option value="<?= $subject['SubjectID']; ?>">
                                    <?= htmlspecialchars($subject['Name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                    </div>

                    <!-- Subject List -->
                    <div class="mb-3">
                        <h5>Assigned Subjects:</h5>
                        <ul id="subjectList" class="list-group">
                            <?php foreach ($assignedSubjects as $subject): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <?= htmlspecialchars($subject['Name']); ?>
                                    <input type="hidden" name="subject_ids[]" value="<?= $subject['SubjectID']; ?>">
                                    <button type="button" class="btn btn-sm btn-danger remove-item"><i class="fa fa-trash"></i></button>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <button type="submit" name="edit-module" class="btn btn-primary">Save Changes</button>
                    <a href="manage-modules.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="../../js/module/module-management.js"></script>

<?php include '../partials/footer.php'; ?>
