<?php include_once('../../../model/ubigeoModelo.php');
if (isset($_POST['id'])) {
    $distrito_id = $_POST['id'];
} else {
    $distrito_id = null;
}
?>
 <label for="distritos">Distrito:</label>
<select name="distritos" id="distritoSelectEditar" class="form-select">
    <?php
    $distrito = ubigeoModelo::Distritos($distrito_id);
    foreach ($distrito as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"><?= $value['nombre'] ?></option>
    <?php } ?>
</select>