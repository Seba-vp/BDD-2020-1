<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $pais = $_POST["pais"];

  $query = "SELECT ciudades.nombre FROM paises, ciudades WHERE paises.pid=ciudades.pid AND LOWER(paises.nombre) LIKE LOWER('%$pais%');";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $ciudades = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Ciudades</th>
    </tr>
  
      <?php
        foreach ($ciudades as $c) {
          echo "<tr><td>$c[0]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>