<?php
session_start(); 
    
   $dbname = "ebayece";
   $db_login = "root";
   $db_pass	= "";

$database= "ebayece";
//Rappel:votre serveur = localhost | votre login = root | votre mot de pass = ''(rien)
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


//idmax recupère l'ID_Produit max deja existant.
$result = mysqli_query($db_handle, "SELECT * FROM `produit` ORDER BY `ID_Produit` DESC LIMIT 1");
$row = mysqli_fetch_array($result);
$idmax=$row['ID_Produit'];

//idmaxi recupère l'ID_Img max deja existant.
$result = mysqli_query($db_handle, "SELECT * FROM `image` ORDER BY `ID_Img` DESC LIMIT 1");
$row = mysqli_fetch_array($result);
$idmaxi=$row['ID_Img'];



$ID_Img =  $idmaxi +1;
$ID_Produit=$idmax+1;
$ID_Vendeur=$_SESSION['ID'];
$Nom = isset($_POST['nom']) ? $_POST['nom']:"";
$Prix = isset($_POST["prix"]) ? $_POST["prix"]:"";
$Stock = isset($_POST["stock"]) ? $_POST["stock"]:"";

$Description = isset($_POST["description"]) ? $_POST["description"]:"";
$Auteur = isset($_POST["auteur"]) ? $_POST["auteur"]:"";
$Date_Parution = isset($_POST["dateparution"]) ? $_POST["dateparution"]:"";
$Genre = isset($_POST["genre"]) ? $_POST["genre"]:"";

if (($_FILES['my_file']['name']!="")){
// Where the file is going to be stored
	$target_dir = "uploads/";
	$file = $_FILES['my_file']['name'];
	$path = pathinfo($file);
	$filename = $path['filename'];
	$ext = $path['extension'];
	$temp_name = $_FILES['my_file']['tmp_name'];
	$path_filename_ext = $target_dir.$filename.".".$ext;
 
// Check if file already exists
if (file_exists($path_filename_ext)) {
 echo "Sorry, file already exists.";
 }else{
 move_uploaded_file($temp_name,$path_filename_ext);
 echo "Congratulations! File Uploaded Successfully.";
 }
}

//$Nom="test";


$Verif=0;

/*Verifier si le mail du nouveau profil existe déjà ou non dans la bdd
if($db_found) {

	$sql = "SELECT * FROM vendeur";
	$result = mysqli_query($db_handle,$sql);
	while($data = mysqli_fetch_assoc($result)) 
		{
		if($Mail == $data['Mail'])
			{$Verif=1;}
		}
	} */

//inserer dans la table produit
if($Verif==0)
{
		$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		$sql = "INSERT INTO produit (ID_Vendeur, ID_Produit, Nom, Prix, Description, Stock, NB_Ventes) VALUES(";
		$sql .= "'$ID_Vendeur', '$ID_Produit', '$Nom', '$Prix', '$Description', '$Stock', '0' )";
	
		$bdd->query($sql);
		
		$sql = "INSERT INTO image (ID_Produit, ID_Img, Adresse) VALUES(";
		$sql .= "'$ID_Produit', '$Nom','$path_filename_ext' )";
	
		$bdd->query($sql);
}
else if ($Verif==1)
{echo "Mail déjà existant. <br> <br>";}


//Inserer dans la table musique
if($Verif==0)
{
		$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
		$sql = "INSERT INTO musique (ID_Produit, Auteur, Date_Parution, Genre) VALUES(";
		$sql .= "'$ID_Produit', '$Auteur', '$Date_Parution', '$Genre')";
	
		$bdd->query($sql);
}
else if ($Verif==1)
{echo "Mail déjà existant. <br> <br>";}




mysqli_close($db_handle);
?>