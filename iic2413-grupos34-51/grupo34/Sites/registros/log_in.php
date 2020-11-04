<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $username = $_POST["username"];
  $password = $_POST["password"];

  $existencia = $db -> prepare("SELECT username, password FROM usuarios WHERE username='$username';");
  $existencia -> execute();
  $usernames_iguales = $existencia -> fetchAll();

  if(count($usernames_iguales) == 0){
    $mensaje = "<br><br><br><br><br><p>Usuario no registrado.</p>";
  }
  else {
      if($usernames_iguales[0][1] == $password){
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        header("Location:../MiPerfil/mi_perfil.php");
      }
      else{
          $mensaje = "<br><br><br><br><br><p>Contraseña incorrecta, intentelo nuevamente.</p>";
      }
  }
  ?>
<?php include('../templates/header.html');   ?>

<body>
  <!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.html"><span>Splinter S.A</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="../index.php">Home</a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End #header -->
<?php
  echo $mensaje;
  ?>
<?php include('../templates/footer.html'); ?>