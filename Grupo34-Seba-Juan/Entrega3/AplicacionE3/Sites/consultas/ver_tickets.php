<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  session_start();

  $username = $_SESSION["username"];
  $query = "SELECT origenes.asiento, origenes.f_compra, origenes.f_viaje, origenes.nombre, ciudades.nombre
  FROM (SELECT tickets.asiento, tickets.f_compra, tickets.f_viaje, viajes.oid, viajes.did, ciudades.nombre
  FROM usuarios, tickets, viajes, ciudades WHERE username='$username' AND usuarios.uid=tickets.uid
  AND tickets.vid=viajes.vid AND viajes.oid=ciudades.cid) AS origenes, ciudades WHERE origenes.did=ciudades.cid;";
  
  # Obtiene uid
  $result = $db -> prepare($query);
  $result -> execute();
  $tickets = $result -> fetchAll();
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
        <h1 class="text-light"><a href="index.php"><span> Splinter S.A</span></a></h1>
      </td>
      </tr>
      </table>
      </div>
    </div>
  </header><!-- End #header -->
<br><br><br><br><br>

<table align="center">
    <tr>
      <th>Asiento</th>
      <th>Fecha compra</th>
      <th>Fecha viaje</th>
      <th>Origen</th>
      <th>Destino</th>
    </tr>
      <?php
        foreach ($tickets as $t) {
          echo "<tr><td>$t[0]</td><td>$t[1]</td><td>$t[2]</td><td>$t[3]</td><td>$t[4]</td></tr>";
      }
      ?>
</table>
<?php include('../templates/footer_consultas.html'); ?>