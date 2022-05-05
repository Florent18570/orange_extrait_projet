<!-- Meme page que modification habilitation -->
<!-- Avec la possibilité de faire une demande de suppression pour les RSI
    Ou une suppression d'une habilitation pour les datafactory(safe) -->



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
require 'header.php'; ?>

<br>

<!-- Le tableau permet d'affiché le formulaire "habilitation" en parallèle du bouton acceuil-->
<table>
    <tr>
        <td>
            <!-- Bouton acceuil / recapitulatif des habilitations -->
            <?php
            $page = basename($_SERVER["PHP_SELF"]); // Variable permettant de différenciel les liens des pages

            if ($page == "modification_habilitation.php" || $page == "supression_habilitation.php") { ?>
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

<section class="section">
    <div class="columns is-mobile">
        <div class="column is-size-5">
            <p class="has-background-primary">
                <?php
                $page = basename($_SERVER["PHP_SELF"]);
                if ($page == "modification_habilitation.php" ||  $page == "supression_habilitation.php") { ?>
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
                        <div class="column is-6" >
                            <label style="margin-left: 5%"> CUID : </label> 
                                <!-- Champ permettant de à l'utilisateur de chercher d'écrire un CUID et de savoir si il existe -->
                                <input type="text" name="Identifiant" onchange="document.getElementById('formIdUser').submit()" value="<?php if (!empty($_GET['Identifiant'])) {
                                                                                                                                            echo $_GET['Identifiant'];                                                                                           } ?>" />
                                <input type="hidden" id="result_deroulant" name="result_deroulant">
                            

                                <br><br><br>
                                <label style="margin-left: 5%">
                                    Profil Métier :
                                </label>


                                <select class="button is-small"  id="selectmetier" style="margin-left: 5%">
                                    <option> Selectionner le profil </option>
                                    <?php
                                    $result = array();
                                    $i = 0;
                                    while ($evenement4 = $result4->fetch()) {

                                        

                                        //Cette condition permet de supprimé tous ce qui se trouve après 'GRM' et 'GPM' de la chaine.

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

                                        <!-- Permet d'afficher et de supprimé les "_" de la chaine 
                                            La vrai valeur est concervé dans la "value" de l'option afin d'avoir un affichage des boutons -->
                                   
                                        <option value="<?php echo $result2[$i] ?>"> <?php echo str_replace("_", " ", $result[$i]); ?> </option>
                                   
                                           <?php
                                        $i = $i + 1;
                                    }
                                    ?>
                                </select>

                                <br><br>

                                <button id="Click" type="submit" onClick="listmultipleresult()" class="button is-small"  style="margin-left: 5%">Envoyer</button>

                        </div>




                        <!-- Affichage des champs qui conserne l'utilisateur selectionner avec le CUID -->

                        <div class="column is-2">

                            <?php
                            $sql = "SELECT * FROM `fiche_nav_personnes` where  `Identifiant`= '" . $_GET['Identifiant'] . "' ";
                            $result = $bdd->query($sql);
                            $ev = "";
                            while ($evenement = $result->fetch()) {
                                $ev = $evenement["Identifiant"]; ?>
                                <p>
                                    <label> Prénom : <br> <input style='width: 130px;' readOnly="readOnly" type="text" class="button is-small"  value="<?php echo $evenement['Prénom']; ?>" /></label><br>
                                    <label> Nom : <br> <input style='width: 130px;' readOnly="readOnly" type="text" class="button is-small"  value="<?php echo $evenement['Nom']; ?>" /></label><br>
                                    <label> Mobile : <br> <input style='width: 143px;' readOnly="readOnly" type="text" class="button is-small"  value="<?php echo $evenement['Mobile']; ?>" /></label><br>
                                </p>
                        </div>
                        <div class="column is-2">
                            <p>
                                <label> Mail : <br><input style='width: 200px;' readOnly="readOnly" type="text" class="button is-small" value="<?php echo $evenement['Mail']; ?>" /></label> </br>
                                <label> ID Responsable :</br><input style='width: 110px;' readOnly="readOnly" type="text" class="button is-small"   value="<?php echo $evenement['Responsable']; ?>" /></label>
                                <label></br> Entité :</br><input style='width: 325px;' readOnly="readOnly" type="text" class="button is-small"   value="<?php echo $evenement['Affectation_principale']; ?>" /></label>
                            </p>
                        </div>
                    </div>
                <?php }  ?>

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

                <?php
                    require 'filtre_list_deroulante.php';
                ?>

                <!-- //Affiche une liste déroulante à choix multiple qui possède la liste des métiers selon de CUID selectionner -->
                <span id="result"> </span>  <hr />


                </form>

                <?php
                    if ($_SESSION["Pole"] == "RSI") { ?>
                    <form method="GET" id="formIdUser">
                        <?php $page = basename($_SERVER["PHP_SELF"]);

                        if ($page == "modification_habilitation.php" ||  $page == "supression_habilitation.php") { ?>
                            <a class="button is-danger" href="modification_habilitation.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=Selectionner+le+profil">  Modification habilitation </a>
                        <?php } else { ?>
                            <a class="button is-danger" href="../modification_habilitation.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=Selectionner+le+profil"> Modification habilitation </a>
                    <?php }
                    } ?>
                    </form>


                    <?php
                    if ($_SESSION["Pole"] == "Safe") {
                        if ($page == "modification_habilitation.php" || $page == "supression_habilitation.php") { ?>
                            <a class="button is-danger" href="supression_habilitation.php?Identifiant=<?php echo $_SESSION['Identifiant']; ?>&result_deroulant=Selectionner+le+profil"> Suppression </a>
                            <a class="button is-danger" href="modification_habilitation.php?Identifiant=<?php echo $_SESSION['Identifiant']; ?>&result_deroulant=Selectionner+le+profil"> Modification habilitation </a>

                        <?php
                        } else { ?>
                            <a class="button is-danger" href="../supression_habilitation.php?Identifiant=<?php echo $_SESSION['Identifiant']; ?>&result_deroulant=Selectionner+le+profil"> Suppression </a>
                            <a class="button is-danger" href="../modification_habilitation.php?Identifiant=<?php echo $_SESSION['Identifiant']; ?>&result_deroulant=Selectionner+le+profil"> Modification habilitation </a>

                            <?php } ?>
                    <?php }  ?>


                    <?php if (isset($_GET['Identifiant'])) { ?>
                        <TABLE align="center"  BORDER="1" style="font-size: 16px;width:100%;text-align:center" >
                            <CAPTION>Liste des applications à habiliter </CAPTION>
                            <br>
                         
                            <thead style="background-color: #eb7d4d "  >
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
                                     Etat
                                </TH>
                            </thead>

                        <?php
                        $tab = 6;
                        $i = 1;
                    }
                        ?>
        </div>

        <style>
            .hide {
                display: none;
            }
        </style>

        <TR>
            <?php
                    while ($evenement3 = $result3->fetch()) {
                        if ($evenement3["Application"] != "GDP") {
                            $Application = strtolower($evenement3["Application"]); ?>
                    <?php


                    if ($page == "modification_habilitation.php" ||  $page == "supression_habilitation.php") { ?>
                        <form method="POST" action="Boutons/<?php echo $Application ?>.php?Identifiant=<?php echo $_GET['Identifiant'];?>">
                    <?php
                    } else { ?>
                        <form method="POST" action="<?php echo $Application ?>.php?Identifiant=<?php echo $_GET['Identifiant'];?>">
                    <?php } 


                        } else {
                           
                
                    if ($page == "modification_habilitation.php" ||  $page == "supression_habilitation.php") { ?>
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

                               

                                if ($page == "modification_habilitation.php" ||  $page == "supression_habilitation.php") { ?>
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

    if ($page == "modification_habilitation.php" ||  $page == "supression_habilitation.php") { ?>
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

                        if ($page == "modification_habilitation.php" ||  $page == "supression_habilitation.php") { ?>
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
   
  
                         if ($page == "modification_habilitation.php" ||  $page == "supression_habilitation.php") { ?>
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

                </td>





            <?php if ($_SESSION["Pole"] == "RSI") { ?>



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



            <?php } ?>

                <TD>
                <form action="tempon_supression_habilitation.php" method="GET">
                    <input type="hidden" name="Application" value="<?php echo $evenement3["Application"] ?>">
                    <input type="submit" class="button is-danger" onclick="return fonction_popup()" style="height:35px;float: right;" value="X">
                </form>
                </TD>
                </tr>
                   
                <?php    }

            ?> 







            <script>
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

    if (chemin == "/modification_habilitation.php") {
        document.write("<section class='hero is-dark'>");
        document.write("<div class='hero-body'>");
        document.write("<div class='container'></div>");
        document.write("</div> </section>");
    }
</script>

</form>

<br><br><br><br>


<!-- Popup -->
<style>
    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 23px;
        right: 28px;
        width: 280px;
    }

    /* The popup form - hidden by default */
    .form-popup {
        display: none;
        position: fixed;
        bottom: 290px;
        left: 15%;
        border: 3px solid #f1f1f1;
        z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
    }

    /* Full-width input fields */
    .form-container input[type=text],
    .form-container input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus,
    .form-container input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
        background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
        opacity: 1;
    }
</style>


<!-- //Fonction permettant de faire une pop_UP pour update les données "Information complémentaire"-->
<div class="form-popup" id="myForm">
    <form action="/Partie safe/update_redirect.php" class="form-container" method="POST">
        <label><b> Information Complémentaire RSI</b></label>
        <input name="Informations_Complémentaires" type="text" required>
        <?php
            $_SESSION['Identifiant'] =   $_GET['Identifiant'];
        ?>
        <input type="hidden" id="id_habilitation" name="id_habilitation">
        <button id="form" type="submit" class="btn">Envoyer</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
    </form>
</div>

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