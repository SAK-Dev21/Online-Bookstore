<?php
session_start();
require '../includes/db_connect.inc.php';

$data = json_decode(file_get_contents('php://input'), true);
$isbn_13 = $data['isbn_13'];
$quantity = $data['quantity'];

if (isset($_SESSION['cart'][$isbn_13])) {
    $_SESSION['cart'][$isbn_13]['quantity'] = $quantity;
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