<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="modification_habilitation.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
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
<?php
require 'header.php';
require 'connexion.php';
?>

<br>

<!-- Le tableau permet d'affiché le formulaire "habilitation" en parallèle du bouton acceuil-->
<table>
    <tr>
        <td>
            <!-- Bouton acceuil / Modification d'une habilitation-->
            <a href="accueil.php"> <button class="button is-info" style="margin-left: 30px">Accueil</button></a>
            <a href="modification_habilitation.php"> <button class="button is-info" style="margin-left: 30px">Modification d'une habilitation</button></a>
        </td>
    </tr>
</table>

<br>



<!-- Création d'un tableau permettant d'affiché tout les 
Habilitation qui ont été créé et voir leurs état
Ce tableau permet d'avoir une vue global sur les 
Habilitation -->
<table id="table_id" class="is-size-7" BORDER="1" style="width:95%;">
<br>    
<h4 class="title is-5" style="border:solid"> <br> Liste des applications à traiter : <br><br> </h4>
    <br>
    <thead align="center" style="background-color: #eb7d4d" class="is-size-6">
        <tr>
            <th>
                 Date 
            </th>
            <th>
                 Créé par : 
            </th>
            <th>
                CUID 
            </th>
            <th>
                 Habilitation 
            </th>
            <th>
                 Information Complémentaire RSI 
            </th>
            <th>
                 Information Complémentaire Safe 
            </th>
            <th>
                Etat 
            </th>
            <th >
                 Pris en charge par: 
            </th>
        </tr>
    </thead>

    <?php
    // affichage de tous les habilitations à habiliter 
    $sql6 = "SELECT * FROM `fiche_nav_etat_habilitation` WHERE  `Etat`='0'  OR  `Etat`='3'  ORDER BY `id_habilitation` DESC ";
    //  echo $sql6;
    $result6 = $bdd->query($sql6);

    $sql7 = "SELECT * FROM `fiche_nav_etat_habilitation` WHERE  `Etat`='1'  OR  `Etat`='2' OR  `Etat`='4'   ";
    //  echo $sql7; 
    $result7 = $bdd->query($sql7); ?>

    <tbody>
        <?php
        //Récupération des données de la table fiche_nav_etat_habilitation
        while ($evenement6 = $result6->fetch()) {
        ?>
            <tr>
                <td align="center"> <?php echo $evenement6["date"]; ?> </td>
                <td align="center"> <?php echo $evenement6["créé_par"]; ?> </td>
                <!-- Affichage du CUID et ajout d'un lien vers la page modification habilitation -->
                <td align="center"> <a href="modification_habilitation.php?Identifiant=<?php echo $evenement6["CUID"] ?>"> <?php echo $evenement6["CUID"] ?> </a></td>
                <td align="center"> <?php echo $evenement6["Application"]; ?> </td>
                <td align="center"> <?php echo $evenement6["Informations_Complémentaires_RSI"] ?> </td>
                <td align="center"> <?php echo $evenement6["Informations_Complémentaires_Datafactory"] ?> </td>
                <td align="center"> <?php if ($evenement6["Etat"] == 0) {
                                        echo "Demande en cours";
                                    } elseif ($evenement6["Etat"] == 1) {
                                        echo "Demande traitée";
                                    } elseif ($evenement6["Etat"] == 2) {
                                        echo "Demande refusée";
                                    } elseif ($evenement6["Etat"] == 3) {
                                        echo "Demande de suppression en cours";
                                    } elseif ($evenement6["Etat"] == 4) {
                                        echo "Demande supprimée";
                                    }
                                    ?> </TD>


                <?php

                // Ajout pris en charge par les Datafactory(safe)
                if ($_SESSION["Pole"] == "Safe") {
                    if ($evenement6["pris_en_charge_par"] == NULL) {
                    ?>
                        <td align="center">
                            <form action="ajout_prise_en_charge.php" method="POST">
                                     <?php $sql_utilisateur_outil = "SELECT * FROM `fiche_nav_utilisateurs_outils`  ";
                                            // echo $sql_utilisateur_outil;
                                            $result_utilisateur_outil = $bdd->query($sql_utilisateur_outil); ?>
                                            
                                            <select name="prise_en_charge" style="font-size: 11px;margin-top:6px;height:25px" class="button">
                                                <option>Complétez ici</option>
                                                <?php 
                                                while ($evenement_utilisateur_outil = $result_utilisateur_outil->fetch()) { ?>
                                                <option><?php echo $evenement_utilisateur_outil["Utilisateur_Safe"]; ?></option>
                                                <?php } ?>
                                            </select>

                                <input type="hidden" name="id_habilitation" value="<?php echo $evenement6['id_habilitation']; ?>">
                                <input type="submit" name="submit" class="button is-success" style="font-size: 11px;margin-top:6px;float: right;height:20px" value="Valider">
                                </div>
                            </form>
                        </td> <?php
                            } else { ?>
                        <!-- Permet de supprimer la personne qui à pris en charge l'habilitation  -->
                        <form action="supprime_prise_en_charge.php" method="POST">
                            <td align="center"> <?php echo $evenement6["pris_en_charge_par"]; ?>
                                <input type="hidden" name="id_habilitation" value="<?php echo $evenement6['id_habilitation']; ?>">
                                <input type="submit" class="button is-danger" style="font-size: 11px;margin-top:6px;height:17px;float: right;" value="X">
                            </td>
                        </form>

                        <?php
                            }
                        } else { ?>
                    <td align="center"> <?php echo $evenement6["pris_en_charge_par"]; ?> </td> <?php
                                                                                            }
                                                                                        } ?>
            </tr>

            <?php
            while ($evenement7 = $result7->fetch()) {
            ?>
                <tr>
                    <td align="center"> <?php echo $evenement7["date"]; ?> </td>
                    <td align="center"> <?php echo $evenement7["créé_par"]; ?> </td>
                    <td align="center"> <a href="modification_habilitation.php?Identifiant=<?php echo $evenement7["CUID"] ?>"> <?php echo $evenement7["CUID"] ?> </a></td>
                    <td align="center"> <?php echo $evenement7["Application"]; ?> </td>
                    <td align="center"> <?php echo $evenement7["Informations_Complémentaires_RSI"] ?> </td>
                    <td align="center"> <?php echo $evenement7["Informations_Complémentaires_Datafactory"] ?> </td>
                    <td align="center"> <?php if ($evenement7["Etat"] == 0) {
                                            echo "Demande en cours";
                                        } elseif ($evenement7["Etat"] == 1) {
                                            echo "Demande traitée";
                                        } elseif ($evenement7["Etat"] == 2) {
                                            echo "Demande refusée";
                                        } elseif ($evenement7["Etat"] == 3) {
                                            echo "Demande de suppression en cours";
                                        } elseif ($evenement7["Etat"] == 4) {
                                            echo "Demande supprimée";
                                        }
                                        ?> </TD>
                    <td align="center"> <?php echo $evenement7["pris_en_charge_par"]; ?> </td>
                </tr>
            <?php }  ?>
    </tbody>
</table>

<!-- Filtre du tableau Récapitulatif de tous les habilitations
 Utilisation de la librairie de "DataTable" -->
<script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            language: {
                processing: "Traitement en cours...",
                search: "Rechercher&nbsp;:",
                lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                info: "",
                infoEmpty: "",
                infoFiltered: "",
                infoGETFix: "",
                loadingRecords: "Chargement en cours...",
                zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable: "Aucune donnée disponible dans le tableau",
                paginate: {
                    first: "Premier",
                    previous: "Pr&eacute;c&eacute;dent",
                    next: "Suivant",
                    last: "Dernier"
                },
                aria: {
                    sortAscending: ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        });
    });
</script>