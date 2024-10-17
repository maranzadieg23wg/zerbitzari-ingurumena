<?php
        include 'php/headerFooter/header.php';
?>
<body>

    

    <div id="flexCenter">
        
    

        <?php
            require_once 'php/DB/db.php';

            $db = new UserManager();

            $filmak = $db->getFilms();
            
            foreach ($filmak as $film) {
                echo "<p>" . htmlspecialchars($film['name']) . "</p> <br>"; // Asegúrate de cambiar 'title' al nombre correcto de la columna en tu tabla 'films'.
            }

            $user = $db->userExist("johndoe", "john.doe@example.com");

            if ($user) {
                echo "<p>El usuario existe.</p>";
            } else {
                echo "<p>El usuario no existe.</p>";
            }

            
            
        ?>
        
       
        
    </div>
    
    
</body>

