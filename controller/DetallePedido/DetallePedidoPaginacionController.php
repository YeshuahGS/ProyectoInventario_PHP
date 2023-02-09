<?php
include_once("../../model/pedidosModelo.php");

if (isset($_SESSION['idDetallePedidos'])) {
    $id = $_SESSION['idDetallePedidos'];
} else {
    echo "No se encontre el id";
}

$countDetalle = pedidosModelo::CountVerDetallePedidosModelo($id);
foreach ($countDetalle as $key => $value) {
    $total_registro = $value['total_registro'];
}

$por_pagina = 6;
if (empty($_POST['page'])) {
    $pagina = 1;
} else {
    $pagina = $_POST['page'];
}

$desde = ($pagina - 1) * $por_pagina;
$total_paginas = ceil($total_registro / $por_pagina);
$detalle = pedidosModelo::VerDetallePedidosModelo($id, $desde, $por_pagina);
if (COUNT($detalle) > 0) : ?>
    <div class="table-responsive" style="text-align: center; border:1px solid #000; justify-content: center; align-items: center">

        <table class="table table-sm">
            <thead>
                <tr>
                    <th>SKU</th>
                    <th>Numero Pedido</th>
                    <th>Producto</th>
                    <th>Precio Venta</th>
                    <th>Stock</th>
                    <th>Fecha Pedido</th>
                    <th>Hora Pedido</th>
                    <th>Multimarca</th>
                    <th>Comision</th>
                    <th>Unidades</th>
                    <th>Descuento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalle as $key => $value) : ?>
                    <tr>
                        <td><?= $value['sku']; ?></td>
                        <td><?= $value['numero pedido']; ?></td>
                        <td><?= $value['producto']; ?></td>
                        <td><?= $value['precio_venta']; ?></td>
                        <td><?= $value['stock']; ?></td>
                        <td><?= $value['fecha pedido']; ?></td>
                        <td><?= $value['hora pedido']; ?></td>
                        <td><?= $value['multimarca']; ?></td>
                        <td><?= $value['comision']; ?></td>
                        <td><?= $value['unidades']; ?></td>
                        <td><?= $value['descuento']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center my-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center ">
                    <li class="page-item-LineaPedidoPaginacion">
                        <a class="page-link-LineaPedido" page="<?= ($pagina - 1) ?>" href="#">
                            <i class="fas fa-caret-left">
                            </i>
                        </a>
                    </li>
                    <?php
                    for ($i = 1; $i <= $total_paginas; $i++) {
                        $clase_activa = "";
                        if ($i == $pagina) {
                            $clase_activa = "press";
                        }
                    ?>
                        <li class="page-item-LineaPedidoPaginacion <?= $clase_activa ?>">
                            <a class="page-link-LineaPedido" page='<?= $i ?>' href="#"><?= $i ?></a>
                        </li>
                    <?php }
                    if ($pagina < $total_paginas) {
                        $pagina++; ?>
                        <li class="page-item-LineaPedidoPaginacion"><a class="page-link-LineaPedido" page='<?= $pagina ?>' href="#"><i class="fas fa-caret-right"></i></a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
<?php else : ?>
    <div class="row">
        <div class="col-lg-12 text-center my-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center ">
                    <h1>No he encontrado ningun dato en esta busqueda!!</h1>
                </ul>
            </nav>
        </div>
    </div>
<?php endif; ?>