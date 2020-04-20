<?php

session_start();

$ID_Produit1=$_SESSION['ID_Produit1'];
$ID_Produit2=$_SESSION['ID_Produit2'];
$ID_Produit3=$_SESSION['ID_Produit3'];
$ID_Produit4=$_SESSION['ID_Produit4'];
$ID_Produit5=$_SESSION['ID_Produit5'];

echo $ID_Produit1;
echo $ID_Produit2;
echo $ID_Produit3;
echo $ID_Produit4;
echo $ID_Produit5;

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
		$Prix = $data['Prix'];
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
			//Reduir le stock
			$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
			$sql = "UPDATE produit SET NB_Ventes = '$NB_Ventes' WHERE ID_Produit like '$ID_Produit1'";
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
			$bdd->query($sql);}


//******************************Recuperer le stock actuelle*****************************
if($db_found) 
{
	$result = mysqli_query($db_handle, "SELECT * FROM produit WHERE ID_Produit like '$ID_Produit2' " );
	while($data = mysqli_fetch_assoc($result)) 
	{
		$NB_Ventes = $data['NB_Ventes'];
		$Prix = $data['Prix'];
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
$sql = "UPDATE produit SET NB_Ventes = '$NB_Ventes' WHERE ID_Produit like '$ID_Produit2'";
$bdd->query($sql);
$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
$sql = "UPDATE produit SET Stock = '$Stock' WHERE ID_Produit like '$ID_Produit2'";
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
$bdd->query($sql);}



//**********************************Recuperer le stock actuelle*****************************
if($db_found) 
{
	$result = mysqli_query($db_handle, "SELECT * FROM produit WHERE ID_Produit like '$ID_Produit3' " );
	while($data = mysqli_fetch_assoc($result)) 
	{
		$NB_Ventes = $data['NB_Ventes'];
		$Prix = $data['Prix'];
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
$sql = "UPDATE produit SET Stock = '$Stock' WHERE ID_Produit like '$ID_Produit3'";
$bdd->query($sql);
$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
$sql = "UPDATE SET NB_Ventes = '$NB_Ventes' WHERE ID_Produit like '$ID_Produit3'";
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
$bdd->query($sql);}



//**********************************Recuperer le stock actuelle*****************************
if($db_found) 
{
	$result = mysqli_query($db_handle, "SELECT * FROM produit WHERE ID_Produit like '$ID_Produit4' " );
	while($data = mysqli_fetch_assoc($result)) 
	{
		$NB_Ventes = $data['NB_Ventes'];
		$Prix = $data['Prix'];
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
$sql = "UPDATE produit SET NB_Ventes = '$NB_Ventes' WHERE ID_Produit like '$ID_Produit4'";
$bdd->query($sql);
$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
$sql = "UPDATE produit SET Stock = '$Stock'  WHERE ID_Produit like '$ID_Produit4'";
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
$bdd->query($sql);}



//**********************************Recuperer le stock actuelle*****************************
if($db_found) 
{
	$result = mysqli_query($db_handle, "SELECT * FROM produit WHERE ID_Produit like '$ID_Produit5' " );
	while($data = mysqli_fetch_assoc($result)) 
	{
		$NB_Ventes = $data['NB_Ventes'];
		$Prix = $data['Prix'];
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
		$sql = "UPDATE produit SET NB_Ventes = '$NB_Ventes' WHERE ID_Produit like '$ID_Produit5'";
		$bdd->query($sql);

		$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		$sql = "UPDATE produit SET Stock = '$Stock' WHERE ID_Produit like '$ID_Produit5'";
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
}
else(echo"stock insufisant";)

header("location:http://localhost/ProjetInfo/Vider.php");

?>