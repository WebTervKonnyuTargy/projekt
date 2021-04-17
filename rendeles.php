<?php
  session_start();
  include "kozos.php";
   $fiokok = loadUsers("users");
   $hibak = [];

  if (isset($_POST["rendel"])) {
    
    if (!isset($_POST["nev"]) || trim($_POST["nev"]) === "")
      $hibak[] = strtolower("A NEV MEGADASA KOTELEZO!");

    if (!isset($_POST["varos"]) || trim($_POST["varos"]) === "")
      $hibak[] = strtolower("A VAROS MEGADASA KOTELEZO!");

    if (!isset($_POST["utca"]) || trim($_POST["utca"]) === "")
      $hibak[] = strtolower("AZ UTCA MEGADASA KOTELEZO!");

    if (!isset($_POST["szam"]) || trim($_POST["szam"]) === "")
      $hibak[] = strtolower("A HAZSZAM MEGADASA KOTELEZO!");

    if (!isset($_POST["burger"]) || count($_POST["burger"]) < 1)
      $hibak[] = strtolower("LEGALABB 1 BURGERT KOTELEZO KIVALASZTANI!");

    $nev = $_POST["nev"];
    $varos = $_POST["varos"];
    $utca = $_POST["utca"];
    $szam = $_POST["szam"];
    $burger = NULL;

    if (isset($_POST["burger"]))
      $bukott = $_POST["burger"];

    if ($szam < 1)
      $hibak[] = strtolower("HELYTELEN HAZSZAMOT ADOTT MEG!");

    if (count($hibak) === 0) {
      $rendelesek[] = ["nev" => $nev, "varos" => $varos, "utca" => $utca, "szam" => $szam, "burger" => $burger];
      saveUsers("rendelesek", $rendelesek);
      $siker = TRUE;
    } else {
      $siker = FALSE;
    }
  }
?>
<!DOCTYPE html>
<html lang="hu">
  <head>
    <title>Szpajsziburger</title>
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
      <?php if (isset($_SESSION["user"])) { ?>
      <li><a href="profile.php" class = "menu" target = "_blank">Profilom</a></li>
      <li><a href="logout.php" class = "menu" target = "_blank">Kijelentkezés</a></li>
    <?php } else { ?>
      <li><a href="login.php" class = "menu" target = "_blank">Bejelentkezés</a></li>
      <li><a href="signup.php" class = "menu" target = "_blank">Regisztráció</a></li>
    <?php } ?>
    </ul><br/></div>
    <form action="rendeles.php" method="POST">
    <fieldset class="urlap">
      <legend>Rendelési adatok</legend>
      <label>Teljes név: <input type="text" name="nev"/></label> <br/>
      <label>Város: <input type="text" name="varos"/></label> <br/>
      <label>Utca: <input type="text" name="utca"/></label> <br/>
      <label>Hazszam: <input type="number" name="szam"/></label> <br/>
      Milyen burgert szeretne vásárolni?
      <label><input type="checkbox" name="burger[]" value="sajtburesz"/> Sajtburesz</label>
      <label><input type="checkbox" name="burger[]" value="szpajsziburger"/> Szpájsziburger</label>
      <label><input type="checkbox" name="burger[]" value="mekrojal"/> Mekrojál</label>
      <label><input type="checkbox" name="burger[]" value="vegaburger"/> Vegaburger</label>
      <label><input type="checkbox" name="burger[]" value="pitburger"/> Pitburger</label> <br/>
    </fieldset>
    <input type="submit" name="rendel" value="Rendelés"/> <br/>
 </form>
 <?php
  if (isset($siker) && $siker === TRUE) {
    echo strtolower("<p>SIKERES RENDELES! KOSZONJUK HOGY NALUNK VASAROLT!</p>");
  } else {
    foreach ($hibak as $hiba) {
      echo "<p>" . $hiba . "</p>";
    }
  }
?>
</body>          
</html>