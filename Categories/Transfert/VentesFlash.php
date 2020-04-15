<?php
session_start();

$database = "ecebay";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$j=0;
	
//si le BDD existe, faire le traitement. Trouver les ID des livres
if($db_found) 
{

		$resultBIS = mysqli_query($db_handle, "SELECT * FROM produit ORDER BY NB_Ventes DESC LIMIT 4");
		while($data2 = mysqli_fetch_assoc($resultBIS)) 
		{
			$ID=$data2['ID_Produit'];

				$result = mysqli_query($db_handle, "SELECT * FROM musique where  ID_Produit like '$ID'" );
				while($data = mysqli_fetch_assoc($result)) 
					{
					
					
						$j=$j+1;

						$IDBis[$j] = $data2['ID_Produit'];
						$Nom[$j] = $data2['Nom'];
						$Auteur[$j] = $data['Auteur'];
						$Prix[$j] = $data2['Prix'].'</br>';

						$Description[$j] = $data2['Description'];
						$Stock[$j] = $data2['Stock'];
						
						$Date_Parution[$j] = $data['Date_Parution'];
						$Genre[$j] = $data['Genre'];
						$NB_Ventes[$j] = $data2['NB_Ventes'];

						//$Sport[$j] = $data['Sport'];

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
		<link rel="stylesheet" type="text/css" href="Style.css" />
		<link rel="stylesheet" type="text/css" href="VenF.css" />
		<title>ECEbay</title>
	</head>
	<body>
		<header>
			<nav>
				<ul>
					<li >
						<img src="Images/menu.jpg">
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
				<a href="#" title="Compte" id="connex"><img src="Images/login.jpg"></a>
			</div>
		</header>

		<div id="corps">
			<div class="titre">Meilleurs ventes de livres :</div>
			<section class="grparticles">
				<article>Article 1</article>
				<article>Article 2</article>
				<article>Article 3</article>
			</section>
			<div class="titre">Meilleurs ventes de musique :</div>
			<section class="grparticles">
							<?php
				for($i = 1; $i <= 3; $i++)
				{
					?>
					<article><?php echo 'Article '.$i;
					//echo $ID['1'].'</br>';
					echo "</br> Nom: ".$Nom[$i].'</br>';
					echo "Prix: ".$Prix[$i].'</br>';
					//echo $Description['1'].'</br>';
					echo "Stock: ".$Stock[$i].'</br>';

					echo "Auteur: ".$Auteur[$i].'</br>';
					echo "Date_Parution ".$Date_Parution[$i].'</br>';
					echo "Genre: ".$Genre[$i].'</br>';
					echo "NB_Ventes: ".$NB_Ventes[$i].'</br>';

			
					?>
						<form action="http://localhost/ECEbay/AjoutPanier.php" method="post">
				<td colspan="2" align="right"><input type="submit" value="Ajouter au panier" /><input type="hidden" name="ID_Produit" value='<?php echo $IDBis[$i]?>' /></td>
						</form>
					</article>
				<?php
				}
			?>
			</section>
			<div class="titre">Meilleurs ventes de vêtements :</div>
			<section class="grparticles">
				<article>Article 1</article>
				<article>Article 2</article>
				<article>Article 3</article>
			</section>
			<div class="titre">Meilleurs ventes de sports et loisir :</div>
			<section class="grparticles">
				<article>Article 1</article>
				<article>Article 2</article>
				<article>Article 3</article>
			</section>
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
