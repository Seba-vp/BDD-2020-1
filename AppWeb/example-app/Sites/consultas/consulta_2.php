<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");



 	$query = "SELECT DISTINCT Obras.lugar_exhibicion 
	 FROM Obras INNER JOIN Esculturas ON Obras.nombre_obra = Esculturas.nombre_obra
	 INNER JOIN Lugares ON Obras.lugar_exhibicion = Lugares.nombre_lugar 
	 INNER JOIN Plazas ON Lugares.nombre_lugar = Plazas.nombre_lugar 
	 WHERE Obras.nombre_artitsta_creador LIKE '%Gian Lorenzo Bernini%' 
	 and Obras.nombre_artitsta_creador LIKE '%gian lorenzo bernini%';";
	$result = $db -> prepare($query);
	$result -> execute();
	$plazas = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Nombres de Plazas que contienen esculturas de Gian Lorenzo Bernini</th>
    </tr>
  <?php
	foreach ($plazas as $plaza) {
  		echo "<tr> <td>$plaza[0]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
