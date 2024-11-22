<?php include './partials/header.php'; 


if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'student') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}
?>

<!-- Main Content Container -->
<div class="container my-5">
    <!-- Student Profile Section -->
    <section class="bg-light p-4 rounded mb-4">
        <h2>Student Dashboard</h2>
        <div class="row">
            <div class="col-md-6">
                <h5>Student Information</h5>
                <ul class="list-unstyled">
                    <li><strong>Name:</strong> Oleksandr Sharha</li>
                    <li><strong>Student Number:</strong> 40732418</li>
                    <li><strong>Course:</strong> MSc Computing</li>
                    <li>
                        <strong>Enrolled Subjects:</strong> Java Programming, Database Development, Web
                        Development
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <h5>Course Progress</h5>
                <p>Overall Progress</p>
                <div class="progress mb-3">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 50%"
                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                        50%
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <!-- Subject Cards Section -->
        <h4 class="text-center">Choose the subject :</h4>
        <div class="row">
            <div class="col-md-4 subject-card">
                <div class="card h-100 text-center">
                    <img src="../img/java.png" class="card-img-top" alt="Java" />
                    <div class="card-body">
                        <h4 class="card-title">Java Programming</h4>
                        <p class="card-text">
                            Learn the fundamentals of Java programming language and object-oriented
                            programming.
                        </p>
                        <a href="./java.php" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 subject-card">
                <div class="card h-100 text-center">
                    <img src="../img/database.png" class="card-img-top" alt="Database" />
                    <div class="card-body">
                        <h4 class="card-title">Database Development</h4>
                        <p class="card-text">
                            Understand database design, SQL, and how to manage data effectively.
                        </p>
                        <a href="./database.php" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 subject-card">
                <div class="card h-100 text-center">
                    <img src="../img/webdevelopment.png" class="card-img-top" alt="Web Development" />
                    <div class="card-body">
                        <h4 class="card-title">Web Development</h4>
                        <p class="card-text">
                            Explore HTML, CSS, and JavaScript to create modern web applications.
                        </p>
                        <a href="./webdev.php" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <!-- Dashboard Overview Section -->
    <div class="row">
        <!-- Assignments Section -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Assignments & Deadlines</h5>
                    <ul class="list-unstyled">
                        <li>
                            <strong>Java Programming:</strong> Due 5th Nov <a href="#">View Assignment</a>
                        </li>
                        <li>
                            <strong>Database Development:</strong> Due 10th Nov
                            <a href="#">View Assignment</a>
                        </li>
                        <li>
                            <strong>Web Development:</strong> Due 15th Nov <a href="#">View Assignment</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Announcements Section -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Announcements</h5>
                    <p class="card-text">
                        Stay updated with the latest announcements from your instructors.
                    </p>
                    <ul class="list-unstyled">
                        <li>
                            <strong>Update:</strong> New lecture notes for Java Programming are available.
                        </li>
                        <li><strong>Reminder:</strong> Database Development midterm exam on 20th Nov.</li>
                        <li><strong>Resource:</strong> Web Development tutorial link added.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Calendar Section -->
<div class="calendar">
    <h2>Student Activity Calendar</h2>
    <div id="calendar"></div>
</div>

<!-- Footer -->
<?php include './partials/footer.php'; ?>