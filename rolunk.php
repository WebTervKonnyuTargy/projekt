<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="hu">
  <head>
    <title>Rolunk</title>
    <meta charset="UTF-8"/>
    <link rel = "stylesheet" href = "css/formazas.css"/>
  </head>
  <body>
    <div class="menu">
    <ul>
      <li><a href = "fooldal.php" class = "menu" target = "_blank">Főoldal</a></li>
      <li><a href = "rolunk.php"  class = "menu" id = "aktualis" target = "_blank">Rólunk</a></li>
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
    </ul><br/><br/><br/></div>
    <h2><mark><u>Mi ilyen motiváltak vagyunk::</u></mark></h2>
    <video controls width="800" autoplay>
      <source src="egyeb/sajt.mp4" type="video/mp4"/>
      Ez a szöveg akkor jelenik meg, ha a böngésző nem támogatja a videóállományok beágyazását.
    </video>
    <div id = "tobboszlop">
"Az én véleményem pedig az, hogy amikor egyik napról a másikra 60-70 értesítés fogadja az embert, akkor nem fog vele 2 napot eltölteni, hogy mindent figyelmesen elolvasson, valószínűleg csak át fogja futni, és megpróbálja kiszűrni belőle a lényeget. Van, akinek elkerülte a figyelmét az a tény, hogy az eredetileg nem kötelezőnek hírdetett tesztek figyelmen kívül hagyása a jövőben halállal bűntethető.

Az, hogy valaki "látott" egy közleményt az nem egy érv. A coospace akkor is olvasottra fogja állítani a értesítést, ha valaki csak belátogat a fórumra, de nem olvassa el azt, amire Ön gondol (be it a missclick, vagy csak az utolsó pár poszt elolvasása után úgy dönt az ember, hogy itt úgy se volt semmi érdekes).

Mennyire lett volna nehéz beleírni a kiírt "tesztekre", hogy a Biro2-n is elérhető egy feladat, amit kötelező jelleggel be kell adni? Én csak egy dolgot látok, ami miatt nem akarták volna azt megtenni: a rosszindulat. <span id = "mondvacsinalt">Teljesen mondvacsinált okok miatt most lehet, hogy olyan embereknek kell majd megismételnie a kurzust, akiknek a tudása megegyezik, esetleg meg is haladja a hallgatótársaiét</span>, mert elkerülte a figyelmét a sokadik értesítés egy bizonyos sora. Ahelyett, hogy magukat védenék, esetleg beláthatnák, hogy van, hogy hibáznak és olyan dolgokat követelnek meg, aminek semmi értelme nincs.

A javaslatom az, hogy ha nem akarnak engedni abból, hogy kötelező legyen a Biro2 feladatok megoldása, akkor legalább azoknak, akik a coospaces teszteket kitöltötték, lehessen legalább retroaktívan, egy előre meghírdetett időponttal határidősen beadni azokat."<br/><span id = "alairas">Dolgozóink</span>
    </div>
    <iframe src="https://www.mcdonalds.hu/mcdelivery" width="600" height="600"></iframe>
  </body>          
</html>
