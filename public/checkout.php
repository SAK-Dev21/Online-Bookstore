<?php include '../includes/header.inc.php'; ?>

<?php
require '../includes/db_connect.inc.php';

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total_cost = 0;
$postage_cost = 3;
$out_of_stock = false;

foreach ($cart as $isbn_13 => $book) {
    $stmt = $pdo->prepare("SELECT quantity FROM books WHERE isbn_13 = ?");
    $stmt->execute([$isbn_13]);
    $stock = $stmt->fetch(PDO::FETCH_ASSOC)['quantity'];

    if ($book['quantity'] > $stock) {
        $cart[$isbn_13]['out_of_stock'] = true;
        $out_of_stock = true;
    } else {
        $cart[$isbn_13]['out_of_stock'] = false;
        $total_cost += $book['quantity'] * $book['retail_price'];
    }
}

$postage_cost += max(0, count($cart) - 1);
$total_cost += $postage_cost;
?>

<main>
    <section class="checkout">
        <h2>Checkout</h2>

        <?php if ($out_of_stock) { ?>
            <p>Some items are out of stock. Please adjust your quantities.</p>
        <?php } else { ?>
            <div class="order-summary">
                <h3>Order Summary</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Book Title</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Stock Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $isbn_13 => $book) { ?>
                            <tr>
                                <td><img src="<?php echo htmlspecialchars($book['thumbnail']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>"></td>
                                <td><?php echo htmlspecialchars($book['title']); ?></td>
                                <td>£<?php echo number_format($book['retail_price'], 2); ?></td>
                                <td><?php echo htmlspecialchars($book['quantity']); ?></td>
                                <td>£<?php echo number_format($book['quantity'] * $book['retail_price'], 2); ?></td>
                                <td><?php echo $book['out_of_stock'] ? 'Out of Stock' : 'In Stock'; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="shipping-information">
                <h3>Shipping Information</h3>
                <form id="checkout-form" action="payment.php" method="POST">
                    <label for="full-name">Full Name</label>
                    <input type="text" id="full-name" name="full_name" required>

                    <label for="address-line1">Address Line 1</label>
                    <input type="text" id="address-line1" name="address_line1" required>

                    <label for="address-line2">Address Line 2</label>
                    <input type="text" id="address-line2" name="address_line2" required>

                    <label for="city">City</label>
                    <input type="text" id="city" name="city" required>

                    <label for="postal-code">Postal Code</label>
                    <input type="text" id="postal-code" name="postal_code" required>

                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" required>

                    <!-- Hidden fields to pass cost information -->
                    <input type="hidden" name="postage_cost" id="postage_cost_input" value="<?php echo number_format($postage_cost, 2); ?>">
                    <input type="hidden" name="total_cost" id="total_cost_input" value="<?php echo number_format($total_cost, 2); ?>">
                </form>
            </div>

            <div class="shipping-method">
                <h3>Shipping Method</h3>
                <label>
                    <input type="radio" name="shipping" value="standard" data-cost="3.00" checked> <strong>Standard Shipping</strong> - £3.00
                </label>
                <label>
                    <input type="radio" name="shipping" value="express" data-cost="5.00"> <strong>Express Shipping</strong> - £5.00
                </label>
                <label>
                    <input type="radio" name="shipping" value="rapido" data-cost="7.00"> <strong>Rapido Shipping</strong> - £7.00
                </label>
            </div>

            <div class="total-cost">
                <h3>Total Cost</h3>
                <p><strong>Items Total:</strong> £<span id="items-total"><?php echo number_format($total_cost - $postage_cost, 2); ?></span></p>
                <p><strong>Postage Cost:</strong> £<span id="postage-cost"><?php echo number_format($postage_cost, 2); ?></span></p>
                <p><strong>Total Cost:</strong> £<span id="total-cost"><?php echo number_format($total_cost, 2); ?></span></p>
            </div>

            <div class="redirect-buttons">
                <a href="../cart/shopping_cart.php" class="red-btn">Back to Cart</a>
                <button type="submit" form="checkout-form" class="green-btn">Proceed to Payment</button>
            </div>
        <?php } ?>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const shippingOptions = document.querySelectorAll('input[name="shipping"]');
    const postageCostElement = document.getElementById('postage-cost');
    const totalCostElement = document.getElementById('total-cost');
    const itemsTotal = parseFloat(document.getElementById('items-total').textContent);

    shippingOptions.forEach(option => {
        option.addEventListener('change', () => {
            const shippingCost = parseFloat(option.getAttribute('data-cost'));
            postageCostElement.textContent = shippingCost.toFixed(2);
            totalCostElement.textContent = (itemsTotal + shippingCost).toFixed(2);

            // Update hidden fields in form
            document.getElementById('postage_cost_input').value = shippingCost.toFixed(2);
            document.getElementById('total_cost_input').value = (itemsTotal + shippingCost).toFixed(2);
        });
    });
});
</script>

<?php include '../includes/footer.inc.php'; ?>