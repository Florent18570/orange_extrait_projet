<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title> E-TECH </title>
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
                HABILITATION E-TECH </p>
        </div>
    </div>
</section>

<br><br>


<form name="formulaire" method="POST" action="tampon.php">
    <input type="hidden" name="tampon" value="E-TECH">
    <input type="hidden" name="Application" value="E-TECH">
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
                <td> <select name="Profils">
                        <option value="">Complétez ici</option>
                        <option value="Aquitaine">Aquitaine</option>
                        <option value="LPC">LPC</option>
                        <option>Aquitaine +LPC</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label class="required">Trigramme GPC</label> </td>
                <td>
                    <input type="text" name="Trigramme_GPC">
                </td>
            </tr>

            <tr>
                <td><label class="required">Fonction</label> </td>
                <td> <select name="SAVOIR">
                        <option value="">Complétez ici</option>
                        <option value="Administrateur_local">Administrateur local</option>
                        <option value="Pilote_d\'activité">Pilote d'activité</option>
                        <option value="Technicien">Technicien</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label class="required"> Groupe/Manager</label> </td>
                <td>
                    <input type="text" name="Groupe_Manager">
                </td>
            </tr>

            <tr>
                <td><label class="required">Matrices</label> </td>
                <td> <select name="Matrices">
                        <option value="">Complétez ici</option>
                        <option value="E">E</option>
                        <option value="GP_BL">GP/BL</option>
                        <option value="RS_FTTH">RS/FTTH</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label class="required">Nombre d'OT communicables</label> </td>
                <td> <select name="OT">
                        <option value="3">3</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
            </tr>

        <?php } else {

        $sql20 = "SELECT * FROM `fiche_nav_e-tech` WHERE `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
        // echo $sql20;
        $result20 = $bdd->query($sql20);

        $sql21 = "SELECT * FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'E-TECH' and `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
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
                            <td> <select name="Profils">
                                    <option class="pink"> <?php echo $evenement20['Profils'] ?></option>
                                    <option value="Aquitaine">Aquitaine</option>
                                    <option value="LPC">LPC</option>
                                    <option>Aquitaine + LPC</option>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td><label class="required">Trigramme GPC</label> </td>
                            <td>
                                <input type="text" name="Trigramme_GPC" value=" <?php echo $evenement20['Trigramme_GPC'] ?>">
                            </td>
                        </tr>

                        <tr>
                            <td><label class="required">Fonction</label> </td>
                            <td> <select name="SAVOIR">
                                    <option class="pink"> <?php echo $evenement20['SAVOIR'] ?></option>
                                    <option value="Administrateur_local">Administrateur local</option>
                                    <option value="Pilote_d\'activité">Pilote d'activité</option>
                                    <option value="Technicien">Technicien</option>

                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td><label class="required"> Groupe/Manager</label> </td>
                            <td>
                                <input type="text" name="Groupe_Manager" value=" <?php echo $evenement20['Groupe_Manager'] ?>">
                            </td>
                        </tr>

                        <tr>
                            <td><label class="required">Matrices</label> </td>
                            <td> <select name="Matrices">
                                    <option class="pink"> <?php echo $evenement20['Matrices'] ?></option>
                                    <option value="E">E</option>
                                    <option value="GP_BL">GP/BL</option>
                                    <option value="RS_FTTH">RS/FTTH</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><label class="required">Nombre d'OT communicables</label> </td>
                            <td> <select name="OT">
                                    <option class="pink"> <?php echo $evenement20['OT'] ?></option>>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </td>
                        </tr>

            <?php
                }
            }
        }

        // récupération de la fonction qui permet d'envoyé ou de récupérer un commentaire
        require 'champ_commentaire_suppl.php'; ?>

            <a href="javascript:history.go(-1)">
                <button class="button is-link is-focused" style="margin-left: 40%">Sauvegarder</button></a>
            <?php

            $sql11 = "SELECT `id_habilitation` FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'E-TECH'";
            //  echo $sql11;
            $result11 = $bdd->query($sql11);


            while ($evenement11 = $result11->fetch()) {
                $id_habilitation = $evenement11["id_habilitation"];
            ?>
                <input type="hidden" id="id_habilitation" name="id_habilitation" value="<?php echo $id_habilitation ?>">

            <?php 
        } ?>

</form>

<br><br>