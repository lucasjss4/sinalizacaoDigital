<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$passwordCorreto = md5('#Camiseta123');
$emailCorreto = 'Vinicius.jsantos@outlook.com';

if(md5($password) === $passwordCorreto && $email === $emailCorreto){

    $_SESSION['logado'] = true;
    $_SESSION['usuario_email'] = $emailCorreto;

    $urlEnvio = "https://" . $_SERVER['HTTP_HOST'] . '/admin/envio';

    header("Location: " . $urlEnvio);
    exit();
}else{
    $urlLoginComErro = "https://" . $_SERVER['HTTP_HOST'] . 'admin/index.php?erro=login';

    header('Location: ' . $urlLoginComErro);
    exit();
}
?>