<?php
session_start();
include_once("conexion.php");
class pedidosModelo
{

    static function ListarMultimarca()
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
        ORDER BY id DESC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }


    static function ListarProductos($sku)
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT p.*,c.nombre AS nombre_categoria FROM producto p 
        INNER JOIN categorias c
        ON p.categoria_id =  c.id
        WHERE p.usuario = $codusu
        AND p.sku = '$sku'
        ORDER BY codigo DESC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }

    static function ListarMultimarcaPorCodigo($id)
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
        and m.id = $id
        ORDER BY m.id DESC");
        $sql->execute();
        $ress = $sql->fetch();
        return $ress;
    }

    static function ListarProductosPorCodigo($id)
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT p.*,c.nombre AS nombre_categoria, p.nombre as nombre_producto FROM producto p 
        INNER JOIN categorias c
        ON p.categoria_id =  c.id
        WHERE p.usuario = $codusu
        AND p.codigo = $id
        ORDER BY p.codigo DESC");
        $sql->execute();
        $ress = $sql->fetch();
        return $ress;
    }
    static function ListaPedido($desde, $por_pagina)
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT p.id as 'idpedido', m.nombre as 'multimarca', p.fecha, p.hora, p.total, SUM(l.unidades) AS 'unidades' 
        FROM pedidos p 
        INNER JOIN lineas_pedidos l
        ON p.id = l.pedido_id
        INNER JOIN multimarca m
        ON m.id = l.multimarca_id
        WHERE p.usuario_id = $codusu
        GROUP BY p.id
        ORDER BY p.id DESC
        LIMIT $desde, $por_pagina");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function ListaPedidoTotal()
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT p.id as 'idpedido', m.nombre as 'multimarca', p.fecha, p.hora, p.total, SUM(l.unidades) AS 'unidades' 
        FROM pedidos p 
        INNER JOIN lineas_pedidos l
        ON p.id = l.pedido_id
        INNER JOIN multimarca m
        ON m.id = l.multimarca_id
        WHERE p.usuario_id = $codusu
        GROUP BY p.id
         ORDER BY p.id DESC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }

    static function CountListaPedido()
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT COUNT(*) as total_registro FROM pedidos p 
        INNER JOIN usuario u 
        ON p.usuario_id = u.id
         WHERE p.usuario_id = $codusu
         ORDER BY p.id DESC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function BuscadorListaPedido($desde, $por_pagina, $value)
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT p.id as 'idpedido', m.nombre as 'multimarca', p.fecha, p.hora, p.total, SUM(l.unidades) AS 'unidades' 
        FROM pedidos p 
        INNER JOIN lineas_pedidos l
        ON p.id = l.pedido_id
        INNER JOIN multimarca m
        ON m.id = l.multimarca_id
        WHERE (m.nombre like '%$value%' OR
        p.fecha like '%$value%' OR
        p.hora like '%$value%') 
        AND p.usuario_id = $codusu
        GROUP BY p.id
         ORDER BY p.id DESC
         LIMIT $desde, $por_pagina");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function BuscadorListaPedidoTotal($value)
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT p.id as 'idpedido', m.nombre as 'multimarca', p.fecha, p.hora, p.total, SUM(l.unidades) AS 'unidades' 
        FROM pedidos p 
        INNER JOIN lineas_pedidos l
        ON p.id = l.pedido_id
        INNER JOIN multimarca m
        ON m.id = l.multimarca_id
        WHERE (m.nombre like '%$value%' OR
        p.fecha like '%$value%' OR
        p.hora like '%$value%') 
        AND p.usuario_id = $codusu
        GROUP BY p.id
         ORDER BY p.id DESC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }
    static function BuscadorCountListaPedido($value)
    {
        $codusu = $_SESSION['codigo'];
        $sql = Conexion::conectar()->prepare("SELECT p.id AS 'idpedido', m.nombre AS 'multimarca', 
        p.fecha, p.hora, p.total, SUM(l.unidades) AS 'unidades'  
        FROM  pedidos p 
        LEFT JOIN lineas_pedidos l
        ON p.id = l.pedido_id
        LEFT JOIN multimarca m
        ON m.id = l.multimarca_id
        WHERE (m.nombre like '%$value%' OR
        p.fecha like '%$value%' OR
        p.hora like '%$value%') 
        AND p.usuario_id = $codusu
        GROUP BY p.id
         ORDER BY p.id DESC");
        $sql->execute();
        $ress = $sql->fetchAll();
        return $ress;
    }

    static function upPedido($indice)
    {
        if (isset($indice)) {
            $index = $indice;
            if ($_SESSION['carrito'][$index]['unidades'] <= ($_SESSION['carrito'][$index]['stock'] - 1)) {
                $_SESSION['carrito'][$index]['unidades']++;
            } else {

                echo "error";
            }
        }
    }
    static function downPedido($indice)
    {

        if (isset($indice)) {
            $index = $indice;
            if ($_SESSION['carrito'][$index]['unidades'] >= 2) {
                $_SESSION['carrito'][$index]['unidades']--;
            } else {
                echo "no se pueden poner unidades negativas!!";
            }
        }
    }

    static function deletePedido($indice)
    {
        if (isset($indice)) {
            $index = $indice;
            unset($_SESSION['carrito'][$index]);
        }
    }
    static function delete_allPedido()
    {
        unset($_SESSION['carrito']);
    }
    static function GuardarPedido($data)
    {
        $pdo = conexion::Conectar();
        $codusu = $_SESSION['codigo'];

        $sql = $pdo->prepare("INSERT INTO pedidos VALUES(null,$codusu,$data[total],curdate(),curtime())");

        if ($sql->execute()) {
            $ultimoID =  $pdo->lastInsertId();
        } else {
            $ultimoID = 0;
            echo $sql->errorInfo()[2];
        }

        return intval($ultimoID);
    }
    static function GuardarPedidoLinea($pedido_id)
    {
        $pdo = conexion::Conectar();
        $pedidoID = $pedido_id;

        $carrito = $_SESSION['carrito'];

        foreach ($carrito as $key => $elemento) :
            $multi = intval($elemento['id_multimarca']);
            $prod = intval($elemento['id_producto']);
            $Codpedido = $pedidoID;
            $unidades = intval($elemento['unidades']);
            $descuento = intval($elemento['descuento']);
            $comision = intval($elemento['comision']);


            $stock = intval($elemento['stock']);
            $stockRestado = $stock - $unidades;

            $sql = $pdo->prepare("INSERT INTO lineas_pedidos VALUES(null,$Codpedido,$prod,$multi,$unidades,$descuento,$comision)");
            $insert = $sql->execute();

            $update = $pdo->prepare("UPDATE producto SET stock = $stockRestado where codigo = $prod");
            $ress = $update->execute();


        endforeach;
        if (isset($ress) && $ress && isset($insert) && $insert) {
            echo "exito";

            unset($_SESSION['carrito']);
        } else {
            echo "Fallo";
        }
    }

    static function VerDetallePedidosModelo($id, $desde, $por_pagina)
    {
        $pdo = conexion::Conectar();

        $sql = $pdo->prepare("SELECT p.sku,pe.id AS 'numero pedido',l.id AS 'idLineaPedido',
        p.nombre AS producto, p.precio_venta,p.stock,pe.fecha AS 'fecha pedido',
        pe.hora AS 'hora pedido',m.nombre AS multimarca,
        m.comision,l.unidades,l.descuento FROM lineas_pedidos l 
       INNER JOIN producto p
       ON l.producto_id = p.codigo
       INNER JOIN pedidos pe
       ON l.pedido_id = pe.id
       INNER JOIN multimarca m
       ON l.multimarca_id = m.id
        WHERE l.pedido_id = $id
        LIMIT $desde, $por_pagina");
        $sql->execute();
        $ress  = $sql->fetchAll();
        return $ress;
    }
    static function CountVerDetallePedidosModelo($id)
    {
        $pdo = conexion::Conectar();

        $sql = $pdo->prepare("SELECT COUNT(*) AS total_registro  FROM lineas_pedidos l 
       INNER JOIN producto p
       ON l.producto_id = p.codigo
       INNER JOIN pedidos pe
       ON l.pedido_id = pe.id
       INNER JOIN multimarca m
       ON l.multimarca_id = m.id
        WHERE l.pedido_id = $id");
        $sql->execute();
        $ress  = $sql->fetchAll();
        return $ress;
    }
}
