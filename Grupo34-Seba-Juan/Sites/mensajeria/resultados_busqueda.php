<?php
  $userid = $_POST["userid"];
  $forbidden = $_POST["forbidden"];
  $desired = $_POST["desired"];
  $required = $_POST["required"];

  if ($userid==NULL) {
      $userid = "";
  }
  else {
    $userid = intval($userid);
  }
  if ($forbidden==NULL) {
    $forbidden_array = array();
}
else {
    $forbidden_array = explode("/", $forbidden);
}
if ($desired==NULL) {
    $desired_array = array();
}
else {
    $desired_array = explode("/", $desired);
}
if ($required==NULL) {
    $required_array = array();
}
else {
    $required_array = explode("/", $required);
}

  $data = array("userId" => $userid, "forbidden" => $forbidden_array,
  "desired" => $desired_array, "required" => $required_array);
  $options = array(
      'http' => array(
          'method'  => 'GET',
          'content' => json_encode( $data ),
          'header'=>  "Content-Type: application/json\r\n" .
          "Accept: application/json\r\n"
          )
        );
  $url = "https://murmuring-eyrie-29823.herokuapp.com/text-search";
  $context  = stream_context_create( $options );
  $result = file_get_contents( $url, false, $context );
  $response = json_decode( $result, true);
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

<h1>Resultados</h1>
<br>

<?php
  foreach ($response as $m) { ?>
  <table>
    <tr>
    <th>Date</th>
    <?php echo "<td>$m[date]</td>" ?>
    </tr>

    <tr>
    <th>Lat</th> 
    <?php echo "<td>$m[lat]</td>" ?>
    </tr>

    <tr>
    <th>Long</th>
    <?php echo "<td>$m[long]</td>" ?>
    </tr>

    <tr>
    <th>Message</th>
    <?php echo "<td>$m[message]</td>" ?>
    </tr>

    <tr>
    <th>Mid</th>
    <?php echo "<td>$m[mid]</td>" ?>
    </tr>

    <tr>
    <th>Receptant</th>
    <?php echo "<td>$m[receptant]</td>" ?>
    </tr>

    <tr>
    <th>Sender</th>
    <?php echo "<td>$m[sender]</td>" ?>
    </tr>
    </table>

    <br>
    <?php } ?>

<br>
<br>
<form align="center" action="mensajeria.php" method="get">
    <input type="submit" value="Volver">
</form>
<br>
</body>

</html>