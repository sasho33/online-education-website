<?php

include './partials/header.php';
include BASE_PATH . 'db/connection.php';
include BASE_PATH . 'db/controllers/student-dashboard.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>window.location.href = '" . BASE_URL . "index.php';</script>";
    exit();
} else if ($_SESSION['user_role'] !== 'student') {
    echo "<script>window.location.href = '" . BASE_URL . "pages/teacher-dashboard.php';</script>";
    exit();
}

$studentID = $_SESSION['user_id'];




// Fetch latest announcements


$module = getStudentModule($studentID);
$subjects = $module ? getSubjectsByModule($module['ModuleID']) : [];
$assignments = $module ? getAssignmentsByModule($module['ModuleID']) : [];

$announcements = getLatestAnnouncements();


$totalPercentage = 0;

foreach ($subjects as $index => $subject) {
    $randomPercentage = rand(10, 90);
    $subjects[$index]['Percentage'] = $randomPercentage; // Add a percentage key-value pair
    $totalPercentage += $randomPercentage;
}

if (count($subjects) > 0) {
    $meanPercentage = round($totalPercentage / count($subjects));
} else {
    $meanPercentage = 0; // Handle division by zero if no subjects are found
}

// 
?>

<div class="container my-5">
    <!-- Dashboard Overview Section -->
    <section class="p-4 rounded mb-4 bg-success text-white">
        <h2 class="text-center">Student Dashboard</h2>
        <div class="row">
            <div class="col-md-8">
                <h5>Module Information</h5>
                <?php if ($module): ?>
                    <ul class="list-unstyled">
                        <li><strong>Module Name:</strong> <?= htmlspecialchars($module['ModuleName']); ?></li>
                        <li><strong>Description:</strong> <?= htmlspecialchars(substr($module['ModuleDescription'], 0, 300)) . (strlen($module['ModuleDescription']) > 300 ? '...' : ''); ?></li>
                        <li><strong>Head Teacher:</strong> <?= htmlspecialchars($module['HeadTeacher']); ?></li>
                    </ul>
                <?php else: ?>
                    <p>No module assigned.</p>
                <?php endif; ?>
                <h5>Subjects</h5>
                <?php if (!empty($subjects)): ?>
                    <div class="list-group ">
                        <?php foreach ($subjects as $subject): ?>
                            <!-- Each list item is a link -->

                            <h5><a href="subject.php?id=<?= urlencode($subject['SubjectID']); ?>" class="list-group-item list-group-item-action student-menu-item">
                                    <img src="<?= htmlspecialchars($subject['ImagePath']); ?>" class="subject-list-img" alt="<?= htmlspecialchars($subject['Name']); ?>">
                                    <?= htmlspecialchars($subject['Name']); ?>
                                </a></h5>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>No subjects assigned.</p>
                <?php endif; ?>

            </div>
            <div class="col-md-4">
                <h5 class="mt-4">Overall Progress</h5>
                <div class="progress">
                    <div class="progress-bar" style="width: <?= $meanPercentage; ?>%;" aria-valuenow="<?= $meanPercentage; ?>" aria-valuemin="0" aria-valuemax="100">
                        <?= $meanPercentage; ?>%
                    </div>
                </div>
                <div class="row">

                    <h5 class="mt-4">Subjects</h5>
                    <?php if (!empty($subjects)): ?>
                        <ul class="list-group">
                            <?php foreach ($subjects as $subject): ?>
                                <li class="list-group-item">
                                    <strong><?= htmlspecialchars($subject['Name']); ?>:</strong>
                                    <div class="progress mt-2">
                                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar"
                                            style="width: <?= $subject['Percentage']; ?>%"
                                            aria-valuenow="<?= $subject['Percentage']; ?>" aria-valuemin="0" aria-valuemax="100">
                                            <?= $subject['Percentage']; ?>%
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>No subjects assigned.</p>
                    <?php endif; ?>

                </div>


            </div>


    </section>

    <div class="row">
        <!-- Assignments Section -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body bg-warning">
                    <h5 class="card-title text-center">Assignments</h5>
                    <?php if (!empty($assignments)): ?>
                        <ul class="list-group">
                            <?php foreach ($assignments as $assignment): ?>
                                <li class="list-group-item" style="border-left: 10px solid <?= htmlspecialchars($assignment['Color']); ?>;">
                                    <strong><?= htmlspecialchars($assignment['Title']); ?></strong>
                                    <br><em>Subject: <?= htmlspecialchars($assignment['SubjectName']); ?></em>
                                    <p><?= htmlspecialchars(substr($assignment['Description'], 0, 100)) . (strlen($assignment['Description']) > 100 ? '...' : ''); ?></p>
                                    <small>Due Date: <?= htmlspecialchars($assignment['DueDate']); ?></small>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>No assignments available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>


        <!-- Announcements Section -->
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-body bg-danger">
                    <h5 class="card-title text-center text-white">Recent news & Announcements</h5>
                    <?php if (!empty($announcements)): ?>
                        <ul class="list-group">
                            <?php foreach ($announcements as $announcement): ?>
                                <li class="list-group-item">
                                    <strong><?= htmlspecialchars($announcement['Title']); ?></strong>
                                    <p><?= htmlspecialchars(substr($announcement['Content'], 0, 330)) . (strlen($announcement['Content']) > 330 ? '...' : ''); ?></p>
                                    <small>Posted on: <?= htmlspecialchars(date('Y-m-d', strtotime($announcement['CreatedAt']))); ?></small>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>No announcements available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="calendar">
        <h2>Student Activity Calendar</h2>
        <div id="calendar"></div>
    </div>
</div>


<?php include './partials/footer.php'; ?>