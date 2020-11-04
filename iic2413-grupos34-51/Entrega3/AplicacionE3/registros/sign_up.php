<?php include('../templates/header.html');   ?>

<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.html"><span>Splinter S.A.</span></a></h1>
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
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $nombre = $_POST["nombre"];
  $username = $_POST["username"];
  $correo = $_POST["correo"];
  $direccion = $_POST["direccion"];
  $password = $_POST["password"];


  $existencia = $db -> prepare("SELECT username FROM usuarios WHERE username='$username';");
  $existencia -> execute();
  $usernames_iguales = $existencia -> fetchAll();

  if(count($usernames_iguales) == 0){
    if (($nombre == NULL) or ($username == NULL) or ($correo == NULL) or ($direccion == NULL) or ($password == NULL)){
        echo "<br><br><br><br><br><p>Por favor complete todos los campos requeridos.</p>";
    }
    else {
        $query = "INSERT INTO usuarios
        VALUES((SELECT (MAX(uid) + 1) FROM usuarios), '$nombre', '$username', '$correo', '$direccion', '$password');";
    
        $result = $db -> prepare($query);
        $result -> execute();
        echo "<br><br><br><br><br><p>Usuario registrado correctamente, vuelva a la pagina principal para ingresar.</p>";
    }
  }
  else{
      echo "<br><br><br><br><br><p>El username escogido ya está utilizado, por favor intente con otro.</p>";
  }
  ?>

<?php include('../templates/footer.html'); ?>