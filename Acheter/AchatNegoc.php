<?php
session_start();
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="Style.css" />
		<title></title>
	</head>
	<body>


		<div id="corps">
			
		
			<form action="http://localhost/ProjetInfo/Acheter/AchatRedirectNegoc.php" method="post">
			<table>
					<tr>
						<td>A payer: <?php echo $_SESSION['PrixPanier'];  ?> </td>
					</tr>
					<tr>
						<td>Numero de carte:</td>
						<td><input type="int" name="Ncarte"></td>
					</tr>
					<tr>
						<td>PIN:</td>
						<td><input type="int" name="PIN"></td>
					</tr>	
					<tr>
						<td>Date d'expiration:</td>
						<td><input type="date" name="DateExpiration"></td>
					</tr>


					<tr>
						<td colspan="2" align="center"><input type="submit" n="Valider"></td>
					</tr>
			</table>
		</form>
		</p>

		</div>
		
		
	</body>
</html>


