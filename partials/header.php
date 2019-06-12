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
        </li>

      <?php
      }
      ?>
      <li class="nav-item active">
        <a class="nav-link" href="dhfaq.php">FAQ's</a>
      </li>
      <!-- <?php if(isset($_SESSION['username'])){?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
        <?=  $_SESSION['username'] ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="editprofile.php"><i class="fas fa-user-edit"></i></a>
          <a class="dropdown-item" href="logout.php"><i class="fas fa-door-open"></i></a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <?php
      }
      ?> -->
      <li class="dropdown">
          <button onclick="myFunction()" class="dropbtn"><?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?></button>
          <div id="myDropdown" class="dropdown-content">
            <a href="editprofile.php">Editar perfil  <i class="fas fa-user-edit"></i></a>
            <a href="logout.php">Cerrar sesión  <i class="fas fa-door-open"></i></a>
          </div>
      </li>
      <style>
      /* Dropdown Button */
      .dropbtn {
        background-color: transparent;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
      }

      /* Dropdown button on hover & focus */
      .dropbtn:hover, .dropbtn:focus {
        background-color: transparent;
      }

      /* The container <div> - needed to position the dropdown content */
      .dropdown {
        position: relative;
        display: inline;
      }

      /* Dropdown Content (Hidden by Default) */
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }

      /* Links inside the dropdown */
      .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }

      /* Change color of dropdown links on hover */
      .dropdown-content a:hover {background-color: #ddd}

      /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
      .show {display:block;}
      </style>
      <script type="text/javascript">
      /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
if (!event.target.matches('.dropbtn')) {
  var dropdowns = document.getElementsByClassName("dropdown-content");
  var i;
  for (i = 0; i < dropdowns.length; i++) {
    var openDropdown = dropdowns[i];
    if (openDropdown.classList.contains('show')) {
      openDropdown.classList.remove('show');
    }
  }
}
}
      </script>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar recetas" aria-label="Search">
      <button class="btn btn-warning my-2 my-sm-0" style="background-color: #E9B000; color:white"  type="submit">Buscar</button>
    </form>
  </div>
</nav>

</header>
