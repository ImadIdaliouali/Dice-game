<?php
// require_once "config/database.php";

class database
{
    private $host = "localhost";
    private $dbname = "Dice-game";
    private $user = "root";
    private $password = "";
    public function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            return $conn;
        } catch (PDOException $e) {
            echo "Database connection Error:" . $e->getMessage();
        }
    }
}

class User
{
    private $conn;
    private $stmt;
    private $table;
    private $query;
    public function __construct()
    {
        $this->table = "users";
        $db = new database();
        $this->conn = $db->connect();
    }
    public function getAllUsers()
    {
        $this->query = "SELECT * FROM $this->table";
        $this->stmt = $this->conn->prepare($this->query);
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateScore($id, $score)
    {
        $this->query = "UPDATE $this->table SET score=$score WHERE id=$id";
        $this->stmt = $this->conn->prepare($this->query);
        return $this->stmt->execute();
    }
}
