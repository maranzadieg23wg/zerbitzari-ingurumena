<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manex Aranzadi Egaña</title>
    <link rel="stylesheet" href="./style/main.css">
</head>
<body>

    <div id="flexCenter">
        
    

        <?php
            require_once 'php/DB/db.php';

            $db = new UserManager();

            $filmak = $db->getFilms();
            
            foreach ($filmak as $film) {
                echo "<p>" . htmlspecialchars($film['name']) . "</p> <br>"; // Asegúrate de cambiar 'title' al nombre correcto de la columna en tu tabla 'films'.
            }


            
            
        ?>
        
        
    </div>
    
    
</body>

