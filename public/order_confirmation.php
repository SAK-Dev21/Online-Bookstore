<?php include '../includes/header.inc.php'; ?>

    <main>
        <section class="order-confirmation">
            <h2>Thank You for Your Order!</h2>
            <div class="order-summary">
                <p>Order Number: <strong>123456</strong></p>
                <p>Order Date: <strong>April 3, 2025</strong></p>
                <p>We appreciate your business! Your order has been confirmed and will be shipped soon.</p>
            </div>
            <div class="order-details">
                <h3>Order Details</h3>
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
                        <tr>
                            <td>Book Title 1</td>
                            <td>1</td>
                            <td>£19.99</td>
                            <td>£19.99</td>
                        </tr>
                        <!-- Repeat similar rows for other items in the order -->
                    </tbody>
                </table>
            </div>
            <div class="shipping-information">
                <h3>Shipping Information</h3>
                <p>Name: John Doe</p>
                <p>Address: 123 Main St, Springfield, IL 62704, UK</p>
            </div>
         
            <div class = "redirect-buttons">
                <a href="shop_all_books.php" class="green-btn">Continue Shopping</a>
                <!-- <button type="submit" class="pay-now-btn">Pay Now</button> -->
            </div>
        </section>
    </main>

<?php include '../includes/footer.inc.php'; ?>