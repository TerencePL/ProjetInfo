<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Se connecter</title>
	<meta charset="utf-8">
	<meta name= "viewport" content= "width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" href="connexion.css" media="screen" type="text/css" />
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
    <div id="container">
            <!-- zone de connexion -->
            
            <form action="http://localhost/ProjetInfo/Connexion/AcheteurB.php" method="post">
                <h1 align="center">Connexion</h1>
                
                <label><b>Mail</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="mail" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN' >

                <label><b>Vous n'etes pas encore inscrit ?</b></label>
                <input type="submit" id='Inscription' value='Inscription' >

            </form>
        </div>

    <br>
    <?php echo "ID connecté: ".$_SESSION['ID']; ?>
    <br>
    <a href="http://localhost/ProjetInfo/Deconnexion/Deconnexion.php" title="Deconnexion">Deconnexion</a>
</header>


</body>
</html>