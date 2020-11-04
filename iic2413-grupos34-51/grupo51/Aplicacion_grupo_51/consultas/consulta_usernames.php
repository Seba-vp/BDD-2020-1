<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $query = "SELECT username, correo FROM usuarios;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $usernames = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>username</th>
      <th>correo</th>
    </tr>
  
      <?php
        foreach ($usernames as $u) {
          echo "<tr><td>$u[0]</td><td>$u[1]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>