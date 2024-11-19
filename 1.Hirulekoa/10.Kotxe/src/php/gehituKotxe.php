<?php 

require_once 'DB/db.php';

$db = new UserManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matrikula = isset($_POST['matrikula']) ? $_POST['matrikula'] : null;
    $data = isset($_POST['data']) ? $_POST['data'] : null;
    $itc = isset($_POST['itc']) ? $_POST['itc'] : null;

    if ($itc == "si") {
        $itc = 1;
    } else {
        $itc = 0;
    }

    
    $db->gehituKotxea($matrikula, $data, $itc);
    
    
    header("Location: ../index.php");
    exit();
}
?>
