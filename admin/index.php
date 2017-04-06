<?php
session_start();

if(!isset($_SESSION['user_name'])){

header("location: login.php");

}
else {$username=$_SESSION['user_name'];
require_once 'antet_admin.php';

?>
</div>
<div id="center">
<h1>Bun venit la panoul de administrare</h1>
<p> De aici poti modifica,sterge,creea sau vizualiza noi postari
<br/>
</p>
</div>
</body>
</html>
<?php

}?>