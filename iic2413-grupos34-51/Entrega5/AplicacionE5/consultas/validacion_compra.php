<?php 
require("../config/conexion.php");
session_start();
$username = $_SESSION["username"];
$result = $db -> prepare("SELECT uid FROM usuarios WHERE username='$username';");
$result -> execute();
$usuarios = $result -> fetchAll();
$uid = $usuarios[0][0];

$vid = intval($_GET['vid']);
$f_viaje = $_GET['f_viaje'];

$result = $db -> prepare("SELECT MAX(tid) FROM tickets;");
$result -> execute();
$tickets = $result -> fetchAll();
$max_tid = $tickets[0][0];
$tid = $max_tid + 1;

$result = $db -> prepare("SELECT localtimestamp;");
$result -> execute();
$momento = $result -> fetchAll();
$f_compra = $momento[0][0];


$result = $db -> prepare("SELECT tid, asiento FROM tickets WHERE vid=$vid AND f_viaje='$f_viaje';");
$result -> execute();
$tickets = $result -> fetchAll();
$ocupados = count($tickets);
$result = $db -> prepare("SELECT capacidad FROM viajes WHERE vid=$vid;");
$result -> execute();
$viajes = $result -> fetchAll();
$capacidad = $viajes[0][0];
$disponibles = $capacidad - $ocupados;

if ($disponibles == 0){
    header("Location: ../MiPerfil/mi_perfil.php");
}
$asientos_ocupados = array();
foreach ($tickets as $t) {
    $asientos_ocupados[] = $t[1];
  }
$asientos_totales = range(1, $capacidad);
$asientos_disponibles = array_diff($asientos_totales, $asientos_ocupados);
$asientos_no_ocupados = array();
foreach ($asientos_disponibles as $a) {
    $asientos_no_ocupados[] = $a;
  }
$asiento = $asientos_no_ocupados[0];

$result = $db -> prepare("INSERT INTO tickets VALUES($tid, $uid, $vid, $asiento, '$f_compra', '$f_viaje');");
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
        <h1 class="text-light"><a href="index.php"><span> Splinter S.A.</span></a></h1>
      </td>
      </tr>
      </table>
      </div>
    </div>
  </header><!-- End #header -->
<br><br><br><br><br>

<p>Tickets comprados de manera exitosa.</p>
<?php include('../templates/footer_consultas.html'); ?>