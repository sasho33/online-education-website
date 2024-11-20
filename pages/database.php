<?php include './partials/header.php'; ?>
<div class="container subject-container">

    <!-- Main Content and Tabs -->
    <section class="subject-info">
        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs" id="contentTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="mainContent-tab" data-bs-toggle="tab" href="#mainContent" role="tab">Main
                    Content</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="studentList-tab" data-bs-toggle="tab" href="#studentList" role="tab">Student
                    List</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-3 ">
            <!-- Main Content Tab -->
            <div class="tab-pane fade show active" id="mainContent" role="tabpanel">
                <h1>Database Development</h1>
                <h3>Your Progress:</h3>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                        aria-valuemax="100">
                        40%
                    </div>
                </div>
                <br />
                <h3>Available materials:</h3>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Week #1 Introduction to Databases
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    A database is an organized collection of data, generally stored and accessed
                                    electronically from a computer system. Databases are used to store, retrieve, and
                                    manage data efficiently.
                                </p>
                                <p>
                                    Database management systems (DBMS) are software tools that allow users to define,
                                    create, maintain, and control access to the database. Examples include MySQL,
                                    PostgreSQL, and Oracle.
                                </p>
                                <button class="btn btn-success mt-2">Download Materials</button>
                                <button class="btn btn-primary mt-2">Watch Video</button>
                                <button class="btn btn-danger mt-2">Take Quiz</button>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Week #2 SQL Basics
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    SQL (Structured Query Language) is a standard programming language specifically
                                    designed for managing and manipulating databases. It is used to perform tasks such
                                    as querying data, updating records, and managing database structures.
                                </p>
                                <p>
                                    Basic SQL commands include SELECT, INSERT, UPDATE, DELETE, and CREATE. These
                                    commands allow users to interact with the database and perform various operations.
                                </p>
                                <button class="btn btn-success mt-2">Download Materials</button>
                                <button class="btn btn-primary mt-2">Watch Video</button>
                                <button class="btn btn-danger mt-2">Take Quiz</button>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Week #3 Advanced SQL
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    Advanced SQL topics include complex queries, joins, subqueries, indexes, and
                                    transactions. These concepts are essential for optimizing database performance and
                                    ensuring data integrity.
                                </p>
                                <p>
                                    Understanding advanced SQL techniques allows developers to write more efficient and
                                    effective queries, improving the overall performance of the database system.
                                </p>
                                <button class="btn btn-success mt-2">Download Materials</button>
                                <button class="btn btn-primary mt-2">Watch Video</button>
                                <button class="btn btn-danger mt-2">Take Quiz</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student List Tab -->
            <div class="tab-pane fade" id="studentList" role="tabpanel">
                <h3>Student List</h3>
                <table class="table table-striped student-table">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td><button class="btn btn-primary">Message</button></td>
                        </tr>
                        <tr>
                            <td>Jane Smith</td>
                            <td>jane.smith@example.com</td>
                            <td><button class="btn btn-primary">Message</button></td>
                        </tr>
                        <tr>
                            <td>Michael Lee</td>
                            <td>michael.lee@example.com</td>
                            <td><button class="btn btn-primary">Message</button></td>
                        </tr>
                        <!-- Add more students as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <div class="sidebar">
        <h3>Related Resources</h3>
        <p>Resource Link 1</p>
        <p>Resource Link 2</p>
    </div>
</div>


<!-- Footer -->
<?php include './partials/footer.php'; ?>