<?php
include_once __DIR__ . '/../config/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <h3>My Library</h3>
            </div>

            <div class="nav-links">
                <a href="<?php echo BASE_URL; ?>index.php">Home</a>
                <a href="<?php echo BASE_URL; ?>pages/add_book.php">Add Book</a>
                <a href="<?php echo BASE_URL; ?>pages/view_books.php">View Books</a>
                <a href="<?php echo BASE_URL; ?>pages/contact.php">Contact</a>
            </div>

            <div class="menu-icon">
                <span class="open-menu">&#9776;</span>
                <span class="close-menu">&#10005;</span>
            </div>
        </nav>

        <!-- Mobile drawer -->
        <div class="mobile-drawer">
            <a href="<?php echo BASE_URL; ?>index.php">Home</a>
            <a href="<?php echo BASE_URL; ?>pages/add_book.php">Add Book</a>
            <a href="<?php echo BASE_URL; ?>pages/view_books.php">View Books</a>
            <a href="<?php echo BASE_URL; ?>pages/contact.php">Contact</a>
        </div>
    </header>
    <main>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="<?php echo BASE_URL; ?>config/index.js"></script>  