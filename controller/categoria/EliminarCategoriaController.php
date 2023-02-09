<?php 
include_once("../../model/categoriaModelo.php");
if (isset($_POST['codigo'])) {
   $cod = $_POST['codigo'];
} else{
    $cod = null;
}

CategoriaModelo::EliminarCategorias($cod);
