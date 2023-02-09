<?php
include_once("../../model/productoModelo.php");
$categoria = productoModelo::ListarCategoriasProducto();
$multimarca = ProductoModelo::ListarMultimarca();
?>
<form method="POST" enctype="multipart/form-data" style="border: 1px solid black; padding: 15px; border-radius: 10px;" id="FormularioRegistroProducto">

  <div class="row">
    <div class="col mt-3" id="Mensajeinsertar">

    </div>
  </div>
  <h3>Insertar Productos:</h3>
  <div class="row">
    <div class="col">
      <label for="codigo">SKU</label>
      <input type="text" name="codigo" class="form-control" placeholder="Escriba su codigo" id="codigo">
    </div>
    <div class="col">
      <label for="nombre">Descripcion</label>
      <input type="text" name="nombre" class="form-control" placeholder="Escriba el nombre">
    </div>
  </div>
  <div class="row">
    <div class="col mt-3">
      <label for="categoria">Categorias</label>
      <select class="form-select" name="categoria" id="categoria">
        <?php foreach ($categoria as $key => $value) : ?>
          <option value="<?= $value['id'] ?>"><?= $value['nombre'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="col mt-3">
      <label for="precio_compra">Precio Compra</label>
      <input type="text" name="precio_compra" class="form-control" placeholder="Colocar el precio S/">
    </div>
    <div class="col mt-3">
      <label for="precio_venta">Precio Venta</label>
      <input type="text" name="precio_venta" class="form-control" placeholder="Colocar el precio S/">
    </div>
  </div>
  <div class="row">
    <div class="col mt-3">
      <label for="multimarca">Multimarca</label>
      <select class="form-select" name="multimarcaProducto" id="multimarcaProducto">
        <?php foreach ($multimarca as $key => $value) : ?>
          <option value="<?= $value['id'] ?>"><?= $value['nombre'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col mt-3">
      <label for="stok">Stock</label>
      <input type="text" name="stok" class="form-control" placeholder="Colocar el stock">
    </div>
    <div class="col mt-3">
      <label for="fecha">Fecha</label>
      <input type="date" name="fecha" class="form-control" placeholder="">
    </div>
  </div>
  <div class="row">
    <div class="col mt-3">
      <label for="imagen">imagen</label>
      <input type="file" name="imagen" class="form-file" style="white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis; width: 100%;">
    </div>
  </div>
  <div class="row">
    <div class="col mt-3">
      <input type="submit" class="btn-guardar" value="Guardar" id="GuardarProducto">
    </div>
  </div>
  </div>
</form>
<div class="buscadorProducto mt-5 mb-2 row">
  <div class="col-8">
    <input type="text" name="busqueda" id="busquedaProducto" placeholder="Ingrese su busqueda" >
    <i class="fas fa-search" style="font-size: 20px;"></i>
  </div>
  <div class="col-4 mt-1" id="RetornoExcelProducto">
    <a href="controller/producto/excel/ExcelTodosProductos.php">
      <i id="excelProducto" class="fas fa-file-excel excel"></i>
    </a>
  </div>
</div>
<style>
  #busquedaProducto{
    padding: 10px; width: 50%
  }

  .excel {
    color: green;
    float: right;
    font-size: 40px;
    cursor: pointer;
    transition: all 400ms ease-in-out;
  }

  .excel:hover {
    font-size: 50px;
  }
</style>