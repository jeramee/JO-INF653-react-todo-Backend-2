<!-- ../model/database.php -->
<?php

if (!function_exists('connectToDatabase')) {
    function connectToDatabase() {
        $dsn = "mysql:host=localhost;dbname=todolist";
        $username = 'root';
        // $password = '1qaz';

        try {
            $conn = new PDO($dsn, $username);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit();
        }
    }
}

// Usage in other files:
$conn = connectToDatabase();