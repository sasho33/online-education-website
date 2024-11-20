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
    <link
      href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/main.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap"
    />
  </head>
  <body>
    <!-- Header with Navbar -->
    <header class="text-dark p-3">
      <div class="container">
        <nav class="navbar navbar-expand-sm">
          <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Logo on the left -->
            <a class="nav-link" href="../index.html">
              <img src="../img/logo-text.png" class="logo" alt="logo" />
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
                    <li><a class="dropdown-item" href="./java.html">Java Programming</a></li>
                    <li>
                      <a class="dropdown-item" href="./database.html">Database Development</a>
                    </li>
                    <li><a class="dropdown-item" href="./webdev.html">Web Development</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./teacher-dashboard.html" role="button">Dashboard</a>
                </li>

                <li class="nav-item">
                  <button class="btn btn-sm btn-light">
                    <i class="fa fa-headset"></i>
                  </button>
                  <button
                    class="btn btn-sm btn-danger login"
                    data-bs-toggle="modal"
                    data-bs-target="#loginModal"
                  >
                    <i class="fa-solid fa-right-from-bracket"></i>
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>

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
              <div
                class="progress-bar progress-bar-striped bg-success"
                role="progressbar"
                style="width: 50%"
                aria-valuenow="50"
                aria-valuemin="0"
                aria-valuemax="100"
              >
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
                <a href="./java.html" class="stretched-link"></a>
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
                <a href="./database.html" class="stretched-link"></a>
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
                <a href="./webdev.html" class="stretched-link"></a>
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
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://kit.fontawesome.com/5bd0d5f620.js" crossorigin="anonymous"></script>
  </body>
</html>
