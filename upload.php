<?php

if($_FILES['files']){
    $nomeTmp = $_FILES['files']['tmp_name'];
    $nomeFinal = 'assets/imagens/' . basename($_FILES['files']['name']);
    move_uploaded_file($nomeTmp, $nomeFinal);
    header("Location: admin/");
}