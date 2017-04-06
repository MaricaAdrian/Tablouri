<?php
session_start();

if(!isset($_SESSION['user_name'])){

header("location: login.php");


}
if($_SESSION['user_level']<'d'){

echo '<script>alert("Nu esti autorizat sa accesezi aceasta pagina!")</script>';
echo "<script>window.open('index.php', '_self')</script>";
}
else {
require_once 'antet_admin.php';

?>
<div id="center2"> <h1 class="centru">Adauga administrator</h1>
 <form method="post" action="adauga.php" enctype="multipart/form-data">
     Nume utilizator:<br>
   	 <input type="text" name="user_name" autofocus><br>
         Nume Afisare:<br>
         <input type="text" name="user_name2"><br>
	 Parola:<br>
   	 <input type="password" name="user_pass"><br>
	 Grad de administrare:<br>
   	 <input type="radio" name="user_level" value="a" checked>A<br>
	 <input type="radio" name="user_level" value="b">B<br>
	 <input type="radio" name="user_level" value="c">C<br>
	 <input type="radio" name="user_level" value="d">D<br>
	 

     <br>
	 Publica:<br>
   	 <input type="submit" name="submit" value="Adauga admin!">
  </form>
  <div class="back"><a href="http://localhost">Home</a></div>
  </div>


</body>
</html>
<?php
include ("../includes/connect.php");
if(isset($_POST['submit'])){
 $user_name = mysql_real_escape_string($_POST['user_name']);
 $user_name2 = mysql_real_escape_string($_POST['user_name2']);
 $user_pass = $_POST['user_pass'];
 $user_level = mysql_real_escape_string($_POST['user_level']);
 $cryptpass = crypt($user_pass);

 if(strlen($user_name) > 16) {echo "<script>alert('Numele de utilizator nu trebuie sa depaseasca 16 caractere!')</script>";}
 else if(strlen($user_name)<='2' or strlen($user_pass)<='2' ){
     echo "<script>alert('Introdu un nume de utilizator si o parola!')</script>";
    
	
	
	}

 else{
 $insert_query = "insert into admin_login
 (user_name,user_pass,user_level,user_nick) values 
 ('$user_name','$cryptpass','$user_level','$user_name2')";
 
 if(mysql_query($insert_query)){echo "<script>alert('Contul de administrator a fost adaugat cu succes !')</script>";
 }
else{ echo "<script>alert('Numele de utilizator este deja existent sau gradul de administrare este incorect!')</script>"; }
 
}
 
exit();
}

?>



<?php } ?>