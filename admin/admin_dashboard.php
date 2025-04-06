<?php
session_start();
$page_title = 'Admin Dashboard';
include '../includes/header.inc.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: login.php');
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
            <a href="add-book.php" class="button">Add New Book</a>
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
                    <th>Trade Price</th>
                    <th>Retail Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><img src="<?php echo htmlspecialchars($book['thumbnail']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>" width="50"></td>
                        <td><?php echo htmlspecialchars($book['title']); ?></td>
                        <td><?php echo htmlspecialchars($book['isbn_13']); ?></td>
                        <td><?php echo htmlspecialchars($book['quantity']); ?></td>
                        <td><?php echo htmlspecialchars($book['author']); ?></td>
                        <td><?php echo htmlspecialchars($book['publication_date']); ?></td>
                        <td><?php echo htmlspecialchars($book['trade_price']); ?></td>
                        <td><?php echo htmlspecialchars($book['retail_price']); ?></td>
                        <td><?php echo htmlspecialchars($book['description']); ?></td>
                        <td>
                            <!-- <button onclick="openEditForm(<?php echo htmlspecialchars($book['id']); ?>)" class="button">Manage</button> -->
                            <button >Manage</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>

<script>
function openEditForm(id) {
    window.location.href = 'edit-book.php?id=' + id;
}
</script>

<?php include '../includes/footer.inc.php'; ?>