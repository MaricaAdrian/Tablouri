<?php
session_start();
if(!isset($_SESSION['user_name'])){

header("location: login.php");

}
else { $username=$_SESSION['user_name'];


require_once 'antet_admin.php';

?>

<div id="center2"> 

<div class="articols"><h1 class="centru">Adauga la introducere</h1>


<?php 
include ("../includes/connect.php"); 
?>

 <form method="post" action="insert_introducere.php" enctype="multipart/form-data">

 Introducere principala: <br /><?php $query = "SHOW COLUMNS FROM `introducere` LIKE 'ismain'";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	
	$type = $row["Type"];
	//Sterg tipul
	$output = str_replace("enum('", "", $type);

 //Rezultatul va fi acuma: Vectori','Matrici','Test
$output = str_replace("')", "", $output);

//Transform rezultatul in Array
$results = explode("','", $output);

//HTML
echo "<select name=\"alegemain\">";

//Afisez rezultatul ca obiect HTML
for($i = 0; $i < count($results); $i++) {
	echo "<option value=\"".$results[$i]."\">".$results[$i]."</option>";

}

//Inchid HTML
echo"</select>";
	
}

?>
<br>
     Titlu:<br>
   	 <input type="text" name="title" autofocus><br>
	 <br>
<?php
//Includ comenzile rapide
 require 'comanda.php'; ?>
<br>
     Imagine 1:<br>
   	 <input type="file" name="img1"><br>
     Imagine 2 :<br>
     <input type="file" name="img2"><br>
     Imagine 3 :<br>
     <input type="file" name="img3"><br>
     Imagine 4 :<br>
     <input type="file" name="img4"><br>
	 Continut:<br>
   	 <textarea id="insert" name="content" placeholder="Introduceti date despre articol" rows="25" cols="50" onkeyup="myPreview()"><?php /*Includ un model de folosire */ require 'model.php'; ?></textarea>
   	 <br />
   	 <div class="warning"><p>Atentie! Se poate folosi HTML</p>
   	 </div>
   	 Previzualizeaza:
   	 <br />
   	 <input type="checkbox" id="previz" onclick="verifica()" />Previzualizeaza
   	 <br />
   	 <div class="arata" style="display: none;"></div>
   	 <br />
	 Publica:
	 <br />
   	 <input type="submit" name="submitint" value="Trimite postare!">
  </form>
 <?php
if(isset($_POST['submitint'])){

 $post_title = $_POST['title'];
 $post_content= $_POST['content'];
 $ismain = $_POST['alegemain'];
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
 
 if($post_title=='' or $post_content==''){
     echo "<script>alert('Nu poti trimite un formular care are date necompletate sau imagini care nu au extensia JPG,PNG,BMP!')</script>";
     exit();
	
	
	}

 
//Daca articolul nu contine rulez query
 if($extension1 == '' && $extension2 == '' && $extension3 == '' && $extension4 == ''){
 $insert_query = "insert into introducere (titlu,continut,ismain) values ('$post_title','$post_content','$ismain')";
 }
 else if($extension1!='' && $extension2!='' && $extension3!='' && $extension4 != ''){
	  $insert_query = "insert into introducere (titlu,continut,ismain,img1,img2,img3,img4) values ('$post_title','$post_content','$ismain','$img1','$img2','$img3','$img4')";
      move_uploaded_file($image_tmp,"../images/$img1");
      move_uploaded_file($image_tmp1,"../images/$img2");
      move_uploaded_file($image_tmp2,"../images/$img3");
      move_uploaded_file($image_tmp3,"../images/$img4");
 }
 else if($extension1!='' && $extension2!='' && $extension3!=''){
	 $insert_query = "insert into introducere (titlu,continut,ismain,img1,img2,img3) values ('$post_title','$post_content','$ismain','$img1','$img2','$img3')";
	  move_uploaded_file($image_tmp,"../images/$img1");
      move_uploaded_file($image_tmp1,"../images/$img2");
      move_uploaded_file($image_tmp2,"../images/$img3");
 }
 else if($extension1!='' && $extension2!=''){
	  $insert_query = "insert into introducere (titlu,continut,ismain,img1,img2) values ('$post_title','$post_content','$ismain','$img1','$img2')";
	  move_uploaded_file($image_tmp,"../images/$img1");
      move_uploaded_file($image_tmp1,"../images/$img2");
 }
 else if($extension1!=''){
	 $insert_query = "insert into introducere (titlu,continut,ismain,img1) values ('$post_title','$post_content','$ismain','$img1')";
	 move_uploaded_file($image_tmp,"../images/$img1");
 }
 else {echo "<script>alert('Fotografiile trebuie incarcate in ordine!')</script>";
 echo "<script>window.open('insert_introducere.php', '_self')</script>";}
 if(mysql_query($insert_query)){echo "<script>alert('Postarea a avut loc cu succes!')</script>";
 echo "<script>window.open('insert_introducere.php', '_self')</script>";
					  
} 
 

}
}

?>
