

<?php

/**
 *  la fonction possède une extention "d'image"?
 *  @param  $file   string  fichier a tester
 *  @return bool
 */

function is_image($file){

    // création d'un tableau (extention image)
    $extention = array('png', 'jpeg', 'jpg', 'gif');

    $fileinfo = pathinfo($file);
    
   // print_r($fileinfo);
    if(in_array($fileinfo['extension'],$extention)){
        return true;  
        }
    return false;
    }
    ?>

