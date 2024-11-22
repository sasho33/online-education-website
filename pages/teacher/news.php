<?php include '../partials/header.php'; 
include '../../db/controllers/users.php';
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}
?>

<!-- Main Container -->
<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php'?>
        <!-- Content Area -->
        <div class="col-md-8 col-sm-8 col-xs-12">

            <div class="content">
                <div class="manage-student_wraper">
                    <h3 class="teacher-dashboard-header">News & Announcements</h3>
                    <form>
                        <div class="mb-3">
                            <label for="newsTitle" class="form-label">News Title</label>
                            <input type="text" class="form-control" id="newsTitle" required />
                        </div>
                        <div class="mb-3">
                            <label for="newsContent" class="form-label">News Content</label>
                            <textarea class="form-control" id="newsContent" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Post News</button>
                    </form>

                    <!-- Posted News List -->
                    <div class="mt-4">
                        <h5>Recent Announcements</h5>
                        <ul class="list-group">
                            <li class="list-group-item">Upcoming Midterm Exam – 10th October</li>
                            <li class="list-group-item">New materials uploaded for Web Development</li>
                            <!-- Add more announcements here -->
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="row">
        <!-- Calendar Section -->
        <?php include '../partials/teacher-calendar.php'?>
    </div>
</div>

<!-- Footer -->
<?php 

include '../partials/footer.php'; ?>