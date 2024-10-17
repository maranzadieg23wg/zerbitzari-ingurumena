
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontua Sortu</title>
    <link rel="stylesheet" href="../style/main.css">
</head>
    <body>
    <div id="flexCenter">
        <form action="" method="POST">
            Username: <input type="text" name="username"><br>
            E-mail: <input type="text" name="email"><br>
            Password: <input type="password" name="password"><br>
            Upload file: <input type="file" name="fileUpload"><br>
            <br>
            <input type="submit">


            
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
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $hashPassword = hash('sha256', $password);

    $user = $db->userExist($email, $username);

    /*if ($user) {
        echo "<p>El usuario existe.</p>";
    } else {
        echo "<p>El usuario no existe.</p>";
    }*/


    
}
?>