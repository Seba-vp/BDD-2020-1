<?php include('../templates/header.html');   ?>

<body>
  <!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container">

    <div class="logo float-left">
      <table>
      <tr>
      <td>
      <a href="index.php"><img src="../Amoeba/assets/img/favicon.png" alt="" class="img-fluid"></a>
      </td>
      <td>
      </td>
      <td>
        <h1 class="text-light"><a href="index.php"><span> Splinter S.A.</span></a></h1>
      </td>
      </tr>
      </table>
      </div>
    </div>
  </header><!-- End #header -->
<br><br><br><br><br>

<h3 align ="center"> Indique las fechas entre las que desea ver su ubicación</h3>
<br>
<form align="center" action="mostrar_mapa.php" method="post">
  Fecha Inicio:
  <input type="date" name="inicio">
  <br></br>
  Fecha Término:
  <input type="date" name="fin">
  <br></br>
  <input type="submit" value="Visualizar">
</form>

<br>
<br>
<form align="center" action="mensajeria.php" method="get">
    <input type="submit" value="Volver">
</form>
<br>
</body>

</html>