<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  session_start();

  $username = $_SESSION["username"];
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
    </div>
  </header><!-- End #header -->
  <br><br><br><br><br>

<p align="center">¿Está seguro de querer eliminar su cuenta? Su usuario quedará inhabilitado de manera permanente.</p>

<form align="center" action="eliminacion_definitiva.php" method="post">
  <br/><br/>
  <input type="submit" value="Si, eliminar.">
</form>
<br>
<form align="center" action="mi_perfil.php" method="post">
  <br/><br/>
  <input type="submit" value="No, regresar.">
</form>
</body>

</html>