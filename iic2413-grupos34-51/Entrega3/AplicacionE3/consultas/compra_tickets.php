<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $fecha_viaje = $_POST["fecha_viaje"];
  $origen = intval($_POST["origen"]);
  $destino = intval($_POST["destino"]);
  if (($fecha_viaje == NULL) or ($origen == NULL) or ($destino == NULL)){
    header("Location: escoger_dia.php");
  }

  $result = $db -> prepare("SELECT localtime;");
  $result -> execute();
  $horas = $result -> fetchAll();
  $hora_actual = $horas[0][0];

  $result = $db -> prepare("SELECT current_date;");
  $result -> execute();
  $fechas = $result -> fetchAll();
  $hoy = $fechas[0][0];

  if ($fecha_viaje == $hoy){
    $query = "SELECT vid, oid, did, medio, hora, vprecio, capacidad FROM viajes WHERE oid=$origen AND did=$destino
    AND hora>'$hora_actual' ORDER BY medio, hora;";
  }
  else {
    $query = "SELECT vid, oid, did, medio, hora, vprecio, capacidad FROM viajes WHERE oid=$origen AND did=$destino
    ORDER BY medio, hora;";
  }
  # Obtiene uid
  $result = $db -> prepare($query);
  $result -> execute();
  $viajes = $result -> fetchAll();
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
      <th>Medio   </th>
      <th>Hora    </th>
      <th>Precio  </th>
      <th>Cupos disponibles</th>
      <th>Comprar </th>
    </tr>
      <?php
      foreach ($viajes as $v) {
        $result = $db -> prepare("SELECT tid FROM tickets WHERE vid=$v[0] AND f_viaje='$fecha_viaje';");
        $result -> execute();
        $tickets = $result -> fetchAll();
        $ocupados = count($tickets);
        $disponibles = $v[6] - $ocupados;

        if ($disponibles == 0){
          echo "<tr><td>$v[3]</td><td>$v[4]</td><td>$v[5]</td><td>$disponibles</td><td>Agotado</td></tr>";
        }
        else{
          $boton_compra = "<a href='validacion_compra.php?vid=$v[0]&f_viaje=$fecha_viaje'>Comprar</a>";
          echo "<tr><td>$v[3]</td><td>$v[4]</td><td>$v[5]</td><td>$disponibles</td><td>$boton_compra</td></tr>";
        }
      }
      ?>
</table>
<br>
<br>
<form align="center" action="escoger_dia.php" method="get">
    <input type="submit" value="Volver">
</form>
<br>
</body>

</html>
