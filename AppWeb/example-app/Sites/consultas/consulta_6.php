<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


 	$query = "SELECT Artistas.nombre_artista, COUNT(Artistas.nombre_artista) FROM 
	Artistas INNER JOIN Obras ON Artistas.nombre_artista = Obras.nombre_artista_creador
	GROUP BY Artista.nombre_artista;";
	$result = $db -> prepare($query);
	$result -> execute();
	$museos = $result -> fetchAll();
  ?>

	<table>
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
