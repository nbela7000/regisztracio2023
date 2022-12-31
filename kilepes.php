<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"  
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu">  
    <head>  
    <link rel="stylesheet" href="ikon.css" type="text/css"/>  
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-2"/>  
    <title>Kilépés</title>  
    </head>  
    <body>  
    <div style="text-align:center;">  
<?  
include("kapcsolat.php");  
include("hiba.php");  
$belepoid = $_GET['belepoid'];  
//LEKÉRÉSEK  
$parancs = "SELECT * FROM regisztracio WHERE belepoid='$belepoid'";  
   $eredmeny = mysql_query($parancs);  
    while ($sor=mysql_fetch_array($eredmeny))  
    {  
$felhasznalo=$sor['felhasznalo'];  
}  
$parancs = "UPDATE regisztracio SET belepoid='' where felhasznalo='$felhasznalo'";  
mysql_query($parancs);  
//OLDAL TARTALMA  
echo"Sikeresen kiléptél.";  
  
?>  
        </div>  
    </body>  
</html>  
