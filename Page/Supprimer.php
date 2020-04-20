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
echo "id du produit" .$ID_Produit;
$ID_User=$_SESSION['ID'];


$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
$sql = "DELETE FROM `produit` WHERE `produit`.`ID_Produit` =$ID_Produit ";
$bdd->query($sql);

header('Location: http://localhost/ProjetInfo/Page/Vendeur.php');

?>