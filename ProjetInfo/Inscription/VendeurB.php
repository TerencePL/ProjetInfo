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
$Pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"]:"";
$Mail = isset($_POST["mail"]) ? $_POST["mail"]:"";
$Solde = 0;


$Verif=0;

//Verifier si le mail du nouveau profil existe déjà ou non dans la bdd
if($db_found) {

	$sql = "SELECT * FROM vendeur";
	$result = mysqli_query($db_handle,$sql);
	while($data = mysqli_fetch_assoc($result)) 
		{
		if($Mail == $data['Mail'])
			{$Verif=1;}
		}
	}


if($Verif==0)
{
		$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		$sql = "INSERT INTO `vendeur`(`ID_Vendeur`, `Mail`, `MDP`, `Solde`)  VALUES('$ID','$Mail','$MDP','$Solde')"; 

	
		$bdd->query($sql);

		$result = mysqli_query($db_handle, "SELECT * FROM `vendeur` ORDER BY `ID_Vendeur` DESC LIMIT 1");
		$row = mysqli_fetch_array($result);
		$ID_User=$row['ID'];
		echo $ID_User;


		header('Location: http://localhost/ProjetInfo/Inscription/vendeur.php');

}
else if ($Verif==1)
{echo "Mail déjà existant. <br> <br>";
echo  "http://localhost/ProjetInfo/Inscription/vendeur.php";
}

mysqli_close($db_handle);
?>