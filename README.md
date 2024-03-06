# INF 653 - PHP ToDo List Application

This project is a PHP assignment for INF 653 - Back-End Dev.

**Author:** Jeramee Oliver  
**Date:** 3/5/2024  
**Course:** INF 653 - Back-End Dev

## Project Overview

The assignment involves using MVC to create a ToDo List project, introducing categories, and refactoring code. Students are advised to create a new GitHub repository, organize files, implement category functionality, and adapt textbook example code. The project uses PHP for server-side logic and MySQL for database interactions.

## Files

- **index.php:** The main PHP file responsible for displaying the ToDo List and handling form submissions.
- **model/database.php:** PHP script for establishing a connection to the MySQL database.
- **model/item_db.php:** PHP script for handling ToDo items in the database.
- **model/category_db.php:** PHP script for handling categories in the database.
- **view/header.php:** Header file for the HTML structure.
- **view/footer.php:** Footer file for the HTML structure.
- **view/error.php:** Error handling file for displaying error messages.
- **view/css/main.css:** CSS file for styling the application.
- **view/add.php:** Add items to the list on a separate page.
- **view/item_list.php:** Template for displaying ToDo items.
- **view/category_list.php:** Template for displaying categories.
- **.gitignore:** Configuration file for Git to ignore specific files and directories.

## Setup Instructions

1. Set up a MySQL database named "todolist" with tables "todoitems" and "categories" (refer to assignment requirements for table structure).
2. Update `database.php` with your actual database credentials.
3. Ensure that your server environment supports PHP and has PDO enabled for MySQL.
4. Run the PHP application on your server.

## Usage

- Access `index.php` to view and manage your ToDo List.
- Add new items using the provided form.
- Click "Remove" next to each item to delete it from the list and the database.
- Use the drop-down menu to filter items by category.

## Dependencies

- PHP 8.1.0
- MySQL

## Acknowledgments

*This project was created as part of the INF 653 course. Special thanks to the course instructor and resources provided.*

---

# Assignment: Applying MVC Assignment

## Instructions

For this assignment, we will be applying MVC to last week's ToDo List assignment.

**Note:** This is a new assignment. Create a NEW GitHub Repo for it separate from last week's assignment.

**Design variations accepted:** Follow the directions. The design of the pages is completely up to you.

### Part One: Adding Categories to your ToDo List

1. Review Exercise 4-1 in Chapter 4 and update your ToDo List to include Categories.
2. Create a new table in your database called "categories" with fields "categoryID" (primary, auto-increment) and "categoryName".
3. Add a "categoryID" column to your "todoitems" table. Update the add item process to include the categoryID by selecting the category name from a drop menu.
4. (Optional) Make the categoryID column in the todoitems table a foreign key linked to the categoryID column in the categories table.

### Part Two: Refactoring Your Code to use the MVC Pattern

5. Work on the textbook's example code (pages 159 to 179) and create a copy of your existing project.
6. Move your "add_item.php", "delete_item.php", "add_category.php", and "delete_category.php" files to functions in "item_db.php" and "category_db.php".
7. Move your "database.php" file to the "model" folder.
8. Create a "view" folder and add "header.php" and "footer.php" files, as well as an "error.php" file for error handling.
9. Create a "css" folder inside the "view" folder and add your CSS file.
10. Implement an "else if" in the "index.php" file for deleting a category and for adding a category.
11. (Optional) Add a select menu above the list display to choose which category of items to display.
