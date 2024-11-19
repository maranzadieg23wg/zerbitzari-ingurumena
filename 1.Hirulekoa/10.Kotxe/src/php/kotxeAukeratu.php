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