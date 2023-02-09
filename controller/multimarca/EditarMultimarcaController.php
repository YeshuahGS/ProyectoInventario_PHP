<?php
include_once("../../model/multimarcaModelo.php");
include_once("../../model/ubigeoModelo.php");
$cod = $_POST['codigo'];
$multimarca = multimarcaModelo::EditarMultimarca($cod);
?>
<form method="POST"  id="FormularioActualizarMultimarca">

    <div class="row">
        <input type="hidden" name="cod" value="<?= $multimarca['id'] ?>">
        <div class="col m-3">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Escribir el nombre" id="nombre" value="<?= $multimarca['nombreMultimarca'] ?>">
        </div>
        <div class="col m-3">
            <label for="comision">Comision:</label>
            <input type="text" class="form-control" name="comision" placeholder="Escribir la comision" id="comision" value="<?= $multimarca['comision'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="col m-3">
            <label for="departamentos">Departamento:</label>
            <select name="departamentos" id="departamentosSelectEditar" class="form-select">
                <?php
                $departamento = ubigeoModelo::Departamentos();
                foreach ($departamento as $key => $value) { ?>
                    <option id="departamentoOption" value="<?= $value['id'] ?>" <?= $value['nombre']  == $multimarca['nombreDepartamento'] ? 'selected' : '' ?>><?= $value['nombre'] ?></option>
                <?php }; ?>
            </select>
        </div>
        <div class="col m-3" id="provinciaEditar">
            <label for="provincias">Provincia:</label>
            <select name="provincias" id="provinciasSelectEditar" class="form-select" >
                <?php
                $provincia = ubigeoModelo::ListarProvincia();
                foreach ($provincia as $key => $value) { ?>
                    <option value="<?= $value['id'] ?>" <?= $value['nombre']  == $multimarca['nombreProvincia'] ? 'selected' : '' ?>><?= $value['nombre'] ?></option>
                <?php }; ?>
            </select>
        </div>
        <div class="col m-3" id="distritosEditar">
            <label for="distritos">Distrito:</label>
            <select name="distritos" id="distritoSelectEditar" class="form-select">
                <?php
                $distrito = ubigeoModelo::ListarDistritos();
                foreach ($distrito as $key => $value) { ?>
                    <option value="<?= $value['id'] ?>" <?= $value['nombre']  == $multimarca['nombreDistrito'] ? 'selected' : '' ?>><?= $value['nombre'] ?></option>
                <?php }; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            <input type="submit" class="btn btn-primary" value="Actualizar" id="ActualizarMultimarca">
        </div>
    </div>
</form>