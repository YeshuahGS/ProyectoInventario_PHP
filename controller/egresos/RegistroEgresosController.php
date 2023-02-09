<?php
include_once("../../model/egresosModelo.php");
if (isset($_POST['descripcion']) && $_POST['descripcion'] != "") {
    $data['descripcion'] = $_POST['descripcion'];
} else {
    $data['descripcion'] = null;
    echo "descripcionEgresosNull";
    die();
}
if (isset($_POST['monto']) && $_POST['monto'] != "") {
    $data['gasto'] = $_POST['monto'];
} else {
    $data['gasto'] = null;
    echo "montoEgresosNull";
    die();
}

egresosModelo::IngresarEgresos($data);
