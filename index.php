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
    include("kapcsolat.php");  
      
    $regi = $_POST['regi'];  
    $felhasznalo = $_POST['felhasznalo'];  
    $jelszo1 = $_POST['jelszo1'];  
    $jelszo2 = $_POST['jelszo2'];  
    $email1 = $_POST['email1'];  
    $email2 = $_POST['email2'];  
      
    //VALOS FELHASZNALO   
function valosf($felhasznalo){  
        if ($felhasznalo == "")  
          return false;  
        $engedelyezett = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";  
        for ($i = 0; $i < strlen($felhasznalo); ++$i)  
          if (strpos($engedelyezett, $felhasznalo[$i]) === false)  
            return false;  
        return true;  
}  
//VALOS EMAIL  
  
function email($email1) {  
 $eredmeny = TRUE;  
  if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email1)) {  
    $eredmeny = FALSE;  
  }  
  return $eredmeny;  
}     
      
    if(isset($regi) and $regi == "igen"){  
    $uzenet="";  
    $statusz = "OK";  
  
//FELHASZNALO ELLENORZESEK  
if (emptyempty($felhasznalo)) {  
$uzenet=$uzenet."Nem adtál meg felhasználó nevet.<br/>";  
$statusz= "HIBA";  
}  
else{  
  
if (!valosf($felhasznalo)){  
$uzenet=$uzenet."A felhasználónév csak ezekből a karakterekből állhat: A-Z, a-z, 0-9<br/>";  
$statusz= "HIBA";  
}  
  
if (strlen($felhasznalo) < 5){  
$uzenet=$uzenet."A felhasználónév túl rövid min. 5 karakter.<br/>";  
$statusz= "HIBA";  
}  
  
if (strlen($felhasznalo) > 20){  
$uzenet=$uzenet."A felhasználónév túl hosszú max. 20 karakter.<br/>";  
$statusz= "HIBA";  
    }  
}  
  
if(mysql_num_rows(mysql_query("SELECT felhasznalo FROM regisztracio WHERE felhasznalo = '$felhasznalo'"))){  
$uzenet=$uzenet."$felhasznalo már létezik. Kérjük, próbálj meg egy másikat<br/>";  
$statusz= "HIBA";  
}     
  
//JELSZO ELLENORZES  
if (emptyempty($jelszo1)) {  
$uzenet=$uzenet."Nem adtál meg jelszót.<br/>";  
$statusz= "HIBA";  
}else{  
if($jelszo1 != $jelszo2){   
$uzenet=$uzenet."A két jelszó nem egyforma<br/>";  
$statusz= "HIBA";  
}  
  
if (strlen($jelszo1) < 5){  
$uzenet=$uzenet."A jelszó túl rövid min. 5 karakter.<br/>";  
$statusz= "HIBA";  
}  
  
if (strlen($jelszo1) > 20){  
$uzenet=$uzenet."Bocsi, A jelszó túl hosszú max. 20 karakter.<br/>";  
$statusz= "HIBA";}  
}  
//EMAIL ELLENORZES  
if (emptyempty($email1)) {  
$uzenet=$uzenet."Nem adtál meg emailt.<br/>";  
$statusz= "HIBA";  
}  
  
else{  
if (!email($email1)){  
$uzenet=$uzenet."Valótlan email cim.<br/>";  
$statusz= "HIBA";  
}  
  
if($email1 != $email2){   
$uzenet=$uzenet."A két email cim nem egyforma<br/>";  
$statusz= "HIBA";  
    }  
}  
  
$jelszo = md5("$jelszo1");  
$email = $email1;  
  
  
if(mysql_num_rows(mysql_query("SELECT email FROM regisztracio WHERE email = '$email1'"))){  
$uzenet=$uzenet."$email1 cim már létezik. Kérjük, próbálj meg egy másikat<br/>";  
$statusz= "HIBA";  
}     
  
    if($statusz<>"OK"){  
    echo"<div style='text-color:red;'> $uzenet</div><br/> <input type='button' value='Vissza' onClick='history.go(-1)'><br/>";  
    }else{  
        $parancs = mysql_query("INSERT INTO regisztracio (felhasznalo,jelszo,email,regisztralt) VALUES('$felhasznalo','$jelszo','$email',NOW())");  
        echo"$felhasznalo sikeresen regisztráltál.<br/> <a href='regisztracio.php'>Regisztracio</a>";  
        }  
      
    }else{  
    ?>  
        <form action="regisztracio.php" method="post">  
        <input type="hidden" name="regi" value="igen"/>  
        Felhasználó név:<br/><input type="text" name="felhasznalo" maxlength="20" id="felhasznalo"/><br/>  
        Jelszó:<br/><input type="password" name="jelszo1" maxlength="20" id="jelszo1"/><br/>  
        Jelszó újra:<br/><input type="password" name="jelszo2" maxlength="20" id="jelszo2" /><br/>  
        Email:<br/><input type="text" name="email1" maxlength="50" id="email1"/><br/>  
        Email újra:<br/><input type="text" name="email2" maxlength="50" id="email2"/><br/>  
        <input type="submit" value="Regizek" name="submit"/>  
        </form>  
        </div>  
    </body>  
</html>  
<?  
}  
?>  
