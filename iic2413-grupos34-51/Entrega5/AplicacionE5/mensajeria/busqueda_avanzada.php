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

<h1 align="center">Busqueda avanzada</h1>
<h3 align="center">(Separe las frases y/o palabras a buscar con "/", omita espacios innecesarios pues serán considerados)</h3>
<br>
<form align="center" action="resultados_busqueda.php" method="post">
          UserId:
          <input type="text" name="userid">
          <br/><br/>
          Forbidden:
          <input type="text" name="forbidden">
          <br/><br/>
          Desired:
          <input type="text" name="desired">
          <br/><br/>
          Required:
          <input type="text" name="required">
          <br/><br/>
          <input type="submit" value="Buscar">
</form>

<br>
<br>
<form align="center" action="mensajeria.php" method="get">
    <input type="submit" value="Volver">
</form>
<br>
</body>

</html>