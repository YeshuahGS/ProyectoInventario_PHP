<?php
include_once("conexion.php");
session_start();
class CategoriaModelo
{

    static function ListarCategorias($desde, $por_pagina)
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT * FROM categorias
        WHERE usuario = $codusu
        ORDER BY id DESC
        LIMIT $desde, $por_pagina");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function CountListarCategorias()
    {
       
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT COUNT(*) as total_registro FROM categorias
        WHERE usuario = $codusu
        ORDER BY id DESC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function IngresarCategorias($data)
    {
        $codusu = $_SESSION['codigo'];
        $sql = "INSERT INTO categorias VALUES(null,$codusu,'$data[nombre]')";
        $ress = Conexion::conectar()->exec($sql);
        if ($ress) {
            echo "exito";
        } else {
            echo "fallo";
        }
    }
    static function EditarCategorias($id)
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM categorias WHERE id = $id");
        $sql->execute();
        $ress = $sql->fetch();
        return $ress;
    }
    static function EliminarCategorias($id)
    {
        $sql = "DELETE FROM categorias WHERE id = $id";
        $ress = Conexion::conectar()->exec($sql);
        if ($ress) {
            echo "exito";
        } else {
            echo "fallo";
        }
    }
    static function ActualizarCategorias($data)
    {
        $sql = "UPDATE categorias SET nombre = '$data[nombre]' WHERE id = $data[id]";
        $ress = Conexion::conectar()->exec($sql);
        if ($ress) {
            echo "exito";
        } else {
            echo "fallo";
        }
    }
}
