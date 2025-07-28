<?php

$imagens = glob('../assets/imagens/*.{jpg,jpeg,png}', GLOB_BRACE);

$origem = $_GET['origem'];

foreach($imagens as $img){
    $name = explode('/', $img);
   
    if($name[3] === $origem){
        unlink($img);
        header("Location: retirar.php");
    }
}
