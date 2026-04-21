<?php
class Database{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "db_kampus";

    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli(
                $this->host, $this->user, $this->password, $this->database
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getConnection(){
        return $this->conn;
    }
}
?>
