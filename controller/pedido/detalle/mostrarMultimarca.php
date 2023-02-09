<?php
include_once("../../../model/pedidosModelo.php");

$multimarca = pedidosModelo::ListarMultimarca();
foreach ($multimarca as $key => $value) :
?>
    <option value="<?= $value['id']; ?>">
        <?= $value['nombreMultimarca']; ?>
    </option>
<?php endforeach; ?>