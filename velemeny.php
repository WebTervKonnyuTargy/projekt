<?php
  session_start();
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
    <form action="velemeny.php" method="GET">
    <fieldset class="urlap">
      <legend>Köszönjük hogy segíti munkánkat!</legend>
      <label>10-es skálán mennyire elégedett burgereink ízével? <input type="number" name="burger"/></label> <br/>
      <label>10-es skálán mennyire elégedett munkatársaink munkájával? <input type="number" name="munkatars"/></label> <br/>
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
  </body>          
</html>