<?php
session_start();
//mettre les données recupérées  dans la base de données


$type = isset($_POST["type"])? $_POST["type"] : "";


   $dbname = "ecebay";
   $db_login = "root";
   $db_pass	= "";

$database= "ecebay";
//Rappel:votre serveur = localhost | votre login = root | votre mot de pass = ''(rien)
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$ID_Produit = isset($_POST["ID_Produit"])? $_POST["ID_Produit"] : "";
echo "id du produit" .$ID_Produit;
$ID_User=$_SESSION['ID'];
$j=0;

$result = mysqli_query($db_handle, "SELECT * FROM panier Where ID_User like '$ID_User'");
		while($data2 = mysqli_fetch_assoc($result)) 
		{
			$j=$j+1;



			$ID_Produit1 = $data2['ID_Produit1'];
			$ID_Produit2 = $data2['ID_Produit2'];
			$ID_Produit3 = $data2['ID_Produit3'];
			$ID_Produit4 = $data2['ID_Produit4'];
			$ID_Produit5 = $data2['ID_Produit5'];
			
			if($ID_Produit1 == "0")
			{
				$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		        $sql = "UPDATE panier SET ID_Produit1 = '$ID_Produit' WHERE ID_User like '$ID_User'";
		        $bdd->query($sql);
				header("location:http://localhost/ECEbay/Panier.php");
				
			} else if($ID_Produit1 != "0" && $ID_Produit2 == "0")
			{
				$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		        $sql = "UPDATE panier SET ID_Produit2 = '$ID_Produit' WHERE ID_User like '$ID_User'";
		        $bdd->query($sql);
				header("location:http://localhost/ECEbay/Panier.php");
				
			}	else if($ID_Produit1 != "0" && $ID_Produit2 != "0" && $ID_Produit3 == "0")
			{
				$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		        $sql = "UPDATE panier SET ID_Produit3 = '$ID_Produit' WHERE ID_User like '$ID_User'";
		        $bdd->query($sql);
				header("location:http://localhost/ECEbay/Panier.php");
				
			}	else if($ID_Produit1 != "0" && $ID_Produit2 != "0" && $ID_Produit3 != "0" && $ID_Produit4 == "0")
			{
				$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		        $sql = "UPDATE panier SET ID_Produit4 = '$ID_Produit' WHERE ID_User like '$ID_User'";
		        $bdd->query($sql);
				header("location:http://localhost/ECEbay/Panier.php");
				
			} else if($ID_Produit1 != "0" && $ID_Produit2 != "0" && $ID_Produit3 != "0" && $ID_Produit4 != "0" && $ID_Produit5 == "0")
			{
				$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		        $sql = "UPDATE panier SET ID_Produit5 = '$ID_Produit' WHERE ID_User like '$ID_User'";
		        $bdd->query($sql);
				header("location:http://localhost/ECEbay/Panier.php");
				
			} else 
			{
				header("location:http://localhost/ECEbay/Panier.php");
				echo "votre panier est plein veuillez finalisez vos achats";
			}



		}//end while 

mysqli_close($db_handle);
?>