<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  session_start();

  $query = "SELECT DISTINCT nombre_artista, id_artista FROM artistas;";
  
  # Obtiene lista de artistas
  $result = $db2 -> prepare($query);
  $result -> execute();
  $artistas = $result -> fetchAll();
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
    </div>
  </header><!-- End #header -->
<br><br><br><br><br>

<h3 align="center"> Todos los Artistas</h3>

<br><br>

<table align="center">
    <tr>
      <th>Artista</th>
    </tr>
      <?php
        foreach ($artistas as $a) {
          echo "<tr><td>$a[0]</td><td>";
          ?>
          </form>
            <form action="artista_unico.php" method="post">
            <input type="submit" name="submit[<?php echo $a[1];?>]" value="Ver Artista" id=<?php echo $a[1];?>>
          </form>
          <?php       
          "</td></tr>";}
          ?>
      
</table>
<?php include('../templates/footer_consultas.html'); ?>

