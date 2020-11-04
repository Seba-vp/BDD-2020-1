<?php 
require("../config/conexion.php");
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
      <table>
      <tr>
      <td>
      <a href="index.php"><img src="../Amoeba/assets/img/favicon.png" alt="" class="img-fluid"></a>
      </td>
      <td>
      </td>
      <td>
        <h1 class="text-light"><a href="index.php"><span> Splinter S.A.</span></a></h1>
      </td>
      </tr>
      </table>
      </div>
    </div>
  </header><!-- End #header -->
<br><br><br><br><br>

<h3 align ="center"> Indique las fechas entre las que desea hospedarse.</h3>
<br>
<form align="center" action="ver_hoteles.php" method="post">
  Fecha Inicio:
  <input type="date" name="inicio" min="<?php echo $hoy; ?>">
  <br></br>
  Fecha Término:
  <input type="date" name="fin" min="<?php echo $hoy; ?>">
  <br></br>
  <input type="submit" value="Ver hoteles">
</form>
<?php include('../templates/footer_consultas.html'); ?>