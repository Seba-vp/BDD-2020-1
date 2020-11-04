<?php
  require("../config/conexion.php");

  $inicio = $_POST["inicio"];
  $fin = $_POST["fin"];
  if (($inicio == NULL) or ($fin == NULL)){
      header("Location: escoger_dia_hoteles.php");
    }
  elseif ($inicio >= $fin) {
      header("Location: escoger_dia_hoteles.php");
    }
  else {
    $result = $db -> prepare("SELECT hid, nombre FROM hoteles;");
    $result -> execute();
    $hoteles = $result -> fetchAll();
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
    </div>
  </header><!-- End #header -->
<br><br><br><br><br>

<table align="center">
    <tr>
      <th>Hotel   </th>
      <th>Reservar   </th>
    </tr>
      <?php
      foreach ($hoteles as $h) {
          $boton_reserva = "<a href='realizar_reserva.php?hid=$h[0]&inicio=$inicio&fin=$fin'>Reservar</a>";
          echo "<tr><td>$h[1]</td><td>$boton_reserva</td></tr>";
    }
      ?>
</table>
<br>
<br>
<form align="center" action="escoger_dia_hoteles.php" method="get">
    <input type="submit" value="Volver">
</form>
<br>
</body>

</html>