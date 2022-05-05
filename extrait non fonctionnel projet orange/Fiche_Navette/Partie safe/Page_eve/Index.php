<?php 
//Appel de tout les fonctions
require 'inc'. DIRECTORY_SEPARATOR . 'config.php';
$page['title'] = 'Index';
include 'tpl'.DIRECTORY_SEPARATOR.'header.php'; 
require 'inc'. DIRECTORY_SEPARATOR . 'fonction_query.php';

//Si la variable post existe et qu'il y a quelque chose dans les 2 champs:
if(isset($_POST) ){
  if(!empty($_POST['evenements']) && !empty($_POST) ){
//Fonction requete à la bdd
  $bdd->exec(getQueryInsert("evenements",$_POST['evenements']));
  header('Location: http://localhost/Page_eve/liste_eve.php');
  exit;  
  }
}
?>

<body>
  <h1 class="bg-success" >
  <div class="div_eve">
    <div style="position: absolute; top: 0px; left: 0px;"> <img src="Logo.png"></div>
    <br>Saisie d'evenements <br> <br>
  </div>
  </h1>

  <form method="POST" action="Index.php">
  <br> <br>
    <div class="mx-auto" style="width: 250px;">
 
        <label> Libelle :  <input type="text" name="evenements[Libelle]" value="<?php if(isset($_POST['Libelle_eve'])){ echo $_POST['Libelle_eve']; } ?>" /></label>
        <!-- Si ya pas de libelle affiche une alert -->       
        <?php if(isset($_POST) && empty($_POST['Libelle_eve'])) {  ?>   <div class="alert alert-primary shadow p-3 mb-5" role="alert"> <?php echo "il manque le libelle";}  ?> </div>  
    </div> 
  <br> 
    
      <div class="mx-auto" style="width: 250px;">
      <label> Description: <br> <br>
      
      <textarea name="evenements[Description_text]" rows="6" cols="35" ><?php if(isset($_POST['Description'])){ echo $_POST['Description'] ;}?></textarea>  </label>
      <?php 
      //<!-- Si ya pas de Description affiche une alert   
      if(isset($_POST) && empty($_POST['Description'])) { ?>   <div class="alert alert-primary shadow p-3 mb-5" role="alert">  <?php  echo "il manque la description";} ?> </div>
      </div>
    
    <br> <br>

    <div class="button" >
    <button type="submit" name="go_button1" id= "go_button1" class="bg-success" >  Ajouté la saisie d'evenement  </button>
    </form>
     
    <form method="POST" action="Liste_eve.php">
      <button type="submit" class="bg-info">  Liste des évènements  </button>
      </div>
    </form>

  <!-- Footer -->
  <div class="bg-dark">
  <?php
  if(isset($_POST)){
    var_dump($_POST);
  }
require 'tpl'.DIRECTORY_SEPARATOR.'footer.php'; ?> 
</div>