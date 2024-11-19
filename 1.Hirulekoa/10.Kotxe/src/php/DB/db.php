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


    public function ezarriGidaria($kotxe, $gidari) {
        $this->open();
    
        $sql = "UPDATE kotxeak SET jabea_id = $gidari WHERE id = $kotxe";
        $this->conn->query($sql);
    
        $updated = $this->conn->affected_rows > 0;
    
        $this->close();
    
        if ($updated > 0) {
            return true;
        } else {
            return false;
        }       

        
    }


    public function zeinDaGidaria($kotxe){
        $this -> open();

        $sql = "SELECT j.id FROM jabeak j INNER JOIN kotxeak k ON j.id = k.jabea_id WHERE k.id = $kotxe";
        $result = $this->conn->query($sql);

        $this -> close();

        if ($result->num_rows > 0) {
            
            $row = $result->fetch_assoc();
            return $row['id'];
        } else {
            return null;
        }     
    }


    public function gehituGidari($dni, $izena){

        $this -> open();
        $sql ="INSERT INTO jabeak (DNI, izena) VALUES ($dni, $izena)";
        $this->conn->query($sql);
    
        $updated = $this->conn->affected_rows > 0;
    
        $this->close();
    
        if ($updated > 0) {
            return true;
        } else {
            return false;
        }       
    }

    public function gehituKotxea($matrikula, $matrikulaData, $itv){
        $this->open();
    
        $sql = "INSERT INTO kotxeak (jabea_id, matrikula, matrikulazio_data, itv) VALUES (?, ?, ?, ?)";
    
        $stmt = $this->conn->prepare($sql);
    
        if (!$stmt) {
            echo "Error en la preparación de la consulta: " . $this->conn->error;
            return false;
        }
    
        $jabea_id = 5;
        $stmt->bind_param("isss", $jabea_id, $matrikula, $matrikulaData, $itv);
    
     
    
       
        if ($stmt->execute()) {
            $updated = $this->conn->affected_rows > 0;
    
            $stmt->close();
    
            $this->close();
    
            return $updated;
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
            $stmt->close();
            $this->close();
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
