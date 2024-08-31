<?php
require_once 'Transaction.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
$database = new Database();
$db = $database->getConnection();

$transaction = new Transaction($db);

if ($_POST) {
    $transaction->user_id = $_SESSION['user_id'];
    $transaction->amount = $_POST['amount'];
    $transaction->type = "Credit";
    $transaction->details = "Deposit";

    if ($transaction->createTransaction()) {
        $_SESSION['balance'] += $transaction->amount;
        header("Location: home.php");
        exit;
    } else {
        echo "Failed to deposit.";
    }
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
    <section class="main">
        <div class="deposit-box">
            <h3>Deposit Money</h3>
            <form class="form" method="POST" action="">
                <label for="amount">Amount</label>
                <input type="text" id="amount" name="amount" placeholder="Enter amount to deposit">
                <button type="submit">Deposit</button>
            </form>
        </div>
    </section>
</body>

</html>