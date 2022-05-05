<!-- Ce fichier permet de supprimer une habilitation -->
<!-- Si l'utilisateur est un Datafactory(safe) alors il a le droit de supprimer une habilitation -->

<!-- Si l'utilisateur est un RSI il peut que faire une demande de suppression aux datafactory -->
<?php
session_start();
require 'connexion.php';
echo $_SESSION["Pole"]; ?>



<?php
if ($_SESSION["Pole"] == "RSI") {
    //Changement de l'état d'une habilitation demande de suppression
    $sql4 = "UPDATE `fiche_nav_etat_habilitation` SET `Etat`='3' WHERE `Application` = '" . $_GET['Application'] . "' AND `CUID` = '" . $_SESSION['Identifiant'] . "' ";
    echo $sql4;
    $result4 = $bdd->query($sql4);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    //Changement de l'état d'une habilitation en supprimé
    $sql = "UPDATE `fiche_nav_etat_habilitation` SET `Etat`='4' WHERE   `Application` = '" . $_GET['Application'] . "' and `CUID` = '" . $_SESSION['Identifiant'] . "' ";
    echo $sql;
    $result = $bdd->query($sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
