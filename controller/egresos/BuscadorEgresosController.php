<?php
include_once("../../model/egresosModelo.php");
if (isset($_POST['data'])) {
    $_SESSION['busquedaEgresos'] = $_POST['data'];
} else {
    $_SESSION['busquedaEgresos'] = null;
}
$buscadorCount = egresosModelo::CountBuscadorEgresos($_SESSION['busquedaEgresos']);
foreach ($buscadorCount as $key => $value) {
    $total_registro = $value['total_registro'];
}
$item = null;
$valor = null;
$totalGasto = 0;
$por_pagina = 6;
if (empty($_POST['page'])) {
    $pagina = 1;
} else {
    $pagina = $_POST['page'];
}

$desde = ($pagina - 1) * $por_pagina;
$total_paginas = ceil($total_registro / $por_pagina);

$egresos = egresosModelo::BuscadorEgresos($_SESSION['busquedaEgresos'], $desde, $por_pagina);
$egresosTotal = egresosModelo::BuscadorEgresosTotal($_SESSION['busquedaEgresos']);

foreach ($egresosTotal as $key => $value) {
    $totalGasto += $value["gasto"];
}
if ($_POST['data'] != "") :
    if (COUNT($egresos) > 0) :
?>
        <br>

        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">DESCRIPCION</th>
                        <th scope="col">GASTO</th>
                        <th scope="col">FECHA</th>
                        <th scope="col">HORA</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($egresos as $key => $value) : ?>
                        <tr>
                            <td><?= $value["id"] ?></td>
                            <td><?= $value["descripcion"] ?></td>
                            <td><?= $value["gasto"] ?></td>
                            <td><?= $value["fecha"] ?></td>
                            <td><?= $value["hora"] ?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#modaleditaregreso" id="editaregreso" value='<?= $value['id'] ?>'> <i class="far fa-edit" style="font-size: 30px; color: blue"> </i></a>
                                <a href="#" id="eliminaregreso" value='<?= $value['id'] ?>'> <i class="fas fa-trash-alt" style="font-size: 30px; color: red"></i></a>
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
                        <li class="page-item-egreso">
                            <a class="page-link-egresoPaginacion" page="<?= ($pagina - 1) ?>" href="#">
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
                            <li class="page-item-egreso <?= $clase_activa ?>">
                                <a class="page-link-egresoPaginacion" page='<?= $i ?>' href="#"><?= $i ?></a>
                            </li>
                        <?php }
                        if ($pagina < $total_paginas) {
                            $pagina++; ?>
                            <li class="page-item-egreso"><a class="page-link-egresoPaginacion" page='<?= $pagina ?>' href="#"><i class="fas fa-caret-right"></i></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-center my-4">
                <p>
                    <strong>Total precio compra: </strong>S/.<?= $totalGasto  ?> <br>
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
    $egresosCount = egresosModelo::CountMostrarEgresos();

    foreach ($egresosCount as $key => $value) {
        $total_registro = $value['total_registro'];
    }
    $item = null;
    $valor = null;
    $totalGasto = 0;

    $por_pagina = 6;
    if (empty($_POST['page'])) {
        $pagina = 1;
    } else {
        $pagina = $_POST['page'];
    }
    $desde = ($pagina - 1) * $por_pagina;
    $total_paginas = ceil($total_registro / $por_pagina);
    $egresos = egresosModelo::MostrarEgresos($desde, $por_pagina);
    $egresosTotal = egresosModelo::MostrarEgresosTotal();
    foreach ($egresosTotal as $key => $value) {
        $totalGasto += $value["gasto"];
    }
    if (COUNT($egresos) > 0) :
    ?>
        <br>

        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">DESCRIPCION</th>
                        <th scope="col">GASTO</th>
                        <th scope="col">FECHA</th>
                        <th scope="col">HORA</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($egresos as $key => $value) : ?>
                        <tr>
                            <td><?= $value["id"] ?></td>
                            <td><?= $value["descripcion"] ?></td>
                            <td><?= $value["gasto"] ?></td>
                            <td><?= $value["fecha"] ?></td>
                            <td><?= $value["hora"] ?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#modaleditaregreso" id="editaregreso" value='<?= $value['id'] ?>'> <i class="far fa-edit" style="font-size: 30px; color: blue"> </i></a>
                                <a href="#" id="eliminaregreso" value='<?= $value['id'] ?>'> <i class="fas fa-trash-alt" style="font-size: 30px; color: red"></i></a>
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
                        <li class="page-item-egreso">
                            <a class="page-link-egreso" page="<?= ($pagina - 1) ?>" href="#">
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
                            <li class="page-item-egreso <?= $clase_activa ?>">
                                <a class="page-link-egreso" page='<?= $i ?>' href="#"><?= $i ?></a>
                            </li>
                        <?php }
                        if ($pagina < $total_paginas) {
                            $pagina++; ?>
                            <li class="page-item-egreso"><a class="page-link-egreso" page='<?= $pagina ?>' href="#"><i class="fas fa-caret-right"></i></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-center my-4">
                <p>
                    <strong>Total precio compra: </strong>S/.<?= $totalGasto ?> <br>
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
endif; ?>