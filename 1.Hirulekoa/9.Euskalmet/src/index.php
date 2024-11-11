<?php
        // include 'php/headerFooter/header.php';
?>

<style>
    img{
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
            <table style="width:100%; margin-top: 20px; border: 1px solid #000;text-align: center;">
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
                            <td><?php echo "input type" ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

    </div>

</body>
