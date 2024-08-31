<?php
require_once 'Transaction.php';
require_once 'User.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$database = new Database();
$db = $database->getConnection();

$transaction = new Transaction($db);
$user = new User($db);

if ($_POST) {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $amount = filter_var($_POST['amount'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !is_numeric($amount) || $amount <= 0) {
        echo "Invalid input.";
        exit;
    }

    $transaction->user_id = $_SESSION['user_id'];
    $transaction->amount = $amount;
    $transaction->type = "Debit";
    $transaction->details = "Transfer to " . $email;

    if ($transaction->createTransaction()) {
        $_SESSION['balance'] -= $amount;

        $user->email = $email;
        if ($user->findByEmail()) {
            $user->balance += $amount;

            if ($user->updateBalance()) {
                $transaction->user_id = $user->id;
                $transaction->type = "Credit";
                $transaction->details = "Transfer from " . $_SESSION['name'];
                $transaction->createTransaction();

                header("Location: home.php");
                exit();
            } else {
                echo "Failed to update recipient's balance.";
            }
        } else {
            echo "Recipient not found.";
        }
    } else {
        echo "Failed to create transaction.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php include 'menu.php'; ?>
    <section class="main">
        <div class="transfer-form">
            <h2>Transfer Money</h2>
            <form class="form" action="" method="post">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" id="amount" name="amount" placeholder="Enter amount to transfer" step="0.01" required>
                </div>
                <button type="submit">Transfer</button>
            </form>
        </div>
    </section>
</body>

</html>