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
  echo "<h1 align=".'"center"'.">Bienvenido a su perfil ".$username.".</h1>";
  ?>
<br>
<section id="titulo" class="services section-bg">
<h3 align="center">Aquí podrás consultar la información que necesites.</h3>
</section>

<br/><br/>
<section id="ver artistas" class="services section-bg">
<form align="center" action="../consultas2/artistas.php" method="post">
  <input type="submit" value="Ver Artistas">
</form>
</section>

<br/><br/>
<section id="ticket" class="services section-bg">
<form align="center" action="../consultas/ver_tickets.php" method="post">
  <input type="submit" value="Ver Tickets">
</form>
</section>
<br/><br/>
<section id="reserva" class="services section-bg">
<form align="center" action="../consultas/ver_reservas.php" method="post">
  <input type="submit" value="Ver Reservas">
</form>
</section>
<br/><br/>
<section id="entradas" class="services section-bg">
<form align="center" action="../consultas/ver_entradas.php" method="post">
  <input type="submit" value="Ver Entradas">
</form>
</section>
<br/><br/>
<section id="comprarticket" class="services section-bg">
<form align="center" action="../consultas/escoger_dia.php" method="post">
  <input type="submit" value="Comprar Tickets">
</form>
</section>
<br/><br/>
<section id="reservarhotel" class="services section-bg">
<form align="center" action="../consultas/escoger_dia_hoteles.php" method="post">
  <input type="submit" value="Reservar Hotel">
</form>
</section>
<br/><br/>
<section id="buscariterario" class="services section-bg">
<form align="center" action="../procedimientos/escoger_itinerario.php" method="post">
  <input type="submit" value="Escoger Itinerario">
</form>
</section>
<br/><br/>


</body>

</html>