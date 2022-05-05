<!-- Page permettant de supprimer 
la prise en charge d'un datafactory pour une habilitation -->
<?php
session_start();

require 'connexion.php';

// Requete SQL permettant de supprimé la prise en charge
$sql_supprime_prise_en_charge = "UPDATE `fiche_nav_etat_habilitation` SET `pris_en_charge_par`='' WHERE `id_habilitation`= '" . $_POST['id_habilitation'] . "'";
$sql_supprime_prise_en_charge = $bdd->query($sql_supprime_prise_en_charge);

//Retour à la page précédente
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
</form>