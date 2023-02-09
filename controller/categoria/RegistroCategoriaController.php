<?php 
include_once("../../model/categoriaModelo.php");

if (isset($_POST['nombre']) && $_POST['nombre'] != "") {
    $data['nombre'] = $_POST['nombre'];
}else{
    $data['nombre'] = null;
    echo "nombreCategoriaNull";
    die();
}

CategoriaModelo::IngresarCategorias($data);