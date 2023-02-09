<?php include_once('../../../model/ubigeoModelo.php');
if (isset($_POST['id'])) {
    $distrito_id = $_POST['id'];
} else {
    $distrito_id = null;
}

$distrito = ubigeoModelo::Distritos($distrito_id);
?>
<option value="distritonull">--SELECCIONE UN DISTRITO--</option>
<?php
foreach ($distrito as $key => $value) { ?>
    <option value="<?= $value['id'] ?>"><?= $value['nombre'] ?></option>
<?php } ?>