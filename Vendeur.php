<?php
session_start();
$_SESSION['ID']=1;
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

  <?php include("C:\wamp64\www\ProjetInfo\HautDePage.php");  
  ?>

  <header class="page-header header container-fluid">
    <div class="overlay"></div>
    <div class="overlay"></div>
    <div class="description">


      <?php //**************************[[A REMPLACER PAR DU TEXTE SI PERSONNE N'EST CONNECTE]]****************************** ?>


          <h1><font size="10pt"><B>Bienvenue à toi petit vendeur <br><?php // recupération des infos du compte connecté depuis la BDD via son ID
              //$database = "ebayece";

              //$db_handle = mysqli_connect('localhost', 'root', '');
             // $db_found = mysqli_select_db($db_handle, $database);

          $mysqli= new mysqli('localhost', 'root', '', 'ebayece');
          $mysqli->set_charset("utf8");

          $requete="SELECT * FROM vendeur ";
          $result =$mysqli->query($requete);

              //if(isset($_SESSION['ID']))
              //  {$ID=$_SESSION['ID'];




              //$result = mysqli_query($db_handle,"SELECT * FROM vendeur WHERE ID_Vendeur LIKE '$ID'");
             // $row = mysqli_fetch_array($result);
             // $resultat=$db_handle->query($result);

          while ($row=$result->fetch_assoc())

          {
            echo $row['Pseudo'].''.'<br><br>';
            echo '<img src="'.$row['Photo_Adresse'].'" alt=""/>'.'<br>';
          }
          ?>


          <ul>
            <li>  <font size=+4><?php if(isset($_SESSION['ID'])) {echo "".$row['Pseudo'];} ?> </font></li>
          </ul>  </B></font> </h1>
          <a href="http://localhost/ProjetInfo/Deconnexion/Deconnexion.php" title="Deconnexion" style="color:red"><font size="+4">Déconnexion</font></a> 

          <?php //********************************************************************************************************* ?>

        </div>
      </header>


      <?php include("C:\wamp64\www\ProjetInfo\BasDePage.php"); ?>


    </body>

    </html>
