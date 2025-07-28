<?php

$imagens = glob('../assets/imagens/*.{jpg,jpeg,png}', GLOB_BRACE);

$origem = $_GET['origem'];

foreach ($imagens as $img) {
    $name = explode('/', $img);

    if ($name[3] === $origem) {
        unlink($img);
        $urlExcluir = "https://" . $_SERVER['HTTP_HOST'] . '/admin/retirar.php';

        header("Location: " . $urlExcluir);
        exit();
    }
}
