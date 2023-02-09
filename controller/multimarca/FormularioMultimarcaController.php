<?php include_once('../../model/ubigeoModelo.php');

?>
<form class="needs-validation" method="POST" data="" style="border: 1px solid black; padding: 15px; border-radius: 10px;" id="FormularioRegistroMultimarca" novalidate>
    <div></div>
    <h3 class="titulo_vista">Crear Multimarca:</h3>
    <div class="row">
        <div class="col m-3">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Escribir el nombre" id="nombre">
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
        <div class="col m-3">
            <label for="comision">Comision:</label>
            <input type="text" class="form-control" name="comision" placeholder="Escribir la comision" id="comision">
        </div>
    </div>
    <div class="row">
        <div class="col m-3">
            <label for="departamentos">Departamento:</label>
            <select name="departamentos" id="departamentos" class="form-select">
                <option value="departamentonull">--SELECCIONE UN DEPARTAMENTO--</option>
                <?php
                $departamento = ubigeoModelo::Departamentos();
                foreach ($departamento as $key => $value) { ?>
                    <option value="<?= $value['id'] ?>"><?= $value['nombre'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col m-3">
            <label for="provincias">Provincia:</label>
            <select name="provincias" id="provincias" class="form-select">
                <option value="provincianull">--SELECCIONE UNA PROVINCIA--</option>
            </select>
        </div>
        <div class="col m-3">
            <label for="distritos">Distrito:</label>
            <select name="distritos" id="distritos" class="form-select">
                <option value="distritonull">--SELECCIONE UN DISTRITO--</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col m-3">
            <input type="submit" class="btn-guardar" value="Crear" id="GuardarMultimarca">
        </div>
    </div>
</form>
<div class="buscadorMultimarca mt-5 mb-2 row">
    <div class="col">
        <input type="text" name="busqueda" id="busquedaMultimarca" placeholder="Ingrese su busqueda" style="padding: 10px; margin-right: 5px;">
        <i class="fas fa-search" style="font-size: 20px;"></i>
    </div>
</div>