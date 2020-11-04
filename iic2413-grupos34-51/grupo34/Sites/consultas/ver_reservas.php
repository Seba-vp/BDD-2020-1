<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  session_start();

  $username = $_SESSION["username"];
  $query = "SELECT reservas.inicio, reservas.fin, hoteles.hdireccion
  FROM usuarios, reservas, hoteles WHERE username='$username' AND usuarios.uid = reservas.uid
  AND reservas.hid = hoteles.hid;";
  
  # Obtiene uid
  $result = $db -> prepare($query);
  $result -> execute();
  $reservas = $result -> fetchAll();
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

<table align="center">
    <tr>
      <th>Fecha inicio</th>
      <th>Fecha término</th>
      <th>Dirección Hotel</th>
    </tr>
      <?php
        foreach ($reservas as $r) {
          echo "<tr><td>$r[0]</td><td>$r[1]</td><td>$r[2]</td></tr>";
      }
      ?>
</table>
<?php include('../templates/footer_consultas.html'); ?>