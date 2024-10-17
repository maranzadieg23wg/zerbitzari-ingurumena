<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging</title>
    <link rel="stylesheet" href="../style/main.css">
</head>
    <body>
    <div id="flexCenter">
        <form action="" method="POST">
            
            E-mail: <input type="text" name="email"><br>
            Password: <input type="password" name="password"><br>
            <br>
            <input type="submit">


            
        </form>

        <form action="./kontuaSortu.php">
            <input type="submit" value="Kontua Sortu" />
        </form>
        
        
        
    </div>
    </body>
</html>
<?php

//ob_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once './DB/db.php';

    $db = new UserManager();

      

   
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    //$hashPassword = hash('sha256', $password);

    $user = $db->userExist("", $email);

    /*if ($user) {
        echo "<p>El usuario existe.</p>";
    } else {
        echo "<p>El usuario no existe.</p>";
    }*/



    // Erroreak dauden a la ez
    if (!$user) {
        //echo "<script>console.log('ez da ezistitzen');</script>";
        //echo "<p style='color:red;'>Datuak gaizki daude</p>";
    } else {
        //echo "<script>console.log('ezistitzen da');</script>";


        $datuak = $db -> loggin($email, $password);

        if($datuak){
            echo "<script>console.log('loggin eginda');</script>";
        }else{
            echo "<script>console.log('loggin ez eginda');</script>";
        }
        //echo "$datuak . proba";
        //header ("Location: ../index.php");

        
        if (isset($_SESSION['sesioa'])) {
            echo "<script>console.log('sesioa eginda eginda');</script>";
            echo $_SESSION['sesioa'];
        } else {
            echo "<script>console.log('sesioa ez dago');</script>";

        }

        header("Location: ../index.php"); 
        //ob_end_flush();
        
        
        
    }
}
?>