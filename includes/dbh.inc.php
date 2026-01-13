<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "my_testing_db"; // Make sure this database exists in phpMyAdmin

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}