<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    // Begiratzen da ea gmaila ongi dagoen a la ez
    function validateEmail($email) {
        return !empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    

   
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $hash = password_hash($password, PASSWORD_DEFAULT);



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
        // Guztia ongi egonez gero, erakutsiko du
        echo "Welcome $name <br>";
        echo "Your email address is: $email <br>";
        echo "Your password is: $password <br>";
        echo "Your website is: $website <br>";
        echo "Your comment is: $comment <br>";
        echo "Your gender is: $gender <br>";
        echo "Your option was: $taskOption <br>";
    }
}
?>