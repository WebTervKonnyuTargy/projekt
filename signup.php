<?php
   session_start();
   include "kozos.php";
   $fiokok = loadUsers("users");
     $hibak = [];

  if (isset($_POST["regiszt"])) {
    
    if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "")
      $hibak[] = strtoupper("A felhasznalonev megadasa kotelezo!");

    if (!isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "" || !isset($_POST["jelszo2"]) || trim($_POST["jelszo2"]) === "")
      $hibak[] = strtoupper("A jelszo es az ellenorzo jelszo megadasa kotelezo!");

    if (!isset($_POST["eletkor"]) || trim($_POST["eletkor"]) === "")
      $hibak[] = strtoupper("Az eletkor megadasa kotelezo!");

    if (!isset($_POST["nem"]) || trim($_POST["nem"]) === "")
      $hibak[] = strtoupper("A nem megadasa kotelezo!");

    if (!isset($_POST["bukott"]) || count($_POST["bukott"]) < 2)
      $hibak[] = strtoupper("Legalabb 2 bukott targyat kotelezo kivalasztani!");

    $felhasznalonev = $_POST["felhasznalonev"];
    $jelszo = $_POST["jelszo"];
    $jelszo2 = $_POST["jelszo2"];
    $eletkor = $_POST["eletkor"];
    $nem = NULL;
    $bukott = NULL;
    $signupdate=date('Y-m-d');

    if (isset($_POST["nem"]))
      $nem = $_POST["nem"];
    if (isset($_POST["bukott"]))
      $bukott = $_POST["bukott"];

    foreach ($fiokok as $fiok) {
      if ($fiok["felhasznalonev"] === $felhasznalonev)
        $hibak[] = strtoupper("A felhasznalonév mar foglalt!");
    }

    if (strlen($jelszo) < 5)
      $hibak[] = strtoupper("A jelszonak legalabb 5 karakter hosszunak kell lennie!");

    if ($jelszo !== $jelszo2)
      $hibak[] = strtoupper("A jelszo és az ellenorzo jelszo nem egyezik!");

    if ($eletkor < 18)
      $hibak[] = strtoupper("Csak 18 eves kortol lehet regisztralni!");

 $fajlfeltoltes_hiba = "";               
    uploadProfilePicture($felhasznalonev);  

    if ($fajlfeltoltes_hiba !== "")         
      $hibak[] = $fajlfeltoltes_hiba;
	  
    if (count($hibak) === 0) {
      $fiokok[] = ["felhasznalonev" => $felhasznalonev, "jelszo" => $jelszo, "eletkor" => $eletkor, "nem" => $nem, "bukott" => $bukott, "date" => $signupdate];
      saveUsers("users", $fiokok);
      $siker = TRUE;
    } else {
      $siker = FALSE;
    }
  }
?>
<!DOCTYPE html>
<html lang="hu">
  <head>
    <title>Regisztráció</title>
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
      <li><a href="signup.php" class = "menu" target = "_blank" id="aktualis">Regisztráció</a></li>
    <?php } ?>
    </ul><br/><br/><br/></div>
 <form class="signup" action="signup.php" method="POST" enctype="multipart/form-data">
  <fieldset class="urlap">
      <legend>Regisztrációs adatok</legend>
      <label>Felhasználónév: <input type="text" name="felhasznalonev"/></label> <br/>
      <label>Jelszó: <input type="password" name="jelszo"/></label> <br/>
      <label>Jelszó ismét: <input type="password" name="jelszo2"/></label> <br/>
      <label>Életkor: <input type="number" name="eletkor"/></label> <br/>
      Nem:
      <label><input type="radio" name="nem" value="F"/> Férfi</label>
      <label><input type="radio" name="nem" value="N"/> Nő</label>
      <label><input type="radio" name="nem" value="E"/> Egyéb</label> <br/>
      Bukott tárgyak:
      <label><input type="checkbox" name="bukott[]" value="webterv"/> Webterv</label>
      <label><input type="checkbox" name="bukott[]" value="szakdoga"/> Szakdoga</label>
      <label><input type="checkbox" name="bukott[]" value="tesi"/> Tesi</label>
      <label><input type="checkbox" name="bukott[]" value="prógegy"/> Prógegy</label>
      <label><input type="checkbox" name="bukott[]" value="loghika"/> Loghika</label> <br/>
       <label>Profilkép: <input type="file" name="profile-pic" accept="image/*"/></label>
  </fieldset>
  <input type="submit" name="regiszt" value="Regisztráció"/> <br/>
 </form>
 
 <?php
  if (isset($siker) && $siker === TRUE) {
    echo strtoupper("<p>Sikeres regisztráció!</p>");
    header("Location: login.php");
  } else {
    foreach ($hibak as $hiba) {
      echo "<p>" . $hiba . "</p>";
    }
  }
?>
  </body>          
</html>
