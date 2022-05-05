<!DOCTYPE html>
<html>
<head>
<title>teste</title>
</head>
<body>

<?php 
if(!empty($_POST))
      {
      ?> <pre> <?php print_r($_FILES)?>  </pre> 
      <?php } ?>

      <?php
 if(!empty($_FILES['monfichier']['name'])) {
    move_uploaded_file($_FILES['monfichier']['tmp_name'], 'img/'.$_FILES['monfichier']['name']);
} 
?>
<form method="POST" action="#" enctype="multipart/form-data">
<input type="file" name="monfichier" value="">
<input type="submit" name="chargement" value="charger">

<br><br><br>
<?php
$arr = array("dhqsuhqs","sdfsjd","blabla","teste",4,5,6,7);
var_dump($arr);
foreach ($arr as &$value) 
{
  ?> <br/> 
  <?php  echo $value.'<br/>';
}
?>

<img src="Images/evenements/74/Image1.png">

</body>
</html>