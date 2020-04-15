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

$result = mysqli_query($db_handle, "SELECT * FROM panier Where ID_User like '$ID_User'");
		while($data2 = mysqli_fetch_assoc($result)) 
		{
			$j=$j+1;

			$ID_Produit1[$j] = $data2['ID_Produit1'];
			$ID_Produit2[$j] = $data2['ID_Produit2'];
			$ID_Produit3[$j] = $data['ID_Produit3'];
			$ID_Produit4[$j] = $data2['ID_Produit4'];
			$ID_Produit5[$j] = $data2['ID_Produit5'];
			
			if($ID_Produit1[$j] == "")
			{
				$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		        $sql = "INSERT INTO panier (ID_User, ID_Produit1) VALUES('$ID_User', '$ID_Produit')";
		        $bdd->query($sql);
				header("location:javascript://history.go(-1)");
				
			} else if($ID_Produit1[$j] != "" && $ID_Produit2[$j] == "")
			{
				$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		        $sql = "INSERT INTO panier (ID_User, ID_Produit2) VALUES('$ID_User', '$ID_Produit')";
		        $bdd->query($sql);
				header("location:javascript://history.go(-1)");
				
			}	else if($ID_Produit1[$j] != "" && $ID_Produit2[$j] != "" && $ID_Produit3[$j] == "")
			{
				$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		        $sql = "INSERT INTO panier (ID_User, ID_Produit3) VALUES('$ID_User', '$ID_Produit')";
		        $bdd->query($sql);
				header("location:javascript://history.go(-1)");
				
			}	else if($ID_Produit1[$j] != "" && $ID_Produit2[$j] != "" && $ID_Produit3[$j] != "" && $ID_Produit4[$j] == "")
			{
				$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		        $sql = "INSERT INTO panier (ID_User, ID_Produit4) VALUES('$ID_User', '$ID_Produit')";
		        $bdd->query($sql);
				header("location:javascript://history.go(-1)");
				
			} else if($ID_Produit1[$j] != "" && $ID_Produit2[$j] != "" && $ID_Produit3[$j] != "" && $ID_Produit4[$j] != "" && $ID_Produit5[$j] == "")
			{
				$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		        $sql = "INSERT INTO panier (ID_User, ID_Produit5) VALUES('$ID_User', '$ID_Produit')";
		        $bdd->query($sql);
				header("location:javascript://history.go(-1)");
				
			} else 
			{
				header('Refresh:5;Location: http://localhost/ECEbay/Panier.php');
				echo "votre panier est plein veuillez finalisez vos achats";
			}



		}//end while 

mysqli_close($db_handle);
?>