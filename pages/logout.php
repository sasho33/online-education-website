<?php
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/config.php'; 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
session_destroy(); // End the session
header("Location: " . BASE_URL . "index.php");
exit();
?>