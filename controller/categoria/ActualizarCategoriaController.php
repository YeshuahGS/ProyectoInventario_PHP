<?php 
include_once('../../model/categoriaModelo.php');

if (isset($_POST['codModal'])) {
    $data['id'] = $_POST['codModal'];
}else{
    $data['id'] = null;
}
if (isset($_POST['nombreModal'])) {
    $data['nombre'] = $_POST['nombreModal'];
}else{
    $data['nombre'] = null;
}

CategoriaModelo::ActualizarCategorias($data);
