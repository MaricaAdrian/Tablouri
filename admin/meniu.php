<?php 

if($_SESSION['user_level']=='a'){echo "Logat ca , $_SESSION[user_name] - Scriitor ";} 
else if($_SESSION['user_level']=='b'){echo "Logat ca , $_SESSION[user_name] - Redactor ";}
else if($_SESSION['user_level']=='c'){echo "Logat ca , $_SESSION[user_name] - Producator ";}
else if($_SESSION['user_level']=='d'){echo "Logat ca , $_SESSION[user_name] - Administrator ";} 



 ?>
<h2><a href="logout.php">Delogare</a><br>
<a href="view_posts.php">Vizualizeaza postari</a><br>
<a href="insert_post.php">Postare noua</a><br>
<a href="../index.php">Site Home</a><br>
<a href="index.php">Admin Home</a><br>
<a href="schimbaparola.php">Schimba Parola</a><br>
<a href="comentari_admin.php">Comentarii</a><br>
<a href="convm.php">Conversatii</a><br>
<?php if($_SESSION['user_level']=='d') echo '<a href="adauga.php">Adauga Admin</a><br><a href="../admin/aproba.php">Aproba cereri</a>' ?></h2>