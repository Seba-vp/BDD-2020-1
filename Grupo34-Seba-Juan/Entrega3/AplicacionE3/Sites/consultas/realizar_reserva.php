<?php 
require("../config/conexion.php");
session_start();
$username = $_SESSION["username"];
$result = $db -> prepare("SELECT uid FROM usuarios WHERE username='$username';");
$result -> execute();
$usuarios = $result -> fetchAll();
$uid = $usuarios[0][0];

$hid = intval($_GET['hid']);
$inicio = $_GET['inicio'];
$fin = $_GET['fin'];

$result = $db -> prepare("SELECT MAX(rid) FROM reservas;");
$result -> execute();
$reservas = $result -> fetchAll();
$max_rid = $reservas[0][0];
$rid = $max_rid + 1;

$result = $db -> prepare("INSERT INTO reservas VALUES($rid, $hid, $uid, '$inicio', '$fin');");
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

<p>Reserva relizada de manera exitosa.</p>
<?php include('../templates/footer_consultas.html'); ?>