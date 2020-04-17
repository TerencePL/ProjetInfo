<?php
session_start();
//mettre les données recupérées  dans la base de données
   $dbname = "ebayece";
   $db_login = "root";
   $db_pass	= "";

$database = "ebayece";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$ID_User=$_SESSION['ID'];
$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
$sql = "UPDATE panier SET ID_Produit1 = '0' WHERE ID_User like '$ID_User'";
$bdd->query($sql);
$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
$sql = "UPDATE panier SET ID_Produit2 = '0' WHERE ID_User like '$ID_User'";
$bdd->query($sql);
$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
$sql = "UPDATE panier SET ID_Produit3 = '0' WHERE ID_User like '$ID_User'";
$bdd->query($sql);
$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
$sql = "UPDATE panier SET ID_Produit4 = '0' WHERE ID_User like '$ID_User'";
$bdd->query($sql);
$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
$sql = "UPDATE panier SET ID_Produit5 = '0' WHERE ID_User like '$ID_User'";
$bdd->query($sql);
header('Location: http://localhost/ProjetInfo/Panier.php');

?>