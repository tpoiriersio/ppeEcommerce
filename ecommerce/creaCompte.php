<!DOCTYPE html>
<html>
	<head>
		<title>LOS POLLOS MUSIQUE</title>
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
			

			<div id="laDivPresentation">
			<form name="formulaire" action="" method="POST">
				<img class="inscription "src="./imagesShop/login.png"/>
				<input type="text" name="nom" placeholder="nom de compte"><br/>
				<img class="inscription "src="./imagesShop/mdp.png"/>
				<input type="text" name="mdp" placeholder="mot de passe"> <br/>
				<img class="inscription "src="./imagesShop/identite.png"/>
				<input type="text" name="nomClient" placeholder="nom"><br/>
				<img class="inscription "src="./imagesShop/identite.png"/>
				<input type="text" name="prenomClient" placeholder="prénom"> <br/>
				<img class="inscription "src="./imagesShop/mail.png"/>
				<input type="text" name="mailClient" placeholder="adresse mail"><br/>
				<img class="inscription "src="./imagesShop/codepostal.png"/>
				<input type="text" name="cpClient" placeholder="code postal"><br/>
				<img class="inscription "src="./imagesShop/ville.png"/>
				<input type="text" name="villeClient" placeholder="ville"><br/>
				<img class="inscription "src="./imagesShop/numRue.png"/>
				<input type="text" name="numRueClient" placeholder="numéro de rue"><br/>
				<img class="inscription "src="./imagesShop/pays.png"/>
				<input type="text" name="paysClient" placeholder="pays"><br/>
				<img class="inscription "src="./imagesShop/numtel.png"/>
				<input type="text" name="numTelClient" placeholder="numéro de téléphone"><br/>

				<input type="submit" name="bouton" value="s'inscrire">
			</form>
			</div>
			
		</div>
		
		</div>
		
		<?php
			session_start();
			$connect=mysqli_connect("localhost","ecommerce","0550002d","baseSqlShop");
			if (!$connect) {
				die("Impossible de se connecter : ".mysqli_error());
			}
			if(isset($_POST["bouton"]))
			{
				$req2="INSERT INTO `CLIENTS` (`Nom`, `Prenom`, `AdresseMail`, `CodePostal`, `Ville`, `nomDeRue`, `Pays`,`numDeTelephone`, `login`, `password`) VALUES ('".$_POST["nomClient"]."','".$_POST["prenomClient"]."', '".$_POST["mailClient"]."', '".$_POST["cpClient"]."', '".$_POST["villeClient"]."', '".$_POST["numRueClient"]."', '".$_POST["paysClient"]."', '".$_POST["numTelClient"]."','".$_POST["nom"]."', '".password_hash($_POST["mdp"], PASSWORD_DEFAULT)."')";
				mysqli_query($connect,$req2);
				header("Location: seConnecter.php");	
			}
			
		?>
	</body>
</html>