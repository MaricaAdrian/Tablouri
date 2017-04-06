<?php
session_start();

if(!isset($_SESSION['user_name'])){

header("location: login.php");

}
else {
require_once 'antet_admin.php';

?>

<br>
<table border="5px">
<tr>
<td colspan="10px" align="center" bgcolor="orange"><h1>Postari principale:</h1>
</tr>
<tr >
<th>Numar:</th>
<th>Data:</th>
<th >Autor:</th>
<th >Titlu:</th>
<th>Text:</th>
<th>Stergere</th>
<th>Editare</th>
</tr>
<tr>
<?php
include ("../includes/connect.php");
$query = "select * from posts where subcategoryof=''";
$run = mysql_query($query);
while($row=mysql_fetch_array($run)){
$post_id = $row['post_id'];
$post_date = $row['post_date'];
$post_author = $row['post_author'];
$post_title = $row['post_title'];
$post_image = $row['post_image'];
$post_content = substr($row['post_content'],0,200);

?>
<td><?php echo $post_id; ?></td>
<td><?php echo $post_date; ?></td>
<td><?php echo $post_author; ?></td>
<td><?php echo $post_title; ?></td>
<td><?php echo $post_content ?><br></td>
<td><a href="delete.php?del=<?php echo $post_id; ?>">Stergere</a></td>
<td><a href="edit_posts.php?editare=<?php echo $post_id; ?>">Editare</a></td>

</tr>
<?php } ?>
</table>
<br />
<table border="5px">
<tr>
<td colspan="10px" align="center" bgcolor="orange"><h1>Postari la subcategorie:</h1>
</tr>
<tr >
<th>Numar:</th>
<th>Data:</th>
<th>Autor:</th>
<th>Titlu:</th>
<th>Subcategorie:</th>
<th>Text:</th>
<th>Stergere</th>
<th>Editare</th>
</tr>
<tr>
<?php
$query = "select * from posts where subcategoryof!=''";
$run = mysql_query($query);
while($row=mysql_fetch_array($run)){
$post_id = $row['post_id'];
$post_date = $row['post_date'];
$post_author = $row['post_author'];
$post_title = $row['post_title'];
$post_content = substr($row['post_content'],0,200);
$subcategoryof = $row['subcategoryof'];

?>
<td><?php echo $post_id; ?></td>
<td><?php echo $post_date; ?></td>
<td><?php echo $post_author; ?></td>
<td><?php echo $post_title; ?></td>
<td><?php echo $subcategoryof; ?></td>
<td><?php echo $post_content; ?><br></td>
<td><a href="delete.php?del=<?php echo $post_id; ?>">Stergere</a></td>
<td><a href="edit_posts.php?editare=<?php echo $post_id; ?>">Editare</a></td>

</tr>
<?php } ?>
</table>

<br />
<table border="5px">
<tr>
<td colspan="10px" align="center" bgcolor="orange"><h1>Postari la introducere:</h1>
</tr>
<tr >
<th>Numar:</th>
<th>Titlu:</th>
<th>Introducere principala:</th>
<th>Text:</th>
<th>Stergere</th>
<th>Editare</th>
</tr>
<tr>
<?php
$query = "select * from introducere";
$run = mysql_query($query);
while($row=mysql_fetch_array($run)){
$post_id = $row['id'];
$post_title = $row['titlu'];
$post_content = substr($row['continut'],0,200);
$ismain = $row['ismain'];

?>
<td><?php echo $post_id; ?></td>
<td><?php echo $post_title; ?></td>
<td><?php echo $ismain; ?></td>
<td><?php echo $post_content; ?><br></td>
<td><a href="delete.php?del=<?php echo $post_id; ?>&int=da">Stergere</a></td>
<td><a href="edit_posts.php?editare=<?php echo $post_id; ?>&int=da">Editare</a></td>

</tr>
<?php } ?>
</table>

</body>
</html>
<?php } ?>