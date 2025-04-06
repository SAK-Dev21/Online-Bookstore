<?php include '../includes/header.inc.php'; ?>
<?php
require '../includes/db_connect.inc.php'; 

try {
    $stmt = $pdo->query("SELECT * FROM books");
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<main>
    <section class="book-list">
        <h2>Shop all Books</h2>
        <div class="carousel">
            <div class="carousel-inner">
                <?php foreach ($books as $book) { ?>
                    <div class="book-item">
                        <img src="<?php echo $book['thumbnail']; ?>" alt="<?php echo $book['title']; ?>">
                        <h3><?php echo $book['title']; ?></h3>
                        <div class="card-buttons">
                            <button onclick="location.href='product_page.php?id=<?php echo $book['isbn_13']; ?>'">View Details</button>
                            <button class="add-to-cart" data-id="<?php echo $book['isbn_13']; ?>">Add to Cart</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main>

<script src="../assets/js/scripts.js"></script> 
<?php include '../includes/footer.inc.php'; ?>
