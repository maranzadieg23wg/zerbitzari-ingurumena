
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manex Aranzadi Egaña</title>
    <link rel="stylesheet" href="../style/main.css">
</head>
    <body>
    <div id="flexCenter">
        <form action="./php/logging.php" method="POST">
            E-mail: <input type="text" name="email"><br>
            Password: <input type="password" name="password"><br>
            <br>
            <input type="submit">


            
        </form>

        <form action="./html/kontuaSortu.html">
            <input type="submit" value="Kontua Sortu" />
        </form>
        
        
        
    </div>
    </body>
</html>
<?php

ob_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once 'php/DB/db.php';

    $db = new UserManager();

      

   
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $hashPassword = hash('sha256', $password);

    $user = $db->userExist($email, " ");

    if ($user) {
        echo "<p>El usuario existe.</p>";
    } else {
        echo "<p>El usuario no existe.</p>";
    }



    // Erroreak dauden a la ez
    if (!$user) {
        echo "<p style='color:red;'>Datuak gaizki daude</p>";
    } else {

        $datuak = $db -> loggin($email, $hashPassword);

        header ("Location: ../index.php");

        
        
        
    }
}
?>