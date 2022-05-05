<?php 
require 'inc'. DIRECTORY_SEPARATOR . 'config.php';
$page['title'] = 'Détail Evenement';
  $page['URL']= "http://localhost/Page_eve/detail_evenements.php?lid=";
include 'tpl'.DIRECTORY_SEPARATOR.'header.php'; 
require 'inc'. DIRECTORY_SEPARATOR . 'fonction_query.php';
include 'inc'.DIRECTORY_SEPARATOR.'fonctions.php'; 





if(!empty($_GET['lid'])){
 //garde la valeur ID
  $variableGet = $_GET['lid']; 
  $_SESSION['ID'] = $variableGet;
  header("Refresh:0; url=detail_evenements.php");
} ?>

<body>
  <h1 class="bg-success" >
    <div class="div_eve"> <br>Détail de l'évènement<br />  <br /> </div> 
  </h1> 
        <br /> <br /><br />
  <?php
  //pointeur dans la base de donnée 
  //Utilisation de la variable transmise $_POST['ID']
  $reponse = $bdd->query("SELECT * FROM evenements WHERE id ='".$_SESSION['ID']."' ; ");
  
  //sauvegarde du pointeur dans la variable evenement
  $evenement = $reponse->fetch();
  
  if(!empty($_POST['suivi'])){

    //utilisation de la fonction insert
   
    $bdd->exec(getQueryInsert("suivi",$_POST['suivi']));
  }
  
  if(empty($evenement)){  
    echo "Il n'y a pas d'évènement";  ?>
    <?php
    goto footer;  
  }
  ?>

<!-- Affichage de la page -->
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>id</th>
      <th>Libelle</th>
      <th>Description</th>
      <th>Suivi</th>
    </tr>
  </thead>

    <?php   
      //pointeur dans la base de donnée
      $repi = $bdd->query("SELECT * FROM suivi WHERE eve_id = '".$_SESSION['ID']."' ") ;
    ?>

    <tr> 
      <td cope="col">  <?php echo $evenement['ID'] ?>  </td>
      <td scope="col">  <?php echo $evenement['Libelle'] ?>  </td>
      <td scope="col">  <?php echo $evenement['Description_text'] . '<br />' ?> </td>
      <td scope="col">  <?php

      // repi se met dans la variable rep 
    while ($rep = $repi->fetch()){
        echo $rep['Suivi'];    
        echo " <hr/> ";
      } ?>
       </td>
       </tr>
       <?php  $reponse->closeCursor(); ?>
</table>

<b style="margin-left:1em;width:1em;display:inline-block;"> Suivi: </b> <br> <br>

  <form method="POST" action="detail_evenements.php" >
    <textarea style="margin-left:1em;display:inline-block;"  name="suivi[Suivi]" rows="6" cols="35" ></textarea> 
     <!-- On fait passer la variable $_POST['ID'] dans la page detail_evenements--> 
    <br>

      <input  style="margin-left:1em;display:inline-block;" class=bouton4 type="submit" value="ADD">
      <input type="hidden" name="suivi[eve_id]" value="<?php echo $_SESSION['ID']; ?>" />
  </form>

  <form method="POST" action="modifier.php">                                
     <button style="margin-left:1em;display:inline-block;" class=bouton4 type="submit">  Modifier  </button>
  </form>


  <p> Image chargée: </p>

<?php
// Y a-il un dossier au nom de Post_ID :

  $foldername = 'Images'.DIRECTORY_SEPARATOR.'evenements'.DIRECTORY_SEPARATOR.$_SESSION['ID'];
  if( file_exists('Images'.DIRECTORY_SEPARATOR.'evenements'.DIRECTORY_SEPARATOR.$_SESSION['ID']) )
  {
    // Si oui 
    //recuperation du contenu du dossier 
    $dossier = $foldername;
    $tableau = scandir($dossier);
    ?> 
  
    <br/> <br/>

    <?php 
    $nb_image =0 ;
    foreach ($tableau as $value) {
      $lien = $dossier.'/'. $value;
          
    
      if(is_image($lien)){
        ?>
        <img src="<?php echo $lien;?> " width="200" height="200">
        <?php 
        // incrémentation du nombre d'image
        $nb_image ++;
        if($nb_image %4 !=0 ){
        // Le reste de la division (modulo)
        }
        else{
          echo "<br>"; //retour a la ligne après 4 image afficher
        }
      }
    } 
  }  ?>
 <!-- fonction Goto  -->
  <?php footer: ?>

<!-- Bouton retour -->
  <br><br>
  <input style="margin-left:1em;display:inline-block;" class=bouton4 type="button" value="Retour" onclick="window.location.href='http://localhost:8080/Page_eve/liste_eve.php'">
  <br><br><br><br><br>

<?php require 'tpl'.DIRECTORY_SEPARATOR.'footer.php'; ?>
