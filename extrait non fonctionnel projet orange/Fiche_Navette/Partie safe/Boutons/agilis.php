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
                HABILITATION AGILIS - PORTAFFAIRES </p>
        </div>
    </div>
</section>

<br><br>

<form name="formulaire" method="POST" action="tampon.php">

    <input type="hidden" name="tampon" value="AGILIS">
    <input type="hidden" name="Application" value="AGILIS">

    <input type="hidden" id="adresse_postale" name="adresse_postale">
    <input type="hidden" id="UI" name="UI">
    <input type="hidden" id="Domaine" name="Domaine">
    <input type="hidden" id="Type_Caff" name="Type_Caff">
    <input type="hidden" id="CUID_manager" name="CUID_manager">
    <input type="hidden" id="Creation_par" name="Creation_par">

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
                <td><label class="required">UI</label></td>
                <td> <select class="button" name="UI">
                        <option value="">Complétez ici</option>
                        <option value="Aquitaine">Aquitaine</option>
                        <option value="LPC">LPC</option>
                        <option value="Aquitaine_LPC">Aquitaine + LPC</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label class="required">Domaine</label> </td>
                <td> <select class="button" name="Domaine">
                        <option value="">Complétez ici</option>
                        <option value="Production">Production</option>
                        <option value="FTTH">FTTH</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="RQF">RQF</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label class="required">Type Caff</label> </td>
                <td> <select class="button" name="Type_Caff">
                        <option value="">Complétez ici</option>
                        <option value="Internal">Internal</option>
                        <option value="External">External</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label class="required">CUID Manager</label> </td>
                <td>
                    <input class="button" type="text" name="CUID_manager">
                </td>
            </tr>

        <?php } else {

        $sql20 = "SELECT * FROM `fiche_nav_agilis_portaffaire` WHERE `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
        // echo $sql20;
        $result20 = $bdd->query($sql20);

        $sql21 = "SELECT * FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'AGILIS' and `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
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
                            <td><label class="required">UI</label></td>
                            <td> <select class="button" name="UI">
                                    <option class="pink"> <?php echo $evenement20['UI'] ?> </option>
                                    <option value="Aquitaine">Aquitaine</option>
                                    <option value="LPC">LPC</option>
                                    <option value="Aquitaine_LPC">Aquitaine + LPC</option>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td><label class="required">Domaine</label> </td>
                            <td> <select class="button" name="Domaine">
                                    <option class="pink"> <?php echo $evenement20['Domaine'] ?></option>
                                    <option value="Production">Production</option>
                                    <option value="FTTH">FTTH</option>
                                    <option value="Maintenance">Maintenance</option>
                                    <option value="RQF">RQF</option>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td><label class="required">Type Caff</label> </td>
                            <td> <select class="button" name="Type_Caff">
                                    <option class="pink"> <?php echo $evenement20['Type_Caff'] ?></option>
                                    <option value="Internal">Internal</option>
                                    <option value="External">External</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><label class="required">CUID Manager</label> </td>
                            <td>
                                <input class="button" type="text" name="CUID_manager" value=" <?php echo $evenement20['CUID_manager'] ?>">
                            </td>
                        </tr>

                        }




















                    <?php } ?>


                    <br>
                    <br>

            <?php }
        } ?>


            <a href="javascript:history.go(-1)">
                <button class="button is-link is-focused" style="margin-left: 40%">Sauvegarder</button></a>


            <?php
            $sql11 = "SELECT `id_habilitation` FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'AGILIS' and `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
            //  echo $sql11;
            $result11 = $bdd->query($sql11);
            while ($evenement11 = $result11->fetch()) {
                $id_habilitation = $evenement11["id_habilitation"];
            } ?>
            <input type="hidden" id="id_habilitation" name="id_habilitation" value="<?php echo $id_habilitation ?>">



            <?php require 'champ_commentaire_suppl.php'; ?>


</form>