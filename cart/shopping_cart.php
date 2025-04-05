<?php include '../includes/header.inc.php'; ?>

    <main>
        <section class="shopping-cart">
            <h2>Shopping Cart</h2>
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="" alt="Book 1" class="thumbnail">
                            <span>Book Title 1</span>
                        </td>
                        <td>1</td>
                        <td>£19.99</td>
                        <td>£19.99</td>
                        <td><button class="remove-item">Remove</button></td>
                    </tr>
                    <!-- Repeat similar rows for other items in the cart -->
                </tbody>
            </table>
            <div class="cart-total">
                <p><strong>Total:</strong> £19.99</p>
            </div>
            <div class = "redirect-buttons">
                <a href="../public/home.php" class="red-btn">Continue Shopping</a>
                <a href="../public/checkout.php" class="green-btn">Proceed to Checkout</a>
            </div>
        </section>
    </main>

<?php include '../includes/footer.inc.php'; ?>