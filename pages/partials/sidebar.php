<?php
$currentPage = basename($_SERVER['PHP_SELF']); // Get the current file name
?>
<nav class="col-md-4 col-lg-3 col-sm-4 col-xs-12 bg-light sidebar" id="sidebarMenu">
    <div class="position-sticky pt-3">
        <h5 class="text-center">Admin Menu</h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $currentPage === 'teacher-dashboard.php' || $currentPage === 'add-student.php' ? 'active' : ''; ?>"
                    href="<?= BASE_URL; ?>pages/teacher-dashboard.php">
                    <i class="fa fa-users"></i> Students
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $currentPage === 'subjects.php' ? 'active' : ''; ?>"
                    href="<?= BASE_URL; ?>pages/teacher/subjects.php">
                    <i class="fa fa-book-open"></i>Subjects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $currentPage === 'modify-materials.php' || $currentPage ==='add-materials.php' ? 'active' : ''; ?>"
                    href="<?= BASE_URL; ?>pages/teacher/modify-materials.php">
                    <i class="fa fa-folder"></i> Materials
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $currentPage === 'assignments.php' ? 'active' : ''; ?>"
                    href="<?= BASE_URL; ?>pages/teacher/assignments.php">
                    <i class="fa fa-tasks"></i> Assignments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $currentPage === 'news.php' ? 'active' : ''; ?>"
                    href="<?= BASE_URL; ?>pages/teacher/news.php">
                    <i class="fa fa-bullhorn"></i> News & Announcements
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $currentPage === 'manage-teachers.php' ? 'active' : ''; ?>"
                    href="<?= BASE_URL; ?>pages/teacher/manage-teachers.php">
                    <i class="fa fa-chalkboard-teacher"></i> Manage Teachers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $currentPage === 'profile.php' ? 'active' : ''; ?>"
                    href="<?= BASE_URL; ?>pages/teacher/profile.php">
                    <i class="fa fa-user"></i> Profile Settings
                </a>
            </li>
        </ul>
    </div>
</nav>