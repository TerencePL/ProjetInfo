<?php
session_start();
					
$database = "ebayece";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$j=0;
$PrixTotal=0;
$NbArticles=0;




//si le BDD existe, faire le traitement. Trouver les ID des livres
if($db_found) 
{

	
		$ID=$_SESSION['ID'];

		$result = mysqli_query($db_handle, "SELECT * FROM panier Where ID_User like '$ID'");
		while($data = mysqli_fetch_assoc($result)) 
		{

			$ID_Produit1= $data['ID_Produit1'];
			$ID_Produit2= $data['ID_Produit2'];
			$ID_Produit3= $data['ID_Produit3'];
			$ID_Produit4= $data['ID_Produit4'];
			$ID_Produit5= $data['ID_Produit5'];
			//$ID=$data['ID_Produit'];
			$_SESSION['ID_Produit1']=$ID_Produit1;
			$_SESSION['ID_Produit2']=$ID_Produit2;
			$_SESSION['ID_Produit3']=$ID_Produit3;
			$_SESSION['ID_Produit4']=$ID_Produit4;
			$_SESSION['ID_Produit5']=$ID_Produit5;
		
			$resultProduit1 = mysqli_query($db_handle, "SELECT * FROM produit Where ID_Produit like '$ID_Produit1'");
			while($dataProduit1 = mysqli_fetch_assoc($resultProduit1)) 
			{

				$j=$j+1;
				$Produit[$j]['ID']=$ID_Produit1;
				$Produit[$j]['Nom']= $dataProduit1['Nom']; 
				$Produit[$j]['Prix']= $dataProduit1['Prix'];
				$Produit[$j]['Description']= $dataProduit1['Description'];
				$Produit[$j]['Stock']= $dataProduit1['Stock'];
				if($Produit[$j]['Stock'] != 0 )
				$PrixTotal = $PrixTotal + $Produit[$j]['Prix'];
				
			}//end while Produit 1

			$resultProduit2 = mysqli_query($db_handle, "SELECT * FROM produit Where ID_Produit like '$ID_Produit2'");
			while($dataProduit2 = mysqli_fetch_assoc($resultProduit2)) 
			{
				$j=$j+1;
				$Produit[$j]['ID']=$ID_Produit2;
				$Produit[$j]['Nom']= $dataProduit2['Nom'];
				$Produit[$j]['Prix']= $dataProduit2['Prix'];
				$Produit[$j]['Description']= $dataProduit2['Description'];
				$Produit[$j]['Stock']= $dataProduit2['Stock'];
				if($Produit[$j]['Stock'] != 0 )
				$PrixTotal = $PrixTotal + $Produit[$j]['Prix'];
				
			}//end while Produit 2

			$resultProduit3 = mysqli_query($db_handle, "SELECT * FROM produit Where ID_Produit like '$ID_Produit3'");
			while($dataProduit3 = mysqli_fetch_assoc($resultProduit3)) 
			{

				$j=$j+1;
				$Produit[$j]['ID']=$ID_Produit3;
				$Produit[$j]['Nom']= $dataProduit3['Nom'];
				$Produit[$j]['Prix']= $dataProduit3['Prix'];
				$Produit[$j]['Description']= $dataProduit3['Description'];
				$Produit[$j]['Stock']= $dataProduit3['Stock'];
				if($Produit[$j]['Stock'] != 0 )
				$PrixTotal = $PrixTotal + $Produit[$j]['Prix'];
				
			}//end while Produit 1

			$resultProduit4 = mysqli_query($db_handle, "SELECT * FROM produit Where ID_Produit like '$ID_Produit4'");
			while($dataProduit4 = mysqli_fetch_assoc($resultProduit4)) 
			{

				$j=$j+1;
				$Produit[$j]['ID']=$ID_Produit4;
				$Produit[$j]['Nom']= $dataProduit4['Nom'];
				$Produit[$j]['Prix']= $dataProduit4['Prix'];
				$Produit[$j]['Description']= $dataProduit4['Description'];
				$Produit[$j]['Stock']= $dataProduit4['Stock'];
				if($Produit[$j]['Stock'] != 0 )
				$PrixTotal = $PrixTotal + $Produit[$j]['Prix'];
				
			}//end while Produit 1

			$resultProduit5 = mysqli_query($db_handle, "SELECT * FROM produit Where ID_Produit like '$ID_Produit5'");
			while($dataProduit5 = mysqli_fetch_assoc($resultProduit5)) 
			{

				$j=$j+1;
				$Produit[$j]['ID']=$ID_Produit5;
				$Produit[$j]['Nom']= $dataProduit5['Nom'];
				$Produit[$j]['Prix']= $dataProduit5['Prix'];
				$Produit[$j]['Description']= $dataProduit5['Description'];
				$Produit[$j]['Stock']= $dataProduit5['Stock'];
				if($Produit[$j]['Stock'] != 0 )
				$PrixTotal = $PrixTotal + $Produit[$j]['Prix'];
				
			}//end while Produit 1





		}//end while 
		echo '</br>';
		$NbArticles=$j;
}//endif
else{echo "ma base n'existe pas";}

?>


<!DOCTYPE html>
<html>
 <head>
  <title>Page Principale</title>
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
   <h1> Panier </h1>
		<div id="corps">
			

      <?php       
      // ________________Boucle qui parcoure le nombre de produits dans le panier___________________
      if($NbArticles==0)
		{echo "Panier vide. <br><br>";}
		else{
		for($i = 1; $i <= $NbArticles; $i++)
        {
          ?>


          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://localhost/ProjetInfo/tresor1.jpg" alt=""></a>
                  <div class="card-body">

                    <h4 class="card-title">
                      <a href="#"> <?php echo "Nom: ".$Produit[$i]['Nom'].'</br>'; ?> </a>
                    </h4>

                    <h5>  <?php echo "Description: ".$Produit[$i]['Description'].'</br>'; ?>  </h5>
                    <h5>  <?php echo "$".$Produit[$i]['Prix'].'</br>'; ?> </h5>
                    <h5>  <?php echo "Stock: ".$Produit[$i]['Stock'].'</br> </br> '; ?> </h5>
                  </div>

              <div class="card-footer" action="http://localhost/ProjetInfo/AjoutPanier.php" method="post">
                <button>Acheter</button>
              </div>
            </div>
          </div>



        <?php
        }  //______________________________________Fin de la boucle________________________________
       }  //Fin Else
      ?>

      <?php
		echo "</br>"."Prix total du panier: ".$PrixTotal;
		//echo "</br>"."ID1: ".$ID_Produit1;
		$_SESSION['PrixPanier'] = $PrixTotal;
		?>
		<br>
      <a href="http://localhost/ProjetInfo/Vider.php">Vider le panier</a>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

</div>




<form action="http://localhost/ProjetInfo/Acheter/Achat.php" method="post">
<input type="hidden" name="prix"></input>
<input type="hidden" name="ID_Produit1" value="<?php $ID_Produit1 ?>"> </input>
<input type="hidden" name="ID_Produit2"></input>
<input type="hidden" name="ID_Produit3"></input>
<input type="hidden" name="ID_Produit4"></input>
<input type="hidden" name="ID_Produit5"></input>
<td colspan="2" align="center"><input type="submit" value="Acheter"></td> 






  <?php include("C:\wamp64\www\ProjetInfo\BasDePage.php"); ?>

</html>
