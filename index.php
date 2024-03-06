<!-- index.php -->

<?php
// index.php
include_once('model/database.php');

// Check if the 'removedItemNum' parameter is set in the URL
if (isset($_GET['removedItemNum'])) {
    $removedItemNum = $_GET['removedItemNum'];
    echo "<p>ItemNum $removedItemNum has been successfully removed.</p>";
}

// Remove item if 'remove' button is clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['removeItemNum'])) {
    $removedItemNum = $_POST['removeItemNum'];

    // Remove the item from the database
    try {
        $stmt = $GLOBALS['conn']->prepare("DELETE FROM todoitems WHERE ItemNum = :id");
        $stmt->bindParam(':id', $removedItemNum);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error removing item: " . $e->getMessage();
        exit();
    }

    // Redirect back to index.php after removing the item
    header("Location: index.php?removedItemNum=$removedItemNum");
    exit();
}

// Retrieve ToDo List items from the database
try {
    $stmt = $GLOBALS['conn']->prepare("SELECT * FROM todoitems");
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>

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
    if (count($items) > 0) {
        foreach ($items as $item) {
            echo "<div>";
            echo "<span>{$item['ItemNum']}</span><br>"; // Display ItemNum
            echo "<span>{$item['Title']}</span>";
            echo "<br><br> <!-- Add two line breaks for more space -->";
            echo "<span>{$item['Description']}</span><br><br>";
            echo "<form action='index.php' method='post'>";
            echo "<input type='hidden' name='removeItemNum' value='{$item['ItemNum']}'>";
            echo "<button type='submit' style='color: red;'>X Remove</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "<p>No to-do list items exist yet.</p>";
    }
    ?>

    <br><br> <!-- Add two line breaks for more space -->
    <a href="view/add.php">Add Item</a>

</body>
</html>
