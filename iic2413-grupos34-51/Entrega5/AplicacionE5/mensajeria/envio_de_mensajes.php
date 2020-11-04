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

<h1 align="center">Envío de mensajes</h1>
<br>
<form align="center" action="confirmacion_envio.php" method="post">
          Destinatario:
          <input type="text" name="destinatario">
          <br/><br/>
          Mensaje:
          <input type="text" name="mensaje">
          <br/><br/>
          <input type="submit" value="Enviar">
</form>

<br>
<br>
<form align="center" action="mensajeria.php" method="get">
    <input type="submit" value="Volver">
</form>
<br>
</body>

</html>