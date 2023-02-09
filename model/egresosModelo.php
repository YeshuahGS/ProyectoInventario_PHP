<?php
session_start();
include_once("conexion.php");
class egresosModelo
{
    static function MostrarEgresos($desde, $por_pagina)
    {
        $codusu = $_SESSION['codigo'];
        $pdo = conexion::Conectar();
        $sql = $pdo->prepare("SELECT*FROM egresos 
        WHERE usuario = $codusu
        ORDER BY id DESC
        LIMIT $desde, $por_pagina");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function MostrarEgresosTotal()
    {
        $codusu = $_SESSION['codigo'];
        $pdo = conexion::Conectar();
        $sql = $pdo->prepare("SELECT*FROM egresos 
        WHERE usuario = $codusu
        ORDER BY id DESC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function CountMostrarEgresos()
    {
        $codusu = $_SESSION['codigo'];
        $pdo = conexion::Conectar();
        $sql = $pdo->prepare("SELECT COUNT(*) as total_registro FROM egresos 
        WHERE usuario = $codusu
        ORDER BY id DESC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }

    static function BuscadorEgresos($value, $desde, $por_pagina)
    {
        $codusu = $_SESSION['codigo'];
        $pdo = conexion::Conectar();
        $sql = $pdo->prepare("SELECT*FROM egresos 
        WHERE (descripcion like '%$value%' 
        OR fecha like '%$value%')
        AND usuario = $codusu
        ORDER BY id DESC
        LIMIT $desde, $por_pagina");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function BuscadorEgresosTotal($value)
    {
        $codusu = $_SESSION['codigo'];
        $pdo = conexion::Conectar();
        $sql = $pdo->prepare("SELECT*FROM egresos 
        WHERE (descripcion like '%$value%' 
        OR fecha like '%$value%')
        AND usuario = $codusu
        ORDER BY id DESC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }

    static function CountBuscadorEgresos($value)
    {
        $codusu = $_SESSION['codigo'];
        $pdo = conexion::Conectar();
        $sql = $pdo->prepare("SELECT COUNT(*) as total_registro FROM egresos 
        WHERE (descripcion like '%$value%' 
        OR fecha like '%$value%')
        AND usuario = $codusu
        ORDER BY id DESC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function IngresarEgresos($data){
        $codusu = $_SESSION['codigo'];
        $sql = "INSERT INTO egresos VALUES(null,'$data[descripcion]',$data[gasto],curdate(),curtime(),$codusu)";
        $ress = Conexion::conectar()->exec($sql);
        if ($ress) {
            echo "exito";
        } else {
            echo "fallo";
        }
    }
    static function EditarEgresos($id)
    {
        $sql = Conexion::conectar()->prepare("SELECT*FROM egresos 
        WHERE id = $id");
        $sql->execute();
        $ress = $sql->fetch();
        return $ress;
    }
    static function EliminarEgreos($id){
        
        $sql = "DELETE FROM egresos WHERE id = $id";
        $ress = Conexion::conectar()->exec($sql);
        if ($ress) {
            echo "exito";
        } else {
            echo "fallo";
        }
    }
    static function ActualizarEgresos($data){
        
        $sql = "UPDATE egresos SET descripcion = '$data[descripcion]', gasto = $data[gasto] WHERE id = $data[id]";
        $ress = Conexion::conectar()->exec($sql);
        if ($ress) {
            echo "exito";
        } else {
            echo "fallo";
        }
    }
}
