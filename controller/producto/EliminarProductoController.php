<?php
include_once("../../model/productoModelo.php");
if (isset($_POST['codigo'])) {
   $id = $_POST['codigo'];
}else{
    $id = null;
}
ProductoModelo::EliminarProductos($id);
?>
