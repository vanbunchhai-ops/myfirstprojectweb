<?php include '../includes/header.inc.php'; ?>

<div class="form-container">
    <h2>Register</h2>
    <form action="register_process.php" method="POST">
        <input type="text" name="uid" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="pwd" placeholder="Password" required>
        <input type="password" name="pwd-repeat" placeholder="Repeat Password" required>
        
        <button type="submit" name="submit">Sign Up</button>
    </form>

    <?php
    // Simple error message display
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "passwordsdontmatch") {
            echo "<p class='error'>Passwords do not match!</p>";
        } else if ($_GET["error"] == "emptyinput") {
            echo "<p class='error'>Please fill in all fields!</p>";
        }
    }
    ?>
</div>

<?php include '../includes/footer.inc.php'; ?>