<?php session_start(); ?>
<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   </head>

<section class="hero is-primary is-fullheight" >   
  <div class="hero-body">
    <div class="container" >
      <div class="columns is-centered" >
        <div class="column is-5-tablet is-4-desktop is-3-widescreen"  style="width: 41%;">
          <div class="box">
            <div class="field">
              <h1  class="label" style="text-align: center" >Maintenance de la base de données : </h1>
     
              
  <!-- Condition permettant de vérifier si un utilisateur à bien selectionné un fichier CSV  -->

<?php
   if ($_SESSION["mime"] == "Mauvais_mime") { ?>
   <div id='hideMe'>
      <h2 style="background-color:red">
         <?php echo "Erreur merci de séléctionner un format de fichier Csv" ?>
      </h2>
      </div>
      <?php 
   } elseif ($_SESSION["mime"] == "bon_mime") { ?>
   <div id='hideMe'>
      <h2 style="background-color:green" >
         <?php echo "Importation Réussi ! " ?>
      </h2>
      </div>
      
<style> 
html, body {
    height:100%;
    width:100%;
    margin:0;
    padding:0;
}
#hideMe {
    -moz-animation: cssAnimation 0s ease-in 5s forwards;
    /* Firefox */
    -webkit-animation: cssAnimation 0s ease-in 5s forwards;
    /* Safari and Chrome */
    -o-animation: cssAnimation 0s ease-in 5s forwards;
    /* Opera */
    animation: cssAnimation 0s ease-in 5s forwards;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
}
@keyframes cssAnimation {
    to {
        width:0;
        height:0;
        overflow:hidden;
    }
}
@-webkit-keyframes cssAnimation {
    to {
        width:0;
        height:0;
        visibility:hidden;
    }
}

</style>




<?php 

$_SESSION["mime"]=2;
} ?>




<br>

<!-- Affichage des différents fichiers à importer -->

<form action="tampon_import.php" enctype="multipart/form-data" method="post">
   <H3> Importation des Membres des équipes (RSI/Datafactory) :</H3>
   <input type="file" multiple="multiple" name="files" />
   <input type="submit"  class="button is-small" value="Valider" name="submit" /> <!-- Add name here -->
   <input type="hidden"   name="importation" value="équipe" />
</form>
<br>
<form action="tampon_import.php" enctype="multipart/form-data" method="post">
   <H3> Importation de l'onglet "personnes" de l'intrannuaire:</H3>
   <input type="file" multiple="multiple" name="files" />
   <input type="submit"  class="button is-small" value="Valider" name="submit" /> <!-- Add name here -->
   <input type="hidden"   name="importation" value="UISO" />
</form>
<br>
<form action="tampon_import.php" enctype="multipart/form-data" method="post">
   <H3> Importation du fichier "metier_app" (filtre) :</H3>
   <input type="file" multiple="multiple" name="files" />
   <input type="submit"  class="button is-small" value="Valider" name="submit" /> <!-- Add name here -->
   <input type="hidden" name="importation" value="metier_app" />
</form>
<br>
<form action="tampon_import.php" enctype="multipart/form-data" method="post">
   <H3> Importation du fichier "metier_entité" (filtre) :</H3>
   <input type="file" multiple="multiple" name="files" />
   <input type="submit"  class="button is-small" value="Valider" name="submit" /> <!-- Add name here -->
   <input type="hidden" name="importation" value="metier_entite" />
</form>
<br>
<form action="tampon_import.php" enctype="multipart/form-data" method="post">
   <H3> Importation du fichier GDP Aquitaine" :</H3>
   <input type="file" multiple="multiple" name="files" />
   <input type="submit"  class="button is-small" value="Valider" name="submit" /> <!-- Add name here -->
   <input type="hidden" name="importation" value="GDP_aquitaine" />
</form>
<br>
<form action="tampon_import.php" enctype="multipart/form-data" method="post">
   <H3> Importation du fichier "GDP LPC" :</H3>
   <input type="file" multiple="multiple" name="files" />
   <input type="submit"  class="button is-small" value="Valider" name="submit" /> <!-- Add name here -->
   <input type="hidden" name="importation" value="GDP_LPC" />
</form>
            
            </div>
            
            </div>
</div>
        </div>
      </div>
    </div>
  </div>
</section>




