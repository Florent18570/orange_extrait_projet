<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title> PIDI </title>
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
                HABILITATION PIDI </p>
        </div>
    </div>
</section>

<br><br>

<form name="formulaire" method="POST" action="tampon.php">

    <input type="hidden" name="tampon" value="PIDI">
    <input type="hidden" name="Application" value="PIDI">
    <input type="hidden" name="Demande_habilitation" value="Demande_habilitation">


    <?php if ($_POST['information'] != "historique") { ?>

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
                        <option value="Oui">Oui</option>

                    </select>
                </td>
            </tr>


        <?php } else {


        $sql20 = "SELECT * FROM `fiche_nav_PIDI` WHERE `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
        // echo $sql20;
        $result20 = $bdd->query($sql20);

        $sql21 = "SELECT * FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'PIDI' and `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
        // echo $sql21;
        $result21 = $bdd->query($sql21);
        ?>
            <style>
                .pink {
                    background-color: pink;
                }
            </style>


            <?php

            while ($evenement20 = $result20->fetch()) {
                while ($evenement21 = $result21->fetch()) { ?>

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
                                    <option class="pink"> <?php echo $evenement20['Demande_habilitation'] ?></option>
                                    <option value="Oui">Oui</option>

                                </select>
                            </td>
                        </tr>

            <?php }
            }
        } ?>



            <?php require 'champ_commentaire_suppl.php'; ?>

            <a href="javascript:history.go(-1)">
                <button class="button is-link is-focused" style="margin-left: 40%">Sauvegarder</button></a>


            <?php

            $sql11 = "SELECT `id_habilitation` FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'PIDI' AND `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
            // echo $sql11;
            $result11 = $bdd->query($sql11);

            $num_of_rows = $result11->rowCount();
            // echo $num_of_rows;

            if ($num_of_rows != 0) {


                while ($evenement11 = $result11->fetch()) {

                    // echo $evenement11["id_habilitation"];
                    $id_habilitation = $evenement11["id_habilitation"];
            ?>
                    <input type="hidden" id="id_habilitation" name="id_habilitation" value="<?php echo $id_habilitation ?>">
            <?php
                }
            } ?>

</form>





</script>