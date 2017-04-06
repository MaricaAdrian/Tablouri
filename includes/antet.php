<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php  require_once 'includes/connect.php';
if(basename($_SERVER['PHP_SELF']) == "contact.php"){echo "Tablouri - Contact";}else{
if(isset($_GET['id'])){
	$id=$_GET['id'];
	 if(basename($_SERVER['PHP_SELF']) == "pages.php"){
	 $query = "SELECT post_title from posts where post_id='$id'";}else
	 {$query="select titlu from introducere where id='$id'";}
	$rquery = mysql_query($query);
	while($row=mysql_fetch_array($rquery)){
		 if(basename($_SERVER['PHP_SELF']) == "pages.php"){$post_title = $row['post_title'];}else{$post_title=$row['titlu'];}
	}
}
}
?><?php echo $post_title ?></title>
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
<script src="js/jq.js"></script>
<script src="js/libs/modernizr-2.6.2.min.js"></script>
<script src="js/fixtest.js"></script>
<!-- end JS-->