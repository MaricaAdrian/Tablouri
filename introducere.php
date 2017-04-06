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
        	<div id="logo"><a href="basic.html"><img src="images/logo.png" alt="logo"></a></div> 
        </div>
        

        <?php require_once("includes/meniu.php"); ?>

  
    </header>
 
 
<section id="page-header" class="clearfix">    

    <?php
		require_once("includes/connect.php");

	 if(!isset($_GET['id'])){$query="select * from introducere where ismain='Da'";} 
	 else{
	    $id = $_GET['id'];	
	 	$query="select * from introducere where id='$id'";}
     $mquery=mysql_query($query);
     while($row=mysql_fetch_array($mquery)){
	$titlu= $row['titlu'];
	$continut = $row['continut'];
	$img1 = $row['img1'];
	$img2 = $row['img2'];
	$img3 = $row['img3'];
	$img4 = $row['img4'];
	$imgr = array('$img1','$img2','$img3','$img4');
	$imgra = array($img1,$img2,$img3,$img4);
	$continut = str_replace($imgr, $imgra, $continut);	
	 ?>
	 
	 	<?php } ?>
<div class="wrapper">
	<h1><?php if(mysql_num_rows($mquery) > 0) {echo $titlu;}else{echo " Nu s-a gasit articolul cautat !";} ?></h1>
    </div>

</section>


 
<div class="wrapper" id="main"> 
       
	<?php if(!isset($_GET['id'])){ ?><section id="content"> <?php } else { ?> <section id="coloana" class="grid_12"> <?php } ?>

                <?php echo $continut; ?><br />

				

</section>
      
      
 
<?php if(!isset($_GET['id'])){ ?>	
    <aside>
        <h2>Meniu</h2>
            <nav id="secondary-navigation">
                    <ul>
                        <?php 
						$subquery=mysql_query("SELECT * from introducere WHERE ismain='Nu'");
                              while($subrow=mysql_fetch_array($subquery)){
								  $subtitlu = $subrow['titlu'];
								  $subid = $subrow['id'];
								  echo "<li><a href=\"introducere.php?id=". $subid . "\">" . $subtitlu . "</a></li>";
							  }						
						       ?>
                    </ul>
             </nav>
</aside><?php } ?>
   
  </div>
    


<!-- Subsol -->
<?php require_once("includes/subsol.php"); ?>    
<!-- Sfarsit subsol --> 



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.9.0.min.js">\x3C/script>')</script>

<script defer src="js/flexslider/jquery.flexslider-min.js"></script>
 
<script src="js/main.js"></script>

</body>
</html>