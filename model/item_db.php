<!-- ../model/item_db.php -->
<?php
include("database.php");

function getToDoItems($conn, $category_id = null) {
    $query = 'SELECT todoitems.*, categories.category_name 
              FROM todoitems 
              LEFT JOIN categories ON todoitems.category_id = categories.category_id';
              
    if ($category_id !== null) {
        $query .= ' WHERE todoitems.category_id = :category_id';
    }

    $statement = $conn->prepare($query);
    
    if ($category_id !== null) {
        $statement->bindValue(':category_id', $category_id, PDO::PARAM_INT);
    }

    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $results;
}

function addToDoItem($conn, $title, $description, $category_id) {
    $query = 'INSERT INTO todoitems (Title, Description, category_id) 
              VALUES (:title, :description, :category_id)';
    
    $statement = $conn->prepare($query);
    $statement->bindParam(":title", $title);
    $statement->bindParam(":description", $description);
    $statement->bindParam(":category_id", $category_id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

function removeToDoItem($conn, $itemNum) {
    $query = 'DELETE FROM todoitems WHERE category_id = :category_id';
    
    $statement = $conn->prepare($query);
    $statement->bindParam(":category_id", $itemNum, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

// item_db.php

/* function getCategories($conn) {
        try {
        $query = 'SELECT * FROM categories';
        $statement = $conn->prepare($query);
        $statement->execute();
        $categories = $statement->fetchAll();
        $statement->closeCursor();
        return $categories;
    } catch (PDOException $e) {
        echo "Error getting categories: " . $e->getMessage();
        exit();
    }
}
*/

?>
