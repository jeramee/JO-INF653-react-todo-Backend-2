<!-- item_db.php -->
<?php

function getToDoItems($category_id = null) {
    include("database.php");

    $query = 'SELECT todoitems.*, categories.categoryName 
              FROM todoitems 
              LEFT JOIN categories ON todoitems.categoryID = categories.categoryID';
              
    if ($category_id !== null) {
        $query .= ' WHERE todoitems.categoryID = :category_id';
    }

    $statement = $db->prepare($query);
    
    if ($category_id !== null) {
        $statement->bindValue(':category_id', $category_id);
    }

    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}

function addToDoItem($title, $description, $category_id) {
    include("database.php");

    $query = 'INSERT INTO todoitems (Title, Description, categoryID) 
              VALUES (:title, :description, :category_id)';
    
    $statement = $db->prepare($query);
    $statement->bindValue(":title", $title);
    $statement->bindValue(":description", $description);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $statement->closeCursor();
}

function removeToDoItem($itemNum) {
    include("database.php");

    $query = 'DELETE FROM todoitems WHERE ItemNum = :itemNum';
    
    $statement = $db->prepare($query);
    $statement->bindValue(":itemNum", $itemNum);
    $statement->execute();
    $statement->closeCursor();
}
?>