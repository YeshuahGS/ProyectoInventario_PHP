<?php
include_once('../../model/usuarioModelo.php');

$Mostrar = usuarioModelo::MostrarUsuariosEmail($_POST['email']);
if ($Mostrar != false) {
    if ($Mostrar['email'] == $_POST['email']) {
        echo "igual";
    }
} else if ($Mostrar == false) {
    if (isset($_POST['email']) && $_POST['email'] != "") {
        $data['email'] = $_POST['email'];
    } else {
        $data['email'] = null;
        echo ("EmailLoginNull");
        die();
    }
    if (isset($_POST['nombre_usuario']) && $_POST['nombre_usuario'] != "") {
        $data['nombre'] = $_POST['nombre_usuario'];
    } else {
        $data['nombre'] = null;
        echo ("NombreLoginNull");
        die();
    }
    if (isset($_POST['apellido_usuario']) && $_POST['apellido_usuario'] != "") {
        $data['apellidos'] = $_POST['apellido_usuario'];
    } else {
        $data['apellidos'] = null;
        echo ("ApellidoLoginNull");
        die();
    }
    if (isset($_POST['password']) && $_POST['password'] != "") {
        $data['password'] = $_POST['password'];
    } else {
        $data['password'] = null;
        echo ("PasswordLoginNull");
        die();
    }
    $registro = usuarioModelo::Registro($data);
}
