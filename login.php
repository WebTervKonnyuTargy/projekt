<?php
  session_start();
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
      <li><a href = "szpajsziburger.php"  class = "menu"  target = "_blank">Aktuális ajánlatunk</a></li>
      <li><a href = "rendeles.php" class = "menu" target = "_blank">RENDELJ!!!</a></li>
      <li><a href = "login.php" class = "menu" id="aktualis" target = "_blank">Bejelentkezés</a></li>
      <li><a href = "signup.php" class = "menu" target = "_blank">Regisztráció</a></li>
    </ul><br/></div>
    <table>
      <caption>Fincsi étlap</caption>
      <tr>
        <th id = "nev">Burger neve</th>
        <th id = "ar">Ár (Ft)</th>
        <th id = "cal">Kalória (cal)</th>
        <th id = "spec">Különlegessége</th>
      </tr>
      <tr>
        <td headers = "nev" class = "burgernev">Szpájsziburger</td>
        <td headers = "ar" class = "arnev">1600</td>
        <td headers = "cal" class = "calnev">680</td>
        <td headers = "spec" class = "specnev">Szaftos sonka, csípős szósz</td>
      </tr>
      <tr>
        <td headers = "nev" class = "burgernev">Csikönburger</td>
        <td headers = "ar" class = "arnev">1200</td>
        <td headers = "cal" class = "calnev">500</td>
        <td headers = "spec" class = "specnev">Csirke, Salátahegyek</td>
      </tr>
      <tr>
        <td headers = "nev" class = "burgernev">Sajtburger</td>
        <td headers = "ar" class = "arnev">500</td>
        <td headers = "cal" class = "calnev">550</td>
        <td headers = "spec" class = "specnev">Lapos de finom</td>
      </tr>
      <tr>
        <td headers = "nev" class = "burgernev">Mekrojál</td>
        <td headers = "ar" class = "arnev">1400</td>
        <td headers = "cal" class = "calnev">550</td>
        <td headers = "spec" class = "specnev">Fenségi hús, royal szósz</td>
      </tr>
      <tr>
        <td headers = "nev" class = "burgernev">Vegaburger</td>
        <td headers = "ar cal spec" id = "összevont" colspan = 3>NEM RENDELHETŐ!:(</td>
      </tr>
    </table>
    <img src="img/xd.gif" class="gif" alt="lol" >
    <div><audio hidden autoplay>
      <source src="egyeb/nemrickroll.mp3" type="audio/mp3"/>
      Ez a szöveg akkor jelenik meg, ha a böngésző nem támogatja a hangállományok beágyazását.
    </audio></div>
  </body>          
</html>
