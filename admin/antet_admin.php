<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" href="../css/admin_style.css">
<script src="jq.js"></script>
<script src="insert.js"></script>
<script src="previzualizare.js"></script>
<script src="select.js"></script>
</head>
<body>
<div id="header"><h1><a href="index.php">Bun venit , <?php echo $_SESSION[user_nick]; ?></a></h1></div>
<div id="siderbar"><?php require_once 'meniu2.php'; ?></div>
