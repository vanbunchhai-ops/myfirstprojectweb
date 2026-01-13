<?php
if (isset($_POST['submit'])) {
    require '../includes/dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    // 1. Check if any fields are empty
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("location: register.php?error=emptyinput");
        exit();
    }

    // 2. Check if passwords match
    if ($password !== $passwordRepeat) {
        header("location: register.php?error=passwordsdontmatch");
        exit();
    }

    // 3. If everything is fine, proceed to hash and insert
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (usersUid, usersEmail, usersPwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);
        header("location: login.php?error=none");
        exit();
    }
} else {
    header("location: register.php");
    exit();
}