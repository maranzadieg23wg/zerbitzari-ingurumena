<form action="php/gehituKotxe.php" method="POST">
        <!-- Campo de texto para matrícula -->
        <label for="matrikula">Matrikula:</label>
        <input type="text" id="matrikula" name="matrikula" required>

        <!-- Campo de fecha -->
        <label for="data">Data:</label>
        <input type="date" id="data" name="data" required>

        <!-- Radio buttons para selección única -->
        <label>ITV:</label>
        <input type="radio" id="itc_si" name="itc" value="si">
        <label for="itc_si">Bai</label>
        <input type="radio" id="itc_no" name="itc" value="no">
        <label for="itc_no">Ez</label>

        <!-- Botón de envío -->
        <button type="submit" name="gehituKotxe">Gorde</button>
    </form>