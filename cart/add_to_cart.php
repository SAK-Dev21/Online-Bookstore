<?php
session_start();
require '../includes/db_connect.inc.php';

$data = json_decode(file_get_contents('php://input'), true);
$isbn_13 = $data['isbn_13'];
$quantity = $data['quantity'];

// Fetch book details from the database
$stmt = $pdo->prepare("SELECT * FROM books WHERE isbn_13 = ?");
$stmt->execute([$isbn_13]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$book) {
    echo json_encode(['success' => false, 'message' => 'Book not found']);
    exit;
}

// Add or update the book in the shopping cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['cart'][$isbn_13])) {
    $_SESSION['cart'][$isbn_13]['quantity'] += $quantity;
} else {
    $_SESSION['cart'][$isbn_13] = [
        'title' => $book['title'],
        'thumbnail' => $book['thumbnail'],
        'retail_price' => $book['retail_price'],
        'quantity' => $quantity
    ];
}

// Calculate total items and total cost
$total_items = array_sum(array_column($_SESSION['cart'], 'quantity'));
$total_cost = array_sum(array_map(function($book) {
    return $book['quantity'] * $book['retail_price'];
}, $_SESSION['cart']));

echo json_encode([
    'success' => true,
    'total_items' => $total_items,
    'total_cost' => $total_cost
]);