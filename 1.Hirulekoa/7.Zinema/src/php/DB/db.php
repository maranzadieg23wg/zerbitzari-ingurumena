<?php
   require_once 'config.php';

class UserManager {
 
    private $db; 
    private $conn;

    
    public function __construct() {
       
        
        
    }

    public function getAllUsers() {

        $this -> open();

        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);

        $this -> close();

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

        $this -> open();

        $sql = "SELECT * FROM films ORDER BY RAND() LIMIT 5;";
        $result = $this->conn->query($sql);

        $this -> close();

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


    public function userExist($username, $email){
        $this -> open();

        $sql = "SELECT * FROM users WHERE email = '$email' OR username = '$username';";
        $result = $this->conn->query($sql);

        $this -> close();

        if($result ->num_rows > 0){
            return true;
        }else{
            return false;
        }


    }


    public function createUser($username, $email){
        if($this->userExist($username, $email, $password, $img)){

            $hashPassword = hash('sha256', $password);
            $this -> open();

            $sql = "INSERT INTO users (username, email, password, avatar) VALUES ('$username', '$email', '$hashPassword', '$img');";
            $result = $this->conn->query($sql);

            $this -> close();
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
