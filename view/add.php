<!-- add.php -->

<?php
// add.php
include_once('../model/database.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title']) && isset($_POST['description'])) {
    // Extract form data
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Validate and sanitize input
    // Insert into the database
    try {
        $stmt = $GLOBALS['conn']->prepare("INSERT INTO todoitems (Title, Description) VALUES (:title, :description)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->execute();

        // Redirect back to index.php after adding a new item
        header("Location: ../index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error inserting data: " . $e->getMessage();
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
</head>
<body>
    <h1>Add Item</h1>

    <form action="add.php" method="post">
        <br><br> <!-- Add two line breaks for more space -->
        <label for="title">Title:</label>
        <br> <!-- Add a line break for space -->
        <input type="text" id="title" name="title" required maxlength="20">
        
        <br><br> <!-- Add two line breaks for more space -->

        <label for="description">Description:</label>
        <br> <!-- Add a line break for space -->
        <input type="text" id="description" name="description" required maxlength="50">

        <br><br> <!-- Add two line breaks for more space -->

        <button type="submit">Add</button>
    </form>
</body>
</html>