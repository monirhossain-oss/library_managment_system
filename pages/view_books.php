<?php
// Include functions and header
include_once '../includes/functions.php';
include_once '../includes/header.php';

// Get all books
$books = getAllBooks();
?>

<h2 style="text-align:center; margin-bottom:30px;">All Books</h2>

<div class="book-container" style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center;">
    <?php if ($books && $books->num_rows > 0): ?>
        <?php while ($row = $books->fetch_assoc()): ?>
            <div class="book-card" style="background:white; padding:20px; border-radius:10px; width:220px; box-shadow:0 5px 15px rgba(9, 232, 46, 0.1); text-align:center;">
                <img src="<?php echo BASE_URL; ?>assets/images/<?php echo $row['cover_image'] ?: 'no-image.jpg'; ?>" alt="<?php echo $row['book_title']; ?>" style="width:100%; height:250px; object-fit:cover; border-radius:5px;">
                <h3 style="margin:10px 0;"><?php echo $row['book_title']; ?></h3>
                <p><b>Author:</b> <?php echo $row['author_name']; ?></p>
                <p><b>Genre:</b> <?php echo $row['genre']; ?></p>
                <p><b>Year:</b> <?php echo $row['published_year']; ?></p>
                <p><b>Price:</b> ৳<?php echo $row['price']; ?></p>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p style="text-align:center;">No books found!</p>
    <?php endif; ?>
</div>

<?php
// Include footer
include_once '../includes/footer.php';
?>