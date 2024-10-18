<?php
        include 'headerFooter/header.php';
?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = htmlspecialchars($_POST['film_id']);
    //echo "$id";

    require_once 'DB/db.php';

    $db = new UserManager();
    $film = $db->getFilmID($id);
}
?>


<div class="container mt-4">
    
    <div class="row">
    <div class="col-6 col-sm-4 col-md-3 mb-4">
                <div class="card film-container">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <!-- ID -->
                        <input type="hidden" name="film_id" value="<?php echo htmlspecialchars($film['id']); ?>">
                        
                        <!-- Film img -->
                        <button type="submit" style="border: none; background: none; cursor: pointer;"> 
                            <img src='../img/films/<?php echo htmlspecialchars($film['img']); ?>' alt="<?php echo htmlspecialchars($film['name']); ?>" class="card-img-top">
                        </button>
                    </form>

                    <!-- Film info -->
                    <div class="card-body text-white bg-dark">
                        <h3 class="card-title">Title: <?php echo htmlspecialchars($film['name']); ?></h3>
                        <h4 class="card-text">ISAN: <?php echo htmlspecialchars($film['ISAN']); ?></h4>
                        <h4 class="card-text">Year: <?php echo htmlspecialchars($film['year']); ?></h4>
                        <h4 class="card-text">Average rating: 
                            <?php
                                $notaMedia = $db->getMedia($film['id']);
                                echo htmlspecialchars($notaMedia);
                            ?>
                        </h4>

                        <!-- User note -->
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                            <input type="hidden" name="film_id" value="<?php echo htmlspecialchars($film['id']); ?>"> <!-- Film ID oculto -->
                            <label>Your note:</label>
                            <input 
                                type="number" 
                                name="nota" 
                                value="<?php 
                                    // lortu erabiltzailearen nota
                                    $userData = json_decode($_SESSION['sesioa'], true);
                                    $userNota = $db->getUserNota($film['id'], $userData['id']);
                                    echo htmlspecialchars($userNota); 
                                ?>" 
                                min="0" 
                                max="10"> <!-- nota aldatzeko alderdia -->

                            <button type="submit" class="btn btn-primary btn-sm mt-2">Save</button> <!-- Gordetzeko botoia -->
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>


<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['film_id']) && isset($_POST['nota'])) {
    

    $userData = json_decode($_SESSION['sesioa'], true);
    $userId = $userData['id'];

    
    $filmId = (int) $_POST['film_id'];
    $nota = floatval($_POST['nota']);  

    
    $db->setNota($userId, $filmId, $nota);

   
    //echo "<div class='alert alert-success mt-4'>Nota actualizada correctamente.</div>";
}
?>