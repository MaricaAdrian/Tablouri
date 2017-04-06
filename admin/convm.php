<?php
session_start();

if(!isset($_SESSION['user_name'])){

header("location: login.php");

}
else {$username=$_SESSION['user_name'];
require_once 'antet_admin.php';

?>
<?php include ("../includes/connect.php"); ?>
</div>
<div id="center">
<h1>Bun venit la panoul de conversatii!</h1>
<p> De aici poti incepe conversatii noi cu administratorii!<br/>
<?php $i = 0;  
$ga = mysql_query("SELECT citit FROM pm_mesaj WHERE `pentru`='$username'");
while($row=mysql_fetch_array($ga)){
$cal = $row['citit'];
if($cal==0){$i++;}

}
if($i > 0) {echo "Aveti $i mesaje necitite!";} else {echo "Nu aveti mesaje noi!";}
?>
<br/><a href="conv.php">Conversatii</a> | <a href="convc.php">Creeaza o noua conversatie</a>
</p>
</div>
<?php

if(isset($_GET['insert'])){


  include ("../admin/insert_post.php");



}

?>
</body>
</html>
<?php

}?>