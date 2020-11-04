<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  session_start();
  if (isset($_POST['submit'])) {
    $obra_id = array_keys($_POST['submit'])[0];
  }
   # Obtiene informacion del artista
   $query = "SELECT nombre_obra, nombre_artista_creador, periodo, fecha_inicio, fecha_termino, lugar_exhibicion FROM obras WHERE id_obra='$obra_id';";
   $result = $db2 -> prepare($query);
   $result -> execute();
   $info_obra = $result -> fetchAll();

   foreach ($info_obra as $i) {
    $nombre_obra = "$i[0]";
    $nombre_lugar = "$i[5]";
    $nombre_artista = "$i[1]";
  }
    #Buscar si tiene info de material
    $querymaterial = "SELECT material FROM esculturas WHERE esculturas.id_obra='$obra_id';";
    $result2 = $db2 -> prepare($querymaterial);
    $result2 -> execute();
    $material = $result2 -> fetchAll();

    #Buscar si tiene info de tecnica
    $querytecnica = "SELECT tecnica FROM pinturas WHERE pinturas.id_obra='$obra_id';";
    $result3 = $db2 -> prepare($querytecnica);
    $result3 -> execute();
    $tecnica = $result3 -> fetchAll();

    #Buscar ciudad y pais
    $querylugar = "SELECT nombre_ciudad, pais, id_lugar FROM lugares WHERE nombre_lugar='$nombre_lugar';";
    $result4 = $db2 -> prepare($querylugar);
    $result4 -> execute();
    $lugar = $result4 -> fetchAll();
    
    foreach ($lugar as $l) {
      $id_lugar = "$l[2]";
    }

  
    #obtenemos id de artista denuevo
    $queryid = "SELECT id_artista FROM artistas WHERE nombre_artista='$nombre_artista';";
    $result5 = $db2 -> prepare($queryid);
    $result5 -> execute();
    $id_artista = $result5 -> fetchAll();
    foreach ($id_artista as $i) {
      $id_artista = "$i[0]";
    }

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

<!--Informacion de la obra  -->
<h3 align="center"> <!--Cambiar por el nombre del artista  -->
  <?php
  echo $nombre_obra,"</h3>";
  ?>

<br>

<table align="center">
<?php
  foreach ($info_obra as $i) { ?>
    <tr>
    <th>Nombre Obra</th>
    <th><?php echo "</td><td>$i[0]</td></tr>" ?></th> 
    </tr>
    <!--Artista + boton-->
    <tr>
      <th>Artista Creador</th>
      <th><?php echo "</td><td>$i[1]</td>" ?></th>
      <th></form>
          <form action="artista_unico.php" method="post">
          <input type="submit" name="submit[<?php echo $id_artista;?>]" value="Ver Artista" id=<?php echo $id_artista;?>>
      </form></th>
    </tr>
    <!-- termino artista-->
    <tr>
    <th>Periodo</th>
    <th><?php echo "</td><td>$i[2]</td></tr>" ?></th>
    </tr>
    <tr>
    <th>Fecha Inicio</th>
    <th><?php echo "</td><td>$i[3]</td></tr>" ?></th>
    </tr>
    <tr>
    <th>Fecha Termino</th>
    <th><?php echo "</td><td>$i[4]</td></tr>" ?></th>
    </tr>
    <!--Material -->
    <?php
    if(!empty($material)){ 
      ?>
      <tr>
      <th>Material</th>
      <th><?php
      foreach ($material as $m) {     
      echo "</td><td>$m[0]</td></tr>"; 
      }}   
      ?></th>
    </tr>
    <!--Tecnica -->
    <?php
    if(!empty($tecnica)){ 
      ?>
      <tr>
      <th>Tecnica</th>
      <th><?php
      foreach ($tecnica as $t) {     
      echo "</td><td>$t[0]</td></tr>";
      }} 
      ?></th>
    </tr>

    <!--Lugar + boton -->
    <tr>
      <th>Lugar de Exhibición</th>
      <th><?php echo "</td><td>$i[5]</td>" ?></th>
      <th></form>
          <form action="lugar_unico.php" method="post">
          <input type="submit" name="submit[<?php echo $id_lugar;?>]" value="Ver Lugar" id=<?php echo $id_lugar;?>>
      </form></th>
    </tr>

    <!--Ciudad -->
    <tr>
    <th>Ciudad</th>
    <th><?php
      foreach ($lugar as $l) {     
      echo "</td><td>$l[0]</td></tr>";
      } 
      ?></th>
    </tr>
    <!--pais -->
    <tr>
    <th>País</th>
    <th><?php
      foreach ($lugar as $l) {     
      echo "</td><td>$l[1]</td></tr>";
      } 
      ?></th>
    </tr>
    <?php } ?>

</table>

<br>

<form align="center" action="../consultas2/artistas.php" method="post">
  <br/><br/>
  <input type="submit" value="Ver Artistas">
</form>

</form>
</body>

</html>