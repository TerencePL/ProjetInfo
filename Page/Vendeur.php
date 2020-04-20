  <?php
  session_start();
  
$database = "ebayece";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$j=0;

$ID=$_SESSION['ID']; //On recupère l'ID de session ATTENTION cette valeur est changé dans la boucle
$NbArticles=0; // à 0 par defaut

//si le BDD existe, faire le traitement. Trouver les ID des livres
if($db_found) 
{
  $result = mysqli_query($db_handle, "SELECT * FROM produit WHERE ID_Vendeur = '$ID' ORDER BY Categorie");
  while($data = mysqli_fetch_assoc($result)) 
  {
    $ID=$data['ID_Produit'];
    
    $resultBIS = mysqli_query($db_handle, "SELECT * FROM produit Where ID_Produit like '$ID'");
    while($data2 = mysqli_fetch_assoc($resultBIS)) 
    {
      $j=$j+1;

      $IDBis[$j] = $data2['ID_Produit'];
      $Nom[$j] = $data2['Nom'];
      $Prix[$j] = $data2['Prix'].'</br>';

      $Description[$j] = $data2['Description'];
      $Stock[$j] = $data2['Stock'];
    }//end while 
    echo '</br>';
    $NbArticles=$j;
  }//end while 
}//endif
else{echo "ma base n'existe pas";}
?>

    <!DOCTYPE html>
    <html>
    <head>
    <title>Compte acheteur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet"
     href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="C:\wamp64\www\ProjetInfo\PagePrincipaleEbay.css">
    <script type="text/javascript">
     $(document).ready(function(){
     $('.header').height($(window).height());
     });
    </script>

    </head>
    <body>

  <?php include("C:\wamp64\www\ProjetInfo\HautDePage.php"); ?>

    <header class="page-header header container-fluid">
      <div class="overlay"></div>
      <div class="overlay"></div>
      <div class="description">

        <?php //**************************[[A REMPLACER PAR DU TEXTE SI PERSONNE N'EST CONNECTE]]****************************** 
                $database = "ebayece";
                $db_handle = mysqli_connect('localhost', 'root', '');
                $db_found = mysqli_select_db($db_handle, $database);
          ?>
   
            <h1><font size="8pt"><B>Bienvenue: 

            <?php // recupération des infos du compte connecté depuis la BDD via son ID
                //Verification si une session est bien ouverte (si qlqun est connecté)
                if(isset($_SESSION['ID']))  
                  {$ID=$_SESSION['ID'];

                  $result = mysqli_query($db_handle,"SELECT * FROM vendeur WHERE ID_Vendeur LIKE '$ID'");
                  $resultat = mysqli_query($db_handle,"SELECT * FROM acheteur WHERE ID LIKE '$ID'");
                  $row = mysqli_fetch_array($result);
                  $row_ = mysqli_fetch_array($resultat);
                
              ?>

                <ul>
                  <li style="color:white"> <font size="+3"> 
                    <?php if(isset($_SESSION['ID'])) {}?>
                    <?php if(isset($_SESSION['ID'])) {} 
                      echo $row['Pseudo'].''.'<br><br>'; 
                      echo '<img src="'.$row['Photo_Adresse'].'" alt=""/>'.'<br>';?>
                    </li>     
                </ul>
                <?php
                }
                else   //Si aucune session ouverte
                {echo "<br><br> Aucun compte connecté  <br><br>";}

                ?>
                </font>

          <br>
          <a href="http://localhost/ProjetInfo/Deconnexion/Deconnexion.php" title="Deconnexion" style="color:red"><font size="+4">Déconnexion </font></a></B></font></h1>

      <?php       
      // ________________Boucle qui parcoure le nombre de produits en vente de la categorie___________________
        for($i = 1; $i <= $NbArticles; $i++)
        {
          ?>
          <div class="col-lg-4 col-md-6 mb-1">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://localhost/ProjetInfo/ImagesProduits/tresor1.jpg" alt=""></a>
                  <div class="card-body">

                    <h4 class="card-title">
                      <a href="#"> <?php echo "".$Nom[$i].'</br>'; ?> </a>
                    </h4>

                    <h5>  <?php echo "Description: ".$Description[$i].'</br>'; ?>  </h5>
                    <h5>  <?php echo "$".$Prix[$i]; ?> </h5>
                    <h5>  <?php echo "Sotck: ".$Stock[$i]; ?> </h5>
                  </div>

                  <form action="http://localhost/ProjetInfo/AjoutPanier.php" method="post">
                    <td colspan="2" align="right"><input type="submit" value="Ajouter au panier" />
                    <input type="hidden" name="ID_Produit" value='<?php echo $IDBis[$i]?>' /></td>
                  </form>

              </div>
            </div>


        <?php
        }   //************Fin de la boucle**************
      ?>  



      </div>
    </header>



    <?php include("C:\wamp64\www\ProjetInfo\BasDePage.php"); ?>


    </body>

    </html>
