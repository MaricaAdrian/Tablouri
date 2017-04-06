<?php 
session_start();
if(!isset($_SESSION['user_name'])){

header("location: login.php");

}
else{
include ("../includes/connect.php"); 
if(isset($_GET['hash']) && !empty($_GET['hash']) && isset($_GET['usersel']) && !empty($_GET['usersel']) && isset($_GET['usern']) && !empty($_GET['usern']) && isset($_GET['msg']) && !empty($_GET['msg']))
{$hash = $_GET['hash'];
$usersel = $_GET['usersel'];
$username = $_GET['usern'];
$mesaj = $_GET['msg'];

mysql_query("INSERT INTO pm_mesaj(hashg,dela,pentru,mesaj) VALUES('$hash','$username','$usersel','$mesaj')");
}
else {echo "<script>alert('Eroare la primirea formularelor')</script>";}
}
?>