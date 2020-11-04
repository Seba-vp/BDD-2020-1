<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Recibo valores de escoger_itinerario:

  $artistas = $_POST["artistas"];
  $fecha = ($_POST["fecha"]);
  $origen = intval($_POST["origen"]);

  #empty($artistas) or
  if (empty($artistas) or ($fecha == NULL) or ($origen == NULL)){
    header("Location: escoger_itinerario.php");
  }

  $result = $db -> prepare("SELECT localtime;");
  $result -> execute();
  $horas = $result -> fetchAll();
  $hora_actual = $horas[0][0];

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
  </header><!-- End #header -->
<br><br><br><br><br>

<h3 align ="center"> Lista artistas </h3>
<h3 align ="center"> <?php print_r($artistas) ?></h3>
<h3 align ="center"> Fecha </h3>
<h3 align ="center"> <?php print_r($fecha) ?></h3>
<h3 align ="center"> Ciudad origen </h3>
<h3 align ="center"> <?php print_r($origen) ?></h3>

<br><br><br><br><br>

<?php "" ?>



<br>
<br>
<form align="center" action="escoger_itinerario.php" method="get">
    <input type="submit" value="Volver">
</form>
<br>
</body>

</html>
