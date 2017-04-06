<?php
session_start();
?>
<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
<div id="center3">
<h1>Bun venit la panoul de administrare</h1>
<p> Te rog sa te autentifici !</p>

<form method="post" action="login.php">
<div class="log">
Utilizator
<br>
<input type="text" name="user_name" size="15px">
<br>
Parola:
<br>
<input type="password" name="user_pass" size="15px">
<br>
Grad de administrare:<br>
<input type="password" name="user_level" size="3px">
<br>
<br>
<input type="submit" name="login" value="Autentificare !">
</div>

</form>
<a href="../index.php">Site Home</a>

</div>

</body>
</html>
<?php
include("connect.php");
if(isset($_POST['login'])){

$user_name = $_POST['user_name'];
$user_pass = $_POST['user_pass'];
$user_level = $_POST['user_level'];
$cryptpass = hash($user_pass);
$admin_query = "select * from `admin_login` where `user_name`='$user_name' AND `user_level`='$user_level'";
$run = mysql_query($admin_query);
while($row=mysql_fetch_array($run)){
$hash = $row['user_pass'];
$user_nick = $row['user_nick'];
}
if(mysql_num_rows($run) >0 && $hash==crypt($user_pass,$hash)) {

 $_SESSION['user_name']=$user_name;
 $_SESSION['user_level']=$user_level;
 $_SESSION['user_nick']=$user_nick;
 setcookie("user_level", $user_level, time()+3600 , '/');

 echo "<script>window.open('index.php','_self')</script>";

 }
 else{
   echo '<script>alert("Utilizator,parola sau grad de administrare incorecte")</script>';
 }
}

?>