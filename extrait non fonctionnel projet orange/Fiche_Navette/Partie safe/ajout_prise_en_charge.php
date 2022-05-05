<?php
session_start();
require 'connexion.php';

// Affiche la date du jour
date_default_timezone_set('UTC');
$today = date("j/n/Y");          // 10, 3, 2001

//Update de la prise en charge de l'habilitation selon id de l'app
$sqlajout_prise_en_charge = "UPDATE `fiche_nav_etat_habilitation` SET `pris_en_charge_par`='" . $_POST['prise_en_charge'] . "' WHERE `id_habilitation`= '" . $_POST['id_habilitation'] . "'";
echo $sqlajout_prise_en_charge;
$result_prise_en_charge = $bdd->query($sqlajout_prise_en_charge);

//Retour à la page précédente
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
</form>