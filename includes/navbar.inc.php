<nav class="navbar">
    <div class="nav-links">
        <a href="Index.php">Home</a>

        <div class="dropdown">
            <button class="dropbtn">
                <?php echo isset($_SESSION['useruid']) ? $_SESSION['useruid'] : "Account"; ?>
                <i class="arrow down"></i>
            </button>
            <div class="dropdown-content">
                <?php if (isset($_SESSION['userid'])): ?>
                    <a href="profile.php">Profile</a>
                    <a href="../includes/logout.inc.php">Logout</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>