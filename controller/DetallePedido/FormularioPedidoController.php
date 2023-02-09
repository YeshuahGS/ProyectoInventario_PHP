<?php
include_once("../../model/pedidosModelo.php");

$multimarca = pedidosModelo::ListarMultimarca();
?>
<form method="POST" data="" style="border: 1px solid black; padding: 15px; border-radius: 10px;" id="FormularioAgregarPedido">
    <div></div>
    <h3 class="titulo_vista">Crear Pedido:</h3>
    <div class="row">
        <div class="col m-3">
            <label for="sku">SKU:</label>
            <input type="text" class="form-control" name="sku" placeholder="Escribir el sku" id="sku">
        </div>
        <div class="col m-3">
            <label for="nproducto">Producto:</label>
            <select name="nproducto" id="nproducto" class="form-select">

            </select>
        </div>
    </div>
    <div class="row">
        <div class="col m-3">
            <label for="nmultimarca">Multimarca:</label>
            <select name="nmultimarca" id="nmultimarca" class="form-select">
                <?php foreach ($multimarca as $key => $value) : ?>
                    <option value="<?= $value['id']; ?>">
                        <?= $value['nombreMultimarca']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col m-3">
            <label for="unidades">Unidades:</label>
            <input class="form-control" type="number" name="unidades" id="unidades" value="1" disabled>
        </div>
        <div class="col m-3">
            <label for="descuento" id="labelDescuento">Descuento:</label>
            <input class="form-control" type="text" name="descuento" id="descuento" placeholder="" disabled>
        </div>
        <div class="col m-3">
            <label for="tipo_descuento">Tipo Descuento:</label>
            <select class="form-select" type="text" name="tipo_descuento" id="tipo_descuento">
                <option value="null">Escojer tipo de descuento</option>
                <option value="porcentaje">%</option>
                <option value="soles">S/.</i></option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            <a href="#" id="AgregarPedido"><i class="fas fa-cart-plus" style="font-size: 25px; color: #800080; margin-left: 15px;"></i></a>

        </div>
    </div>
</form>