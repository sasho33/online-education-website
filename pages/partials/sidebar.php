<?php
$currentPage = basename($_SERVER['PHP_SELF']); // Get the current file name
?>
<nav class="col-lg-3 col-md-4  col-sm-2 col-xs-12 bg-light sidebar" id="sidebarMenu">
    <div class="position-sticky pt-3">
        <h5 class="text-center">Admin Menu</h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $currentPage === 'teacher-dashboard.php' || $currentPage === 'add-student.php' ? 'active' : ''; ?>"
                    href="<?= BASE_URL; ?>pages/teacher-dashboard.php">
                    <i class="fa fa-users"></i> <span class="d-md-inline d-sm-none d-inline">Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $currentPage === 'subjects.php' ? 'active' : ''; ?>"
                    href="<?= BASE_URL; ?>pages/teacher/subjects.php">
                    <i class="fa fa-book-open"></i><span class="d-md-inline d-sm-none d-inline">Subjects</span>
                </a>
            </li>
            <li class="nav-item">
    <a class="nav-link  <?= $currentPage === 'manage-modules.php' ? 'active' : ''; ?>" href="<?= BASE_URL ?>pages/teacher/manage-modules.php">
        <i class="fa fa-graduation-cap"></i>
        <span class="d-md-inline d-sm-none d-inline">Modules</span>
    </a>
</li>
      
            <li class="nav-item">
                <a class="nav-link <?= $currentPage === 'modify-materials.php' || $currentPage ==='add-material.php' ? 'active' : ''; ?>"
                    href="<?= BASE_URL; ?>pages/teacher/modify-materials.php">
                    <i class="fa fa-folder"></i> <span class="d-md-inline d-sm-none d-inline">Materials</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $currentPage === 'assignments.php' ? 'active' : ''; ?>"
                    href="<?= BASE_URL; ?>pages/teacher/assignments.php">
                    <i class="fa fa-tasks"></i> <span class="d-md-inline d-sm-none d-inline">Assignments</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $currentPage === 'news.php' ? 'active' : ''; ?>"
                    href="<?= BASE_URL; ?>pages/teacher/news.php">
                    <i class="fa fa-bullhorn"></i> <span class="d-md-inline d-sm-none d-inline">News & Announcements</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $currentPage === 'manage-teachers.php' ? 'active' : ''; ?>"
                    href="<?= BASE_URL; ?>pages/teacher/manage-teachers.php">
                    <i class="fa fa-chalkboard-teacher"></i> <span class="d-md-inline d-sm-none d-inline">Manage Teachers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $currentPage === 'profile.php' ? 'active' : ''; ?>"
                    href="<?= BASE_URL; ?>pages/teacher/profile.php">
                    <i class="fa fa-user"></i> <span class="d-md-inline d-sm-none d-inline">Profile Settings</span>
                </a>
            </li>
        </ul>
    </div>
</nav>