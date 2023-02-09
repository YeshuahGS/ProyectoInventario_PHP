<?php include_once('../../../model/ubigeoModelo.php');
if (isset($_POST['id'])) {
    $provincia_id = $_POST['id'];
} else {
    $provincia_id = null;
}

$provincias = ubigeoModelo::Provincia($provincia_id);
?>
<option value="provincianull">--SELECCIONE UNA PROVINCIA--</option>
<?php
foreach ($provincias as $key => $value) { ?>
    <option value="<?= $value['id'] ?>"><?= $value['nombre'] ?></option>
<?php } ?>