<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


include 'assignments.php';

$assignments = [];
try {
    if (isset($_SESSION['user_id']) && isset($_SESSION['user_role'])) {
        $studentID = $_SESSION['user_id'];

        if ($_SESSION['user_role'] === 'student') {
            $assignments = getAssingmentForCalendarByUserId($studentID);
        } else {
            $assignments = getAssingmentForCalendar();
        }
    } else {
        // If session data is not set, return an error response
        echo json_encode(['error' => 'Unauthorized access.']);
        http_response_code(401);
        exit();
    }

    echo json_encode($assignments);
} catch (Exception $e) {
    // Log the error for debugging
    error_log('Error fetching assignments: ' . $e->getMessage());
    echo json_encode(['error' => 'Failed to fetch assignments.']);
    http_response_code(500);
    exit();
}
