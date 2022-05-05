<?php
  
//fonction qui permet d'insérer des valeurs dans la base de donnée

function getQuerySelect($table,$data)
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
    return "Select" (".$champsDB.") FROM ."$table". WHERE  }

// SELECT * FROM suivi WHERE eve_id = '".$_POST['ID']."' "

?>
