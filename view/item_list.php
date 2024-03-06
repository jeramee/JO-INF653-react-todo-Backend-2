<main>
    <h1>ToDo List</h1>
    <form action="controller/index.php" method="get">
        <label for="category_id">Select Category:</label>
        <select name="category_id" id="category_id">
            <option value="">All Categories</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>" 
                    <?php if ($category['categoryID'] == $category_id) echo 'selected'; ?>>
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Filter</button>
    </form>
    <ul>
        <?php foreach ($toDoItems as $item) : ?>
            <li>
                <?php echo $item['Title']; ?> - <?php echo $item['Description']; ?>
                (Category: <?php echo $item['categoryName'] ? $item['categoryName'] : 'None'; ?>)
                <a href='controller/index.php?action=remove&id=<?php echo $item['ItemNum']; ?>'>Remove</a>
            </li>
        <?php endforeach; ?>
    </ul>
</main>
