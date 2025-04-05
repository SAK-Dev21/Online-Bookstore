<?php include '../includes/header.inc.php'; ?>

<main>
    <section class="login">
        <h2>Login to account</h2>
        <form action="sign_in.php" method="POST">
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