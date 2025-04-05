<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Bookstore</title>
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../public/home.php">Home</a></li>
                <li><a href="../public/shop_all_books.php">Shop All Books</a></li>
                <li><a href="../authentication/account.php">Account</a></li>
                <li><a href="../cart/shopping_cart.php" id="cart-icon"><i class="fas fa-shopping-cart"></i></a></li>
                <?php
                if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') {
                    echo '<li><a href="../admin/admin_dashboard.php">Admin Dashboard</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>