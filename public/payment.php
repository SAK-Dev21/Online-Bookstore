<?php include '../includes/header.inc.php'; ?>

<?php
// Retrieve form data
$full_name = $_POST['full_name'];
$address_line1 = $_POST['address_line1'];
$address_line2 = $_POST['address_line2'];
$city = $_POST['city'];
$postal_code = $_POST['postal_code'];
$country = $_POST['country'];

$postage_cost = $_POST['postage_cost'];
$total_cost = $_POST['total_cost'];
?>

<main>
    <section class="payment">
        <h2>Payment</h2>

        <div class="payment-information">
            <h3>Payment Information</h3>
            <form id="payment-form" action="order_confirmation.php" method="POST">
                <label for="card-number">Card Number</label>
                <input type="text" id="card-number" name="card_number" required>

                <label for="card-name">Name on Card</label>
                <input type="text" id="card-name" name="card_name" required>

                <label for="expiry-date">Expiry Date</label>
                <input type="text" id="expiry-date" name="expiry_date" placeholder="MM/YY" required>

                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" required>

                <!-- Hidden fields to pass shipping and cost information -->
                <input type="hidden" name="full_name" value="<?php echo htmlspecialchars($full_name); ?>">
                <input type="hidden" name="address_line1" value="<?php echo htmlspecialchars($address_line1); ?>">
                <input type="hidden" name="address_line2" value="<?php echo htmlspecialchars($address_line2); ?>">
                <input type="hidden" name="city" value="<?php echo htmlspecialchars($city); ?>">
                <input type="hidden" name="postal_code" value="<?php echo htmlspecialchars($postal_code); ?>">
                <input type="hidden" name="country" value="<?php echo htmlspecialchars($country); ?>">
                <input type="hidden" name="postage_cost" value="<?php echo htmlspecialchars($postage_cost); ?>">
                <input type="hidden" name="total_cost" value="<?php echo htmlspecialchars($total_cost); ?>">
            </form>
        </div>

        <div class="total-cost">
            <h3>Total Cost</h3>
            <p><strong>Items Total:</strong> £<?php echo number_format($total_cost - $postage_cost, 2); ?></p>
            <p><strong>Postage Cost:</strong> £<?php echo number_format($postage_cost, 2); ?></p>
            <p><strong>Total Cost:</strong> £<?php echo number_format($total_cost, 2); ?></p>
        </div>

        <div class="redirect-buttons">
            <a href="checkout.php" class="red-btn">Back to Checkout</a>
            <button type="submit" form="payment-form" class="green-btn">Complete Order</button>
        </div>
    </section>
</main>

<?php include '../includes/footer.inc.php'; ?>