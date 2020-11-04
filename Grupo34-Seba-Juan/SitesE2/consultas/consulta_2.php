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



 	$query = "SELECT DISTINCT obras.lugar_exhibicion 
	 FROM obras INNER JOIN esculturas ON obras.nombre_obra = esculturas.nombre_obra
	 INNER JOIN lugares ON obras.lugar_exhibicion = lugares.nombre_lugar 
	 INNER JOIN plazas ON lugares.nombre_lugar = plazas.nombre_lugar 
	 WHERE LOWER(obras.nombre_artista_creador) LIKE LOWER('%Gian Lorenzo Bernini%');";
	$result = $db -> prepare($query);
	$result -> execute();
	$plazas = $result -> fetchAll();
  ?>
  	<br>
  	<br>
	<br>
  	<br>
	<h3 align="center">Todas las plazas que contienen esculturas de Gian Lorenzo Bernini</h3>
	<br>
  	<br>
	<table class="center">
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
