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
                <a href="../cart/shopping_cart.html" class="red-btn">Back to Cart</a>
                <a href="payment.html" class="green-btn">Proceed to Payment</a>
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