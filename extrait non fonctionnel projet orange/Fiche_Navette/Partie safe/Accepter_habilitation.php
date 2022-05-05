<?php
session_start();

//Connexion à la base de données
require 'connexion.php';

//permet d'accepter les habilitation qui sont en Etat "Demande en cours"
echo $_POST['id_habilitation'];
$sql = "UPDATE `fiche_nav_etat_habilitation` SET `Etat`='1' WHERE  `Etat`='0' AND `id_habilitation`=    '" . $_POST['id_habilitation'] . "' AND `CUID`= '" . $_SESSION['Identifiant'] . "'  ";
echo $sql;
$result = $bdd->query($sql);

//redirection à la page précédente
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
</form>