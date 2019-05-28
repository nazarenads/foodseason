<?php
session_start();

 ?>

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
    <a class="navbar-brand" href="home.php"><h1><i class="fas fa-carrot"></i> Food Season</h1></a><br>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="color">
      <ul class="navbar-nav mr-auto">
        <?php if(!isset($_SESSION['username'])){?>
        <li class="nav-item active">
           <a class="nav-link" href="signin.php">Ingresar</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="signup.php">Registrarse</a>
        </li>'
      <?php
      }
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="dhfaq.php">FAQ's</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar recetas" aria-label="Search">
        <button class="btn btn-warning my-2 my-sm-0" style="background-color: #E9B000; color:white"  type="submit">Buscar</button>
      </form>
    </div>
  </nav>
  <?php if(isset($_SESSION['username'])){?>
    <div class="" style="color:white; text-align:left; margin:20px;position:absolute;z-index:30">
    <h3><?= "Hola ". $_SESSION['username']."!" ?></h3>
    <a href="logout.php" style="color:white;">¿Querés cerrar sesión?</a>
    <a href="editprofile.php" style="color:white;"> <i class="fas fa-user-edit"></i> </a>

  </div>'
  <?php
  }
  ?>
</header>
