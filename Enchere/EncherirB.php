<?php
session_start();
//mettre les données recupérées  dans la base de données

$dbname = "ebayece";
$db_login = "root";
$db_pass	= "";

$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$ID_Produit = isset($_POST["ID_Produit"])? $_POST["ID_Produit"] : "";
$NewEnchere = isset($_POST["newenchere"])? $_POST["newenchere"] : "";
$ID_User=$_SESSION['ID'];

//Date actuelle
 $currentDateTime = date('Y-m-d H:i:s');


if($db_found) 
{	
$result = mysqli_query($db_handle,"SELECT * FROM produit WHERE ID_Produit LIKE '$ID_Produit'");
$row = mysqli_fetch_array($result);
$resultBis = mysqli_query($db_handle,"SELECT * FROM acheteur WHERE ID LIKE '$ID_User'");
$rowBis = mysqli_fetch_array($resultBis);
		//verif du montant du solde
		if($rowBis['Solde'] > $NewEnchere){
			//Comparaison montant nouvelle enchere
			if($NewEnchere > $row['EnchereBis'])
			{
				if( $currentDateTime < $row['DateEnchere'])
				{

						$OldEnchere = $row['EnchereBis'];

						$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
				        $sql = "UPDATE produit SET Enchere = '$OldEnchere' WHERE ID_Produit like '$ID_Produit'";
				        $bdd->query($sql);

						$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
				        $sql = "UPDATE produit SET EnchereBis = '$NewEnchere' WHERE ID_Produit like '$ID_Produit'";
				        $bdd->query($sql);

				        $bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
				        $sql = "UPDATE produit SET ID_Enchere = '$ID_User' WHERE ID_Produit like '$ID_Produit'";
				        $bdd->query($sql);

				        header('Location: http://localhost/ProjetInfo/Page/Vendeur.php');
				}
				else{echo "Erreur: Enchère terminée.";}
			}
			else{echo "Le montant proposé doit etre superieur à l'enchère en cours.";}
		}
		else {echo "Solde trop faible.";}
}
else {echo "BDD introuvalbe";}



?>