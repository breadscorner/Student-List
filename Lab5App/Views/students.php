<?php

include('includes/header.php');

echo "<table>";
if ($students !== null && count($students) > 0) {
    foreach ($students as $student) {
        echo "<tr><td>{$student['id']}</td><td>{$student['name']}</td><td>{$student['email']}</td></tr>";
    }
} else {
    echo "<tr><td colspan='3' style='text-align: center;'>No students found.</td></tr>";
}
echo "</table>";

include('includes/footer.php');
