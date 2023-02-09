<?php
include_once("../../model/productoModelo.php");
if (isset($_POST['data'])) {
    $_SESSION['busquedaProducto'] = $_POST['data'];
} else {
    $_SESSION['busquedaProducto'] = null;
}
$buscadorCount = ProductoModelo::CountBuscadorProductos($_SESSION['busquedaProducto']);

foreach ($buscadorCount as $key => $value) {
    $total_registro = $value['total_registro'];
}

$totalPrecioCompra = 0;
$totalPrecioVenta = 0;
$stock = 0;
$item = null;
$valor = null;
$por_pagina = 60;
if (empty($_POST['page'])) {
    $pagina = 1;
} else {
    $pagina = $_POST['page'];
}

$desde = ($pagina - 1) * $por_pagina;
$total_paginas = ceil($total_registro / $por_pagina);

$buscador = ProductoModelo::BuscadorProductos(
    $_SESSION['busquedaProducto'],
    $desde,
    $por_pagina
);
$totalProductos = ProductoModelo::BuscadorProductosTotales($_SESSION['busquedaProducto']);
foreach ($totalProductos as $key => $value) {
    $totalPrecioCompra += $value['precio_compra'];
    $totalPrecioVenta += $value['precio_venta'];
    $stock += $value['stock'];
}

if ($_POST['data'] != "") :
    if (COUNT($buscador) > 0) : ?>
        <br>

        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="text-center">
                    <tr>
                        <th scope="col">SKU</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">CATEGORIA</th>
                        <th scope="col">MULTIMARCA</th>
                        <th scope="col">PRECIO COMPRA</th>
                        <th scope="col">PRECIO VENTA</th>
                        <th scope="col">STOCK</th>
                        <th scope="col">FECHA</th>
                        <th scope="col">IMAGEN</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php

                    foreach ($buscador as $key => $value) :
                    ?>
                        <tr>
                            <td><?= $value["sku"] ?></td>
                            <td><?= $value["nombre"] ?></td>
                            <td><?= $value["nombre_categoria"] ?></td>
                            <td><?= $value["multimarcanombre"] ?></td>
                            <td><?= $value["precio_compra"] ?></td>
                            <td><?= $value["precio_venta"] ?></td>
                            <td><?= $value["stock"] ?></td>
                            <td><?= $value["fecha"] ?></td>
                            <td>
                                <?php
                                if (is_file("../../uploads/images/" . $value["imagen"])) : ?>
                                    <img class="img-fluid" src="uploads/images/<?= $value["imagen"] ?>" alt="" srcset="" width="50px" height="50px">
                                <?php else : ?>
                                    <img class="img-fluid" src="uploads/images/default.png" alt="" srcset="" width="50px" height="50px">
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#modaleditarproducto" id="editarproducto" value='<?= $value['codigo'] ?>'> <i class="far fa-edit" style="font-size: 30px; color: blue"> </i></a>
                                <a href="#" id="eliminarproducto" value='<?= $value['codigo'] ?>'> <i class="fas fa-trash-alt" style="font-size: 30px; color: red"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-lg-9 text-center my-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center ">
                        <li class="page-item-productos">
                            <a class="page-link-productosBuscador" page="<?= ($pagina - 1) ?>" href="#">
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
                            <li class="page-item-productos <?= $clase_activa ?>">
                                <a class="page-link-productosBuscador" page='<?= $i ?>' href="#"><?= $i ?></a>
                            </li>
                        <?php }
                        if ($pagina < $total_paginas) {
                            $pagina++; ?>
                            <li class="page-item-productos"><a class="page-link-productosBuscador" page='<?= $pagina ?>' href="#"><i class="fas fa-caret-right"></i></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-center my-4">
                <p>
                    <strong>Total Stock: </strong><?= $stock ?> UNIDADES<br>
                    <strong>Total precio compra: </strong>S/.<?= $totalPrecioCompra ?> <br>
                    <strong>Total precio venta: </strong>S/.<?= $totalPrecioVenta ?>
                </p>
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
    unset($_SESSION['busquedaProducto']);
    $productoCount = ProductoModelo::CountListarProductos();

    foreach ($productoCount as $key => $value) {
        $total_registro = $value['total_registro'];
    }
    $totalPrecioCompra = 0;
    $totalPrecioVenta = 0;
    $stock = 0;
    $item = null;
    $valor = null;
    $por_pagina = 60;
    if (empty($_POST['page'])) {
        $pagina = 1;
    } else {
        $pagina = $_POST['page'];
    }
    $desde = ($pagina - 1) * $por_pagina;
    $total_paginas = ceil($total_registro / $por_pagina);
    $producto = ProductoModelo::ListarProductos($desde, $por_pagina);
    $totalProductos = ProductoModelo::ListarProductosTotales();
    foreach ($totalProductos as $key => $value) {
        $totalPrecioCompra += $value['precio_compra'];
        $totalPrecioVenta += $value['precio_venta'];
        $stock += $value['stock'];
    }
    if (COUNT($producto) > 0) :
    ?>
        <br>

        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="text-center">
                    <tr>
                        <th scope="col">SKU</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">CATEGORIA</th>
                        <th scope="col">MULTIMARCA</th>
                        <th scope="col">PRECIO COMPRA</th>
                        <th scope="col">PRECIO VENTA</th>
                        <th scope="col">STOCK</th>
                        <th scope="col">FECHA</th>
                        <th scope="col">IMAGEN</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($producto as $key => $value) : ?>
                        <tr>
                            <td><?= $value["sku"] ?></td>
                            <td><?= $value["nombre"] ?></td>
                            <td id="nombre_categoria" value="<?= $value["nombre_categoria"] ?>"><?= $value["nombre_categoria"] ?></td>
                            <td><?= $value["multimarcanombre"] ?></td>
                            <td><?= $value["precio_compra"] ?></td>
                            <td><?= $value["precio_venta"] ?></td>
                            <td><?= $value["stock"] ?></td>
                            <td><?= $value["fecha"] ?></td>
                            <td>
                                <?php
                                if (is_file("../../uploads/images/" . $value["imagen"])) : ?>
                                    <img class="img-fluid" src="uploads/images/<?= $value["imagen"] ?>" alt="" srcset="" width="50px" height="50px">
                                <?php else : ?>
                                    <img class="img-fluid" src="uploads/images/default.png" alt="" srcset="" width="50px" height="50px">
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#modaleditarproducto" id="editarproducto" value='<?= $value['codigo'] ?>'> <i class="far fa-edit" style="font-size: 30px; color: blue"> </i></a>
                                <a href="#" id="eliminarproducto" value='<?= $value['codigo'] ?>'> <i class="fas fa-trash-alt" style="font-size: 30px; color: red"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-lg-9 text-center my-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center ">
                        <li class="page-item-productos">
                            <a class="page-link-productos" page="<?= ($pagina - 1) ?>" href="#">
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
                            <li class="page-item-productos <?= $clase_activa ?>">
                                <a class="page-link-productos" page='<?= $i ?>' href="#"><?= $i ?></a>
                            </li>
                        <?php }
                        if ($pagina < $total_paginas) {
                            $pagina++; ?>
                            <li class="page-item-productos"><a class="page-link-productos" page='<?= $pagina ?>' href="#"><i class="fas fa-caret-right"></i></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-center my-4">
                <p>
                    <strong>Total Stock: </strong><?= $stock ?> UNIDADES<br>
                    <strong>Total precio compra: </strong>S/.<?= $totalPrecioCompra ?> <br>
                    <strong>Total precio venta: </strong>S/.<?= $totalPrecioVenta ?>
                </p>
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