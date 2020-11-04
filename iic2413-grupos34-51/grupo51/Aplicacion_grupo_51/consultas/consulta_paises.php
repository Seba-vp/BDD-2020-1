<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $username = $_POST["username"];

  $query = "SELECT DISTINCT paises.nombre FROM usuarios, reservas, hoteles, ciudades, paises WHERE LOWER(username) LIKE LOWER('%$username%')
  AND usuarios.uid=reservas.uid AND reservas.hid=hoteles.hid AND hoteles.cid=ciudades.cid AND ciudades.pid=paises.pid;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $paises = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Paises</th>
    </tr>
  
      <?php
        foreach ($paises as $p) {
          echo "<tr><td>$p[0]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>