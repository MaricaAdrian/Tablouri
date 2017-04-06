<?php 
session_start();
include("../includes/connect.php");
if(!isset($_SESSION['user_name'])){

header("location: login.php");


}
$del_id = $_GET['del'];
$query = mysql_query("SELECT `post_author` FROM `posts` WHERE `post_id` = '$del_id' ");
$row = mysql_fetch_row($query);
$autor = $row[0];
if($_SESSION['user_level']<'c' && $_SESSION['user_nick'] != $autor){

echo '<script>alert("Nu esti autorizat sa stergi postarea lui '. $autor .'!")</script>';
echo "<script>window.open('view_posts.php', '_self')</script>";
}
else {

if(!isset($_GET['int'])){
if(isset($_GET['del'])){
$delete_id = $_GET['del'];
$select_query="select post_image,img1,img2,img3 from posts where post_id='$delete_id'";
$run_query = mysql_query($select_query);
while($row=mysql_fetch_array($run_query)){
$post_image= $row['post_image'];
$img1 = $row['img1'];
$img2 = $row['img2'];
$img3 = $row['img3'];
}

$file_with_path = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image";
$file_with_path2 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$img1";
$file_with_path3 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$img2";
$file_with_path4 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$img3";
if (file_exists($file_with_path)) {
  unlink($file_with_path);
  unlink($file_with_path2);
  unlink($file_with_path3);
  unlink($file_with_path4);
}


//Sterg din baza de date
$delete_query = "delete from posts where post_id='$delete_id'";


//Scade cu cate 1 ID-urile din baza de date pentru a se potrivii numaratorii crescatoare EX: 1,2,3,4 
$delete_sort = "Update posts Set post_id = post_id - 1 Where post_id > '$delete_id'";
//Verific daca sa sters din baza de date
if(mysql_query($delete_query)){
	
   if(mysql_query($delete_sort)){
//Selectez ultimul id din baza de date pentru a reseta Auto-Incrementul;
$max_query=mysql_query("select post_id from posts order by post_id desc limit 1");
while($max_row=mysql_fetch_array($max_query)){
$max= $max_row['post_id'];
}
$max = $max + 1;
$delete_increment = "ALTER TABLE `posts` auto_increment = $max";			
	  if(mysql_query($delete_increment)){
	  	echo "<script>alert('Postarea a fost stearsa!')</script>";
        echo "<script>window.open('view_posts.php','_self')</script>";
		
		
	  } else {
		  die(mysql_error());
	  }	  

		} else { die(mysql_error());}



}else { die(mysql_error()); }




}

} else {
if(isset($_GET['del'])){
$delete_id = $_GET['del'];


$select_query="select post_image,img1,img2,img3 from posts where post_id='$delete_id'";
$run_query = mysql_query($select_query);
while($row=mysql_fetch_array($run_query)){

$img1 = $row['img1'];
$img2 = $row['img2'];
$img3 = $row['img3'];
$img4 = $row['img4'];
}
$file_with_path1 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$img1";
$file_with_path2 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$img2";
$file_with_path3 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$img3";
$file_with_path4 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$img4";
if (file_exists($file_with_path)) {
  unlink($file_with_path1);
  unlink($file_with_path2);
  unlink($file_with_path3);
  unlink($file_with_path4);
}
//Sterg din baza de date
$delete_query = "delete from introducere where id='$delete_id'";


//Scade cu cate 1 ID-urile din baza de date pentru a se potrivii numaratorii crescatoare EX: 1,2,3,4 
$delete_sort = "Update introducere Set id = id - 1 Where id > '$delete_id'";
//Verific daca sa sters din baza de date
if(mysql_query($delete_query)){
	
   if(mysql_query($delete_sort)){
//Selectez ultimul id din baza de date pentru a reseta Auto-Incrementul;
$max_query=mysql_query("select id from introducere order by id desc limit 1");
while($max_row=mysql_fetch_array($max_query)){
$max= $max_row['id'];
}
$max = $max + 1;
$delete_increment = "ALTER TABLE `introducere` auto_increment = $max";			
	  if(mysql_query($delete_increment)){
	  	echo "<script>alert('Postarea a fost stearsa!')</script>";
        echo "<script>window.open('view_posts.php','_self')</script>";
		
		
	  } else {
		  die(mysql_error());
	  }	  

		} else { die(mysql_error());}



}else { die(mysql_error()); }




}

	}


}







?>