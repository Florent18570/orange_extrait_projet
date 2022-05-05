<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title> GPC </title>
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
                Habilitation GPC
            </p>
        </div>
    </div>
</section>

<br><br>

<form name="formulaire" method="POST" action="tampon.php">

    <!-- Variable à récupérer en POST pour la page tampon. -->
    <input type="hidden" name="tampon" value="GPC">
    <input type="hidden" name="Application" value="GPC">

    <input type="hidden" id="Creation_par" name="Creation_par">
    <input type="hidden" id="Profils" name="Profils">
    <input type="hidden" id="Type_Utilisateur" name="Type_Utilisateur">
    <input type="hidden" id="Demande_habilitation" name="Demande_habilitation">
    <input type="hidden" id="Profil_Similaire" name="Profil_Similaire">
    <input type="hidden" id="Profil_Technicien" name="Profil_Technicien">
    <input type="hidden" id="Information_complémentaire" name="Information_complémentaire">


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
                    <select name="Profils">
                        <option value="">Complétez ici</option>
                        <option value="Aquitaine">Aquitaine</option>
                        <option value="LPC">LPC</option>
                        <option value="Aquitaine_LPC">Aquitaine + LPC</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label class="required">Type Utilisateur</label>
                 </td>
                <td>
                    <select name="Type_Utilisateur">
                        <option value="">Complétez ici</option>
                        <option value="CA">CA</option>
                        <option value="Technicien_d\'intervention">Technicien d'intervention</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label class="required">Demande habilitation pour conducteur activite</label> 
                </td>
                <td> 
                    <select name="Demande_habilitation">
                        <option value="">Complétez ici</option>
                        <option value="CA RG Intervention">CA RG Intervention</option>
                        <option value="CA Soutien">CA Soutien</option>
                        <option value="CA Responsable , Autre">CA Responsable , Autre</option>
                        <option value="CA standard">CA standard</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label class="required">Profil Similaire à</label> 
                </td>
                <td>
                    <input type="text" name="Profil_Similaire">
                </td>
            </tr>

            <tr>
                <td>
                    <label class="required">Profil Technicien</label>
                </td>
                <td> 
                    <select name="Profil_Technicien">
                        <option value="">Complétez ici</option>
                        <option value="E">E</option>
                        <option value="RS">RS</option>
                        <option value="GP">GP</option>
                    </select>
                </td>
            </tr>


        <?php } else {

        $sql20 = "SELECT * FROM `fiche_nav_GPC` WHERE `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
        // echo $sql20;
        $result20 = $bdd->query($sql20);

        $sql21 = "SELECT * FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'GPC' and `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
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
                                <label class="required">Profils</label>
                            </td>
                            <td> 
                                <select name="Profils">
                                    <option class="pink"> <?php echo $evenement20['Profils'] ?></option>
                                    <option value="Aquitaine">Aquitaine</option>
                                    <option value="LPC">LPC</option>
                                    <option value="Aquitaine_LPC">Aquitaine + LPC</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="required">Type Utilisateur</label> 
                            </td>
                            <td>
                                 <select name="Type_Utilisateur">
                                    <option class="pink"> <?php echo $evenement20['Type_Utilisateur'] ?></option>
                                    <option value="CA">CA</option>
                                    <option value="Technicien_d\'intervention">Technicien d'intervention</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="required">Demande habilitation pour conducteur activite</label>
                             </td>
                            <td>
                                 <select name="Demande_habilitation">
                                    <option class="pink"> <?php echo $evenement20['Demande_habilitation'] ?></option>
                                    <option value="CA RG Intervention">CA RG Intervention</option>
                                    <option value="CA Soutien">CA Soutien</option>
                                    <option value="CA Responsable , Autre">CA Responsable , Autre</option>
                                    <option value="CA standard">CA standard</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="required">Profil Similaire à</label>
                            </td>
                            <td>
                                <input type="text" name="Profil_Similaire" value="<?php echo $evenement20['Profil_Similaire'] ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="required">Profil Technicien</label>
                            </td>

                            <td>
                                <select name="Profil_Technicien">
                                    <option class="pink"> <?php echo $evenement20['Profil_Technicien'] ?></option>
                                    <option value="E">E</option>
                                    <option value="RS">RS</option>
                                    <option value="GP">GP</option>
                                </select>
                            </td>
                        </tr>
            <?php }
            }
        } ?>

            <a href="javascript:history.go(-1)">
                <button class="button is-link is-focused" style="margin-left: 40%">Sauvegarder</button>
            </a>

            <?php

            $sql11 = "SELECT `id_habilitation` FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'GPC'";
            //  echo $sql11;
            $result11 = $bdd->query($sql11);


            while ($evenement11 = $result11->fetch()) {
                $id_habilitation = $evenement11["id_habilitation"];
            ?>
                <input type="hidden" id="id_habilitation" name="id_habilitation" value="<?php echo $id_habilitation ?>">
            <?php
            } ?>


            <script>
                var back = localStorage.getItem('page_precedente');

                if (back === "back") {
                    localStorage.removeItem('page_precedente');
                    localStorage.setItem('page_precedente', '0');
                    javascript: history.back();

                }
            </script>


            <?php require 'champ_commentaire_suppl.php'; ?>


            <?php
            $sql11 = "SELECT `id_habilitation` FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'GPC' AND `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
            // echo $sql11;
            $result11 = $bdd->query($sql11);

            $num_of_rows = $result11->rowCount();
            // echo $num_of_rows;


            if ($num_of_rows != 0) {
                while ($evenement11 = $result11->fetch()) {
                    $id_habilitation = $evenement11["id_habilitation"];
            ?>
                    <input type="hidden" id="id_habilitation" name="id_habilitation" value="<?php echo $id_habilitation ?>">
            <?php
                }
            } ?>

</form>

<br> <br>