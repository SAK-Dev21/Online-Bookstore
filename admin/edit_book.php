<?php
include '../includes/header.inc.php';
require_once '../includes/db_connect.inc.php';

$book = [
    'isbn_13' => '',
    'thumbnail' => '',
    'title' => '',
    'author' => '',
    'publication_date' => '',
    'description' => '',
    'trade_price' => 0,
    'retail_price' => 0,
    'quantity' => 0
];

$error = '';

if (isset($_GET['isbn_13'])) {
    $isbn_13 = $_GET['isbn_13'];
    $query = 'SELECT * FROM books WHERE isbn_13 = :isbn_13';
    $stmt = $pdo->prepare($query);
    $stmt->execute(['isbn_13' => $isbn_13]);
    $book = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$book) {
        $error = 'Book not found.';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn_13 = $_POST['isbn'];
    $thumbnail = $_FILES['cover-image']['name'];
    $title = $_POST['book-name'];
    $author = $_POST['author'];
    $publication_date = $_POST['publication-date'];
    $description = $_POST['description'];
    $trade_price = $_POST['trade-price'];
    $retail_price = $_POST['retail-price'];
    $quantity = $_POST['quantity'];

    // Handle image upload
    if ($thumbnail) {
        $target_dir = "../assets/images/";
        $target_file = $target_dir . basename($thumbnail);
        move_uploaded_file($_FILES['cover-image']['tmp_name'], $target_file);
        $thumbnail = $target_file;
    } else {
        $thumbnail = $book['thumbnail'];
    }

    $query = 'UPDATE books SET thumbnail = :thumbnail, title = :title, author = :author, publication_date = :publication_date, description = :description, trade_price = :trade_price, retail_price = :retail_price, quantity = :quantity WHERE isbn_13 = :isbn_13';
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'thumbnail' => $thumbnail,
        'title' => $title,
        'author' => $author,
        'publication_date' => $publication_date,
        'description' => $description,
        'trade_price' => $trade_price,
        'retail_price' => $retail_price,
        'quantity' => $quantity,
        'isbn_13' => $isbn_13
    ]);

    header('Location: admin_dashboard.php');
    exit();
}
?>

<main>
    <section class="add-book">
        <h2>Edit Book</h2>
        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php else: ?>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="isbn" value="<?php echo htmlspecialchars($book['isbn_13']); ?>">

                <div class="file-input">
                    <label for="cover-image">Thumbnail Image:</label>
                    <div class="file-box">
                        <p><?php echo htmlspecialchars(basename($book['thumbnail'])) ?: 'No file selected'; ?></p>
                        <button type="button" onclick="document.getElementById('cover-image').click()">Select file</button>
                    </div>
                    <input type="file" id="cover-image" name="cover-image" accept="image/*" onchange="document.querySelector('.file-box p').textContent = this.files[0].name">
                </div>

                <label for="isbn">ISBN-13:</label>
                <input type="text" id="isbn" name="isbn" required value="<?php echo htmlspecialchars($book['isbn_13']); ?>" readonly>

                <label for="book-name">Book Title:</label>
                <input type="text" id="book-name" name="book-name" required value="<?php echo htmlspecialchars($book['title']); ?>">

                <label for="author">Author:</label>
                <input type="text" id="author" name="author" required value="<?php echo htmlspecialchars($book['author']); ?>">

                <label for="publication-date">Publication Date:</label>
                <input type="date" id="publication-date" name="publication-date" required value="<?php echo htmlspecialchars($book['publication_date']); ?>">

                <label for="description">Book Description:</label>
                <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($book['description']); ?></textarea>

                <div class="slider-container">
                    <label for="trade-price">Trade Price (£):</label>
                    <input type="range" id="trade-price" name="trade-price" min="0" max="100" step="1" value="<?php echo htmlspecialchars($book['trade_price']); ?>" oninput="this.nextElementSibling.value = this.value">
                    <output><?php echo htmlspecialchars($book['trade_price']); ?></output>
                </div>

                <div class="slider-container">
                    <label for="retail-price">Retail Price (£):</label>
                    <input type="range" id="retail-price" name="retail-price" min="0" max="100" step="1" value="<?php echo htmlspecialchars($book['retail_price']); ?>" oninput="this.nextElementSibling.value = this.value">
                    <output><?php echo htmlspecialchars($book['retail_price']); ?></output>
                </div>

                <div class="slider-container">
                    <label for="quantity">Quantity:</label>
                    <input type="range" id="quantity" name="quantity" min="0" max="20" step="1" value="<?php echo htmlspecialchars($book['quantity']); ?>" oninput="this.nextElementSibling.value = this.value">
                    <output><?php echo htmlspecialchars($book['quantity']); ?></output>
                </div>

                <div class="redirect-buttons">
                    <a href="admin_dashboard.php" class="red-btn">Cancel</a>
                    <button type="submit" class="green-btn">Save Form</button>
            </div> 
            </form>
        <?php endif; ?>
    </section>
</main>

<?php include '../includes/footer.inc.php'; ?>