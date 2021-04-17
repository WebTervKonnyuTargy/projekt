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
    $ar = 0;

    if (isset($_POST["burger"]))
      $burger = $_POST["burger"];

    foreach ($burger as $tipus) {
        if (strpos($tipus, "sajtburesz") !== FALSE)
            $ar += 250;
        if (strpos($tipus, "szpajsziburger") !== FALSE)
            $ar += 450;
        if (strpos($tipus, "mekrojal") !== FALSE)
            $ar += 300;
        if (strpos($tipus, "vegaburger") !== FALSE)
            $ar += 1000;
        if (strpos($tipus, "pitburger") !== FALSE)
            $ar += 1;
    }

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
      <li><a href = "velemeny.php" class = "menu" target = "_blank">Véleménynyilvánítás</a></li>
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
      <label>Házszám: <input type="number" name="szam"/></label> <br/>
      Milyen burgert szeretne vásárolni?
      <label><input type="checkbox" name="burger[]" value="sajtburesz"/> Sajtburesz(250Ft)</label>
      <label><input type="checkbox" name="burger[]" value="szpajsziburger"/> Szpájsziburger(450Ft)</label>
      <label><input type="checkbox" name="burger[]" value="mekrojal"/> Mekrojál(300Ft)</label>
      <label><input type="checkbox" name="burger[]" value="vegaburger"/> Vegaburger(1000Ft)</label>
      <label><input type="checkbox" name="burger[]" value="pitburger"/> Pitburger(1Ft)</label> <br/>
    </fieldset>
    <input type="submit" name="rendel" value="Rendelés"/> <br/>
 </form>
 <?php
  if (isset($siker) && $siker === TRUE) {
    echo strtolower("<p>SIKERES RENDELES! KOSZONJUK HOGY NALUNK VASAROLT!</p>");
    echo "Teljes osszeg:<br/>";
    echo $ar;
  } else {
    foreach ($hibak as $hiba) {
      echo "<p>" . $hiba . "</p>";
    }
  }
?>
</body>          
</html>