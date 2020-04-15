<?php
session_start();
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

      <?php //**************************[[A REMPLACER PAR DU TEXTE SI PERSONNE N'EST CONNECTE]]****************************** ?>

 
          <h1>Bienvenue: </h1>

            <?php // recupération des infos du compte connecté depuis la BDD via son ID
              $database = "ebayece";

              $db_handle = mysqli_connect('localhost', 'root', '');
              $db_found = mysqli_select_db($db_handle, $database);


              if(isset($_SESSION['ID']))
                {$ID=$_SESSION['ID'];

              $result = mysqli_query($db_handle,"SELECT * FROM vendeur WHERE ID LIKE '$ID'");
              $row = mysqli_fetch_array($result);
          		}
            ?>


              <ul>
                <li>  <?php if(isset($_SESSION['ID'])) {echo "Nom: ".$row['Nom'];} ?> </li>
                <li> <?php if(isset($_SESSION['ID'])) {echo "Prenom: ".$row['Prenom'];}?> </li> 
                    
              </ul>  

              <br>
              <a href="http://localhost/ProjetInfo/Deconnexion/Deconnexion.php" title="Deconnexion">Deconnexion</a>


        <?php //********************************************************************************************************* ?>

        </div>
  </header>

  <div class="container features">
   <div class="row">
   <div class="col-lg-4 col-md-4 col-sm-12">
   <h3 class="feature-title">Tout savoir sur les Cariatides</h3>
   <img src="cariatides.jpg" class="img-fluid">
   <p>
    Une cariatide, ou caryatide (du grec ancien Καρυάτιδες, littéralement « femmes de Caryes », du nom d'une ville de Laconie), est une statue de femme souvent vêtue d'une longue tunique, soutenant un entablement sur sa tête ; remplaçant ainsi une colonne, un pilier ou un pilastre, les Caryatides apparaissent essentiellement sur les édifices d'ordre ionique. 
   </p>
   </div>
   <div class="col-lg-4 col-md-4 col-sm-12">
   <h3 class="feature-title">Forêt urbaine ou la culpabilisation existentielle de l’Autre</h3>
   <img src="column2.jpg" class="img-fluid">
   <p>
    N’y a-t-il pas un abus de langage à utiliser cet oxymore qu’est la forêt urbaine ? L’expression esquisse au crayon magique les contours de dérive sémantique et de manipulation idéologique certifiées. La forêt urbaine, comme la promesse de son idéal, nous ment.
   </p>
   </div>
   <div class="col-lg-4 col-md-4 col-sm-12">
    <h3 class="feature-title">Entrer en contact!</h3>
  <div class="form-group">
   <input type="text" class="form-control" placeholder="Votre nom:" name="">
  </div>
  <div class="form-group">
   <input type="email" class="form-control" placeholder="Courriel:" name="email">
  </div>
  <div class="form-group">
   <textarea class="form-control" rows="4">Vos commentaires</textarea>
  </div>
  <input type="submit" class="btn btn-secondary btn-block" value="Envoyer" name="">
   </div>
  </div>
  </div>

  <?php include("C:\wamp64\www\ProjetInfo\BasDePage.php"); ?>


  </body>

  </html>
