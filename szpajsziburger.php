<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="hu">
  <head>
    <title>Szpajsziburger</title>
    <meta charset="UTF-8"/>
    <link rel = "stylesheet" href = "css/formazas.css"/>
    <style>
      @media print {  
    p {
        font-size: 12pt;
    }

    iframe {
        display: none;
    }

    h1 {
        page-break-after: avoid; 
    }

    @page {
        margin: 0.5cm;
    }
  }
    </style>
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
    <h1 class = "alcím"><em>Szpájsziburger</em> - <strong id = "arnyekstrong">Titokzatos ízek</strong><br/>
    <img src = "img/spicy.jpg" alt = "spicy burger" title = "spicy ízek" id="spicy" height = "350"/></h1>

    <div>
      <p id = "szpájszi">Sertéshúspogácsa zsemlében, jégsalátával, sült hagymával és <em>pikáns</em> szósszal.<br/>
        A termék a <span id = "mcreggeli">McReggelit®</span> árusító éttermekben 10:30 után kapható. A termék baconnel is kérhető.<br/>
        Akik másodjára veszik fel a logikát, 1-et fizet, 2-t vihet akcióban részesülnek. KAPÓS!!!!!!</p>
    </div>
    <div id="link">
      <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">A Szpájszi burger titkos receptje</a>   
    </div>
  </body>          
</html>