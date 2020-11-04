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
  $mensajes_recibidos = array();

  foreach ($mensajes as $m) {
      if ($m["receptant"] == $id) {
        $mensajes_recibidos[] = $m;
      }
  }
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

<h1>Mensajes recibidos</h1>
<br>

<?php
  foreach ($mensajes_recibidos as $m) { ?>
  <table>
    <tr>
    <th>Date</th>
    <?php echo "<td>$m[date]</td>" ?>
    </tr>

    <tr>
    <th>Lat</th> 
    <?php echo "<td>$m[lat]</td>" ?>
    </tr>

    <tr>
    <th>Long</th>
    <?php echo "<td>$m[long]</td>" ?>
    </tr>

    <tr>
    <th>Message</th>
    <?php echo "<td>$m[message]</td>" ?>
    </tr>

    <tr>
    <th>Mid</th>
    <?php echo "<td>$m[mid]</td>" ?>
    </tr>

    <tr>
    <th>Receptant</th>
    <?php echo "<td>$m[receptant]</td>" ?>
    </tr>

    <tr>
    <th>Sender</th>
    <?php echo "<td>$m[sender]</td>" ?>
    </tr>
    </table>

    <br>
    <?php } ?>

<br>
<br>
<form align="center" action="mensajeria.php" method="get">
    <input type="submit" value="Volver">
</form>
<br>
</body>

</html>