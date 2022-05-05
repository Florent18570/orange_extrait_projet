<?php
require 'inc' . DIRECTORY_SEPARATOR . 'config.php';
?>

<body>

  <!-- La selection permet d'afficher le header de mes pages #a3431a-->
  <section class="hero is-primary" style="background-color : #343a40">
        <div class="columns" style="font-size: 9px;">
            <div class="column is-narrow" style="padding-left: 100px">
                <br>
                <?php $page = basename($_SERVER["PHP_SELF"]); // Variable permettant de différenciel les liens des pages 
                //echo $page 
                ?>
                <?php if ($page == "modification_habilitation.php" || $page == "recap.php" || $page == "accueil.php" || $page == "supression_habilitation.php") { ?>
                    <img src="Ressource/orange.png" width="85" height="85">
                <?php } else { ?>
                    <img src="../Ressource/orange.png" width="85" height="85">
                <?php } ?>
            </div>
            
            <!-- Titre du menu header -->
            <div class="column">
                <br><br>
                <h1 class="title is-4">
                    Modification d'une habilitation
                </h1>
            </div>
        </div>
        <br>
    </section>

    <?php
    if (isset($_GET['Identifiant'])) {
        //Requete SQL pour retourner les informations d'un utilisateur
        $sql = "SELECT * FROM `fiche_nav_personnes` where  `Identifiant`= '" . $_GET['Identifiant'] . "' ";
        // echo $sql;
        $result = $bdd->query($sql);
        $evenement = $result->fetch();

        // Requete sql permettant de recherché tous les éléments des habilitations concernant 1 CUID
        $sql3 = "SELECT *  FROM `fiche_nav_etat_habilitation` WHERE  `CUID`= '" . $_GET['Identifiant']  . "' AND   (`Etat`='0'  OR  `Etat`='1' OR  `Etat`='2' OR  `Etat`='3')  ";
        $result3 = $bdd->query($sql3);

        

        //Requete SQL pour retourner les informations d'un utilisateur (UISO)
        $sql = "SELECT * FROM `fiche_nav_personnes` where  `Identifiant`= '" . $_GET['Identifiant'] . "' ";
        $result = $bdd->query($sql);

        //Condition pour retirer les messages d'erreur si l'utilisateur tape un mauvais CUID 
        if (isset($evenement['Affectation_principale']) && $evenement['Affectation_principale']!="") {
             $sql8 = "SELECT `Rôle_Métier`, `Entite` FROM `fiche_nav_metier_entite` WHERE  `Entite`= '" . $evenement['Affectation_principale']. "\r' ";
        //echo $sql8;
        $result_8 = $bdd->query($sql8); 
        
        $nombre_tour = 0;
        
        if ($evenement8 = $result_8->fetch()) {
            do {
                // requete pour comparer si Affectation principale de l'utilisateur correspond à un des entités
                $sql4 = "SELECT `Rôle_Métier`, `Entite` FROM `fiche_nav_metier_entite` WHERE  `Entite`= '" . $evenement['Affectation_principale']."\r'" ;
                
                $result4 = $bdd->query($sql4);
               
                //Affichage pour effectuer du debuggage
                if($nombre_tour == 1){
                    //echo $evenement8['Entite'];
                    //echo $sql4;
                }
                $nombre_tour++;

           } while ($evenement8 = $result_8->fetch());
        } else {
            // Si la requête n'a rien renvoyé alors on supprime la dernier caractère + le /
            if(mb_substr_count($evenement['Affectation_principale'],"/") == 6){
                $inversion = strrev($evenement['Affectation_principale']);
                //suppression des caractère jusqu'au caractère "/"
                $supp = strstr($inversion, "/");
                // echo $inversion2;
                $inversion2 = strrev($supp);
        
                //Suppresion du "/" en fin de caractère
                $suppression_dernier_caractere = rtrim($inversion2, "/");
                //echo $suppression_dernier_caractere;
                
                // requete pour comparer si Affectation principale de l'utilisateur correspond à un des entités avec la chaine modifié
                $sql4 = "SELECT `Rôle_Métier`, `Entite` FROM `fiche_nav_metier_entite` WHERE  `Entite`= '" . $suppression_dernier_caractere. "\r' ";
                // echo $sql4;
                $result4 = $bdd->query($sql4);
            }
        }
    }
    ?>

  
    <?php } ?>