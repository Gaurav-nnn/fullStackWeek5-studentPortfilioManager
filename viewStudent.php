<?php
include "header.php";

if (!file_exists("students.txt")) {
    echo "<p>No students found</p>";
    include "footer.php";
    exit;
}

$students = file("students.txt");
?>

<h3>Student List</h3>

<?php
foreach ($students as $student) {
    list($name, $email, $skills) = explode(",", trim($student));
    $skillsArray = explode("|", $skills);

    echo "<p>";
    echo "<strong>Name:</strong> $name<br>";
    echo "<strong>Email:</strong> $email<br>";
    echo "<strong>Skills:</strong> ";
    print_r($skillsArray);
    echo "</p><hr>";
}
?>

<?php include "footer.php"; ?>
