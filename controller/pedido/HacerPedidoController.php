<?php
include_once("../../model/pedidosModelo.php");

if (isset($_SESSION['total'])) {
    $data['total'] = $_SESSION['total'];
} else {
    $data['total'] = "";
}


$guardarPedido = pedidosModelo::GuardarPedido($data);

//Guardar linea de pedido

$guardarLineaPedido = pedidosModelo::GuardarPedidoLinea($guardarPedido);
