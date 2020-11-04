<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $id = $_POST["id"];
  $id = intval($id);

  $query = "SELECT SUM(vprecio) FROM usuarios, tickets, viajes
  WHERE usuarios.uid=$id AND usuarios.uid=tickets.uid AND tickets.vid=viajes.vid GROUP BY usuarios.uid;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $gastos = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Dinero gastado</th>
    </tr>
  
      <?php
        foreach ($gastos as $g) {
          echo "<tr><td>$g[0]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>