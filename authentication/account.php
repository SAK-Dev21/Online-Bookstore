<?php
session_start();
$page_title = 'Account';
include '../includes/header.inc.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once '../includes/db_connect.inc.php';

// NOTE: The admin code = roberts-full-rank-poland-has. 

// Retrieve all information related to a user's account
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch();

$update_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin_code'])) {
    $admin_code = $_POST['admin_code'];
    if ($admin_code === 'roberts-full-rank-poland-has') {
        $stmt = $pdo->prepare('UPDATE users SET user_type = "admin" WHERE id = :id');
        $stmt->execute(['id' => $user_id]);
        $_SESSION['user_type'] = 'admin';
        $update_message = 'Your account has been updated to admin.';
    } else {
        $update_message = 'Invalid admin code.';
    }
}
?>

<main>
    <section class="account-details">
        <h2>Account Details</h2>
        <?php if (!empty($update_message)) : ?>
            <p><?php echo htmlspecialchars($update_message); ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['username']); ?>" readonly>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>

            <label for="status">Status</label>
            <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($user['user_type']); ?>" readonly>

            <?php if ($user['user_type'] === 'customer') : ?>
                <h3>Upgrade to Admin</h3>
                <label for="admin_code">Enter Admin Code</label>
                <input type="text" id="admin_code" name="admin_code">
                <button type="submit" class = "submit">Submit</button>
            <?php else : ?>
                <a href="../admin/admin_dashboard.php" class="button">Go to Admin Dashboard</a>
            <?php endif; ?>
        </form>
        <form action="logout.php" method="POST" style="margin-top: 20px;">
            <button type="submit" class = "log-out">Log out</button>
        </form>
    </section>
</main>

<?php include '../includes/footer.inc.php'; ?>