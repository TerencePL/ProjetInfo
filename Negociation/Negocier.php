<?php
session_start();
//mettre les données recupérées  dans la base de données

$dbname = "ebayece";
$db_login = "root";
$db_pass	= "";

$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


//on recupère l'ID du produit sur lequelle on a cliqué
$ID_Produit = isset($_POST["ID_Produit"])? $_POST["ID_Produit"] : "";

include("C:\wamp64\www\ProjetInfo\HautDePage.php"); 
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
			                    <h5>  <?php echo "Meilleur negociation: $".$row['NegociationBis'].'</br>'; ?>  </h5>
			                    <h5>  <?php echo "Nombre de negociation: ".$row['NB_Negociation'].'</br>'; ?>  </h5>
			                    <h5>  <?php echo "Contre Offre: $".$row['ContreOffre'].'</br>'; ?>  </h5>
			                  </div>

							<?php 
							if($row['NB_Negociation'] < 5) //Negoce toujours en cours
							{ ?>
			                  <form action="http://localhost/ProjetInfo/Negociation/NegocierB.php" method="post">
			                  	<table>
			                  		<tr>
										<td>Nouveau montant:</td>
										<td><input type="text" name="newenchere"></td>
									</tr>

									<tr>
									
					                    <td colspan="2" align="right"><input type="submit" value="Proposer" />
					                    <input type="hidden" name="ID_Produit" value='<?php echo $ID_Produit?>' /></td>
					              
				                	</tr>

				                </table>
				                </form>

				                <?php if($ID_User == $row['ID_Negociation']) //Enchère validée; bon utilisateur connecte
					            	{

									        		$_SESSION['PrixPanier'] = $row['NegociationBis'];
									        		$_SESSION['ID_Achat'] = $row['ID_Produit'];

									        		if($row['NegociationBis'] >= $row['ContreOffre'])
									        			{
										            	?>
										            	<form action="http://localhost/ProjetInfo/Acheter/AchatNegoc.php" method="post">
												            	<td colspan="2" align="right"><input type="submit" value="Valider/passer à l'achat" />
												                <input type="hidden" name="ID_Produit" value='<?php echo $ID_Produit?>' /></td>
												        </form>
											<?php  		}
														else{echo "Offre non satisfaisante pour le vendeur.";}
					           		}//Mauvais utilisateur connecte ?>



  								<?php } //on depasse 5 negoce
					            else{
					            		echo " Erreur";
					            		$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
								        $sql = "UPDATE produit SET NB_Negociation = 0 WHERE ID_Produit like '$ID_Produit'";
								        $bdd->query($sql);

										$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
								        $sql = "UPDATE produit SET NegociationBis = 0 WHERE ID_Produit like '$ID_Produit'";
								        $bdd->query($sql);

								        $bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
								        $sql = "UPDATE produit SET ID_Negociation = 0 WHERE ID_Produit like '$ID_Produit'";
								        $bdd->query($sql);

					        			}
					            ?>

			              </div>
			            </div>

				<?php
     			}
     			else{echo "Erreur pas de session ouverte.";}

     	}
     	else{echo "BDD introuvable";}


?>
