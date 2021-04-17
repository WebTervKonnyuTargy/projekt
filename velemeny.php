<?php
  session_start();
  include "kozos.php";
   $hibak = [];

  if (isset($_GET["velemeny"])) {
    
    if (!isset($_GET["burger"]) || trim($_GET["burger"]) === "")
      $hibak[] = strtolower("AZ ELSO MEZO KITOLTESE KOTELEZO!");

    if (!isset($_GET["munkatars"]) || trim($_GET["munkatars"]) === "")
      $hibak[] = strtolower("A MASODIK MEZO KITOLTESE KOTELEZO!");

    if (!isset($_GET["ajanlas"]) || trim($_GET["ajanlas"]) === "")
      $hibak[] = strtolower("AZ AJANLAS MEGADASA KOTELEZO!");

    $burger = $_GET["burger"];
    $munkatars = $_GET["munkatars"];
    $ajanlas = NULL;
    $extra = $_GET["extra"];

    if (isset($_GET["ajanlas"]))
      $ajanlas = $_GET["ajanlas"];

    if ($burger < 1 || $burger > 10)
        $hibak[] = strtolower("AZ ELSO MEZOBEN KEREM 1-10 KOZTI SZAMOT ADJON MEG!");

    if ($munkatars < 1 || $munkatars > 10)
        $hibak[] = strtolower("A MASODIK MEZOBEN KEREM 1-10 KOZTI SZAMOT ADJON MEG!");

    if (strlen($extra) > 200)
        $hibak[] = strtolower("KEREM MAX. 200 KARAKTERBEN FEJTSE KI VELEMENYET!");

    if (count($hibak) === 0) {
      $velemenyek[] = ["burger" => $burger, "munkatars" => $munkatars, "ajanlas" => $ajanlas, "extra" => $extra];
      saveUsers("velemenyek", $velemenyek);
      $siker = TRUE;
    } else {
      $siker = FALSE;
    }
  }
?>
<!DOCTYPE html>
<html lang="hu">
  <head>
    <title>Vélemény</title>
    <meta charset="UTF-8"/>
    <link rel = "stylesheet" href = "css/formazas.css"/>
  </head>
  <body>
    <div class="menu">
    <ul>
      <li><a href = "fooldal.php" class = "menu" target = "_blank" >Főoldal</a></li>
      <li><a href = "rolunk.php"  class = "menu" target = "_blank">Rólunk</a></li>
      <li><a href = "szpajsziburger.php" class = "menu" target = "_blank">Aktuális ajánlatunk</a></li>
      <li><a href = "rendeles.php" class = "menu" target = "_blank">RENDELJ!</a></li>
      <li><a href = "velemeny.php" class = "menu" target = "_blank" id = "aktualis">Véleménynyilvánítás</a></li>
      <?php if (isset($_SESSION["user"])) { ?>
      <li><a href="profile.php" class = "menu" target = "_blank">Profilom</a></li>
      <li><a href="logout.php" class = "menu" target = "_blank">Kijelentkezés</a></li>
    <?php } else { ?>
      <li><a href="login.php" class = "menu" target = "_blank">Bejelentkezés</a></li>
      <li><a href="signup.php" class = "menu" target = "_blank">Regisztráció</a></li>
    <?php } ?>
    </ul><br/></div>
    <form action="velemeny.php" method="GET">
    <fieldset class="urlap">
      <legend>Köszönjük hogy segíti munkánkat!</legend>
      <label>10-es skálán mennyire elégedett burgereink ízével? <input type="number" name="burger" max="10" min="0"/></label> <br/>
      <label>10-es skálán mennyire elégedett munkatársaink munkájával? <input type="number" name="munkatars" max="10" min="0"/></label> <br/>
      Mennyire ajánlaná éttermünk barátainak, ismerőseinek?
      <label><input type="radio" name="ajanlas" value="-"/> Uh, hát nem nagyon...</label>
      <label><input type="radio" name="ajanlas" value="0"/> Talán, még meggondolom</label>
      <label><input type="radio" name="ajanlas" value="+"/> MÁR AJÁNLOM IS SENPAI!</label> <br/>
      Ha van bármi extra véleménye, nyugodtan fejtse ki!
      <textarea name="extra" rows="5" cols="50" maxlength="200"
        placeholder="Írd meg a véleményedet (max. 200 karakter)!"></textarea>
    </fieldset>
    <input type="submit" name="velemeny" value="Beküldés"/> <br/>
    </form>
    <?php
    if (isset($siker) && $siker === TRUE) {
    echo strtoupper("<p>koszonjuk egyuttmukodeset!</p>");
    echo "Az alabbi valaszait rogzitettuk rendszerunkben, megnyugodhat;3<br/>";
    echo "Burgereinket ennyire szereti: $burger<br/>";
    echo "Munkatarsaink Ön szerint ennyire vegeznek jo munkat: $munkatars<br/>";
    echo "Ennyire ajanlana üzletünk baratainak, ismeroseinek: ";
    if ($ajanlas == "+")
        echo "MÁR AJÁNLOM IS SENPAI!<br/>";
    if ($ajanlas == "0")
        echo "Talán, még meggondolom<br/>";
    if ($ajanlas == "-")
        echo "Uh, hát nem nagyon...<br/>";
    if ($extra !== "")
        echo "Tovabba Ön szerint: $extra";
    } else {
        foreach ($hibak as $hiba) {
            echo "<p>" . $hiba . "</p>";
        }
    }
    ?>
  </body>          
</html>