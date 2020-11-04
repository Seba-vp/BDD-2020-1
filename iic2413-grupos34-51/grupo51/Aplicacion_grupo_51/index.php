<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Splinter S.A. </h1>
  <p style="text-align:center;">Aquí podrás consultar información sobre los paquetes de turismo</p>

  <br>

  <h3 align="center"> ¿Quieres ver el username y correo de nuestros usuarios?</h3>

  <form align="center" action="consultas/consulta_usernames.php" method="post">
  <br>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres ver las ciudades de algún país?</h3>

  <form align="center" action="consultas/consulta_ciudades.php" method="post">
    País:
    <input type="text" name="pais">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres ver los paises en que te has hospedado?</h3>

<form align="center" action="consultas/consulta_paises.php" method="post">
  Username:
  <input type="text" name="username">
  <br/><br/>
  <input type="submit" value="Buscar">
</form>

<br>
<br>
<br>

  <h3 align="center"> ¿Quieres ver tu gasto en tickets?</h3>

<form align="center" action="consultas/consulta_gasto.php" method="post">
  ID:
  <input type="text" name="id">
  <br/><br/>
  <input type="submit" value="Buscar">
</form>

<br>
<br>
<br>

  <h3 align="center"> ¿Quieres ver las reservas correspondiente al año 2020?</h3>

<form align="center" action="consultas/consulta_reservas.php" method="post">
  <br>
  <input type="submit" value="Buscar">
</form>
  
<br>
<br>
<br>

  <h3 align="center"> ¿Quieres ver los gastos en tickets de algún periodo?</h3>

<form align="center" action="consultas/consulta_gasto_en_periodo.php" method="post">
  Fecha inicio:
  <input type="date" name="inicio">
  <br/>
  Fecha término:
  <input type="date" name="termino">
  <br/><br/>
  <input type="submit" value="Buscar">
</form>

</body>
</html>
