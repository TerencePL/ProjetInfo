<?php
session_start(); // On démarre la session AVANT toute chose
?>

<!DOCTYPE html>
<html>
<head>
	<title>Vente</title>
	
</head>

	<body>
		  <?php include("C:\wamp64\www\ProjetInfo\HautDePage.php"); ?>
<center>
		<form action="http://localhost/ProjetInfo/Vendre/VenteAjout.php" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Nom:</td>
					<td><input type="text" name="nom"></td>
				</tr>
				<tr>
					<td>Prix:</td>
					<td><input type="float" name="prix"></td>
				</tr>	
				<tr>
					<td>Stock:</td>
					<td><input type="int" name="stock"></td>
				</tr>
				<tr>
				<tr>
					<td>Description:</td>
					<td><textarea name="description"></textarea> </td>
				</tr>

				<tr>
				       <td><label for="genre">Categorie du produit ?</label><br/>
       						<select name="genre">
           						<option value="1">Tresor et Feraille</option>
           						<option value="2">Musée</option>
           						<option value="3">Accessoire VIP</option>
       						</select></td>
       			</tr>

				<tr>
					<input type="file" name="file">					
				</tr>


				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" value="Mettre en Vente"></td>
				</tr>
			</table>
		</form>
		</p>
<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
	var fileName = input.files[0].name; 
};
</script></center>
  <?php include("C:\wamp64\www\ProjetInfo\BasDePage.php"); ?>
	</body>
</html>

