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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" />
    <link rel="stylesheet" href="../css/main.css" />
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
                  <a class="nav-link" href="./dashboard.html" role="button">Dashboard</a>
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

    <!-- Main Container -->
    <div class="container my-5">
      <h2 class="text-center mb-4">Teacher Dashboard</h2>

      <!-- Dashboard Navigation Tabs -->
      <ul class="nav nav-tabs" id="dashboardTab" role="tablist">
        <li class="nav-item">
          <a
            class="nav-link active"
            id="students-tab"
            data-bs-toggle="tab"
            href="#students"
            role="tab"
            >Manage Students</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" id="materials-tab" data-bs-toggle="tab" href="#materials" role="tab"
            >Upload Materials</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="modify-materials-tab"
            data-bs-toggle="tab"
            href="#modify-materials"
            role="tab"
            >Modify Materials</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="assignments-tab"
            data-bs-toggle="tab"
            href="#assignments"
            role="tab"
            >Assignments</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" id="news-tab" data-bs-toggle="tab" href="#news" role="tab"
            >News & Announcements</a
          >
        </li>
      </ul>

      <!-- Tab Content -->
      <div class="tab-content mt-4">
        <!-- Manage Students Tab -->
        <div class="tab-pane fade show active" id="students" role="tabpanel">
          <h3>Manage Students</h3>
          <div class="mb-3">
            <button
              class="btn btn-primary"
              data-bs-toggle="modal"
              data-bs-target="#addStudentModal"
            >
              Add Student
            </button>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Sample student entry -->
              <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>johndoe@example.com</td>
                <td>
                  <button class="btn btn-warning btn-sm">Edit</button>
                  <button class="btn btn-danger btn-sm">Delete</button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>janesmith@example.com</td>
                <td>
                  <button class="btn btn-warning btn-sm">Edit</button>
                  <button class="btn btn-danger btn-sm">Delete</button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Michael Brown</td>
                <td>michaelbrown@example.com</td>
                <td>
                  <button class="btn btn-warning btn-sm">Edit</button>
                  <button class="btn btn-danger btn-sm">Delete</button>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>Emily Davis</td>
                <td>emilydavis@example.com</td>
                <td>
                  <button class="btn btn-warning btn-sm">Edit</button>
                  <button class="btn btn-danger btn-sm">Delete</button>
                </td>
              </tr>
              <!-- Add more students here -->
            </tbody>
          </table>
        </div>

        <!-- Upload Materials Tab -->
        <div class="tab-pane fade" id="materials" role="tabpanel">
          <h3>Upload Materials</h3>
          <form>
            <div class="mb-3">
              <label for="subject" class="form-label">Subject</label>
              <select class="form-select" id="subject" required>
                <option selected>Select Subject</option>
                <option value="Java">Java Programming</option>
                <option value="Database">Database Development</option>
                <option value="WebDev">Web Development</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="materialTitle" class="form-label">Material Title</label>
              <input type="text" class="form-control" id="materialTitle" required />
            </div>
            <div class="mb-3">
              <label for="materialContent" class="form-label">Material Content</label>
              <textarea class="form-control" id="newsContent" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label for="uploadFile" class="form-label">Upload File</label>
              <input type="file" class="form-control" id="uploadFile" required />
            </div>
            <div class="mb-3">
              <label for="availabilityDate" class="form-label">Availability Date</label>
              <input type="date" class="form-control" id="availabilityDate" required />
            </div>
            <button type="submit" class="btn btn-success">Upload Material</button>
            <button type="submit" class="btn btn-primary">Create Quiz</button>
          </form>
        </div>

        <!-- Modify Materials Tab -->
        <div class="tab-pane fade" id="modify-materials" role="tabpanel">
          <h3>Modify Uploaded Materials</h3>
          <!-- Sub Tabs for Subjects -->
          <ul class="nav nav-tabs" id="modifyMaterialsTab" role="tablist">
            <li class="nav-item">
              <a
                class="nav-link active"
                id="java-materials-tab"
                data-bs-toggle="tab"
                href="#java-materials"
                role="tab"
                >Java Programming</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="database-materials-tab"
                data-bs-toggle="tab"
                href="#database-materials"
                role="tab"
                >Database Development</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="webdev-materials-tab"
                data-bs-toggle="tab"
                href="#webdev-materials"
                role="tab"
                >Web Development</a
              >
            </li>
          </ul>
          <!-- Modify Materials Tab Content -->
          <div class="tab-content mt-4">
            <!-- Java Programming Materials -->
            <div class="tab-pane fade show active" id="java-materials" role="tabpanel">
              <h4>Java Programming Materials</h4>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Upload Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Sample material entry -->
                  <tr>
                    <td>1</td>
                    <td>Introduction to Java</td>
                    <td>2023-09-01</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                      <button class="btn btn-info btn-sm">Set Date</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Advanced Java Concepts</td>
                    <td>2023-09-15</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                      <button class="btn btn-info btn-sm">Set Date</button>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Java Data Structures</td>
                    <td>2023-09-22</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                      <button class="btn btn-info btn-sm">Set Date</button>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Java Networking</td>
                    <td>2023-09-29</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                      <button class="btn btn-info btn-sm">Set Date</button>
                    </td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Java Multithreading</td>
                    <td>2023-10-06</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                      <button class="btn btn-info btn-sm">Set Date</button>
                    </td>
                  </tr>
                  </tr>
                  <!-- Add more materials here -->
                </tbody>
              </table>
            </div>

            <!-- Database Development Materials -->
            <div class="tab-pane fade" id="database-materials" role="tabpanel">
              <h4>Database Development Materials</h4>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Upload Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Sample material entry -->
                  <tr>
                    <td>1</td>
                    <td>Introduction to Databases</td>
                    <td>2023-09-01</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                      <button class="btn btn-info btn-sm">Set Date</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Advanced Java Concepts</td>
                    <td>2023-09-15</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                      <button class="btn btn-info btn-sm">Set Date</button>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Java Data Structures</td>
                    <td>2023-09-22</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                      <button class="btn btn-info btn-sm">Set Date</button>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Java Networking</td>
                    <td>2023-09-29</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                      <button class="btn btn-info btn-sm">Set Date</button>
                    </td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Java Multithreading</td>
                    <td>2023-10-06</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                      <button class="btn btn-info btn-sm">Set Date</button>
                    </td>
                  </tr>
                  </tr>
                  <!-- Add more materials here -->
                </tbody>
              </table>
            </div>

            <!-- Web Development Materials -->
            <div class="tab-pane fade" id="webdev-materials" role="tabpanel">
              <h4>Web Development Materials</h4>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Upload Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Sample material entry -->
                  <tr>
                    <td>1</td>
                    <td>Introduction to HTML</td>
                    <td>2023-09-01</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                      <button class="btn btn-info btn-sm">Set Date</button>
                    </td>
                  <tr>
                    <td>2</td>
                    <td>Advanced Java Concepts</td>
                    <td>2023-09-15</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                      <button class="btn btn-info btn-sm">Set Date</button>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Java Data Structures</td>
                    <td>2023-09-22</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                      <button class="btn btn-info btn-sm">Set Date</button>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Java Networking</td>
                    <td>2023-09-29</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                      <button class="btn btn-info btn-sm">Set Date</button>
                    </td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Java Multithreading</td>
                    <td>2023-10-06</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                      <button class="btn btn-info btn-sm">Set Date</button>
                    </td>
                  </tr>
                  </tr>
                  <!-- Add more materials here -->
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Assignments Tab -->
        <div class="tab-pane fade" id="assignments" role="tabpanel">
          <h3>Create Assignment</h3>
          <form>
            <div class="mb-3">
              <label for="assignmentTitle" class="form-label">Assignment Title</label>
              <input type="text" class="form-control" id="assignmentTitle" required />
            </div>
            <div class="mb-3">
              <label for="assignmentDescription" class="form-label">Assignment Description</label>
              <textarea
                class="form-control"
                id="assignmentDescription"
                rows="3"
                required
              ></textarea>
            </div>
            <div class="mb-3">
              <label for="assignmentDueDate" class="form-label">Due Date</label>
              <input type="date" class="form-control" id="assignmentDueDate" required />
            </div>
            <button type="submit" class="btn btn-primary">Create Assignment</button>
          </form>
        </div>

        <!-- News & Announcements Tab -->
        <div class="tab-pane fade" id="news" role="tabpanel">
          <h3>News & Announcements</h3>
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

      <div class="calendar">
        <h2>Teacher Calendar</h2>
        <div id="calendar"></div>
      </div>
    </div>

    <!-- Add Student Modal -->
    <div
      class="modal fade"
      id="addStudentModal"
      tabindex="-1"
      aria-labelledby="addStudentModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
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
                <label for="studentName" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="studentName" required />
              </div>
              <div class="mb-3">
                <label for="studentEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="studentEmail" required />
              </div>
              <div class="mb-3">
                <label for="studentPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="studentPassword" required />
              </div>
              <button type="submit" class="btn btn-primary">Add Student</button>
            </form>
          </div>
        </div>
      </div>
      <!-- Calendar Section -->
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
    <script src="https://kit.fontawesome.com/5bd0d5f620.js" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
  </body>
</html>
