<?php 
require("../config/conexion.php");
$result = $db -> prepare("SELECT cid,nombre FROM ciudades;");
$result -> execute();
$ciudades = $result -> fetchAll();

$result = $db -> prepare("SELECT current_date;");
$result -> execute();
$fechas = $result -> fetchAll();
$hoy = $fechas[0][0];
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

<h3 align ="center"> Escoja el día y las ciudades entre las que desea viajar.</h3>
<br>
<form align="center" action="compra_tickets.php" method="post">
  Fecha viaje:
  <input type="date" name="fecha_viaje" min="<?php echo $hoy; ?>">
  <br></br>
  Ciudad de origen:
  <br>
  <?php
  foreach ($ciudades as $c) {
    echo "<input type='radio' name='origen' value='$c[0]'>
    <label for='$c[0]'>$c[1]</label><br>";
  }
      ?>
  <br></br>
  Ciudad de destino:
  <br>
  <?php
  foreach ($ciudades as $c) {
    echo "<input type='radio' name='destino' value='$c[0]'>
    <label for='$c[0]'>$c[1]</label><br>";
  }
      ?>
  <br></br>
  <input type="submit" value="Buscar">
</form>
<?php include('../templates/footer_consultas.html'); ?>