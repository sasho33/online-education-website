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
                <h1>Web Development</h1>
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
                                Week #1 Introduction to Web Development
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    Web development is the work involved in developing a website for the Internet or an
                                    intranet. Web development can range from developing a simple single static page of
                                    plain text to complex web applications, electronic businesses, and social network
                                    services.
                                </p>
                                <p>
                                    Web development involves several aspects, including web design, web content
                                    development, client-side/server-side scripting, and network security configuration.
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
                                Week #2 HTML & CSS Basics
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    HTML (HyperText Markup Language) is the standard markup language for creating web
                                    pages. It describes the structure of a web page and its content. CSS (Cascading
                                    Style Sheets) is used to control the presentation, formatting, and layout of web
                                    pages.
                                </p>
                                <p>
                                    Basic HTML elements include headings, paragraphs, links, images, and lists. CSS
                                    properties include color, font, margin, padding, and border.
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
                                Week #3 JavaScript Basics
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    JavaScript is a programming language that allows you to implement complex features
                                    on web pages. It is used to create dynamically updating content, control multimedia,
                                    animate images, and much more.
                                </p>
                                <p>
                                    Basic JavaScript concepts include variables, functions, events, and DOM
                                    manipulation.
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