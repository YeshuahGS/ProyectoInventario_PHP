<?php
session_start();
include_once("conexion.php");
class multimarcaModelo
{

    static function ListarMultimarca($desde, $por_pagina)
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT m.nombre as nombreMultimarca ,p.nombre as nombreProvincia ,d.nombre as nombreDepartamento, dis.nombre as nombreDistrito, m.comision as comision, m.id as id FROM multimarca m 
        INNER JOIN provincias p
        ON p.id =  m.provincia
        INNER JOIN departamentos d
        on d.id = m.departamentos
        INNER JOIN distritos dis
        on dis.id = m.distrito
        WHERE usuario = $codusu
        ORDER BY id DESC
        LIMIT $desde, $por_pagina");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }

    static function CountListarMultimarca()
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT COUNT(*) as total_registro FROM multimarca m 
        WHERE usuario = $codusu
        ORDER BY id DESC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function BuscadorMultimarca($value, $desde, $por_pagina)
    {
        $codusu = $_SESSION['codigo'];
        $sql = conexion::Conectar()->prepare("SELECT m.nombre as nombreMultimarca ,p.nombre as nombreProvincia ,d.nombre as nombreDepartamento, dis.nombre as nombreDistrito, m.comision as comision, m.id as id FROM multimarca m 
        INNER JOIN provincias p
        ON p.id =  m.provincia
        INNER JOIN departamentos d
        on d.id = m.departamentos
        INNER JOIN distritos dis
        on dis.id = m.distrito
        WHERE (m.nombre LIKE '$value%'
         OR m.comision = '$value'
         OR d.nombre LIKE '$value%'
         OR p.nombre LIKE '$value%'
         OR dis.nombre LIKE '$value%')
         AND m.usuario = $codusu
        ORDER BY m.id DESC
        LIMIT $desde, $por_pagina");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function CountBuscadorMultimarca($value)
    {
        $codusu = $_SESSION['codigo'];
        $sql = conexion::Conectar()->prepare("SELECT COUNT(*) AS total_registro FROM multimarca m 
        INNER JOIN provincias p
        ON p.id =  m.provincia
        INNER JOIN departamentos d
        on d.id = m.departamentos
        INNER JOIN distritos dis
        on dis.id = m.distrito
        WHERE (m.nombre LIKE '$value%'
         OR m.comision = '$value'
         OR d.nombre LIKE '$value%'
         OR p.nombre LIKE '$value%'
         OR dis.nombre LIKE '$value%')
         AND m.usuario = $codusu
        ORDER BY m.id DESC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function IngresarMultimarca($data)
    {
        $codusu = $_SESSION['codigo'];
        $sql = "INSERT INTO multimarca VALUES(null,'$data[nombre]',$data[provincias],$data[distritos],$data[departamentos],$data[comision],$codusu)";
        $ress = Conexion::conectar()->exec($sql);
        if ($ress) {
            echo "exito";
        } else {
            echo "fallo";
        }
    }
    static function EditarMultimarca($id)
    {
        $sql = Conexion::conectar()->prepare("SELECT m.nombre as nombreMultimarca ,p.nombre as nombreProvincia ,d.nombre as nombreDepartamento, dis.nombre as nombreDistrito, m.comision as comision, m.id as id  FROM multimarca m 
        INNER JOIN provincias p
        ON p.id =  m.provincia
        INNER JOIN departamentos d
        on d.id = m.departamentos
        INNER JOIN distritos dis
        on dis.id = m.distrito WHERE m.id = $id");
        $sql->execute();
        $ress = $sql->fetch();
        return $ress;
    }
    static function EliminarMultimarca($id)
    {
        $sql = "DELETE FROM multimarca WHERE id = $id";
        $ress = Conexion::conectar()->exec($sql);
        if ($ress) {
            echo "exito";
        } else {
            echo "fallo";
        }
    }
    static function ActualizarMultimarca($data)
    {
        $sql = "UPDATE multimarca SET nombre = '$data[nombre]', provincia = $data[provincia], distrito = $data[distrito], departamentos = $data[departamentos], comision = $data[comision] WHERE id = $data[id]";
        $ress = Conexion::conectar()->exec($sql);
        if ($ress) {
            echo "exito";
        } else {
            echo "fallo";
        }
    }
}
