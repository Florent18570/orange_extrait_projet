<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title> ACTIV</title>
    <link rel="stylesheet" href="../modification_habilitation.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
</head>

<?php require '../modification_habilitation.php';
$banniere = "1";
$sql_utilisateur_outil = "SELECT * FROM `fiche_nav_utilisateurs_outils`  ";
// echo $sql_utilisateur_outil;
$result_utilisateur_outil = $bdd->query($sql_utilisateur_outil); 
?>


<section class="hero is-dark">
    <div class="hero-body">
        <div class="container">
            <p class="title">
                HABILITATION AUTODOC </p>
        </div>
    </div>
</section>

<br><br>

<form name="formulaire" method="POST" action="tampon.php">

    <input type="hidden" name="tampon" value="AUTODOC">
    <input type="hidden" name="Application" value="AUTODOC">
    <input type="hidden" name="Demande_habilitation" value="Demande_habilitation">

    <?php
    if ($_POST['information'] != "historique") { ?>

        <!-- Tableau des membres pouvant créé des demandes d'habilitations -->
        <table class="table is-responsive" style="margin-left: 10%;margin-bottom: 100px">
            <td><label>Création par:</label> </td>
            <td> 
                <select name="Creation_par" class="button">
                    <option value="">Complétez ici</option>
                        <?php 
                        while ($evenement_utilisateur_outil = $result_utilisateur_outil->fetch()) { ?>
                        <option><?php echo $evenement_utilisateur_outil["Utilisateur_RSI"]; ?></option>
                        <?php } ?>
                    </select>
                </select>
            </td>
        </table>

        <!-- ################################################################################################# -->

        <table class="table is-responsive" style="margin-left: 10%;margin-bottom: 100px">
            <tr>
                <td><label class="required">Demande habilitation</label></td>
                <td> <select name="Demande_habilitation">
                        <option value="">Complétez ici</option>
                        <option value="Aquitaine">Oui</option>
                    </select>
                </td>
            </tr>
        <?php } else { ?>


            <!-- Tableau des membres pouvant créé des demandes d'habilitations -->
            <table class="table is-responsive" style="margin-left: 10%;margin-bottom: 100px">
                <td><label>Création par:</label> </td>
                <td>
                            <select class="button" name="Creation_par">
                                <option class="pink"> <?php echo $evenement21['créé_par'] ?></option>
                                <?php
                                while ($evenement_utilisateur_outil = $result_utilisateur_outil->fetch()) { ?>
                                    <option><?php echo $evenement_utilisateur_outil["Utilisateur_RSI"]; ?></option>
                                <?php } ?>
                            </select>
                        </td>
            </table>

            <!-- ################################################################################################# -->



            <table class="table is-responsive" style="margin-left: 10%;margin-bottom: 100px">
                <tr>
                    <td><label class="required">Demande habilitation</label></td>
                    <td> <select name="Demande_habilitation">
                            <option value="">Complétez ici</option>
                            <option value="Aquitaine">Oui</option>
                        </select>
                    </td>
                </tr>
            <?php } ?>

            <?php require 'champ_commentaire_suppl.php'; ?>


            <a href="javascript:history.go(-1)">
                <button class="button is-link is-focused" style="margin-left: 40%">Sauvegarder</button></a>
</form>

<br>
<br>