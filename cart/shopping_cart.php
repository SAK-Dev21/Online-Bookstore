<?php
session_start();
include '../includes/header.inc.php';

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total_cost = array_sum(array_map(function($book) {
    return $book['quantity'] * $book['retail_price'];
}, $cart));
?>

<main>
    <section class="shopping-cart">
        <h2>Shopping Cart</h2>

        <?php if (empty($cart)) { ?>
            <p>Your cart is empty.</p>
        <?php } else { ?>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $isbn_13 => $book) { ?>
                        <tr>
                            <td>
                                <img src="<?php echo htmlspecialchars($book['thumbnail']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
                            </td>
                            <td>
                                <p><?php echo htmlspecialchars($book['title']); ?></p>
                                <br>
                                <p>£<?php echo htmlspecialchars($book['retail_price']); ?></p>
                            </td>
                            <td>
                                <div class="quantity">
                                    <button class="decrease" data-id="<?php echo htmlspecialchars($isbn_13); ?>">-</button>
                                    <input type="number" data-id="<?php echo htmlspecialchars($isbn_13); ?>" value="<?php echo htmlspecialchars($book['quantity']); ?>" min="1" max="<?php echo htmlspecialchars($book['quantity']); ?>">
                                    <button class="increase" data-id="<?php echo htmlspecialchars($isbn_13); ?>">+</button>
                                </div>
                            </td>
                            <td>£<?php echo htmlspecialchars($book['quantity'] * $book['retail_price']); ?></td>
                            <td><button class="delete-from-cart" data-id="<?php echo htmlspecialchars($isbn_13); ?>">Delete</button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br>
            <div class="readjust">
                <h3>Estimated Total: £<?php echo number_format($total_cost, 2); ?></h3>
            </div>
            <div class="redirect-buttons">
                <a href="../public/home.php" class="red-btn">Continue Shopping</a>
                <button id="empty-cart" class="red-btn">Empty Cart</button>
                <a href="../public/checkout.php" class="green-btn">Proceed to Checkout</a>
            </div>
        <?php } ?>
    </section>
</main>

<!-- <script src="../assets/js/scripts.js"></script> -->
<script src="../assets/js/cart.js"></script>
<?php include '../includes/footer.inc.php'; ?>