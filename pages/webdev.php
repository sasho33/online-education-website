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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" />
    <link rel="stylesheet" href="../css/main.css" />
  </head>
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
  <div class="container subject-container">
    
 <!-- Main Content and Tabs -->
 <section class = "subject-info">
  <!-- Navigation Tabs -->
  <ul class="nav nav-tabs" id="contentTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="mainContent-tab" data-bs-toggle="tab" href="#mainContent" role="tab">Main Content</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="studentList-tab" data-bs-toggle="tab" href="#studentList" role="tab">Student List</a>
    </li>
  </ul>

  <!-- Tab Content -->
  <div class="tab-content mt-3 ">
    <!-- Main Content Tab -->
    <div class="tab-pane fade show active" id="mainContent" role="tabpanel">
      <h1>Web Development</h1>
      <h3>Your Progress:</h3>
      <div class="progress">
        <div
          class="progress-bar"
          role="progressbar"
          style="width: 40%"
          aria-valuenow="40"
          aria-valuemin="0"
          aria-valuemax="100"
        >
          40%
        </div>
      </div>
      <br />
      <h3>Available materials:</h3>
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseOne"
              aria-expanded="true"
              aria-controls="collapseOne"
            >
              Week #1 Introduction to Web Development
            </button>
          </h2>
          <div
            id="collapseOne"
            class="accordion-collapse collapse show"
            aria-labelledby="headingOne"
            data-bs-parent="#accordionExample"
          >
            <div class="accordion-body">
              <p>
                Web development is the work involved in developing a website for the Internet or an intranet. Web development can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network services.
              </p>
              <p>
                Web development involves several aspects, including web design, web content development, client-side/server-side scripting, and network security configuration.
              </p>
              <button class="btn btn-success mt-2">Download Materials</button>
              <button class="btn btn-primary mt-2">Watch Video</button>
              <button class="btn btn-danger mt-2">Take Quiz</button>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseTwo"
              aria-expanded="false"
              aria-controls="collapseTwo"
            >
              Week #2 HTML & CSS Basics
            </button>
          </h2>
          <div
            id="collapseTwo"
            class="accordion-collapse collapse"
            aria-labelledby="headingTwo"
            data-bs-parent="#accordionExample"
          >
            <div class="accordion-body">
              <p>
                HTML (HyperText Markup Language) is the standard markup language for creating web pages. It describes the structure of a web page and its content. CSS (Cascading Style Sheets) is used to control the presentation, formatting, and layout of web pages.
              </p>
              <p>
                Basic HTML elements include headings, paragraphs, links, images, and lists. CSS properties include color, font, margin, padding, and border.
              </p>
              <button class="btn btn-success mt-2">Download Materials</button>
              <button class="btn btn-primary mt-2">Watch Video</button>
              <button class="btn btn-danger mt-2">Take Quiz</button>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseThree"
              aria-expanded="false"
              aria-controls="collapseThree"
            >
              Week #3 JavaScript Basics
            </button>
          </h2>
          <div
            id="collapseThree"
            class="accordion-collapse collapse"
            aria-labelledby="headingThree"
            data-bs-parent="#accordionExample"
          >
            <div class="accordion-body">
              <p>
                JavaScript is a programming language that allows you to implement complex features on web pages. It is used to create dynamically updating content, control multimedia, animate images, and much more.
              </p>
              <p>
                Basic JavaScript concepts include variables, functions, events, and DOM manipulation.
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


    <div class="footer">Contact | Privacy | Terms</div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="https://kit.fontawesome.com/5bd0d5f620.js" crossorigin="anonymous"></script>
  </body>
</html>
