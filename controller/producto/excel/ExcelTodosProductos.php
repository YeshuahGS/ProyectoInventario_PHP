<?php
include_once("../../../model/productoModelo.php");

if (isset($_SESSION['busquedaProducto'])) {
    $data = $_SESSION['busquedaProducto'];
} else {
    $data = "";
}
$totalProductos = ProductoModelo::ListarProductosTotales();
$totalProductosBuscador = ProductoModelo::BuscadorProductosTotales($data);


if ($data == "") :
    header("Content-type: application/xls");
    header("Content-Disposition: attachment; filename= producto.xls");
?>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead class="text-center">
                <tr>
                    <th scope="col">SKU</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col">MULTIMARCA</th>
                    <th scope="col">PRECIO</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">FECHA</th>

                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($totalProductos as $key => $value) : ?>
                    <tr>
                        <td><?= $value["sku"] ?></td>
                        <td><?= $value["nombre"] ?></td>
                        <td><?= $value["nombre_categoria"] ?></td>
                        <td><?= $value["multimarcanombre"] ?></td>
                        <td><?= $value["precio_venta"] ?></td>
                        <td><?= $value["stock"] ?></td>
                        <td><?= $value["fecha"] ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else :
    header("Content-type: application/xls");
    header("Content-Disposition: attachment; filename= productoFiltro.xls"); ?>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead class="text-center">
                <tr>
                    <th scope="col">SKU</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col">MULTIMARCA</th>
                    <th scope="col">PRECIO</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">FECHA</th>

                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($totalProductosBuscador as $key => $value) : ?>
                    <tr>
                        <td><?= $value["sku"] ?></td>
                        <td><?= $value["nombre"] ?></td>
                        <td><?= $value["nombre_categoria"] ?></td>
                        <td><?= $value["multimarcanombre"] ?></td>
                        <td><?= $value["precio_venta"] ?></td>
                        <td><?= $value["stock"] ?></td>
                        <td><?= $value["fecha"] ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>