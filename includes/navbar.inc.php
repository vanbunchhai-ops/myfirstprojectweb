<nav class="main-nav">
    <div class="nav-container">
        <a href="index.php" class="logo">Home</a>

        <div class="nav-right">
            <?php if (isset($_SESSION["user_id"])): ?>
                <div class="user-dropdown">
                    <button class="user-btn" type="button">
                        <span class="user-name">Welcome, <?= htmlspecialchars($_SESSION["user_name"] ?? 'User') ?></span>
                        <svg class="dropdown-icon" viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                            <path d="M7 10l5 5 5-5z"/>
                        </svg>
                    </button>

                    <div class="dropdown-menu">
                        <a href="profile.php" class="dropdown-item">My Profile</a>
                        <a href="logout.php" class="dropdown-item logout">Logout</a>
                    </div>
                </div>

            <?php else: ?>
                <div class="auth-buttons">
                    <a href="login.php"    class="btn btn-login">Login</a>
                    <a href="register.php" class="btn btn-register">Register</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>