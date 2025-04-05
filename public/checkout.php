<?php include '../includes/header.inc.php'; ?>

    <main>
        <section class="checkout">
            <h2>Checkout</h2>

            <div class="shipping-information">
                <h3>Shipping Information</h3>
                <form>
                    <label for="full-name">Full Name</label>
                    <input type="text" id="full-name" name="full-name" required>
                    
                    <label for="address">City</label>
                    <input type="text" id="address" name="address" required>
                    
                    <label for="city">Postal Code</label>
                    <input type="text" id="city" name="city" required>
                    
                    <label for="state">Address Line 1</label>
                    <input type="text" id="state" name="state" required>
                    
                    <label for="zip-code">Address Line 2</label>
                    <input type="text" id="zip-code" name="zip-code" required>
                    
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" required>
                </form>
            </div>

            <div class="shipping-method">
                <h3>Shipping Method</h3>
                <label>
                    <input type="radio" name="shipping" value="standard" checked> <strong>Standard Shipping</strong> - £3.00
                </label>
                <label>
                    <input type="radio" name="shipping" value="express"> <strong>Express Shipping</strong> - £5.00
                </label>
                <label>
                    <input type="radio" name="shipping" id="rapido"> <strong>Rapido Shipping</strong> - £7.00
                </label>
            </div>

            <div class="order-summary">
                <h3>Order Summary</h3>
                <p><strong>Items Total:</strong> £19.99</p>
                <p><strong>Postage Cost:</strong> £3.00</p>
                <p><strong>Total Cost:</strong> £22.99</p>
            </div>

            <div class = "redirect-buttons">
                <a href="../cart/shopping_cart.php" class="red-btn">Back to Cart</a>
                <a href="payment.php" class="green-btn">Proceed to Payment</a>
            </div>
        </section>
    </main>

<?php include '../includes/footer.inc.php'; ?>