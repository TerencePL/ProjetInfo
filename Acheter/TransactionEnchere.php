<?php

session_start();

$ID_Produit1=$_SESSION['ID_Achat'];


$dbname = "ebayece";
$db_login = "root";
$db_pass	= "";

$database = "ebayece";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);



$Solde=0;
//**********************************Recuperer le stock actuelle*****************************
if($db_found) 
{
	$result = mysqli_query($db_handle, "SELECT * FROM produit WHERE ID_Produit like '$ID_Produit1' " );
	while($data = mysqli_fetch_assoc($result)) 
	{
		$NB_Ventes = $data['NB_Ventes'];
		$Prix = $_SESSION['PrixPanier']; //on met la valeur de l'enchere comme prix
		$Stock = $data['Stock'];
		$ID_Vendeur = $data['ID_Vendeur'];
	}
}

if($Stock > 0)
{
			$Stock=$Stock - 1;
			$NB_Ventes = $NB_Ventes +1;

			//Reduir le stock
			$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
			$sql = "UPDATE produit SET Stock = '$Stock' WHERE ID_Produit like '$ID_Produit1'";
			$bdd->query($sql);

			//Augmenter nombre de ventes
			$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
			$sql = "UPDATE produit SET NB_Ventes = '$NB_Ventes' WHERE ID_Produit like '$ID_Produit1'";
			$bdd->query($sql);

			//Remise à zero de l'id enchere et des montants d'encheres
			$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
			$sql = "UPDATE produit SET ID_Enchere = 0 WHERE ID_Produit like '$ID_Produit1'";
			$bdd->query($sql);

						$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
			$sql = "UPDATE produit SET Enchere = 0 WHERE ID_Produit like '$ID_Produit1'";
			$bdd->query($sql);

						$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
			$sql = "UPDATE produit SET EnchereBis = 0 WHERE ID_Produit like '$ID_Produit1'";
			$bdd->query($sql);


			//Recuperer le solde vendeur
			if($db_found) 
					{
						$result = mysqli_query($db_handle, "SELECT * FROM vendeur WHERE ID_Vendeur like '$ID_Vendeur' " );
						while($data = mysqli_fetch_assoc($result)) 
						{
							$Solde = $data['Solde'];

						}
					}
			$Solde=$Solde + $Prix;
			$Prix=0;

			//Augmenter le solde vendeur
			$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
			$sql = "UPDATE vendeur SET Solde = '$Solde' WHERE ID_Vendeur like '$ID_Vendeur' ";
			$bdd->query($sql);
			header("location:http://localhost/ProjetInfo/Page/Acheteur.php");
}
else{echo"stock insufisant";}
?>