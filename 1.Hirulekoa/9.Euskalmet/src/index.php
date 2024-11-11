<?php
        include 'php/headerFooter/header.php';
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
        ?>

        <select id="herriak" name="herriak">
            <?php 
                foreach ($herriLista as $herri) { 
                    echo "<option value=\"{$herri['id']}\">{$herri['izena']}</option>";
                }
            ?>
        </select>

    </div>
    
</body>