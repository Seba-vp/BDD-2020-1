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

 	$query = "SELECT DISTINCT nombre_obra FROM obras ;";
	$result = $db -> prepare($query);
	$result -> execute();
	$obras = $result -> fetchAll();
	  ?>
	<br>
  	<br>
	<br>
  	<br>
	<h3 align="center">Todas las obras de arte</h3>
	<br>
	<br>
  	<table class="center">
		<tr>
			<th>Nombre Obra</th>
		</tr>
	<?php
		foreach ($obras as $obra) {
			echo "<tr> <td>$obra[0]</td> </tr>";
	}
	?>
	</table>
<?php include('../templates/footer.html'); ?>
