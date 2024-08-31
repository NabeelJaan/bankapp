<?php

session_start();
require_once 'Database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$database = new Database();
$db = $database->getConnection();

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = (float)$_POST['amount'];

    if ($amount > 0) {

        $query = "SELECT balance FROM users WHERE id = :user_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $user['balance'] >= $amount) {

            $new_balance = $user['balance'] - $amount;
            $_SESSION['balance'] -= $amount;
            $update_balance_query = "UPDATE users SET balance = :balance WHERE id = :user_id";
            $stmt = $db->prepare($update_balance_query);
            $stmt->bindParam(':balance', $new_balance, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();

            $log_transaction_query = "INSERT INTO transactions (user_id, amount, type, details) 
                              VALUES (:user_id, :amount, 'Debit', 'Withdraw')";
            $stmt = $db->prepare($log_transaction_query);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
            $stmt->execute();

            header("Location: home.php");
            exit();
        } else {
            echo "<script>alert('Insufficient balance!');</script>";
        }
    } else {
        echo "<script>alert('Please enter a valid amount.');</script>";
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
        <div class="withdraw-box">
            <h3>Withdraw Money</h3>
            <form class="form" method="POST" action="">
                <label for="amount">Amount</label>
                <input type="text" id="amount" name="amount" placeholder="Enter amount to withdraw">
                <button type="submit">Withdraw</button>
            </form>
        </div>
    </section>
</body>

</html>