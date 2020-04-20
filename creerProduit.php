<!DOCTYPE html>
<html>
<head>
	<title>Creer Produit</title>
	<meta charset="utf-8">
	<meta name= "viewport" content= "width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="connexion.css">
   		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" href="creerProduit.css" media="screen" type="text/css" />
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
                <h1 align="center">Ajouter un</h1>
                <h1 align="center"> Produit</h1>
                
                <label><b>Nom</b></label>
                <input type="text" placeholder="Entrer le nom" name="name" required>
       			
       			<label><b>Description</b></label>
       			<textarea name="description" id="description" rows="5" cols="34">
       			Decription de votre produit
       			</textarea>       
  				<br>

                <label><b>Prix</b></label>
                <input type="number" placeholder="Entrer le prix" name="prix" required>

                <label><b>Quantité</b></label>
                <input type="number" placeholder="Entrer la quantite" name="quantite" required>

                <label><b>Catégories</b></label>
       			<label for="categories">Choisissez parmis les catégories suivantes</label><br />
       			<select name="categories" id="categories">
           			<option value="FT">Ferraille ou Trésor</option>
           			<option value="Musee">Bon pour le Musée</option>
           			<option value="acces">Accessoire VIP</option>          
      			</select>
      			<br>
   
      			<label><b>Images</b></label>
                <input type="text" placeholder="Importer l'image" name="image" required>

                <label><b>Ajouter l'article à la vente</b></label>
                <input type="submit" id='submit' value='Ajouter' >

            </form>
        </div>

<?php include("C:\wamp64\www\Projetebay\BasDePage.php"); ?>

</body>
</html>