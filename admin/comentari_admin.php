<?php
session_start();

if(!isset($_SESSION['user_name'])){

header("location: login.php");

}
else {
require_once 'antet_admin.php';

?>
<br>
<table border="5px" align="center">
<tr>
<td colspan="10px" align="center" bgcolor="orange"><h1>Toate comentariile:</h1>
</tr>
<tr >
<th>Numar:</th>
<th>Data:</th>
<th >Autor:</th>
<th >Continut:</th>
<th >Pe pagina:</th>
<th>Stergere</th>
</tr>
<tr>
<?php
include ("../includes/connect.php");
$query = "select * from comentari";
$run = mysql_query($query);
while($row=mysql_fetch_array($run)){
$id = $row['id'];
$data = $row['data'];
$autor = $row['nume'];
$continut = $row['continut'];
$pagina = $row['pagina'];
?>
<td><?php echo $id ?></td>
<td><?php echo $data ?></td>
<td><?php echo $autor ?></td>
<td><?php echo $continut ?></td>
<td><?php echo $pagina ?></td>
<td><a href="../includes/delcom.php?del=<?php echo $id; ?>">Sterge</a></td>

</tr>
<?php } ?>
</table>
</body>
</html>
<?php } ?>