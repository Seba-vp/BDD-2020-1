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
      <table>
      <tr>
      <td>
      <a><img src="../Amoeba/assets/img/favicon.png" alt="" class="img-fluid"></a>
      </td>
      <td>
      </td>
      <td>
        <h1 class="text-light"><a><span> Splinter S.A</span></a></h1>
      </td>
      </tr>
      </table>
      </div>
      </div>
  </header><!-- End #header -->

<br><br><br><br><br>

<!--Informacion de la obra  -->
<h3 align="center"> <!--Cambiar por el nombre del artista  -->
  <?php
  echo $nombre_obra,"</h3>";
  ?>

<br>

<?php $fotos_obras = array( 
  1=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Andrea_Mantegna_088.jpg/220px-Andrea_Mantegna_088.jpg',
  2=> 'https://cdn.culturagenial.com/es/imagenes/la-anunciacion.jpg',
  3=> 'https://www.artehistoria.com/sites/default/files/styles/full_horizontal/public/imagenobra/LEB04276.jpg?itok=JMl2Cppb',
  4=> 'https://upload.wikimedia.org/wikipedia/commons/8/8c/Rome_basilica_st_peter_011c.jpg',
  5=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Michelangelo_Caravaggio_052.jpg/1200px-Michelangelo_Caravaggio_052.jpg',
  6=> 'https://i.pinimg.com/originals/53/42/a9/5342a9e48e083a95f729b52ead8e6c46.jpg',
  7=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Martirio_di_San_Pietro_September_2015-1a.jpg/1200px-Martirio_di_San_Pietro_September_2015-1a.jpg',
  8=> 'https://upload.wikimedia.org/wikipedia/commons/6/6c/Caravaggio_-_The_Annunciation.JPG',
  9=> 'https://upload.wikimedia.org/wikipedia/commons/0/00/Medusa_by_Caravaggio.jpg',
  10=> 'https://live.staticflickr.com/4898/32051830988_2d60c663ab_b.jpg',
  11=> 'https://img.culturacolectiva.com/cdn-cgi/image/f=auto,w=1600,q=80,fit=contain/content_image/2019/4/26/1556307357530-delacroix%20la%20libertad%20guiando%20al%20pueblo.jpg',
  12=> 'https://live.staticflickr.com/8106/8658013635_0d7e7c1018_b.jpg',
  13=> 'https://s3-eu-west-1.amazonaws.com/brussels-images/content/gallery/visit/place/Statue-Schtroumpfs_dfff70c5a19412d355dd216ed0dc7930cb786f5b_sq_640.jpg',
  14=> 'https://i.pinimg.com/originals/f9/b0/ac/f9b0ac617fc085c194403b7427fe05bb.jpg',
  15=> 'https://c8.alamy.com/compes/c8gkw7/fuente-de-neptuno-1574-creada-por-giacomo-della-porta-piazza-navona-roma-italia-c8gkw7.jpg',
  16=> 'https://upload.wikimedia.org/wikipedia/commons/7/76/Lazio_Roma_Navona2_tango7174.jpg',
  17=> 'https://3.bp.blogspot.com/-CEPDy7BWy9o/VYWXzkhwixI/AAAAAAAAGVE/OWyHFMSetd4/s1600/SAN%2BaNDR%25C3%2589S%2BDEL%2BQUIRINAL..jpg',
  18=> 'https://charlarte.com/wp-content/uploads/2019/06/bernini-935x1024.png',
  19=> 'https://upload.wikimedia.org/wikipedia/commons/e/e9/Berninis_Elephant_on_Piazza_della_Minerva_front_view.jpg',
  20=> 'https://upload.wikimedia.org/wikipedia/commons/d/d6/St_Peter%27s_Square%2C_Vatican_City_-_April_2007.jpg',
  21=> 'https://cdn.culturagenial.com/es/imagenes/final-ayd-fondo-negro-cke.jpg',
  22=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Giotto_di_Bondone_090.jpg/1200px-Giotto_di_Bondone_090.jpg',
  23=> 'https://www.artehistoria.com/sites/default/files/styles/full_horizontal/public/imagenobra/GIA15306.jpg?itok=ZObilt4S',
  24=> 'https://upload.wikimedia.org/wikipedia/commons/d/dd/Giotto._The_Badia_Polyptych._c._1300._91x340cm._Uffizi%2C_Florence..jpg',
  25=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Jacques-Louis_David_-_The_Coronation_of_Napoleon_%281805-1807%29.jpg/300px-Jacques-Louis_David_-_The_Coronation_of_Napoleon_%281805-1807%29.jpg',
  26=> 'https://live.staticflickr.com/4071/4543149449_f2f1c2e8ed_b.jpg',
  27=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/The_Last_Supper_-_Leonardo_Da_Vinci_-_High_Resolution_32x16.jpg/1200px-The_Last_Supper_-_Leonardo_Da_Vinci_-_High_Resolution_32x16.jpg',
  28=> 'https://cdn.pixabay.com/photo/2013/01/05/21/02/mona-lisa-74050_960_720.jpg',
  29=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Michelangelo%27s_Pieta_5450_cropncleaned.jpg/1200px-Michelangelo%27s_Pieta_5450_cropncleaned.jpg',
  30=> 'https://i.pinimg.com/originals/2a/2e/47/2a2e47414c352a7b19ad630b7c4c379b.jpg',
  31=> 'https://cdn.culturagenial.com/es/imagenes/moses-by-michelangelo-jbu140-cke.jpg',
  32=> 'https://cdn.culturagenial.com/es/imagenes/creacion-de-adan-0-cke.jpg',
  33=> 'https://i.pinimg.com/originals/ea/78/74/ea7874858c7da3072b09fbc46b69d4a5.png',
  34=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Raphael_Charlemagne.jpg/200px-Raphael_Charlemagne.jpg',
  35=> 'https://upload.wikimedia.org/wikipedia/commons/5/51/Transfiguration_Raphael.jpg',
  36=> 'https://arquitecturaycristianismo.files.wordpress.com/2017/02/virgennic3b1o.png?w=640',
  37=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Rapha%C3%ABl_-_Les_Trois_Gr%C3%A2ces_-_Google_Art_Project_2.jpg/1200px-Rapha%C3%ABl_-_Les_Trois_Gr%C3%A2ces_-_Google_Art_Project_2.jpg',
  38=> 'https://4.bp.blogspot.com/_GyVE4dH43Ww/RecypbRd9SI/AAAAAAAAADY/Tdth-9LtHBw/w1200-h630-p-k-no-nu/primavera.gif',
  39=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Sandro_Botticelli_-_La_nascita_di_Venere_-_Google_Art_Project_-_edited.jpg/1200px-Sandro_Botticelli_-_La_nascita_di_Venere_-_Google_Art_Project_-_edited.jpg'
) ?> 

<table align="center">
  <tr>
    <style>
    img {
      display: block;
      margin-left: auto;
      margin-right: auto;
      }
    </style>
  <img  src="<?php echo $fotos_obras[$obra_id] ; ?>" alt="hola" style="width:25%"; >
  </tr>
</table>

<br><br>

<section id="in" class="services section-bg">
<table align="center">
<?php
  foreach ($info_obra as $i) { ?>
    <tr>
    <th>Nombre Obra</th>
    <th><?php echo "</td><td>$i[0]</td></tr>" ?></th> 
    </tr>
    <!--Artista + boton-->
    <tr>
       
      <?php
      $artistas = explode(",", $i[1]);
      foreach($artistas as $a) {
      ?>
      <th>Artista Creador</th>
      <th><?php echo "</td><td>$a</td>" ?></th>
      <th>
          <?php
          require("../config/conexion.php");
          session_start(); 
          $q = "SELECT id_artista FROM artistas WHERE nombre_artista = '$a';";
          $re = $db2 -> prepare($q);
          $re -> execute();
          $id_a = $re -> fetchAll();
          foreach ($id_a as $ida) {
            $id_a = "$ida[0]";
          }
          ?>
          <form action="artista_unico.php" method="post">
          <input type="submit" name="submit[<?php echo $id_a;?>]" value="Ver Artista" id=<?php echo $id_a;?>>
      </form></th>
    </tr>
    <?php } ?>
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
</section>


<form align="center" action="../consultas2/artistas.php" method="post">
  <br/><br/>
  <input type="submit" value="Volver a lista de Artistas">
</form>
<br><br>

</body>

</html>