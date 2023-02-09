<?php
include_once("../../model/productoModelo.php");
if (isset($_POST['codigo']) && $_POST['codigo'] != "") {
    $data["sku"] = $_POST['codigo'];
}else{
   
    $data["sku"] = null;
    echo "skuProductoNull";
    die();
}
if (isset($_POST['nombre'])&& $_POST['nombre'] != "") {
    $data["nombre"] = $_POST['nombre'];
}else{
    $data["nombre"] = null;
    echo "nombreProductoNull";
    die();
}
if (isset($_POST['categoria'])&& $_POST['categoria'] != "") {
    $data["categoria_id"] = $_POST['categoria'];
}else{
    $data["categoria_id"] = null;
    echo "categoriaProductoNull";
    die();
}
if (isset($_POST['precio_compra'])&& $_POST['precio_compra'] != "") {
    $data["precio_compra"] = $_POST['precio_compra'];
}else{
    $data["precio_compra"] = null;
    echo "precio_compraProductoNull";
    die();
}
if (isset($_POST['precio_venta'])&& $_POST['precio_venta'] != "") {
    $data["precio_venta"] = $_POST['precio_venta'];
}else{
    $data["precio_venta"] = null;
    echo "precio_ventaProductoNull";
    die();
}
if (isset($_POST['stok'])&& $_POST['stok'] != "") {
    $data["stock"] = $_POST['stok'];
}else{
    $data["stock"] = null;
    echo "stockProductoNull";
    die();
}
if (isset($_POST['fecha'])&& $_POST['fecha'] != "") {
    $data["fecha"] = $_POST['fecha'];
}else{
    $data["fecha"] = null;
    echo "fechaProductoNull";
    die();
}
if (isset($_POST['multimarcaProducto'])&& $_POST['multimarcaProducto'] != "") {
    $data["multimarca"] = $_POST['multimarcaProducto'];
}else{
    $data["multimarca"] = null;
    echo "multimarcaProductoNull";
    die();
}

if (isset($_FILES['imagen']) && $_FILES['imagen']['name'] != null) {
    $file = $_FILES['imagen'];
    $filename = $file['name'];
    $mimetype = $file['type'];

    if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

        if (!is_dir('../../uploads/images')) {
            mkdir('../../uploads/images', 0777, true);
        }
        $data["imagen"] = $filename;
        move_uploaded_file($file['tmp_name'], '../../uploads/images/' . $filename);
    }
}else{
    $data["imagen"] = null;
}

$ress = ProductoModelo::IngresarProductos($data);
