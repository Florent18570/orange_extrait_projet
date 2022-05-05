<?php
session_start();

require '../connexion.php';

date_default_timezone_set('UTC');
$today = date("j/n/Y");          // 10, 3, 2001


?> <br> <?php


        if (isset($_POST['tampon'])) {



          if ($_POST['tampon'] == "ACTIV") {

            //permet de faire un update de l'info supplémentaire selon id de l'app
            $sql = "SELECT `CUID` FROM `fiche_nav_activ` WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
            //   echo $sql;
            $result10 = $bdd->query($sql);
            echo $_POST['Creation_par'];

            $num_of_rows = $result10->rowCount();
            echo $num_of_rows;

            if ($num_of_rows == 0) {

              //permet de faire un update de l'info supplémentaire selon id de l'app
              $sql8 = "INSERT INTO `fiche_nav_etat_habilitation`(`CUID`, `Informations_Complémentaires_RSI`, `Etat`, `Application`, `Date`,`pris_en_charge_par`,`créé_par`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Information_complémentaire'] . "','0','" . $_POST['Application'] . "','$today','','" . $_POST['Creation_par'] . "')";
              echo $sql8;
              $result8 = $bdd->query($sql8);

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql9 = "INSERT INTO `fiche_nav_activ`(`CUID`, `adresse_postale`, `Profils`, `IMMOLINE`, `SAVOIR`, `TACT`, `VICTOR`, `Deviseur`, `Signataire`, `Domage`) 
        VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['adresse_postale'] . "','" . $_POST['Profils'] . "','" . $_POST['IMMOLINE'] . "','" . $_POST['SAVOIR'] . "','" . $_POST['TACT'] . "','" . $_POST['VICTOR'] . "','" . $_POST['Deviseur'] . "','" . $_POST['Signataire'] . "','" . $_POST['Domage'] . "')";
              // echo $sql9;
              $result9 = $bdd->query($sql9);
            } else {

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql11 = "UPDATE `fiche_nav_activ` SET `adresse_postale`='" . $_POST['adresse_postale'] . "',`Profils`='" . $_POST['Profils'] . "',`IMMOLINE`='" . $_POST['IMMOLINE'] . "',`SAVOIR`='" . $_POST['SAVOIR'] . "',`TACT`='" . $_POST['TACT'] . "',`VICTOR`='" . $_POST['VICTOR'] . "',`Deviseur`='" . $_POST['Deviseur'] . "',`Signataire`='" . $_POST['Signataire'] . "',`Domage`='" . $_POST['Domage'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
              //  echo $sql11;
              $result11 = $bdd->query($sql11);

              $sql12 = "UPDATE `fiche_nav_etat_habilitation` SET  `pris_en_charge_par`='" . "" . "', `CUID`='" . $_SESSION['Identifiant'] . "',`Informations_Complémentaires_RSI`='" . $_POST['Information_complémentaire'] . "',`Etat`='0',`Application`='" . $_POST['Application'] . "',`date`='$today', `créé_par`='" . $_POST['Creation_par'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' AND  `id_habilitation` = '" . $_POST['id_habilitation'] . "' ";
              // echo $sql12;
              $result12 = $bdd->query($sql12);
            }
          } elseif ($_POST['tampon'] == "AGILIS") {

            //permet de faire un update de l'info supplémentaire selon id de l'app
            $sql = "SELECT `CUID` FROM `fiche_nav_agilis_portaffaire` WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
            //   echo $sql;
            $result10 = $bdd->query($sql);


            $num_of_rows = $result10->rowCount();
            echo  $num_of_rows;

            if ($num_of_rows == 0) {

              echo $_POST['Creation_par'];
              //permet de faire un update de l'info supplémentaire selon id de l'app
              $sql8 = "INSERT INTO `fiche_nav_etat_habilitation`(`CUID`, `Informations_Complémentaires_RSI`, `Etat`, `Application`, `Date`,`pris_en_charge_par`,`créé_par`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Information_complémentaire'] . "','0','" . $_POST['Application'] . "','$today','','" . $_POST['Creation_par'] . "')";
              echo $sql8;
              $result8 = $bdd->query($sql8);

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql9 = "INSERT INTO `fiche_nav_agilis_portaffaire`(`CUID`, `adresse_postale`, `UI`, `Domaine`, `Type_Caff`, `CUID_manager`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['adresse_postale'] . "','" . $_POST['UI'] . "','" . $_POST['Domaine'] . "','" . $_POST['Type_Caff'] . "','" . $_POST['CUID_manager'] . "')";
              // echo $sql9;
              $result9 = $bdd->query($sql9);
            } else {
              echo $_POST['Creation_par'];
              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql11 = "UPDATE `fiche_nav_agilis_portaffaire` SET `adresse_postale`='" . $_POST['adresse_postale'] . "',`UI`='" . $_POST['UI'] . "',`Domaine`='" . $_POST['Domaine'] . "',`Type_Caff`='" . $_POST['Type_Caff'] . "',`CUID_manager`='" . $_POST['CUID_manager'] . "'  WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
              //  echo $sql11;
              $result11 = $bdd->query($sql11);

              $sql12 = "UPDATE `fiche_nav_etat_habilitation` SET `CUID`='" . $_SESSION['Identifiant'] . "',`Informations_Complémentaires_RSI`='" . $_POST['Information_complémentaire'] . "',`Etat`='0',`Application`='" . $_POST['Application'] . "',`date`='$today',  `créé_par`='" . $_POST['Creation_par'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'  AND  `id_habilitation` = '" . $_POST['id_habilitation'] . "' ";
              // echo $sql12;
              $result12 = $bdd->query($sql12);
            }
          } elseif ($_POST['tampon'] == "AUTODOC") {


            //permet de faire un update de l'info supplémentaire selon id de l'app
            $sql = "SELECT `CUID` FROM `fiche_nav_autodoc` WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
            //   echo $sql;
            $result10 = $bdd->query($sql);


            $num_of_rows = $result10->rowCount();

            if ($num_of_rows == 0) {

              //permet de faire un update de l'info supplémentaire selon id de l'app
              $sql8 = "INSERT INTO `fiche_nav_etat_habilitation`(`CUID`, `Informations_Complémentaires_RSI`, `Etat`, `Application`, `Date`,  `créé_par`)  VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Information_complémentaire'] . "','0','" . $_POST['Application'] . "','$today','" . $_POST['Creation_par'] . "')";
              echo $sql8;
              $result8 = $bdd->query($sql8);

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql9 = "INSERT INTO `fiche_nav_autodoc`(`CUID`, `Demande_habilitation`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Demande_habilitation'] . "')";
              // echo $sql9;
              $result9 = $bdd->query($sql9);
            } else {

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql11 = "UPDATE `fiche_nav_autodoc` SET `Demande_habilitation`='" . $_POST['Demande_habilitation'] . "'";
              //  echo $sql11;
              $result11 = $bdd->query($sql11);

              $sql12 = "UPDATE `fiche_nav_etat_habilitation` SET  `pris_en_charge_par`='" . "" . "', `CUID`='" . $_SESSION['Identifiant'] . "',`Informations_Complémentaires_RSI`='" . $_POST['Information_complémentaire'] . "',`Etat`='0',`Application`='" . $_POST['Application'] . "',`date`='$today', `créé_par`='" . $_POST['Creation_par'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' AND  `id_habilitation` = '" . $_POST['id_habilitation'] . "' ";
              // echo $sql12;
              $result12 = $bdd->query($sql12);
            }
          } elseif ($_POST['tampon'] == "E-TECH") {


            //permet de faire un update de l'info supplémentaire selon id de l'app
            $sql = "SELECT `CUID` FROM `fiche_nav_e-tech` WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
            //   echo $sql;
            $result10 = $bdd->query($sql);


            $num_of_rows = $result10->rowCount();

            if ($num_of_rows == 0) {

              //permet de faire un update de l'info supplémentaire selon id de l'app
              $sql8 = "INSERT INTO `fiche_nav_etat_habilitation`(`CUID`, `Informations_Complémentaires_RSI`, `Etat`, `Application`, `Date`,`pris_en_charge_par`,`créé_par`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Information_complémentaire'] . "','0','" . $_POST['Application'] . "','$today','','" . $_POST['Creation_par'] . "')";
              // echo $sql8;
              $result8 = $bdd->query($sql8);

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql9 = "INSERT INTO `fiche_nav_e-tech`(`CUID`, `Profils`, `Trigramme_GPC`, `SAVOIR`, `Groupe_Manager`, `Matrices`, `OT`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Profils'] . "','" . $_POST['Trigramme_GPC'] . "','" . $_POST['SAVOIR'] . "','" . $_POST['Groupe_Manager'] . "','" . $_POST['Matrices'] . "','" . $_POST['OT'] . "')";
              echo $sql9;
              $result9 = $bdd->query($sql9);
            } else {

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql11 = "UPDATE `fiche_nav_e-tech` SET `Profils`='" . $_POST['Profils'] . "',`Trigramme_GPC`='" . $_POST['Trigramme_GPC'] . "',`SAVOIR`='" . $_POST['SAVOIR'] . "',`Groupe_Manager`='" . $_POST['Groupe_Manager'] . "',`Matrices`='" . $_POST['Matrices'] . "',`OT`='" . $_POST['OT'] . "'  WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' ";
              //  echo $sql11;
              $result11 = $bdd->query($sql11);

              $sql12 = "UPDATE `fiche_nav_etat_habilitation` SET  `pris_en_charge_par`='" . "" . "', `CUID`='" . $_SESSION['Identifiant'] . "',`Informations_Complémentaires_RSI`='" . $_POST['Information_complémentaire'] . "',`Etat`='0',`Application`='" . $_POST['Application'] . "',`date`='$today', `créé_par`='" . $_POST['Creation_par'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' AND  `id_habilitation` = '" . $_POST['id_habilitation'] . "' ";
              // echo $sql12;
              $result12 = $bdd->query($sql12);
            }
          } elseif ($_POST['tampon'] == "GDP") {

echo $_POST['tampon'];
            //permet de faire un update de l'info supplémentaire selon id de l'app
            $sql = "SELECT `CUID` FROM `fiche_nav_gdp` WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
            //echo $sql;

            $result10 = $bdd->query($sql);


            $num_of_rows = $result10->rowCount();
            echo $num_of_rows;

            if ($num_of_rows == 0) {

              //permet de faire un update de l'info supplémentaire selon id de l'app
              $sql8 = "INSERT INTO `fiche_nav_etat_habilitation`(`CUID`, `Informations_Complémentaires_RSI`, `Etat`, `Application`, `Date`,`pris_en_charge_par`,`créé_par`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Information_complémentaire'] . "','0','" . $_POST['Application'] . "','$today','','" . $_POST['Creation_par'] . "')";
              echo $sql8;
              $result8 = $bdd->query($sql8);


              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql9 = "INSERT INTO `fiche_nav_gdp`(`CUID`, `base_gdp`, `nom_base_gdp`, `Groupe_Autorisation`, `Code_Groupe`, `base_gdp2`, `Nom_Base_GDP2`, `Groupe_autorisation2`, `Code_groupe2`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['base_gdp'] . "','" . $_POST['Nom_Base_GDP'] . "','" . $_POST['groupe_autorisation'] . "','" . $_POST['Code_groupe'] . "','" . $_POST['base_gdp2'] . "','" . $_POST['Nom_Base_GDP2'] . "','" . $_POST['Groupe_autorisation2'] . "','" . $_POST['Code_groupe2'] . "')";
              echo $sql9;
              $result9 = $bdd->query($sql9);

              if (isset($_POST["caff"])) { ?>
      <?php
                $_GET['information'] = "information";
                header("location: /Partie safe/maple.php?Identifiant=" . $_SESSION['Identifiant'] . "&result_deroulant=" . $_GET['result_deroulant'] . "&deroulant0=" . $_GET['deroulant0'] . "&deroulant1=" . $_GET['deroulant1'] . "&deroulant2=" . $_GET['deroulant2'] . "&information=" . $_GET['information']);
              }
            } else {

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql11 = "UPDATE `fiche_nav_gdp` SET `base_gdp`='" . $_POST['base_gdp'] . "',`nom_base_gdp`='" . $_POST['Nom_Base_GDP'] . "',`Groupe_Autorisation`='" . $_POST['groupe_autorisation'] . "',`Code_Groupe`='" . $_POST['Code_groupe'] . "',`base_gdp2`='" . $_POST['base_gdp2'] . "',`Nom_Base_GDP2`='" . $_POST['Nom_Base_GDP2'] . "',`Groupe_autorisation2`='" . $_POST['Groupe_autorisation2'] . "',`Code_groupe2`='" . $_POST['Code_groupe2'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' ";
              echo $sql11;
              $result11 = $bdd->query($sql11);

              $sql12 = "UPDATE `fiche_nav_etat_habilitation` SET `CUID`='" . $_SESSION['Identifiant'] . "',`Informations_Complémentaires_RSI`='" . $_POST['Information_complémentaire'] . "',`Etat`='0',`Application`='" . $_POST['Application'] . "',`date`='$today', `créé_par`='" . $_POST['Creation_par'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] .  "'   AND  `id_habilitation` = '" . $_POST['id_habilitation'] . "' ";
              echo $sql12;
              $result12 = $bdd->query($sql12);

              if (isset($_POST["caff"])) { ?>
<?php
                $_GET['information'] = "information";
                header("location: /Partie safe/maple.php?Identifiant=" . $_SESSION['Identifiant'] . "&result_deroulant=" . $_GET['result_deroulant'] . "&deroulant0=" . $_GET['deroulant0'] . "&deroulant1=" . $_GET['deroulant1'] . "&deroulant2=" . $_GET['deroulant2'] . "&information=" . $_GET['information']);
              }
            }
          } elseif ($_POST['tampon'] == "GEDAFFAIRE") {


            //permet de faire un update de l'info supplémentaire selon id de l'app
            $sql = "SELECT `CUID` FROM `fiche_nav_gedaffaire` WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
            //   echo $sql;
            $result10 = $bdd->query($sql);


            $num_of_rows = $result10->rowCount();

            if ($num_of_rows == 0) {

              //permet de faire un update de l'info supplémentaire selon id de l'app
              $sql8 = "INSERT INTO `fiche_nav_etat_habilitation`(`CUID`, `Informations_Complémentaires_RSI`, `Etat`, `Application`, `Date`,`pris_en_charge_par`,`créé_par`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Information_complémentaire'] . "','0','" . $_POST['Application'] . "','$today','','" . $_POST['Creation_par'] . "')";
              // echo $sql8;
              $result8 = $bdd->query($sql8);




              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql9 = "INSERT INTO `fiche_nav_gedaffaire`(`CUID`, `Profil`,`Demande_habilitation`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Profil'] . "','" . $_POST['Demande_habilitation'] . "')";
              echo $sql9;
              $result9 = $bdd->query($sql9);
            } else {

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql11 = "UPDATE `fiche_nav_gedaffaire` SET `Profil`='" . $_POST['Profil'] . "',`Demande_habilitation`='" . $_POST['Demande_habilitation'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' ";
              //  echo $sql11;
              $result11 = $bdd->query($sql11);

              $sql12 = "UPDATE `fiche_nav_etat_habilitation` SET  `pris_en_charge_par`='" . "" . "', `CUID`='" . $_SESSION['Identifiant'] . "',`Informations_Complémentaires_RSI`='" . $_POST['Information_complémentaire'] . "',`Etat`='0',`Application`='" . $_POST['Application'] . "',`date`='$today', `créé_par`='" . $_POST['Creation_par'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' AND  `id_habilitation` = '" . $_POST['id_habilitation'] . "' ";
              echo $sql12;
              $result12 = $bdd->query($sql12);
            }
          } elseif ($_POST['tampon'] == "GESCAF") {


            //permet de faire un update de l'info supplémentaire selon id de l'app
            $sql = "SELECT `CUID` FROM `fiche_nav_gescaf` WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
            //   echo $sql;
            $result10 = $bdd->query($sql);


            $num_of_rows = $result10->rowCount();

            if ($num_of_rows == 0) {

              //permet de faire un update de l'info supplémentaire selon id de l'app
              $sql8 = "INSERT INTO `fiche_nav_etat_habilitation`(`CUID`, `Informations_Complémentaires_RSI`, `Etat`, `Application`, `Date`,`pris_en_charge_par`,`créé_par`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Information_complémentaire'] . "','0','" . $_POST['Application'] . "','$today','','" . $_POST['Creation_par'] . "')";
              // echo $sql8;
              $result8 = $bdd->query($sql8);

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql9 = "INSERT INTO `fiche_nav_gescaf`(`CUID`, `UI`,`Profil`, `CODE_GDP`,`Profil_supplémentaire`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['UI'] . "','" . $_POST['Profil'] . "','" . $_POST['CODE_GDP'] . "','" . $_POST['Profil_supplémentaire'] . "')";
              echo $sql9;
              $result9 = $bdd->query($sql9);
            } else {

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql11 = "UPDATE `fiche_nav_gescaf` SET `UI`='" . $_POST['UI'] . "',`CODE_GDP`='" . $_POST['CODE_GDP'] . "',`Profil_supplémentaire`='" . $_POST['Profil_supplémentaire'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' ";
              //  echo $sql11;
              $result11 = $bdd->query($sql11);

              $sql12 = "UPDATE `fiche_nav_etat_habilitation` SET  `pris_en_charge_par`='" . "" . "', `CUID`='" . $_SESSION['Identifiant'] . "',`Informations_Complémentaires_RSI`='" . $_POST['Information_complémentaire'] . "',`Etat`='0',`Application`='" . $_POST['Application'] . "',`date`='$today', `créé_par`='" . $_POST['Creation_par'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' AND  `id_habilitation` = '" . $_POST['id_habilitation'] . "' ";
              // echo $sql12;
              $result12 = $bdd->query($sql12);
            }
          } elseif ($_POST['tampon'] == "GPC") {


            //permet de faire un update de l'info supplémentaire selon id de l'app
            $sql = "SELECT `CUID` FROM `fiche_nav_gpc` WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
            //   echo $sql;
            $result10 = $bdd->query($sql);


            $num_of_rows = $result10->rowCount();

            if ($num_of_rows == 0) {

              //permet de faire un update de l'info supplémentaire selon id de l'app
              $sql8 = "INSERT INTO `fiche_nav_etat_habilitation`(`CUID`, `Informations_Complémentaires_RSI`, `Etat`, `Application`, `Date`,`pris_en_charge_par`,`créé_par`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Information_complémentaire'] . "','0','" . $_POST['Application'] . "','$today','','" . $_POST['Creation_par'] . "')";
              echo $sql8;
              // echo $_POST['Creation_par'];
              $result8 = $bdd->query($sql8);

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql9 = "INSERT INTO `fiche_nav_gpc`(`CUID`, `Profils`,`Type_Utilisateur`, `Demande_habilitation`,`Profil_Similaire`,`Profil_Technicien`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Profils'] . "','" . $_POST['Type_Utilisateur'] . "','" . $_POST['Demande_habilitation'] . "','" . $_POST['Profil_Similaire'] . "','" . $_POST['Profil_Technicien'] . "')";
              // echo $sql9;
              $result9 = $bdd->query($sql9);
            } else {

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql11 = "UPDATE `fiche_nav_gpc` SET `Profils`='" . $_POST['Profils'] . "',`Type_Utilisateur`='" . $_POST['Type_Utilisateur'] . "',`Demande_habilitation`='" . $_POST['Demande_habilitation'] . "',`Profil_Similaire`='" . $_POST['Profil_Similaire'] . "' ,`Profil_Technicien`='" . $_POST['Profil_Technicien'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' ";
              echo $sql11;
              $result11 = $bdd->query($sql11);

              $sql12 = "UPDATE `fiche_nav_etat_habilitation` SET  `pris_en_charge_par`='" . "" . "', `CUID`='" . $_SESSION['Identifiant'] . "',`Informations_Complémentaires_RSI`='" . $_POST['Information_complémentaire'] . "',`Etat`='0',`Application`='" . $_POST['Application'] . "',`date`='$today', `créé_par`='" . $_POST['Creation_par'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' AND  `id_habilitation` = '" . $_POST['id_habilitation'] . "' ";
              echo $sql12;
              $result12 = $bdd->query($sql12);
            }
          } elseif ($_POST['tampon'] == "LIVEDOC") {


            //permet de faire un update de l'info supplémentaire selon id de l'app
            $sql = "SELECT `CUID` FROM `fiche_nav_livedoc` WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
            //   echo $sql;
            $result10 = $bdd->query($sql);


            echo $num_of_rows = $result10->rowCount();

            if ($num_of_rows == 0) {

              //permet de faire un update de l'info supplémentaire selon id de l'app
              $sql8 = "INSERT INTO `fiche_nav_etat_habilitation`(`CUID`, `Informations_Complémentaires_RSI`, `Etat`, `Application`, `Date`,`pris_en_charge_par`,`créé_par`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Information_complémentaire'] . "','0','" . $_POST['Application'] . "','$today','','" . $_POST['Creation_par'] . "')";

              $result8 = $bdd->query($sql8);

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql9 = "INSERT INTO `fiche_nav_livedoc`(`CUID`, `Profil`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Role'] . "')";
       //echo $sql9;
               $result9 = $bdd->query($sql9);
            } else {

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql11 = "UPDATE `fiche_nav_livedoc` SET `Role`='" . $_POST['Role'] . "' ";
              //echo $sql11;
              $result11 = $bdd->query($sql11);

              $sql12 = "UPDATE `fiche_nav_etat_habilitation` SET  `pris_en_charge_par`='" . "" . "', `CUID`='" . $_SESSION['Identifiant'] . "',`Informations_Complémentaires_RSI`='" . $_POST['Information_complémentaire'] . "',`Etat`='0',`Application`='" . $_POST['Application'] . "',`date`='$today', `créé_par`='" . $_POST['Creation_par'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' AND  `id_habilitation` = '" . $_POST['id_habilitation'] . "' ";
              // echo $sql12;
              $result12 = $bdd->query($sql12);
            }
          } elseif ($_POST['tampon'] == "MAPLE") {


            //permet de faire un update de l'info supplémentaire selon id de l'app
            $sql = "SELECT `CUID` FROM `fiche_nav_maple` WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
            echo $sql;
            $result10 = $bdd->query($sql);


            $num_of_rows = $result10->rowCount();
            echo $num_of_rows;
            if ($num_of_rows == 0) {

              //permet de faire un update de l'info supplémentaire selon id de l'app
              $sql8 = "INSERT INTO `fiche_nav_etat_habilitation`(`CUID`, `Informations_Complémentaires_RSI`, `Etat`, `Application`, `Date`,`pris_en_charge_par`,`créé_par`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Information_complémentaire'] . "','0','" . $_POST['Application'] . "','$today','','" . $_POST['Creation_par'] . "')";

              echo $_POST['Creation_par'];
		echo $sql8;
              $result8 = $bdd->query($sql8);

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql9 = "INSERT INTO `fiche_nav_maple`(`CUID`, `Profil`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Profil'] . "')";
              echo $sql9;
              $result9 = $bdd->query($sql9);
            } else {

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql11 = "UPDATE `fiche_nav_maple` SET `Profil`='" . $_POST['Profil'] . "' ";
              echo $sql11;
              $result11 = $bdd->query($sql11);

              $sql12 = "UPDATE `fiche_nav_etat_habilitation` SET  `pris_en_charge_par`='" . "" . "', `CUID`='" . $_SESSION['Identifiant'] . "',`Informations_Complémentaires_RSI`='" . $_POST['Information_complémentaire'] . "',`Etat`='0',`Application`='" . $_POST['Application'] . "',`date`='$today', `créé_par`='" . $_POST['Creation_par'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' AND  `id_habilitation` = '" . $_POST['id_habilitation'] . "' ";
              echo $sql12;
              $result12 = $bdd->query($sql12);
            }
          } elseif ($_POST['tampon'] == "MOBI") {


            //permet de faire un update de l'info supplémentaire selon id de l'app
            $sql = "SELECT `CUID` FROM `fiche_nav_mobi` WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
            //   echo $sql;
            $result10 = $bdd->query($sql);


            $num_of_rows = $result10->rowCount();

            if ($num_of_rows == 0) {

              //permet de faire un update de l'info supplémentaire selon id de l'app
              $sql8 = "INSERT INTO `fiche_nav_etat_habilitation`(`CUID`, `Informations_Complémentaires_RSI`, `Etat`, `Application`, `Date`,`pris_en_charge_par`,`créé_par`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Information_complémentaire'] . "','0','" . $_POST['Application'] . "','$today','','" . $_POST['Creation_par'] . "')";

              echo $_POST['Creation_par'];
              $result8 = $bdd->query($sql8);

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql9 = "INSERT INTO `fiche_nav_mobi`(`CUID`, `Base_GPC`,`Demande_habilitation`, `Fonction_soutien`,`Fonction_redacteur`,`nombre_OT_communicable`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Base_GPC'] . "','" . $_POST['Demande_habilitation'] . "','" . $_POST['Fonction_soutien'] . "','" . $_POST['Fonction_redacteur'] . "','" . $_POST['nombre_OT_communicable'] . "')";
              echo $sql9;
              $result9 = $bdd->query($sql9);
            } else {

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql11 = "UPDATE `fiche_nav_mobi` SET `Base_GPC`='" . $_POST['Base_GPC'] . "',`Demande_habilitation`='" . $_POST['Demande_habilitation'] . "',`Fonction_soutien`='" . $_POST['Fonction_soutien'] . "',`Fonction_redacteur`='" . $_POST['Fonction_redacteur'] . "' ,`nombre_OT_communicable`='" . $_POST['nombre_OT_communicable'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' ";
              echo $sql11;
              $result11 = $bdd->query($sql11);

              $sql12 = "UPDATE `fiche_nav_etat_habilitation` SET  `pris_en_charge_par`='" . "" . "', `CUID`='" . $_SESSION['Identifiant'] . "',`Informations_Complémentaires_RSI`='" . $_POST['Information_complémentaire'] . "',`Etat`='0',`Application`='" . $_POST['Application'] . "',`date`='$today', `créé_par`='" . $_POST['Creation_par'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' AND  `id_habilitation` = '" . $_POST['id_habilitation'] . "' ";
              echo $sql12;
              $result12 = $bdd->query($sql12);
            }
          } elseif ($_POST['tampon'] == "OINE") {


            //permet de faire un update de l'info supplémentaire selon id de l'app
            $sql = "SELECT `CUID` FROM `fiche_nav_oine` WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
            //   echo $sql;
            $result10 = $bdd->query($sql);


            $num_of_rows = $result10->rowCount();

            if ($num_of_rows == 0) {

              //permet de faire un update de l'info supplémentaire selon id de l'app
              $sql8 = "INSERT INTO `fiche_nav_etat_habilitation`(`CUID`, `Informations_Complémentaires_RSI`, `Etat`, `Application`, `Date`,`pris_en_charge_par`,`créé_par`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Information_complémentaire'] . "','0','" . $_POST['Application'] . "','$today','','" . $_POST['Creation_par'] . "')";
              echo $_POST['Creation_par'];
              $result8 = $bdd->query($sql8);

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql9 = "INSERT INTO `fiche_nav_oine`(`CUID`, `Profil_Utilisateur`,`Entités_Autorisées`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Profil_Utilisateur'] . "','" . $_POST['Entités_Autorisées'] . "')";
              echo $sql9;
              $result9 = $bdd->query($sql9);
            } else {

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql11 = "UPDATE `fiche_nav_oine` SET `Profil_Utilisateur`='" . $_POST['Profil_Utilisateur'] . "',`Entités_Autorisées`='" . $_POST['Entités_Autorisées'] . "'";
              //  echo $sql11;
              $result11 = $bdd->query($sql11);

              $sql12 = "UPDATE `fiche_nav_etat_habilitation` SET  `pris_en_charge_par`='" . "" . "', `CUID`='" . $_SESSION['Identifiant'] . "',`Informations_Complémentaires_RSI`='" . $_POST['Information_complémentaire'] . "',`Etat`='0',`Application`='" . $_POST['Application'] . "',`date`='$today', `créé_par`='" . $_POST['Creation_par'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' AND  `id_habilitation` = '" . $_POST['id_habilitation'] . "' ";
              echo $sql12;
              $result12 = $bdd->query($sql12);
            }
          } elseif ($_POST['tampon'] == "PHARAON") {


            //permet de faire un update de l'info supplémentaire selon id de l'app
            $sql = "SELECT `CUID` FROM `fiche_nav_pharaon` WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
            //   echo $sql;
            $result10 = $bdd->query($sql);


            $num_of_rows = $result10->rowCount();

            if ($num_of_rows == 0) {

              //permet de faire un update de l'info supplémentaire selon id de l'app
              $sql8 = "INSERT INTO `fiche_nav_etat_habilitation`(`CUID`, `Informations_Complémentaires_RSI`, `Etat`, `Application`, `Date`,`pris_en_charge_par`,`créé_par`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Information_complémentaire'] . "','0','" . $_POST['Application'] . "','$today','','" . $_POST['Creation_par'] . "')";
              echo $_POST['Creation_par'];
              $result8 = $bdd->query($sql8);

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql9 = "INSERT INTO `fiche_nav_pharaon`(`CUID`, `Demande_habilitation`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Demande_habilitation'] . "')";
              echo $sql9;
              $result9 = $bdd->query($sql9);
            } else {

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql11 = "UPDATE `fiche_nav_pharaon` SET `Demande_habilitation`='" . $_POST['Demande_habilitation'] . "'";
              echo $sql11;
              $result11 = $bdd->query($sql11);

              $sql12 = "UPDATE `fiche_nav_etat_habilitation` SET  `pris_en_charge_par`='" . "" . "', `CUID`='" . $_SESSION['Identifiant'] . "',`Informations_Complémentaires_RSI`='" . $_POST['Information_complémentaire'] . "',`Etat`='0',`Application`='" . $_POST['Application'] . "',`date`='$today', `créé_par`='" . $_POST['Creation_par'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' AND  `id_habilitation` = '" . $_POST['id_habilitation'] . "' ";
              echo $sql12;
              $result12 = $bdd->query($sql12);
            }
          } elseif ($_POST['tampon'] == "SPI") {


            //permet de faire un update de l'info supplémentaire selon id de l'app
            $sql = "SELECT `CUID` FROM `fiche_nav_spi` WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
            //   echo $sql;
            $result10 = $bdd->query($sql);


            $num_of_rows = $result10->rowCount();

            if ($num_of_rows == 0) {

              //permet de faire un update de l'info supplémentaire selon id de l'app
              $sql8 = "INSERT INTO `fiche_nav_etat_habilitation`(`CUID`, `Informations_Complémentaires_RSI`, `Etat`, `Application`, `Date`,`pris_en_charge_par`,`créé_par`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Information_complémentaire'] . "','0','" . $_POST['Application'] . "','$today','','" . $_POST['Creation_par'] . "')";

              echo $_POST['Creation_par'];
              $result8 = $bdd->query($sql8);

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql9 = "INSERT INTO `fiche_nav_spi`(`CUID`, `UI`,`Role`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['UI'] . "','" . $_POST['Role'] . "')";
              // echo $sql9;
              $result9 = $bdd->query($sql9);
            } else {

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql11 = "UPDATE `fiche_nav_spi` SET `UI`='" . $_POST['UI'] . "', `Role`='" . $_POST['Role'] . "' ";
              echo $sql11;
              $result11 = $bdd->query($sql11);

              $sql12 = "UPDATE `fiche_nav_etat_habilitation` SET  `pris_en_charge_par`='" . "" . "', `CUID`='" . $_SESSION['Identifiant'] . "',`Informations_Complémentaires_RSI`='" . $_POST['Information_complémentaire'] . "',`Etat`='0',`Application`='" . $_POST['Application'] . "',`date`='$today', `créé_par`='" . $_POST['Creation_par'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' AND  `id_habilitation` = '" . $_POST['id_habilitation'] . "' ";
              echo $sql12;
              $result12 = $bdd->query($sql12);
            }
          } elseif ($_POST['tampon'] == "PIDI") {

            //permet de faire un update de l'info supplémentaire selon id de l'app
            $sql = "SELECT `CUID` FROM `fiche_nav_PIDI` WHERE `CUID`= '" . $_SESSION['Identifiant'] . "'";
            //   echo $sql;
            $result10 = $bdd->query($sql);


            $num_of_rows = $result10->rowCount();

            if ($num_of_rows == 0) {

              //permet de faire un update de l'info supplémentaire selon id de l'app
              $sql8 = "INSERT INTO `fiche_nav_etat_habilitation`(`CUID`, `Informations_Complémentaires_RSI`, `Etat`, `Application`, `Date`,`pris_en_charge_par`,`créé_par`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Information_complémentaire'] . "','0','" . $_POST['Application'] . "','$today','','" . $_POST['Creation_par'] . "')";

              echo $_POST['Creation_par'];
              $result8 = $bdd->query($sql8);

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql9 = "INSERT INTO `fiche_nav_pidi`(`CUID`, `Demande_habilitation`) VALUES ('" . $_SESSION['Identifiant'] . "','" . $_POST['Demande_habilitation'] . "')";
              // echo $sql9;
              $result9 = $bdd->query($sql9);
            } else {

              //Requete permettant d'alimenté ce que l'utilisateur à saisi dans le bouton activ
              $sql11 = "UPDATE `fiche_nav_pidi` SET `Demande_habilitation`='" . $_POST['Demande_habilitation'] . "' ";
              echo $sql11;
              $result11 = $bdd->query($sql11);

              $sql12 = "UPDATE `fiche_nav_etat_habilitation` SET  `pris_en_charge_par`='" . "" . "', `CUID`='" . $_SESSION['Identifiant'] . "',`Informations_Complémentaires_RSI`='" . $_POST['Information_complémentaire'] . "',`Etat`='0',`Application`='" . $_POST['Application'] . "',`date`='$today', `créé_par`='" . $_POST['Creation_par'] . "' WHERE `CUID`= '" . $_SESSION['Identifiant'] . "' AND  `id_habilitation` = '" . $_POST['id_habilitation'] . "' ";
              echo $sql12;
              $result12 = $bdd->query($sql12);
            }
          }
        }
      
     header("location: ../modification_habilitation.php?Identifiant=" . $_SESSION['Identifiant'] . "&result_deroulant=");
?>