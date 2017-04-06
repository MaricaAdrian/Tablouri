<script src="tablou.js"></script>
<div id="panou"><?php if($_SESSION['user_level']=='a'){echo "<div id='admin'>Logat ca ,<b> $_SESSION[user_name]</b>  - Moderator</div> ";} 
else if($_SESSION['user_level']=='b'){echo "<div id='admin'>Logat ca ,<b> $_SESSION[user_name]</b>  - Moderator Adjunct </div> ";}
else if($_SESSION['user_level']=='c'){echo "<div id='admin'>Logat ca ,<b> $_SESSION[user_name]</b>  - Moderator Sef</div> ";}
else if($_SESSION['user_level']=='d'){echo "<div id='admin'>Logat ca ,<b> $_SESSION[user_name]</b> - Administrator</div> ";} 



 ?>
<h2><a href="logout.php">Delogare</a><br>
<a href="view_posts.php">Vizualizeaza postari</a><br>
<a href="insert_post.php">Postare noua</a><br>
<a href="../index.php">Site Home</a><br>
<a href="index.php">Admin Home</a><br>
<a href="schimbaparola.php">Schimba Parola</a><br>
<a href="comentari_admin.php">Comentarii</a><br>
<a href="convm.php">Conversatii</a><br>
<?php if($_SESSION['user_level']>'b') echo '<a href="test.php">Adauga Test</a><br>' ?>
<?php if($_SESSION['user_level']=='d') echo '<a href="adauga.php">Adauga Admin</a><br><a href="../admin/aproba.php">Aproba Cereri</a><br><a href="stiatica.php">Adauga Stiati Ca...</a><br>'
?></h2></div>
<br><br><br><br><br><br>
<div id="button">Meniu</div>


