<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../partials/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/controllers/assignments.php'; 

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}

// Handle form submission for adding or editing an assignment
$errors = [];
$title = $description = $due_date = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_assignment'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $due_date = $_POST['due_date'];

    // Validation
    if (strlen($title) < 3) {
        $errors[] = "Assignment title must be at least 3 characters.";
    }
    if (strlen($description) < 5) {
        $errors[] = "Assignment description must be at least 5 characters.";
    }
    if (empty($due_date)) {
        $errors[] = "Due date is required.";
    }

    if (empty($errors)) {
        $data = [
            'Title' => $title,
            'Description' => $description,
            'DueDate' => $due_date,
        ];

        if (isset($_POST['assignment_id'])) {
            // Update existing assignment
            $assignmentID = $_POST['assignment_id'];
            updateAssignment($data, ['AssignmentID' => $assignmentID]);
        } else {
            // Add new assignment
            addAssignment($data);
        }

        echo "<script>
            window.location.href = '" . BASE_URL . "pages/teacher/assignments.php';
        </script>";
        exit();
    }
}

// Handle assignment deletion
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $assignmentID = $_GET['id'];
    deleteAssignment($assignmentID);

    echo "<script>
        window.location.href = '" . BASE_URL . "pages/teacher/assignments.php';
    </script>";
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    $assignmentID = $_GET['id'];
    $assignment = getAssignmentByID($assignmentID);

    if ($assignment) {
        $title = $assignment['Title'];
        $description = $assignment['Description'];
        $due_date = $assignment['DueDate'];
    } else {
        echo "<script>alert('Assignment not found.');</script>";
    }
}

// Fetch all assignments
$assignments = getAllAssignments();
?>

<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php' ?>
        <!-- Content Area -->
        <div class="col-md-8 col-sm-8 col-xs-12">

            <div class="content">
                <h3>Create Assignment</h3>
                <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <form method="POST" action="<?= BASE_URL; ?>pages/teacher/assignments.php">
                    <?php if (isset($_POST['assignment_id'])): ?>
                    <input type="hidden" name="assignment_id" value="<?= htmlspecialchars($_POST['assignment_id']); ?>">
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="title" class="form-label">Assignment Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="<?= htmlspecialchars($title); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Assignment Description</label>
                        <textarea name="description" id="description-assignment" class="form-control" rows="3"
                            required><?= htmlspecialchars($description); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" name="due_date" id="due_date" class="form-control"
                            value="<?= htmlspecialchars($due_date); ?>" required>
                    </div>
                    <button type="submit" name="save_assignment" class="btn btn-primary">Save Assignment</button>
                </form>

                <hr>

                <h3>Assignments</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Due Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($assignments as $assignment): ?>
                        <tr>
                            <td><?= htmlspecialchars($assignment['Title']); ?></td>
                            <td><?= htmlspecialchars($assignment['Description']); ?></td>
                            <td><?= htmlspecialchars($assignment['DueDate']); ?></td>
                            <td>
                                <a href="?action=edit&id=<?= $assignment['AssignmentID']; ?>"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <a href="?action=delete&id=<?= $assignment['AssignmentID']; ?>"
                                    onclick="return confirm('Are you sure you want to delete this assignment?');"
                                    class="btn btn-sm btn-danger">Delete</a>
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