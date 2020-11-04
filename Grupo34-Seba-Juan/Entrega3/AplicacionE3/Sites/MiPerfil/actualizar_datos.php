<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  session_start();
  $username = $_SESSION["username"];

  $query = "SELECT * FROM usuarios WHERE username='$username';";
  $result = $db -> prepare($query);
  $result -> execute();
  $datos = $result -> fetchAll();

  $nombre = $datos[0][1];
  $username = $datos[0][2];
  $correo = $datos[0][3];
  $direccion = $datos[0][4];
  $password = $datos[0][5];
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
<h2 align="center">Datos</h2>
<br>
<form align="center" action="guardar_cambios.php" method="post">
          Nombre:
          <input type="text" name="nombre" value='<?php echo $nombre;?>'>
          <br/><br/>
          Username:
          <input type="text" name="username" value='<?php echo $username;?>'>
          <br/><br/>
          Correo:
          <input type="text" name="correo" value='<?php echo $correo;?>'>
          <br/><br/>
          Dirección:
          <input type="text" name="direccion" value='<?php echo $direccion;?>'>
          <br/><br/>
          Contraseña:
          <input type="text" name="password" value='<?php echo $password;?>'>
          <br/><br/>
          <input type="submit" value="Guardar cambios">
</form>
<br>
<br>
<form align="center" action="mi_perfil.php" method="get">
    <input type="submit" value="Volver">
</form>
</body>

</html>