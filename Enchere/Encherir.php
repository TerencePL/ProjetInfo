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
//echo "id du produit" .$ID_Produit;


//Date actuelle
$currentDateTime = date('Y-m-d H:i:s');

if($db_found) 
{
	if(isset($_SESSION['ID']))  
                  {$ID=$_SESSION['ID'];
              		$ID_User=$_SESSION['ID'];

                  	$result = mysqli_query($db_handle,"SELECT * FROM produit WHERE ID_Produit LIKE '$ID_Produit'");
                   	$row = mysqli_fetch_array($result);
				?>
                   	<div class="col-lg-4 col-md-6 mb-4">
			            <div class="card h-100">
			              <a href="#"><img class="card-img-top" src='http://localhost/ProjetInfo/Vendre/ImagesProduits/<?php echo $ID_Produit;?>.jpg' alt=""></a>
			                  <div class="card-body">

			                    <h4 class="card-title"><a href="#"> <?php echo "".$row['Nom'].'</br>'; ?> </a></h4>
			                    <h5>  <?php echo "Description: ".$row['Description'].'</br>'; ?>  </h5>
			                    <h5>  <?php echo "Meilleur enchère: ".$row['EnchereBis'].'</br>'; ?>  </h5>
			                    <h5>  <?php echo "Date limite: ".$row['DateEnchere'].'</br>'; ?>  </h5>
			                  </div>

							<?php if( $currentDateTime < $row['DateEnchere']) //Enchere toujours en cours
							{ ?>
			                  <form action="http://localhost/ProjetInfo/Enchere/EncherirB.php" method="post">
			                  	<table>
			                  		<tr>
										<td>Nouveau montant:</td>
										<td><input type="text" name="newenchere"></td>
									</tr>

									<tr>
									
					                    <td colspan="2" align="right"><input type="submit" value="Surencherir" />
					                    <input type="hidden" name="ID_Produit" value='<?php echo $ID_Produit?>' /></td>
					              
				                	</tr>

				                </table>
				                </form>


  								<?php } 
					            else if($ID_User == $row['ID_Enchere']) //Enchère validée; bon utilisateur connecte
					            {   
				        			$_SESSION['PrixPanier'] = $row['Enchere'] +1;
				        			$_SESSION['ID_Achat'] = $row['ID_Produit'];
					            	?>
					            	<form action="http://localhost/ProjetInfo/Acheter/AchatEnchere.php" method="post">
							            	<td colspan="2" align="right"><input type="submit" value="Valider l'enchère/passer à l'achat" />
							                <input type="hidden" name="ID_Produit" value='<?php echo $ID_Produit?>' /></td>
							        </form>
								 <?php
					           	}//Enchère validée; mauvais utilisateur connecte
					            else{echo " Enchère terminée";}
					            ?>

			              </div>
			            </div>

				<?php
     			}
     			else{echo "Erreur pas de session ouverte.";}

     	}
     	else{echo "BDD introuvable";}


?>
