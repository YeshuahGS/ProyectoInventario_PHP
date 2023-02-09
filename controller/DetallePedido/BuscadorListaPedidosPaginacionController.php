<?php
include_once("../../model/pedidosModelo.php");
if (isset($_SESSION['busquedaDetallePedido'])) {
    $data = $_SESSION['busquedaDetallePedido'];
} else {
    $data  = null;
}
$CountPedidos = pedidosModelo::BuscadorCountListaPedido($data);

$total_registro = COUNT($CountPedidos);


$item = null;
$valor = null;
$por_pagina = 5;
if (empty($_POST['page'])) {
    $pagina = 1;
} else {
    $pagina = $_POST['page'];
}

$desde = ($pagina - 1) * $por_pagina;
$total_paginas = ceil($total_registro / $por_pagina);
$buscador = pedidosModelo::BuscadorListaPedido($desde, $por_pagina, $data);
$total = 0;
$buscadorTotal = pedidosModelo::BuscadorListaPedidoTotal($_SESSION['busquedaDetallePedido']);

foreach ($buscadorTotal as $key => $value) {
    $total += $value['total'];
}
if ($data != "") :
if (COUNT($buscador) > 0) : ?>

    <div class="table-responsive" style="text-align: center; border:1px solid #000; justify-content: center; align-items: center;">
        <table class="table table-sm">
            <thead class="text-center">
                <tr>
                    <th>CODIGO</th>
                    <th>MULTIMARCA</th>
                    <th>FECHA</th>
                    <th>HORA</th>
                    <th>TOTAL</th>
                    <th>UNIDADES</th>
                    <th>DETALLE</th>
                </tr>
            </thead>
            <tbody class="text-center">

                <?php foreach ($buscador as $key => $value) :
                ?>
                    <tr>
                        <td><?= $value['idpedido']; ?></td>
                        <td><?= $value['multimarca']; ?></td>
                        <td><?= $value['fecha']; ?></td>
                        <td><?= $value['hora']; ?></td>
                        <td><?= $value['total']; ?></td>
                        <td><?= $value['unidades']; ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#modalDetallePedidos" id="DetallePedido" value="<?= $value['idpedido']; ?>">
                                <i class="fas fa-info-circle"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-8 text-center my-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center ">
                    <li class="page-item-ListaPedidoBusqueda">
                        <a class="page-link-ListaPedidoBusqueda" page="<?= ($pagina - 1) ?>" href="#">
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
                        <li class="page-item-ListaPedidoBusqueda <?= $clase_activa ?>">
                            <a class="page-link-ListaPedidoBusqueda" page='<?= $i ?>' href="#"><?= $i ?></a>
                        </li>
                    <?php }
                    if ($pagina < $total_paginas) {
                        $pagina++; ?>
                        <li class="page-item-ListaPedidoBusqueda"><a class="page-link-ListaPedidoBusqueda" page='<?= $pagina ?>' href="#"><i class="fas fa-caret-right"></i></a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
        <div class="col-4 text-center my-4">
            <h4>Total: S/.<?= $total; ?></h4>
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
<?php endif;
else :
    $CountPedidos = pedidosModelo::CountListaPedido();
    foreach ($CountPedidos as $key => $value) {
        $total_registro = $value['total_registro'];
    }
    $item = null;
    $valor = null;
    $por_pagina = 5;
    if (empty($_POST['page'])) {
        $pagina = 1;
    } else {
        $pagina = $_POST['page'];
    }
    $desde = ($pagina - 1) * $por_pagina;
    $total_paginas = ceil($total_registro / $por_pagina);
    $Pedidos = pedidosModelo::ListaPedido($desde, $por_pagina);
    $PedidosTotal = pedidosModelo::ListaPedidoTotal();
    $total = 0;
    if (COUNT($Pedidos) > 0) :
        foreach ($PedidosTotal as $key => $value) {
            $total += $value['total'];
        } ?>
        <div class="table-responsive" style="text-align: center; border:1px solid #000; justify-content: center; align-items: center;">

            <table class="table table-sm">
                <thead class="text-center">
                    <tr>
                        <th>CODIGO</th>
                        <th>MULTIMARCA</th>
                        <th>FECHA</th>
                        <th>HORA</th>
                        <th>TOTAL</th>
                        <th>UNIDADES</th>
                        <th>DETALLE</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                    <?php foreach ($Pedidos as $key => $value) :

                    ?>
                        <tr>
                            <td><?= $value['idpedido']; ?></td>
                            <td><?= $value['multimarca']; ?></td>
                            <td><?= $value['fecha']; ?></td>
                            <td><?= $value['hora']; ?></td>
                            <td><?= $value['total']; ?></td>
                            <td><?= $value['unidades']; ?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#modalDetallePedidos" id="DetallePedido" value="<?= $value['idpedido']; ?>">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-8 text-center my-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center ">
                        <li class="page-item-ListaPedido">
                            <a class="page-link-ListaPedido" page="<?= ($pagina - 1) ?>" href="#">
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
                            <li class="page-item-ListaPedido <?= $clase_activa ?>">
                                <a class="page-link-ListaPedido" page='<?= $i ?>' href="#"><?= $i ?></a>
                            </li>
                        <?php }
                        if ($pagina < $total_paginas) {
                            $pagina++; ?>
                            <li class="page-item-ListaPedido"><a class="page-link-ListaPedido" page='<?= $pagina ?>' href="#"><i class="fas fa-caret-right"></i></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <div class="col-4 text-center my-4">
                <h4>Total: S/.<?= $total; ?></h4>
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
<?php endif;
endif;
?>