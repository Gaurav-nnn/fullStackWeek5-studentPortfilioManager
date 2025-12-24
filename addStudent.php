<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];

    // Get form data
    $name   = isset($_POST["name"]) ? trim($_POST["name"]) : "";
    $email  = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $skills = isset($_POST["skills"]) ? trim($_POST["skills"]) : "";

    // Validation
    if (empty($name)) {
        $errors[] = "Name field cannot be empty";
    }

    if (empty($email)) {
        $errors[] = "Email field cannot be empty";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($skills)) {
        $errors[] = "Skills field cannot be empty";
    }

    // If no errors, store data
    if (empty($errors)) {

        $skillArr = explode(",", $skills);
        $skillStr = implode(", ", array_map("trim", $skillArr));

        $data = $name . " | " . $email . " | " . $skillStr . PHP_EOL;

        file_put_contents("students.txt", $data, FILE_APPEND);

        echo "<p style='color:green;'>Student added successfully!</p>";
    } 
    // Show errors
    else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student Info</title>
</head>
<body>

<h2>Add Student Information</h2>

<form action="addStudent.php" method="post">
    <label>Name:</label><br>
    <input type="text" name="name"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Skills (comma separated):</label><br>
    <input type="text" name="skills"><br><br>

    <button type="submit">Add Student</button>
</form>

</body>
</html>


