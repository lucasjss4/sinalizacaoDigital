<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$passwordCorreto = md5('#Camiseta123');
$emailCorreto = 'Vinicius.jsantos@outlook.com';

if(md5($password) === $passwordCorreto && $email === $emailCorreto){

    $_SESSION['login'] = "logado";
    $_SESSION['senha'] = "logado";

    $urlEnvio = "https://" . $_SERVER['HTTP_HOST'] . '/admin/envio';

    header("Location: " . $urlEnvio);
    exit();

}
?>