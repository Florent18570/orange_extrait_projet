<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title>GDP</title>
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
                Habilitation GDP
            </p>
        </div>
    </div>
</section>

<br><br>

<form method="POST" action="tampon.php">
    <input type="submit" class="button is-link is-focused" style="margin-left: 30%" value="Sauvegarder">

    <input type="hidden" name="tampon" value="GDP">
    <input type="hidden" name="Application" value="GDP">

    <input type="hidden" name="Creation_par">

    <input type="hidden" name="base_gdp">
    <input type="hidden" name="Nom_Base_GDP">
    <input type="hidden" name="groupe_autorisation">
    <input type="hidden" name="Code_groupe">

    <input type="hidden" name="base_gdp2">
    <input type="hidden" name="Nom_Base_GDP2">
    <input type="hidden" name="Groupe_autorisation2">
    <input type="hidden" name="Code_groupe2">

    <input type="hidden" name="Information_complémentaire">

    <!-- Tableau des membres pouvant créé des demandes d'habilitations -->
    <?php

    $sql8 = "SELECT * FROM `fiche_nav_gdp` WHERE `CUID`='" . $_SESSION['Identifiant'] . "'";
    //echo $sql8;
    $result8 = $bdd->query($sql8);


    $sql20 = "SELECT * FROM `fiche_nav_gdp` WHERE `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
    // echo $sql20;
    $result20 = $bdd->query($sql20);

    $sql21 = "SELECT * FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'GDP' and `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
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


            <!-- ################################################################################################# -->

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



            <div class="columns">
                <div class="column is-3">
                    <table class="table is-responsive" style="margin-left: 40%;margin-bottom: 100px">
                        <thead>
                            <tr>
                                <th>
                                    <label for="countries" class="required">Base GDP</label>
                                </th>
                                <th>
                                    <label for="department" class="required">Nom Base GDP:</label>
                                </th>
                            </tr>
                        </thead>

                        <tr>
                            <td>
                                <select class="button" id="base_gdp" name="base_gdp" content-type="choices" trigger="true" target="department">
                                    <option class="pink"> <?php echo $evenement20['base_gdp'] ?></option>
                                    <option>UI LPC</option>
                                    <option>UI AQUITAINE</option>
                                </select>
                            </td>
                            <td>
                                <input id="Nom_Base_GDP" name="Nom_Base_GDP" value="<?php echo $evenement20['nom_base_gdp'] ?>" />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="countries" class="required">Code Groupe</label>
                            </th>
                            <th>
                                <label for="department" class="required">Groupe Autorisation</label>
                            </th>
                        </tr>

                        <script>
                            document.getElementById('base_gdp').addEventListener('change', function() {
                                liste();
                                test();

                            });
                        </script>

                        <?php

            $sql13 = "SELECT `Code` FROM `fiche_nav_gdp_1y_aqu`";
            // echo $sql13;
            $result13 = $bdd->query($sql13);

            $sql14 = "SELECT `Libelle` FROM `fiche_nav_gdp_1y_aqu`";
            // echo $sql14;
            $result14 = $bdd->query($sql14);

            $sql15 = "SELECT `Code` FROM `fiche_nav_groupe_lpc` ";
            // echo $sql15;
            $result15 = $bdd->query($sql15);

            $sql16 = "SELECT `Libelle` FROM `fiche_nav_groupe_lpc` ";
            //echo $sql16;
            $result16 = $bdd->query($sql16);
                        ?>

                        <td>
                            <select class="button" id="select" name="Code_groupe" content-type="choices" trigger="true" target="department" onchange="groupe_auto(groupe);">
                                <option> <?php echo $evenement20['Code_Groupe'] ?> </option>
                            </select>
                        </td>
                        <td>
                            <input id="groupe_autorisation" name="groupe_autorisation" readOnly="readOnly" value="<?php echo $evenement20['Groupe_Autorisation'] ?>" />
                        </td>
                </div>
            </div>
            </table>
    <?php }
    } ?>


    <script>
        function groupe_auto() {

            var i = select.selectedIndex;
            console.log(i);
            console.log(groupe);

            if (groupe == "gdp_1y_aqu") {
                for (b = 0; b < tabaqu_Libelle.length; b++) {
                    if (b == i) {
                        document.getElementById("groupe_autorisation").value = tabaqu_Libelle[b];
                    }
                }
            }

            if (groupe == "groupe_lpc") {
                for (b = 0; b < tablpc_Libelle.length; b++) {
                    if (b == i) {
                        document.getElementById("groupe_autorisation").value = tablpc_Libelle[b];
                    }
                }

                // Affichage des codes GPD selon le groupe selectionné
                if (i == 1) {
                    document.getElementById("Nom_Base_GDP").value = "A4";
                    document.getElementById("gdp2").value = "UI AQUITAINE";
                    document.getElementById("gdp2_message").value = "1Y";

                } else if (i == 2) {
                    document.getElementById("Nom_Base_GDP").value = "1Y";
                    document.getElementById("gdp2").value = "UI LPC";
                    document.getElementById("gdp2_message").value = "A4";
                }
            }

            // Affichage des codes GPD selon le groupe selectionné
            if (i == 1) {
                document.getElementById("Nom_Base_GDP").value = "A4";
                document.getElementById("gdp2").value = "UI AQUITAINE";
                document.getElementById("gdp2_message").value = "1Y";

            } else if (i == 2) {
                document.getElementById("Nom_Base_GDP").value = "1Y";
                document.getElementById("gdp2").value = "UI LPC";
                document.getElementById("gdp2_message").value = "A4";
            }
        }
    </script>

</form>


<!-- Création de tableau -->
<script>
    groupe = '0'
    var tabaqu_Code = new Array();
    console.log(tabaqu_Code);
    var tabaqu_Libelle = new Array();
    console.log(tabaqu_Libelle);
    var tablpc_Code = new Array();
    console.log(tablpc_Code);
    var tablpc_Libelle = new Array();
    console.log(tablpc_Libelle);
</script>


<!-- Récupération des codes et libelle de GDP dans ma BDD et je les mets dans un tableau JS avec la fonction push -->
<?php
while ($evenement13 = $result13->fetch()) { 
    ?>
    <script>
        tabaqu_Code.push("<?= $evenement13['Code']; ?>");
    </script>
<?php } 

while ($evenement14 = $result14->fetch()) { 
$rtrim = rtrim($evenement14['Libelle']); ?> <br> 
<script>
    tabaqu_Libelle.push("<?= $rtrim; ?>");
</script>
<?php } 





    while ($evenement15 = $result15->fetch()) { 
        ?>
        <script>
            tablpc_Code.push("<?= $evenement15['Code']; ?>");
          
        </script>
    <?php } 

    while ($evenement16 = $result16->fetch()) { 
    $rtrim2 = rtrim($evenement16['Libelle']); ?> <br> 
    <script>
        tablpc_Libelle.push("<?= $rtrim2; ?>");
    </script>
    <?php } ?>

<!--  -->
<script>
    function test() {
        var a = base_gdp.selectedIndex;
        console.log(a);
        removeOptions(document.getElementById("select"));
        removeOptions(document.getElementById("select2"));
        if (a == 1) {
            for (i = 0; i < tabaqu_Code.length; i++) {
                addLineLPC(i);
            }
        }
        if (a == 2) {
            for (i = 0; i < tablpc_Code.length; i++) {
                addLineAqu(i);
            }
        }
    }


    //  Affichage de GPD avec le tableau aqui et gdp2 avec le tableau lpc
    function addLineAqu(i) {
        var aqu = document.getElementById("select");
        var opt1 = document.createElement("option");

        opt1.value = tabaqu_Code[i];
        opt1.text = tabaqu_Code[i];

        aqu.add(opt1, null);

        var aqu2 = document.getElementById("select2");
        var opt2 = document.createElement("option");

        opt2.value = tablpc_Code[i];
        opt2.text = tablpc_Code[i];

        aqu2.add(opt2, null);
        groupe = 'gdp_1y_aqu'
    }

    //  Affichage de GPD avec le tableau lpc et gdp2 avec le tableau aqui
    function addLineLPC(i) {
        var lpc = document.getElementById("select");
        var opt1 = document.createElement("option");

        opt1.value = tablpc_Code[i];
        opt1.text = tablpc_Code[i];

        lpc.add(opt1, null);

        var lpc = document.getElementById("select2");
        var opt2 = document.createElement("option");

        opt2.value = tabaqu_Code[i];
        opt2.text = tabaqu_Code[i];

        lpc.add(opt2, null);
        groupe = 'groupe_lpc'

    }
</script>


<!-- selon le groupe choisi dans la fonction ci-dessus, on affiche  -->
<script>
    function removeOptions(selectElement) {
        var i, L = selectElement.options.length - 1;
        for (i = L; i >= 0; i--) {
            selectElement.remove(i);
        }
    }
</script>

</div>

<div class="column is-1" style="margin-left: 16%">
    <input name="button" id="button" type="button" onclick="myFunction();" class="is-visible" value="+">
</div>


<!--  Permet d'avoir les valeurs du formulaire GDP 2 = vide pour pouvoir envoyé uniquement LPC ou aquitaine -->
<script>
    var y;

    function myFunction() {
        if (y == true) {
            document.getElementById("gdp2").value = "";
            document.getElementById("gdp2_message").value = "";
            document.getElementById("select2").value = "";
            document.getElementById("groupe_autorisation2").value = "";
            y = false
        } else {
            y = true;
        }
    };
</script>




<!-- ###############    Tableau GDP 2 ####################### -->

<?php
$sql8 = "SELECT * FROM `fiche_nav_gdp` WHERE `CUID`='" . $_SESSION['Identifiant'] . "'";
//echo $sql8;
$result8 = $bdd->query($sql8);


$sql20 = "SELECT * FROM `fiche_nav_gdp` WHERE `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
// echo $sql20;
$result20 = $bdd->query($sql20);

$sql21 = "SELECT * FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'GDP' and `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
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

        <div class="column is-1" style="margin-left: -5%">
            <div class="container">
                <div class="text is-visible" id="text">
                    <table class="table is-responsive" style="margin-left: 10%;margin-bottom: 100px">
                        <thead>
                            <tr>
                                <th>
                                    <label for="countries" class="required">Base GDP</label>
                                </th>
                                <th>
                                    <label for="department" class="required">Nom Base GDP:</label>
                                </th>
                            </tr>
                        </thead>


                        <tr>
                            <td>
                                <input class="button" class="table is-responsive" id="gdp2" name="base_gdp2" readOnly="readOnly" value="<?php echo $evenement20['base_gdp2'] ?>" />
                            </td>

                            <td>
                                <input id="gdp2_message" name="Nom_Base_GDP2" readOnly="readOnly" value="<?php echo $evenement20['Nom_Base_GDP2'] ?>" />
                            </td>


                        <tr>
                            <th>
                                <label for="countries" class="required">Code Groupe</label>
                            </th>
                            <th>
                                <label for="department" class="required">Groupe Autorisation</label>
                            </th>
                        </tr>
                        
                        <td>
                            <select class="button" id="select2" name="Code_groupe2" content-type="choices" trigger="true" target="department" onchange="groupe_auto2(groupe); ">
                                <option> <?php echo $evenement20['Code_groupe2'] ?> </option>
                        </td>

                        <td>
                            <input id="groupe_autorisation2" name="Groupe_autorisation2" readOnly="readOnly" value="<?php echo $evenement20['Groupe_autorisation2'] ?>" />
                        </td>
                    </table>
            <?php }
    } ?>
                </div>
            </div>

            <?php require 'champ_commentaire_suppl.php'; ?>


            <script>
                const btn = document.querySelector('button');
                const text = document.querySelector('.text');

                let isVisible = true;

                btn.addEventListener('click', () => {
                    isVisible = !isVisible;
                    isVisible ? text.classList.add('is-visible') : text.classList.remove('is-visible');
                });


                function liste() {
                    var i = base_gdp.selectedIndex;

                    if (i == 1) {
                        document.getElementById("Nom_Base_GDP").value = "A4";
                        document.getElementById("gdp2").value = "UI AQUITAINE";
                        document.getElementById("gdp2_message").value = "1Y";

                    } else if (i == 2) {
                        document.getElementById("Nom_Base_GDP").value = "1Y";
                        document.getElementById("gdp2").value = "UI LPC";
                        document.getElementById("gdp2_message").value = "A4";
                    }
                }


                function groupe_auto2(groupe) {
                    var i = select2.selectedIndex;
                    console.log(i);
                    console.log(groupe);

                    if (groupe == "gdp_1y_aqu") {
                        for (c = 0; c < tablpc_Libelle.length; c++) {
                            if (c == i) {
                                console.log(tablpc_Libelle[c]);
                                document.getElementById("groupe_autorisation2").value = tablpc_Libelle[c];
                            }
                        }
                    }


                    if (groupe == "groupe_lpc") {

                        for (c = 0; c < tabaqu_Libelle.length; c++) {
                            if (c == i) {
                                console.log("titi");
                                console.log(tabaqu_Libelle[c]);
                                document.getElementById("groupe_autorisation2").value = tabaqu_Libelle[c];
                            }
                        }
                    }
                }
            </script>

            <?php

            $sql11 = "SELECT `id_habilitation` FROM `fiche_nav_etat_habilitation` WHERE `Application`= 'GDP' AND `CUID`= '" . $_SESSION['Identifiant'] .  "' ";
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



            <!-- ################   Bouton permettant d'afficher / ne pas afficher un 2 eme groupe  GDP ############## -->
            <!-- ################################################################################### -->

            <script>
                const bouton = document.getElementById('button');
                const gdp2 = document.getElementById('text');

                let Visible = true;

                bouton.addEventListener('click', () => {
                    Visible = !Visible;
                    Visible ? gdp2.classList.add('is-visible') : gdp2.classList.remove('is-visible');
                });
            </script>
            
            <style>
                .text {
                    opacity: 0;
                    visibility: hidden;
                    transition: opacity 0.2s ease-in-out, visibility 0.2s ease-in-out
                }

                .text.is-visible {
                    opacity: 1;
                    visibility: visible;
                }
            </style>


            <!-- ############################################################################### -->