<?php
require("../config/conexion.php");
session_start();
$username = $_SESSION["username"];
$query = "UPDATE usuarios SET password='' WHERE username='$username';";
  
$result = $db -> prepare($query);
$result -> execute();
header("Location: cerrar_sesion.php");
?>