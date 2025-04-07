<?php include '../includes/header.inc.php'; ?>
<?php
require '../includes/db_connect.inc.php'; 

try {
    $stmt = $pdo->query("SELECT * FROM books WHERE quantity > 0");
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<main>
    <section class="book-list">
        <h2>Limited Time Only!</h2>
            <?php foreach ($books as $book) { ?>
                <div class="book-item">
                    <img src="<?php echo htmlspecialchars($book['thumbnail']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
                    <h3><?php echo htmlspecialchars($book['title']); ?></h3>
                    <button class="view-details" onclick="location.href='product_page.php?isbn_13=<?php echo htmlspecialchars($book['isbn_13']); ?>'">View Details</button>
                    <button class="add-to-cart" data-id="<?php echo htmlspecialchars($book['isbn_13']); ?>">Add to Cart</button>
                </div>
            <?php } ?>
    </section>
</main>

<script src="../assets/js/cart.js"></script> 
<script src="../assets/js/scripts.js"></script> 
<?php include '../includes/footer.inc.php'; ?>
