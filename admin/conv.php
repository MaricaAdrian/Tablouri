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
<h1>Conversatiile tale.</h1>
<p> De aici poti raspunde la conversatiile tale.<br/>
<?php $i = 0;  
$ga = mysql_query("SELECT citit FROM pm_mesaj WHERE `pentru`='$username'");
while($row=mysql_fetch_array($ga)){
$cal = $row['citit'];
if($cal==0){$i++;}

}
if($i > 0) {echo "Aveti $i mesaje necitite!";} else {echo "Nu aveti mesaje noi!";}
?></p>
<br/>
<div class="com">
<?php
if(isset($_GET['hash']) && !empty($_GET['hash']) && isset($_GET['usersel']) && !empty($_GET['usersel']) ){

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
echo "<hr>"; } ?>
<?php ?>
<script src="jq.js"></script>
<script>


function chat2(){
var mesaj = com.mesaj.value;
if(mesaj == ''){
alert('Nu poti trimite un mesaj gol');
return;
}
var hash = '<?php echo $hash; ?>';
var user = '<?php echo $user_sel; ?>';
var usern = '<?php echo $username; ?>';
$("#com")[0].reset();
$.ajax({
type: 'post',
url: 'convi.php?hash='+hash+'&usersel='+user+'&usern='+usern+'&msg='+mesaj,
data: $('form').serialize(),
success: function(){$('.success').fadeIn(500);  }
});
}
function chat(){
if(com.mesaj.value == ''){
alert('Nu poti trimite un mesaj gol');
return;
}
var mesaj = com.mesaj.value;
var xmlhttp;
var hash = '<?php echo $hash; ?>';
var user = '<?php echo $user_sel; ?>';
var usern = '<?php echo $username; ?>';
$('#com').unbind('submit').bind('submit',function(ev){
ev.preventDefault();
$("#com")[0].reset(); 
$.ajax({
type: 'post',
url: 'convi.php?hash='+hash+'&usersel='+user+'&usern='+usern+'&msg='+mesaj,
data: $('form').serialize(),
success: function(){$('.success').fadeIn(500);  }
});
});


}

$(document).ready(function(e){
$.ajaxSetup({cache:false});
var hash = '<?php echo $hash; ?>';
var user = '<?php echo $user_sel; ?>';
var usern = '<?php echo $username; ?>';
setInterval(function(){$('.com').load('convl.php?hash='+hash+'&usersel='+user);  }, 1000);



$("textarea").on("keypress", function(e) {
    if ((e.keyCode == 10 || e.keyCode == 13)) {
        e.preventDefault();
        chat2();
    }
});


});



</script>



<?php }

else{ 





echo "Selecteaza conversatia: <br/>";
$apuca_con = mysql_query("SELECT * FROM pm_group WHERE `user1`='$username' OR `user2`='$username'");
while($apuca=mysql_fetch_array($apuca_con)){
$hash = $apuca['hash'];
$user1 = $apuca['user1'];
$user2 = $apuca['user2'];

if($user1 == $username){$select_id = $user2;
} else { $select_id = $user1;


}
$user_ia = mysql_query("SELECT user_name FROM admin_login WHERE user_name='$select_id'");
$user_gas = mysql_fetch_array($user_ia);
$user_sel = $user_gas['user_name'];

echo "<ul><li><a href='conv.php?hash=$hash&usersel=$user_sel'>$user_sel</a></li></ul><div class='citit'><a href='conv.php?del=$hash'>Delete</a></div> ";
if(isset($_GET['del']) && !empty($_GET['del'])){
$del=$_GET['del'];
mysql_query("DELETE FROM pm_group WHERE `hash`='$del'");
mysql_query("DELETE FROM pm_mesaj WHERE `hashg`='$del'");
header('Location: conv.php');
}
}
}

 ?></div>

<span class="success" style="display:none">Mesajul a fost trimis.</span>
<?php if(isset($_GET['hash']) && !empty($_GET['hash']) && isset($_GET['usersel']) && !empty($_GET['usersel']) ){
echo "<form id='com' method='post'>


   Mesaj:<br>
   <textarea id='cur' name='mesaj' id='mesaj' rows='7' col='60'></textarea><br/><br/>
   <input type='submit' value='Trimite mesaj!'  onclick='chat()'>

</form>";} ?>
</div>
</body>
</html>
<?php

}?>
<?php/*
if(isset($_POST['mesaj']) && !empty($_POST['mesaj'])){
$mesajnou = $_POST['mesaj'];
mysql_query("INSERT INTO pm_mesaj(hashg,dela,pentru,mesaj) VALUES('$hash','$username','$user_sel','$mesajnou')");
header('Location: conv.php?hash='.$hash.'&usersel='.$user_sel); 
}*/
?>