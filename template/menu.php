<?php 
session_start();
$base_url = (basename($_SERVER['PHP_SELF']) == 'index.php') ? '/' : '/pages/';
?>

<link rel="stylesheet" href="../template/director/css/menuopt.css?v=<?php echo time(); ?>">

<nav>
    <ul>
        <li><a href="<?php echo $base_url; ?>dashboard.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>">Dashboard</a></li>
        <li><a href="<?php echo $base_url; ?>invoices.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'invoices.php') ? 'active' : ''; ?>">Invoices</a></li>
        <li class="dropdown">
            <a href="#">Settings</a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo $base_url; ?>account.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'account.php') ? 'active' : ''; ?>">Account</a></li>
                <li><a href="<?php echo $base_url; ?>admin.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'admin.php') ? 'active' : ''; ?>">Admin</a></li>
                <li><a href="https://mail.hostinger.com/">Email</a></li>
            </ul>
        </li>

        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- If user is logged in, display Logout button -->
            <li><a href="logout.php" class="logout">Logout</a></li>
        <?php else: ?>
            <!-- If user is not logged in, display Login button -->
            <li><a href="/login.php" class="login">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>
