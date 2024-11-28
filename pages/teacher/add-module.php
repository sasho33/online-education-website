<?php
include '../partials/header.php';
include '../../db/controllers/modules.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    echo "<script>window.location.href = '" . BASE_URL . "index.php';</script>";
    exit();
}

$teachers = getAllTeachers();
$unenrolledStudents = getUnenrolledStudents();
$availableSubjects = getAllSubjects(); // Fetch all subjects

?>

<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php'; ?>

        <!-- Content Area -->
        <div class="col-lg-9 col-md-8 col-sm-10 col-xs-12">
            <div class="content">
                <h3>Add New Module</h3>

                <!-- Add Module Form -->
                <form id="addModuleForm" method="POST" action="../../db/controllers/modules.php">
                    <input type="hidden" name="add_module" value="1">
                    
                    <!-- Module Name -->
                    <div class="mb-3">
                        <label for="module_name" class="form-label">Module Name</label>
                        <input type="text" class="form-control" name="module_name" id="module_name" required>
                    </div>
                    
                    <!-- Module Description -->
                    <div class="mb-3">
                        <label for="module_description" class="form-label">Description</label>
                        <textarea class="form-control" name="module_description" id="module_description" rows="3"></textarea>
                    </div>
                    
                    <!-- Head Teacher -->
                    <div class="mb-3">
                        <label for="head_teacher_id" class="form-label">Head Teacher</label>
                        <select name="head_teacher_id" id="head_teacher_id" class="form-select" required>
                            <option value="">Select Head Teacher</option>
                            <?php foreach ($teachers as $teacher): ?>
                                <option value="<?= $teacher['UserID']; ?>">
                                    <?= htmlspecialchars($teacher['first_name'] . ' ' . $teacher['last_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Assign Students -->
                    <div class="mb-3">
                        <label for="student_id" class="form-label">Add Students:</label>
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
                        <ul id="studentList" class="list-group"></ul>
                    </div>

                    <!-- Assign Subjects -->
                    <div class="mb-3">
                        <label for="subject_id" class="form-label">Add Subjects:</label>
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
                        <ul id="subjectList" class="list-group"></ul>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Module</button>
                    <a href="manage-modules.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="../../js/module/module-management.js"></script>
 

</script>

<?php include '../partials/footer.php'; ?>
