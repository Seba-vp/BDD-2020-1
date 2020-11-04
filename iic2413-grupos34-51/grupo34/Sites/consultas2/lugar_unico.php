<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  session_start();
  if (isset($_POST['submit'])) {
    $lugar_id = array_keys($_POST['submit'])[0];
  }
   # Obtiene informacion del lugar
   $query = "SELECT nombre_lugar,nombre_ciudad,pais,numero_contacto FROM lugares WHERE id_lugar='$lugar_id';";
   $result = $db2 -> prepare($query);
   $result -> execute();
   $info_lugar = $result -> fetchAll();

   foreach ($info_lugar as $i) {
    $nombre_lugar = "$i[0]";
  }
    #Buscar si tiene info de horarios (IGLESIAS)
    $queryiglesias = "SELECT hora_apertura,hora_cierre FROM iglesias WHERE id_lugar='$lugar_id';";
    $result2 = $db2 -> prepare($queryiglesias);
    $result2 -> execute();
    $horarios_iglesia = $result2 -> fetchAll();

    #Buscar si tiene info de horarios y precio (MUSEOS)
    $querymuseos = "SELECT hora_apertura,hora_cierre,precio FROM museos WHERE id_lugar='$lugar_id';";
    $result3 = $db2 -> prepare($querymuseos);
    $result3 -> execute();
    $horariosyprecios_museo = $result3 -> fetchAll();

    #Buscar obras con sus fechas
    $queryobras = "SELECT nombre_obra,fecha_inicio,fecha_termino, periodo, id_obra FROM obras WHERE lugar_exhibicion='$nombre_lugar';";
    $result4 = $db2 -> prepare($queryobras);
    $result4 -> execute();
    $obras = $result4 -> fetchAll();

    #Buscar artistas
    $queryartistas = "SELECT DISTINCT nombre_artista_creador, id_artista FROM obras JOIN artistas ON nombre_artista_creador = nombre_artista WHERE lugar_exhibicion='$nombre_lugar';";
    $result5 = $db2 -> prepare($queryartistas);
    $result5 -> execute();
    $artistas = $result5 -> fetchAll();

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

<!--Informacion del lugar  -->
<h3 align="center"> <!--Cambiar por el nombre del artista  -->
  <?php
  echo $nombre_lugar,"</h3>";
  ?>
<br>
<table align="center">
<?php
  foreach ($info_lugar as $i) { ?>
    <tr>
    <th>Nombre Lugar</th>
    <th><?php echo "</td><td>$i[0]</td></tr>" ?></th> 
    </tr>
    <tr>
    <th>Ciudad</th> 
    <th><?php echo "</td><td>$i[1]</td></tr>" ?></th>
    </tr>
    <tr>
    <th>País</th>
    <th><?php echo "</td><td>$i[2]</td></tr>" ?></th>
    </tr>
    <tr>
    <th>Número de contacto</th>
    <th><?php echo "</td><td>$i[3]</td></tr>" ?></th>
    </tr>
    <?php } ?>
    <!--Iglesia  HA y HC-->
    <?php
    if(!empty($horarios_iglesia)){
      ?>
      <tr>
      <th>Hora Apertura</th>
      <th><?php
      foreach ($horarios_iglesia as $h) {     
      echo "</td><td>$h[0]</td></tr>"; 
      }   
      ?></th></tr>
      <tr>
      <th>Hora Cierre</th>
      <th><?php
      foreach ($horarios_iglesia as $h) {     
      echo "</td><td>$h[1]</td></tr>"; 
      }   
      }?></th>
      </tr>
    <!--Museo  HA HC y P-->
    <?php 
    if(!empty($horariosyprecios_museo)){
      ?>
    <tr>
    <th>Horario Apertura</th>
    <th><?php
    foreach ($horariosyprecios_museo as $t) {     
     echo "</td><td>$t[0]</td></tr>";
    } 
      ?></th>
    </tr>
    <tr>
    <th>Horario Cierre</th>
    <th><?php
    foreach ($horariosyprecios_museo as $t) {     
     echo "</td><td>$t[1]</td></tr>";
    }
    ?></th>
    </tr>
    <tr>
    <th>Precio</th>
    <th><?php
    foreach ($horariosyprecios_museo as $t) {     
     echo "</td><td>$t[2]</td></tr>";
    } ?>
    <tr>
    <th>Comprar Entrada</th>
    <td>
    </form>
    <!--Boton de comra---------------------------------------------------------------------------------------------------------------------------- -->
        <form action="artistas.php" method="post">
        <input type="submit" name="submit[<?php echo "$o[4]";?>]" value="Comprar entrada" id=<?php echo "$o[4]";?>>
    <!--Boton de comra---------------------------------------------------------------------------------------------------------------------------- -->
    </form>
    </td>
    </tr>
    
    <?php }  ?></th>
    </tr>

    <!--Fin -->
    <tr>
</table>

<br>

<!--Tabla obras del lugar  -->

<h3 align="center"> 
  <?php
  echo"Obras en ", $nombre_lugar,"</h3>";
  ?>

  <br>

<table align="center">
<tr>
    <th>Nombre Obra</th>
    <th>Fecha Inicio</th>
    <th>Fecha Termino</th>
    <th>Periodo</th>
</tr>

<?php
  foreach ($obras as $o) { ?>
  <tr>
    <?php echo "<td>$o[0]</td>" ?>
    <?php echo "<td>$o[1]</td>" ?>
    <?php echo "<td>$o[2]</td>" ?>
    <?php echo "<td>$o[3]</td>" ?>
    <td>
    </form>
        <form action="obra_unica.php" method="post">
        <input type="submit" name="submit[<?php echo "$o[4]";?>]" value="Ver Obra" id=<?php echo "$o[4]";?>>
    </form>
    </td>
  </tr>
    
    <?php } ?>

</table>

<br>

<!--Tabla Artistas  -->

<h3 align="center"> 
  <?php
  echo"Artistas de ", $nombre_lugar,"</h3>";
  ?>

  <br>

<table align="center">
<tr>
    <th>Nombre Artista</th>
</tr>

<?php
  foreach ($artistas as $a) { ?>
  <tr>
    <?php echo "<td>$a[0]</td>" ?>
    <td>
    </form>
        <form action="artista_unico.php" method="post">
        <input type="submit" name="submit[<?php echo "$a[1]";?>]" value="Ver Artista" id=<?php echo "$a[1]";?>>
    </form>
    </td>
  </tr>
    
    <?php } ?>

</table>

<form align="center" action="../consultas2/artistas.php" method="post">
  <br/><br/>
  <input type="submit" value="Ver Artistas">
</form>

</form>
</body>

</html>