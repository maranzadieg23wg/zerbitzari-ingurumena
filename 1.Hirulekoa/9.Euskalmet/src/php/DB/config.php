<?php
class Database {
    private $servername = "10.14.0.2:8306";
    //private $servername = "192.168.1.115:8306";
    //private $servername = "127.0.0.1:8306";

    private $username = "root";
    private $password = "root";
    private $dbname = "mydatabase";
    private $conn;

    // Eraikitzailea
    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Konezioa konprobat
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        
    }

    // Konexioa itzi
    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    // Konexioa lortu
    public function getConnection() {
        return $this->conn;
    }
}


?>
