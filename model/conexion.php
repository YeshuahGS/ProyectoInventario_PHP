<?php 
class conexion
{
    static function Conectar(){
        try {
            $usuario = "root";
            $contraseña = "";
            $opz = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $mbd = new PDO('mysql:host=localhost;dbname=almacensoia', $usuario, $contraseña,$opz);
            return $mbd;
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }  
    }
}
