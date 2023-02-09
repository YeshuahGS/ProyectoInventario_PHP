<?php 
include_once("../../model/egresosModelo.php");
$codigo = isset($_POST['codigo'])? $_POST['codigo']: null;

egresosModelo::EliminarEgreos($codigo);