<?php
include_once("conexion.php");
session_start();
class ProductoModelo
{


    static function ListarMultimarca()
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT * FROM multimarca 
        WHERE usuario = $codusu
        ORDER BY id ASC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function ListarCategoriasProducto()
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT * FROM categorias
        WHERE usuario = $codusu
        ORDER BY id ASC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function ListarProductos($desde, $por_pagina)
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT p.*,c.nombre AS nombre_categoria, m.nombre AS multimarcanombre FROM producto p 
        INNER JOIN categorias c
        ON p.categoria_id =  c.id
        INNER JOIN multimarca m 
        ON m.id = p.multimarcaid
        WHERE p.usuario = $codusu
        ORDER BY codigo ASC
        LIMIT $desde, $por_pagina");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function ListarProductosTotales()
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT p.*,c.nombre AS nombre_categoria, m.nombre AS multimarcanombre FROM producto p 
        INNER JOIN categorias c
        ON p.categoria_id =  c.id
        INNER JOIN multimarca m 
        ON m.id = p.multimarcaid
        WHERE p.usuario = $codusu AND p.stock != 0
        ORDER BY codigo ASC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function CountListarProductos()
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT COUNT(*) as total_registro FROM producto p 
        INNER JOIN categorias c
        ON p.categoria_id =  c.id
        INNER JOIN multimarca m 
        ON m.id = p.multimarcaid
        WHERE p.usuario = $codusu
        ORDER BY codigo ASC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function BuscadorProductos($value, $desde, $por_pagina)
    {
        $codusu = $_SESSION['codigo'];
        $sql = conexion::Conectar()->prepare("SELECT p.*,c.nombre AS nombre_categoria, m.nombre AS multimarcanombre FROM producto p 
        INNER JOIN categorias c
        ON p.categoria_id =  c.id
        INNER JOIN multimarca m 
        ON m.id = p.multimarcaid
        WHERE (sku LIKE '$value%'
         OR p.nombre LIKE '$value%'
         OR c.nombre LIKE '$value%'
         OR precio_compra = '$value'
         OR precio_venta = '$value'
         OR fecha LIKE '%$value%'
         OR m.nombre LIKE '%$value%')
         AND p.usuario = $codusu
        ORDER BY codigo ASC
        LIMIT $desde, $por_pagina");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function BuscadorProductosTotales($value)
    {
        $codusu = $_SESSION['codigo'];
        $sql = conexion::Conectar()->prepare("SELECT p.*,c.nombre AS nombre_categoria, m.nombre AS multimarcanombre FROM producto p 
        INNER JOIN categorias c
        ON p.categoria_id =  c.id
        INNER JOIN multimarca m 
        ON m.id = p.multimarcaid
        WHERE (sku LIKE '%$value%'
         OR p.nombre LIKE '%$value%'
         OR c.nombre LIKE '%$value%'
         OR precio_compra = '$value'
         OR precio_venta = '$value'
         OR fecha LIKE '%$value%'
         OR m.nombre LIKE '%$value%')
         AND p.usuario = $codusu AND p.stock != 0
        ORDER BY codigo ASC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function CountBuscadorProductos($value)
    {
        $codusu = $_SESSION['codigo'];
        $sql = conexion::Conectar()->prepare("SELECT COUNT(*) AS total_registro FROM producto p 
        INNER JOIN categorias c
        ON p.categoria_id =  c.id
        INNER JOIN multimarca m 
        ON m.id = p.multimarcaid
        WHERE (sku LIKE '$value%'
         OR p.nombre LIKE '$value%'
         OR c.nombre LIKE '$value%'
         OR precio_compra = '$value'
         OR precio_venta = '$value'
         OR fecha LIKE '%$value%'
         OR m.nombre LIKE '%$value%')
         AND p.usuario = $codusu
        ORDER BY codigo ASC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function IngresarProductos($data)
    {
        $codusu = $_SESSION['codigo'];
        $sql = "INSERT INTO producto VALUES(null,'$data[sku]','$data[nombre]',$codusu,$data[categoria_id],$data[precio_compra],$data[precio_venta],$data[stock],'$data[fecha]','$data[imagen]',$data[multimarca])";
        $ress = Conexion::conectar()->exec($sql);
        if ($ress) {
            echo "exito";
        } else {
            echo "fallo";
        }
    }
    static function EditarProductos($id)
    {
        $sql = Conexion::conectar()->prepare("SELECT p.*,c.nombre AS nombre_categoria, m.nombre AS 'multimarca_nombre' FROM producto p 
        INNER JOIN categorias c
        ON p.categoria_id =  c.id 
        INNER JOIN multimarca m 
        ON m.id = p.multimarcaid WHERE codigo = $id");
        $sql->execute();
        $ress = $sql->fetch();
        return $ress;
    }
    static function EliminarProductos($id)
    {
        $sql = "DELETE FROM producto WHERE codigo = $id";
        $ress = Conexion::conectar()->exec($sql);
        if ($ress) {
            echo "exito";
        } else {
            echo "fallo";
        }
    }
    static function ActualizarProductos($data)
    {
        $sql = "UPDATE producto SET sku = '$data[sku]', nombre = '$data[nombre]', categoria_id = $data[categoria_id], precio_compra = $data[precio_compra], precio_venta = $data[precio_venta], stock = $data[stock], fecha = '$data[fecha]', imagen = '$data[imagen]', multimarcaid = $data[multimarca] WHERE codigo = $data[codigo]";
        $ress = Conexion::conectar()->exec($sql);
        if ($ress) {
            echo "exito";
        } else {
            echo "fallo";
        }
    }
}
