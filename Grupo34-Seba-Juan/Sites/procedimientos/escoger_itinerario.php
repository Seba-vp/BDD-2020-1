<?php 
require("../config/conexion.php");

#obtener lista de artistas
$result = $db2 -> prepare("SELECT id_artista,nombre_artista FROM artistas;");
$result -> execute();
$artistas = $result -> fetchAll();

#Obtener lista de ciudades
$result2 = $db2 -> prepare("SELECT DISTINCT id_ciudad, nombre_ciudad FROM ciudades;");
$result2 -> execute();
$ciudades = $result2 -> fetchAll();
?>

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
        <h1 class="text-light"><a><span> Splinter S.A.</span></a></h1>
      </td>
      </tr>
      </table>
      </div>
      </div>
  </header><!-- End #header -->
<br><br><br><br><br>

<!-- INDICAR ARTISTAS-->
<form align="center" action="crear_itinerario.php" method="post">
<h3 align ="center"> Escoja sus artistas preferidos</h3>
<br>
<table align="center">
<tr>
  <th>Artistas:</th>
</tr>
  <br>

  <?php
  foreach ($artistas as $a) { ?>
  <tr>
  <td>
  <?php
    echo 
    "<input type='checkbox' name='artistas[]' value='$a[0]'>
    <label for='$a[0]'>$a[1]</label><br>";
     ?>
     </td>
     </tr>
    <?php } ?>

</table>

<br></br>

<!-- INDICAR fecha de inicio de viaje-->

<table align="center">
<tr>
<th>Fecha Inicio:</th>
</tr>

<tr><td>

  <input type="date" name="fecha" min="<?php echo $hoy; ?>">

</td></tr>
  
</table>

<br></br>

<!-- INDICAR ciudad de inicio de viaje-->

<table align="center">
<tr>
<th>Ciudad de origen:</th>
</tr>
  <?php
  foreach ($ciudades as $c) { ?>
  <tr><td>
    <?php echo 
    "<input type='radio' name='origen' value='$c[0]' >
    <label for='$c[0]'>$c[1]</label><br>"; ?>
  </td></tr>
  <?php } ?>
</table>

  <br></br>

  <input type="submit" value="Enviar">

  <br></br>

</form>

<?php include('../templates/footer_consultas.html'); ?>