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

	$pais = $_POST["pais"];


 	$query = "SELECT DISTINCT obras.lugar_exhibicion FROM obras 
	 INNER JOIN museos ON obras.lugar_exhibicion = museos.nombre_lugar
	 INNER JOIN lugares ON lugares.nombre_lugar = museos.nombre_lugar 
	 WHERE LOWER(obras.periodo) LIKE '%renacimiento%' and LOWER(lugares.pais) LIKE LOWER('%$pais%');";
	$result = $db -> prepare($query);
	$result -> execute();
	$museos = $result -> fetchAll();
  ?>
  	<br>
  	<br>
	<br>
  	<br>
	<h3 align="center">Obras del reancimiento encontradas</h3>
	<br>
	<br>
	  
	<table class="center">
    <tr>
      <th>Museos con obras del renacimiento</th>
    </tr>
  <?php
	foreach ($museos as $museo) {
  		echo "<tr> <td>$museo[0]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
