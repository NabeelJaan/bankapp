<?php
require_once 'Database.php';

class Transaction
{
    private $conn;
    private $table_name = "transactions";

    public $id;
    public $user_id;
    public $amount;
    public $type;
    public $details;
    public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createTransaction()
    {
        // Insert transaction into the transactions table
        $query = "INSERT INTO " . $this->table_name . " 
        SET user_id=:user_id, amount=:amount, type=:type, details=:details";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":details", $this->details);

        if ($stmt->execute()) {
            $balance_query = "SELECT balance FROM users WHERE id = :user_id";
            $balance_stmt = $this->conn->prepare($balance_query);
            $balance_stmt->bindParam(":user_id", $this->user_id);
            $balance_stmt->execute();

            $current_balance = $balance_stmt->fetchColumn();

            if ($this->type === 'Credit') {
                $new_balance = $current_balance + $this->amount;
            } elseif ($this->type === 'Debit') {
                $new_balance = $current_balance - $this->amount;
            }

            $update_query = "UPDATE users SET balance = :balance WHERE id = :user_id";
            $update_stmt = $this->conn->prepare($update_query);
            $update_stmt->bindParam(":balance", $new_balance);
            $update_stmt->bindParam(":user_id", $this->user_id);

            if ($update_stmt->execute()) {
                return true;
            }
        }
        return false;
    }

    public function getTransactions($user_id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = :user_id ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
        return $stmt;
    }
}
