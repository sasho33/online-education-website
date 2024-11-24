<?php include $_SERVER['DOCUMENT_ROOT'] . '/online-education/config.php'; 
include BASE_PATH.'db/connection.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ALL); // Report all errors
ini_set('display_errors', '0'); // Do not display errors on the front end
ini_set('log_errors', '1'); // Log errors to a file for debugging
ini_set('error_log', $_SERVER['DOCUMENT_ROOT'] . '/logs/php-error.log');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Teaching Website</title>
    <link rel="icon" type="image/x-icon" href="<?=BASE_URL; ?>img/icons/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMpQl3FY9CeeEVY/H4mxAkbFvJjfBzGH0Fw5bJ4" crossorigin="anonymous" />


   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" />
    <link rel="stylesheet" href="<?=BASE_URL; ?>css/main.css" />
    <script src="https://cdn.tiny.cloud/1/17jlypjvlumh6qwpa7amy2nqvlg3ybqgxaghl75jj8xsotpp/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
</head>

<body>
    <!-- Header with Navbar -->
    <header class="text-dark p-3">
        <div class="container">
            <nav class="navbar navbar-expand-md">
                <div class="container-fluid d-flex justify-content-between align-items-center">
                    <!-- Logo on the left -->
                    <a class="nav-link" href="<?=BASE_URL; ?>">
                        <img src="<?=BASE_URL; ?>img/logo-text.png" class="logo" alt="logo" />
                    </a>
                    <!-- Toggler button for mobile view -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Navbar links on the right -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Subjects
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?=BASE_URL; ?>pages/java.php">Java
                                            Programming</a></li>
                                    <li>
                                        <a class="dropdown-item" href="<?=BASE_URL; ?>pages/database.php">Database
                                            Development</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?=BASE_URL; ?>pages/webdev.php">Web
                                            Development</a></li>
                                </ul>
                            </li>
                            <?php if (isset($_SESSION['user_id'])): ?>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="<?=BASE_URL; ?>pages/<?=$_SESSION['user_role'] === 'admin' ? 'teacher-dashboard.php' : 'dashboard.php';?>"
                                    role="button">Dashboard</a>
                            </li>
                            <?php endif; ?>

                            <li class="nav-item">
                                <a class="btn btn-sm btn-light" role="button">
                                    <i class="fa fa-headset"></i>
                                </a>
                                <!-- Login/Logout Button -->

                                <?php if (isset($_SESSION['user_id'])): ?>

                                <a href="<?=BASE_URL; ?>pages/logout.php" class="btn btn-sm btn-danger btn-margin"
                                    role="button"><i class="fa fa-sign-out"></i>
                                </a>
                                <?php else: ?>
                                <a href="<?=BASE_URL; ?>pages/login.php" role="button"
                                    class="btn btn-sm btn-success login btn-margin">
                                    <i class="fa fa-key"></i>
                                </a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>