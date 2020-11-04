<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  session_start();

  $username = $_SESSION["username"];
  $query = "SELECT hoteles.nombre, ciudades.nombre, hoteles.hprecio, hoteles.htelefono
  FROM ciudades, hoteles
  WHERE hoteles.cid=ciudades.cid;";
  
  # Obtiene hoteles
  $result = $db -> prepare($query);
  $result -> execute();
  $reservas = $result -> fetchAll();
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
        <h1 class="text-light"><a><span> Splinter S.A.</span></a></h1>
      </td>
      </tr>
      </table>
      </div>
      </div>
  </header><!-- End #header -->
<br><br><br><br><br>

<table align="center">
    <tr>
      <th>Hotel</th>
      <th>Ciudad</th>
      <th>Precio</th>
      <th>Telefono</th>
      <th>Comprar</th>
    </tr>
        <?php
          foreach ($reservas as $r) {
            echo "<tr>
                    <td>$r[0]</td>
                    <td>$r[1]</td>
                    <td>$r[2]</td>
                    <td>$r[3]</td>

                    <td>
                      <form action='../Navegacion/guardar_hotel.php' method='post'>
                      <input type='submit' value='Reservar Hotel'>
                      </form>
                    </td>
                  </tr>";
        }?>
</table>
<?php include('../templates/footer_consultas.html'); ?>