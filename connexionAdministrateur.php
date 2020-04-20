<!DOCTYPE html>
<html>
<head>
	<title>Se connecter</title>
	<meta charset="utf-8">
	<meta name= "viewport" content= "width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="connexion.css">
   		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" href="connexionAdministrateur.css" media="screen" type="text/css" />
  		<link rel="stylesheet" type="text/css" href="C:\wamp64\www\Projetebay\PagePrincipaleEbay.css">
  		<script type="text/javascript">
   		$(document).ready(function(){
   		$('.header').height($(window).height());
   		});
  		</script>
  		<?php include("C:\wamp64\www\Projetebay\HautDePage.php"); ?>
      
</head>

<body style="background-image:url('imagesnoir.jpg')">
<div id="container">
            <!-- zone de connexion -->
            
            <form>
                <h1 align="center">Connexion</h1>
                <h1 align="center"> Administrateur</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN' >

                <label><b>Vous n'etes pas encore inscrit ?</b></label>
                <input type="submit" id='Inscription' value='Inscription' >

            </form>
        </div>

<?php include("C:\wamp64\www\Projetebay\BasDePage.php"); ?>

</body>
</html>