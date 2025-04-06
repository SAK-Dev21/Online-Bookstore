<?php
include '../includes/header.inc.php';
require_once '../includes/db_connect.inc.php';

$book = [
    'id' => '',
    'thumbnail' => '',
    'isbn_13' => '',
    'title' => '',
    'author' => '',
    'publication_date' => '',
    'description' => '',
    'trade_price' => 0,
    'retail_price' => 0,
    'quantity' => 0
];

$isEdit = false;
$error = '';

if (isset($_GET['id'])) {
    $isEdit = true;
    $query = 'SELECT * FROM books WHERE id = :id';
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $_GET['id']]);
    $book = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookId = $_POST['id'];
    $thumbnail = $_FILES['cover-image']['name'];
    $isbn_13 = $_POST['isbn'];
    $title = $_POST['book-name'];
    $author = $_POST['author'];
    $publication_date = $_POST['publication-date'];
    $description = $_POST['description'];
    $trade_price = $_POST['trade-price'];
    $retail_price = $_POST['retail-price'];
    $quantity = $_POST['quantity'];

    // Check for duplicate ISBN-13
    $query = 'SELECT COUNT(*) FROM books WHERE isbn_13 = :isbn_13';
    $stmt = $pdo->prepare($query);
    $stmt->execute(['isbn_13' => $isbn_13]);
    $count = $stmt->fetchColumn();

    if ($count > 0 && !$isEdit) {
        $error = 'A book with this ISBN-13 already exists.';
    } else {
        if ($isEdit) {
            $query = 'UPDATE books SET thumbnail = :thumbnail, isbn_13 = :isbn_13, title = :title, author = :author, publication_date = :publication_date, description = :description, trade_price = :trade_price, retail_price = :retail_price, quantity = :quantity WHERE id = :id';
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                'thumbnail' => $thumbnail,
                'isbn_13' => $isbn_13,
                'title' => $title,
                'author' => $author,
                'publication_date' => $publication_date,
                'description' => $description,
                'trade_price' => $trade_price,
                'retail_price' => $retail_price,
                'quantity' => $quantity,
                'id' => $bookId
            ]);
        } else {
            $query = 'INSERT INTO books (thumbnail, isbn_13, title, author, publication_date, description, trade_price, retail_price, quantity) VALUES (:thumbnail, :isbn_13, :title, :author, :publication_date, :description, :trade_price, :retail_price, :quantity)';
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                'thumbnail' => $thumbnail,
                'isbn_13' => $isbn_13,
                'title' => $title,
                'author' => $author,
                'publication_date' => $publication_date,
                'description' => $description,
                'trade_price' => $trade_price,
                'retail_price' => $retail_price,
                'quantity' => $quantity
            ]);
        }

        header('Location: admin_dashboard.php');
        exit();
    }
}
?>

<main>
    <section class="add-book">
        <h2><?php echo $isEdit ? 'Edit' : 'Add'; ?> Book</h2>
        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($book['id']); ?>">

            <div class="file-input">
                <label for="cover-image">Thumbnail image:</label>
                <div class="file-box">
                    <p><?php echo htmlspecialchars($book['thumbnail']) ?: 'No file selected'; ?></p>
                    <button type="button" onclick="document.getElementById('cover-image').click()">Select file</button>
                </div>
                <input type="file" id="cover-image" name="cover-image" accept="image/*" required onchange="document.querySelector('.file-box p').textContent = this.files[0].name">
            </div>

            <label for="isbn">ISBN-13:</label>
            <input type="text" id="isbn" name="isbn" required value="<?php echo htmlspecialchars($book['isbn_13']); ?>">

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
    </section>
</main>

<?php include '../includes/footer.inc.php'; ?>