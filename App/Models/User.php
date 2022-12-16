<?php
require "../config/database.php";
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
}
