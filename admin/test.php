<?php
session_start();

if(!isset($_SESSION['user_name'])){

header("location: login.php");


}
if($_SESSION['user_level']<'c'){

echo '<script>alert("Nu esti autorizat sa accesezi aceasta pagina!")</script>';
echo "<script>window.open('index.php', '_self')</script>";
}
else {
require_once 'antet_admin.php';

?>
<div id="center2"> <h1 class="centru">Adugare test</h1>
 <form method="post" action="test.php" enctype="multipart/form-data">
     Porecla test:<br/>
	 <input type="text" name="test"><br><br />
	 <div class="warning">Atentie porecla nu trebuie sa contina spatiu,numere sau caractere! Ex: "matrici" </div><br />
	 Nume test:<br />
	 <input type="text" name="numetest"><br /><br />
     Testul categoriei:
	 <select name="alegemainart">
     <?php
     require_once 'connect.php';
	 $query = "select post_title from posts where mainart=''";
     $result=mysql_query($query);
     while($row=mysql_fetch_array($result)){
	
	$type = $row["post_title"];


	echo "<option value=\"".$type."\">".$type."</option>";

    }
    ?>
</select>
	 <br />
	 Intrebarea 1:
   	 <textarea type="text" name="intrebare1"></textarea><br /><br />
     Raspuns 1 - 1:
     <input type="text" name="int11"><br><br />
     Raspuns 1 - 2:
     <input type="text" name="int12"><br><br />
     Raspuns 1 - 3:
     <input type="text" name="int13"><br><br />
     Raspuns 1 - 4:
     <input type="text" name="int14"><br><br />
	 Raspuns corect 1 :<br>
   	 <input type="radio" name="raspuns1" value="0" checked>A<br>
	 <input type="radio" name="raspuns1" value="1">B<br>
	 <input type="radio" name="raspuns1" value="2">C<br>
	 <input type="radio" name="raspuns1" value="3">D<br>
	 <br />
	 Intrebarea 2:
   	 <textarea type="text" name="intrebare2"></textarea><br><br />
     Raspuns 2 - 1:
     <input type="text" name="int21"><br><br />
     Raspuns 2 - 2:
     <input type="text" name="int22"><br><br />
     Raspuns 2 - 3:
     <input type="text" name="int23"><br><br />
     Raspuns 2 - 4:
     <input type="text" name="int24"><br><br />
	 Raspuns corect 2 :<br>
   	 <input type="radio" name="raspuns2" value="0" checked>A<br>
	 <input type="radio" name="raspuns2" value="1">B<br>
	 <input type="radio" name="raspuns2" value="2">C<br>
	 <input type="radio" name="raspuns2" value="3">D<br>
	 <br />
	 Intrebarea 3:
   	 <textarea type="text" name="intrebare3"></textarea><br><br />
     Raspuns 3 - 1:
     <input type="text" name="int31"><br><br />
     Raspuns 3 - 2:
     <input type="text" name="int32"><br><br />
     Raspuns 3 - 3:
     <input type="text" name="int33"><br><br />
     Raspuns 3 - 4:
     <input type="text" name="int34"><br><br />
	 Raspuns corect 3 :<br>
   	 <input type="radio" name="raspuns3" value="0" checked>A<br>
	 <input type="radio" name="raspuns3" value="1">B<br>
	 <input type="radio" name="raspuns3" value="2">C<br>
	 <input type="radio" name="raspuns3" value="3">D<br>
	 <br />
	 Intrebarea 4:
   	 <textarea type="text" name="intrebare4"></textarea><br><br />
     Raspuns 4 - 1:
     <input type="text" name="int41"><br><br />
     Raspuns 4 - 2:
     <input type="text" name="int42"><br><br />
     Raspuns 4 - 3:
     <input type="text" name="int43"><br><br />
     Raspuns 4 - 4:
     <input type="text" name="int44"><br><br />
	 Raspuns corect 4 :<br>
   	 <input type="radio" name="raspuns4" value="0" checked>A<br>
	 <input type="radio" name="raspuns4" value="1">B<br>
	 <input type="radio" name="raspuns4" value="2">C<br>
	 <input type="radio" name="raspuns4" value="3">D<br>
	 <br />
	 Intrebarea 5:
   	 <textarea type="text" name="intrebare5"></textarea><br><br />
     Raspuns 5 - 1:
     <input type="text" name="int51"><br><br />
     Raspuns 5 - 2:
     <input type="text" name="int52"><br><br />
     Raspuns 5 - 3:
     <input type="text" name="int53"><br><br />
     Raspuns 5 - 4:
     <input type="text" name="int54"><br><br />
	 Raspuns corect 5 :<br>
   	 <input type="radio" name="raspuns5" value="0" checked>A<br>
	 <input type="radio" name="raspuns5" value="1">B<br>
	 <input type="radio" name="raspuns5" value="2">C<br>
	 <input type="radio" name="raspuns5" value="3">D<br>
     
     <br>
	 Publica:<br>
   	 <input type="submit" name="submit" value="Adauga test!">
  </form>
  <div class="back"><a href="http://localhost">Home</a></div>
  </div>


</body>
</html>
<?php
include ("../includes/connect.php");
if(isset($_POST['submit'])){
 $test = mysql_real_escape_string($_POST['test']);
 $intrebare1 = mysql_real_escape_string($_POST['intrebare1']);
 $intrebare2 = mysql_real_escape_string($_POST['intrebare2']);
 $intrebare3 = mysql_real_escape_string($_POST['intrebare3']);
 $intrebare4 = mysql_real_escape_string($_POST['intrebare4']);
 $intrebare5 = mysql_real_escape_string($_POST['intrebare5']);
 $raspuns1 = mysql_real_escape_string($_POST['raspuns1']);
 $raspuns2 = mysql_real_escape_string($_POST['raspuns2']);
 $raspuns3 = mysql_real_escape_string($_POST['raspuns3']);
 $raspuns4 = mysql_real_escape_string($_POST['raspuns4']);
 $raspuns5 = mysql_real_escape_string($_POST['raspuns5']);
 $int11 = mysql_real_escape_string($_POST['int11']);
 $int12 = mysql_real_escape_string($_POST['int12']);
 $int13 = mysql_real_escape_string($_POST['int13']);
 $int14 = mysql_real_escape_string($_POST['int14']);
 $int21 = mysql_real_escape_string($_POST['int21']);
 $int22 = mysql_real_escape_string($_POST['int22']);
 $int23 = mysql_real_escape_string($_POST['int23']);
 $int24 = mysql_real_escape_string($_POST['int24']);
 $int31 = mysql_real_escape_string($_POST['int31']);
 $int32 = mysql_real_escape_string($_POST['int32']);
 $int33 = mysql_real_escape_string($_POST['int33']);
 $int34 = mysql_real_escape_string($_POST['int34']);
 $int41 = mysql_real_escape_string($_POST['int41']);
 $int42 = mysql_real_escape_string($_POST['int42']);
 $int43 = mysql_real_escape_string($_POST['int43']);
 $int44 = mysql_real_escape_string($_POST['int44']);
 $int51 = mysql_real_escape_string($_POST['int51']);
 $int52 = mysql_real_escape_string($_POST['int52']);
 $int53 = mysql_real_escape_string($_POST['int53']);
 $int54 = mysql_real_escape_string($_POST['int54']);
 $mainart = mysql_real_escape_string($_POST['alegemainart']);
 $numetest= mysql_real_escape_string($_POST['numetest']);

 
 $insert_query = "insert into test
 (test,numetest
 ,intrebare1,intrebare2,intrebare3,intrebare4,intrebare5
 ,raspuns1,raspuns2,raspuns3,raspuns4,raspuns5
 ,int11,int12,int13,int14
 ,int21,int22,int23,int24
 ,int31,int32,int33,int34
 ,int41,int42,int43,int44
 ,int51,int52,int53,int54,mainart) values 
 ('$test','$numetest','$intrebare1','$intrebare2','$intrebare3','$intrebare4','$intrebare5'
 ,'$raspuns1','$raspuns2','$raspuns3','$raspuns4','$raspuns5'
 ,'$int11','$int12','$int13','$int14'
 ,'$int21','$int22','$int23','$int24'
 ,'$int31','$int32','$int33','$int34'
 ,'$int41','$int42','$int43','$int44'
 ,'$int51','$int52','$int53','$int54','$mainart')";
 
 if(mysql_query($insert_query)){echo "<script>alert('Testul a fost adaugat cu succes')</script>";
 }
else{ echo die(mysql_error()); }
 

 
exit();
}

?>



<?php } ?>