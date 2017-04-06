<?php
session_start();
if(!isset($_SESSION['user_name'])){

header("location: login.php");

}
else {$username=$_SESSION['user_name'];
require_once 'antet_admin.php';

?>
<div id="center2"> <h1 class="centru">Adauga Stiat Ca...</h1>
<?php 
include ("../includes/connect.php");

?>
 <form method="post" action="stiatica.php" enctype="multipart/form-data">
     Informatia<br>
   	 <textarea name="stiati" rows="4" cols="50" placeholder="Informatia..." autofocus></textarea><br>
   	 <br>
   	 <input type="submit" name="submit" value="Adauga!">
  </form>
  <div class="back"><a href="../index.php">Home</a></div>
  </div>


</body>
</html>
<?php
include ("../includes/connect.php");
if(isset($_POST['submit'])){ $stiati = $_POST['stiati'];
 	function sterge($str)
{
$table = array(
        'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj', 'Ž'=>'Z', 'ž'=>'z', 'C'=>'C', 'c'=>'c', 'C'=>'C','c'=>'c', 'ţ'=>'t',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'R'=>'R', 'r'=>'r', "'"=>'-', '"'=>'-', 'Ș'=>'S', 'ș'=>'s', 'Ă'=>'A', 'ă'=>'a', 'Â'=>'A',
        'â'=>'a', 'Î'=>'I', 'î'=>'i', 'Ş'=>'S', 'ş'=>'s', 'Ț'=>'T', 'ț'=>'t', 'Ţ'=>'T' 
    );

$string = strtr($str, $table);
return $string;
}
$astiati=sterge($stiati);

 $insert_query = "insert into stiatica(info) values ('$astiati')";
 if(mysql_query($insert_query)){echo "<script>alert('Postarea a avut loc cu succes!')</script>";
 echo "<script>window.open('stiatica.php', '_self')</script>";
 } else {echo "<script>alert('Postarea NU a avut loc!')</script>";
 echo "<script>window.open('stiatica.php', '_self')</script>";}
 
exit();
}

?>

<?php } ?>