<?php include('templates/header.html');   ?>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container">
      <div class="logo float-left">
      <table>
      <tr>
      <td>
      <a ><img src="Amoeba\assets\img\favicon.png" alt="" class="img-fluid"></a>
      </td>
      <td>
      </td>
      <td>
        <h1 class="text-light"><a ><span> Splinter S.A.</span></a></h1>
      </td>
      </tr>
      </table>
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#header">Home</a></li>
          <li><a href="#log_in">Log in</a></li>
          <li><a href="#sign_up">Sign up</a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End #header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1>Bienvenido a Splinter S.A.</h1>
      <h2>Aquí podrás consultar información sobre los paquetes de turismo</h2>
    </div>
  </section><!-- #hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="log_in" class="about">
      <div class="container">
        <div class="section-title">
          <h2>Log in</h2>
        </div>
        <form align="center" action="registros/log_in.php" method="post">
          Username:
          <input type="text" name="username">
          <br/><br/>
          Contraseña:
          <input type="password" name="password">
          <br/><br/>
          <input type="submit" value="Ingresar">
          <br/><br/>
        </form>
      </div>
   </section>
      
<!-- ======= Services Section ======= -->
    <section id="sign_up" class="services section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Sign up</h2>
        </div>
        <form align="center" action="registros/sign_up.php" method="post">
          Nombre:
          <input type="text" name="nombre">
          <br/><br/>
          Username:
          <input type="text" name="username">
          <br/><br/>
          Correo:
          <input type="text" name="correo">
          <br/><br/>
          Dirección:
          <input type="text" name="direccion">
          <br/><br/>
          Contraseña:
          <input type="password" name="password">
          <br/><br/>
          <input type="submit" value="Registrarse">
        </form>
      </div>
    </section><!-- End Services Section -->




  </main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
      <div class="copyright">
        <link rel="stylesheet" type="text/css" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
        Made with <i class="icon ion-heart"></i> by <span>Seba, Juani, Clemente & Juanjo.</span>
      </div>
      <div class="credits">
        Grupo34 y Grupo51
      </div>
    </div>
  </footer><!-- End #footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="Amoeba/assets/vendor/jquery/jquery.min.js"></script>
  <script src="Amoeba/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Amoeba/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="Amoeba/assets/vendor/php-email-form/validate.js"></script>
  <script src="Amoeba/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="Amoeba/assets/vendor/venobox/venobox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="Amoeba/assets/js/main.js"></script>

</body>
</html>
