<?php

session_start();

$ID = isset($_POST['ID'])? $_POST['ID'] : "";
$password = isset($_POST['password'])? $_POST['password'] : "";



$database = "ecebay";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


$result = mysqli_query($db_handle,"SELECT * FROM acheteur WHERE ID_User LIKE '$ID'");
//regarder s'il y a de résultat
if($db_found){
	if (mysqli_num_rows($result) != 0 ) 
		{
		//on a trouve l'ID dans la base de donnee

		if($password != ""){
			$result = mysqli_query($db_handle, "SELECT * from acheteur Where ID_User like '$ID' and MDP LIKE '$password'");
			if (mysqli_num_rows($result) != 0) 
				{
					$row = mysqli_fetch_array($result);
					$ID_Connexion=$row['ID_User'];
					$_SESSION['ID'] = $ID_Connexion;
					echo "ID de la connexion: ".$_SESSION['ID'];

					// PENSEZ A REMPLACER LA LIGNE SUIVANTE PAR LA PAGE D ACCUEIL REDIRIGE APRES LA CONNEXION //
					header('Location: http://localhost/ECEbay/Vente.php');
				}
		else{
			// L un des parametres est inccorect
			echo "Password or ID is incorrect";
			}
		}

		} else 
		{
	 	// L un des parametres est inccorect
		 echo "Password or ID is incorrect";
		}
}else 
{
	echo "Database not found";
}


//fermer la connexion

mysqli_close($db_handle);


?>