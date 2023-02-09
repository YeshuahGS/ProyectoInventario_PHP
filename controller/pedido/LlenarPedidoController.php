<?php
include_once("../../model/pedidosModelo.php");


if (isset($_POST["nmultimarca"])) {
    $multimarca = $_POST["nmultimarca"];
} else {
    $multimarca = null;
}
if (isset($_POST["unidades"]) && $_POST["unidades"] != "") {
    $unidades = $_POST["unidades"];
} else {
    $unidades = 1;
}
if (isset($_POST["tipo_descuento"]) && $_POST["tipo_descuento"] != "null") {
    $tipo_descuento = $_POST["tipo_descuento"];
} else {
    $tipo_descuento = null;
}

$unidadesxdescuento = 0;
if (isset($_POST["nproducto"]) && $_POST["nproducto"] != "") {
    $producto = $_POST["nproducto"];
    $productoPorId = pedidosModelo::ListarProductosPorCodigo($producto);

    if (isset($_POST["descuento"])  &&  $_POST["descuento"] != 0) {
        if ($tipo_descuento ==  "porcentaje") {
            $converionDescuento = ($_POST["descuento"] / 100) * $productoPorId["precio_venta"];
        } else if ($tipo_descuento ==  "soles") {
            $descuentos = $_POST["descuento"];
            $converionDescuento = $descuentos;
        } else {
            $descuentos = 0;
        }
    } else {
        $descuentos = 0;
        $converionDescuento = 0;
    }

    if (isset($_SESSION['carrito'])) {
        $counter = 0;
        $conversorDescuento = 0;
        foreach ($_SESSION['carrito'] as $indice => $elemento) {
            if ($elemento['id_producto'] == $producto && $elemento['id_multimarca'] == $multimarca) {

                if ($_SESSION['carrito'][$indice]['unidades'] <= ($_SESSION['carrito'][$indice]['stock'] - 1)) {

                    $_SESSION['carrito'][$indice]['unidades'] += $unidades;
                    $_SESSION['carrito'][$indice]['descuento'] += $converionDescuento;
                } else {
                    echo "error";
                    die;
                }


                $counter++;
            }
        }
    }

    if (!isset($counter) || $counter == 0) {

        $mutlimarcaPorId = pedidosModelo::ListarMultimarcaPorCodigo($multimarca);
        if (isset($productoPorId) && isset($mutlimarcaPorId)) {
            $_SESSION['carrito'][] = array(
                "id_producto" => $productoPorId['codigo'],
                "id_multimarca" => $mutlimarcaPorId['id'],
                "producto" => $productoPorId,
                "multimarca" => $mutlimarcaPorId,
                "precio_compra" => $productoPorId['precio_compra'],
                "precio_venta" => $productoPorId['precio_venta'],
                "stock" => $productoPorId['stock'],
                "unidades" => $unidades,
                "descuento" => $converionDescuento,
                "comision" => $mutlimarcaPorId['comision'],
                "unidadesXdescuento" => $unidadesxdescuento
            );
        }
    }


    if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {
        $carrito = $_SESSION['carrito'];
    } else {
        $carrito = array();
    }
    if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
        <div class="table-responsive">
            <table class="table table-sm">
                <thead style="text-align: center;">
                    <tr>

                        <th scope="col">SKU</th>
                        <th scope="col">PRODUCTO</th>
                        <th scope="col">PRECIO COMPRA</th>
                        <th scope="col">PRECIO VENTA</th>
                        <th scope="col">UNIDADES</th>
                        <th scope="col">STOCK</th>
                        <th scope="col">MULTIMARCA</th>
                        <th scope="col">COMISION</th>
                        <th scope="col">DESCUENTO</th>
                        <th scope="col">ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $subtotal = 0;
                    $conversorComision = 0;

                    $comi = 0;
                    $total = 0;
                    $descuentoAbsoluta = 0;
                    $ComisionAbsoluta = 0;
                    $totalAbsoluto = 0;
                    $descuentoXunidades = 0;


                    foreach ($carrito as $indice => $elemento) :
                        $multi = $elemento['multimarca'];
                        $prod = $elemento['producto'];
                        $conversorComision = ($elemento["comision"] / 100);

                        $subtotal += ($elemento["precio_venta"] * $elemento["unidades"]);

                        $descuentoAbsoluta += $elemento["descuento"];


                        if ($elemento["descuento"] != 0 && $elemento["comision"] != 0) {
                            $descuento = $subtotal - $descuentoAbsoluta;
                            $totalComision = $descuento * $conversorComision;
                            $total = $descuento - $totalComision;
                        } else if ($elemento["comision"] != 0) {
                            $totalComision = ($subtotal * $conversorComision);
                            $total = $subtotal - $totalComision;
                        } else if ($elemento["descuento"] != 0) {
                            $totalComision = 0;
                            $descuento =  $descuentoAbsoluta;
                            $total =  $subtotal - $descuento ;
                            
                        }else{
                            $totalComision = 0;
                            $total =  $subtotal;
                        }
                 

                    ?>
                        <tr>
                            <td style="text-align: center;"><?= $prod["sku"] ?></td>
                            <td style="text-align: center"><?= $prod["nombre_producto"] ?></td>
                            <td style="text-align: center;">S/.<?= $elemento["precio_compra"] ?></td>
                            <td style="text-align: center;">S/.<?= $elemento["precio_venta"] ?></td>
                            <td style="text-align: center;">
                                <?= $elemento["unidades"] ?>
                            </td>
                            <td style="text-align: center;"><?= $elemento["stock"] ?></td>
                            <td style="text-align: center;"><?= $multi["nombreMultimarca"] ?></td>
                            <td style="text-align: center;"><?= $elemento["comision"] ?>%</td>
                            <td style="text-align: center;">S/.<?= $elemento["descuento"] ?></td>
                            <td style="text-align: center;">
                                <a id="eliminarItemCarrito" value="<?= $indice ?>"><i class="far fa-trash-alt" style="font-size: 20px; color:#800080;cursor: pointer;"></i></a>
                            </td>
                        </tr>
                    <?php


                    endforeach;

                    $_SESSION['total'] = $total;
                    ?>
                </tbody>
            </table>
            <br>
            <div class="delete-carrito">
                <a id="VaciarCarrito" style="cursor: pointer; float: right; text-decoration: none !important; color: #000">Vaciar carrito<i class="fas fa-dumpster-fire" style="color: #800080; font-size: 26px; margin-left: 10px;"></i></a>
            </div>
            <div class="total-carrito">
                <p><strong>SubTotal: </strong> S/.<?= $subtotal ?></p>
                <a id="HacerPedido" style="cursor: pointer; float: right; text-decoration: none !important; color: #000;">Hacer pedido<i class="fas fa-paper-plane" style="color: #800080; font-size: 26px; margin-left: 10px;"></i></a>
                <p><strong>Comision: </strong> S/.<?= $totalComision  ?></p>
                <p><strong> Descuento:</strong> S/. <?= $descuentoAbsoluta  ?></p>
                <h4><strong>Total:</strong> S/.<?= $_SESSION['total'] ?></h4>
            </div>
        </div>
    <?php else : ?>
        <div class="row" style="margin-top: 70px;">
            <div class="col-lg-12 text-center my-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center ">
                        <h1>La lista está vacio, añade algun producto</h1>
                    </ul>
                </nav>
            </div>
        </div>
<?php endif;
} else {
    echo "ProductoNull";
} ?>