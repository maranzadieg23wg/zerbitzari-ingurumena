<?php
    //session_start();
    require_once 'config.php';

class UserManager {
 
    private $db; 
    private $conn;

    
    public function __construct() {
       
        
        
    }

    private function getAllUsers() {

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

    // ******************************PELIKULAK****************************** //

    public function getFilms() {

        $this -> open();

        $sql = "SELECT * FROM films ORDER BY RAND() LIMIT 4;";
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

    public function getFilmID($ID) {

        $this -> open();

        $sql = "SELECT * FROM films where Id = '$ID';";
        $result = $this->conn->query($sql);

        $this -> close();

        if ($result->num_rows > 0) {
            
            return $result->fetch_assoc();
        } else {
            return null;
        }

        
    }

    public function getFilmName($name) {

        $this -> open();

        $sql = "SELECT * FROM films where name = '$name';";
        $result = $this->conn->query($sql);

        $this -> close();

        if ($result->num_rows > 0) {
            
            return $result->fetch_assoc();
        } else {
            return null;
        }

        
    }

    public function getFilmISAN($isan) {

        $this -> open();

        $sql = "SELECT * FROM films where ISAN = '$isan';";
        $result = $this->conn->query($sql);

        $this -> close();

        if ($result->num_rows > 0) {
            
            return $result->fetch_assoc();
        } else {
            return null;
        }

        
    }


    public function getMedia($ID){
        $this -> open();

        $sql = "SELECT AVG(nota) AS media FROM puntuazioa where film_id = '$ID';";
        $result = $this->conn->query($sql);

        $this -> close();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); 
            $media = $row['media']; 
            return $media;
        } else {
            $media = null;  
            return 0;
        }
    }

    public function getUserNota($filmID, $userID){
        $this -> open();

        $sql = "SELECT nota FROM puntuazioa where film_id = '$filmID' and user_id ='$userID';";
        $result = $this->conn->query($sql);

        $this -> close();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); 
            $media = $row['nota']; 
            return $media;
        } else {
            $media = null;  
            return '-';
        }
    }


    public function getUserFilms($filmID, $userID){
        $this -> open();

        $sql = "SELECT * FROM f.films where film_id = '$filmID' and user_id ='$userID';";
        $result = $this->conn->query($sql);

        $this -> close();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); 
            $media = $row['nota']; 
            return $media;
        } else {
            $media = null;  
            return '-';
        }
    }

    // ******************************NOTAK****************************** //

    public function lortuNota($idBezero, $idPelikula){

        $this -> open();

        $sql = "SELECT * FROM puntuazioa WHERE user_id = '$idBezero' and film_id = '$idPelikula';";
        $result = $this->conn->query($sql);

        $this -> close();
    }

    public function setNota($idBezero, $idPelikula, $nota){
        $this -> open();

        $sql = "SELECT * FROM puntuazioa WHERE user_id = '$idBezero' and film_id = '$idPelikula';";
        $result = $this->conn->query($sql);

        $this -> close();

        if ($result->num_rows > 0) {

            $this -> open();

            $sql = "UPDATE puntuazioa SET nota = $nota WHERE user_id = '$idBezero' and film_id = '$idPelikula';";
            $result = $this->conn->query($sql);

            $this -> close();
        } else {
            $this -> notaSortu($idBezero, $idPelikula, $nota);
        }
    }

    public function notaSortu($idBezero, $idPelikula, $nota){
        $this -> open();

        $sql = "INSERT INTO puntuazioa (user_id, film_id, nota) VALUES ($idBezero, $idPelikula, $nota)";
        $result = $this->conn->query($sql);

        $this -> close();

        return true;
        if ($result->num_rows > 0) {


            
            
        } else {
            return false;
        }
    }

    // ******************************BILATZ****************************** //

    public function findName($filmName){
        $this -> open();

        $sql = "SELECT * FROM films WHERE name like '$filmName';";
        $result = $this->conn->query($sql);

        $this -> close();

        if($result ->num_rows > 0){
            $films = [];
            while ($row = $result->fetch_assoc()) {
                $films[] = $row;
            }
            return $films;
        }

        return $this-> getFilmISAN($filmName);
    }


    // ******************************ERABILTZAILEAK****************************** //
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


    public function createUser($username, $email, $password, $img){
        if(!$this->userExist($username, $email)){

            $hashPassword = hash('sha256', $password);
            $this -> open();

            $sql = "INSERT INTO users (username, email, password, avatar) VALUES ('$username', '$email', '$hashPassword', '$img');";
            $result = $this->conn->query($sql);

            $this -> close();

            

            if($result ->num_rows > 0){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    

    public function logginSession() {
        session_start();
    
        if (isset($_SESSION['sesioa'])) {
            $sesioa = $_SESSION['sesioa'];
    
            $this->open();
            $sql = "SELECT * FROM users WHERE ID = '$sesioa';";
            $result = $this->conn->query($sql);
            $this->close();
    
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    

    public function loggin($email, $password){
        
        
        /*if($this->logginSession() !=null){
            return $this->logginSession();
        }*/

        if($this->userExist(" ", $email)){

            //echo "<script>console.log('ezistitzen da 2');</script>";
            $hashPassword = hash('sha256', $password);
            $this -> open();

            $sql = "SELECT * FROM users WHERE (email = '$email') and (password = '$hashPassword');";
            $result = $this->conn->query($sql); 

            $this -> close();
    
            if($result ->num_rows > 0){
                
                $a = $result->fetch_assoc();
                echo "<script>console.log('ezistitzen da 2');</script>";

                ob_start();
                //session_start();
                $_SESSION['sesioa'] = json_encode($a);
                ob_end_flush();

                
                return true;
                //return $result->fetch_assoc();
            }else{
                return false;
            }

            
        }

        return false;

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
