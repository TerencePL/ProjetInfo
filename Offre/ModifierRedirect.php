<?php
session_start();
//mettre les données recupérées  dans la base de données 
$_SESSION['ID_Produit'] = isset($_POST["ID_Produit"])? $_POST["ID_Produit"] : "";

?>


 <form action="http://localhost/ProjetInfo/Offre/Modifier.php" method="post">
 	<input type="int" name="offre">
    <td colspan="2" align="right"><input type="submit" value="Modifier mon offre" />
</form>


<?php
?>