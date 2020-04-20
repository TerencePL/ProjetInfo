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
$ID_User=$_SESSION['ID'];

if(isset($_SESSION['ID']))  
                  {$ID=$_SESSION['ID'];

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
			                  </div>


			                  <form action="http://localhost/ProjetInfo/Enchere/EncherirB.php" method="post">
			                    <td colspan="2" align="right"><input type="submit" value="Surencherir" />
			                    <input type="hidden" name="ID_Produit" value='<?php echo $ID_Produit?>' /></td>
			                  </form>

			              </div>
			            </div>

				<?php
     			}
     			else{echo "Erreur pas de session ouverte.";}
     		?>