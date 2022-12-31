<?  
include ('kapcsolat.php');  
$belepoid=mysql_real_escape_string($belepoid);  
  
if($kapott=mysql_fetch_array(mysql_query("SELECT * FROM regisztracio WHERE belepoid='$belepoid'"))){  
    if(($kapott['belepoid'] == $belepoid))  
echo"";  
}else{  
?>  
<b>Hiányzó felhasználónév</b><br/><br/><a href='belepes.php'>Belépés</a><br/>  
<?  
exit;  
}  
  
if (emptyempty($belepoid)) {  
?>  
<b>Hiányzó felhasználónév</b><br/><br/><a href='belepes.php'>Belépés</a><br/>  
<?  
exit;  
}  
  
  
?>  
