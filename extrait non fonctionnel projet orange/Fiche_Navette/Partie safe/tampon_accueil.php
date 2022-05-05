<?php
session_start();

//Mise en forme d'une session pole qui permet d'identifier si
// l'utilisateur est un RSI ou un Safe
//Cette variable est utilisé tout au long de mon code
$_SESSION["Pole"] = $_POST["Pole"];
header('Location: modification_habilitation.php ' );
?>
</form>