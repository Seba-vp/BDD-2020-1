<?php include('../templates/header.html');   ?>

<body>
<div class="navbar">
  <a align="center"> Buscador de Arte</a>
  <a align="center"> <form action="../index.php" method="get">
    <input type="submit" value="Volver">
</form></a>
</div>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
	$h_apertura = $_POST["h_apertura"];
	$h_cierre = $_POST["h_cierre"];
	$ciudad = $_POST["ciudad"];

 	$query = "SELECT DISTINCT iglesias.nombre_lugar, frescos.nombre_obra FROM iglesias 
	 INNER JOIN lugares ON iglesias.nombre_lugar = lugares.nombre_lugar 
	 INNER JOIN obras ON obras.lugar_exhibicion = iglesias.nombre_lugar 
	 INNER JOIN frescos ON obras.nombre_obra = frescos.nombre_obra 
	 WHERE iglesias.hora_apertura <= '$h_apertura' and iglesias.hora_cierre >= '$h_cierre' and LOWER(lugares.nombre_ciudad) LIKE LOWER('%$ciudad%');";
	$result = $db -> prepare($query);
	$result -> execute();
	$iglesias = $result -> fetchAll();
  ?>
  	<br>
  	<br>
  	<br>
  	<br>
	<h3 align="center">Iglesias abiertas y sus frescos</h3>
	<br>
  	<br>

	<table class="center">
    <tr>
		<th>Nombre Iglesia</th>
		<th>Nombre Fresco</th>
    </tr>
  <?php
	foreach ($iglesias as $iglesia) {
		echo "<tr> <td>$iglesia[0]</td> <td>$iglesia[1]</td> </tr>";
  }
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
