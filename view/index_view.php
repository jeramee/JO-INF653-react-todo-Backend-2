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

    <form action="../controller/index.php" method="post">
        <label for="category_id">Select Category:</label>
        <select name="category_id" id="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['category_id']; ?>">
                    <?php echo $category['category_name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Filter</button>
    </form>

    <?php if (count($toDoItems) > 0) : ?>
        <ul>
            <?php foreach ($toDoItems as $item) : ?>
                <li>
                    <strong><?php echo $item['Title']; ?></strong>
                    <p><?php echo $item['Description']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No to-do list items exist yet.</p>
    <?php endif; ?>

    <br><br>
    <a href="../controller/add.php">Add Item</a>
</body>
</html>
