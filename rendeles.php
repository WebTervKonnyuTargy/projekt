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
  </body>          
</html>