<!-- menu.php -->
<?php include 'helper.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>
<header>
    <nav class="menu">
        <ul>
            <li><a href="home.php" class="<?= basename($_SERVER['PHP_SELF']) == 'home.php' ? 'active' : '' ?>"><i class="icon">&#8962;</i> Home</a></li>
            <li><a href="deposit.php" class="<?= basename($_SERVER['PHP_SELF']) == 'deposit.php' ? 'active' : '' ?>"><i class="icon">&#128179;</i> Deposit</a></li>
            <li><a href="withdraw.php" class="<?= basename($_SERVER['PHP_SELF']) == 'withdraw.php' ? 'active' : '' ?>"><i class="icon">&#128184;</i> Withdraw</a></li>
            <li><a href="transfer.php" class="<?= basename($_SERVER['PHP_SELF']) == 'transfer.php' ? 'active' : '' ?>"><i class="icon">&#8644;</i> Transfer</a></li>
            <li><a href="statement.php" class="<?= basename($_SERVER['PHP_SELF']) == 'statement.php' ? 'active' : '' ?>"><i class="icon">&#128196;</i> Statement</a></li>
            <li><a href="logout.php" class="<?= basename($_SERVER['PHP_SELF']) == 'logout.php' ? 'active' : '' ?>"><i class="icon">&#128682;</i> Logout</a></li>
        </ul>
    </nav>
</header>