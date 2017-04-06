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
<br>
<table border="5px" align="center">
<tr>
<td colspan="10px" align="center" bgcolor="orange"><h1>Vizualizeaza toate cererile</h1>
</tr>
<tr >
<th>Nume:</th>
<th>Nume de utilizator:</th>
<th >Parola:</th>
<th >Email:</th>
<th >Informatii despre utilizator:</th>
<th >Aprobare:</th>
<th >Respingere:</th>
</tr>
<tr>
<?php
include ("../includes/connect.php");
$query = "select * from aplica";
$run = mysql_query($query);
while($row=mysql_fetch_array($run)){
$aplica_id = $row['aplica_id'];
$aplica_nume = $row['aplica_nume'];
$aplica_utilizator = $row['aplica_utilizator'];
$aplica_email = $row['aplica_email'];
$aplica_info = $row['aplica_info'];
$aplica_parola = $row['aplica_parola'];
$aprobat = $row['aprobat'];

?>
<?php if($aprobat=='0'){?>
<td><?php echo $aplica_nume;?></td>
<td><?php echo $aplica_utilizator; ?></td>
<td><?php echo $aplica_parola; ?></td>
<td><?php echo $aplica_email; ?></td>
<td><?php echo $aplica_info; ?></td>
<td><a href="aproba_user.php?aproba=<?php echo $aplica_id; ?>&aprobare=1">Aproba</a></td>
<td><a href="aproba_user.php?aproba=<?php echo $aplica_id; ?>&aprobare=0">Respinge</td>
<?php } ?>


</tr>
<?php } ?>
</table>
</body>
</html>
<?php } ?>