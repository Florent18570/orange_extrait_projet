<?php
session_start();
require 'connexion.php';

// Modification du champs commentaire lorsque "pole" vaut safe (datafactory)
// Permet l'ajout ou la modification d'un commentaire d'habilitation
if ($_SESSION["Pole"] == "Safe") {
    $variable2 = $_POST["variable2"];
    if ($_POST["modification2"] == "ok") {
        echo $_POST['Informations_Complémentaires_RSI'];
        //Modification du commentaire 
        $update_commentaire2 = "UPDATE `fiche_nav_etat_habilitation` SET `Informations_Complémentaires_Datafactory`='" . $_POST['Informations_Complémentaires_Datafactory'] . "' WHERE `id_habilitation`= '" . $_POST['id_habilitation'] . "'";
        echo $update_commentaire2;
        $result_commentaire2 = $bdd->query($update_commentaire2);
        $_SESSION["test$variable2"] = "2";
        echo $_SESSION["test$variable2"];
        echo $variable2;
    } else {
        $_SESSION["test$variable2"] = "Changement2";
        echo $_SESSION["test$variable2"];
    }
}

// Modification du champs commentaire lorsque "pole" vaut RSI
elseif ($_SESSION["Pole"] == "RSI") {

    $variable = $_POST["variable"];
    if ($_POST["modification"] == "ok") {
        echo $_POST['Informations_Complémentaires_RSI'];
        $update_commentaire = "UPDATE `fiche_nav_etat_habilitation` SET `Informations_Complémentaires_RSI`='" . $_POST['Informations_Complémentaires_RSI'] . "' WHERE `id_habilitation`= '" . $_POST['id_habilitation'] . "'";
        echo $update_commentaire;
        $result_commentaire = $bdd->query($update_commentaire);
        $_SESSION["test$variable"] = "2";
        echo $_SESSION["test$variable"];
        echo $variable;
    } else {
        $_SESSION["test$variable"] = "Changement";
        echo $_SESSION["test$variable"];
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
</form>