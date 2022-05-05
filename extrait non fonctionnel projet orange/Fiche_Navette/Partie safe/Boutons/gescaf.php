<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title> GESCAF</title>
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
                HABILITATION GESCAF
            </p>
        </div>
    </div>
</section>

<br><br>

<form name="formulaire" method="POST" action="tampon.php">
    <input type="hidden" name="tampon" value="GESCAF">
    <input type="hidden" name="Application" value="GESCAF">
    <input type="hidden" name="UI" value="UI">
    <input type="hidden" name="Profil" value="Profil">
    <input type="hidden" name="CODE_GDP" value="CODE_GDP">
    <input type="hidden" name="Profil_supplémentaire" value="Profil_supplémentaire">

    <?php if ($_POST['information'] != "historique") { ?>
        <!-- Tableau des membres pouvant créé des demandes d'habilitations -->

        <table class="table is-responsive" style="margin-left: 10%;margin-bottom: 100px">
            <td>
                <label>Création par:</label> 
            </td>
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
                <td>
                    <label class="required">UI</label>
                </td>
                <td> 
                    <select name="UI">
                        <option value="">Complétez ici</option>
                        <option value="Aquitaine">Aquitaine</option>
                        <option value="LPC">LPC</option>
                        <option>Aquitaine + LPC</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label class="required">Profil</label>
                </td>
                <td> 
                    <select name="Profil">
                        <option value="">Complétez ici</option>
                        <option value="Administrateur_local">Administrateur local</option>
                        <option value="Caff">Caff</option>
                        <option value="Manager_Caff">Manager Caff</option>
                        <option value="Manager_de_pilotes">Manager de pilotes</option>
                        <option value="Pilote_de_production">Pilote de production</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label class="required"> CODE GDP </label> 
                </td>

                <td>
                    <input type="text" name="CODE_GDP">
                </td>
            </tr>


            <tr>
                <td>
                    <label class="required">Profil supplémentaire</label>
                </td>
                <td> 
                    <select name="Profil_supplémentaire">
                        <option value="">Complétez ici</option>
                        <option value="Administrateur_local">Administrateur local</option>
                        <option value="Caff">Caff</option>
                        <option value="Manager_Caff">Manager Caff</option>
                        <option value="Manager_de_pilotes">Manager de pilotes</option>
                        <option value="Pilote_de_production">Pilote de production</option>
                    </select>
                </td>
            </tr>


        <?php } else {

        $sql20 = "SELECT * FROM `fiche_nav_GESCAF` WHERE `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
        // echo $sql20;
        $result20 = $bdd->query($sql20);

        $sql21 = "SELECT * FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'GESCAF' and `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
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
                    <table class="table is-responsive" style="margin-left: 10%;margin-bottom: 100px">
                        <td>
                            <label>Création par:</label>
                         </td>
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
                            <td>
                                <label class="required">UI</label>
                            </td>
                            <td> 
                                <select name="UI">
                                    <option class="pink"> <?php echo $evenement20['UI'] ?></option>
                                    <option value="Aquitaine">Aquitaine</option>
                                    <option value="LPC">LPC</option>
                                    <option>Aquitaine + LPC</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="required">Profil</label>
                            </td>
                            <td> 
                                <select name="Profil">
                                    <option class="pink"> <?php echo $evenement20['Profil'] ?></option>
                                    <option value="Administrateur_local">Administrateur local</option>
                                    <option value="Caff">Caff</option>
                                    <option value="Manager_Caff">Manager Caff</option>
                                    <option value="Manager_de_pilotes">Manager de pilotes</option>
                                    <option value="Pilote_de_production">Pilote de production</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="required"> CODE GDP </label> 
                            </td>

                            <td>
                                <input type="text" name="CODE_GDP" value=" <?php echo $evenement20['CODE_GDP'] ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="required">Profil supplémentaire</label>
                            </td>
                            <td>
                                <select name="Profil_supplémentaire">
                                    <option class="pink"> <?php echo $evenement20['Profil_supplémentaire'] ?></option>
                                    <option value="Administrateur_local">Administrateur local</option>
                                    <option value="Caff">Caff</option>
                                    <option value="Manager_Caff">Manager Caff</option>
                                    <option value="Manager_de_pilotes">Manager de pilotes</option>
                                    <option value="Pilote_de_production">Pilote de production</option>
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

            $sql11 = "SELECT `id_habilitation` FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'GESCAF' AND `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
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