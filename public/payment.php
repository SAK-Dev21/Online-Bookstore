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
                    <a href="checkout.html" class="red-btn">Back to Checkout</a>
                    <a href="order_confirmation.html" class="green-btn">Pay Now</a>
                    <!-- <button type="submit" class="pay-now-btn">Pay Now</button> -->
                </div>
            </form>
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