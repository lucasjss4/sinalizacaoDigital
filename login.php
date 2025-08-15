<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$passwordCorreto = md5($_ENV['password']);
$emailCorreto = $_ENV['email'];

if(md5($password) === $passwordCorreto && $email === $emailCorreto){

    $_SESSION['logado'] = true;
    $_SESSION['usuario_email'] = $emailCorreto;

    $urlEnvio = "https://" . $_SERVER['HTTP_HOST'] . '/admin/envio.php';

    header("Location: " . $urlEnvio);
    exit();
}else{
    $urlLoginComErro = "https://" . $_SERVER['HTTP_HOST'] . '/admin/index.php?erro=login';

    header('Location: ' . $urlLoginComErro);
    exit();
}
?>