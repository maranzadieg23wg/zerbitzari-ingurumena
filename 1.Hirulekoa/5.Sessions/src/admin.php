<?php 
//ob_start();



$email = "admin@admin.com";


if (isset($_COOKIE["erabiltzailea"])) {
    if ($_COOKIE["erabiltzailea"] !== $email) {
        header('Location: index.html');
        exit();
    }
} else {
    header('Location: index.html');
    exit();
}


//echo "Hellow ".$_COOKIE["erabiltzailea"];


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
   
    setcookie("erabiltzailea", "", time() - 3600, "/");
    header('Location: index.html');
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manex Aranzadi Egaña</title>
</head>
<body>



    <h1>Ongi etorri admin horrialdera</h1>
    <form method="POST">
        <button type="submit" name="logout">Saioa itxi</button>
    </form>




</body>
</html>