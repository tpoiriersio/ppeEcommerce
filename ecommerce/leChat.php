<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript"> setInterval("envoyerRequete()",500)</script>
	<link rel="stylesheet" type="text/css" href="leCSS.css"/>

</head>
<body>
<div id="leChatCSS">
<form name="formulaire" action="" method="POST">
	<input type="text" name="champ">
	<input type="submit" name="bouton" value="ok">
</form>
</div>

<?php
	session_start();
	echo "connecter : ".$_SESSION["login"];
	$connect=mysqli_connect("localhost","ecommerce","0550002d","baseSqlShop");
	if (!$connect) {
		die("Impossible de se connecter : ".mysqli_error());
	}
	
	if(!isset($_SESSION["login"]))
	{
		header("Location:accueil.php");
		exit();
	}
	if(isset($_POST["bouton"]))
	{
		$req="INSERt INTO `log` (`user`, `leLog`) VALUES ('".$_SESSION["login"]."', '".$_POST["champ"]."')";
		mysqli_query($connect,$req);
		
	}
?>

<div id="monDiv">

</div>


</body>
</html>