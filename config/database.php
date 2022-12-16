<?php
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
