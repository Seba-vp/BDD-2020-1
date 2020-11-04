<?php 
require("../config/conexion.php");
session_start();
$username = $_SESSION["username"];
$result = $db -> prepare("SELECT uid FROM usuarios WHERE username='$username';");
$result -> execute();
$usuarios = $result -> fetchAll();
$uid = $usuarios[0][0];

$id_lugar = intval($_GET['id_lugar']);

$result = $db -> prepare("SELECT MAX(id_compra) FROM entradas;");
$result -> execute();
$entradas = $result -> fetchAll();
$max_id_compra = $entradas[0][0];
$id_compra = $max_id_compra + 1;

$result = $db -> prepare("SELECT current_date;");
$result -> execute();
$fecha = $result -> fetchAll();
$f_compra = $fecha[0][0];

$result = $db -> prepare("INSERT INTO entradas VALUES($id_compra, $uid, $id_lugar, '$f_compra');");
$result -> execute();
?>

<?php include('../templates/header.html');   ?>

<body>
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

<p>Entrada comprada de manera exitosa.</p>

<br>
<br>
<form align="center" action="../consultas/ver_entradas.php" method="get">
    <input type="submit" value="Ver entradas">
</form>
<br>
<br>
<form align="center" action="../MiPerfil/mi_perfil.php" method="get">
    <input type="submit" value="Volver a Mi perfil">
</form>
<br>
</body>

</html>