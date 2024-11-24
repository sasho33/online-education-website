<?php

include 'assignments.php';

header('Content-Type: application/json');
$assignments = getAllAssignments(); // Ensure this fetches the Color field as well

echo json_encode($assignments);

?>