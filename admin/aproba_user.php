<?php 
session_start();

if(!isset($_SESSION['user_name'])){

header("location: login.php");


}
if($_SESSION['user_level']=='a' || $_SESSION['user_level']=='b' || $_SESSION['user_level']=='c'){

echo '<script>alert("Nu esti autorizat sa aprobi utilizatori!")</script>';
echo "<script>window.open('view_posts.php', '_self')</script>";
}
else {
include("../includes/connect.php");

if(isset($_GET['aproba']) && isset($_GET['aprobare'])){

require_once 'PHPMailerAutoload.php';
require_once 'class.phpmailer.php'; 
require_once 'class.smtp.php';

$aproba2_id = $_GET['aproba'];
$aprobare = $_GET['aprobare'];
$query = "select * from aplica where aplica_id='$aproba2_id'";
$run = mysql_query($query);
while($row=mysql_fetch_array($run)){
$aplica_utilizator = $row['aplica_utilizator'];
$aplica_parola = $row['aplica_parola'];
$aplica_email = $row['aplica_email'];
$aplica_nume = $row['aplica_nume'];
$cryptpass = crypt($aplica_parola);
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPSecure = 'tls';
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = "gabrilemarica@gmail.com";
$mail->Password = "shakurr1";
$mail->From = 'gabrilemarica@gmail.com';
$mail->FromName = 'Marica Adrian';
$mail->addAddress($aplica_email, $aplica_nume);
$mail->Subject = 'Cererea dumneavoastra de administrator a fost revizuita';
if($aprobare == 1){	
$mail->Body = '<html><body><h1>Felicitari cererea de administrator a fost aprobata !</h1>Buna ziua '.$aplica_nume.' ti-a fost acceptata cererea de admininistrator.Felicitari!<br>Nume de utilizator: ' . $aplica_utilizator . ' <br>Parola: '. $aplica_parola .' <br>Grad de administrare: a</body></html>';
$mail->AltBody = '<html><body><h1>Felicitari cererea de administrator a fost aprobata !</h1>Buna ziua '.$aplica_nume.' ti-a fost acceptata cererea de admininistrator.Felicitari!<br>Nume de utilizator: ' . $aplica_utilizator . ' <br>Parola:' . $aplica_parola . ' <br>Grad de administrare: a</body></html>';
}
else{
	
	$mail->Body = '<html><body><h1>Buna ziua ! </h1> <br /> Ne pare rau cererea de administrator pentru A-Solution a fost respinsa de catre ' . $_SESSION[user_name] . ' ! <br />Daca nu sunteti deacord cu decizia contactati-ne folosind pagina de contact ! </body></html>';
	$mail->AltBody = '<html><body><h1>Buna ziua ! </h1> <br /> Ne pare rau cererea de administrator pentru A-Solution a fost respinsa de catre ' . $_SESSION[user_name] . ' ! <br />Daca nu sunteti deacord cu decizia contactati-ne folosind pagina de contact ! </body></html>';
}
if(!$mail->send()) {
   echo 'Message could
        not be sent.';
   echo 'Mailer Error:
        ' . $mail->ErrorInfo;
   exit;
}
}
if($aprobare){
$aplica_level = "a";
$aprobat = 1;

$insert_query = "insert into admin_login
 (user_name,user_pass,user_level,user_nick) values 
 ('$aplica_utilizator','$cryptpass','$aplica_level','$aplica_nume')";
$update_query = "UPDATE `cms`.`aplica` SET `aprobat` = '$aprobat' WHERE `aplica`.`aplica_id` = '$aproba2_id'"; 
if(mysql_query($update_query) && mysql_query($insert_query)){
echo "<script>alert('Utilizatorul a fost adaugat !')</script>";
echo "<script>window.open('aproba.php','_self')</script>";
}

else die($update_query."<br/><br/>".mysql_error());
}
else{
	
	
	$query=  "DELETE FROM `cms`.`aplica` WHERE `aplica`.`aplica_id` = $aproba2_id";
	if(mysql_query($query)){
		echo "<script>alert('Utilizatorul a fost respins !')</script>";
        echo "<script>window.open('aproba.php','_self')</script>";
	}
}

}








}










?>