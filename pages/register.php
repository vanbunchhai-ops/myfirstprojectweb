<?php
require_once "../includes/header.inc.php";
require_once "../includes/navbar.inc.php";
?>

<div class="auth-wrapper">
    <div class="auth-card animate-fade-in">
        <div class="auth-header">
            <h2>Create Account</h2>
            <p>Join our community today. It only takes a minute.</p>
        </div>

        <?php if (isset($_GET["error"])): ?>
            <div class="alert alert-danger">
                <?php
                    if ($_GET["error"] == "passwordsdontmatch") echo "Passwords do not match!";
                    elseif ($_GET["error"] == "stmtfailed") echo "Something went wrong. Try again.";
                    elseif ($_GET["error"] == "emailtaken") echo "Email is already registered.";
                ?>
            </div>
        <?php endif; ?>

        <form action="register_process.php" method="POST" class="auth-form">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="fullname" placeholder="Than Rithy" required>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="rithy123" required>
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="name@gmail.com" required>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Min. 8 characters" required>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" placeholder="Repeat password" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
        </form>

        <div class="auth-footer">
            <p>Already have an account? <a href="login.php">Sign in here</a></p>
        </div>
    </div>
</div>

<?php require_once "../includes/footer.inc.php"; ?>