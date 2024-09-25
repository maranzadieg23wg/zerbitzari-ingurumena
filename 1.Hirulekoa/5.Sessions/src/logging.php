<?php
ob_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    // Begiratzen da ea gmaila ongi dagoen a la ez
    function validateEmail($email) {
        return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    

   
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $hash = password_hash($password, PASSWORD_DEFAULT);

    //echo($hash);


    // Balidazioa
    $errors = [];

    if (!validateEmail($email)) {
        $errors[] = "Invalid email address.";
    }
    

    // Erroreak dauden a la ez
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    } else {

        $hashedPassword = '$2y$10$mVUx2BHbrqssqNW1xp.YauqeQxQeBXDdW8zLnXNDMoJ.4b5HCu6Wi';

        if ($email == "admin@admin.com" && password_verify($password, $hashedPassword)){
            // Guztia ongi egonez gero, erakutsiko du
            echo "Welcome $email <br>";

            setcookie("erabiltzailea", $email."@".$hashedPassword, 0);
            header('Location:admin.php');
            ob_end_flush();
        }else{
            echo "Emaila edo pasahitza gaizki sartuta";
        }
        
        
    }
}
?>