<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bank</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php include 'menu.php'; ?>
    <section class="home">
        <div class="container">
            <div class="dashboard">
                <h2>Welcome John Doe</h2>
                <div class="info">
                    <p>YOUR ID</p>
                    <span><?php echo $_SESSION['email']; ?></span>
                </div>
                <div class="info">
                    <p>YOUR BALANCE</p>
                    <span><?php echo $_SESSION['balance']; ?></span>
                </div>
            </div>
        </div>
    </section>
</body>

</html>