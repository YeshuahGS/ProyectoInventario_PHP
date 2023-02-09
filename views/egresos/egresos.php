<form method="POST" style="border: 1px solid black; padding: 15px; border-radius: 10px;" id="FormularioRegistroEgresos">
    <h3 class="titulo_vista">Insertar Egreso:</h3>
    <div class="row">
        <div class="col">
            <label for="codigo">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" placeholder="Escriba su Descripcion" id="descripcion">
        </div>
        <div class="col">
            <label for="monto">Monto</label>
            <input type="text" name="monto" class="form-control" placeholder="Escriba el Monto">
        </div>
    </div>
    <div class="row">
    <div class="col mt-3">
      <input type="submit" class="btn-guardar" value="Guardar" id="GuardarEgreso">
    </div>
  </div>
</form>
<div class="buscadorEgreso mt-5 mb-2 row">
    <div class="col">
        <input type="text" name="busqueda" id="busquedaEgreso" placeholder="Ingrese su busqueda" style="padding: 10px; margin-right: 5px;">
        <i class="fas fa-search" style="font-size: 20px;"></i>
    </div>
</div>
<div id="TablaEgresos">

</div>
<!-- Modal Editar Producto -->
<div class="modal fade" id="modaleditaregreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Egreso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none; background: none;">
                        <i class="fas fa-times" style="font-size: 25px; color: red"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="modal__editarEgreso"></div>
                </div>
            </div>
        </div>
    </div>