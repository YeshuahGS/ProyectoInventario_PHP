<?php
session_start();
include_once('../../model/usuarioModelo.php');

if (isset($_POST['correo'])) {
    $email = $_POST['correo'];
} else {
    $email = null;
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
} else {
    $password = null;
}

$data['email'] = $email;
$data['password'] = $password;

$login = usuarioModelo::Login($data);

if (count($login) > 0) {
    $_SESSION['login'] = 'Login Correcta';
    $_SESSION['codigo'] = $login['id'];
    $_SESSION['nombre_usuario'] = $login['nombre'];
    $_SESSION['apellidos_usuario'] = $login['apellidos'];
    $_SESSION['email_usuario'] = $login['email'];
    $_SESSION['password_usuario'] = $login['password'];
    $_SESSION['rol_usuario'] = $login['rol'];
    echo "exito";
}else{
    echo "fallo";
}