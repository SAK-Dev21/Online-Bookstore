<?php
include '../includes/header.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$page_title = "Create Account";
require_once '../includes/db_connect.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $admin_code = $_POST['admin_code'] ?? '';
    $user_type = 'customer'; // Default user type
    $special_admin_code_password = 'roberts-full-rank-poland-has';

    $errors = [];

    // Basic error handling

    // If empty input fields
    if (empty($username) || empty($email) || empty($_POST['password'])) {
        $errors[] = "All fields are required.";
    }
    // If email is inputted with incorrect format (no @gmail.com for instance)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if ($admin_code === $special_admin_code_password) {
        $user_type = 'admin';
    }
    // Check if username or email already exists
    $query = "SELECT * FROM users WHERE username = :username OR email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['username' => $username, 'email' => $email]);
    if ($stmt->rowCount() > 0) {
        $errors[] = "Username or email already taken.";
    }

    // If input passes all error checks...
    if (empty($errors)) {
        // Insert user into database
        $query = "INSERT INTO users (username, email, password, user_type) VALUES (:username, :email, :password, :user_type)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'user_type' => $user_type
        ]);

        // Redirect to login page
        header("Location: login.php?signup=success");
        exit();
    } else {
        // Store errors in session and redirect back to signup form
        session_start();
        $_SESSION['signup_errors'] = $errors;
        $_SESSION['signup_data'] = ['username' => $username, 'email' => $email];
        header("Location: signup.php");
        exit();
    }
}
?>

<main>
    <section class="create-account">
        <h2>Create Account</h2>
        <?php if (!empty($_SESSION['signup_errors'])): ?>
            <div class="errors">
                <?php foreach ($_SESSION['signup_errors'] as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
                <?php unset($_SESSION['signup_errors']); ?>
            </div>
        <?php endif; ?>
        <form action="signup.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required value="<?php echo htmlspecialchars($_SESSION['signup_data']['username'] ?? ''); ?>">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_SESSION['signup_data']['email'] ?? ''); ?>">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="admin_code">Admin Code (Optional)</label>
            <input type="text" id="admin_code" name="admin_code">

            <button type="submit">Create Account</button>
        </form>
    </section>
</main>

<?php include '../includes/footer.inc.php'; ?>