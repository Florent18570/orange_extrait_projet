<?php
session_start();
require 'connexion.php';

//permet de faire un update de l'info supplémentaire selon id de l'app
$sql4 = "UPDATE `fiche_nav_etat_habilitation` SET `Informations_Complémentaires_RSI`='" . $_GET['Informations_Complémentaires'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' and  id_habilitation = '" . $_GET["id_habilitation"] . "' ";
echo $sql4;
$result4 = $bdd->query($sql4);

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
</form>