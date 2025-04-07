<?php include '../includes/header.inc.php'; ?>

<?php
require '../includes/db_connect.inc.php';

// Retrieve form data
$full_name = $_POST['full_name'];
$address_line1 = $_POST['address_line1'];
$address_line2 = $_POST['address_line2'];
$city = $_POST['city'];
$postal_code = $_POST['postal_code'];
$country = $_POST['country'];
$card_number = $_POST['card_number'];
$card_name = $_POST['card_name'];
$expiry_date = $_POST['expiry_date'];
$cvv = $_POST['cvv'];
$postage_cost = $_POST['postage_cost'];
$total_cost = $_POST['total_cost'];

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Adjust stock levels
foreach ($cart as $isbn_13 => $book) {
    if (!isset($book['out_of_stock']) || !$book['out_of_stock']) {
        $stmt = $pdo->prepare("UPDATE books SET quantity = quantity - ? WHERE isbn_13 = ?");
        $stmt->execute([$book['quantity'], $isbn_13]);
    }
}

// Clear the cart
unset($_SESSION['cart']);
?>

<main>
    <section class="order-confirmation">
        <h2>Order Confirmation</h2>

        <div class="order-details">
            <h3>Order Details</h3>
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($full_name); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($address_line1); ?>, <?php echo htmlspecialchars($address_line2); ?>, <?php echo htmlspecialchars($city); ?>, <?php echo htmlspecialchars($postal_code); ?>, <?php echo htmlspecialchars($country); ?></p>
        </div>

        <div class="payment-details">
            <h3>Payment Details</h3>
            <p><strong>Card Number:</strong> **** **** **** <?php echo substr(htmlspecialchars($card_number), -4); ?></p>
            <p><strong>Name on Card:</strong> <?php echo htmlspecialchars($card_name); ?></p>
            <p><strong>Expiry Date:</strong> <?php echo htmlspecialchars($expiry_date); ?></p>
        </div>

        <div class="order-summary">
            <h3>Order Summary</h3>
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $isbn_13 => $book) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($book['title']); ?></td>
                            <td><?php echo htmlspecialchars($book['quantity']); ?></td>
                            <td>£<?php echo number_format($book['retail_price'], 2); ?></td>
                            <td>£<?php echo number_format($book['quantity'] * $book['retail_price'], 2); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <p><strong>Items Total:</strong> £<?php echo number_format($total_cost - $postage_cost, 2); ?></p>
            <p><strong>Postage Cost:</strong> £<?php echo number_format($postage_cost, 2); ?></p>
            <p><strong>Total Cost:</strong> £<?php echo number_format($total_cost, 2); ?></p>
        </div>

        <div class="redirect-buttons">
            <a href="../public/home.php" class="green-btn">Continue Shopping</a>
        </div>
    </section>
</main>

<?php include '../includes/footer.inc.php'; ?>