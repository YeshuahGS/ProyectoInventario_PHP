<?php
include_once("../../model/multimarcaModelo.php");
if (isset($_POST['nombre']) && $_POST['nombre'] != "") {
    $nombre = $_POST['nombre'];
} else {
    $nombre = null;
    echo "NombreMultimarcaNull";
    die();
}
if (isset($_POST['comision']) && $_POST['comision'] != "") {
    $comision = $_POST['comision'];
} else {
    $comision = null;
    echo "ComisionMultimarcaNull";
    die();
}
if (isset($_POST['departamentos']) && $_POST['departamentos'] != "" && $_POST['departamentos'] != "departamentonull") {
    $departamentos = $_POST['departamentos'];
} else {
    $departamentos = null;
    echo "DepartamentosMultimarcaNull";
    die();
}
if (isset($_POST['provincias']) && $_POST['provincias'] != "" && $_POST['provincias'] != "provincianull") {
    $provincias = $_POST['provincias'];
} else {
    $provincias = null;
    echo "ProvinciasMultimarcaNull";
    die();
}
if (isset($_POST['distritos']) && $_POST['distritos'] != "" && $_POST['distritos'] != "distritonull") {
    $distritos = $_POST['distritos'];
} else {
    $distritos = null;
    echo "distritosMultimarcaNull";
    die();
}

$data["nombre"] = $nombre;
$data["comision"] = $comision;
$data["departamentos"] = $departamentos;
$data["provincias"] = $provincias;
$data["distritos"] = $distritos;


$ress = MultimarcaModelo::IngresarMultimarca($data);
