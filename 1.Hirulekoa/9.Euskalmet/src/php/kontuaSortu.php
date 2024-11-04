
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
        <form action="" method="POST" enctype="multipart/form-data">
            Username: <input type="text" name="username" required><br>
            E-mail: <input type="email" name="email" required><br>
            Password: <input type="password" name="password" required><br>
            Upload file: <input type="file" name="fileUpload"><br><br>
            <input type="submit">
        </form>
    </div>
</body>
</html>
<?php
ob_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //echo "<script>console.log('ellosw');</script>";
    
    
    //echo "<script>console.log('objetua importatu baino lehenago');</script>";
    require_once './DB/db.php';
    //echo "<script>console.log('objetua importatu ondoren');</script>";
    
    //echo "<script>console.log('obejtua sortu baino lehen');</script>";
    $db = new UserManager();
    //echo "<script>console.log('obejtua sortu ondoren');</script>";


    // Sanitizing input
    $email = htmlspecialchars($_POST["email"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    $ird = "error.jpg"; // Default image if upload fails or not provided
    
    // Check if the user exists
    $user = $db->userExist($username, $email);
    

    if ($user) {
        echo "<script>console.log('exist');</script>";
    } else {
        echo "<script>console.log('dont exist');</script>";


        if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] == 0) {
            $target_dir = "../img/users/";
            $fileType = strtolower(pathinfo($_FILES["fileUpload"]["name"], PATHINFO_EXTENSION));

            $target_file = $target_dir . $username . "." . $fileType;
            $ird = $username . "." . $fileType;

            if (file_exists($target_file)) {
                //echo "<p>El archivo ya existe.</p>";
            } else {
                if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                    //echo "<p>Archivo subido correctamente.</p>";
                } else {
                    //echo "<p>Hubo un error al subir el archivo.</p>";
                    $ird = "error.jpg"; 
                }
            }
        }

        $edin = $db->createUser($username, $email, $password, $ird);
        if($edin){
            echo "<script>console.log('sortuta');</script>";
        }else{
            echo "<script>console.log('ez sortuta');</script>";
        }
        
        header("Location: ../index.php");
        exit();
    }
}
?>
