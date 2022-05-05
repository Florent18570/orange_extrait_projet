<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <?php session_start(); ?>
</head>

<script>
    //fonction qui recupère les paramètres de l'URL 
    function $_GET(param) {
        var vars = {};
        window.location.href.replace(location.hash, '').replace(
            /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
            function(m, key, value) { // callback
                vars[key] = value !== undefined ? value : '';
            }
        );
        if (param) {
            return vars[param] ? vars[param] : null;
        }
        return vars;
    }
</script>
</head>


<!--Connexion bdd + Bannière-->
<?php require 'connexion.php';
require 'header.php';

$_SESSION['Identifiant'] = $_GET['Identifiant'] ;

?>



<br>

<table>
    <tr>
        <td>
            <!-- Bouton acceuil / recapitulatif des habilitations -->
            <?php
            $page = basename($_SERVER["PHP_SELF"]); // Variable permettant de différencier les pages pour effectué des liens différents selon le positionnement de la page

            if ($page == "modification_habilitation.php") { ?>
                <a href='accueil.php'> <button class="button is-info" style="font-size: 13px;text-align:center;margin-left: 30px">Accueil</button></a>
                <a href="recap.php"> <button class="button is-info" style="font-size: 13px;text-align:center;margin-left: 30px">Récapitulatif des habilitations</button></a>

            <?php } else { ?>
                <a href='../accueil.php'> <button class="button is-info" style="font-size: 13px;text-align:center;margin-left: 30px">Accueil</button></a>
                <a href="../recap.php"> <button class="button is-info" style="font-size: 13px;text-align:center;margin-left: 30px">Récapitulatif des habilitations</button></a> <?php } ?>
        </td>
    </tr>
</table>

<br><br>

<h4 class="title is-5" style="border:solid"> <br> Veuillez compléter les informations ci-dessous: <br><br> </h4>

<!-- Bande noir -->
<section class="section">
    <div class="columns is-mobile">
        <div class="column is-size-5">
            <p class="has-background-primary">
                <?php
                $page = basename($_SERVER["PHP_SELF"]);
                if ($page == "modification_habilitation.php") { ?>
            <form method="GET" id="formIdUser" action="modification_habilitation.php">
            <?php } else { ?> <form method="GET" id="formIdUser" action="../modification_habilitation.php"> <?php } ?>


                <?php $ev = "";
                if (isset($_GET['Identifiant'])) {  ?>
                    <?php
                    while ($evenement = $result->fetch()) {
                        $ev = $evenement["Identifiant"];
                    }
                }
                if ($ev != "") { ?>
                    <div class="columns" style="font-size: 14px">
                        <div class="column is-6">
                            <label style="margin-left: 5%"> CUID : </label>
                            <!-- Champ permettant de à l'utilisateur de chercher d'écrire un CUID et de savoir si il existe -->
                            <input type="text" name="Identifiant" onchange="document.getElementById('formIdUser').submit()" value="<?php if (!empty($_GET['Identifiant'])) {
                                                                                                                                        echo $_GET['Identifiant'];
                                                                                                                                    } ?>" />
                            <input type="hidden" id="result_deroulant" name="result_deroulant">


                            <br><br><br>

                            <label style="margin-left: 5%">
                                Profil Métier :
                            </label>


                            <select class="button is-small" id="selectmetier" style="margin-left: 5%">
                                <option> Selectionner le profil </option>
                                <?php
                                $result = array();
                                $i = 0;
                                while ($evenement4 = $result4->fetch()) {

                                    //Cette condition permet de supprimer tous ce qui se trouve après 'GRM' et 'GPM' du profil metier.

                                    if (stristr($evenement4["Rôle_Métier"], 'GRM') == TRUE) {
                                        $supp = 'GRM';
                                        $newString = substr($evenement4["Rôle_Métier"], 0, strpos($evenement4["Rôle_Métier"], $supp));
                                        $result[$i] = $newString;
                                        $result2[$i] = $evenement4["Rôle_Métier"];
                                    } elseif (stristr($evenement4["Rôle_Métier"], 'GPM') == TRUE) {
                                        $supp = 'GPM';
                                        $newString = substr($evenement4["Rôle_Métier"], 0, strpos($evenement4["Rôle_Métier"], $supp));
                                        $result[$i] = $newString;
                                        $result2[$i] = $evenement4["Rôle_Métier"];
                                    } else {
                                        $result[$i] = $evenement4["Rôle_Métier"];
                                        $result2[$i] = $evenement4["Rôle_Métier"];
                                    }
                                ?>

                                    <!-- Permet d'afficher et de supprimé les "_" de la chaine "profil metier"
                                            La vrai valeur est concervé dans la "value" de l'option afin d'avoir un affichage des boutons -->

                                    <option value="<?php echo $result2[$i] ?>"> <?php echo str_replace("_", " ", $result[$i]); ?> </option>

                                <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </select>

                            <br><br>

                            <button id="Click" type="submit" onClick="listmultipleresult()" class="button is-small" style="margin-left: 5%">Envoyer</button>

                        </div>




                        <!-- Affichage des champs qui conserne l'utilisateur selectionner avec le CUID -->

                        <div class="column is-2">

                            <?php
                            //Récupération des données des salariés d'Orange
                            $sql = "SELECT * FROM `fiche_nav_personnes` where  `Identifiant`= '" . $_GET['Identifiant'] . "' ";
                            $result = $bdd->query($sql);
                            $ev = "";
                            while ($evenement = $result->fetch()) {
                                $ev = $evenement["Identifiant"]; ?>
                                <p>
                                    <label> Prénom : <br> <input style='width: 130px;' readOnly="readOnly" type="text" class="button is-small" value="<?php echo $evenement['Prénom']; ?>" /></label><br>
                                    <label> Nom : <br> <input style='width: 130px;' readOnly="readOnly" type="text" class="button is-small" value="<?php echo $evenement['Nom']; ?>" /></label><br>
                                    <label> Mobile : <br> <input style='width: 143px;' readOnly="readOnly" type="text" class="button is-small" value="<?php echo $evenement['Mobile']; ?>" /></label><br>
                                </p>
                        </div>
                        <div class="column is-2">
                            <p>
                                <label> Mail : <br><input style='width: 200px;' readOnly="readOnly" type="text" class="button is-small" value="<?php echo $evenement['Mail']; ?>" /></label> </br>
                                <label> ID Responsable :</br><input style='width: 110px;' readOnly="readOnly" type="text" class="button is-small" value="<?php echo $evenement['Responsable']; ?>" /></label>
                                <label></br> Entité :</br><input style='width: 325px;' readOnly="readOnly" type="text" class="button is-small" value="<?php echo $evenement['Affectation_principale']; ?>" /></label>
                            </p>
                        </div>
                    </div>
                <?php }  ?>

                </label>
                <br>

                <?php
                    require 'filtre_list_deroulante.php';
                ?>

                <!-- //Affiche une liste déroulante à choix multiple qui possède la liste des métiers selon de CUID selectionner -->
                <span id="result"> </span>
                <hr />


                </form>

                <?php
                    //Si l'utilisateur à cliqué sur RSI
                    //Affichage d'un bouton notification et Demande de suppression
                    if ($_SESSION["Pole"] == "RSI") { ?>
                    <form method="GET" id="formIdUser">
                        <?php $page = basename($_SERVER["PHP_SELF"]);

                        if ($page == "modification_habilitation.php") { ?>
                            <a class="button is-danger" href="../Partie safe/supression_habilitation.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=Selectionner+le+profil"> Demande de suppression </a>
                        <?php } else { ?>
                            <a class="button is-danger" href="../../Partie safe/supression_habilitation.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=Selectionner+le+profil"> Demande de suppression </a>
                    <?php }
                    } ?>
                    </form>


                    <?php
                    //Si l'utilisateur à cliqué sur Datafactory (safe)
                    //Affichage d'un bouton Suppression

                    if ($_SESSION["Pole"] == "Safe") {
                        if ($page == "modification_habilitation.php") { ?>
                            <a class="button is-danger" href="supression_habilitation.php?Identifiant=<?php echo $_SESSION['Identifiant']; ?>&result_deroulant=Selectionner+le+profil"> Suppression </a>
                        <?php
                        } else { ?>
                            <a class="button is-danger" href="../supression_habilitation.php?Identifiant=<?php echo $_SESSION['Identifiant']; ?>&result_deroulant=Selectionner+le+profil"> Suppression </a>
                        <?php } ?>
                    <?php }  ?>

                    <!-- Affichage du tableau recapitulatif des habilitations par raport à un CUID -->
                    <?php if (isset($_GET['Identifiant'])) { ?>
                        <TABLE align="center" BORDER="1" style="font-size: 16px;width:100%;text-align:center">
                            <CAPTION>Liste des applications à habiliter </CAPTION>
                            <br>

                            <thead style="background-color: #eb7d4d ">
                                <TH align="center">
                                    Habilitation
                                </TH>
                                <TH align="center">
                                    Créée par
                                </TH>
                                <TH align="center">
                                    Date
                                </TH>
                                <TH align="center">
                                    Information Complémentaire RSI
                                </TH>
                                <TH align="center">
                                    Information Complémentaire Safe
                                </TH>
                                <TH align="center">
                                    Prise en charge par
                                </TH>
                                <TH align="center">
                                    Etat
                                </TH>
                            </thead>

                        <?php
                        $tab = 6;
                        $i = 1;
                    }
                        ?>
        </div>

        <!-- Récupétation des informations de la base de données pour remplir le tableau -->
        <!-- Utilisation des requete indiqué quand le Header.php -->
        <TR>
            <?php
                    while ($evenement3 = $result3->fetch()) {
                        if ($evenement3["Application"] != "GDP") {
                            $Application = strtolower($evenement3["Application"]); ?>
                    <?php


                            if ($page == "modification_habilitation.php") { ?>
                        <form method="POST" action="Boutons/<?php echo $Application ?>.php?Identifiant=<?php echo $_GET['Identifiant']; ?>">
                        <?php
                            } else { ?>
                            <form method="POST" action="<?php echo $Application ?>.php?Identifiant=<?php echo $_GET['Identifiant']; ?>">
                            <?php }
                        } else {


                            if ($page == "modification_habilitation.php") { ?>
                                <form method="POST" action="Boutons/historique_gdp.php?Identifiant=<?php echo $_GET['Identifiant']; ?>">
                                <?php
                            } else { ?>
                                    <form method="POST" action="historique_gdp.php?Identifiant=<?php echo $_GET['Identifiant']; ?>">
                                <?php }
                        } ?>
                                <input type="hidden" name="information" value="historique">
                                <input type="hidden" name="Application" name="Application" value='<?php echo $evenement3["Application"] ?>'>

                                <TD align="center">
                                    <input type='submit' class="button is-info" style="font-size: 11px;margin-top:6px;height:100%;width:100%" value=<?php echo $evenement3["Application"] ?> />
                                </TD>

                                    </form>
                                    <TD align="center"> <?php echo $evenement3["créé_par"]; ?> </TD>
                                    <TD align="center"> <?php echo $evenement3["date"]; ?> </TD>

                                    <!-- Ajout d'un commentaire dédier aux RSI -->
                                    <?php
                                    if ($_SESSION["Pole"] == "RSI") {
                                        $variable = $evenement3['id_habilitation'];

                                        if (!isset($_SESSION["test$variable"])) {
                                            $_SESSION["test$variable"] = "Changement";
                                        };


                                        if ($_SESSION["test$variable"] == "Changement") { ?>
                                            <?php
                                            //Requete SQL pour retourner les informations d'un utilisateur
                                            $sql40 = "SELECT * FROM `fiche_nav_etat_habilitation` where  `id_habilitation`= '" . $evenement3['id_habilitation'] . "' ";
                                            $result40 = $bdd->query($sql40);



                                            if ($page == "modification_habilitation.php") { ?>
                                                <form action="commentaires.php" method="POST">
                                                <?php } else { ?>
                                                    <form action="../commentaires.php" method="POST">
                                                    <?php } ?>
                                                    <td align="center">
                                                        <input type="hidden" name="Informations_Complémentaires_RSI">
                                                        <textarea name="Informations_Complémentaires_RSI" rows="5" cols="50"> <?php echo  $evenement3['Informations_Complémentaires_RSI']; ?></textarea>
                                                        <input type="hidden" name="id_habilitation" value="<?php echo $evenement3['id_habilitation']; ?>">
                                                        <input type="hidden" name="modification" value="ok">
                                                        <input type="hidden" name="variable" value=<?php echo $variable ?>>
                                                        <input type="submit" name="submit" class="button is-success" style="height:40px" value="Valider">
    </div>
    </form>
    </td>

    <?php } else {

                                            if ($page == "modification_habilitation.php") { ?>
        <form action="commentaires.php" method="POST">
        <?php } else { ?>
            <form action="../commentaires.php" method="POST">
            <?php } ?>

            <td align="center"> <?php echo $evenement3["Informations_Complémentaires_RSI"]; ?>
                <input type="hidden" name="Informations_Complémentaires_RSI" value="<?php echo $evenement3['Informations_Complémentaires_RSI']; ?>">
                <input type="hidden" name="modifier" value="modifier">
                <input type="hidden" name="modification" value="pas ok">
                <input type="hidden" name="variable" value=<?php echo $variable ?>>
                <input type="hidden" name="id_habilitation" value="<?php echo $evenement3['id_habilitation']; ?>">
                <input type="submit" class="button is-danger" style="font-size: 11px;margin-top:6px;float: right;" value="Modifier">
            </form>
            <?php $variable++; ?>
            </td>

        <?php
                                        }
                                    } else {
        ?>
        <TD align="center"> <?php echo $evenement3['Informations_Complémentaires_RSI']; ?> </TD>
    <?php } ?>



    <?php
                        //Commentaire Dédier aux datafactory (code identique)
                        if ($_SESSION["Pole"] == "Safe") {
                            $variable2 = $evenement3['id_habilitation'];
                            if (!isset($_SESSION["test$variable2"])) {
                                $_SESSION["test$variable2"] = "Changement2";
                            };

                            if ($_SESSION["test$variable2"] == "Changement2") { ?>
            <?php
                                //Requete SQL pour retourner les informations d'un utilisateur
                                $sql40 = "SELECT * FROM `fiche_nav_etat_habilitation` where  `id_habilitation`= '" . $evenement3['id_habilitation'] . "' ";
                                // echo $sql40;
                                $result40 = $bdd->query($sql40);

                                if ($page == "modification_habilitation.php") { ?>
                <form action="commentaires.php" method="POST">
                <?php } else { ?>
                    <form action="../commentaires.php" method="POST">
                    <?php } ?>
                    <td align="center">
                        <input type="hidden" name="Informations_Complémentaires_RSI">
                        <textarea name="Informations_Complémentaires_Datafactory" rows="5" cols="50"> <?php echo  $evenement3['Informations_Complémentaires_Datafactory']; ?></textarea>
                        <input type="hidden" name="id_habilitation" value="<?php echo $evenement3['id_habilitation']; ?>">
                        <input type="hidden" name="modification2" value="ok">
                        <input type="hidden" name="variable2" value=<?php echo $variable2 ?>>
                        <input type="submit" name="submit" class="button is-success" style="font-size: 11px;margin-top:6px;float: right;height:40px" value="Valider"> </div>
                    </form>
                    </td>

                    <?php
                            } else {
                                if ($page == "modification_habilitation.php") { ?>
                        <form action="commentaires.php" method="POST">
                        <?php } else { ?>
                            <form action="../commentaires.php" method="POST">
                            <?php } ?>

                            <td align="center"> <?php echo $evenement3["Informations_Complémentaires_Datafactory"]; ?>
                                <input type="hidden" name="Informations_Complémentaires_Datafactory" value="<?php echo $evenement3['Informations_Complémentaires_Datafactory']; ?>">
                                <input type="hidden" name="modifier2" value="modifier2">
                                <input type="hidden" name="modification2" value="pas ok">
                                <input type="hidden" name="variable2" value=<?php echo $variable2 ?>>
                                <input type="hidden" name="id_habilitation" value="<?php echo $evenement3['id_habilitation']; ?>"> <?php } ?>


                            <input type="submit" class="button is-danger" style="font-size: 11px;margin-top:6px;float: right;" value="Modifier">
                            </form>
                            <?php $variable2++; ?>
                            </td>

                        <?php } else { ?>
                            <TD align="center"> <?php echo $evenement3['Informations_Complémentaires_Datafactory']; ?> </TD>
                        <?php } ?>


                        <!-- Si l'utilisateur est un datafactory(safe) alors il doit inscrire le non de la personne qui à pris en charge l'habilitation -->
                        <?php if ($_SESSION["Pole"] == "Safe") {
                            if ($evenement3["pris_en_charge_par"] == NULL) { ?>
                                <td align="center">
                                    <?php
                                    if ($page == "modification_habilitation.php") { ?>
                                        <form action="ajout_prise_en_charge.php" method="POST">
                                        <?php
                                    } else {
                                        ?>
                                            <form action="../ajout_prise_en_charge.php" method="POST">
                                            <?php } ?>

                                            
    

                                    <?php $sql_utilisateur_outil = "SELECT * FROM `fiche_nav_utilisateurs_outils`  ";
                                            // echo $sql_utilisateur_outil;
                                            $result_utilisateur_outil = $bdd->query($sql_utilisateur_outil); ?>
                                            

                                           <?php  if($evenement3["Etat"] != 1 && $evenement3["Etat"] != 2){ ?>

                                            <select name="prise_en_charge" style="font-size: 11px;margin-top:6px;height:25px" class="button">
                                                <option>Complétez ici</option>
                                                <?php 
                                                while ($evenement_utilisateur_outil = $result_utilisateur_outil->fetch()) { ?>
                                                <option><?php echo $evenement_utilisateur_outil["Utilisateur_Safe"]; ?></option>
                                                <?php } ?>
                                            </select>
                                            
                 
                                            <input type="hidden" name="id_habilitation" value="<?php echo $evenement3['id_habilitation']; ?>">
                                            <input type="submit" name="submit" class="button is-success" style="font-size: 11px;margin-top:6px;float: right;height:25px" value="Valider">
                                            </div>
                                            <?php } ?>
                                            </form>
                                </td>

                            <?php } else { ?>

                                <?php
                                if ($page == "modification_habilitation.php") { ?>
                                    <form action="supprime_prise_en_charge.php" method="POST">
                                    <?php } else { ?>
                                        <form action="../supprime_prise_en_charge.php" method="POST">
                                        <?php } ?>


                                        <td align="center"> <?php echo $evenement3["pris_en_charge_par"]; ?>
                                            <input type="hidden" name="id_habilitation" value="<?php echo $evenement3['id_habilitation']; ?>">
                                            <?php if($evenement3["Etat"] != 1 && $evenement3["Etat"] != 2){ ?>
                                            <input type="submit" class="button is-danger" style="font-size: 11px;margin-top:6px;margin-bottom:6px;height:25px;float: right;" value="X">
                                            <?php } ?>
                                        </form>

                                    <?php  } ?>

                                    </td>




                                <?php     } ?>







                                <!-- Si l'utilisateur est un RSI on affiche simplement les données de la base de donnée etat_habilitation -->
                                <?php if ($_SESSION["Pole"] == "RSI") { ?>
                                    <TD align="center"> <?php echo $evenement3["pris_en_charge_par"]; ?> </TD>

                                    <TD align="center"> <?php if ($evenement3["Etat"] == 0) {
                                                            echo "Demande en cours";
                                                        } elseif ($evenement3["Etat"] == 1) {
                                                            echo "Demande traitée";
                                                        } elseif ($evenement3["Etat"] == 2) {
                                                            echo "Demande refusée";
                                                        } elseif ($evenement3["Etat"] == 3) {
                                                            echo "Demande de suppression en cours";
                                                        }
                                                        ?> </TD>
                                    </tr>
                                <?php                      }    ?>


                                <?php
                                $page = basename($_SERVER["PHP_SELF"]);
                                if ($_SESSION["Pole"] == "Safe") { ?>
                                    <TD align="center"> <?php if ($evenement3["Etat"] == 0) {
                                                            echo "Demande en cours";
                                                        } elseif ($evenement3["Etat"] == 1) {
                                                            echo "Demande traitée";
                                                        } elseif ($evenement3["Etat"] == 2) {
                                                            echo "Demande refusée";
                                                        } elseif ($evenement3["Etat"] == 3) {
                                                            echo "Demande de suppression en cours";
                                                        }
                                                        ?> </TD>


                                    <TD>


                                        <?php

                                        if($evenement3["Etat"] != 1 && $evenement3["Etat"] != 2){

                                             //Bouton permettant de modifier l'état d'une habilitation en "traitée"
                                        if ($page == "modification_habilitation.php") { ?>
                                            <TD style="border:0">
                                            <form method="POST" type="submit" action="Accepter_habilitation.php">
                                                <button class="button is-success" type="submit" onclick="return fonction_popup()" style="font-size: 11px;margin-top:6px;float: right;margin-right:20px;">Traitée</button>
                                                <input type="hidden" name="id_habilitation" value="<?php echo $evenement3["id_habilitation"] ?>">
                                            </form>
                                            </TD>
                                        <?php } else { ?>
                                            <TD style="border:0">
                                            <form method="POST" type="submit" action="../Accepter_habilitation.php">
                                                <button class="button is-success" type="submit" onclick="return fonction_popup()" style="font-size: 11px;margin-top:6px;float: right;margin-right:20px;">Traitée</button>
                                                <input type="hidden" name="id_habilitation" value="<?php echo $evenement3["id_habilitation"] ?>">
                                            </form>
                                        </TD>
                                <?php }

                                        //Bouton permettant de modifier l'état d'une habilitation en "refusée"       
                                        if ($page == "modification_habilitation.php") { ?>
                                    <TD style="border:0">
                                        <form method="POST" type="submit" action="Refuser_habilitation.php">
                                            <button class="button is-danger" style="font-size: 11px;margin-top:6px;float: right;" onclick="return fonction_popup()">Refusée </button>
                                            <input type="hidden" name="id_habilitation" value="<?php echo $evenement3["id_habilitation"] ?>">
                                        </form>
                                    </TD>
                                    <?php } else { ?>
                                    <TD style="border:0">
                                        <form method="POST" type="submit" action="../Refuser_habilitation.php">
                                            <button class="button is-danger" style="font-size: 11px;margin-top:6px;float: right;" onclick="return fonction_popup()">Refusée </button>
                                            <input type="hidden" name="id_habilitation" value="<?php echo $evenement3["id_habilitation"] ?>">
                                        </form>
                                    </TD>
                                <?php } ?>
                                </td>
                               

                        <?php }
                                        } ?>
                                        </tr> <?php 
                                       





                            }

                        ?>







                        <script>
                            //Pop up de confirmation lorsque l'utilisateur appuie sur traitée ou refusée
                            function fonction_popup() {

                                if (confirm("Validation de l'action")) {
                                    // Code à éxécuter si le l'utilisateur clique sur "OK"
                                    return true;
                                } else {
                                    // Code à éxécuter si l'utilisateur clique sur "Annuler" 
                                    return false;
                                }
                            }
                        </script>

                        </TR>
                        </TABLE>

                        </p>
                        </div>
                        </div>
                        </div>
                        </div>
                        <br>
</section>

<div class="columns">
    <div class="column">
        <p> <?php include 'Boutons' . DIRECTORY_SEPARATOR . 'gestion_bouton.php'; ?></p>
    </div>
</div>


<!-- //Permet d'afficher l'URL -->
<script>
    var chemin = window.location.pathname;
    // document.write(chemin);

    //Barre de séparation
    if (chemin == "/modification_habilitation.php") {
        document.write("<section class='hero is-dark'>");
        document.write("<div class='hero-body'>");
        document.write("<div class='container'></div>");
        document.write("</div> </section>");
    }
</script>

</form>

<br><br><br><br>

<script>
    function openForm(ID) {
        document.getElementById("myForm").style.display = "block";
        document.getElementById("id_habilitation").value = ID;
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>

<?php } else { ?>
    <label style="margin-left: 5%"> CUID :
        <!-- Champ permettant de à l'utilisateur de chercher d'écrire un CUID et de savoir si il existe -->
        <input type="text" name="Identifiant" onchange="document.getElementById('formIdUser').submit()" value="<?php if (!empty($_GET['Identifiant'])) {
                                                                                                                    echo $_GET['Identifiant'];
                                                                                                                } ?>" />
        <input type="hidden" id="result_deroulant" name="result_deroulant">


        <br><br><br><br><br><br><br>

        <!-- Barre noir de séparation -->
        <section class='hero is-dark'>
            <div class='hero-body'>
                <div class='container'></div>
            </div>
        </section>
    <?php } ?>


    