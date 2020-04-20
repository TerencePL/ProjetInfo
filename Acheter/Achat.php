<?php
session_start();

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="Style.css" />
		<title>ECEbay</title>
	</head>
	<body>

		<header>
			<nav>
				<ul>
					<li >
						<img src="http://localhost/ECEbay/Images/menu.jpg">
						<ul class="l2">
							<li><a href="http://localhost/ECEbay/Categories.php">Catégories</a></li>
							<li><a href="http://localhost/ECEbay/VentesFlash.php" title="Accéder aux ventes flash">Ventes flash</a></li>
							<li><a href="http://localhost/ECEbay/Vendre.php" title="Accéder à la vente">Vendre</a></li>
							<li><a href="http://localhost/ECEbay/Compte.php" title="Accéder à votre compte">Votre compte</a></li>
							<li><a href="http://localhost/ECEbay/Panier.php" title="Accéder au panier">Panier</a></li>
							<li><a href="http://localhost/ECEbay/Admin.php" title="Espace réservé aux admins">Admin</a></li>
							<li><a href="http://localhost/ECEbay/Connexion.php" title="Connexion">Connexion</a></li>
							<li><a href="http://localhost/ECEbay/Deconnexion.php" title="Deconnexion">Deconnexion</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<div id="nom">
				<h1>ECEbay</h1>
			</div>
			<div id="connexion">
				<a href="#" title="Compte" id="connex"><img src="http://localhost/ECEbay/Images/login.jpg"></a>
			</div>
		</header>

		<div id="corps">
			
		
			<form action="http://localhost/ECEbay/Acheter/AchatRedirect.php" method="post">
			<table>
					<tr>
						<td>A payer: <?php echo $_SESSION['PrixPanier'];  ?> </td>
					</tr>
					<tr>
						<td>Numero de carte:</td>
						<td><input type="int" name="Ncarte"></td>
					</tr>
					<tr>
						<td>PIN:</td>
						<td><input type="int" name="PIN"></td>
					</tr>	
					<tr>
						<td>Date d'expiration:</td>
						<td><input type="date" name="DateExpiration"></td>
					</tr>


					<tr>
						<td colspan="2" align="center"><input type="submit" n="Valider"></td>
					</tr>
			</table>
		</form>
		</p>

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


