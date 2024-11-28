<?php
include '../partials/header.php';
include '../../db/controllers/modules.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    echo "<script>window.location.href = '" . BASE_URL . "index.php';</script>";
    exit();
}

$modules = getAllModulesWithStudents(); // Updated function to fetch modules with students
?>

<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php'; ?>

        <!-- Content Area -->
        <div class="col-lg-9 col-md-8 col-sm-10 col-xs-12">
            <div class="content">
                <h3>Manage Modules</h3>

                <!-- Add Module Button -->
                <div class="mb-3">
                    <a href="add-module.php" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add New Module
                    </a>
                </div>

                <!-- Module List -->
                <table class="table table-bordered">
    <thead>
        <tr>
            <th>Module Name</th>
            <th>Description</th>
            <th class="d-none d-lg-table-cell">Head Teacher</th>
            <th class="d-none d-md-table-cell">Students</th>
            <th>Subjects</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($modules as $module): ?>
            <tr>
                <td><?= htmlspecialchars($module['Name']); ?></td>
                <td><?= htmlspecialchars(substr($module['Description'], 0, 225)) . (strlen($module['Description']) > 220 ? '...' : ''); ?></td>

                <td class="d-none d-lg-table-cell"><?= htmlspecialchars($module['HeadTeacher']); ?></td>
                <td >
                    <?php if (!empty($module['Students'])): ?>
                        <ul class="list-unstyled">
                            <?php foreach ($module['Students'] as $student): ?>
                                <li class="inside-table"><?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']); ?></li>
                                
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <span>No students enrolled</span>
                    <?php endif; ?>
                </td>
                <td class="d-none d-md-table-cell">
                    <?php if (!empty($module['Subjects'])): ?>
                        <ul class="list-unstyled">
                            <?php foreach ($module['Subjects'] as $subject): ?>
                                <li class="inside-table"><?= htmlspecialchars($subject['Name']); ?></li>
                               
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <span>No subjects assigned</span>
                    <?php endif; ?>
                </td>
                <td >
                    <a href="edit-module.php?id=<?= $module['ModuleID']; ?>" class="btn btn-warning btn-sm mt-1"><i class="fa fa-edit"></i></a>
                    <a href="../../db/controllers/modules.php?action=delete&id=<?= $module['ModuleID']; ?>" 
                       class="btn btn-danger btn-sm mt-1"
                       onclick="return confirm('Are you sure you want to delete this module?');">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

            </div>
        </div>
    </div>
    <div class="row">
        <!-- Calendar Section -->
        <?php include '../partials/teacher-calendar.php'?>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
