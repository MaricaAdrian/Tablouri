<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>Previzualizare</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">

<link rel="shortcut icon" href="../images/favicon.ico"  type="image/x-icon">

<!-- CSS-->
<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Ubuntu' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="../css/normalize.css">
<link rel="stylesheet" href="../js/flexslider/flexslider.css">
<link rel="stylesheet" href="../css/style.css">

<!-- Sfarsit CSS-->
    

</head>

<body id="home">
  
 
 
<section id="page-header" class="clearfix">    

<div class="wrapper">
	<h1>Titlu exemplu ! (o sa adaug previzualizarea titlului mai tarziu)</h1>
    </div>

</section>


<div class="wrapper" id="main"> 
       
	<section id="content">

               
        <?php

        if(isset($_GET['text'])){

        $text = $_GET['text'];




        ?>
        <?php echo $text; } ?>
				

    </section>
      
      
 





</body>
</html>