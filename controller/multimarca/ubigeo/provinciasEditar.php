<?php include_once('../../../model/ubigeoModelo.php');
if (isset($_POST['id'])) {
    $provincia_id = $_POST['id'];
} else {
    $provincia_id = null;
} ?>

<label for="provincias">Provincia:</label>
<select name="provincias" id="provinciasSelectEditar" class="form-select">
    <?php
    $provincias = ubigeoModelo::Provincia($provincia_id);
    foreach ($provincias as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"><?= $value['nombre'] ?></option>
    <?php }; ?>
</select>