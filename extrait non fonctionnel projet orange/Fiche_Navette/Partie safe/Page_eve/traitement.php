<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Saisie d'evenements </title>

  <?php include 'header.php' ; ?>

</head>

<body>
<?php
if(!empty($_POST['Libelle_eve'] && !empty($_POST['Description'])) ){

  $bdd->exec("INSERT INTO evenements(Libelle, Description_text) VALUES ('".$_POST['Libelle_eve']."', '".$_POST['Description']."')");
                                                                                       
  header('Location: http://localhost/Page_eve/Index.php');
  exit;

}else{
  header('Location: http://localhost/Page_eve/Index.php?test=1');
}
?>
</body>
</html>