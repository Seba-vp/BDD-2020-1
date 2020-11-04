<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $query = "SELECT usuarios.uid, usuarios.nombre, reservas.inicio, reservas.fin, hoteles.nombre FROM usuarios,reservas,hoteles WHERE usuarios.uid=reservas.uid AND reservas.hid=hoteles.hid
  AND reservas.inicio>='2020-01-01' AND reservas.fin<='2020-12-31';";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $reservas = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Inicio</th>
      <th>Término</th>
      <th>Hotel</th>
    </tr>
  
      <?php
        foreach ($reservas as $r) {
          echo "<tr><td>$r[0]</td><td>$r[1]</td><td>$r[2]</td><td>$r[3]</td><td>$r[4]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>