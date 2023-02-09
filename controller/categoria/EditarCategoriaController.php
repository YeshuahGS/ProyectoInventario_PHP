<?php
include_once("../../model/categoriaModelo.php");
$cod = $_POST['codigo'];
$categoria = CategoriaModelo::EditarCategorias($cod);
?>
<form method="POST" data="" id="FormularioActualizarCategorias">
    <input type="hidden" name="codModal" value="<?= $categoria['id'] ?>">
    <div class="row">
        <div class="col">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombreModal" placeholder="Escribir el nombre" id="nombre" value="<?= $categoria['nombre'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            <input type="submit" class="btn btn-primary" value="Actualizar" id="ActualizarCategoria">
        </div>
    </div>
</form>