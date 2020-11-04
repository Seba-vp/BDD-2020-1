<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$pais = $_POST["pais"];


 	$query = "SELECT DISTINCT Obras.lugar_exhibicion FROM Obras 
	 INNER JOIN Museos ON Obras.lugar_exhibicion = Museos.nombre_lugar
	 INNER JOIN Lugares ON Lugares.nombre_lugar = Museos.nombre_lugar 
	 WHERE Obras.periodo LIKE '%renacimiento%' and Lugares.pais LIKE '%$pais%' and LOWER(Lugares.pais) LIKE LOWER('%$pais%');";
	$result = $db -> prepare($query);
	$result -> execute();
	$museos = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Museos de $pais con obras del renacimiento</th>
    </tr>
  <?php
	foreach ($museos as $museo) {
  		echo "<tr> <td>$museo[0]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
