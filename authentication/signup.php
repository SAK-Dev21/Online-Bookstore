<?php include '../includes/header.inc.php'; ?>

<main>
    <section class="create-account">
        <h2>Create Account</h2>
        <form action="create_account.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            
            <label for="role">Role</label>
            <select name="role" id="role">
                <option value="Customer">Customer</option>
                <option value="Admin">Admin</option>
            </select>

            <label for="admin-code">Enter Admin Code (Optional)</label>
            <input type="text" id="admin-code" name="admin-code">

            <button type="submit">Create Account</button>
        </form>
    </section>
</main>

<?php include '../includes/footer.php'; ?>