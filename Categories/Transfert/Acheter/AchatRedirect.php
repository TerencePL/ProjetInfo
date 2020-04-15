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
			
		<?php
			$NCarte = isset($_POST['Ncarte'])? $_POST['Ncarte'] : "";
$PIN = isset($_POST['PIN'])? $_POST['PIN'] : "";
$DateExpiration = isset($_POST['DateExpiration'])? $_POST['DateExpiration'] : "";
$ID_Session=$_SESSION['ID'];


$database = "ecebay";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
	
$result = mysqli_query($db_handle,"SELECT * FROM acheteur WHERE ID LIKE '$ID_Session'");
//regarder s'il y a de résultat
if($db_found){
 
			$result = mysqli_query($db_handle, "SELECT * from acheteur Where ID LIKE '$ID_Session' and NCarte like '$NCarte' and PIN LIKE '$PIN' and Expiration like '$DateExpiration'");

				if (mysqli_num_rows($result) != 0) 
					{
						header('Location: http://localhost/ECEbay/Acheter/Transaction.php');
					}
		else{
			// L un des parametres est inccorect
			echo "Information bancaires incorrectes"; ?>
			<form action="http://localhost/ECEbay/Acheter/Transaction.php" method="post">
			<td colspan="2" align="center"><input type="submit" value="Forcer le payment"></td>
			<?php
			}
}else 
{
	echo "Database not found";
}



//fermer la connexion

mysqli_close($db_handle);


?>

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