<?php
session_start(); 
    
   $dbname = "ebayece";
   $db_login = "root";
   $db_pass	= "";

$database= "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


//idmax recupère l'ID_Produit max deja existant.
$result = mysqli_query($db_handle, "SELECT * FROM `produit` ORDER BY `ID_Produit` DESC LIMIT 1");
$row = mysqli_fetch_array($result);
$idmax=$row['ID_Produit'];

//idmaxi recupère l'ID_Img max deja existant.
//$result = mysqli_query($db_handle, "SELECT * FROM `image` ORDER BY `ID_Img` DESC LIMIT 1");
//$row = mysqli_fetch_array($result);
//$idmaxi=$row['ID_Img'];


//$ID_Img =  $idmaxi +1;
$ID_Vendeur=$_SESSION['ID'];
$ID_Produit=$idmax+1;
$Nom = isset($_POST['nom']) ? $_POST['nom']:"";
$Prix = isset($_POST["prix"]) ? $_POST["prix"]:"";
$Stock = isset($_POST["stock"]) ? $_POST["stock"]:"";
$Categorie =  isset($_POST["genre"]) ? $_POST["genre"]:"";
$Description = isset($_POST["description"]) ? $_POST["description"]:"";


$Verif=0;

if(isset($_POST['submit'])) {
	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt= explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));


	$allowed = array('jpg','jpeg','png');

	if (in_array($fileActualExt,$allowed)){
		if($fileError===0){
			if($fileSize < 10000000){
				$fileNameNew = $ID_Produit.".".$fileActualExt;
				$fileDestination = 'ImagesProduits/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				//header("location: index.php?success");

			}
			else{echo "fichier trop lourd";}
		}
		else{echo"Erreur";}
	}
 	else{echo "File extension incorrect";}
}




//inserer dans la table produit
if($Verif==0)
{
		$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		$sql = "INSERT INTO `produit` (`ID_Vendeur`, `ID_Produit`, `Nom`, `Prix`, `Description`, `Stock`, `NB_Ventes`,`Categorie`,`Enchere`,`EnchereBis`,`ID_Enchere`,`Image_Adresse`) VALUES('$ID_Vendeur', '$ID_Produit', '$Nom', '$Prix', '$Description', '$Stock', '0', '$Categorie','0','0','0','')";


	
		$bdd->query($sql);

		header('Location: http://localhost/ProjetInfo/Page/Vendeur.php');
}
else if ($Verif==1)
{echo "Erreur. <br> <br>";}

mysqli_close($db_handle);
?>