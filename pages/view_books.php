<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit;
}
include_once '../includes/functions.php';
include_once '../includes/header.php';


// Get all books
$books = getAllBooks();
?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/viewBook.css">

<h2>All Books</h2>

<div class="book-container">
    <?php if ($books && $books->num_rows > 0): ?>
        <?php while ($book = $books->fetch_assoc()): ?>
            <div class="book-card">
                <img src="<?php echo BASE_URL; ?>assets/images/<?php echo $book['cover_image'] ?: 'no-image.jpg'; ?>"
                    alt="<?php echo htmlspecialchars($book['book_title']); ?>">
                <h3><?php echo htmlspecialchars($book['book_title']); ?></h3>
                <p><b>Author:</b> <?php echo htmlspecialchars($book['author_name']); ?></p>
                <p><b>Price:</b> ৳<?php echo htmlspecialchars($book['price']); ?></p>
                <a href="book_details.php?id=<?php echo $row['id']; ?>" class="details-btn"> View Details</a>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p style="text-align:center; font-weight:600; color:#4DA674;">No books found!</p>
    <?php endif; ?>
</div>

<?php
include_once '../includes/footer.php';
?>
