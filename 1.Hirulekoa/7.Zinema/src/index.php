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
        $filmak = $db->getFilms();
        ?>

        <div class="container mt-4">
            <div class="row">
                <?php foreach ($filmak as $film): ?>
                    <div class="col-6 col-sm-4 col-md-3 mb-4">
                        <div class="card film-container">
                            <form action="./php/film.php" method="POST">
                                <input type="hidden" name="film_id" value="<?php echo htmlspecialchars($film['id']); ?>"> <!-- ID hidden -->
                                <button type="submit" style="border: none; background: none; cursor: pointer;"> 
                                    <img src='./img/films/<?php echo htmlspecialchars($film['img']); ?>' alt="<?php echo htmlspecialchars($film['name']); ?>" class="card-img-top"> <!-- Imagen en la parte superior de la tarjeta -->
                                </button>
                            </form>
                            <div class="card-body text-white bg-dark">
                                <h3 class="card-title"><?php echo htmlspecialchars($film['name']); ?></h3>
                                <h4 class="card-text"><?php echo htmlspecialchars($film['ISAN']); ?></h4>
                                <h4 class="card-text"><?php echo htmlspecialchars($film['year']); ?></h4>
                                <h4 class="card-text">
                                    <?php
                                        $nota = $db -> getMedia($film['id']);
                                        echo $nota;
                                    ?>
                                </h4>
                                <h4 class="card-text">
                                    <?php
                                        if (isset($_SESSION['sesioa'])) {
                                            $userData = json_decode($_SESSION['sesioa'], true);
                                            $nota = $db -> getUserNota($film['id'], $userData['id']);
                                            echo $nota;
                                        } else {
                                            echo "-";
                                        }
                                        
                                    ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        
        
       
        
    </div>
    
    
    
</body>

