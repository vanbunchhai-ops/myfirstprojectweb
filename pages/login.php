<?php
require_once "../includes/header.inc.php";
require_once "../includes/navbar.inc.php";
require_once "../includes/dbh.inc.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];

    // Search for user by email
    $sql = "SELECT * FROM tbl_users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Verify password against hashed password in DB
            $pwdCheck = password_verify($password, $row['password']);

            if ($pwdCheck === false) {
                $error = "Invalid password.";
            } elseif ($pwdCheck === true) {
                // Start session and store user data
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["username"] = $row['username'];
                
                header("Location: index.php?login=success");
                exit();
            }
        } else {
            $error = "No user found with that email.";
        }
    }
}
?>

<div class="auth-wrapper">
    <div class="auth-card animate-fade-in">
        <div class="auth-header">
            <h2>Welcome Back</h2>
            <p>Please enter your details to sign in.</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" class="auth-form">
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="name@company.com" required>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </form>

        <div class="auth-footer">
            <p>Don't have an account? <a href="register.php">Create one for free</a></p>
        </div>
    </div>
</div>

<?php require_once "../includes/footer.inc.php"; ?>