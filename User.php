<?php
require_once 'Database.php';

class User
{
    private $conn;
    private $table_name = "users";

    public $id;
    public $name;
    public $email;
    public $password;
    public $balance;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function register()
    {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, email=:email, password=:password";
        $stmt = $this->conn->prepare($query);

        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":email", $this->email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($this->password, $row['password'])) {
                $this->id = $row['id'];
                $this->name = $row['name'];
                $this->balance = $row['balance'];
                session_start();
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['balance'] = $row['balance'];
                $_SESSION['name'] = $row['name'];
                return $row;
            }
        }
        return false;
    }

    public function findByEmail()
    {
        $query = "SELECT id, balance FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $this->id = $user['id'];
            $this->balance = $user['balance'];
            return true;
        }

        return false;
    }
    public function updateBalance()
    {
        $query = "UPDATE users SET balance = :balance WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':balance', $this->balance);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }
}
