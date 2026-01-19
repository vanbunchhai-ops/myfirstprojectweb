<?php
require_once "../includes/header.inc.php";
require_once "../includes/navbar.inc.php";
?>

<div class="page-wrapper">
    <main class="main-container">
        <section class="hero-section">
            <div class="container">
                <?php if (isset($_SESSION["user_id"])): ?>
                    <div class="welcome-box animate-fade-in">
                        <span class="status-badge">
                            <span class="dot"></span> Online
                        </span>
                        <h1>Welcome back, <span class="highlight"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>!</h1>
                        <p class="lead-text">You're all set. Manage your tasks or check your recent activity from your dashboard.</p>
                        <div class="cta-group">
                            <a href="profile.php" class="btn btn-primary shadow-sm">View Profile</a>
                            <a href="settings.php" class="btn btn-secondary">Account Settings</a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="welcome-box animate-fade-in">
                        <h1>Manage Your Workflow <br><span class="highlight">With Precision</span></h1>
                        <p class="lead-text">The all-in-one platform for secure data management and streamlined productivity.</p>
                        <div class="cta-group">
                            <a href="login.php" class="btn btn-primary shadow-sm">Get Started</a>
                            <a href="register.php" class="btn btn-outline">Create Free Account</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="container">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="icon-circle">🔒</div>
                    <h3>Secure Data</h3>
                    <p>End-to-end encryption ensures your sensitive information stays private and protected.</p>
                </div>
                <div class="feature-card">
                    <div class="icon-circle">⚡</div>
                    <h3>High Performance</h3>
                    <p>Optimized architecture provides a lag-free experience even under heavy workloads.</p>
                </div>
                <div class="feature-card">
                    <div class="icon-circle">📱</div>
                    <h3>Mobile Ready</h3>
                    <p>Access your dashboard from any device with our fully responsive web interface.</p>
                </div>
            </div>
        </section>
    </main>
</div>

<?php require_once "../includes/footer.inc.php"; ?>