<?php include '../includes/header.inc.php'; ?>

<h1>Welcome to the Homepage</h1>
<?php 
    if (isset($_SESSION['useruid'])) {
        echo "<p>Hello, " . $_SESSION['useruid'] . "!</p>";
    }
?>

<?php include '../includes/footer.inc.php'; ?>