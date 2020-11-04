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
        <h1 class="text-light"><a href="index.html"><span>Splinter S.A.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
    </div>
  </header><!-- End #header -->
<br><br><br><br><br>

<p>Reserva relizada de manera exitosa.</p>
<?php include('../templates/footer_consultas.html'); ?>