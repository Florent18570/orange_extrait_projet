<!-- Fonction qui permet d'affiché l'historique de l'information complémentaire RSI si 
$_POST['information'] == "historique"
sinon information complémentaire est 
une zone de texte qui est envoyé à la 
base de données lorsque l'utilisateur 
clique sur sauvegarder -->

<!-- La fonction est appelé pour chaque formulaire  -->
<?php
  #Affichage de l'historique de l'information complémentaire
  if ($_POST['information'] == "historique") { 

// requete permettant de récupérer l'information complémentaire selon une application et un CUID donné. 
$sql21 = "SELECT * FROM `fiche_nav_etat_habilitation` WHERE `Application`='" . $_POST['Application'] . "' and `CUID`= '" . $_SESSION['Identifiant'] .  "' ";


$result21 = $bdd->query($sql21);
while ($evenement21 = $result21->fetch()) {
?><tr>
      <td><label>Information complémentaire</label> </td>
      <td> <textarea name="Information_complémentaire" rows="5" cols="33">  <?php echo $evenement21['Informations_Complémentaires_RSI']  ?> </textarea> </td>
    </tr>

  <?php

#Zone de text qui est envoyé en BDD lorsque l'utilisateur clique sur "sauvegarder"
}} else { ?>
    <tr>
      
      <td><label>Information complémentaire</label> </td>
      <td> 
      <textarea name="Information_complémentaire" rows="5" cols="33"> </textarea>
    </td>
    </tr>
<?php } ?>