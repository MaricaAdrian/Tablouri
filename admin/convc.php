<?php
session_start();

if(!isset($_SESSION['user_name'])){

header("location: login.php");

}
else {$username=$_SESSION['user_name'];
require_once 'antet_admin.php';

?>
<?php include ("../includes/connect.php");?>
</div>
<div id="center">
<h1>Creeaza o conversatie</h1>
<p> De aici incepe o noua conversatie cu un utilizator !
<br/>
<form method="post" action="convc.php">
Catre: <br><select name="alege2">
<?php $find = mysql_query("SELECT user_name FROM admin_login");
while($row=mysql_fetch_array($find)){
$to = $row['user_name']; 


?>

  <option value="<?php echo $to ?>"><?php echo $to ?></option>
   <?php } ?></select><br><br>Mesaj:<br>
   <textarea name="mesaj" rows="7" col="60"></textarea><br/><br/>
   <input type="submit" name="alege" value="Trimite mesaj!">


</form>
<?php if(isset($_POST['alege'])){
$catre = $_POST['alege2'];
$hash = rand();
$mesaj = $_POST['mesaj'];
$verifica_con = mysql_query("SELECT `hash` from `pm_group` WHERE 
(`user1`='$username' AND `user2`='$catre') 
OR 
(`user1`='$catre' AND `user2`='$username')");
if(mysql_num_rows($verifica_con) == 1){echo "Converstia cu <i>$catre</i> exista deja !";}
else if($username==$catre)
{echo "Nu poti incepe o conversatie cu tine insuti!";}
else{

mysql_query("INSERT INTO pm_group(user1,user2,hash) VALUES('$username','$catre','$hash')");
mysql_query("INSERT INTO pm_mesaj(hashg,dela,pentru,mesaj) VALUES('$hash','$username','$catre','$mesaj')");
echo "Conversatia cu <i>$catre</i> a inceput !<br/><a href=conv.php>Click pentru conversatii</a>";

}


} ?>
<br/>
</p>
</div>
</body>
</html>
<?php

}?>