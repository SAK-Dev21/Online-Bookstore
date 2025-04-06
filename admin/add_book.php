<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage stock levels</title>
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../public/index.php">Home</a></li>
                <li><a href="../public/shop_all_books.html">Shop All Books</a></li>
                <li><a href="../authentication/sign-in.html">Account</a></li>
                <li><a href="../cart/shopping_cart.html" id="cart-icon"><i class="fas fa-shopping-cart"></i></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="add-stock">
            <h2>Add Stock</h2>
            <form>
                <div class="file-input">
                    <label for="cover-image">Cover Image:</label>
                    <div class="file-box">
                        <p>No file selected</p>
                        <button type="button" onclick="document.getElementById('cover-image').click()">Select file</button>
                    </div>
                    <input type="file" id="cover-image" name="cover-image" accept="image/*" required onchange="document.querySelector('.file-box p').textContent = this.files[0].name">
                </div>

                <label for="isbn">ISBN-13:</label>
                <input type="text" id="isbn" name="isbn" required>
                
                <label for="book-name">Book Title:</label>
                <input type="text" id="book-name" name="book-name" required>
                
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" required>
                
                <label for="publication-date">Publication Date:</label>
                <input type="date" id="publication-date" name="publication-date" required>

                <label for="description">Book Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>
                
                <div class="slider-container">
                    <label for="trade-price">Trade Price (£):</label>
                    <input type="range" id="trade-price" name="trade-price" min="0" max="100" step="1" value="0" oninput="this.nextElementSibling.value = this.value">
                    <output>0</output>
                </div>
                
                <div class="slider-container">
                    <label for="retail-price">Retail Price (£):</label>
                    <input type="range" id="retail-price" name="retail-price" min="0" max="100" step="1" value="0" oninput="this.nextElementSibling.value = this.value">
                    <output>0</output>
                </div>
                
                <div class="slider-container">
                    <label for="quantity">Quantity:</label>
                    <input type="range" id="quantity" name="quantity" min="0" max="20" step="1" value="0" oninput="this.nextElementSibling.value = this.value">
                    <output>0</output>
                </div>
                
                <!-- <div class="form-actions">
                    <button type="button" class="cancel-btn">Cancel</button>
                    <button type="submit" class="submit-btn">Save Form</button>
                </div> -->

                <div class = "redirect-buttons">
                    <a href="stock_levels.html" class="red-btn">Cancel</a>
                    <a href="stock_levels.html" class="green-btn">Save Form</a>
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