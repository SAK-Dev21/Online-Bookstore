<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
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
                <a href="../public/index.html" class="red-btn">Continue Shopping</a>
                <a href="../public/checkout.html" class="green-btn">Proceed to Checkout</a>
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