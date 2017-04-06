<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>Tablouri</title>
<meta name="description" content="Tablouri">
<meta name="keywords" content="">

<!-- Mobil -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">

<link rel="shortcut icon" href="images/favicon.ico"  type="image/x-icon">

<!-- CSS-->
<!-- Fonturi Google -->
<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Ubuntu' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="js/flexslider/flexslider.css">
<link rel="stylesheet" href="css/style.css">

<!-- end CSS-->
    
<!-- JS-->
<script src="js/libs/modernizr-2.6.2.min.js"></script>
<!-- end JS-->



</head>

<body id="home">
  
<!-- Antet -->
    <header class="wrapper clearfix">
		       
        <div id="banners">        
        	<div id="logos"><a href="index.php"><img src="images/logo.png"></a></div> 
        </div>
        
        <!-- Meniu -->
		<?php require_once("includes/meniu.php"); ?>
       <!-- Sfarsit meniu -->
  
    </header><!-- Sfarsit antet -->
 
 
<!-- Div-ul gri cu silder in el -->
    <section id="hero" class="clearfix">    
    <!-- FlexSlider -->
    <div class="wrapper">
       <div class="row"> 
        <div class="grid_5">
            <h1>Introducere:</h1>
            <p>"Tablouri" este un soft educational dedicat celor care vor sa dobandeasca cunostiinte in domeniul informaticii.
            </p>
            <p><a href="contact.php" class="buttonlink">AFLĂ MAI MULTE</a> <a href="introducere.php" class="buttonlink">INCEPE</a></p>
        </div>
        <div class="grid_7 rightfloat">
              <div class="flexslider">
                  <ul class="slides">
                      <li>
                          <img src="images/basic-pic1.jpg" />
                          <p class="flex-caption">Programming is life.</p>
                      </li>
                      <li>
                          <img src="images/basic-pic2.jpg" />
                          <p class="flex-caption">Salutare lume!.</p>
                      </li>
                      <li>
                          <img src="images/basic-pic3.jpg" />
                          <p class="flex-caption">In interiorul unei linii de cod.</p>
                      </li>
                      <li>
                          <img src="images/basic-pic4.jpg" />
                          <p class="flex-caption">Motto-ul vietii.</p>
                      </li>
                  </ul>
                </div><!-- FlexSlider -->
              </div>
        </div>
       </div>
    </section><!-- Sfarsit div gri -->





<!-- Continut -->   
<div id="main" class="wrapper">
    
    
<!-- Sectiune continut -->    
	<section id="content" class="wide-content">
      <div class="row">	
      	<?php require_once 'includes/connect.php';
		      $query = "SELECT post_content,post_title,post_id,subcategoryof from posts where post_category='' order by rand() desc limit 0,3"; 
		      $runquery = mysql_query($query);
			  if($runquery){}else{die(mysql_error());}
		      while($row=mysql_fetch_array($runquery)){
		      $titlu = $row['post_title'];
			  $continut = substr_replace(substr($row['post_content'],0,100),'...',90);
			  $subcategorie = $row['subcategoryof'];
			  $id = $row['post_id'];
		      
		      ?>
        <div class="grid_4">
        	<h2 class="first-header"><?php echo $titlu; ?></h2>
            <p><a href="pages.php?id=<?php echo $id; ?>&subcategorie=<?php echo $subcategorie; ?>">Citeste mai mult !</a></p>
        </div>
        
        <?php } ?>
	  </div>
	</section><!-- Sfarsit sectiune continut -->   
      
      
      
  </div><!-- Sfarsit continut  -->


<!-- Subsol -->
<?php require_once("includes/subsol.php"); ?>    
<!-- Sfarsit subsol --> 


<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.9.0.min.js">\x3C/script>')</script>
<!-- Javascript-ul de la FlexSlider -->
<script defer src="js/flexslider/jquery.flexslider-min.js"></script>

<!-- Main JS   -->   
<script src="js/main.js"></script>

</body>
</html>