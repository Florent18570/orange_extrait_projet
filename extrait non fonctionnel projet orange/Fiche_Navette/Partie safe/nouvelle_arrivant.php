<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="modification_habilitation.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">


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






<!--Connexion bdd + Banière-->
<?php require 'header.php';
require 'connexion.php';
?>


<br>

<!--Bouton acceuil et recap-->
<!-- Le tableau permet d'affiché le formulaire "habilitation" en parallèle du bouton acceuil-->
<table>
    <tr>
        <td>
            <a href="accueil.php" <button class="button is-link is-focused" style="margin-left: 30px">Accueil</button>
            </a>
        </td>

        <td>
            <form method="GET" id="habilitation" action="recap.php">
                <button class="button is-link is-focused" style="margin-left: 30px">Habilitation</button>

                <!--récupération des informations à envoyé dans la page recap-->

                <?php
                if (isset($_GET['Identifiant'])) {
                    $_GET['Identifiant'];
                }
                ?>
            </form>
        </td>
    </tr>
</table>




<br><br>


<h4 class="title is-5" style="border:solid" "> <br> Veuillez compléter les informations ci-dessous: <br><br> </h4>


<section class=" section">
    <div class="container">
        <div class="columns is-mobile">
            <div class="column is-size-5">
                <p class="has-background-primary">
                <form method="GET" id="formIdUser" action="modification_habilitation.php">


                    <div class="columns">
                        <div class="column is-3" "> <label style=" padding-left: 50px"> CUID : <input type="text" name="Identifiant" onchange="document.getElementById('formIdUser').submit()" value="<?php
                                                                                                                                                                                                        if (!empty($_GET['Identifiant'])) {
                                                                                                                                                                                                            echo $_GET['Identifiant'];
                                                                                                                                                                                                        }
                                                                                                                                                                                                        ?>" /> </div>
                        <div class="column is-2 message is-danger" id="message" style="display:none; color: red ">CUID n'existe pas! </div>
                        <div class="column is-auto"> </div>
                    </div>


                    </label>
                    <br>

                    <?php if (empty($evenement['Prénom']) && isset($_GET['Identifiant'])) { ?>
                        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
                        <script>
                            //When the page has loaded.
                            $(document).ready(function() {
                                $('#message').fadeIn('slow', function() {
                                    $('#message').delay(5000).fadeOut();
                                });
                            });
                        </script>

                    <?php } ?>


                    <!-- <select name="metier" onchange="document.getElementById('formIdUser').submit()" >
                       <option value="1">UI_BL_2020_Accueil TechniqueADR_GPM</option>
                       <option>UI_BL_2020_NAT_G2R - Equipes Nationales ADRESSE - MAJ/QD des bases descriptives et spatiales_GRM</option>
                       <option>UI_BL_2020_NAT_G2R - Experts RESEAU - MAJ/QD des bases descriptives et spatiales_GRM</option>
                       <option>UI_BL_2020_NAT_G2R - Gestionnaires des Ressources Réseau - MAJ/QD des bases descriptives et spatiales_GRM</option>
                       <option value="UI_CA_2020_Conduite d\'Activité Entreprise_Utilisateur_GRM Philippe Vacher">UI_CA_2020_Conduite d'Activité Entreprise_Utilisateur_GRM</option>
                       <option value="UI_CA_2020_Conduite d\'Activité_Administrateur_GRM Bertrand Roche">UI_CA_2020_Conduite d'Activité_Administrateur_GRM</option>
                       <option value="UI_CA_2020_Conduite d\'Activité_Pilote activité_GRM Philippe Vacher">UI_CA_2020_Conduite d'Activité_Pilote activité_GRM</option>
                       <option value="UI_CA_2020_Conduite d\'Activité_Pilote opération_GRM Bertrand ROCHE">UI_CA_2020_Conduite d'Activité_Pilote opération_GRM</option>
                       <option value="UI_CA_2020_Conduite d\'Activité_Prévisionniste_GRM Eric Jacquot"> UI_CA_2020_Conduite d'Activité_Prévisionniste_GRM</option>
                       <option value="UI_CAFF_2020_Cuivre_Chargé d\'affaires hors FTTH_Manager_GPM Evelyne Gastardi"> UI_CAFF_2020_Cuivre_Chargé d'affaires hors FTTH_Manager_GPM</option>
                       <option value="UI_CAFF_2020_Cuivre_Chargé d\'affaires hors FTTH_Utilisateur_GPM Evelyne Gastardi"> UI_CAFF_2020_Cuivre_Chargé d'affaires hors FTTH_Utilisateur_GPM</option>
                       <option value="UI_CAFF_2020_FTTH_Chargé d\'affaires réseau_Manager_GPM Eric VEROT"> UI_CAFF_2020_FTTH_Chargé d'affaires réseau_Manager_GPM</option>
                       <option value="UI_CAFF_2020_FTTH_Chargé d\'affaires réseau_Utilisateur_GPM Eric VEROT"> UI_CAFF_2020_FTTH_Chargé d'affaires réseau_Utilisateur_GPM</option>
                       <option> UI_CEC_2020_Cellule Expertise Client_Responsable_GRM</option>
                       <option> UI_DATA FACTORY_2020_Utilisateur_GRM</option>
                       <option>  UI_DIOCE_2020_Manager_transverse_GPM</option>
                       <option>  UI_DIOCE_2020_RPI INTEGRATION_utilisateur_GPM</option>
                       <option>  UI_DIOCE_2020_RPI_Utilisateur_GPM</option>
                       <option> UI_DIOCE_2020_Technicien intervention entreprise_utilisateur_GPM</option>
                       <option> UI_DPBL _NAT_2020_Analyse Qualité Réseau_GRM</option>
                       <option>  UI_DPBL_NAT_2020_BO Facturation_GRM</option>
                       <option>  UI_DPBL_NAT_2020_Gestion des Dommages_GRM</option>
                       <option>  UI_DPBL_NAT_2020_Plan National Poteaux_GRM</option>
                       <option>  UI_DPBL_NAT_2020_Supervision Pressurisation_GRM</option>
                       <option> UI_ESF_2020_Expert Soutien Formateur UTILISATEUR_GRM</option>
                       <option> UI_FCG_2020_Contrôle de gestion IP_Valideur 1_GPM</option>
                       <option>  UI_FCG_2020_Contrôle de gestion IP_Valideur 2_GPM</option>
                       <option> UI_FTTH_Qualité de données_fermeture prévisionnelle decembre 2020 GPM</option>
                       <option>  UI_GSO_2020_RSI-GESTEL-PEC_GPM Stephane Leclerc</option>
                       <option>  UI_GTC_2020_Gestion Technique Client ADR_Utilisateur_GRM</option>
                       <option>   UI_GTC_2020_Gestion Technique Client ADSL_Utilisateur_GRM</option>
                       <option>   UI_GTC_2020_Gestion Technique Client AUTODOC_Utilisateur_GRM</option>
                       <option>  UI_GTC_2020_Gestion Technique Client Entreprise_Utilisateur_GRM</option>
                       <option>  UI_GTC_2020_Gestion Technique Client NUMERIS_Utilisateur_GRM</option>
                       <option>  UI_GTC_2020_Gestion Technique Client_Soutien et Responsable_GRM</option>
                       <option>  UI_PPC_2020_Pilote de Production Client_Manager et Soutien_GRM</option>
                       <option>  UI_PPC_2020_Pilote de Production Client_Pilote activité_GRM</option>
                       <option>  UI_PPR_2020_Pilote Production Reseaux_GRM</option>
                       <option>  UI_RLP_2020_Responsable Local Processus_Utilisateur_GPM</option>
                       <option>  UI_TECH_2020_CMBL_Coordinateur Maintenance Boucle Local_Utilisateur_GRM</option>
                       <option>  UI_TECH_2020_Multi technique Manager_GPM</option>
                       <option>  UI_TECH_2020_Technicien intervention_Utilisateur_GPM</option>
                   </select> -->

                    <label style="padding-left: 50px">
                        Métier :
                        <?php
                        require '../filtre_list_deroulante.php';
                        ?>
                    </label>

                    <select name="metier" onchange="document.getElementById('formIdUser').submit()">


                        <script>
                            var metierGET = $_GET('metier');
                            document.write("<option id='metier' style='font-weight:bold'> Selectionner le metier  </option>");
                            for (var i = 1; i < num + 1; i++) {
                                document.write("<option id='metier'>" + tabmetier[i - 1] + "</option> ");
                            }


                            var t = metierGET.replaceAll("+", " ");
                            var y = t.replaceAll("%C3%A9", "é");
                            document.getElementById("metier").innerHTML = y;
                        </script>

                    </select>
                </form>
                </p>







                <br><br><br><br>


                <?php
                if (isset($_GET['Identifiant'])) {
                    if (isset($_GET['metier'])) {

                ?>
                        <div class="columns ">
                            <div class="column ">
                                <p><label> Prénom : <br> <input type="text" name="personnes[Prénom]" value="<?php echo $evenement['Prénom']; ?>" /></label><br>
                                    <label> Nom : <br> <input type="text" name="personnes[Nom]" value="<?php echo $evenement['Nom']; ?>" /></label><br>
                                    <label> Date de naissance : <br><input type="date" name="evenements[Libelle]" value="<?php if (isset($_GET['Libelle_eve'])) {
                                                                                                                                echo $_GET['Libelle_eve'];
                                                                                                                            } ?>" />
                                    </label>
                                </p>
                            </div>
                            <div class="column">
                                <p>
                                    <label> Téléphone fixe : <br> <input type="text" name="personnes[Téléphone]" value="<?php echo $evenement['Téléphone']; ?>" /></label><br>
                                    <label> Mobile : <br> <input type="text" name="personnes[Mobile]" value="<?php echo $evenement['Mobile']; ?>" /></label><br>
                                    <label> Mail : <br><input type="text name=" evenements[Mail] value="<?php echo $evenement['Mail']; ?>" /></label>
                                    </label>
                                </p>
                            </div>
                            <div class="column">
                                <p>
                                    <label> Date d'entrée : <br> <input type="text" name="personnes[Date d'entrée]" value="<?php echo $evenement['Date d\'entrée']; ?>" /></label><br>
                                    <label> Date de départ : <br> <input type="text" name="personnes[Date de départ]" value="<?php echo $evenement['Date de départ']; ?>" /></label><br>
                                    <label> ID Responsable :<br><input type="text name=" evenements[Responsable] value="<?php echo $evenement['Responsable']; ?>" /></label>
                                    </label>
                                </p>
                            </div>

                        </div>

            </div>
        </div>
        <br>

<?php }
                } ?>

<div class="columns">
    <div class="column">
        <p> <?php include 'Boutons' . DIRECTORY_SEPARATOR . 'gestion_bouton.php'; ?></p>
    </div>
</div>
</section>

<section class="hero is-dark">
    <div class="hero-body">
        <div class="container">
        </div>
    </div>
</section>



<br><br>

<?php

require 'footer.php'
?>