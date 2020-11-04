<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  session_start();
  if (isset($_POST['submit'])) {
    $artista_id = array_keys($_POST['submit'])[0];
  }

  # Obtiene informacion del artista
  $query = "SELECT nombre_artista, fecha_nacimiento, fecha_fallecimiento, breve_descripcion FROM artistas WHERE id_artista='$artista_id';";
  $result = $db2 -> prepare($query);
  $result -> execute();
  $info_artista = $result -> fetchAll();

  foreach ($info_artista as $i) {
    $nombre_artista = "$i[0]";
  }

  # Obtiene obras que hizo el artista
  $query2 = "SELECT id_obra, nombre_obra FROM obras WHERE LOWER(nombre_artista_creador) LIKE LOWER('%$nombre_artista%');";
  $result2 = $db2 -> prepare($query2);
  $result2 -> execute();
  $lista_obras = $result2 -> fetchAll();

  ?>
<?php include('../templates/header.html');   ?>



<body>
  <!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container">

    <div class="logo float-left">
      <h1 class="text-light"><a href="index.html"><span>Splinter S.A</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>


    </nav><!-- .nav-menu -->
  </div>
</header><!-- End #header -->

  <br><br><br><br><br>

<!--Informacion del artista  -->
<h3 align="center"> <!--Cambiar por el nombre del artista  -->
<?php
  echo $nombre_artista,"</h3>";
  ?>

   <br>
   <p style = "margin-left: 20px ; margin-right: 20px;">   
<table align="center">
<?php
  foreach ($info_artista as $i) { ?>
    <tr>
    <th>Nombre</th>
    <th><?php echo "</td><td>$i[0]</td></tr>" ?></th> 
    </tr>
    <tr>
    <th>Fecha de nacimiento</th> 
    <th><?php echo "</td><td>$i[1]</td></tr>" ?></th>
    </tr>
    <tr>
    <th>Fecha de fallecimiento</th>
    <th><?php echo "</td><td>$i[2]</td></tr>" ?></th>
    </tr>
    <tr>
    <th>Descripción</th>
    <th><?php echo "</td><td>$i[3]</td></tr>" ?></th>
    </tr>
    <?php }
  ?>
</table>
</p>

<br>

<h3 align="center"> <!--Cambiar por el nombre del artista  -->
<?php
  echo "Obras de ",$nombre_artista,"</h3>";
  ?>

<br>

<table align="center">
  <tr>
      <th>Nombre Obra</th>
  </tr>
  <?php
    foreach ($lista_obras as $o) {
      echo "</tr><td>$o[1]</td><td>";
      ?>
      </form>
        <form action="obra_unica.php" method="post">
        <input type="submit" name="submit[<?php echo $o[0];?>]" value="Ver Obra" id=<?php echo $o[0];?>>
      </form>
      <?php       
      "</td></tr>";}
      ?>
         
      
</table>

<form align="center" action="../consultas2/artistas.php" method="post">
  <br/><br/>
  <input type="submit" value="Volver">
</form>
</body>
</html>

