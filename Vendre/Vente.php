<?php
session_start(); // On démarre la session AVANT toute chose
?>

<!DOCTYPE html>
<html>
<head>
	<title>Vente</title>
	
</head>

	<body>

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
				<input type="file"  accept="image/*" name="my_file" id="file"  onchange="loadFile(event)" style="display: none;"><br/> <br/>
				<label for="file" style="cursor: pointer;">Upload Image</label>
				<img id="output" width="350" />				
				</tr>

				<tr>
				<label for="myfile">Selectionner une image: </label>
				<Input type="file" id="myfile" name="myfile">			
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
</script>
	</body>
</html>

