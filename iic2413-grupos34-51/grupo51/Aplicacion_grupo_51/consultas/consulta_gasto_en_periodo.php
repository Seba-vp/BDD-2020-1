<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $inicio = $_POST["inicio"];
  $termino = $_POST["termino"];

  $query = "SELECT usuarios.uid, usuarios.nombre, SUM(vprecio)
  FROM usuarios, tickets, viajes WHERE usuarios.uid=tickets.uid AND tickets.vid=viajes.vid
  AND f_compra>='$inicio' AND f_compra<='$termino' GROUP BY usuarios.uid ORDER BY usuarios.uid;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $gastos = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>ID</th>
      <th>nombre</th>
      <th>Dinero gastado</th>
    </tr>
  
      <?php
        foreach ($gastos as $g) {
          echo "<tr><td>$g[0]</td><td>$g[1]</td><td>$g[2]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>