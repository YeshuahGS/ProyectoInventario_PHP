<?php 
include_once("../../model/egresosModelo.php");
$id = isset($_POST['codigo'])? $_POST['codigo']: null;

$value = egresosModelo::EditarEgresos($id);
?>
<form method="POST"  id="FormularioActualizarEgresos" style="padding: 15px;">
    <div class="row">
      <input type="hidden" name="id" value="<?= $value['id'] ?>">
        <div class="col">
            <label for="codigo">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" placeholder="Escriba su Descripcion" id="descripcion" value="<?= $value['descripcion'] ?>">
        </div>
        <div class="col">
            <label for="monto">Monto</label>
            <input type="text" name="monto" class="form-control" placeholder="Escriba el Monto" value="<?= $value['gasto'] ?>">
        </div>
    </div>
    <div class="row">
    <div class="col mt-3">
      <input type="submit" class="btn btn-primary" value="Actualizar" id="ActualizarEgreso">
    </div>
  </div>
</form>