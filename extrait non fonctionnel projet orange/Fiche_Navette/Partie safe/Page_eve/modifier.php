<?php 
require 'inc'. DIRECTORY_SEPARATOR . 'config.php';
$page['title'] = 'Modifier Evenement';
$page['URL']= "http://localhost/Page_eve/detail_evenements.php?lid=";
include 'tpl'.DIRECTORY_SEPARATOR.'header.php'; 
require 'inc'. DIRECTORY_SEPARATOR . 'fonction_query.php';
include 'inc'.DIRECTORY_SEPARATOR.'fonctions.php'; 
?>

<body>
  <h1 class="bg-success" >
    <div class="div_eve"> <br>Modification de l'évènement<br />  <br /> </div> </h1>   <br /> <br /><br /> 
      <?php
      //pointeur dans la base de donnée 
      $reponse = $bdd->query("SELECT * FROM evenements WHERE id ='".$_SESSION['ID']."' ; ");
      //sauvegarde du pointeur dans la variable evenement
      $evenement = $reponse->fetch();     
      ?>

<!-- Affichage des champs la page -->
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th>id</th>
        <th>Libelle</th>
        <th>Description</th>
        <th>Suivi</th>
      </tr>
    </thead>

<!-- Pointeur dans la base de donnée -->
    <?php $repi = $bdd->query("SELECT * FROM suivi WHERE eve_id = '".$_SESSION['ID']."' ") ; ?>

<!-- Affichage les valeurs des champs de la page evenement -->
  <tr> 
    <td cope="col"> <?php echo $evenement['ID'] ?></td>
    <td scope="col"> <?php echo $evenement['Libelle'] ?></td>
    <td scope="col"> <?php echo $evenement['Description_text'] ?></td>
    <td scope="col"> <?php

    while ($rep = $repi->fetch())
    {
      echo $rep['Suivi'];    
      echo " <hr/> ";
    } ?> </td>
  </tr>

  <?php  $reponse->closeCursor(); ?>
</table>
  
  <?php
    /*UPDATE table SET colonne_1 = 'valeur 1', colonne_2 = 'valeur 2', colonne_3 = 'valeur 3'  WHERE condition*/
    if(!empty($_POST['modif_libelle']) && !empty($_POST['modif_description']))
    {
      
      $bdd->exec('UPDATE evenements SET Libelle = "'.$_POST["modif_libelle"].'", Description_text ='.$bdd->quote($_POST["modif_description"]).' WHERE ID ='.$_SESSION['ID'].';'); 
      $foldername ='Images'.DIRECTORY_SEPARATOR.'evenements'.DIRECTORY_SEPARATOR.$_SESSION['ID'];

      if(!empty($_FILES['monfichier']['name'])) 
      { 
        if(file_exists($foldername))
        { 
          move_uploaded_file($_FILES['monfichier']['tmp_name'],$foldername.'/'.$_FILES['monfichier']['name']); 
        }
        else 
        {
         mkdir($foldername,0777,true); 
         move_uploaded_file($_FILES['monfichier']['tmp_name'],$foldername.'/'.$_FILES['monfichier']['name']); 
        }
      } 


      header("Refresh:0; url=detail_evenements.php");

    }

     ?> 
    

    <br /><br /><br />
<!-- Formulaire comptenant modif_libelle et modif_Description  -->
<form method="POST" action="modifier.php" enctype="multipart/form-data">                                  
  <div style=" margin-left: 1em;">
    <p> libelle: </p>
    <input type="text" name="modif_libelle" value="<?php if(isset($evenement['Libelle'])){echo $evenement['Libelle']; }
    ?>" />   
      
    <p> Description: </p>
    <!-- permet de garder la variable Description_text dans le texte area -->
    <TEXTAREA name="modif_description" rows=6 cols=100><?php if(isset($evenement['Description_text'])){echo $evenement['Description_text']; }?></TEXTAREA>
  </div>
  <br>

  
  <div style="position:relative;">
		<a class='btn btn-primary' href='javascript:;'>
			Choose File...
			<input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="monfichier" value='' size="40"  onchange='$("#upload-file-info").html($(this).val());'>
		</a>
		&nbsp;
		<span class='label label-info' id="upload-file-info"></span>
	</div>

</div>
<br><br>

<br><br>
  <div>
    <button type="submit" style="margin-left:1em;width:8em;display:inline-block;" class=bouton4>  Modifier  </button>

    <!-- Bouton lien Retour -->
    <input type="button" class=bouton4 value="Retour"  style="margin-left:1em;display:inline-block;" onclick="history.go(-1)">
  </div>
 </form>
<?php require 'tpl'.DIRECTORY_SEPARATOR.'footer.php'; ?>