<head>
    <meta http-equiv="Content-Type" content="text/html;">
</head>
<?php 

 session_start(); 

$mimes = array('application/vnd.ms-excel');
echo $_FILES['files']['type'];

//Condition qui autorise uniquement les fichiers en CSV pour
// l'importation des données à la base de données
if(in_array($_FILES['files']['type'],$mimes)){
    $_SESSION["mime"] = "bon_mime";

//Connexion à la base de données
$db = new PDO('mysql:host=opphxu08.intranet-paris.francetelecom.fr;dbname=uiso_pprod_si;charset=utf8', 'uiso_si_dbo', 'RiNzyg+7',
[PDO::MYSQL_ATTR_LOCAL_INFILE => true]);
echo "<pre>";

//Le fichier selection est copier dans un autre fichier pour la sécurité des données
move_uploaded_file($_FILES['files']['tmp_name'], "../fichier_a_jour/".$_FILES['files']['name']);
print_r($_FILES);
    
//Récupération du fichier copier pour être utilisé dans la requete "load data"
$path = '../fichier_a_jour/'.$_FILES['files']['name'];

//echo $_POST['importation'];


// Toutes les requete permettant d'importé des fichiers cvs à 
// la base de données

//La requete change selon le $_POST['importation'] reçu
if($_POST['importation'] == "équipe"){

//Requete permettant de vidé une table de la BDD
    $sql =$db->exec("TRUNCATE `fiche_nav_utilisateurs_outils`");
    $db->exec(
        //Requete permettant de load des données dans une table de la BDD
        sprintf("LOAD DATA local INFILE '".$path."'
                INTO TABLE fiche_nav_utilisateurs_outils
                CHARACTER SET latin1
                FIELDS TERMINATED BY ';'
                IGNORE 1 LINES 
                (Utilisateur_RSI,Utilisateur_Safe)")
               
                
    );
  
}elseif($_POST['importation'] == "metier_app"){
    $sql =$db->exec("TRUNCATE `fiche_nav_metier_app`");
    $db->exec(
        sprintf("LOAD DATA local INFILE '".$path."'
                INTO TABLE fiche_nav_metier_app
                CHARACTER SET latin1
                FIELDS TERMINATED BY ';'
                IGNORE 1 LINES 
                (Rôle_Métier_libellé_technique,Application)")
    );

}elseif($_POST['importation'] == "metier_entite"){
    $sql =$db->exec("TRUNCATE `fiche_nav_metier_entite`");
    $db->exec(
        sprintf("LOAD DATA local INFILE '".$path."'
                INTO TABLE fiche_nav_metier_entite
                CHARACTER SET latin1
                FIELDS TERMINATED BY ';'
                IGNORE 1 LINES 
                (Rôle_Métier,Entite)")
               
    );

}elseif($_POST['importation'] == "GDP_aquitaine"){
    $sql =$db->exec("TRUNCATE `fiche_nav_gdp_1y_aqu`");
    $db->exec(
        sprintf("LOAD DATA local INFILE '".$path."'
                INTO TABLE fiche_nav_gdp_1y_aqu
                CHARACTER SET latin1
                FIELDS TERMINATED BY ';'
                IGNORE 1 LINES 
                (id,Code,Libelle)")
    );
    
}elseif($_POST['importation'] == "GDP_LPC"){
    try{
  $sql =$db->exec("TRUNCATE `fiche_nav_groupe_lpc`");
    $verification = $db->exec(
        sprintf("LOAD DATA local INFILE '".$path."'
                INTO TABLE fiche_nav_groupe_lpc
                CHARACTER SET latin1
                FIELDS TERMINATED BY ';'
                IGNORE 1 LINES 
                (id,Code,Libelle)")
    );
    }catch(Exception $e){
        echo $e;
        echo $e;
    }
  

    

}elseif($_POST['importation'] == "UISO"){
    $sql =$db->exec("TRUNCATE `fiche_nav_personnes`");
    $db->exec(
        sprintf("LOAD DATA local INFILE '".$path."'
                INTO TABLE fiche_nav_personnes
                CHARACTER SET latin1
                FIELDS TERMINATED BY ';'
                IGNORE 1 LINES 
                (Opération,Identifiant,Affectation_principale,Responsable,Civilité,Nom,Prénom,Téléphone,Mobile,Mail)")
    );

}

} else {
    //Si le fichier n'est pas un CSV ne fait la requete.
  $_SESSION["mime"] = "Mauvais_mime";
}

var_dump($_SESSION["mime"]);

header('Location: ' . $_SERVER['HTTP_REFERER']);


