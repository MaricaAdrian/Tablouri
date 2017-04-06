<?php 
session_start();
if(!isset($_SESSION['user_name'])){

header("location: login.php");

}
else{$username=$_SESSION['user_name'];
include ("../includes/connect.php"); 

$user_sel = $_GET['usersel'];
echo "Conversatia cu $user_sel<br/>";

$hash= $_GET['hash'];

$mesaj_cauta = mysql_query("SELECT * FROM pm_mesaj WHERE hashg='$hash'");
while($mesaj_ga=mysql_fetch_array($mesaj_cauta)){
$dela = $mesaj_ga['dela'];
$mesaj = $mesaj_ga['mesaj'];
$citit = $mesaj_ga['citit'];
$id = $mesaj_ga['id'];

$user_ia = mysql_query("SELECT user_name FROM admin_login WHERE user_name='$dela'");
$user_gas = mysql_fetch_array($user_ia);
$user_dela = $user_gas['user_name'];

if($username!=$dela){mysql_query("UPDATE `pm_mesaj` SET `citit` = '1' WHERE id='$id'"); 

}
echo "<b>$user_dela</b>: <br/> $mesaj<br/>";
if($dela==$username){
if($citit==0){echo "<div class='citit'>Citit: Nu<br/></div>";} else {echo "<div class='citit'>Citit: Da</div><br/>";} 
}
echo "<hr>";
}
/*else {echo "<script>alert('Eroare la primirea formularelor')</script>";}*/
}
?>