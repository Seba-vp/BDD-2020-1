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

<h1 align="center">Mensajería</h1>
<br>

<section id="mensajes recibidos" class="services section-bg">
<form align="center" action="mensajes_recibidos.php" method="post">
  <input type="submit" value="Mensajes Recibidos">
</form>
</section>

<br/><br/>
<section id="mensajes enviados" class="services section-bg">
<form align="center" action="mensajes_enviados.php" method="post">
  <input type="submit" value="Mensajes Enviados">
</form>
</section>
<br/><br/>
<section id="envio de mensajes" class="services section-bg">
<form align="center" action="envio_de_mensajes.php" method="post">
  <input type="submit" value="Enviar Mensajes">
</form>
</section>
<br/><br/>
<section id="busqueda avanzada" class="services section-bg">
<form align="center" action="busqueda_avanzada.php" method="post">
  <input type="submit" value="Busqueda Avanzada">
</form>
</section>
<br/><br/>
<section id="ver mapa" class="services section-bg">
<form align="center" action="ver_mapa.php" method="post">
  <input type="submit" value="Ver Mapa">
</form>
</section>
<br/><br/>

<?php include('../templates/footer_consultas.html'); ?>