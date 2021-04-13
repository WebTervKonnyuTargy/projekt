<?php
   include "kozos.php";
   $fiokok = loadUsers("users");

  $hibak = [];

  if (isset($_POST["regiszt"])) {
    
    if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "")
      $hibak[] = "A felhasználónév megadása kötelező!";

    if (!isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "" || !isset($_POST["jelszo2"]) || trim($_POST["jelszo2"]) === "")
      $hibak[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";

    if (!isset($_POST["eletkor"]) || trim($_POST["eletkor"]) === "")
      $hibak[] = "Az életkor megadása kötelező!";

    if (!isset($_POST["nem"]) || trim($_POST["nem"]) === "")
      $hibak[] = "A nem megadása kötelező!";

    if (!isset($_POST["bukott"]) || count($_POST["bukott"]) < 2)
      $hibak[] = "Legalább 2 bukott tárgyat kötelező kiválasztani!";

    $felhasznalonev = $_POST["felhasznalonev"];
    $jelszo = $_POST["jelszo"];
    $jelszo2 = $_POST["jelszo2"];
    $eletkor = $_POST["eletkor"];
    $nem = NULL;
    $bukott = NULL;

    if (isset($_POST["nem"]))
      $nem = $_POST["nem"];
    if (isset($_POST["bukott"]))
      $bukott = $_POST["bukott"];

    foreach ($fiokok as $fiok) {
      if ($fiok["felhasznalonev"] === $felhasznalonev)
        $hibak[] = "A felhasználónév már foglalt!";
    }

    if (strlen($jelszo) < 5)
      $hibak[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie!";

    if ($jelszo !== $jelszo2)
      $hibak[] = "A jelszó és az ellenőrző jelszó nem egyezik!";

    if ($eletkor < 18)
      $hibak[] = "Csak 18 éves kortól lehet regisztrálni!";

    if (count($hibak) === 0) {
      $fiokok[] = ["felhasznalonev" => $felhasznalonev, "jelszo" => $jelszo, "eletkor" => $eletkor, "nem" => $nem, "bukott" => $bukott];
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
      <li><a href = "szpajsziburger.php"  class = "menu"  target = "_blank">Aktuális ajánlatunk</a></li>
      <li><a href = "rendeles.php" class = "menu" target = "_blank">RENDELJ!!!</a></li>
      <li><a href = "etlap.php" class = "menu" target = "_blank">Étlap (Kalóriákkal;))</a></li>
      <li><a href = "urlap.php" class = "menu" id = "aktualis" target = "_blank">JELENTKEZZ MUNKATÁRSNAK!!!</a></li>
    </ul><br/><br/><br/></div>
 <form class="frm" action="urlap.php" method="POST">
  <fieldset class="urlap">
    <form>
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
      <form action="process.php" method="POST" enctype="multipart/form-data">
      <label for="file-upload">Profilkép:</label>
      <input type="file" id="file-upload" name="profile-pic" accept="image/*"/> 
  </fieldset>
  <input type="submit" name="regiszt" value="Regisztráció"/> <br/>
 </form>
 <?php
  if (isset($siker) && $siker === TRUE) {
    echo "<p>Sikeres regisztráció!</p>";
  } else {
    foreach ($hibak as $hiba) {
      echo "<p>" . $hiba . "</p>";
    }
  }
   if (isset($_FILES["profile-pic"])) {
    echo "A fájl neve: " . $_FILES["profile-pic"]["name"] . "<br/>";
    echo "A fájl ideiglenes neve: " . $_FILES["profile-pic"]["tmp_name"] . "<br/>";
    echo "A fájl mérete (bájtokban): " . $_FILES["profile-pic"]["size"] . "<br/>";
    echo "A fájl típusa: " . $_FILES["profile-pic"]["type"] . "<br/>";
    echo "Hibakód: " . $_FILES["profile-pic"]["error"] . "<br/>";
  }
?>
  </body>          
</html>
