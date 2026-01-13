<?php include '../includes/header.inc.php'; ?>

<h2>Login</h2>
<form action="login_process.php" method="POST">
    <input type="text" name="uid" placeholder="Username/Email" required>
    <input type="password" name="pwd" placeholder="Password" required>
    <button type="submit" name="submit">Log In</button>
</form>

<?php include '../includes/footer.inc.php'; ?>