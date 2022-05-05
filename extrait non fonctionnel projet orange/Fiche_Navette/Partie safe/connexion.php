<?php

// Connexion à la base de donnée local
// try {
//    $bdd = new PDO('mysql:host=localhost;dbname=orange;charset=utf8', 'root', '');
// } catch (Exception $e) {
//    die('Erreur : ' . $e->getMessage());
// }



 // Connexion à la base de donnée pprod
 try {
     $bdd = new PDO('mysql:host=opphxu08.intranet-paris.francetelecom.fr;dbname=uiso_pprod_si;charset=utf8', 'uiso_si_dbo', 'RiNzyg+7');
 } catch (Exception $e) {
     die('Erreur : ' . $e->getMessage());
 }

