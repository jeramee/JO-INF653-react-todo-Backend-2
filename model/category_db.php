<!-- ../model/category_db.php -->
<?php

function getCategories() {
    include("database.php");

    $query = 'SELECT * FROM categories ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();

    return $categories;
}

function getCategoryName($category_id) {
    include("database.php");

    $query = 'SELECT * FROM categories WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();

    $category_name = $category['categoryName'];
    return $category_name;
}

function addCategory($category_name) {
    include("database.php");

    $query = 'INSERT INTO categories (categoryName) VALUES (:category_name)';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->execute();
    $statement->closeCursor();
}

function removeCategory($category_id) {
    include("database.php");

    $query = 'DELETE FROM categories WHERE categoryID = :category_id';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}
?>
