<?php
    //session_start();
    require_once 'config.php';

class UserManager {
 
    private $db; 
    private $conn;

    
    public function __construct() {
       
        
        
    }

    public function getAllHerriak() {

        $this -> open();

        $sql = "SELECT * FROM herria ORDER BY izena";
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


    public function getEguraldia($id) {

        $this -> open();

        $sql = "SELECT * FROM iragarpen_eguna where herria = $id ORDER BY eguna";
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


    public function getEguna($id) {

        $this -> open();

        $sql = "SELECT * FROM iragarpena_orduko where eguna = $id ORDER BY ordua";
        $result = $this->conn->query($sql);

        $this -> close();

        if ($result->num_rows > 0) {
            $orduak = [];
            while ($row = $result->fetch_assoc()) {
                $orduak[] = $row;
            }
            return $orduak;
        } else {
            return [];
        }        
    }


    private function azkenHerriID(){
        $this->open();
    
        $sql = "SELECT MAX(ID) AS azkenID FROM herria";
        $result = $this->conn->query($sql);
    
        $this->close();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['azkenID'];
        } else {
            return null;
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
