<!DOCTYPE html>
<html>
<head>
	<title>LOS POLLOS MUSIQUE</title>
	<link rel="stylesheet" href="bootstrap.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="leCSS.css"/>
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
		Los Pollos Musique propose à la vente des programmes culturels, du patrimoine, éducatifs, événementiels. Chaque oeuvre est sélectionnée par notre comité pour répondre à une demande ou à un événement. </br>
		Une information régulière sur les sorties de CD musicaux et DVD sur notre site vous sera transmise toutes les semaines. Cette information vous parviendra grâce à Une newsletter d'information envoyée périodiquement par mail à l'adresse par défaut que vous avez entré à la création de votre compte.</br>

		De la chanson française à la variété internationale, de la musique pour enfants à la musique du monde, en passant par la musique soul & funk, le blues, le folk du reggae ou le jazz. Los Pollos Musique s'intéresse à tous les genres de musique, dansez sur les rythmes incessants de la musique électro ou du disco et libérez le rebelle qui est en vous avec du rock, hard rock ou du hip-hop.
		</br>

		Le site propose également des DVD. L'offre en albums musicaux et DVD est variée. Retrouvez nos catalogues CD et DVD sur ce site.</br>
	</div>
	</div>
</div>
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="jsShop/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="jsShop/plugins.js"></script>
        <script src="jsShop/main.js"></script>
		<script src="jsShop/bootstrap.js"></script>
</body>
</html>