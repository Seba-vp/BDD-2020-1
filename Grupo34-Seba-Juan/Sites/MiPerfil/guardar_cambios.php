<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  session_start();
  $username = $_SESSION["username"];

  #Se obtiene el valor del input del usuario
  $nombre_nuevo = $_POST["nombre"];
  $username_nuevo = $_POST["username"];
  $correo_nuevo = $_POST["correo"];
  $direccion_nuevo = $_POST["direccion"];
  $password_nuevo = $_POST["password"];

  $query = "SELECT uid FROM usuarios WHERE username='$username';";
  $result = $db -> prepare($query);
  $result -> execute();
  $datos = $result -> fetchAll();

  $uid = $datos[0][0];
 
  if (($nombre_nuevo == NULL) or ($username_nuevo == NULL)
  or ($correo_nuevo == NULL) or ($direccion_nuevo == NULL) or ($password_nuevo == NULL)){
      $mensaje = "<p>Por favor complete todos los campos requeridos.</p>";
}
  elseif ($username_nuevo == $username){
    $result = $db -> prepare("UPDATE usuarios SET nombre='$nombre_nuevo' WHERE uid='$uid';");
    $result -> execute();
    $result = $db -> prepare("UPDATE usuarios SET correo='$correo_nuevo' WHERE uid='$uid';");
    $result -> execute();
    $result = $db -> prepare("UPDATE usuarios SET udireccion='$direccion_nuevo' WHERE uid='$uid';");
    $result -> execute();
    $result = $db -> prepare("UPDATE usuarios SET password='$password_nuevo' WHERE uid='$uid';");
    $result -> execute();
    $mensaje = "<p>Datos actualizados correctamente.</p>";
  }
  else{
    $existencia = $db -> prepare("SELECT username FROM usuarios WHERE username='$username_nuevo';");
    $existencia -> execute();
    $usernames_iguales = $existencia -> fetchAll();
    if (count($usernames_iguales) == 0){
        $result = $db -> prepare("UPDATE usuarios SET nombre='$nombre_nuevo' WHERE uid='$uid';");
        $result -> execute();
        $result = $db -> prepare("UPDATE usuarios SET username='$username_nuevo' WHERE uid='$uid';");
        $result -> execute();
        $result = $db -> prepare("UPDATE usuarios SET correo='$correo_nuevo' WHERE uid='$uid';");
        $result -> execute();
        $result = $db -> prepare("UPDATE usuarios SET udireccion='$direccion_nuevo' WHERE uid='$uid';");
        $result -> execute();
        $result = $db -> prepare("UPDATE usuarios SET password='$password_nuevo' WHERE uid='$uid';");
        $result -> execute();
        $mensaje = "<p>Datos actualizados correctamente.</p>";
        $_SESSION["username"] = $username_nuevo;
        $username = $username_nuevo;
    }
    else{
        $mensaje = "<p>El username escogido ya existe, por favor escoga otro.</p>";
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

<?php echo $mensaje; ?>
<br>
<form align="center" action="actualizar_datos.php" method="get">
    <input type="submit" value="Volver">
</form>
</body>

</html>