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
      <h1 class="text-light"><a href="index.html"><span>Splinter S.A.</span></a></h1>
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

  <?php $fotos_artistas = array(
1 => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Andrea_Mantegna_-_Cardinal_Lodovico_Trevisano_-_Google_Art_Project.jpg/1200px-Andrea_Mantegna_-_Cardinal_Lodovico_Trevisano_-_Google_Art_Project.jpg',
2 => 'https://vignette.wikia.nocookie.net/theassassinscreed/images/6/6a/Andrea-del-verrocchio-1-sized.jpg/revision/latest/top-crop/width/360/height/450?cb=20110422234830&path-prefix=es',
3 => 'https://images.fineartamerica.com/images-medium-large-5/detail-of-sculpted-portrait-paul-kimmerling.jpg',
4 => 'https://i.pinimg.com/originals/20/cd/43/20cd439282f1aff44d5d7edf68c1564b.jpg',
5 => 'https://www.biography.com/.image/t_share/MTE5NTU2MzE2NTg5MzYwNjUx/donatello-21032601-1-402.jpg',
6 => 'https://www.reprodart.com/kunst/eugene_delacroix/self_portrait_alg162137_hi.jpg',
7 => 'https://upload.wikimedia.org/wikipedia/commons/3/3d/Federico_Zuccari_%28credited%29_-_Self-portrait_-_Google_Art_Project.jpg',
8 => 'https://cloud10.todocoleccion.online/coleccionismo-pegatinas/tc/2016/01/28/10/54091136.jpg',
9 => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Giambattista_della_Porta.jpeg/220px-Giambattista_della_Porta.jpeg',
10 => 'https://upload.wikimedia.org/wikipedia/commons/e/e3/Bernini%2C_Gian_Lorenzo-Portrait_d%27homme-Montpellier%2C_mus%C3%A9e_Fabre.jpg',
11 => 'https://i.pinimg.com/originals/d0/4c/0a/d04c0a4aad645ca263552d01b7feab61.jpg',
12 => 'https://i.pinimg.com/originals/dc/c6/e7/dcc6e78c645b5d372d521793cdd4d0e2.jpg',
13 => 'https://upload.wikimedia.org/wikipedia/commons/c/c6/David_Self_Portrait.jpg',
14 => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Duquesnoy1776.jpg/220px-Duquesnoy1776.jpg',
15 => 'https://vignette.wikia.nocookie.net/pitufos/images/8/80/Pitufina-comic.jpg/revision/latest/scale-to-width-down/340?cb=20140225182817&path-prefix=es',
16 => 'https://www.biography.com/.image/t_share/MTY2MzU4MjUzMDA4MDcwMzE4/portrait-of-leonardo-da-vinci-1452-1519-getty.jpg',
17 => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Miguel_%C3%81ngel%2C_por_Daniele_da_Volterra_%28detalle%29.jpg/220px-Miguel_%C3%81ngel%2C_por_Daniele_da_Volterra_%28detalle%29.jpg',
18 => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Raffaello_Sanzio.jpg/1200px-Raffaello_Sanzio.jpg',
19 => 'https://i.pinimg.com/originals/34/53/4d/34534df808303813dc92aa2d1481e605.jpg'

) ?>
<div>
    <div style="margin-right:50px ; margin-left:50px;">
      <table align="center">
        <tr>
          <style>
          img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            }
          </style>
          <img  src="<?php echo $fotos_artistas[$artista_id] ; ?>" alt="hola" style="width:25%"; >
        </tr>
      </table>
</div>
</div>

  <br><br>

<section id="info" class="services section-bg">
<div>
  <div style="margin-right:300px ; margin-left:300px;">   
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
        <?php } ?>
    </table>
  </div>
</div>
</section>


<br><br>

<h3 align="center"> <!--Cambiar por el nombre del artista  -->
<?php
  echo "Obras de ",$nombre_artista,"</h3>";
  ?>

<br><br>

<section id="obras" class="services section-bg">
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
</section>
<br><br>
<form align="center" action="../consultas2/artistas.php" method="post">
  <br/><br/>
  <input type="submit" value="Volver a lista de Artistas">
</form>
<br/><br/>
</body>
</html>

