<?php
session_start();
if(!isset($_SESSION['user_name'])){

header("location: login.php");

}
else { $username=$_SESSION['user_name'];


require_once 'antet_admin.php';

?>

<div id="center2"> 
	
	<button id="aratap" onclick="afisare1()">Adauga un articol</button>
    <button id="aratas" onclick="location.href='insert_subpost.php'">Adauga la subcategoria unui articol</button>
	<button id="aratai" onclick="location.href='insert_introducere.php'">Adauga la Introducere</button>
	
	<div class="articolp" style="display: none;"> <h1 class="centru">Adauga articol</h1>
<?php 
include ("../includes/connect.php"); 

 


?>


<?php 
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

 <form method="post" action="insert_post.php" enctype="multipart/form-data">
 Categorie:<br>

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
echo "<select name=\"alege2\">";

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
   	 <input type="submit" name="submit" value="Trimite postare!">
  </form>
 <?php
if(isset($_POST['submit'])){

 $post_category = $_POST['alege2'];
 $post_title = $_POST['title'];
 $post_date = date('y-m-d');
 $post_author = $nick;
 $post_keywords = $_POST['keywords'];
 $parts = pathinfo($_FILES['image']['name']);
 $filename = $parts['filename'];
 $extension = $parts['extension'];
 $post_image = $filename . rand(1, 100) . '.' . $extension;
 $parts1 = pathinfo($_FILES['img1']['name']);
 $filename1 = $parts1['filename'];
 $extension1 = $parts1['extension'];
 $img1 = $filename1 . rand(1, 100) . '.' . $extension1;
 $parts2 = pathinfo($_FILES['img2']['name']);
 $filename2 = $parts2['filename'];
 $extension2 = $parts2['extension'];
 $img2 = $filename2 . rand(1, 100) . '.' . $extension2;
 $parts3 = pathinfo($_FILES['img3']['name']);
 $filename3 = $parts3['filename'];
 $extension3 = $parts3['extension'];
 $img3 = $filename3 . rand(1, 100) . '.' . $extension3;
 $apost_content= $_POST['content'];
 $post_content= $_POST['content'];
 $image_tmp = $_FILES['image']['tmp_name'];
 $image_tmp1 = $_FILES['img1']['tmp_name'];
 $image_tmp2 = $_FILES['img2']['tmp_name'];
 $image_tmp3 = $_FILES['img3']['tmp_name'];
 if($post_title=='' or $post_author=='' or $post_keywords=='' or $post_content=='' or $extension!='jpg' && $extension!='png' && $extension!='bmp'){
     echo "<script>alert('Nu poti trimite un formular care are date necompletate sau imagini care nu au extensia JPG,PNG,BMP!')</script>";
     exit();
	
	
	}

 else{
move_uploaded_file($image_tmp,"../images/$post_image");
move_uploaded_file($image_tmp1,"../images/$img1");
move_uploaded_file($image_tmp2,"../images/$img2");
move_uploaded_file($image_tmp3,"../images/$img3");
//Daca articolul nu contine imagini suplimentare rulez query
if($extension1=='' && $extension2=='' && $extension3==''){
 $insert_query = "insert into posts
 (post_title,post_date,post_author,post_image,post_keywords,post_content,post_category) values 
 ('$post_title','$post_date','$post_author','$post_image','$post_keywords','$apost_content','$post_category')";
 if(mysql_query($insert_query)){echo "<script>alert('Postarea a avut loc cu succes!')</script>";
 echo "<script>window.open('insert_post.php', '_self')</script>";
 }
} //Daca articolul contine 3 imagini suplimentare rulez query
  else if($extension1!='' && $extension2!='' && $extension3!='') { $insert_query = "insert into posts
 (post_title,post_date,post_author,post_image,post_keywords,post_content,post_category,img1,img2,img3) values 
 ('$post_title','$post_date','$post_author','$post_image','$post_keywords','$apost_content','$post_category','$img1','$img2','$img3')";
 if(mysql_query($insert_query)){echo "<script>alert('Postarea a avut loc cu succes!')</script>";
 echo "<script>window.open('insert_post.php', '_self')</script>";
                                }
                          }
//Daca articolul contine 2 imagini suplimentare rulez query						  
 else if($extension1!='' && $extension2!='') { $insert_query = "insert into posts
 (post_title,post_date,post_author,post_image,post_keywords,post_content,post_category,img1,img2) values 
 ('$post_title','$post_date','$post_author','$post_image','$post_keywords','$apost_content','$post_category','$img1','$img2')";
 if(mysql_query($insert_query)){echo "<script>alert('Postarea a avut loc cu succes!')</script>";
 echo "<script>window.open('insert_post.php', '_self')</script>";
                                }
                          }
//Daca articolul contine 1 singura imagine suplimentara						  
 else if($extension1!='') { $insert_query = "insert into posts
 (post_title,post_date,post_author,post_image,post_keywords,post_content,post_category,img1) values 
 ('$post_title','$post_date','$post_author','$post_image','$post_keywords','$apost_content','$post_category','$img1')";
 if(mysql_query($insert_query)){echo "<script>alert('Postarea a avut loc cu succes!')</script>";
 echo "<script>window.open('insert_post.php', '_self')</script>";
                                }
                          }	
//Daca imaginile nu au fost incarcate in ordine alertez administratorul						  
else {echo "<script>alert('Fotografiile trebuie incarcate in ordine!')</script>";
 echo "<script>window.open('insert_post.php', '_self')</script>";}						  
} 
 
exit();
}


?>
 
  <div class="back"><a href="../index.php">Home</a></div>
  </div>
  
    
  
  </div>
</body>
</html>

<?php } ?>