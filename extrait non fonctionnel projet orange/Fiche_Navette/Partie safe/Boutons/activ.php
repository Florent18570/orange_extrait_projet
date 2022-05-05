<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title> ACTIV</title>
    <link rel="stylesheet" href="../modification_habilitation.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
</head>

<?php
require '../modification_habilitation.php';
$banniere = "1";

$sql_utilisateur_outil = "SELECT * FROM `fiche_nav_utilisateurs_outils`  ";
// echo $sql_utilisateur_outil;
$result_utilisateur_outil = $bdd->query($sql_utilisateur_outil); ?>

?>


<section class="hero is-dark">
    <div class="hero-body">
        <div class="container">
            <p class="title">
                Habilitation ACTIV-TACT-IMMOLINE-VICTOR-DEVISEUR
            </p>
        </div>
    </div>
</section>

<br><br>

<form name="formulaire" method="POST" action="tampon.php">
    <!-- Variable à récupérer en POST pour la page tampon. -->
    <input type="hidden" name="tampon" value="ACTIV">
    <input type="hidden" name="Application" value="ACTIV">

    <input type="hidden" id="adresse_postale" name="adresse_postale">
    <input type="hidden" id="Profils" name="Profils">
    <input type="hidden" id="IMMOLINE" name="IMMOLINE">
    <input type="hidden" id="SAVOIR" name="SAVOIR">
    <input type="hidden" id="TACT" name="TACT">
    <input type="hidden" id="VICTOR" name="VICTOR">
    <input type="hidden" id="Deviseur" name="Deviseur">
    <input type="hidden" id="Signataire" name="Signataire">
    <input type="hidden" id="Domage" name="Domage">
    <input type="hidden" id="Creation_par" name="Creation_par">

    <?php

    if ($_POST['information'] != "historique") {
    ?>
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
                <td><label>Adresse Postale</label></td>
                <td> <input type="text" class="button" placeholder="Saisir l'adresse postale" name=adresse_postale></td>
            </tr>
            <tr>
                <td><label class="required">Profils</label></td>
                <td> <select name="Profils" class="button">
                        <option value="">Complétez ici</option>
                        <option value="Aquitaine">Aquitaine</option>
                        <option value="LPC">LPC</option>
                        <option value="Aquitaine_LPC">Aquitaine + LPC</option>

                    </select>
                </td>
            </tr>

            <tr>
                <td><label class="required">IMMOLINE</label> </td>
                <td> <select name="IMMOLINE" class="button">
                        <option value="">Complétez ici</option>
                        <option value="Sans">Sans</option>
                        <option value="Consultation">Consultation</option>
                        <option value="Modification">Modification</option>
                        <option value="Consultation">Alertes</option>
                        <option value="Super-Utilisateur">Super-Utilisateur</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label class="required">SAVOIR</label> </td>
                <td> <select name="SAVOIR" class="button">
                        <option value="">Complétez ici</option>
                        <option value="Sans">Sans</option>
                        <option value="Consultation">Consultation</option>
                        <option value="Modification">Modification</option>
                        <option value="Consultation">Alertes</option>
                        <option value="Super-Utilisateur">Super-Utilisateur</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label class="required">TACT</label> </td>
                <td> <select name="TACT" class="button">
                        <option value="">Complétez ici</option>
                        <option value="Sans">Sans</option>
                        <option value="Consultation">Consultation</option>
                        <option value="Modification">Modification</option>
                        <option value="Consultation">Alertes</option>
                        <option value="Super-Utilisateur">Super-Utilisateur</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label class="required">VICTOR</label> </td>
                <td> <select name="VICTOR" class="button">
                        <option value="">Complétez ici</option>
                        <option value="Sans">Sans</option>
                        <option value="Consultation">Consultation</option>
                        <option value="Modification">Modification</option>
                        <option value="Consultation">Alertes</option>
                        <option value="Super-Utilisateur">Super-Utilisateur</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label class="required">Deviseur</label> </td>
                <td> <select name="Deviseur" class="button">
                        <option value="">Complétez ici</option>
                        <option value="Sans">Sans</option>
                        <option value="Consultation">Consultation</option>
                        <option value="Modification">Modification</option>
                        <option value="Consultation">Alertes</option>
                        <option value="Super-Utilisateur">Super-Utilisateur</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label class="required">Signataire</label> </td>
                <td> <select name="Signataire" class="button">
                        <option value="">Complétez ici</option>
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label class="required">"@Domage"</label> </td>
                <td> <select name="Domage" class="button">
                        <option value="">Complétez ici</option>
                        <option>Sans</option>
                        <option>Pole Dommage</option>
                        <option>Correspondance Local Dommage</option>
                        <option> Responsable de groupe</option>
                        <option> ContRôleur technique terrain</option>
                    </select>
                </td>
            </tr>

            <br><br>

            <?php
        } else {
            $sql20 = "SELECT * FROM `fiche_nav_activ` WHERE `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
            // echo $sql20;
            $result20 = $bdd->query($sql20);

            $sql21 = "SELECT * FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'ACTIV' and `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
            // echo $sql21;
            $result21 = $bdd->query($sql21);

            while ($evenement20 = $result20->fetch()) {
                while ($evenement21 = $result21->fetch()) {
            ?>

                    <style>
                        .pink {
                            background-color: pink;
                        }
                    </style>

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
                        </select>
                        </td>
                    </table>

                    <!-- ################################################################################################# -->

                    <table class="table is-responsive" style="margin-left: 10%;margin-bottom: 100px">
                        <tr>
                            <td><label>Adresse Postale</label></td>
                            <td> <input type="text" class="button" placeholder="Saisir l'adresse postale" name="adresse_postale" value=" <?php echo $evenement20['adresse_postale'] ?>"></td>
                        </tr>
                        <tr>
                            <td><label class="required">Profils</label></td>
                            <td> <select name="Profils" class="button">
                                    <option class="pink"> <?php echo $evenement20['Profils'] ?></option>
                                    <option value="Aquitaine">Aquitaine</option>
                                    <option value="LPC">LPC</option>
                                    <option value="Aquitaine_LPC">Aquitaine + LPC</option>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td><label class="required">IMMOLINE</label> </td>
                            <td> <select name="IMMOLINE" class="button">
                                    <option class="pink"> <?php echo $evenement20['IMMOLINE'] ?></option>
                                    <option value="Sans">Sans</option>
                                    <option value="Consultation">Consultation</option>
                                    <option value="Modification">Modification</option>
                                    <option value="Consultation">Alertes</option>
                                    <option value="Super-Utilisateur">Super-Utilisateur</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><label class="required">SAVOIR</label> </td>
                            <td> <select name="SAVOIR" class="button">
                                    <option class="pink"> <?php echo $evenement20['SAVOIR'] ?></option>
                                    <option value="Sans">Sans</option>
                                    <option value="Consultation">Consultation</option>
                                    <option value="Modification">Modification</option>
                                    <option value="Consultation">Alertes</option>
                                    <option value="Super-Utilisateur">Super-Utilisateur</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><label class="required">TACT</label> </td>
                            <td> <select name="TACT" class="button">
                                    <option class="pink"> <?php echo $evenement20['TACT'] ?></option>
                                    <option value="Sans">Sans</option>
                                    <option value="Consultation">Consultation</option>
                                    <option value="Modification">Modification</option>
                                    <option value="Consultation">Alertes</option>
                                    <option value="Super-Utilisateur">Super-Utilisateur</option>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td><label class="required">VICTOR</label> </td>
                            <td> <select name="VICTOR" class="button">
                                    <option class="pink"> <?php echo $evenement20['VICTOR'] ?></option>
                                    <option value="Sans">Sans</option>
                                    <option value="Consultation">Consultation</option>
                                    <option value="Modification">Modification</option>
                                    <option value="Consultation">Alertes</option>
                                    <option value="Super-Utilisateur">Super-Utilisateur</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><label class="required">Deviseur</label> </td>
                            <td> <select name="Deviseur" class="button">
                                    <option class="pink"> <?php echo $evenement20['Deviseur'] ?></option>
                                    <option value="Sans">Sans</option>
                                    <option value="Consultation">Consultation</option>
                                    <option value="Modification">Modification</option>
                                    <option value="Consultation">Alertes</option>
                                    <option value="Super-Utilisateur">Super-Utilisateur</option>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td><label class="required">Signataire</label> </td>
                            <td> <select name="Signataire" class="button">
                                    <option class="pink"> <?php echo $evenement20['Signataire'] ?></option>
                                    <option value="Oui">Oui</option>
                                    <option value="Non">Non</option>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td><label class="required">"@Domage"</label> </td>
                            <td> <select name="Domage" class="button">
                                    <option class="pink"> <?php echo $evenement20['Domage'] ?></option>
                                    <option>Sans</option>
                                    <option>Pole Dommage</option>
                                    <option>Correspondance Local Dommage</option>
                                    <option> Responsable de groupe</option>
                                    <option> ContRôleur technique terrain</option>
                                </select>
                            </td>
                        </tr>
            <?php
                }
            }
        }  ?>


            <a href="javascript:history.go(-1)">
                <button class="button is-link is-focused" style="margin-left: 40%">Sauvegarder</button></a>

            <?php
            $sql11 = "SELECT `id_habilitation` FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'ACTIV' and `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
            //  echo $sql11;
            $result11 = $bdd->query($sql11);
            $num_of_rows = $result11->rowCount();
            // echo $num_of_rows;

            if ($num_of_rows != 0) {
                while ($evenement11 = $result11->fetch()) {
                    // echo $evenement11["id_habilitation"];
                    $id_habilitation = $evenement11["id_habilitation"];
            ?><input type="hidden" id="id_habilitation" name="id_habilitation" value="<?php echo $id_habilitation ?>"><?php
                                                                                                                    }
                                                                                                                } ?><script>
                var back = localStorage.getItem('page_precedente');

                if (back === "back") {
                    localStorage.removeItem('page_precedente');
                    localStorage.setItem('page_precedente', '0');
                    javascript: history.back();

                }
            </script><?php require 'champ_commentaire_suppl.php'; ?>
</form>