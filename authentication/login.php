<?php
include '../includes/header.inc.php'; 
require_once '../includes/db_connect.inc.php';
$page_title = 'Sign In';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user from database
    $query = 'SELECT * FROM users WHERE email = :email';
    $stmt = $pdo->prepare($query);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    // Verify password
    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['username'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_type'] = $user['user_type'];

        // Redirect to account page
        header("Location: account.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<main>
    <section class="login">
        <h2>Login to account</h2>
        <?php if (isset($error)) {
            echo "<p class='error'>$error</p>"; 
        } ?>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Sign In</button>
        </form>
        <br>
        <p>Don't have an account? <a href="../authentication/signup.php">Create one here</a>.</p>
    </section>
</main>

<?php include '../includes/footer.inc.php'; ?>