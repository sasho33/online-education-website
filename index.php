<?php 
include 'pages/partials/header.php';
?>
<!-- Main Container -->
<!-- Main Container -->
<div class="container my-2">
    <!-- Introductory Statistics Section -->
    <section class="text-center mb-4">
        <!-- New Section with Image on the Right and Text on the Left -->
        <section class="d-flex flex-column flex-md-row align-items-center text-center my-2">
            <div class="col-md-8 mb-3 mb-md-0">
                <h2 class="mb-4 text-center">Empowering Your Future in Technology</h2>
                <p>
                    Join our online teaching platform where thousands of students have launched their
                    careers in technology. From programming to data management and web development, our
                    courses are designed to equip you with industry-relevant skills.
                </p>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <img src="<?=BASE_URL; ?>img/online education.png" class="img-fluid img-main-page text-center rounded"
                    alt="Why Choose Us" />
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section my-5">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-laptop-code fa-3x mb-3"></i>
                            <h5 class="card-title">Hands-On Projects</h5>
                            <p class="card-text">
                                Gain practical experience with real-world projects that enhance your learning
                                and skills.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-chalkboard-teacher fa-3x mb-3"></i>
                            <h5 class="card-title">Expert Instructors</h5>
                            <p class="card-text">
                                Learn from industry experts with years of experience and a passion for teaching.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-certificate fa-3x mb-3"></i>
                            <h5 class="card-title">Certification</h5>
                            <p class="card-text">
                                Earn certificates that validate your skills and boost your career prospects.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics Row -->
        <div class="row text-center mt-4">
            <div class="col-md-4 mb-4">
                <h2>8,000+</h2>
                <p>Students Enrolled</p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                        aria-valuemin="0" aria-valuemax="100">
                        8,000+
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <h2>95%</h2>
                <p>Course Completion Rate</p>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 95%" aria-valuenow="95"
                        aria-valuemin="0" aria-valuemax="100">
                        95%
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <h2>85%</h2>
                <p>Successful Employment Post-Course</p>
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 85%" aria-valuenow="85"
                        aria-valuemin="0" aria-valuemax="100">
                        85%
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Subjects Section with Details and Instructors -->
    <section class="subjects-section">
        <h2 class="text-center mb-4">Explore Our Courses</h2>
        <div class="row">
            <!-- Java Programming -->
            <div class="col-md-4 mb-4 subject-card">
                <div class="card h-100">
                    <img src="<?=BASE_URL; ?>img/java.png" class="card-img-top hover-zoom" alt="Java Programming" />
                    <div class="card-body">
                        <h5 class="card-title">Java Programming</h5>
                        <p class="card-text">
                            Delve into Java and object-oriented programming concepts. This course covers Java
                            basics, intermediate techniques, and includes hands-on projects.
                        </p>
                        <h6>Instructor: Dr. Emily Carter</h6>
                        <p>
                            Dr. Carter is a seasoned software engineer with over 10 years of experience in
                            Java development.
                        </p>
                        <a href="./pages/java.html" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Database Development -->
            <div class="col-md-4 mb-4 subject-card">
                <div class="card h-100">
                    <img src="<?=BASE_URL; ?>img/database.png" class="card-img-top" alt="Database Development" />
                    <div class="card-body">
                        <h5 class="card-title">Database Development</h5>
                        <p class="card-text">
                            Learn the fundamentals of SQL and database management, covering everything from
                            schema design to complex queries and optimization.
                        </p>
                        <h6>Instructor: Prof. Andrew Smith</h6>
                        <p>
                            Prof. Smith brings 15 years of experience in database administration and data
                            analysis.
                        </p>
                        <a href="./pages/database.html" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Web Development -->
            <div class="col-md-4 mb-4 subject-card">
                <div class="card h-100">
                    <img src="<?=BASE_URL; ?>img/webdevelopment.png" class="card-img-top" alt="Web Development" />
                    <div class="card-body">
                        <h5 class="card-title">Web Development</h5>
                        <p class="card-text">
                            Dive into front-end and back-end development with HTML, CSS, JavaScript, and more.
                            Learn to build responsive, modern web applications.
                        </p>
                        <h6>Instructor: Sarah Lee</h6>
                        <p>
                            Sarah is a full-stack developer with over 8 years of experience in creating
                            engaging web applications.
                        </p>
                        <a href="./pages/webdev.html" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="text-center mt-4 mb-4">
        <h2 class="mb-4">What Our Students Say</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="<?=BASE_URL; ?>img/student1.webp" class="card-img-top student-card" alt="Student 1" />
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>
                                "The Java Programming course helped me land my first software developer job! The
                                hands-on projects were invaluable."
                            </p>
                            <footer class="blockquote-footer">Alexa M., Java Graduate</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="<?=BASE_URL; ?>img/student2.webp" class="card-img-top student-card" alt="Student 2" />
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>
                                "Prof. Smith's Database Development course made me confident in SQL, and I'm now
                                a junior data analyst."
                            </p>
                            <footer class="blockquote-footer">Maria L., Database Graduate</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="<?=BASE_URL; ?>img/student3.webp" class="card-img-top student-card" alt="Student 3" />
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>
                                "Learning web development with Sarah was amazing. Now, I'm building my own
                                websites professionally!"
                            </p>
                            <footer class="blockquote-footer">David K., Web Development Graduate</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call to Action Section -->
    <section class="cta-section text-center my-4">
        <h2 class="mb-4">Ready to Start Your Journey?</h2>
        <p>
            Enroll in our courses today and take the first step towards a successful career in
            technology.
        </p>
        <a href="./pages/enroll.html" class="btn btn-lg btn-primary">Enroll Now</a>
    </section>
    <!-- Newsletter Subscribe -->
    <section class="newsletter text-center my-4">
        <h2 class="mb-2">Stay Updated</h2>
        <p>
            Subscribe to our newsletter to get the latest updates on new courses and special offers.
        </p>
        <form class="d-flex justify-content-center">
            <input type="email" class="form-control w-50 me-2" placeholder="Enter your email" required />
            <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>
    </section>
</div>



<!-- Footer -->
<?php include 'pages/partials/footer.php'; ?>


<!-- Scripts -->