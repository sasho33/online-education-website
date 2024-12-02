<?php
include './partials/header.php';
include BASE_PATH . 'db/connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'student') {
    echo "<script>window.location.href = '" . BASE_URL . "index.php';</script>";
    exit();
}

$subjectID = $_GET['id']; // Get subject ID from the URL

// Fetch subject details
function getSubjectDetails($subjectID)
{
    global $pdo;
    $sql = "SELECT Name, Description, ImagePath FROM subjects WHERE SubjectID = :subjectID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['subjectID' => $subjectID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Fetch materials for the subject
function getMaterialsBySubject($subjectID)
{
    global $pdo;
    $sql = "
        SELECT MaterialID, Title, Description, FilePath, ReleaseDate 
        FROM materials 
        WHERE SubjectID = :subjectID
        ORDER BY ReleaseDate ASC
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['subjectID' => $subjectID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch students enrolled in the module associated with the subject
function getStudentsBySubject($subjectID)
{
    global $pdo;
    $sql = "
        SELECT u.first_name, u.last_name, u.Email
        FROM users u
        JOIN module_subjects ms ON u.ModuleID = ms.ModuleID
        WHERE ms.SubjectID = :subjectID
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['subjectID' => $subjectID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch assignments for the subject
function getAssignmentsBySubject($subjectID)
{
    global $pdo;
    $sql = "
        SELECT Title, Description, DueDate, Color 
        FROM assignments 
        WHERE SubjectID = :subjectID
        ORDER BY DueDate ASC
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['subjectID' => $subjectID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$subject = getSubjectDetails($subjectID);
$materials = getMaterialsBySubject($subjectID);
$students = getStudentsBySubject($subjectID);
$assignments = getAssignmentsBySubject($subjectID);

// Separate materials into active and inactive based on ReleaseDate
$currentDate = date('Y-m-d');
$activeMaterials = [];
$inactiveMaterials = [];

foreach ($materials as $material) {
    if ($material['ReleaseDate'] <= $currentDate) {
        $activeMaterials[] = $material;
    } else {
        $inactiveMaterials[] = $material;
    }
}
?>
<div class="container my-5">
    <!-- Main Content and Tabs -->
    <section class="subject-info">
        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs " id="contentTab" role="tablist">
            <li class="nav-item">
                <h5><a class="nav-link active text-black" id="mainContent-tab" data-bs-toggle="tab" href="#mainContent" role="tab">Main Content</a></h5>
            </li>
            <li class="nav-item">
                <h5><a class="nav-link text-black" id="studentList-tab" data-bs-toggle="tab" href="#studentList" role="tab">Student List</a></h5>
            </li>
            <li class="nav-item">
                <h5><a class="nav-link text-black" id="grades-tab" data-bs-toggle="tab" href="#grades" role="tab">Grades</a></h5>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-3">
            <!-- Main Content Tab -->

            <div class="tab-pane fade show active " id="mainContent" role="tabpanel">
                <h1><?= htmlspecialchars($subject['Name']); ?></h1>

                <div class="row mb-2">

                    <div class="col-xl-1 col-md-2 col-sm-2 col-sm-12  text-center">
                        <img src="<?= htmlspecialchars($subject['ImagePath']); ?>" class="subject-img" alt="<?= htmlspecialchars($subject['Name']); ?>">
                    </div>
                    <div class="col-xl-11 col-md-10 col-sm-12 mt-1">
                        <p><?= htmlspecialchars($subject['Description']); ?></p>
                    </div>

                </div>
                <h3 class="text-center">Available Materials:</h3>
                <div class="accordion " id="accordionExample">

                    <?php foreach ($activeMaterials as $index => $material): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?= $index; ?>">
                                <button
                                    class="accordion-button <?= $index === 0 ? '' : 'collapsed'; ?> "
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?= $index; ?>"
                                    aria-expanded="<?= $index === 0 ? 'true' : 'false'; ?>"
                                    aria-controls="collapse<?= $index; ?>">
                                    <?= htmlspecialchars($material['Title']); ?>
                                </button>
                            </h2>
                            <div
                                id="collapse<?= $index; ?>"
                                class="accordion-collapse collapse <?= $index === 0 ? 'show' : ''; ?>"
                                aria-labelledby="heading<?= $index; ?>"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p><?= html_entity_decode($material['Description']); ?></p>
                                    <h5>Files:</h5>
                                    <ul class="list-group">
                                        <?php
                                        // Fetch the list of files for the material
                                        $filesSql = "SELECT FilePath FROM material_files WHERE MaterialID = :materialID";
                                        $filesStmt = $pdo->prepare($filesSql);
                                        $filesStmt->execute(['materialID' => $material['MaterialID']]);
                                        $files = $filesStmt->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <?php if (!empty($files)): ?>
                                            <?php foreach ($files as $file): ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <?= htmlspecialchars(basename($file['FilePath'])); ?>
                                                    <a href="<?= htmlspecialchars($file['FilePath']); ?>" class="btn btn-success btn-sm" download>
                                                        <i class="fa fa-download"></i> Download
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <li class="list-group-item">No files available.</li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach ($inactiveMaterials as $index => $material): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?= $index; ?>">
                                <button
                                    class="accordion-button collapsed locked-tab text-white"
                                    type="button">
                                    <?= htmlspecialchars($material['Title']);   ?> <span class="locker"><i class="fa fa-lock"></i></span>
                                </button>
                            </h2>
                            <div

                                class="accordion-collapse collapse ?>"

                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">


                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


            <!-- Student List Tab -->
            <div class="tab-pane fade" id="studentList" role="tabpanel">
                <h3 class="text-center">Student List</h3>
                <table class="table table-striped student-table">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td><?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']); ?></td>
                                <td><?= htmlspecialchars($student['Email']); ?></td>
                                <td>
                                    <a href="mailto:<?= htmlspecialchars($student['Email']); ?>" class="btn btn-primary">Message</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Grades Tab -->
            <div class="tab-pane fade" id="grades" role="tabpanel">
                <h3 class="text-center">Grades</h3>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Grade Item</th>
                            <th>Calculated Weight</th>
                            <th>Grade</th>
                            <th>Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Assignment 1</td>
                            <td>30%</td>
                            <td>85</td>
                            <td>Great work! Keep it up!</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Sidebar -->
    <div class="sidebar mt-5 mb-5">
        <h3>Assignments</h3>
        <ul class="list-group">
            <?php foreach ($assignments as $assignment): ?>
                <li class="list-group-item" style="border-left: 10px solid <?= htmlspecialchars($assignment['Color']); ?>;">
                    <strong><?= htmlspecialchars($assignment['Title']); ?>:</strong>
                    <p><?= htmlspecialchars(substr($assignment['Description'], 0, 150)) . (strlen($assignment['Description']) > 150 ? '...' : ''); ?></p>
                    <small>Due Date: <?= htmlspecialchars($assignment['DueDate']); ?></small>
                    <br>
                    <button class="btn btn-warning mt-3">Upload <i class="fa fa-upload"></i></button>
                </li>

            <?php endforeach; ?>
        </ul>

    </div>
    <div class="calendar">
        <h2>Student Activity Calendar</h2>
        <div id="calendar"></div>
    </div>
</div>

<?php include './partials/footer.php'; ?>