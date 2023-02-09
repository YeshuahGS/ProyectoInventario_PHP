<?php
include_once("../../model/productoModelo.php");
$cod = $_POST['codModal'];
$pro = ProductoModelo::EditarProductos($cod);


$sku = $_POST['codigoModal'];
$nombre = $_POST['nombreModal'];
$categoria = $_POST['categoriaModal'];
$precio_compra = $_POST['precio_compraModal'];
$precio_venta = $_POST['precio_ventaModal'];
$stock = $_POST['stokModal'];
$fecha = $_POST['fechaModal'];
$multimarca = $_POST['multimarcaProducto'];

if ($_FILES['imagenModalnull']['name'] != null) {
    $file = $_FILES['imagenModalnull'];
    $filename = $file['name'];
    $mimetype = $file['type'];

    if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

        if (!is_dir('../../uploads/images')) {
            mkdir('../../uploads/images', 0777, true);
        }
        $data["imagen"] = $filename;
        move_uploaded_file($file['tmp_name'], '../../uploads/images/' . $filename);
    }
} else {
    $data["imagen"] = $_POST['imagenModalvalue'];
}

$data['sku'] = $sku;
$data['nombre'] = $nombre;
$data['categoria_id'] = $categoria;
$data['precio_compra'] = $precio_compra;
$data['precio_venta'] = $precio_venta;
$data['stock'] = $stock;
$data['fecha'] = $fecha;
$data['codigo'] = $cod;
$data['multimarca'] = $multimarca;

$actualizar = ProductoModelo::ActualizarProductos($data);
