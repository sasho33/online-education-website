<?php
include './partials/header.php'; 
include '../db/controllers/users.php'; // Include logic for fetching data

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'student') {
    echo "<script>window.location.href = '" . BASE_URL . "index.php';</script>";
    exit();
}

// Fetch data dynamically
$userID = $_SESSION['user_id'];
$studentData = getStudentData($userID); // Student profile info
$enrolledSubjects = getEnrolledSubjects($userID); // List of subjects
$assignments = getStudentAssignments($userID); // Assignments and deadlines
$announcements = getStudentAnnouncements($userID); // Announcements
?>

<div class="container">
    <!-- Student Profile Section -->
    <section class="bg-light p-4 rounded mb-4">
        <h2>Student Dashboard</h2>
        <div class="row">
            <div class="col-md-6">
                <h5>Student Information</h5>
                <ul class="list-unstyled">
                    <li><strong>Name:</strong> <?= htmlspecialchars($studentData['name']); ?></li>
                    <li><strong>Student Number:</strong> <?= htmlspecialchars($studentData['student_number']); ?></li>
                    <li><strong>Course:</strong> <?= htmlspecialchars($studentData['course']); ?></li>
                    <li><strong>Enrolled Subjects:</strong> <?= implode(', ', array_column($enrolledSubjects, 'Name')); ?></li>
                </ul>
            </div>
            <div class="col-md-6">
                <h5>Course Progress</h5>
                <p>Overall Progress</p>
                <div class="progress mb-3">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?= $studentData['progress']; ?>%"
                        aria-valuenow="<?= $studentData['progress']; ?>" aria-valuemin="0" aria-valuemax="100">
                        <?= $studentData['progress']; ?>%
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Subject Cards Section -->
    <div class="row">
        <h4 class="text-center">Choose a subject:</h4>
        <?php foreach ($enrolledSubjects as $subject): ?>
            <div class="col-md-4 subject-card">
                <div class="card h-100 text-center">
                    <img src="<?= htmlspecialchars($subject['ImagePath']); ?>" class="card-img-top" alt="<?= htmlspecialchars($subject['Name']); ?>" />
                    <div class="card-body">
                        <h4 class="card-title"><?= htmlspecialchars($subject['Name']); ?></h4>
                        <p class="card-text"><?= htmlspecialchars($subject['Description']); ?></p>
                        <a href="<?= htmlspecialchars($subject['Link']); ?>" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Dashboard Overview Section -->
    <div class="row mt-4">
        <!-- Assignments Section -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Assignments & Deadlines</h5>
                    <ul class="list-unstyled">
                        <?php foreach ($assignments as $assignment): ?>
                            <li>
                                <strong><?= htmlspecialchars($assignment['SubjectName']); ?>:</strong> 
                                Due <?= htmlspecialchars($assignment['DueDate']); ?> 
                                <a href="<?= htmlspecialchars($assignment['Link']); ?>">View Assignment</a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Announcements Section -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Announcements</h5>
                    <ul class="list-unstyled">
                        <?php foreach ($announcements as $announcement): ?>
                            <li>
                                <strong><?= htmlspecialchars($announcement['Title']); ?>:</strong> 
                                <?= htmlspecialchars($announcement['Content']); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 

include './partials/footer.php'; ?>
