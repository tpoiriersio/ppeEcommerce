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
			<div id="laDivPresentation">
			<form name="formulaire" action="" method="POST">
				<img class="inscription "src="./imagesShop/login.png"/>
				<input type="text" name="nom" placeholder="nom de compte"><br/>
				<img class="inscription "src="./imagesShop/mdp.png"/>
				<input type="text" name="mdp" placeholder="mot de passe"> <br/>
				<input type="submit" name="bouton" value="se connecter">
			</form>
			<br/>
			<a class="COULEUR" href="creaCompte.php">Vous n'avez pas de compte ? Créer en un !</a>
			</div>
			
		</div>
		
		</div>
<?php
    if(isset($_POST["bouton"]))
    {
        $connect=mysqli_connect("localhost","ecommerce","0550002d","baseSqlShop");
        if (!$connect) 
        {
            die("Impossible de se connecter : ".mysqli_error());
        }
        $req1="select password FROM CLIENTS WHERE login= '".$_POST["nom"]."';";
        $res=mysqli_query($connect,$req1);
        if ((mysqli_num_rows($res) == 1))
        {
            $ligne=mysqli_fetch_array($res);
            if(password_verify($_POST["mdp"], $ligne["password"]))
            {
                session_start();
                $_SESSION["login"]=$_POST["nom"];
                header("Location: accueil.php");                        
            }
            else
            {
                echo "Impossible de se connecter";
            }
        }
        else
        {
            echo "Impossible de se connecter, créer un compte";
        }
    }
?>
	</body>
</html>