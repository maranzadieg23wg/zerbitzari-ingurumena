<?php
   require_once 'config.php';

class UserManager {
 
    private $db; 
    private $conn;

    
    public function __construct() {
        $this->db = new Database();
        
        $this->conn = $this->db->getConnection();
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            return $users;
        } else {
            return [];
        }
    }

    public function getFilms() {
        $sql = "SELECT * FROM films ORDER BY RAND() LIMIT 5;";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $films = [];
            while ($row = $result->fetch_assoc()) {
                $films[] = $row;
            }
            return $films;
        } else {
            return [];
        }
    }

    public function close() {
        $this->db->closeConnection();
        unset($this->db);
    }

    private function open(){
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }
}
?>
