<?php
session_start();
$page_title = 'Admin Dashboard';
include '../includes/header.inc.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: ../authentication/login.php');
    exit();
}

require_once '../includes/db_connect.inc.php';

// Retrieve all books from the 'books' table
$query = 'SELECT * FROM books';
$stmt = $pdo->prepare($query);
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
    <section class="admin-dashboard">
        <h2>Inventory</h2>
        <div class="add-stock-container">
            <a href="add_book.php" class="button">Add Stock</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Thumbnail</th>
                    <th>Title</th>
                    <th>ISBN-13</th>
                    <th>Quantity Available</th>
                    <th>Author</th>
                    <th>Publication Date</th>
                    <th>Trade Price (£)</th>
                    <th>Retail Price (£)</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><img src="<?php echo htmlspecialchars($book['thumbnail']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>" width="50" onerror="this.onerror=null; this.src='../assets/images/default_thumbnail.jpg';"></td>
                        <td><?php echo htmlspecialchars($book['title']); ?></td>
                        <td><?php echo htmlspecialchars($book['isbn_13']); ?></td>
                        <td><?php echo htmlspecialchars($book['quantity']); ?></td>
                        <td><?php echo htmlspecialchars($book['author']); ?></td>
                        <td><?php echo htmlspecialchars($book['publication_date']); ?></td>
                        <td><?php echo htmlspecialchars($book['trade_price']); ?></td>
                        <td><?php echo htmlspecialchars($book['retail_price']); ?></td>
                        <td><?php echo htmlspecialchars($book['description']); ?></td>
                        <td>
                            <a href="edit_book.php?isbn_13=<?php echo htmlspecialchars($book['isbn_13']); ?>" class="button">Manage</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>

<?php include '../includes/footer.inc.php'; ?>