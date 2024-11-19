<?php 
            $gidaria = $db->zeinDaGidaria($kotxeAukeratuta); 
            //echo $gidaria;
        ?>
        
        <form action="" method="POST">
            <!-- Mantenemos el valor del coche seleccionado -->
            <input type="hidden" name="kotxeAukeratuta" value="<?php echo htmlspecialchars($kotxeAukeratuta); ?>">

            <label for="gidariAukeratuta">Aukeratu gidari bat:</label>
            <select id="gidariAukeratuta" name="gidariAukeratuta" onchange="this.form.submit()">
            

                
                <?php
                    foreach ($gidariLista as $gidari) {
                        //echo "<script>console.log('GidariAukeratuta: " . addslashes($gidaria) . " | ID: " . addslashes($gidari['id']) . "');</script>";
                        $selected = ($gidaria === $gidari['id']) ? 'selected' : '';
                        echo "<option value=\"{$gidari['id']}\" $selected>{$gidari['izena']}</option>";
                    }
                ?>
            </select>
        </form>