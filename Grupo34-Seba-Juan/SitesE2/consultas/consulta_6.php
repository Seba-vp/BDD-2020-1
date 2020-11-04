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


 	$query = "SELECT nombre_lugar FROM 
	 (SELECT nombre_lugar, COUNT(DISTINCT periodo) AS num_periodos
	 FROM lugares, obras 
	 WHERE lugares.nombre_lugar = obras.lugar_exhibicion
	 GROUP BY lugares.nombre_lugar) AS periodos
	 WHERE periodos.num_periodos = (SELECT COUNT(DISTINCT obras.periodo) FROM obras);";

	$result = $db -> prepare($query);
	$result -> execute();
	$lugares = $result -> fetchAll();
  ?>
  	<br>
  	<br>
  	<br>
  	<br>
	<h3 align="center">Museos, plazas o iglesias que contengan obras de todos los periodos</h3>
	<br>
  	<br>

	<table class="center">
    <tr>
		<th>Nombre</th>
		
    </tr>
	<?php
		foreach ($lugares as $lugar) {
			echo "<tr> <td>$lugar[0]</td> </tr>";
	}
	?>
	</table>

<?php include('../templates/footer.html'); ?>
