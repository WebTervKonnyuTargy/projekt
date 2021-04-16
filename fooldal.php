<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="hu">
  <head>
    <title>Meki</title>
    <meta charset="UTF-8"/>
    <link rel = "stylesheet" href = "css/formazas.css"/>
  </head>
  <body>
    <header><h3>Helo Frendz!<br/></h3></header>
    <nav>
      <div class = "menu">
        <ul>
          <li><a href = "fooldal.php" class = "menu" id = "aktualis" target = "_blank">Főoldal</a></li>
          <li><a href = "szpajsziburger.php"  class = "menu" target = "_blank">Aktuális ajánlatunk</a></li>
          <li><a href = "rendeles.php" class = "menu" target = "_blank">RENDELJ!!!</a></li>
          <?php if (isset($_SESSION["user"])) { ?>
      <li><a href="profile.php" class = "menu" target = "_blank">Profilom</a></li>
      <li><a href="logout.php" class = "menu" target = "_blank">Kijelentkezés</a></li>
    <?php } else { ?>
      <li><a href="login.php" class = "menu" target = "_blank">Bejelentkezés</a></li>
      <li><a href="signup.php" class = "menu" target = "_blank">Regisztráció</a></li>
    <?php } ?>
        </ul></div><br/>
    </nav>
    <h1>A McDonalds finomságai<br/>
    <img  id = fokep src="img/meki.png" alt="burger" title="wide burgeer" width="500"/></h1>
    <aside>
      <img class = oldal src = "img/aside.jpg" alt = "funny" title = "lecgo" height = 460 width="400"><br/>
    </aside>

    <section>
      <article id = "lovin">
        I'm lovin it! Gyere hozzánk csodás burgerekért, amikről eddig csak álmodni mertél! 
        Igazi kaland vár rád!;)<br/>
        U.I.<br/>
        Nálunk a padló csúszik nem a gónósz egyetem:)
      </article>
      <br/><br/>
       <article id = "JELENTKEZZ">
         Am jelentkezhetsz is, infósokat kifejezetten szeretettel<br/> várunk. OJO van, ráérsz!!!
       </article>
    </section>
    <main id = "imgmap">
      <figure>
        <img src="img/kinalat.jpg" alt="Kinalat" title="Kattints a burgerekre!" usemap="#imgmap" height = 400>
        <figcaption>Fig.1 - Kedves Ferenc...ööö Meki</figcaption>
      </figure>

      <map name="imgmap2">
        <area shape="circle" coords="150,200,150" alt="burger1" href="https://www.youtube.com/watch?v=pM9C4Q6USO4" target = "_blank">
        <area shape="circle" coords="350,200,150" alt="burger2" href="https://www.youtube.com/watch?v=C9xbmDHg6v4" target = "_blank">
        <area shape="circle" coords="575,200,150" alt="burger3" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target = "_blank">
      </map> 
    </main>
    <footer>Imagine idáig legörgetni XDDD
    <div><audio hidden autoplay>
      <source src="egyeb/nemrickroll.mp3" type="audio/mp3"/>
      Ez a szöveg akkor jelenik meg, ha a böngésző nem támogatja a hangállományok beágyazását.
    </audio></div>
    </footer>
  </body>          
</html>
