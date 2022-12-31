<meta charset="utf-8">  
<html>  
 <head>  
  <title>Bejelentkezés</title>  
  <body bgcolor=#4682B4></body>  
  <script language="javascript">  
   function felhasznalo() {  
    var jelszo = document.getElementById("doboz").value;  
    if (jelszo == Aa) {  
     onclick ="A"  
    }  
    if (jelszo == Bb) {  
     onclick ="B"  
    }  
   }  
              
   function A) {  
    if (form.id.value=="Aa") {   
    if (form.pass.value=="a") {                
     location="http://weblabor.hu/"   
    } else {  
     alert("Helytelen jelszó")  
    } else {  alert("Helytelen felhasználónév")  
    }  
    }  
   }  
              
   function B () {  
    if (form.id.value=="Bb") {   
    if (form.pass.value=="b") {                
     location="http://weblabor.hu/"   
    } else {  
     alert("Helytelen jelszó")  
    }  
    } else {  
     alert("Helytelen felhasználónév")  
    }  
    }  
   }  
              
  </script>  
 </head>  
 <body>  
  <br>  
  <br>  
  <br>  
  <br>  
  <br>  
  <br>  
  <br>  
  <form>  
  <strong>  
   <label>Felhasználónév:</label>  
  </strong>  
  <form name="login">  
   <input name="id" type="text">  
   <br>  
   <strong>  
    <label>Jelszó:</label>  
   <strong>  
   <br>  
   <input name="pass" id="doboz" type="password"/>  
  </form>  
  <br>  
  <br>  
  <input class="button" type="button" id="gomb" value="Bejelentkezés" onclick="felhasznalo()"/>  
   </strong>  
   </form>  
 </body>  
</html>  
