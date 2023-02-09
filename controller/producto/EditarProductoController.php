<?php
include_once("../../model/productoModelo.php");
$cod = $_POST['codigo'];
$pro = ProductoModelo::EditarProductos($cod);
$categoria = ProductoModelo::ListarCategoriasProducto();
$multimarca = ProductoModelo::ListarMultimarca();
?>

<form method="POST" enctype="multipart/form-data" id="FormularioActualizarProducto">
    <input type="hidden" name="codModal" value="<?= $pro['codigo'] ?>">
    <div class="row">
        <div class="col">
            <label for="codigo">Codigo</label>
            <input type="text" name="codigoModal" class="form-control" placeholder="Escriba su codigo" id="codigo" value="<?= $pro['sku'] ?>">
        </div>
        <div class="col">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombreModal" class="form-control" placeholder="Escriba el nombre" value="<?= $pro['nombre'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            <label for="categoria">Categorias</label>
            <select class="form-select" name="categoriaModal" id="categoria">
                <?php foreach ($categoria as $key => $ca) : ?>
                    <option value="<?= $ca['id'] ?>" <?= $ca['nombre'] == $pro['nombre_categoria'] ? 'selected' : '' ?>><?= $ca['nombre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col mt-3">
            <label for="precio_compra">Precio Compra</label>
            <input type="text" name="precio_compraModal" class="form-control" placeholder="Colocar el precio S/" value="<?= $pro['precio_compra'] ?>">
        </div>
        <div class="col mt-3">
            <label for="precio_venta">Precio Venta</label>
            <input type="text" name="precio_ventaModal" class="form-control" placeholder="Colocar el precio S/" value="<?= $pro['precio_venta'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            <label for="multimarca">Multimarca</label>
            <select class="form-select" name="multimarcaProducto" id="multimarcaProducto">
                <?php foreach ($multimarca as $key => $mul) : ?>
                    <option value="<?= $mul['id'] ?>" <?= $mul['nombre'] == $pro['multimarca_nombre'] ? 'selected' : '' ?>><?= $mul['nombre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col mt-3">
            <label for="stok">Stock</label>
            <input type="text" name="stokModal" class="form-control" placeholder="Colocar el stock" value="<?= $pro['stock'] ?>">
        </div>
        <div class="col mt-3">
            <label for="fecha">Fecha</label>
            <input type="date" name="fechaModal" class="form-control" placeholder="" value="<?= $pro['fecha'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            <label for="imagen">imagen</label>
            <input type="file" name="imagenModalnull" class="form-file">
            <input type="text" name="imagenModalvalue" class="form-control" value="<?= $pro['imagen'] ?>" hidden>
        </div>
    </div>
    <div class="row">
        <div class="col mt-4">
            <input type="submit" class="btn btn-primary" value="Actualizar" id="ActualizarProducto">
        </div>
    </div>
</form>