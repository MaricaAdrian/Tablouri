<?php
session_start();
if(!isset($_SESSION['user_name'])){

header("location: login.php");

}
else {$username=$_SESSION['user_name'];
require_once 'antet_admin.php';

?>
<div id="center2"> <h1 class="centru">Schimba Parola</h1>
<?php 
include ("../includes/connect.php");

?>
 <form method="post" action="schimbaparola.php" enctype="multipart/form-data">
     Parola actuala<br>
   	 <input type="password" name="parola" autofocus><br>
	 Noua parola:<br>
   	 <input type="password" name="parolanoua"><br>
	 Repeta noua parola:<br>
   	 <input type="password" name="parolanoua2"><br />
   	 <br />
   	 <input type="submit" name="submit" value="Schimba Parola!">
  </form>
  <div class="back"><a href="../index.php">Home</a></div>
  </div>


</body>
</html>
<?php
include ("../includes/connect.php");
if(isset($_POST['submit'])){
 $parola = $_POST['parola'];
 $parolanoua = $_POST['parolanoua'];
 $parolanoua2 = $_POST['parolanoua2'];

 $edit_parola = "select user_pass from admin_login where user_name='$username'";
 $run_edit = mysql_query($edit_parola);
 while ($edit_pass=mysql_fetch_array($run_edit)) {

  $hash = $edit_pass['user_pass'];
 

}
 if(crypt($parola, $hash)!=$hash){
     echo "<script>alert('Parola intorodusa nu corespunde cu cea actuala')</script>";
    exit();
	
	
	}

 else{ if($parolanoua!=$parolanoua2){echo "<script>alert('Cele doua parole nu corespund')</script>";
 exit();}
 $cryptpass = crypt($parolanoua);
 $insert_query = "UPDATE admin_login SET user_pass='$cryptpass' where user_name='$username'";
 
 if(mysql_query($insert_query)){echo "<script>alert('Parola a fost schimbata cu succes!')</script>";
 echo "<script>window.open('schimbaparola.php', '_self')</script>";
 }

 
}
 
exit();
}

?>

<?php } ?>