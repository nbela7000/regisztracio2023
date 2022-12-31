<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"  
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu">  
    <head>  
    <link rel="stylesheet" href="ikon.css" type="text/css"/>  
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-2"/>  
    <title>Regisztráció</title>  
    </head>  
    <body>  
    <div style="text-align:center;">  
<?  
include('kapcsolat.php');  
  
$belep = $_POST['belep'];  
if(isset($belep) and $belep == "igen"){  
   
//BEKÜLDÖTT ADATOK KIOLVASÁSA  
$felhasznalo = $_POST['felhasznalo'];  
$jelszo = md5($_POST['jelszo']);  
  
//SQL INJECT VÉDELEM  
$felhasznalo = mysql_real_escape_string($felhasznalo);  
$jelszo = mysql_real_escape_string($jelszo);  
  
//FELHASZNÁLÓ NÉV PONTOS KIOLVASÁSA (PONTOS KARAKTEREK: KICSI, NAGY)  
$parancs = "SELECT * FROM regisztracio WHERE felhasznalo='$felhasznalo' and jelszo='$jelszo' ";  
   $eredmeny = mysql_query($parancs);  
    while ($sor=mysql_fetch_array($eredmeny))  
    {  
$felhasznalo=$sor['felhasznalo'];  
$jelszo=$sor['jelszo'];  
}  
   
//ISMÉTELT ELLENŐRZÉS  
if($kapott=mysql_fetch_array(mysql_query("SELECT * FROM regisztracio WHERE felhasznalo='$felhasznalo' AND jelszo = '$jelszo'"))){  
    if(($kapott['felhasznalo']==$felhasznalo)&&($kapott['jelszo']==$jelszo)){  
  
//BELEPESI  ID GENERALAS   
function generateRandomString($hosszusag = 40, $betu = 'qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM')  
  {  
      $s = '';  
       $betuhosszusag = strlen($betu)-1;  
          for($i = 0 ; $i < $hosszusag ; $i++){  
          $s .= $betu[rand(0, $betuhosszusag)];}     
     return $s;  
  }   
  $belepoid = generateRandomString();   
  
$parancs = "UPDATE regisztracio SET belepoid='$belepoid' where felhasznalo='$felhasznalo'";  
mysql_query($parancs);  
  
echo "Helló $felhasznalo! <br/><br/>";  
echo "  <a href='menu.php?belepoid=$belepoid'><b>Tovább</b></a><br/>";   
    }  
  }   
  else {  
echo "<b>Hiba! Rossz felhasználónevet vagy jelszót adtál meg, próbáld újra </b><br/><br><input type='button' value='Vissza' onClick='history.go(-1)'>";  
     }  
}else {  
  
?>  
<form action="belepes.php" method="post">  
<input type="hidden" name="belep" value="igen"/>  
Felhasználó név: <br/><input type="text" name="felhasznalo" id="felhasznalo" maxlength="20"/><br/>  
Jelszó: <br/><input type="password" name="jelszo" id="jelszo1" maxlength="20"/><br/>  
<input type="submit" value="Bejelentkezés" class="button"/>  
</form>  
<br/>  
<a href="regisztracio.php"/>Regisztráció</a>  
        </div>  
    </body>  
</html>  
<?  
}  
?>  
