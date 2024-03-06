<?php
// database.php

$dsn = "mysql:host=localhost; dbname=world";
$username = 'root';
// $password = '1qaz';

try {
    // Use the same $username and $password for both databases
    $GLOBALS['conn'] = new PDO("mysql:host=localhost;dbname=todolist", $username);
    //$GLOBALS['conn'] = new PDO("mysql:host=localhost;dbname=todolist", $username, $password);
    $GLOBALS['conn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
