<?php
session_start();
include ("../includes/connect.php");
if(!isset($_SESSION['user_name'])){

header("location: login.php");


}
$edit_id = $_GET['editare'];
$query = mysql_query("SELECT `post_author` FROM `posts` WHERE `post_id` = '$edit_id' ");
$row = mysql_fetch_row($query);
$autor = $row[0];
if($_SESSION['user_level']=='a' && $_SESSION['user_nick'] != $autor){

echo '<script>alert("Nu esti autorizat sa editezi postarea lui '. $autor .'")</script>';
echo "<script>window.open('view_posts.php', '_self')</script>";
}
else {
require_once 'antet_admin.php';

?>

</div>
<div id="center2"> <h1 class="centru">Editeaza postarea</h1>
<?php 
if(!isset($_GET['int'])){
if(isset($_GET['editare'])){


$edit_id = $_GET['editare'];
$edit_query = "select * from posts where post_id='$edit_id'";
$run_edit = mysql_query($edit_query);
while ($edit_row=mysql_fetch_array($run_edit)) {

  $post_id = $edit_row['post_id'];
  $post_title = $edit_row['post_title'];
  $post_author = $edit_row['post_author'];
  $post_keywords = $edit_row['post_keywords'];
  $post_image = $edit_row['post_image'];
  $post_image2 = $edit_row['img1'];
  $post_image3 = $edit_row['img2'];
  $post_image4 = $edit_row['img3'];
  $post_image5 = $edit_row['img4'];
  $post_image6 = $edit_row['img5'];
  $post_image7 = $edit_row['img6'];
  $post_image8 = $edit_row['img7'];
  $post_image9 = $edit_row['img8'];
  $post_image10 = $edit_row['img9'];
  $post_image11 = $edit_row['img10'];
  $post_image12 = $edit_row['img11'];
  $post_image13 = $edit_row['img12'];
  $post_image14 = $edit_row['img13'];
  $post_image15 = $edit_row['img14'];
  $post_content = htmlentities($edit_row['post_content']);
  $post_date = $edit_row['post_date'];
  $post_category = $edit_row['post_category'];

}



}
?>
 <form method="post" action="edit_posts.php?editare=<?php echo $post_id; ?>" enctype="multipart/form-data">
     Titlu:<br>
   	 <input type="text" name="title" value="<?php echo $post_title?>" autofocus><br>
   	 Categorie:<br>
     <select name="alege2">
     <option value="<?php echo $post_category; ?>"><?php echo $post_category; ?></option>
     <?php $cat_query = "SELECT DISTINCT post_category from posts where post_category != '$post_category' ";
      $cat_edit = mysql_query($cat_query);
      while ($cat_nick=mysql_fetch_array($cat_edit)) {

  $categorie = $cat_nick['post_category']; ?>
  
  <option value="<?php echo $categorie; ?>"><?php echo $categorie;  ?></option>
  <?php } ?>
  
</select><br />
	 Autor:<br>
   	 <input type="text" name="author" value="<?php echo $post_author?>"><br>
	 Cuvinte cheie:<br>
   	 <input type="text" name="keywords" value="<?php echo $post_keywords?>"><br>
	 <a href="javascript:imga();" id="imgbuton">Adauga Imagini</a><br/>
	 <div class="imagini">
	 Imagine 1:<br>
   	 <input type="file" name="img1"><br>
	 	 <br>
	<?php if($post_image !=''){ ?> <img src="../images/<?php echo $post_image;?>" width="200px" height="150px"><br><?php } ?>
     Imagine 2 :<br>
     <input type="file" name="img2"><br>
	<?php if($post_image2!=''){ ?> <img src="../images/<?php echo $post_image2;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
     Imagine 3 :<br>
     <input type="file" name="img3"><br>
	<?php if($post_image3!=''){ ?> <img src="../images/<?php echo $post_image3;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
     Imagine 4 :<br>
     <input type="file" name="img4"><br>
	<?php if($post_image4!=''){ ?> <img src="../images/<?php echo $post_image4;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
	 Imagine 5 :<br>
     <input type="file" name="img5"><br>
	<?php if($post_image5!=''){ ?> <img src="../images/<?php echo $post_image5;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
     Imagine 6 :<br>
     <input type="file" name="img6"><br>
	<?php if($post_image6!=''){ ?> <img src="../images/<?php echo $post_image6;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
     Imagine 7 :<br>
     <input type="file" name="img7"><br>
	<?php if($post_image7!=''){ ?> <img src="../images/<?php echo $post_image7;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
     Imagine 8 :<br>
     <input type="file" name="img8"><br>
	<?php if($post_image8!=''){ ?> <img src="../images/<?php echo $post_image8;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
     Imagine 9 :<br>
     <input type="file" name="img9"><br>
	<?php if($post_image9!=''){ ?> <img src="../images/<?php echo $post_image9;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
     Imagine 10 :<br>
     <input type="file" name="img10"><br>
	<?php if($post_image10!=''){ ?> <img src="../images/<?php echo $post_image10;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
     Imagine 11 :<br>
     <input type="file" name="img11"><br>
	<?php if($post_image11!=''){ ?> <img src="../images/<?php echo $post_image11;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
     Imagine 12 :<br>
     <input type="file" name="img12"><br>
	<?php if($post_image12!=''){ ?> <img src="../images/<?php echo $post_image12;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
     Imagine 13 :<br>
     <input type="file" name="img13"><br>
	<?php if($post_image13!=''){ ?> <img src="../images/<?php echo $post_image13;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
     Imagine 14 :<br>
     <input type="file" name="img14"><br>
	<?php if($post_image14!=''){ ?> <img src="../images/<?php echo $post_image14;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
     Imagine 15 :<br>
     <input type="file" name="img15"><br>
	<?php if($post_image15!=''){ ?> <img src="../images/<?php echo $post_image15;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
     </div>	 
	 <?php
     //Includ comenzile rapide
     require_once 'comanda.php';	 
	  ?>
<br>
	 Continut:<br>
   	 <textarea id="insert" name="content" placeholder="Introduceti date despre articol" rows="25" cols="50"><?php echo $post_content?></textarea><br> 
	 <br />
	 <div class="warning">Atentie! Se poate folosi HTML </div>
	 Previzualizeaza:
   	 <br />
   	 <input type="checkbox" id="previz" onclick="verifica()" />Previzualizeaza
   	 <br />
   	 <div class="arata" style="display: none;"></div>
   	 <br />
	 Publica:<br>
   	 <input type="submit" name="update" value="Editeaza !">
  </form>
  <div class="back"><a href="http://localhost">Home</a></div>
  <?php } else { ?>
  	
  	<?php if(isset($_GET['editare'])){


$edit_id = $_GET['editare'];
$edit_query = "select * from introducere where id='$edit_id'";
$run_edit = mysql_query($edit_query);
while ($edit_row=mysql_fetch_array($run_edit)) {

  $post_id = $edit_row['id'];
  $post_title = $edit_row['titlu'];
  $post_content = htmlentities($edit_row['continut']);
  $ismain = $edit_row['ismain'];
  $img1 = $edit_row['img1'];
  $img2 = $edit_row['img2'];
  $img3 = $edit_row['img3'];
  $img4 = $edit_row['img4'];

}



} ?>
  	
  	<form method="post" action="edit_posts.php?editare=<?php echo $post_id; ?>" enctype="multipart/form-data">

 Introducere principala: <br /><select name="alegemain">
     <option value="<?php echo $ismain; ?>"><?php echo $ismain; ?></option>
     <?php $cat_query = "SELECT DISTINCT ismain from introducere where ismain != '$ismain' ";
      $cat_edit = mysql_query($cat_query);
      while ($cat_nick=mysql_fetch_array($cat_edit)) {

  $categorie = $cat_nick['ismain']; ?>

?>
  <option value="<?php echo $categorie; ?>"><?php echo $categorie;  ?></option>
  <?php } ?>
  </select>
<br/>
     Titlu:<br/>
   	 <input type="text" name="title" value="<?php echo $post_title; ?>" autofocus><br>
	 <br>
<?php
//Includ comenzile rapide
 require 'comanda.php'; ?>
<br>
     Imagine 1:<br>
   	 <input type="file" name="img1"><br />
	<?php if($img1!=''){ ?> <img src="../images/<?php echo $img1;?>" width="200px" height="150px"><br><?php } ?>
     Imagine 2 :<br>
     <input type="file" name="img2"><br />
	<?php if($img2!=''){ ?> <img src="../images/<?php echo $img2;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
     Imagine 3 :<br>
     <input type="file" name="img3"><br />
	<?php if($img3!=''){ ?> <img src="../images/<?php echo $img3;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
     Imagine 4 :<br>
     <input type="file" name="img4"><br />
	<?php if($img4!=''){ ?> <img src="../images/<?php echo $img4;?>" width="200px" height="150px"><br><?php } ?>
	 <br>
	 Continut:<br>
   	 <textarea id="insert" name="content" placeholder="Introduceti date despre articol" rows="25" cols="50" onkeyup="myPreview()"><?php echo $post_content; ?></textarea>
   	 <br />
   	 <div class="warning"><p>Atentie! Se poate folosi HTML</p>
   	 </div>
   	 Previzualizeaza:
   	 <br />
   	 <input type="checkbox" id="previz" onclick="verifica()" />Previzualizeaza
   	 <br />
   	 <br />
	 Publica:
	 <br />
   	 <input type="submit" name="updateint" value="Trimite postare!">
  </form>
  	<?php } ?>
  </div>
 <?php if(isset($_POST['update'])){
$update_id = $_GET['editare'];
//Titlu
$post_title1 = $_POST['title'];
//Data
$post_date1 = date('y-m-d');
//Autor
$post_author1 = $_POST['author'];
//Cuvinte Cheie
$post_keywords1 = $_POST['keywords'];
//Continut
$post_content1 = $_POST['content'];
//Categorie
$post_category1 = $_POST['alege2'];
//Imagini
 $image_tmp1 = $_FILES['img1']['tmp_name'];
 $image_tmp2 = $_FILES['img2']['tmp_name'];
 $image_tmp3 = $_FILES['img3']['tmp_name'];
 $image_tmp4 = $_FILES['img4']['tmp_name'];
 $image_tmp5 = $_FILES['img5']['tmp_name'];
 $image_tmp6 = $_FILES['img6']['tmp_name'];
 $image_tmp7 = $_FILES['img7']['tmp_name'];
 $image_tmp8 = $_FILES['img8']['tmp_name'];
 $image_tmp9 = $_FILES['img9']['tmp_name'];
 $image_tmp10 = $_FILES['img10']['tmp_name'];
 $image_tmp11 = $_FILES['img11']['tmp_name'];
 $image_tmp12 = $_FILES['img12']['tmp_name'];
 $image_tmp13 = $_FILES['img13']['tmp_name'];
 $image_tmp14 = $_FILES['img14']['tmp_name'];
 $image_tmp15 = $_FILES['img15']['tmp_name'];
 //Imagine 1
 $parts = pathinfo($_FILES['img1']['name']);
 $filename = $parts['filename'];
 $extension = $parts['extension'];
 if($extension != ''){$img1 = $filename . rand(1, 100) . '.' . $extension;
 $file_with_path1 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image";
 if (file_exists($file_with_path1)) {
	 
	 unlink($file_with_path1);
 }
 move_uploaded_file($image_tmp1,"../images/$img1");
 }else{$img1 = $post_image;}
 //Imagine 2
 $parts2 = pathinfo($_FILES['img2']['name']);
 $filename2 = $parts2['filename'];
 $extension2 = $parts2['extension'];
 if($extension2 != ''){$img2 = $filename2 . rand(1, 100) . '.' . $extension2;
 $file_with_path2 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image2";
 if (file_exists($file_with_path2)) {
	 
	 unlink($file_with_path2);
 }
 move_uploaded_file($image_tmp2,"../images/$img2");
 }else{$img2 = $post_image2;}
 //Imagine 3
 $parts3 = pathinfo($_FILES['img3']['name']);
 $filename3 = $parts3['filename'];
 $extension3 = $parts3['extension'];
 if($extension3 != ''){$img3 = $filename3 . rand(1, 100) . '.' . $extension3;
 $file_with_path3 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image3";
 if (file_exists($file_with_path3)) {
	 
	 unlink($file_with_path3);
 }
 move_uploaded_file($image_tmp3,"../images/$img3");
 }else{$img3 = $post_image3;}
 //Imagine 4
 $parts4 = pathinfo($_FILES['img4']['name']);
 $filename4 = $parts4['filename'];
 $extension4 = $parts4['extension'];
 if($extension4 != ''){$img4 = $filename4 . rand(1, 100) . '.' . $extension4;
 $file_with_path4 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image4";
 if (file_exists($file_with_path4)){
	 
	 unlink($file_with_path4);
 }
  move_uploaded_file($image_tmp4,"../images/$img4");
 }else{$img4 = $post_image4;}
 //Imagine 5
 $parts5 = pathinfo($_FILES['img5']['name']);
 $filename5 = $parts5['filename'];
 $extension5 = $parts5['extension'];
 if($extension5 != ''){$img5 = $filename5 . rand(1, 100) . '.' . $extension5;
 $file_with_path5 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image5";
 if (file_exists($file_with_path5)){
	 
	 unlink($file_with_path5);
 }
  move_uploaded_file($image_tmp5,"../images/$img5");
 }else{$img5 = $post_image5;}
 //Imagine 6
 $parts6 = pathinfo($_FILES['img6']['name']);
 $filename6 = $parts6['filename'];
 $extension6 = $parts6['extension'];
 if($extension6 != ''){$img6 = $filename6 . rand(1, 100) . '.' . $extension6;
 $file_with_path6 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image6";
 if (file_exists($file_with_path6)){
	 
	 unlink($file_with_path6);
 }
  move_uploaded_file($image_tmp6,"../images/$img6");
 }else{$img6 = $post_image6;}
 //Imagine 7
 $parts7 = pathinfo($_FILES['img7']['name']);
 $filename7 = $parts7['filename'];
 $extension7 = $parts7['extension'];
 if($extension7 != ''){$img7 = $filename7 . rand(1, 100) . '.' . $extension7;
 $file_with_path7 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image7";
 if (file_exists($file_with_path7)){
	 
	 unlink($file_with_path7);
 }
  move_uploaded_file($image_tmp7,"../images/$img7");
 }else{$img7 = $post_image7;}
 //Imagine 8
 $parts8 = pathinfo($_FILES['img8']['name']);
 $filename8 = $parts8['filename'];
 $extension8 = $parts8['extension'];
 if($extension8 != ''){$img8 = $filename8 . rand(1, 100) . '.' . $extension8;
 $file_with_path8 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image8";
 if (file_exists($file_with_path8)){
	 
	 unlink($file_with_path8);
 }
  move_uploaded_file($image_tmp8,"../images/$img8");
 }else{$img8 = $post_image8;}
 //Imagine 9
 $parts9 = pathinfo($_FILES['img9']['name']);
 $filename9 = $parts9['filename'];
 $extension9 = $parts9['extension'];
 if($extension9 != ''){$img9 = $filename9 . rand(1, 100) . '.' . $extension9;
 $file_with_path9 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image9";
 if (file_exists($file_with_path9)){
	 
	 unlink($file_with_path9);
 }
  move_uploaded_file($image_tmp9,"../images/$img9");
 }else{$img9 = $post_image9;}
//Imagine 10
 $parts10 = pathinfo($_FILES['img10']['name']);
 $filename10 = $parts10['filename'];
 $extension10 = $parts10['extension'];
 if($extension10 != ''){$img10 = $filename10 . rand(1, 100) . '.' . $extension10;
 $file_with_path10 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image10";
 if (file_exists($file_with_path10)){
	 
	 unlink($file_with_path10);
 }
  move_uploaded_file($image_tmp10,"../images/$img10");
 }else{$img10 = $post_image10;}
 //Imagine 11
 $parts11 = pathinfo($_FILES['img11']['name']);
 $filename11 = $parts11['filename'];
 $extension11 = $parts11['extension'];
 if($extension11 != ''){$img11 = $filename11 . rand(1, 100) . '.' . $extension11;
 $file_with_path11 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image11";
 if (file_exists($file_with_path11)){
	 
	 unlink($file_with_path11);
 }
  move_uploaded_file($image_tmp11,"../images/$img11");
 }else{$img11 = $post_image11;}
 //Imagine 12
 $parts12 = pathinfo($_FILES['img12']['name']);
 $filename12 = $parts12['filename'];
 $extension12 = $parts12['extension'];
 if($extension12 != ''){$img12 = $filename12 . rand(1, 100) . '.' . $extension12;
 $file_with_path12 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image12";
 if (file_exists($file_with_path12)){
	 
	 unlink($file_with_path12);
 }
  move_uploaded_file($image_tmp12,"../images/$img12");
 }else{$img12 = $post_image12;}
 //Imagine 13
 $parts13 = pathinfo($_FILES['img13']['name']);
 $filename13 = $parts13['filename'];
 $extension13 = $parts13['extension'];
 if($extension13 != ''){$img13 = $filename13 . rand(1, 100) . '.' . $extension13;
 $file_with_path13 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image13";
 if (file_exists($file_with_path13)){
	 
	 unlink($file_with_path13);
 }
  move_uploaded_file($image_tmp13,"../images/$img13");
 }else{$img13 = $post_image13;}
 //Imagine 14
 $parts14 = pathinfo($_FILES['img14']['name']);
 $filename14 = $parts14['filename'];
 $extension14 = $parts14['extension'];
 if($extension14 != ''){$img14 = $filename14 . rand(1, 100) . '.' . $extension14;
 $file_with_path14 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image14";
 if (file_exists($file_with_path14)){
	 
	 unlink($file_with_path14);
 }
  move_uploaded_file($image_tmp14,"../images/$img14");
 }else{$img14 = $post_image14;}
 //Imagine 15
 $parts15 = pathinfo($_FILES['img15']['name']);
 $filename15 = $parts15['filename'];
 $extension15 = $parts15['extension'];
 if($extension15 != ''){$img15 = $filename15 . rand(1, 100) . '.' . $extension15;
 $file_with_path15 = $_SERVER['DOCUMENT_ROOT'] . "/secretproject/images/$post_image15";
 if (file_exists($file_with_path15)){
	 
	 unlink($file_with_path15);
 }
  move_uploaded_file($image_tmp15,"../images/$img15");
 }else{$img15 = $post_image15;}   
 //Sfarsit imagini
 
if($post_title1=='' or $post_author1=='' or $post_keywords1=='' or $post_content1==''){
echo "<script>alert('Nu poti trimite un formular care are date necompletate sau imagini care nu au extensia JPG,PNG,BMP!')</script>";
exit();
}
else{
	$update_query = "UPDATE posts SET post_title='$post_title1',post_date='$post_date1',post_author='$post_author1',post_keywords='$post_keywords1',post_content='$post_content1',post_category='$post_category1',img1='$img2',img2='$img3',img3='$img4',img4='$img5',img5='$img6',img6='$img7',img7='$img8',img8='$img9',img9='$img10',img10='$img11',img11='$img12',img12='$img13',img13='$img14',img14='$img15',post_image='$img1' WHERE post_id='$update_id'"; 
    if(mysql_query($update_query)){
    echo "<script>alert('Postarea a fost editata cu succes !')</script>";
    echo "<script>window.open('edit_posts.php?editare=".$update_id."', '_self')</script>";
		exit();
	}
	else{die(mysql_error());}
} 
}


if(isset($_POST['updateint'])){
$update_id = $_GET['editare'];
//Stergere imagini
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
//Opriere stergere
$post_title1 = $_POST['title'];
$post_content1 = $_POST['content'];
$post_category1 = $_POST['alegemain'];
//Imagini
 //Imagine 1
 $parts1 = pathinfo($_FILES['img1']['name']);
 $filename1 = $parts1['filename'];
 $extension1 = $parts1['extension'];
 $img1 = $filename1 . rand(1, 100) . '.' . $extension1;
 //Imagine 2
 $parts2 = pathinfo($_FILES['img2']['name']);
 $filename2 = $parts2['filename'];
 $extension2 = $parts2['extension'];
 $img2 = $filename2 . rand(1, 100) . '.' . $extension2;
 //Imagine 3
 $parts3 = pathinfo($_FILES['img3']['name']);
 $filename3 = $parts3['filename'];
 $extension3 = $parts3['extension'];
 $img3 = $filename3 . rand(1, 100) . '.' . $extension3;
 //Imagine 4
 $parts4 = pathinfo($_FILES['img4']['name']);
 $filename4 = $parts4['filename'];
 $extension4 = $parts4['extension'];
 $img4 = $filename4 . rand(1, 100) . '.' . $extension4;
 //Sfarsit imagini
 $image_tmp = $_FILES['img1']['tmp_name'];
 $image_tmp1 = $_FILES['img2']['tmp_name'];
 $image_tmp2 = $_FILES['img3']['tmp_name'];
 $image_tmp3 = $_FILES['img4']['tmp_name'];
 
if($post_title1=='' or $post_content1==''){
echo "<script>alert('Nu poti trimite un formular care are date necompletate sau imagini care nu au extensia JPG,PNG,BMP!')</script>";
exit();
}
else{
	//Daca articolul nu contine rulez query
 if($extension1 == '' && $extension2 == '' && $extension3 == '' && $extension4 == ''){
 $update_query = "UPDATE introducere SET titlu='$post_title1', continut='$post_content1',ismain='$post_category1' WHERE id='$update_id'";
 }
 else if($extension1!='' && $extension2!='' && $extension3!='' && $extension4 != ''){
	   $update_query = "UPDATE introducere SET titlu='$post_title1', continut='$post_content1',ismain='$post_category1',img1='$img1',img2='$img2',img3='$img3',img4='$img4' WHERE id='$update_id'";
      move_uploaded_file($image_tmp,"../images/$img1");
      move_uploaded_file($image_tmp1,"../images/$img2");
      move_uploaded_file($image_tmp2,"../images/$img3");
      move_uploaded_file($image_tmp3,"../images/$img4");
 }
 else if($extension1!='' && $extension2!='' && $extension3!=''){
	   $update_query = "UPDATE introducere SET titlu='$post_title1', continut='$post_content1',ismain='$post_category1',img1='$img1',img2='$img2',img3='$img3' WHERE id='$update_id'";
	  move_uploaded_file($image_tmp,"../images/$img1");
      move_uploaded_file($image_tmp1,"../images/$img2");
      move_uploaded_file($image_tmp2,"../images/$img3");
 }
 else if($extension1!='' && $extension2!=''){
	   $update_query = "UPDATE introducere SET titlu='$post_title1', continut='$post_content1',ismain='$post_category1',img1='$img1',img2='$img2' WHERE id='$update_id'";
	  move_uploaded_file($image_tmp,"../images/$img1");
      move_uploaded_file($image_tmp1,"../images/$img2");
 }
 else if($extension1!=''){
	  $update_query = "UPDATE introducere SET titlu='$post_title1', continut='$post_content1',ismain='$post_category1',img1='$img1' WHERE id='$update_id'";
	 move_uploaded_file($image_tmp,"../images/$img1");
 }
 else {echo "<script>alert('Fotografiile trebuie incarcate in ordine!')</script>";
 echo "<script>window.open('insert_introducere.php', '_self')</script>";} 
if(mysql_query($update_query)){
echo "<script>alert('Postarea a fost editata cu succes !')</script>";
echo "<script>window.open('view_posts.php', '_self')</script>";
}
else {die(mysql_error());}
}
} 
?>
</body>
</html>
<?php } ?>