<?php include('../templates/header.html');   ?>

<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container">
      <div class="logo float-left">
      <table>
      <tr>
      <td>
      <a><img src="../Amoeba/assets/img/favicon.png" alt="" class="img-fluid"></a>
      </td>
      <td>
      </td>
      <td>
        <h1 class="text-light"><a><span> Splinter S.A</span></a></h1>
      </td>
      </tr>
      </table>
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
  session_start();
  if(($_SESSION["username"] == NULL) or ($_SESSION["password"] == NULL)){
    session_destroy();
    header("Location: ../index.php");
  }

  $username = $_SESSION["username"];

  #Se obtiene uid
  $get_table = $db -> prepare("SELECT uid FROM usuarios WHERE username='$username';");
  $get_table -> execute();
  $table = $get_table -> fetchAll();
  $got_uid = $table;
  echo "<br><br><br><br><br><p>Algo paso exitosamente: 2.{$got_uid}</p>";
  echo "<br><br><br><p>Algo paso exitosamente: 2-> {$got_uid[0]}</p>";
  echo "<br><br><br><p>Algo paso exitosamente: 2-> {$got_uid[0][0]}</p>";
  echo "<br><br><br><p>Algo paso exitosamente: 2-> $username</p>";

  #Se obtiene hid
  #$hotel = $_POST['hotel_name'];
  #$get_hid = $db -> prepare("SELECT hid FROM hoteles WHERE nombre='$hotel';");



  #$existencia = $db -> prepare("SELECT username FROM usuarios WHERE username='$username';");
  #$existencia -> execute();
  #$usernames_iguales = $existencia -> fetchAll();

  /*
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
  }*/
  echo "<br><br><br><br><br><p>Algo paso exitosamente: {$got_uid}.</p>";
?>

<?php include('../templates/footer_consultas.html'); ?>