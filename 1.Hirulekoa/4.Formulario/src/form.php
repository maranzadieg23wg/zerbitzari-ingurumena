<?php
echo "Welcome " . htmlspecialchars($_POST["name"]) . "<br>";
echo "Your email address is: " . htmlspecialchars($_POST["email"]) . "<br>";
echo "Your password is: " . htmlspecialchars($_POST["password"]) . "<br>";
echo "Your website is: " . htmlspecialchars($_POST["website"]) . "<br>";
echo "Your comment is: " . htmlspecialchars($_POST["comment"]) . "<br>";
echo "Your gender is: " . htmlspecialchars($_POST["gender"]) . "<br>";
echo "Your option was: " . htmlspecialchars($_POST["taskOption"]) . "<br>";

if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] == 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verifica si el archivo ya existe
    echo "<img src='uploads/" . htmlspecialchars(basename($_FILES["fileUpload"]["name"])) . "'>";


    // Begiratzen ea dagoen 
    if (file_exists($target_file)) {
        //echo "Sorry, the file already exists.<br>";
    } else {
        // Intenta mover el archivo subido al directorio deseado
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
            //echo "The file ". htmlspecialchars(basename($_FILES["fileUpload"]["name"])) . " has been uploaded.<br>";
            
        } else {
            //echo "Sorry, there was an error uploading your file.<br>";
            echo "<img src='uploads/" . htmlspecialchars(basename($_FILES["fileUpload"]["name"])) . "'>";
        }
    }
} else {
    echo "No file was uploaded or there was an error during upload.<br>";
}

?>
