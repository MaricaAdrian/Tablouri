<?php
session_start();

if(isset($_COOKIE['user_level']) || isset($_SESSION['user_name'])) {
  unset($_COOKIE['user_level']);
  unset($_SESSION['user_level']);
  unset($_SESSION['user_name']);
  unset($_SESSION['user_nick']);
setcookie('user_level', '', time()-3600, '/');

session_destroy();

 
header("location: login.php");
}
else{echo "<script>alert('Nu esti autorizat sa accesezi aceasta pagina');</script>"; }



?>