<!DOCTYPE html>
<html>
<head>
	<title>LOS POLLOS MUSIQUE</title>
	<script type="text/javascript" src="script.js"></script>
	<link rel="stylesheet" type="text/css" href="leCSS.css"/>
	<link rel="stylesheet" href="bootstrap.css">
    <link href="leCSS.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>


<div id="leChatCSS">
	<div id="laDivPrincipale">
			<div id="laBanniere">
			<img src="LPM.png" />
			<?php 
			session_start(); 
			if(isset($_SESSION["login"]))
			{
				echo "<br/>Vous êtes connectés en tant que  : ".$_SESSION["login"] ;
			}
			else echo "<br/>Vous êtes connectés en tant que  : visiteur"; ?> <br/>
			</div>
			<nav class="container-fluid navbar navbar-expand-lg navbar-dark bg-dark ombre" style="min-height: 5%;">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<span class="navbar-toggler-icon"></span>
						
					</button>
					<a class="navbar-brand" href="accueil.php">Accueil</a>	
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="magasin.php">Magasin</a></li>
						<li><a href="lePanier.php">Votre panier</a></li>
						<?php 
						if(isset($_SESSION["login"]))
						{
						echo "<li><a href='seConnecter.php'>Se déconnecter</a></li>";
						}
						else
						{
						echo "<li><a href='seConnecter.php'>Se connecter</a></li>";
						}
						?>			
					</ul>
				</div>
			</div>
		</nav>

	<div id="leShop">
	<?php
	
	$connect=mysqli_connect("localhost","ecommerce","0550002d","baseSqlShop");
	if (!$connect) {
		die("Impossible de se connecter : ".mysqli_error());
	}

	$req="select * from articles";
	$res=mysqli_query($connect,$req);
	while ($ligne=mysqli_fetch_array($res)) 
	{
		echo "<div class='lePanier'><img class='tailleShop'src='imagesShop/".$ligne["imagesAlbum"]."'/><br/>";
		echo $ligne["nomArticle"]." <br/>";
		echo $ligne["prixArticle"]."<br/>";

		if($ligne["stockarticle"] != 0)
		{
			echo "<select name='laQuantite'>
			<option value='1' selected>1</option>";

			for($i=2; $i <= $ligne["stockarticle"]; $i++)
			{
				echo "<option value='".$i."'>".$i."</option>";
			}
			echo "</select>";
		}
		else echo "Le stock de l'article est vide";
		
		echo "<input type='submit' name='ajouterPanier' value='Ajouter au panier'></div>";
	}
	?>
	</div>
	</div>
</div>

</body>
</html>