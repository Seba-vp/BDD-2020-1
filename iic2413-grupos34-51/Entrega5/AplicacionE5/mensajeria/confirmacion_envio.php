<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  session_start();
  $username = $_SESSION["username"];

  $query = "SELECT * FROM usuarios WHERE username='$username';";
  $result = $db -> prepare($query);
  $result -> execute();
  $datos = $result -> fetchAll();

  $result = $db -> prepare("SELECT current_date;");
  $result -> execute();
  $fechas = $result -> fetchAll();
  $hoy = $fechas[0][0];

  $id = $datos[0][0];
  $username = $datos[0][2];
  $destinatario = $_POST["destinatario"];
  $mensaje = $_POST["mensaje"];
  $usuarios = json_decode(file_get_contents("https://murmuring-eyrie-29823.herokuapp.com/users"), true);
  $usuario_objetivo = NULL;
  foreach ($usuarios as $u) {
      if ($u['name']==$destinatario) {
          $usuario_objetivo = $u['uid'];
      }
  }
  if ($mensaje==NULL) {
      $respuesta = "Mensaje vacío, debe escribir algo para que sea enviado.";
  }
  elseif ($usuario_objetivo==NULL) {
    $respuesta = "El destinatario escogido no existe.";
  }
  else {
      $respuesta = "Mensaje enviado con exito.";
      $data = array("message" => $mensaje, "sender" => $id,
      "receptant" => $usuario_objetivo, "lat" => -33.499046, "long" => -70.615131, "date" => $hoy);
      $options = array(
        'http' => array(
          'method'  => 'POST',
          'content' => json_encode( $data ),
          'header'=>  "Content-Type: application/json\r\n" .
                      "Accept: application/json\r\n"
          )
      );
      $url = "https://murmuring-eyrie-29823.herokuapp.com/messages";
      $context  = stream_context_create( $options );
      $result = file_get_contents( $url, false, $context );
      $response = json_decode( $result );
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

<?php 
echo $respuesta;
?>

<br>
<br>
<form align="center" action="mensajeria.php" method="get">
    <input type="submit" value="Volver">
</form>
<br>
</body>

</html>