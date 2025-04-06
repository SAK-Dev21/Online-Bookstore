<?php include '../includes/header.inc.php'; ?>
<?php
require '../includes/db_connect.inc.php'; 

$isbn_13 = $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM books WHERE isbn_13 = ?");
    $stmt->execute([$isbn_13]);
    $book = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

if (!$book) {
    echo "Book not found.";
    exit;
}
?>

<main class="product-page">
    <section class="product-details">
        <div class="product-image">
            <img src="<?php echo htmlspecialchars($book['thumbnail']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
        </div>
        <div class="product-info">
            <h1><?php echo htmlspecialchars($book['title']); ?></h1>
            <p><strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
            <p><strong>Current Price:</strong> £<?php echo htmlspecialchars($book['retail_price']); ?></p>
            <p><strong>Stock Status:</strong> <?php echo $book['quantity'] > 0 ? 'In Stock' : 'Out of Stock'; ?></p>
            <div class="book-format">
                <label for="format">Book Format</label>
                <select id="format" name="format">
                    <option value="hardcover">Hardcover</option>
                    <option value="paperback">Paperback</option>
                </select>
            </div>
            <div class="quantity">
                <button class="decrease">-</button>
                <input type="number" value="1" min="1" max="<?php echo htmlspecialchars($book['quantity']); ?>">
                <button class="increase">+</button>
            </div>
            <button class="add-to-cart" data-id="<?php echo htmlspecialchars($book['isbn_13']); ?>">Add to Cart</button>
        </div>
    </section>
    <section class="additional-info">
        <details>
            <summary>Synopsis</summary>
            <p><?php echo htmlspecialchars($book['description']); ?></p>
        </details>
        <details>
            <summary>Author Information</summary>
            <p>Author information goes here.</p>
        </details>
        <details>
            <summary>Publishing Information</summary>
            <p>Publishing information goes here.</p>
        </details>
        <details>
            <summary>Shipping</summary>
            <p>Shipping information goes here.</p>
        </details>
    </section>
</main>

<script src="../assets/js/scripts.js"></script> 
<?php include '../includes/footer.inc.php'; ?>