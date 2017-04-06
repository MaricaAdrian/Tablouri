<?php
session_start();
if(!isset($_SESSION['user_name'])){

header("location: login.php");

}
else { $username=$_SESSION['user_name'];


require_once 'antet_admin.php';

?>

<div id="center2"> 

<div class="articols"><h1 class="centru">Adauga la subcategoria articolelor</h1>


<?php 
include ("../includes/connect.php"); 
//Selectez numele complet al administratorului
$get_query = "select user_nick FROM admin_login WHERE user_name='$username'";
//Rulez Queryul
$get_edit = mysql_query($get_query);
//Pun rezultatele intr-un array
 while ($get_nick=mysql_fetch_array($get_edit)) {
//Lui $nick ii dau numele complet al administratorului
  $nick = $get_nick['user_nick'];
 

}
?>

 <form method="post" action="insert_subpost.php" enctype="multipart/form-data">
 Subcategorie:<br>

<?php $query = "SHOW COLUMNS FROM `posts` LIKE 'post_category'";
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
echo "<select name=\"alegesub\">";

//Afisez rezultatul ca obiect HTML
for($i = 0; $i < count($results); $i++) {
	echo "<option value=\"".$results[$i]."\">".$results[$i]."</option>";

}

//Inchid HTML
echo"</select>";
	
}

?>
<br/>
Articol:<br />
<select name="alegemainart">
<?php $query = "select post_title from posts where mainart=''";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	
	$type = $row["post_title"];


	echo "<option value=\"".$type."\">".$type."</option>";

}
?>
</select>

<br>
     Titlu:<br>
   	 <input type="text" name="title" autofocus><br>
	 Autor:<br> 
	 <strong>
	 <?php
     //Afisez numele complet al administratorului	 
	 echo $nick; 
	 ?>
	 </strong>
	 <br>
	 Cuvinte cheie:<br>
   	 <input type="text" name="keywords"><br>
	 Imagine de Prezentare:<br>
   	 <input type="file" name="image"><br>
     Imagine 1 :<br>
     <input type="file" name="img1"><br>
     Imagine 2 :<br>
     <input type="file" name="img2"><br>
     Imagine 3 :<br>
     <input type="file" name="img3"><br>
	 Imagine 4 :<br>
     <input type="file" name="img4"><br>
	 Imagine 5 :<br>
     <input type="file" name="img5"><br>
	 Imagine 6 :<br>
     <input type="file" name="img6"><br>
	 Imagine 7 :<br>
     <input type="file" name="img7"><br>
	 Imagine 8 :<br>
     <input type="file" name="img8"><br>
	 Imagine 9 :<br>
     <input type="file" name="img9"><br>
	 Imagine 10 :<br>
     <input type="file" name="img10"><br>
	 Imagine 11 :<br>
     <input type="file" name="img11"><br>
	 Imagine 12 :<br>
     <input type="file" name="img12"><br>
	 Imagine 13 :<br>
     <input type="file" name="img13"><br>
	 Imagine 14 :<br>
     <input type="file" name="img14"><br>
<?php
//Includ comenzile rapide
 require 'comanda.php'; ?>
<br>
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
   	 <input type="submit" name="submitsub" value="Trimite postare!">
  </form>
 <?php
if(isset($_POST['submitsub'])){

 $post_category = $_POST['alegesub'];
 $mainart = $_POST['alegemainart'];
 $post_title = $_POST['title'];
 $post_date = date('y-m-d');
 $post_author = $nick;
 $post_keywords = $_POST['keywords'];
 //Imagini
 $image_tmp = $_FILES['image']['tmp_name'];
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
 
 //Imagine 1
 $parts = pathinfo($_FILES['image']['name']);
 $filename = $parts['filename'];
 $extension = $parts['extension'];
 if($extension != ''){$post_image = $filename . rand(1, 100) . '.' . $extension;}else{$post_image = '';}
 //Imagine 2
 $parts1 = pathinfo($_FILES['img1']['name']);
 $filename1 = $parts1['filename'];
 $extension1 = $parts1['extension'];
 if($extension1 != ''){$img1 = $filename1 . rand(1, 100) . '.' . $extension1;}else{$img1 = '';}
 //Imagine 3
 $parts2 = pathinfo($_FILES['img2']['name']);
 $filename2 = $parts2['filename'];
 $extension2 = $parts2['extension'];
 if($extension2 != ''){$img2 = $filename2 . rand(1, 100) . '.' . $extension2;}else{$img2 = '';}
 //Imagine 4
 $parts3 = pathinfo($_FILES['img3']['name']);
 $filename3 = $parts3['filename'];
 $extension3 = $parts3['extension'];
 if($extension3 != ''){$img3 = $filename3 . rand(1, 100) . '.' . $extension3;}else{$img3 = '';}
 //Imagine 5
 $parts4 = pathinfo($_FILES['img4']['name']);
 $filename4 = $parts4['filename'];
 $extension4 = $parts4['extension'];
 if($extension4 != ''){$img4 = $filename4 . rand(1, 100) . '.' . $extension4;}else{$img4 = '';}
 //Imagine 6
 $parts5 = pathinfo($_FILES['img5']['name']);
 $filename5 = $parts5['filename'];
 $extension5 = $parts5['extension'];
 if($extension5 != ''){$img5 = $filename5 . rand(1, 100) . '.' . $extension5;}else{$img5 = '';}
 //Imagine 7
 $parts6 = pathinfo($_FILES['img6']['name']);
 $filename6 = $parts6['filename'];
 $extension6 = $parts6['extension'];
 if($extension6 != ''){$img6 = $filename6 . rand(1, 100) . '.' . $extension6;}else{$img6 = '';}
 //Imagine 8
 $parts7 = pathinfo($_FILES['img7']['name']);
 $filename7 = $parts7['filename'];
 $extension7 = $parts7['extension'];
 if($extension7 != ''){$img7 = $filename7 . rand(1, 100) . '.' . $extension7;}else{$img7 = '';} 
 //Imagine 9
 $parts8 = pathinfo($_FILES['img8']['name']);
 $filename8 = $parts8['filename'];
 $extension8 = $parts8['extension'];
 if($extension8 != ''){$img8 = $filename8 . rand(1, 100) . '.' . $extension8;}else{$img8 = '';}
 //Imagine 10
 $parts9 = pathinfo($_FILES['img9']['name']);
 $filename9 = $parts9['filename'];
 $extension9 = $parts9['extension'];
 if($extension9 != ''){$img9 = $filename9 . rand(1, 100) . '.' . $extension9;}else{$img9 = '';}
 //Imagine 11
 $parts10 = pathinfo($_FILES['img10']['name']);
 $filename10 = $parts10['filename'];
 $extension10 = $parts10['extension'];
 if($extension10 != ''){$img10 = $filename10 . rand(1, 100) . '.' . $extension10;}else{$img10 = '';} 
 //Imagine 12
 $parts11 = pathinfo($_FILES['img11']['name']);
 $filename11 = $parts11['filename'];
 $extension11 = $parts11['extension'];
 if($extension11 != ''){$img11 = $filename11 . rand(1, 100) . '.' . $extension11;}else{$img11 = '';}
 //Imagine 13
 $parts12 = pathinfo($_FILES['img12']['name']);
 $filename12 = $parts12['filename'];
 $extension12 = $parts12['extension'];
 if($extension12 != ''){$img12 = $filename12 . rand(1, 100) . '.' . $extension12;}else{$img12 = '';}
 //Imagine 14
 $parts13 = pathinfo($_FILES['img13']['name']);
 $filename13 = $parts13['filename'];
 $extension13 = $parts13['extension'];
 if($extension13 != ''){$img13 = $filename13 . rand(1, 100) . '.' . $extension13;}else{$img13 = '';}
 //Imagine 15
 $parts14 = pathinfo($_FILES['img14']['name']);
 $filename14 = $parts14['filename'];
 $extension14 = $parts5['extension'];
 if($extension14 != ''){$img14 = $filename14 . rand(1, 100) . '.' . $extension14;}else{$img14 = '';}
 //Sfarsit Imagini
 $apost_content= $_POST['content'];
 $post_content= $_POST['content'];

 if($post_title=='' or $post_author=='' or $post_keywords=='' or $post_content=='' or $extension!='jpg' && $extension!='png' && $extension!='bmp'){
     echo "<script>alert('Nu poti trimite un formular care are date necompletate sau imagini care nu au extensia JPG,PNG,BMP!')</script>";
     exit();
	
	
	}

 else{
move_uploaded_file($image_tmp,"../images/$post_image");
move_uploaded_file($image_tmp1,"../images/$img1");
move_uploaded_file($image_tmp2,"../images/$img2");
move_uploaded_file($image_tmp3,"../images/$img3");
move_uploaded_file($image_tmp4,"../images/$img4");
move_uploaded_file($image_tmp5,"../images/$img5");
move_uploaded_file($image_tmp6,"../images/$img6");
move_uploaded_file($image_tmp7,"../images/$img7");
move_uploaded_file($image_tmp8,"../images/$img8");
move_uploaded_file($image_tmp9,"../images/$img9");
move_uploaded_file($image_tmp10,"../images/$img10");
move_uploaded_file($image_tmp11,"../images/$img11");
move_uploaded_file($image_tmp12,"../images/$img12");
move_uploaded_file($image_tmp13,"../images/$img13");
move_uploaded_file($image_tmp14,"../images/$img14");
//Daca articolul nu contine imagini suplimentare rulez query
 $insert_query = "insert into posts
 (post_title,post_date,post_author,post_image,img1,img2,img3,img4,img5,img6,img7,img8,img9,img10,img11,img12,img13,img14,post_keywords,post_content,subcategoryof,mainart) values 
 ('$post_title','$post_date','$post_author','$post_image','$img1','$img2','$img3','$img4','$img5','$img6','$img7','$img8','$img9','$img10','$img11','$img12','$img13','$img14','$post_keywords','$apost_content','$post_category','$mainart')";
 if(mysql_query($insert_query)){echo "<script>alert('Postarea a avut loc cu succes!')</script>";
 echo "<script>window.open('insert_post.php', '_self')</script>";
 }else{ die(mysql_error());}
 
exit();

}
}

?></div>
 </div>
  
    
  
  </div>
</body>
</html>

<?php } ?>