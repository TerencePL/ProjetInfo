<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

session_destroy();
header('Location: http://localhost/ProjetInfo/Page/Acheteur.php');

?>