<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  session_start();
  $username = $_SESSION["username"];
  $result = $db -> prepare("SELECT uid FROM usuarios WHERE username='$username';");
  $result -> execute();
  $usuarios = $result -> fetchAll();
  $uid = $usuarios[0][0];

  $result = $db -> prepare("SELECT id_compra,id_lugar,f_compra FROM entradas WHERE entradas.uid=$uid;");
  $result -> execute();
  $entradas = $result -> fetchAll();
  
  $result = $db2 -> prepare("SELECT id_lugar,nombre_lugar,hora_apertura,hora_cierre FROM museos;");
  $result -> execute();
  $museos = $result -> fetchAll();
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
      <th>Fecha compra   </th>
      <th>Museo   </th>
      <th>Hora de apertura  </th>
      <th>Hora de cierre   </th>
    </tr>
    <?php
    foreach ($entradas as $e) {
        foreach ($museos as $m) {
            if ($e["id_lugar"] == $m["id_lugar"]){
                echo "<tr><td>$e[2]</td><td>$m[1]</td><td>$m[2]</td><td>$m[3]</td></tr>";
            }
        }
    }
?>
</table>

<?php include('../templates/footer_consultas.html'); ?>