<?php
include '../partials/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/controllers/assignments.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}

// Fetch all assignments
$assignments = getAllAssignmentsWithSubjects();
?>

<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php' ?>
        <!-- Content Area -->
        <div class="col-lg-9 col-md-8 col-sm-10 col-xs-12">

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
                    <?php if (isset($assignmentID)): ?>
                        <input type="hidden" name="assignment_id" value="<?= htmlspecialchars($assignmentID); ?>">
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="title" class="form-label">Assignment Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="<?= htmlspecialchars($title); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Assignment Description</label>
                        <textarea name="description" id="description-assingment" class="form-control" rows="3"
                            required><?= htmlspecialchars($description); ?></textarea>
                    </div>
                    <!-- Subject Dropdown -->
                    <div class="mb-3">
                        <label for="subject_id" class="form-label">Subject</label>
                        <select id="subject_id" name="subject_id" class="form-select" required>
                            <option value="">Select Subject</option>
                            <?php foreach ($subjects as $subject): ?>
                                <option value="<?= $subject['SubjectID']; ?>" <?= isset($assignment['SubjectID']) && $assignment['SubjectID'] == $subject['SubjectID'] ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($subject['Name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" name="due_date" id="due_date" class="form-control"
                            value="<?= htmlspecialchars($due_date); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="color" name="color" id="color" class="form-control"
                            value="<?= htmlspecialchars($color ?? '#007bff'); ?>"> <!-- Default color -->
                    </div>
                    <button type="submit" name="save_assignment" class="btn btn-primary">Save Assignment</button>
                </form>



                <hr>

                <h3>Assignments</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th class="d-none d-lg-table-cell">Description</th>
                            <th>Subject</th>
                            <th>Due Date</th>
                            <th>Color</th>
                            <th>Actions</th>
                        </tr>
                    <tbody>
                        <?php foreach ($assignments as $assignment): ?>
                            <tr>
                                <td><?= htmlspecialchars($assignment['Title']); ?></td>
                                <td class="d-none d-lg-table-cell"><?= htmlspecialchars(substr($assignment['Description'], 0, 100)) . (strlen($assignment['Description']) > 100 ? '...' : ''); ?></td>
                                <td><?= htmlspecialchars($assignment['SubjectName']); ?></td>
                                <td><?= htmlspecialchars($assignment['DueDate']); ?></td>
                                <td>
                                    <span style="display: inline-block; width: 20px; height: 20px; background-color: <?= htmlspecialchars($assignment['Color']); ?>;"></span>
                                </td>
                                <td>
                                    <a href="?action=edit&id=<?= $assignment['AssignmentID']; ?>" class="btn btn-sm btn-warning mt-1"><i class="fa fa-edit"></i></a>
                                    <a href="?action=delete&id=<?= $assignment['AssignmentID']; ?>" class="btn btn-sm btn-danger mt-1"
                                        onclick="return confirm('Are you sure you want to delete this assignment?');"><i class="fa fa-trash"></i></a>
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
        <?php include '../partials/teacher-calendar.php' ?>
    </div>
</div>

<?php include '../partials/footer.php'; ?>