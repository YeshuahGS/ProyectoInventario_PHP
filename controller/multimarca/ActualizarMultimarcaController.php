<?php
include_once("../../model/multimarcaModelo.php");
$cod = $_POST['cod'];

$nombre = $_POST['nombre'];
$comision = $_POST['comision'];
$departamentos = $_POST['departamentos'];
$provincias = $_POST['provincias'];
$distritos = $_POST['distritos'];

$data['nombre'] = $nombre;
$data['provincia'] = $provincias;
$data['distrito'] = $distritos;
$data['departamentos'] = $departamentos;
$data['comision'] = $comision;
$data['id'] = $cod;

$actualizar = multimarcaModelo::ActualizarMultimarca($data);
