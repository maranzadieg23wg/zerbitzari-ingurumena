<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- logo -->
  <a class="navbar-brand d-flex align-items-center" href="#">
    <img src="../../img/logo/logo.png" alt="Logo" style="width: 40px; height: 40px;"> 
    <span class="ml-2">Hi-Fi</span>
  </a>
  
  <!-- hamburgesa -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- navbar container -->
  <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
    <!-- Bilatzailea -->
    <form class="form-inline mx-auto">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <!-- eskubi -->
    <ul class="navbar-nav ml-auto d-flex align-items-center">
      <!-- myFilms -->
      <li class="nav-item mr-3">
        <?php
            if (isset($_COOKIE['sesioa'])) {
                echo "<a class='nav-link' href='#'>myFilms</a>";
            }else{
                echo "<a class='nav-link d-none' href='#'>myFilms</a>";
            }
        ?>
        
      </li>

      <!-- Eskubiko aldea -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="user.png" alt="User" style="width: 30px; height: 30px;" class="rounded-circle"> <!-- avatar -->
          <span class="ml-2">Username</span> <!-- Erabiltzailearen izena -->
        </a>
        
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="#">Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<!-- Incluye los scripts de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
