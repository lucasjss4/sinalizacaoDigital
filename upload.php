<?php

if(!empty($_FILES['file']['name'][0])){
    $qtdImagens = count($_FILES['file']['name']);
    
    for($i = 0; $i < $qtdImagens; $i++){
        $nomeTmp = $_FILES['file']['tmp_name'][$i];
        $nomeFinal = 'assets/imagens/' . basename($_FILES['file']['name'][$i]);
        move_uploaded_file($nomeTmp, $nomeFinal);
    }
    
    $urlEnvio = "https://" . $_SERVER['HTTP_HOST'] . '/admin/envio.php';

    header("Location: " . $urlEnvio);
    exit();
}
