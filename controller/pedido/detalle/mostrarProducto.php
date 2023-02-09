<?php
include_once("../../../model/pedidosModelo.php");
if (isset($_POST['sku'])) {
    $sku = $_POST['sku'];
} else {
    $sku = null;
}

$productos = pedidosModelo::ListarProductos($sku);
foreach ($productos as $key => $value) :
?>
    <option value="<?= $value['codigo']; ?>">
        <?= $value['nombre']; ?>
    </option>
<?php endforeach; ?>