<?php
// include 'php/headerFooter/header.php';
?>

<style>
    img {
        width: auto;
        height: 300px;
    }
</style>
<body>

<div id="">

    <?php
        require_once 'php/DB/db.php';

        $db = new UserManager();

        $kotxeLista = [];
        $gidariLista = [];

        $kotxeAukeratuta = null;
        $gidariAukeratuta = null;

        // Actualizamos la lista de coches
        datuakEguneratu($db, $kotxeLista);

        // Si se ha enviado el formulario para seleccionar un coche
        if (!empty($_POST['kotxeAukeratuta'])) {
            $kotxeAukeratuta = $_POST['kotxeAukeratuta']; // Guardamos la selección del coche
            $gidariLista = $db->getAllGidari();           // Obtenemos la lista de gidari
        }

        // Si se ha enviado el formulario para asignar un gidari
        if (!empty($_POST['gidariAukeratuta']) && $kotxeAukeratuta) {
            $gidariAukeratuta = $_POST['gidariAukeratuta']; // Guardamos la selección del gidari
            $eginda = $db->ezarriGidaria($kotxeAukeratuta, $gidariAukeratuta);
            if($eginda){
                echo "<p>Gidaria aldatuta</p>";
            }else{
                echo "<p>Gidaria ez da aldatu</p>";
            }
        }

        // Función para actualizar la lista de coches
        function datuakEguneratu($db, &$kotxeLista) {
            $kotxeLista = $db->getAllKotxe();
        }
    ?>

    <?php
        require_once 'php/kotxeAukeratu.php';
    ?>

    <!-- Formulario para seleccionar un gidari -->
    <?php if (!empty($gidariLista)): ?>

        <?php 
            require_once 'php/gidariAukeratu.php';
        ?>
        
    <?php endif; ?>


    <!--Gehitu kotxe-->
    <?php
        require_once 'php/gehituKotxeForm.php';
    ?>


</div>

</body>
