 <?php
session_start();

$database = "ebayece";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$j=0;
$NbArticles=0;

//si le BDD existe, faire le traitement. Trouver les ID des livres
if($db_found) 
{
  $result = mysqli_query($db_handle, "SELECT * FROM produit WHERE Categorie = 2 ORDER BY ID_Produit" );
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

      //$Sport[$j] = $data['Sport'];

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
  <title>Bon Pour le Musée</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet"
   href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="C:\wamp64\www\ProjetInfo\FerrailleTresor.css">
  <script type="text/javascript">
   $(document).ready(function(){
   $('.header').height($(window).height());
   });
  </script>
  <?php include("C:\wamp64\www\ProjetInfo\HautDePage.php"); ?>
</head>
<body>

    <!-- Page Content -->
  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Catégorie</h1>
        <div class="list-group">
          <a href="http://localhost/ProjetInfo/Categories/FerrailleTresor.php" class="list-group-item">Ferraille et trésor</a>
          <a href="http://localhost/ProjetInfo/Categories/BonMusee.php" class="list-group-item">Bon pour le Musée</a>
          <a href="http://localhost/ProjetInfo/Categories/AccessoireVIP.php" class="list-group-item">Accessoire VIP</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <div class="row">



      <?php       
      // ________________Boucle qui parcoure le nombre de produits en vente de la categorie___________________
        for($i = 1; $i <= $NbArticles; $i++)
        {
          ?>


          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src='http://localhost/ProjetInfo/Vendre/ImagesProduits/<?php echo $IDBis[$i];?>.jpg' alt=""></a>
                  <div class="card-body">

                    <h4 class="card-title">
                      <a href="#"> <?php echo "".$Nom[$i].'</br>'; ?> </a>
                    </h4>

                    <h5>  <?php echo "Description: ".$Description[$i].'</br>'; ?>  </h5>
                    <h5>  <?php echo "$".$Prix[$i]; ?> </h5>
                    <h5>  <?php echo "Sotck: ".$Stock[$i]; ?> </h5>
                  </div>

              <div class="card-footer" action="http://localhost/ProjetInfo/AjoutPanier.php" method="post">
                <button>Acheter</button>
              </div>
               <form action="http://localhost/ProjetInfo/Enchere/Encherir.php" method="post">
                    <td colspan="2" align="right"><input type="submit" value="Enchere" />
                    <input type="hidden" name="ID_Produit" value='<?php echo $IDBis[$i]?>' /></td>
                  </form>
                  <form action="http://localhost/ProjetInfo/Negociation/Negocier.php" method="post">
                    <td colspan="2" align="right"><input type="submit" value="Negocier" />
                    <input type="hidden" name="ID_Produit" value='<?php echo $IDBis[$i]?>' /></td>
                  </form>
            </div>
          </div>



        <?php
        }   //______________________________________Fin de la boucle________________________________
      ?>


         




        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
 <?php include("C:\wamp64\www\ProjetInfo\BasDePage.php"); ?>
</body>


<?php $i=1   //A laisser pour le moment ?>
          <article>
                  <form action="http://localhost/ProjetInfo/AjoutPanier.php" method="post">
                    <td colspan="2" align="right"><input type="submit" value="Ajouter au panier" />
                    <input type="hidden" name="ID_Produit" value='<?php echo $IDBis[$i]?>' /></td>
                  </form>

          </article>
          <br><br>



  </html>
