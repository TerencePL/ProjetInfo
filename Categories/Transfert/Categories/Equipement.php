<?php
session_start();

$database = "ecebay";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$j=0;
	
//si le BDD existe, faire le traitement. Trouver les ID des livres
if($db_found)  
{
	$result = mysqli_query($db_handle, "SELECT * FROM Equipement ORDER BY ID_Produit" );
	while($data = mysqli_fetch_assoc($result)) 
	{
		$ID=$data['ID_Produit'];
		
		$resultBIS = mysqli_query($db_handle, "SELECT * FROM produit Where ID_Produit like '$ID'");
		while($data2 = mysqli_fetch_assoc($resultBIS)) 
		{
			$j=$j+1;

			//on recupère dans des tableaux
			$IDBis[$j] = $data2['ID_Produit'];
			$Nom[$j] = $data2['Nom'];
			$Prix[$j] = $data2['Prix'].'</br>';
			$Description[$j] = $data2['Description'];
			$Stock[$j] = $data2['Stock'];
			
			$Sport[$j] = $data['Sport'];

		}//end while 
		echo '</br>';
		$NbArticles=$j;
	}//end while 
}//endif
else{echo "ma base n'existe pas";}


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../Style.css" />
		<link rel="stylesheet" type="text/css" href="SsCat.css" />
		<title>ECEbay</title>
	</head>
	<body>
		<header>
			<nav>
				<ul>
					<li>
						<img src="../Images/menu.jpg">
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
				<a href="#" title="Compte" id="connex"><img src="../Images/login.jpg"></a>
			</div>
		</header>
		<?php
			//$NbArticles = 15;
		?>
        <h2>Liste des equipements sportifs :</h2>
		<div id="corps">
			<?php
				for($i = 1; $i <= $NbArticles; $i++)
				{
			?>
			<article><?php echo 'Article '.$i;
			//echo $ID['1'].'</br>';
			echo "</br> Nom: ".$Nom[$i].'</br>';
			echo "Prix: ".$Prix[$i].'</br>';
			//echo $Description['1'].'</br>';
			echo "Stock: ".$Stock[$i].'</br>';
			echo "Sport: ".$Sport[$i].'</br>';
			
			?></article>
			<?php
				}
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
