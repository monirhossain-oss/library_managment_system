<?php
include_once '../includes/functions.php';
include_once '../includes/header.php';

$message = '';

if (isset($_POST['submit'])) {
    $title = $_POST['book_title'];
    $author = $_POST['author_name'];
    $genre = $_POST['genre'];
    $year = $_POST['published_year'];
    $price = $_POST['price'];
    $desc = $_POST['description'];

    // Handle image upload
    $image = '';
    if (!empty($_FILES['cover_image']['name'])) {
        $image = time() . '_' . basename($_FILES['cover_image']['name']);
        $target_dir = __DIR__ . '/../assets/images/';
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true); // create folder if not exists
        }
        $target_file = $target_dir . $image;
        if (!move_uploaded_file($_FILES['cover_image']['tmp_name'], $target_file)) {
            $message = "❌ Error uploading image!";
        }
    }

    // Add book to DB
    if (empty($message)) {
        $result = addBook($title, $author, $genre, $year, $price, $desc, $image);

        if ($result === true) {
            $message = '✅ Book added successfully!';
        } else {
            $message = '❌ Error: ' . $result;
        }
    }
}
?>

<h2>Add New Book</h2>

<?php if ($message) echo "<p style='text-align:center; font-weight:600;'>$message</p>"; ?>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="book_title" placeholder="Book Title" required>
    <input type="text" name="author_name" placeholder="Author Name" required>
    <input type="text" name="genre" placeholder="Genre">
    <input type="number" name="published_year" placeholder="Year">
    <input type="number" step="0.01" name="price" placeholder="Price">
    <textarea name="description" placeholder="Description"></textarea>
    <input type="file" name="cover_image">
    <button type="submit" name="submit">Add Book</button>
</form>

<?php
include_once '../includes/footer.php';
?>