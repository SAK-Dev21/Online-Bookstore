<?php include '../includes/header.inc.php'; ?>

    <main>
        <section class="payment">
            <h2>Payment Information</h2>
            <br>
            <form class="payment-form">
                <label for="card-name">Name on Card:</label>
                <input type="text" id="card-name" name="card-name" required>
                
                <label for="card-number">Card Number:</label>
                <input type="text" id="card-number" name="card-number" required>
                
                <label for="expiry-date">Expiry Date:</label>
                <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YY" required>
                
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" required>
                
                <div class = "redirect-buttons">
                    <a href="checkout.php" class="red-btn">Back to Checkout</a>
                    <a href="order_confirmation.php" class="green-btn">Pay Now</a>
                    <!-- <button type="submit" class="pay-now-btn">Pay Now</button> -->
                </div>
            </form>
        </section>
    </main>

<?php include '../includes/footer.inc.php'; ?>