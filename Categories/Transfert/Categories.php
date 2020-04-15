<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="Style.css" />
		<link rel="stylesheet" type="text/css" href="Cat.css" />
		<title>ECEbay</title>
	</head>
	<body>
		<header>
			<nav>
				<ul>
					<li>
						<img src="Images/menu.jpg">
						<ul class="l2">
							<li><a href="#" id="currentpage" title="Page actuelle">Catégories</a></li>
							<li><a href="http://localhost/ECEbay/VentesFlash.php" title="Accéder aux ventes flash">Ventes flash</a></li>
							<li><a href="http://localhost/ECEbay/Vendre.php" title="Accéder à la vente">Vendre</a></li>
							<li><a href="http://localhost/ECEbay/Compte.php" title="Accéder à votre compte">Compte acheteur</a></li>
							<li><a href="http://localhost/ECEbay/CompteVendeur.php" title="Accéder à votre compte">Compte vendeur</a></li>
							<li><a href="http://localhost/ECEbay/Panier.php" title="Accéder au panier">Panier</a></li>
							<li><a href="http://localhost/ECEbay/Admin.php" title="Espace réservé aux admins">Admin</a></li>
							<li><a href="http://localhost/ECEbay/Connexion.php" title="Connexion">Connexion</a></li>
							<li><a href="http://localhost/ECEbay/Deconnexion.php" title="Deconnexion">Deconnexion</a></li>
							<li><a href="http://localhost/ECEbay/Inscription.php" title="Créer un compte">Créer un compte</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<div id="nom">
				<h1>ECEbay</h1>
			</div>
			<div id="connexion">
				<a href="http://localhost/ECEbay/Compte.php" title="Compte" id="connex"><img src="Images/login.jpg"></a>
			</div>
		</header>

		<div id="corps">
			<a href="http://localhost/ECEbay/Categories/Livres.php" id="livres">
				<section>
					<p class="boutton">Livres</p>
				</section>
			</a>
			<a href="http://localhost/ECEbay/Categories/Musique.php" id="musique">
				<section>
					<p class="boutton">Musique</p>
				</section>
			</a>
			<a href="http://localhost/ECEbay/Categories/Vetement.php" id="vetements">
				<section>
					<p class="boutton">Vêtements</p>
				</section>
			</a>
			<a href="http://localhost/ECEbay/Categories/Equipement.php" id="loisir">
				<section>
					<p class="boutton">Sports et loisir</p>
				</section>
			</a>
		</div>

		<footer>
			<small>
				<p>
					<a href="#"> Terms </a>  | <a href="#"> Privacy </a>  | 
					<a href="#"> Security </a>  | <a href="#"> Help </a>  | 
					<a href="#"> Blog </a>  | <a href="#"> About </a>  | 
					<a href="mailto:ECEbay@gmail.com">Contact us</a><br>
					Droits d'auteur : Copyright &copy; 2019, ECEbay, Inc. | Paris, FRANCE
				</p>
			</small>
		</footer>
	</body>
</html>
