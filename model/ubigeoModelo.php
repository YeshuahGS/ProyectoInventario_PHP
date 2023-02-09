<?php
include_once("conexion.php");
class ubigeoModelo
{

    static function Provincia($departamentos_id)
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM provincias WHERE departamentos_id = $departamentos_id");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function Distritos($provincias_id)
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM distritos WHERE provincias_id = $provincias_id");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function Departamentos()
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM departamentos");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function ListarProvincia()
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM provincias");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function ListarDistritos()
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM distritos");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
}
