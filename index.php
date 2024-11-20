<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Teaching Website</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMpQl3FY9CeeEVY/H4mxAkbFvJjfBzGH0Fw5bJ4"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./css/main.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap"
    />
  </head>
  <body>
    <!-- Header with Navbar -->
    <header class="text-dark p-3">
      <div class="container">
        <nav class="navbar navbar-expand-md">
          <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Logo on the left -->
            <a class="nav-link" href="index.html">
              <img src="./img/logo-text.png" class="logo" alt="logo" />
            </a>
            <!-- Toggler button for mobile view -->
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links on the right -->
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Subjects
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./pages/java.html">Java Programming</a></li>
                    <li>
                      <a class="dropdown-item" href="./pages/database.html">Database Development</a>
                    </li>
                    <li><a class="dropdown-item" href="./pages/webdev.html">Web Development</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./pages/dashboard.html" role="button">Dashboard</a>
                </li>

                <li class="nav-item">
                  <button class="btn btn-sm btn-light">
                    <i class="fa fa-headset"></i>
                  </button>
                  <button
                    class="btn btn-sm btn-success login"
                    data-bs-toggle="modal"
                    data-bs-target="#loginModal"
                  >
                    <i class="fa fa-key"></i>
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>

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
            <img
              src="./img/online education.png"
              class="img-fluid img-main-page text-center rounded"
              alt="Why Choose Us"
            />
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
              <div
                class="progress-bar"
                role="progressbar"
                style="width: 100%"
                aria-valuenow="100"
                aria-valuemin="0"
                aria-valuemax="100"
              >
                8,000+
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <h2>95%</h2>
            <p>Course Completion Rate</p>
            <div class="progress">
              <div
                class="progress-bar bg-success"
                role="progressbar"
                style="width: 95%"
                aria-valuenow="95"
                aria-valuemin="0"
                aria-valuemax="100"
              >
                95%
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <h2>85%</h2>
            <p>Successful Employment Post-Course</p>
            <div class="progress">
              <div
                class="progress-bar bg-info"
                role="progressbar"
                style="width: 85%"
                aria-valuenow="85"
                aria-valuemin="0"
                aria-valuemax="100"
              >
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
              <img src="../img/java.png" class="card-img-top hover-zoom" alt="Java Programming" />
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
              <img src="../img/database.png" class="card-img-top" alt="Database Development" />
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
              <img src="../img/webdevelopment.png" class="card-img-top" alt="Web Development" />
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
              <img src="../img/student1.webp" class="card-img-top" alt="Student 1" />
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
              <img src="../img/student2.webp" class="card-img-top" alt="Student 2" />
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
              <img src="../img/student3.webp" class="card-img-top" alt="Student 3" />
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
          <input
            type="email"
            class="form-control w-50 me-2"
            placeholder="Enter your email"
            required
          />
          <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>
      </section>
    </div>

    <!-- Footer -->
    <footer class="footer text-center py-3">
      <div>Contact | Privacy | Terms</div>
    </footer>

    <!-- Login Modal -->
    <div
      class="modal fade"
      id="loginModal"
      tabindex="-1"
      aria-labelledby="loginModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Login</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" required />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" required />
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
              <button type="submit" class="btn btn-light">Forget password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Scripts -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="https://kit.fontawesome.com/5bd0d5f620.js" crossorigin="anonymous"></script>
  </body>
</html>
