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
    <?php if(isset($_GET['id'])){
		require_once("includes/connect.php");
	 $id = $_GET['id'];
	 $query="select * from posts where post_id='$id'";
     $mquery=mysql_query($query);
     while($row=mysql_fetch_array($mquery)){
	$titlu= $row['post_title'];
    $img1 = $row['post_image'];
	$img2 = $row['img1'];
	$img3 = $row['img2'];
	$img4 = $row['img3'];
	$img5 = $row['img4'];
	$img6 = $row['img5'];
	$img7 = $row['img6'];
	$img8 = $row['img7'];
	$img9 = $row['img8'];
	$img10 = $row['img9'];
	$img11 = $row['img10'];
	$img12 = $row['img11'];
	$img13 = $row['img12'];
	$img14 = $row['img13'];
	$img15 = $row['img14'];
	$continut = $row['post_content'];
	$imgr = array('$img10','$img11','$img12','$img13','$img14','$img15','$img1','$img2','$img3','$img4','$img5','$img6','$img7','$img8','$img9');
	$imgra = array($img10,$img11,$img12,$img13,$img14,$img15,$img1,$img2,$img3,$img4,$img5,$img6,$img7,$img8,$img9);
	$continutv = str_replace($imgr, $imgra, $continut);	
	 ?>
	 
	 	<?php } } ?>
<div class="wrapper">
	<h1><?php if(mysql_num_rows($mquery) > 0){ echo $titlu; } else {echo " Nu s-a gasit articolul cautat !";} ?></h1>
    </div>

</section>


  
<div class="wrapper" id="main"> 
      
	<?php if(!isset($_GET['subcategorie'])){ ?><section id="content"> <?php } else { ?> <section id="coloana" class="grid_12"> <?php } ?>

               
                <?php echo $continutv . "<br />";
				if(!isset($_GET['subcategorie'])){
					
					$testquery="select * from test where mainart='$titlu' order by rand() LIMIT 0,1";
					$runtestquery=mysql_query($testquery);
					if(mysql_num_rows($runtestquery) > 0 ){
					while($rowtest=mysql_fetch_array($runtestquery)){
						$intrebare1 = $rowtest['intrebare1'];
						$intrebare2 = $rowtest['intrebare2'];
						$intrebare3 = $rowtest['intrebare3'];
						$intrebare4 = $rowtest['intrebare4'];
						$intrebare5 = $rowtest['intrebare5'];
						$raspuns1 = $rowtest['raspuns1'];
						$raspuns2 = $rowtest['raspuns2'];
						$raspuns3 = $rowtest['raspuns3'];
						$raspuns4 = $rowtest['raspuns4'];
						$raspuns5 = $rowtest['raspuns5'];
						$int11 = $rowtest['int11'];
						$int12 = $rowtest['int12'];
						$int13 = $rowtest['int13'];
						$int14 = $rowtest['int14'];
						$int21 = $rowtest['int21'];
						$int22 = $rowtest['int22'];
						$int23 = $rowtest['int23'];
						$int24 = $rowtest['int24'];
						$int31 = $rowtest['int31'];
						$int32 = $rowtest['int32'];
						$int33 = $rowtest['int33'];
						$int34 = $rowtest['int34'];
						$int41 = $rowtest['int41'];
						$int42 = $rowtest['int42'];
						$int43 = $rowtest['int43'];
						$int44 = $rowtest['int44'];
						$int51 = $rowtest['int51'];
						$int52 = $rowtest['int52'];
						$int53 = $rowtest['int53'];
						$int54 = $rowtest['int54'];
						$numetest = $rowtest['numetest'];
						$test = "test";
						$lungime = "300px";
						
					}echo "<script type='text/javascript'>

function initializare(){
 for(i=0;i<4;i++)
  with(document.forms.$test) 
   {
    if(document.forms.$test.item1 !== undefined){item1text[i].style.backgroundColor='lightgray';    item1text[i].style.width='$lungime';}
	if(document.forms.$test.item2 !== undefined){item2text[i].style.backgroundColor='lightgray';    item2text[i].style.width='$lungime';}
	if(document.forms.$test.item3 !== undefined){item3text[i].style.backgroundColor='lightgray';    item3text[i].style.width='$lungime';}
	if(document.forms.$test.item4 !== undefined){item4text[i].style.backgroundColor='lightgray';    item4text[i].style.width='$lungime';}
    if(document.forms.$test.item5 !== undefined){item5text[i].style.backgroundColor='lightgray';    item5text[i].style.width='$lungime';}
   }
 

} //Initzializare = stil;

function rezultat()
{
 initializare();
 with(document.forms.$test)
 {
     
  if(document.forms.$test.item1 !== undefined){
  item1text[$raspuns1].style.color='red';}    
  if(document.forms.$test.item2 !== undefined){
  item2text[$raspuns2].style.color='red';}
  if(document.forms.$test.item3 !== undefined){
  item3text[$raspuns3].style.color='red';}    
  if(document.forms.$test.item4 !== undefined){
  item4text[$raspuns4].style.color='red';}
  if(document.forms.$test.item5 !== undefined){
  item5text[$raspuns5].style.color='red';}
  }

k=0
// itemul 1
if(document.forms.$test.item1 !== undefined){
for(i=0;i<4;i++) {   
 if(document.forms.$test.item1[i].checked==true)
  if(i==$raspuns1){ 
  k=k+1;
  document.forms.$test.item1text[$raspuns1].style.color='green';  
  }   
  else{document.forms.$test.item1text[i].style.color='red'; 
       document.forms.$test.item1text[i].style.textDecoration='line-through';
	   document.forms.$test.item1text[$raspuns1].style.color='green'; }
}
}
// itemul 2
if(document.forms.$test.item2 !== undefined){
for(i=0;i<4;i++){ 
 if(document.forms.$test.item2[i].checked==true){
  if(i==$raspuns2){
  k=k+1;
  document.forms.$test.item2text[$raspuns2].style.color='green';  
  }   
  else{document.forms.$test.item2text[i].style.color='red'; 
       document.forms.$test.item2text[i].style.textDecoration='line-through';
	   document.forms.$test.item2text[$raspuns2].style.color='green'; }
  }
 }
}
// itemul 3
if(document.forms.$test.item3 !== undefined){
for(i=0;i<4;i++){    
 if(document.forms.$test.item3[i].checked==true){
  if(i==$raspuns3){
  k=k+1;
  document.forms.$test.item3text[$raspuns3].style.color='green';  
  }   
  else{document.forms.$test.item3text[i].style.color='red'; 
       document.forms.$test.item3text[i].style.textDecoration='line-through';
	   document.forms.$test.item3text[$raspuns3].style.color='green'; }
  }
 }
}
// itemul 4
if(document.forms.$test.item4 !== undefined){
 for(i=0;i<4;i++){   

 if(document.forms.$test.item4[i].checked==true){
  if(i==$raspuns4){
  k=k+1;
  document.forms.$test.item4text[$raspuns4].style.color='green';  
  }   
  else{document.forms.$test.item4text[i].style.color='red'; 
       document.forms.$test.item4text[i].style.textDecoration='line-through';
	   document.forms.$test.item4text[$raspuns4].style.color='green'; }
  }
 }
}
 
// itemul 5
if(document.forms.$test.item5 !== undefined){
 for(i=0;i<4;i++){
 if(document.forms.$test.item5[i].checked==true){
  if(i==$raspuns5){
  k=k+1;
  document.forms.$test.item5text[$raspuns5].style.color='green';  
  }   
  else{document.forms.$test.item5text[i].style.color='red'; 
       document.forms.$test.item5text[i].style.textDecoration='line-through';
	   document.forms.$test.item5text[$raspuns5].style.color='green'; }
  }
 }
}
if(k==0)
document.forms.$test.nota.value='Nu ai avut nici un raspuns corect!';
else if(k==1)
document.forms.$test.nota.value='Ai avut '+k+' raspuns corect!';
else if(k>1) document.forms.$test.nota.value='Ai avut '+k+' raspunsuri corecte!';
}  // Sfarsit rezultat;
</SCRIPT>";
echo "
<a href='#' class='buttonlink' id='testafisb' onclick='testafis();return false;'>Verifica ce ai invatat !</a><br/>
<div class='test' onload='initializare()' style='display:none;'>
<FORM NAME='$test' METHOD='post'>
<h3>Verifica ce ai invatat!</h3>";	
if($intrebare1 != ''){echo "<br><p>$intrebare1</p>
<input name='item1' type='radio'><input type='text' readonly name='item1text' value='a.$int11'><br>
<input name='item1' type='radio'><input type='text' readonly name='item1text' value='b.$int12'><br>
<input name='item1' type='radio'><input type='text' readonly name='item1text' value='c.$int13'><br>
<input name='item1' type='radio'><input type='text' readonly name='item1text' value='d.$int14'><br><br />";}
if($intrebare2 != ''){echo "<p>$intrebare2</p>
<input name='item2' type='radio'><input type='text' readonly name='item2text' value='a.$int21'><br>
<input name='item2' type='radio'><input type='text' readonly name='item2text' value='b.$int22'><br>
<input name='item2' type='radio'><input type='text' readonly name='item2text' value='c.$int23'><br>
<input name='item2' type='radio'><input type='text' readonly name='item2text' value='d.$int24'><br><br />";}				
if($intrebare3 != ''){echo "<p>$intrebare3</p>
<input name='item3' type='radio'><input type='text' readonly name='item3text' value='a.$int31'><br>
<input name='item3' type='radio'><input type='text' readonly name='item3text' value='b.$int32'><br>
<input name='item3' type='radio'><input type='text' readonly name='item3text' value='c.$int33'><br>
<input name='item3' type='radio'><input type='text' readonly name='item3text' value='d.$int34'><br><br />";}
if($intrebare4 != ''){echo "<p>$intrebare4</p>
<input name='item4' type='radio'><input type='text' readonly name='item4text' value='a.$int41'><br>
<input name='item4' type='radio'><input type='text' readonly name='item4text' value='b.$int42'><br>
<input name='item4' type='radio'><input type='text' readonly name='item4text' value='c.$int43'><br>
<input name='item4' type='radio'><input type='text' readonly name='item4text' value='d.$int44'><br><br />";}
if($intrebare5 != ''){echo "<p>$intrebare5</p>
<input name='item5' type='radio'><input type='text' readonly name='item5text' value='a.$int51'><br>
<input name='item5' type='radio'><input type='text' readonly name='item5text' value='b.$int52'><br>
<input name='item5' type='radio'><input type='text' readonly name='item5text' value='c.$int53'><br>
<input name='item5' type='radio'><input type='text' readonly name='item5text' value='d.$int54'><br><br />";}
echo "<br /><br /><br /><input type='button' value='Click pentru verificare!' style='width:200px;' onclick='rezultat()'>
<input type='text' name='nota' size='30' readonly>

</form> ";					
				}
				?><br />

				<script type="text/javascript">initializare();</script>
<?php } ?>
</section>
      
      
  
<?php if(!isset($_GET['subcategorie'])){ ?>	
    <aside>
        <h2>Meniu</h2>
            <nav id="secondary-navigation">
                    <ul>
                        <?php 
						$categorie = $_GET['categorie'];
						$subquery=mysql_query("SELECT * from posts WHERE subcategoryof!='' AND subcategoryof='$categorie' AND mainart='$titlu'");
                              while($subrow=mysql_fetch_array($subquery)){
								  $subtitlu = $subrow['post_title'];
								  $subid = $subrow['post_id'];
								  $subcategorie = $subrow['subcategoryof'];
								  echo "<li><a href=\"pages.php?id=". $subid . "&subcategorie=" .$subcategorie . "\">" . $subtitlu . "</a></li>";
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