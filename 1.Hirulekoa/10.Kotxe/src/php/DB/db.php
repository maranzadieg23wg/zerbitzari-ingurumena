<?php
    //session_start();
    require_once 'config.php';

class UserManager {
 
    private $db; 
    private $conn;

    
    public function __construct() {
       
        
        
    }

    public function getAllKotxe() {

        $this -> open();

        $sql = "SELECT * FROM kotxeak";
        $result = $this->conn->query($sql);

        $this -> close();

        if ($result->num_rows > 0) {
            $herriak = [];
            while ($row = $result->fetch_assoc()) {
                $herriak[] = $row;
            }
            return $herriak;
        } else {
            return [];
        }        
    }


    public function getAllGidari() {

        $this -> open();

        $sql = "SELECT * FROM jabeak";
        $result = $this->conn->query($sql);

        $this -> close();

        if ($result->num_rows > 0) {
            $herriak = [];
            while ($row = $result->fetch_assoc()) {
                $herriak[] = $row;
            }
            return $herriak;
        } else {
            return [];
        }        
    }


    public function ezarriGidaria($kotxe, $gidari){
        $this -> open();

        $sql = "UPDATE kotxeak SET jabea_id = $gidari where id = $kotxe";
        $result = $this->conn->query($sql);

        $this -> close();

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }    
    }
    

    /***********************OPEN-CLOSE********************************/

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
