<?php
  session_start();

  if (!isset($_SESSION["user"])) {
    header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="hu">
  <head>
    <title>Profilom</title>
    <meta charset="UTF-8"/>
    <link rel = "stylesheet" href = "css/formazas.css"/>
  </head>
  <body>
    <div class="menu">
    <ul>
      <li><a href = "fooldal.php" class = "menu" target = "_blank">Főoldal</a></li>
      <li><a href = "rolunk.php"  class = "menu" target = "_blank">Rólunk</a></li>
      <li><a href = "szpajsziburger.php" class = "menu" target = "_blank">Aktuális ajánlatunk</a></li>
      <li><a href = "rendeles.php" class = "menu" target = "_blank">RENDELJ!</a></li>
      <li><a href = "velemeny.php" class = "menu" target = "_blank">Véleménynyilvánítás</a></li>
      <?php if (isset($_SESSION["user"])) { ?>
      <li><a href="profile.php" class = "menu" target = "_blank" id="aktualis">Profilom</a></li>
      <li><a href="logout.php" class = "menu" target = "_blank">Kijelentkezés</a></li>
    <?php } else { ?>
      <li><a href="login.php" class = "menu" target = "_blank" >Bejelentkezés</a></li>
      <li><a href="signup.php" class = "menu" target = "_blank">Regisztráció</a></li>
    <?php } ?>
    </ul><br/></div>
    <?php
    $currentdate=date('Y-m-d');
    $registerdate=$_SESSION["user"]["date"];
    $diff = abs(strtotime($currentdate) - strtotime($registerdate));
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    $days=$days+$months*30+$years*365;
  echo "Felhasználónév: " . $_SESSION["user"]["felhasznalonev"];
  echo "<br/>";
  echo "Életkor: " . $_SESSION["user"]["eletkor"];
  echo "<br/>";
  echo "Nem: " . $_SESSION["user"]["nem"];
  echo "<br/>";
  echo "Bukott targyak: " .  implode(", ", $_SESSION["user"]["bukott"]);
  echo "<br/>";
  echo "A profilod $days napos";
?>
  </body>          
</html>


