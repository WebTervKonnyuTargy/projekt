<?php
  session_start(); 
  include "kozos.php";
  $fiokok = loadUsers("users");

  $uzenet = "";

  if (isset($_POST["login"])) {
    if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "" || !isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "") {
      $uzenet = "<strong>Hiba:</strong> Adj meg minden adatot!";
    } else {
      $felhasznalonev = $_POST["felhasznalonev"];
      $jelszo = $_POST["jelszo"];

      $uzenet = "Sikertelen belépés! A belépési adatok nem megfelelők!"; 

      foreach ($fiokok as $fiok) {              
        if ($fiok["felhasznalonev"] === $felhasznalonev && $fiok["jelszo"] === $jelszo) {
          $uzenet = "Sikeres belépés!";
          $_SESSION["user"] = $fiok;         
          header("Location: profile.php");          
        }
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="hu">
  <head>
    <title>Bejelentkezés</title>
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
      <li><a href="profile.php" class = "menu" target = "_blank">Profilom</a></li>
      <li><a href="logout.php" class = "menu" target = "_blank">Kijelentkezés</a></li>
    <?php } else { ?>
      <li><a href="login.php" class = "menu" target = "_blank" id="aktualis">Bejelentkezés</a></li>
      <li><a href="signup.php" class = "menu" target = "_blank">Regisztráció</a></li>
    <?php } ?>
    </ul><br/></div>

    <form action="login.php" method="POST">
      <label>Felhasználónév: <input type="text" name="felhasznalonev"/></label> <br/>
      <label>Jelszó: <input type="password" name="jelszo"/></label> <br/>
      <input type="submit" name="login"/> <br/><br/>
    </form>
    <?php echo $uzenet . "<br/>"; ?>
  </body>          
</html>
