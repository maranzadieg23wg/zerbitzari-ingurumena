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

            $herriLista = $db->getAllHerriak();

            $egunak = [];

            if (isset($_POST['herriak'])) {
                $herri_id = $_POST['herriak'];
                $egunak = $db->getEguraldia($herri_id); 
            }

            $egunaAukeratuta = [];

            if (isset($_POST['eguna_id'])) {
                $eguna_id = $_POST['eguna_id'];
                $egunaAukeratuta = $db->getEguna($eguna_id);
                
            }
        ?>

        <form action="" method="POST">
            <select id="herriak" name="herriak" onchange="this.form.submit()">
                <?php
                    foreach ($herriLista as $herri) {
                        $selected = (isset($herri_id) && $herri_id == $herri['id']) ? 'selected' : '';
                        echo "<option value=\"{$herri['id']}\" $selected>{$herri['izena']}</option>";
                    }
                ?>
            </select>
        </form>

        <?php if (!empty($egunak)): ?>
            <table style="width:100%; margin-top: 20px; border: 1px solid #000; text-align: center;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Estado del clima</th>
                        <th>Temperatura mínima</th>
                        <th>Temperatura máxima</th>
                        <th>Aukeratu Eguna</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($egunak as $fila): ?>
                        <tr>
                            <td><?php echo $fila['id']; ?></td>
                            <td><?php echo $fila['eguna']; ?></td>
                            <td><?php echo $fila['eguraldia']; ?></td>
                            <td><?php echo $fila['tenperatura_min']; ?></td>
                            <td><?php echo $fila['tenperatura_max']; ?></td>
                            <td>
                                <form action="" method="POST">
                                    <input type="hidden" name="eguna_id" value="<?php echo $fila['id']; ?>">
                                    <input type="submit" value="<?php echo $fila['eguna']; ?>">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <?php if (!empty($egunaAukeratuta)): ?>
            
            <?php foreach ($egunaAukeratuta as $fila): ?>
                <h2>Eguneko Datuak</h2>
                <!--<p>ID: <?php echo $fila['id']; ?></p>-->
                <p>Ordua: <?php echo $fila['ordua']; ?></p>
                <p>Eguraldia: <?php echo $fila['eguraldia']; ?></p>
                <p>Prezipitazioa: <?php echo $fila['prezipitazioa']; ?> l/m²</p>
                <p>Haizea nondik: <?php echo $fila['haizea_nondik']; ?></p>
                <p>Haizearen abiadura: <?php echo $fila['haizea-km/h']; ?> km/h</p>

            <?php endforeach; ?>
            
            
            
        <?php endif; ?>

    </div>

</body>
