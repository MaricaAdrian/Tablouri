<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<?php require_once 'includes/antet.php'; ?>
</head>
<body id="home">
  
    <header class="wrapper clearfix">
		       
        <div id="banner">        
        	<div id="logo"><a href="index.php"><img src="images/logo.png" alt="logo"></a></div> 
        </div>
  
        <?php require_once("includes/meniu.php"); ?>

    </header>
<section id="page-header" class="clearfix">  
	<div class="wrapper">
		<div class="grid_12">
			<center>
		<h1><u>Contacteaza-ne</u></h1>
           	 <br />
           	 <p>Numar telefon: <b>0770236024</b>
           	 	<br />
           	 	Nume: <b>Marica Adrian</b>
           	 </p>
           	 <p>Numar telefon: <b>0732425068</b>
           	 	<br />
           	 	Nume: <b>Vladutu Loredana</b>
           	 </p>
           	 <br />
           	 <h1><u>Trimite-ne un Email</u></h1><br />
           	  <?php if(isset($_POST['mail'])){
    $contact_email= $_POST['email'];
  	$contact_nume= $_POST['nume'];
	$contact_info= $_POST['info'];
	if($contact_email=="" or strlen($contact_info)<20 or $contact_nume==""){echo '<script>alert("Nu a-ti completat corect formularul corect!")</script>';}else{
require './admin/PHPMailerAutoload.php';
require './admin/class.phpmailer.php'; 
require './admin/class.smtp.php';
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
$mail->addAddress('gabrilemarica@gmail.com', $contact_nume);
$mail->addAddress('eu_lory_2009@yahoo.com', $contact_nume);
$mail->Subject = 'A-Solution Contact Primit';
$mail->Body = '<html><body><h1>Ai primit un mesaj !</h1>Expeditor '.$contact_nume.' <br />Email-ul expeditorului: '.$contact_email.' <br>Mesaj:'.$contact_info.'<br></body></html>';
$mail->AltBody = '<html><body><h1>Ai primit un mesaj !</h1>Expeditor '.$contact_nume.' <br />Email-ul expeditorului: '.$contact_email.' <br>Mesaj:'.$contact_info.'<br></body></html>';
echo '<script>alert("Mesaj trimis !")</script>';
if(!$mail->send()) {
   echo 'Mesajul nu a putut fi trimis.';
   echo 'Eroare:
        ' . $mail->ErrorInfo;
   exit;
}
}
  }
   ?>
  <form method="post" action="contact.php" enctype="multipart/form-data">
     Nume:<br>
   	 <input type="text" name="nume" autofocus><br>
	 Email-ul Dvs.:<br>
	 <input type="text" name="email"><br>
	 Mesaj:<br>
   	 <textarea name="info" placeholder="Mesaj...(minim 20 de caractere)" rows="25" cols="50"></textarea><br>
	 Trimite:<br>
   	 <input type="submit" name="mail" value="Trimite mesaj!">
  </form>
  </center>
     </div>
	</div>
</section>	    
    
    
<?php require_once("includes/subsol.php"); ?>    

</body>
</html>