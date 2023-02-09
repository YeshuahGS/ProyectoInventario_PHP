<?php
include_once("../../model/multimarcaModelo.php");
if (isset($_POST['codigo'])) {
   $id = $_POST['codigo'];
}else{
    $id = null;
}
MultimarcaModelo::EliminarMultimarca($id);
?>
