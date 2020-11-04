<?php
  session_start();
  if(($_SESSION["username"] == NULL) or ($_SESSION["password"] == NULL)){
    session_destroy();
    header("Location: ../index.php");
  }
  ?>
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
          <li class="drop-down"><a href="">Mi Perfil</a>
            <ul>
              <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
              <li><a href="eliminar_cuenta.php">Eliminar Perfil</a></li>
              <li><a href="actualizar_datos.php">Editar Perfil</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End #header -->

  <br><br><br><br><br>

  <?php
  $username = $_SESSION["username"];
  echo "<h1>Bienvenido a su perfil ".$username.".</h1>";
  ?>
<br>
<h3 align="center">Aquí podrás consultar la información que necesites.</h3>

<form align="center" action="../consultas2/artistas.php" method="post">
  <br/><br/>
  <input type="submit" value="Ver Artistas">
</form>

<form align="center" action="../consultas/ver_tickets.php" method="post">
  <br/><br/>
  <input type="submit" value="Ver Tickets">
</form>

<form align="center" action="../consultas/ver_reservas.php" method="post">
  <br/><br/>
  <input type="submit" value="Ver Reservas">
</form>

<form align="center" action="../consultas/ver_entradas.php" method="post">
  <br/><br/>
  <input type="submit" value="Ver Entradas">
</form>

<form align="center" action="../consultas/escoger_dia.php" method="post">
  <br/><br/>
  <input type="submit" value="Comprar Tickets">
</form>

<form align="center" action="../consultas/escoger_dia_hoteles.php" method="post">
  <br/><br/>
  <input type="submit" value="Reservar Hotel">
</form>
</body>

</html>