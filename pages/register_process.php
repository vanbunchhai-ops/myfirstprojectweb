<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once "../includes/dbh.inc.php";

    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email    = $_POST["email"];
    $pwd      = $_POST["password"];
    $pwdRepeat = $_POST["confirmpassword"];

    // 1. Basic Validation: Do passwords match?
    if ($pwd !== $pwdRepeat) {
        header("Location: ../register.php?error=passwordsdontmatch");
        exit();
    }

    // 2. Prepare the SQL statement (Secure Way)
    $sql = "INSERT INTO tbl_users (fullname, username, email, password) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?error=stmtfailed");
        exit();
    }

    // 3. Hash the password
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    // 4. Bind parameters and execute
    mysqli_stmt_bind_param($stmt, "ssss", $fullname, $username, $email, $hashedPwd);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("Location: login.php?signup=success");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: ../register.php");
    exit();
}