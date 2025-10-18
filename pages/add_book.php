<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit;
}
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
            mkdir($target_dir, 0755, true);
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

<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/addbook.css">

<h2 class="add-book-title">Add New Book</h2>

<?php if ($message) echo "<p class='form-message'>$message</p>"; ?>

<form class="add-book-form" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Book Title</label>
        <input type="text" name="book_title" placeholder="Book Title" required>
    </div>
    <div class="form-group">
        <label>Author Name</label>
        <input type="text" name="author_name" placeholder="Author Name" required>
    </div>
    <div class="form-group">
        <label>Genre</label>
        <input type="text" name="genre" placeholder="Genre">
    </div>
    <div class="foem-group-row">
        <div class="form-group">
            <label>Published Year</label>
            <input type="number" name="published_year" placeholder="Year">
        </div>
        <div class="form-group">
            <label>Book Price</label>
            <input type="number" step="0.01" name="price" placeholder="Price">
        </div>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" placeholder="Description"></textarea>
    </div>
    <div class="form-group">
        <label>Cover Image</label>
        <input type="file" name="cover_image">
    </div>
    <button type="submit" name="submit" class="submit-btn">Add Book</button>
</form>

<?php
include_once '../includes/footer.php';
?>