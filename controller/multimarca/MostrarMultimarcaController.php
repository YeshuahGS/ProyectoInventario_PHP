<?php
include_once("../../model/multimarcaModelo.php");
$multimarcaCount = MultimarcaModelo::CountListarMultimarca();

foreach ($multimarcaCount as $key => $value) {
    $total_registro = $value['total_registro'];
}


$item = null;
$valor = null;
$por_pagina = 6;
if (empty($_POST['page'])) {
    $pagina = 1;
} else {
    $pagina = $_POST['page'];
}
$desde = ($pagina - 1) * $por_pagina;
$total_paginas = ceil($total_registro / $por_pagina);
$multimarca = MultimarcaModelo::ListarMultimarca($desde, $por_pagina);
if (COUNT($multimarca) > 0) :
?>

    <br>

    <div class="table-responsive">
        <table class="table table-sm">
            <thead class="text-center">
                <tr>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">DEPARTAMENTO</th>
                    <th scope="col">PROVINCIA</th>
                    <th scope="col">DISTRITO</th>
                    <th scope="col">COMISION</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($multimarca as $key => $value) : ?>
                    <tr>
                        <td><?= $value["nombreMultimarca"] ?></td>
                        <td><?= $value["nombreDepartamento"] ?></td>
                        <td><?= $value["nombreProvincia"] ?></td>
                        <td><?= $value["nombreDistrito"] ?></td>
                        <td><?= $value["comision"] ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#modaleditarmultimarca" id="editarmultimarca" value='<?= $value['id'] ?>'> <i class="far fa-edit" style="font-size: 30px; color: blue"> </i></a>
                            <a href="#" id="eliminarmultimarca" value='<?= $value['id'] ?>'> <i class="fas fa-trash-alt" style="font-size: 30px; color: red"></i></a>
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
                    <li class="page-item-multimarca">
                        <a class="page-link-multimarca" page="<?= ($pagina - 1) ?>" href="#">
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
                        <li class="page-item-multimarca <?= $clase_activa ?>">
                            <a class="page-link-multimarca" page='<?= $i ?>' href="#"><?= $i ?></a>
                        </li>
                    <?php }
                    if ($pagina < $total_paginas) {
                        $pagina++; ?>
                        <li class="page-item-multimarca"><a class="page-link-multimarca" page='<?= $pagina ?>' href="#"><i class="fas fa-caret-right"></i></a></li>
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