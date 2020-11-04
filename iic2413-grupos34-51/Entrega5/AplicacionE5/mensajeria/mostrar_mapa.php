<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  session_start();
  $username = $_SESSION["username"];

  $query = "SELECT * FROM usuarios WHERE username='$username';";
  $result = $db -> prepare($query);
  $result -> execute();
  $datos = $result -> fetchAll();

  $id = $datos[0][0];
  $username = $datos[0][2];
  $mensajes = json_decode(file_get_contents("https://murmuring-eyrie-29823.herokuapp.com/messages"), true);
  $mensajes_enviados = array();

  $inicio = $_POST["inicio"];
  $fin = $_POST["fin"];
  $lat = -33.499046;
  $long = -70.615131;

  foreach ($mensajes as $m) {
      if (($m["sender"] == $id) and ($m["date"] >= $inicio) and ($m["date"] <= $fin)) {
        $mensajes_enviados[] = $m;
      }
  }
  if (count($mensajes_enviados)!=0) {
      $marker_list = array();
      $lat = $mensajes_enviados[0]['lat'];
      $long = $mensajes_enviados[0]['long'];
      foreach ($mensajes_enviados as $m) {
          $marker_list[] = ["lat" => $m['lat'], "long" => $m['long']];
      }
  }
  ?>

<?php include('../templates/header.html');   ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Splinter S.A.</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="Amoeba/assets/img/favicon.png" rel="icon">
  <link href="Amoeba/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="../Amoeba/assets/img/favicon.png" rel="icon">
  <link href="../Amoeba/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="Amoeba/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="Amoeba/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="Amoeba/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="Amoeba/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../Amoeba/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Amoeba/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../Amoeba/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../Amoeba/assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="Amoeba/assets/css/style.css" rel="stylesheet">
  <link href="../Amoeba/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
	integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
	crossorigin=""/>

  <!-- =======================================================
  * Template Name: Amoeba - v2.0.0
  * Template URL: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
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

 <div id="mapid" style="height: 300px"></div>

 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
<script>
    var map = L.map('mapid').setView([<?php echo $lat ?>, <?php echo $long ?>], 10);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    <?php 
    if (count($mensajes_enviados)!=0) {
        foreach($marker_list as $marker) {
            echo 
            'L.marker([' . $marker["lat"] . ',' . $marker["long"] . ']).addTo(map);';
        }
    } ?>
</script>
<br>
<br>
<form align="center" action="mensajeria.php" method="get">
    <input type="submit" value="Volver">
</form>
<br>
</body>
</html>