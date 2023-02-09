<?php
include_once("conexion.php");
class usuarioModelo
{

    static function Login($data)
    {
        $sql = conexion::Conectar()->prepare("SELECT * FROM usuario where email = '$data[email]' and password = '$data[password]'");
        $sql->execute();
        $ress = $sql->fetch();
        return $ress;
    }
    static function MostrarUsuariosEmail($email)
    {
        $sql = conexion::Conectar()->prepare("SELECT * FROM usuario where email = '$email'");
        $sql->execute();
        $ress = $sql->fetch();
        return $ress;
    }
    static function Registro($data)
    {

        $sql = "INSERT INTO usuario VALUES(null,'$data[nombre]','$data[apellidos]','$data[email]','$data[password]','clientes')";
        $ress =  conexion::Conectar()->exec($sql);
        if ($ress) {
            echo "exito";
        } else {
            echo "error";
        };
    }
}
