<?php
include 'helper.php';
require_once 'User.php';

if (isset($_GET['token'])) {
    $token = htmlspecialchars($_GET['token']);

    $database = new Database();
    $db = $database->getConnection();

    $query = "UPDATE users SET is_verified = 1 WHERE verification_token = :token";

    $stmt = $db->prepare($query);
    $stmt->bindParam(':token', $token);

    if ($stmt->execute()) {
        echo "Your account has been verified!";
    } else {
        echo "Verification failed.";
    }
}
