<?php include('templates/header.html');   ?>

<body>
<div class="navbar">
  <a align="center"> Buscador de Arte</a>
</form></a>
</div>
  <br>
  <br>
  <br>
  <br>
  <h1 align="center">Buscador de Arte </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre obras de arte.</p>

  <br>

  
  <h3 align="center"> ¿Quieres conocer todas las obras de arte en nuestras bases?</h3>

  <form align="center" action="consultas/consulta_1.php" method="post">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres conocer todas las plazas que contienen esculturas de Gian Lorenzo Bernini?</h3>

  <form align="center" action="consultas/consulta_2.php" method="post">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Buscar museos con obras del renacimiento por país:</h3>

  <form align="center" action="consultas/consulta_3.php" method="post">
    Ingrese el nombre de un país:
    <input type="text" name="pais">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">¿Quieres conocer a cada artista y el número de obras en las que ha participado?</h3>

  <form align="center" action="consultas/consulta_4.php" method="post">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">Iglesias abiertas con frescos </h3>

  <form align="center" action="consultas/consulta_5.php" method="post">
    Hora apertura (hh:mm:ss):
    <input type="text" name="h_apertura">
    <br/>
    <br/>
    Hora cierre (hh:mm:ss):
    <input type="text" name="h_cierre">
    <br/>
    <br/>
    Ciudad:
    <input type="text" name="ciudad">
    <br/><br/>
    <br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">Museos, plazas o iglesias que contengan obras de todos los periodos:</h3>

  <form align="center" action="consultas/consulta_6.php" method="post">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <br>
  <br>
  <br>
  <br>
</body>
</html>
