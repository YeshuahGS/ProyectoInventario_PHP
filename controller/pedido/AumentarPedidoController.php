<?php
include_once("../../model/pedidosModelo.php");

if (isset($_POST['indice'])) {
    $indice = $_POST['indice'];
} else {
    $indice = null;
}
pedidosModelo::upPedido($indice);
