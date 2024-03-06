<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('../model/database.php');
include_once('../model/item_db.php');
include_once('../model/category_db.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title']) && isset($_POST['description'])) {
    // Extract form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];

    // Validate and sanitize input
    try {
        // Insert into the database
        addToDoItem($GLOBALS['conn'], $title, $description, $category_id);

        // Redirect back to add_view.php after adding a new item
        // header("Location: ../view/add_view.php");
        // exit();
        echo "Redirecting...";
        header("Location: ../view/add_view.php");
        exit();
    } catch (PDOException $e) {
        echo "Error inserting data: " . $e->getMessage();
        exit();
    }
}
?>
