<?php
  
//fonction qui permet d'insérer des valeurs dans la base de donnée

function getQueryInsert($table,$data)
{
        //var_dump($_POST);
  
        $champsDB = "";
        $valeursChamps = "" ;
    
    
    foreach($data as $key => $valeur)
    {
        if($champsDB == "" )
        {
            $champsDB = '`'. $key .'`';
        }
        else
        {
            $champsDB.=",`".$key."`";
        }

        if(empty($valeursChamps))
        {
            $valeursChamps = '"'.$valeur.'"' ;
        }
        else
        {
            $valeursChamps.=",\"".$valeur."\"";
        }

    }
    return "Insert INTO " . $table . "(" .$champsDB.") VALUES (".$valeursChamps.")";
}

 // INSERT INTO suivi(Suivi,eve_id) VALUES ('".$_POST['suivi']."', '".$_GET['lid']."')");

?>

