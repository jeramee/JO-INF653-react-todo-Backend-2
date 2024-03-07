<!-- index.php -->
<?php
include_once('../model/database.php');
include_once('../model/item_db.php');
include_once('../model/category_db.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submissions
    if (isset($_POST['removeItemNum'])) {
        $itemNum = $_POST['removeItemNum'];
        removeToDoItem($GLOBALS['conn'], $itemNum);
    }

    if (isset($_POST['category_id'])) {
        // Extract form data
        $category_id = $_POST['category_id'];

        // Redirect to index.php with the selected category
        header("Location: ../controller/index.php?category_id=$category_id");
        exit();
    }
}

// Get categories for the select dropdown
$categories = getCategories($GLOBALS['conn']);

// Get the selected category ID (if any)
$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;

// Get to-do items based on the selected category
$toDoItems = getToDoItems($GLOBALS['conn'], $category_id);

// Display the form and to-do list
include('../view/index_view.php');

// Function to handle form submission
function handleFormSubmission() {
    if (isset($_POST['category_id'])) {
        // Extract form data
        $category_id = $_POST['category_id'];

        // Validate and sanitize input
        try {
            // Redirect to index.php with the selected category
            header("Location: ../controller/index.php?category_id=$category_id");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit();
        }
    }
}
?>

<!-- index_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
</head>
<body>
    <h1>ToDo List</h1>

    <?php
    if (count($toDoItems) > 0) {
        foreach ($toDoItems as $item) {
            echo "<div>";
            echo "<span>{$item['category_id']}</span><br>"; // Display ItemNum
            echo "<span>{$item['Title']}</span>";
            echo "<br><br> <!-- Add two line breaks for more space -->";
            echo "<span>{$item['Description']}</span><br><br>";
            echo "<form action='index.php' method='post'>";
            echo "<input type='hidden' name='removeItemNum' value='{$item['category_id']}'>";
            echo "<button type='submit' style='color: red;'>X Remove</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "<p>No to-do list items exist yet.</p>";
    }
    ?>

    <br><br> <!-- Add two line breaks for more space -->
    <a href="../controller/add.php">Add Item</a>

</body>
</html>
