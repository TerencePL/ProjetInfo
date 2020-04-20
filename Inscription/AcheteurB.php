<?php

//mettre les données recupérées  dans la base de données
    
   $dbname = "ebayece";
   $db_login = "root";
   $db_pass	= "";


$database= "ebayece";
//Rappel:votre serveur = localhost | votre login = root | votre mot de pass = ''(rien)
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$ID = 0;
$Nom = isset($_POST["nom"]) ? $_POST["nom"]:"";
$Prenom = isset($_POST["prenom"]) ? $_POST["prenom"]:"";
$Adresse = isset($_POST["adresse"]) ? $_POST["adresse"]:"";
$Mail = isset($_POST["mail"]) ? $_POST["mail"]:"";
$MDP = isset($_POST["mdp"]) ? $_POST["mdp"]:"";
$Ville = isset($_POST["ville"]) ? $_POST["ville"]:"";
$Pays = isset($_POST["pays"]) ? $_POST["pays"]:"";
$Postal = isset($_POST["postal"]) ? $_POST["postal"]:"";
$Telephone = isset($_POST["telephone"]) ? $_POST["telephone"]:"";
$Solde = 0;

//if(count($PIN)!=3)
//{header('Location: http://localhost/ProjetInfo/Inscription/Acheteur.php');}

$Verif=0;

//Verifier si le mail du nouveau profil existe déjà ou non dans la bdd
if($db_found) 
{
	$sql = "SELECT * FROM acheteur";
	$result = mysqli_query($db_handle,$sql);
	while($data = mysqli_fetch_assoc($result)) 
		{
		if($Mail == $data['Mail'])
			{$Verif=1;}
		}
}
else
{$Verif=2;}


if($Verif==0)
{

	//Blindage car la BDD ne prend pas null
	if(is_null($Postal))
		{$Postal=0;}
	if(is_null($Telephone))
		{$Telephone=0;}



		//Création du compte acheteur
		$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		$sql = "INSERT INTO `acheteur`(`ID`, `Mail`, `MDP`, `Nom`, `Prenom`, `Adresse`, `Ville`, `Postal`, `Pays`, `Telephone`, `Solde`)  VALUES('$ID','$Mail','$MDP','$Nom','$Prenom','$Adresse','$Ville','$Postal','$Pays','$Telephone','$Solde')"; 

	
		$bdd->query($sql);

		$result = mysqli_query($db_handle, "SELECT * FROM `acheteur` ORDER BY `ID` DESC LIMIT 1");
		$row = mysqli_fetch_array($result);
		$ID_User=$row['ID'];
		echo $ID_User;

		//Création du panier associé
		$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		$sql = "INSERT INTO panier (ID_User, ID_Produit1, ID_Produit2, ID_Produit3, ID_Produit4, ID_Produit5) VALUES('$ID_User', '0', '0', '0', '0', '0' )";
		$bdd->query($sql);


		//Création du compte vendeur
		$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		$sql = "INSERT INTO vendeur (ID_Vendeur, Pseudo, Mail, Photo_adresse, Fond_Adresse, Solde,MDP) VALUES('$ID_User', '', '$Mail','' , '', '0', '$MDP' )";
		$bdd->query($sql);





		header('Location: http://localhost/ProjetInfo/Inscription/Acheteur.php');

}
else if ($Verif==1)
{echo "Mail déjà existant. <br> <br>";
echo  "http://localhost/ProjetInfo/Inscription/Acheteur.php";
}
else if ($Verif==2)
{echo "Database not found. <br> <br>";}






mysqli_close($db_handle);
?>