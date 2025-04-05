<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
</head>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../public/index.html">Home</a></li>
                <li><a href="../public/shop_all_books.html">Shop All Books</a></li>
                <li><a href="../authentication/sign-in.html">Account</a></li>
                <li><a href="../cart/shopping_cart.html" id="cart-icon"><i class="fas fa-shopping-cart"></i></a></li>
            </ul>
        </nav>
    </header>

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
                <a href="shop_all_books.html" class="green-btn">Continue Shopping</a>
                <!-- <button type="submit" class="pay-now-btn">Pay Now</button> -->
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>Customer Support</h3>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Shipping & Returns</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Our Policies</h3>
                <ul>
                    <li><a href="#">Terms and Conditions</a></li>
                    <li><a href="#">Refund Policy</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Online Bookstore. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>