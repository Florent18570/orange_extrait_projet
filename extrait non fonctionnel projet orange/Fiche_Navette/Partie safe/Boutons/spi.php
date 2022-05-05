<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title> SPI </title>
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
                HABILITATION SPI </p>
        </div>
    </div>
</section>

<br><br>

<form name="formulaire" method="POST" action="tampon.php">

    <input type="hidden" name="tampon" value="SPI">
    <input type="hidden" name="Application" value="SPI">

    <input type="hidden" name="Creation_par" value="Creation_par">
    <input type="hidden" name="UI" value="UI">
    <input type="hidden" name="Role" value="Role">
    <input type="hidden" name="Information_complémentaire" value="Information_complémentaire">


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
                <td><label class="required">UI</label></td>
                <td> <select name="UI">
                        <option value="">Complétez ici</option>
                        <option value="Aquitaine">Aquitaine</option>
                        <option value="LPC">LPC</option>
                        <option value="Aquitaine_LPC">Aquitaine + LPC</option>
                    </select>
                </td>
            </tr>



            <tr>
                <td><label class="required">Role</label></td>
                <td> <select name="Role">
                        <option value="">Complétez ici</option>
                        <option value="CAFF">CAFF</option>
                        <option value="CDP_CEM">CDP CEM</option>
                        <option value="ETR">ETR</option>
                        <option value="GDC">GDC</option>
                        <option value="PBLO">PBLO</option>
                        <option value="RESP_CAFF">RESP CAFF</option>
                        <option value="RESP PBLO">RESP PBLO</option>
                    </select>
                </td>
            </tr>


        <?php } else {


        $sql20 = "SELECT * FROM `fiche_nav_SPI` WHERE `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
        // echo $sql20;
        $result20 = $bdd->query($sql20);

        $sql21 = "SELECT * FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'SPI' and `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
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
                            <td> <select name="UI">
                                    <option class="pink"> <?php echo $evenement20['UI'] ?></option>
                                    <option value="Aquitaine">Aquitaine</option>
                                    <option value="LPC">LPC</option>
                                    <option value="Aquitaine_LPC">Aquitaine + LPC</option>
                                </select>
                            </td>
                        </tr>



                        <tr>
                            <td><label class="required">Role</label></td>
                            <td> <select name="Role">
                                    <option class="pink"> <?php echo $evenement20['Role'] ?></option>
                                    <option value="CAFF">CAFF</option>
                                    <option value="CDP_CEM">CDP CEM</option>
                                    <option value="ETR">ETR</option>
                                    <option value="GDC">GDC</option>
                                    <option value="PBLO">PBLO</option>
                                    <option value="RESP_CAFF">RESP CAFF</option>
                                    <option value="RESP PBLO">RESP PBLO</option>
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

            $sql11 = "SELECT `id_habilitation` FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'SPI' AND `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
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