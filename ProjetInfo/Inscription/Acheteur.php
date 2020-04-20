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
  <?php include("C:\wamp64\www\ProjetInfo\HautDePage.php"); ?>

  </head>
  <body>



  <header class="page-header header container-fluid">
  <div class="overlay"></div>
  <div class="overlay"></div>
  <div class="description">
          <h1><B> Inscription Acheteur: </B></h1>
        <div id="corps">
      <form action="http://localhost/ProjetInfo/Inscription/AcheteurB.php" method="post">
      <table>
        <tr>
          <td style="color: white">Nom:</td>
          <td><input type="text" name="nom"></td>
        </tr>
        <tr>
          <td style="color: white">Prenom:</td>
          <td><input type="text" name="prenom"></td>
        </tr> 
        <tr>
          <td style="color: white">Adresse:</td>
          <td><input type="text" name="adresse"></td>
        </tr>
        <tr>
          <td style="color: white">Mail:</td>
          <td><input type="text" name="mail"></td>
        </tr>
        <tr>
          <td style="color: white">Mot de passe:</td>
          <td><input type="text" name="mdp"></td>
        </tr>
        <tr>
          <td style="color: white">Ville:</td>
          <td><input type="text" name="ville"></td>
        </tr>
        <tr>
          <td style="color: white">Pays:</td>
          <td><input type="text" name="pays"></td>
        </tr>
        <tr>
          <td style="color: white">Code Postale:</td>
          <td><input type="text" name="postal"></td>
        </tr>
        <tr>
          <td style="color: white">telephone:</td>
          <td><input type="text" name="telephone"></td>
        </tr>

        <tr>
          <td style="color: white"><br><B> Informations banquaires</B></td>

        </tr>
        <tr>
          <td style="color: white">NCarte:</td>
          <td><input type="text" name="ncarte"></td>
        </tr>
        <tr>
          <td style="color: white">Expiration:</td>
          <td><input type="date" name="date"></td>
        </tr> 
        <tr>
          <td style="color: white">PIN:</td>
          <td><input type="text" name="pin"></td>
        </tr>

        <tr>
          <td colspan="2" align="center"><input type="submit" n="Valider" value= "Creer un Compte"></td>
        </tr>
      </table>
    </form>
    </p>  
  </header>

  
  <?php include("C:\wamp64\www\ProjetInfo\BasDePage.php"); ?>


  </body>

  </html>
