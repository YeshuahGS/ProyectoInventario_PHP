<?php 
include_once("../../model/egresosModelo.php");
$data["id"] = isset($_POST['id'])? $_POST['id']: null;
$data["descripcion"] = isset($_POST['descripcion'])? $_POST['descripcion']: null;
$data["gasto"] = isset($_POST['monto'])? $_POST['monto']: null;

egresosModelo::ActualizarEgresos($data);