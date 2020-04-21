<?php
session_start();
//mettre les données recupérées  dans la base de données
   $dbname = "ebayece";
   $db_login = "root";
   $db_pass	= "";

$database = "ebayece";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$Offre = isset($_POST["offre"])? $_POST["offre"] : "";
$ID_Produit1 = $_SESSION['ID_Produit'];
$ID_User=$_SESSION['ID'];


	$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
	$sql = "UPDATE produit SET ContreOffre = '$Offre' WHERE ID_Produit like '$ID_Produit1'";
	$bdd->query($sql);


header('Location: http://localhost/ProjetInfo/Page/Vendeur.php');

?>