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
  <link rel="stylesheet" type="text/css" href="http://localhost/ProjetInfo/PagePrincipaleEbay.css">
  <script type="text/javascript">
   $(document).ready(function(){
   $('.header').height($(window).height());
   });
  </script>


  </head>
  <body><nav class="navbar navbar-expand-md">
   <a href="http://localhost/ProjetInfo/PagePrincipaleEbay.php"><img src="http://localhost/ProjetInfo/ECEBay3.png" class="img-fluid"></a>
   <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="main-navigation">


<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
    Catégorie
  </button>
  <div class="dropdown-menu">
    
    <a class="dropdown-item" href="http://localhost/ProjetInfo/Categories/FerrailleTresor.php">Ferraille ou Trésor</a>
    <a class="dropdown-item" href="http://localhost/ProjetInfo/Categories/BonMusee.php">Bon pour le Musée</a>
    <a class="dropdown-item" href="http://localhost/ProjetInfo/Categories/AccessoireVIP.php">Accessoire VIP</a>
  </div>
</div>

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
    Votre Compte
  </button>
  <div class="dropdown-menu">
     <?php if(isset($_SESSION['ID']))  //Variation du menu depandant de si un utilisateur est connecté ou non
                  { ?>
    <a class="dropdown-item" href="http://localhost/ProjetInfo/Page/Acheteur.php">Mon compte</a>
    <a class="dropdown-item" href="http://localhost/ProjetInfo/Page/Vendeur.php">Mon magasin</a>
    <a class="dropdown-item" href="http://localhost/ProjetInfo/Panier.php">Mon Panier</a>
    <a class="dropdown-item" href="http://localhost/ProjetInfo/Deconnexion/Deconnexion.php">Deconnexion</a>
    <?php 
    }
    else{
    ?>

    <a class="dropdown-item" href="http://localhost/ProjetInfo/Connexion/Acheteur.php">Connexion</a>
    <a class="dropdown-item" href="http://localhost/ProjetInfo/Inscription/Acheteur.php">Créer un compte</a>
  <?php } ?>

  </div>
</div>

   <?php if(isset($_SESSION['ID']))  
                  { //Mise en vente possible qu'en etant connecté
                    ?>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
    Vendre
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="http://localhost/ProjetInfo/Vendre/Vente.php">Vendre</a>
  </div>
</div>
<?php 
} // Fin du IF
?>



</nav>
</body>

  </html>
