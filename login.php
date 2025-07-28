<?php
ini_set('session.save_path', __DIR__.'/sessions');

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$passwordCorreto = md5('#Camiseta123');
$emailCorreto = 'Vinicius.jsantos@outlook.com';

if(md5($password) === $passwordCorreto && $email === $emailCorreto){

    $_SESSION['login'] = "logado";
    $_SESSION['senha'] = "logado";

    header("Location: admin/envio");
    exit;
}