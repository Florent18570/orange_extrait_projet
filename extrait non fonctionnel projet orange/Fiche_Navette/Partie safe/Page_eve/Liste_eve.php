<?php 
require 'inc'. DIRECTORY_SEPARATOR . 'config.php';
$page['title'] = 'Liste Evenement';
// création de la variable lid   ?lid=
$page['URL']= "detail_evenements.php?lid=";
include 'tpl'.DIRECTORY_SEPARATOR.'header.php'; 

session_destroy();
session_start();
?>

  
        
  <h1 class="bg-success" >
  <div class="div_eve"> 
  <br>Récapitulatif des évènements  <br> <br> </div> </h1> <br>

  <table class="table">
    <thead class="thead-dark">
     <!-- Entête du tableau --> 
      <tr>
        <th>id</th>
        <th>Libelle</th>
        <th>Description</th>
      </tr>

      <?php $reponse = $bdd->query('SELECT * FROM evenements');
        
      // Affichage de ID,Libelle,Description_text
      while ($donnees = $reponse->fetch()){
        $lib = $donnees['ID']; ?>
        <tr>  

        <div class="couleur">
            <td scope="row"> <a href="<?php echo "detail_evenements.php?lid="; echo $donnees['ID']; ?>" > <?php echo $donnees['ID'] ?> </a> </td>
            <td scope="row"> <a href="<?php echo "detail_evenements.php?lid="; echo $donnees['ID']; ?>" > <?php echo $donnees['Libelle'] ?>  </a></td>
            <td scope="row">  <a href="<?php echo "detail_evenements.php?lid="; echo $donnees['ID']; ?>" > <?php echo $donnees['Description_text'] ?>  </a></td>
        </div>   
            <!-- Mise en place d'une nouvelle variable $_POST['ID'] (hidden = invisible) qui vaut $lib et qui est transmise à la page detail_evenement --> 
            
        </tr>
        <?php 
        }  
        $reponse->closeCursor();
        ?>
  </table>
  
  <br> <br> <br>
  
  <form method="POST" action="Index.php">                                  
    <div class="button">
      <button type="submit" class="bg-info">  Page saisie d'evenement  </button>
    </div>
  </form>

<br> <br><br> <br><br> <br><br>



   <?php require 'tpl'.DIRECTORY_SEPARATOR.'footer.php'; ?> 