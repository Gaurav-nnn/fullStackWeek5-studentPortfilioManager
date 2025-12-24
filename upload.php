<?php
include "header.php";
include "function.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        uploadPortfolioFile($_FILES['portfolio']);
        $success = "File uploaded successfully";
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<h3>Upload Portfolio File</h3>

<?php if ($error) echo "<p style='color:red'>$error</p>"; ?>
<?php if ($success) echo "<p style='color:green'>$success</p>"; ?>

<form method="post" enctype="multipart/form-data">
    Select file: <input type="file" name="portfolio"><br><br>
    <button type="submit">Upload</button>
</form>

<?php include "footer.php"; ?>
