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


 	$query = "SELECT artistas.nombre_artista, COUNT(artistas.nombre_artista) FROM 
	artistas INNER JOIN obras ON artistas.nombre_artista = obras.nombre_artista_creador
	GROUP BY artistas.nombre_artista;";
	$result = $db -> prepare($query);
	$result -> execute();
	$artistas = $result -> fetchAll();
  ?>
  	<br>
  	<br>
	<br>
  	<br>
	<h3 align="center">Artistas y numero de obras en las que han participado</h3>
	<br>
  	<br>
	<table class="center">
    <tr>
		<th>Nombre</th>
		<th>Numero de obras</th>
    </tr>
	<?php
		foreach ($artistas as $artista) {
			echo "<tr> <td>$artista[0]</td> <td>$artista[1]</td> </tr>";
	}
	?>
	</table>

<?php include('../templates/footer.html'); ?>
