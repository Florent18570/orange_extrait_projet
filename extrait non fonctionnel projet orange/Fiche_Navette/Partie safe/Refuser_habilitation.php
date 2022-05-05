<!-- Page permettant de changé l'état d'une habilitation en Refusée -->

<?php
session_start();
require 'connexion.php';

//permet d'accepter les habilitation qui sont en Etat "Demande en cours"
$sql = "UPDATE `fiche_nav_etat_habilitation` SET `Etat`=2 WHERE  `Etat`=0 AND `id_habilitation`=    '" . $_POST['id_habilitation'] . "' AND `CUID`= '" . $_SESSION['Identifiant'] . "'  ";
echo $sql;
$result = $bdd->query($sql);

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
</form>