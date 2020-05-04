<?php
	session_start();
	$connect=mysqli_connect("localhost","ecommerce","0550002d","baseSqlShop");
	if (!$connect) {
		die("Impossible de se connecter : ".mysqli_error());
	}
	$req="select * from `log`";
	$res=mysqli_query($connect,$req);
	echo "<table border='1'><tr><td>Nom</td><td>Text</td></tr>";
	while ($ligne=mysqli_fetch_array($res)) {
		echo "<tr><td>".$ligne["user"]."</td>";
		echo "<td>".$ligne["leLog"]."</td></tr>";
	}
	echo "</tr></table>";
?>	
