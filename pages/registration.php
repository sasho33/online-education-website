<?php include './partials/header.php'; ?>
<div class="container">



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
                <h1>Java Programming</h1>
                <h3>Your Progress:</h3>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100">
                        25%
                    </div>
                </div>
                <br />
                <h3>Available materials:</h3>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Week #1 Introduction to Java
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    Java is a high-level, class-based, object-oriented programming language that is
                                    designed to have as few implementation dependencies as possible. It is a general
                                    purpose programming language intended to let application developers write once,
                                    run anywhere (WORA), meaning that compiled Java code can run on all platforms that
                                    support Java without the need for recompilation.
                                </p>
                                <p>
                                    Java applications are typically compiled to bytecode that can run on any Java
                                    virtual machine (JVM) regardless of the underlying computer architecture. The
                                    syntax of Java is similar to C and C++, but it has fewer low-level facilities than
                                    either of them. As of 2019, Java was one of the most popular programming languages
                                    in use according to GitHub, particularly for client-server web applications, with
                                    a reported 9 million developers.
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
                                Week #2 Java Basics
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    In this week, we will cover the basics of Java programming including variables, data
                                    types, operators, and control structures. You will learn how to write simple Java
                                    programs and understand the fundamental concepts of the language.
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
                                Week #3 Java Advanced
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    This week focuses on advanced Java topics such as object-oriented programming,
                                    inheritance, polymorphism, and interfaces. You will also learn about exception
                                    handling, file I/O, and multithreading in Java.
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