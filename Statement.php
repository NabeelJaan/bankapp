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

$query = "SELECT * FROM transactions WHERE user_id = :user_id ORDER BY created_at ASC";
$stmt = $db->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();

$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statement of Account</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php include 'menu.php'; ?>
    <section class="main">
        <div class="container">
            <h2>Statement of Account</h2>
            <div class="table-main">
            <table class="account-table">
                <thead class="thead">
                    <tr>
                        <th>#</th>
                        <th>DateTime</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Details</th>
                        <!-- <th>Balance</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through transactions and generate table rows
                    $counter = 1;
                    foreach ($transactions as $transaction) {
                        // Format the date and time
                        $datetime = date('d-m-Y<br>H:i A', strtotime($transaction['created_at']));
                        // Format the amount and balance
                        $amount = number_format($transaction['amount'], 2);
                        // $balance = number_format($transaction['balance'], 2);

                        echo "<tr>
                            <td>{$counter}</td>
                            <td>{$datetime}</td>
                            <td>{$amount}</td>
                            <td>{$transaction['type']}</td>
                            <td>{$transaction['details']}</td>
                        </tr>";
                        $counter++;
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </section>
</body>

</html>