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

    <!-- Formulario para seleccionar un coche -->
    <form action="" method="POST">
        <label for="kotxeAukeratuta">Aukeratu kotxe bat:</label>


        <select id="kotxeAukeratuta" name="kotxeAukeratuta" onchange="this.form.submit()">
            <!--<option value="">-- Aukeratu --</option>-->
            <?php
                foreach ($kotxeLista as $kotxe) {
                    $selected = ($kotxeAukeratuta == $kotxe['id']) ? 'selected' : '';
                    echo "<option value=\"{$kotxe['id']}\" $selected>{$kotxe['matrikula']}</option>";
                }
            ?>
        </select>
    </form>

    <!-- Formulario para seleccionar un gidari -->
    <?php if (!empty($gidariLista)): ?>
        <form action="" method="POST">
            <!-- Mantenemos el valor del coche seleccionado -->
            <input type="hidden" name="kotxeAukeratuta" value="<?php echo htmlspecialchars($kotxeAukeratuta); ?>">

            <label for="gidariAukeratuta">Aukeratu gidari bat:</label>
            <select id="gidariAukeratuta" name="gidariAukeratuta" onchange="this.form.submit()">
                <option value="">-- Aukeratu --</option>
                <?php
                    foreach ($gidariLista as $gidari) {
                        $selected = ($gidariAukeratuta == $gidari['id']) ? 'selected' : '';
                        echo "<option value=\"{$gidari['id']}\" $selected>{$gidari['izena']}</option>";
                    }
                ?>
            </select>
        </form>
    <?php endif; ?>

</div>

</body>
