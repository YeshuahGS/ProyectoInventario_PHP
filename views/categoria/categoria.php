<form class="w-100" method="POST" data="" style="border: 1px solid black; padding: 15px; border-radius: 10px;" id="FormularioRegistroCategorias">
    <h3 class="titulo_vista" >Crear Categorias:</h3>

    <div class="row">
        <div class="col">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Escribir el nombre" id="nombre">
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            <input type="submit" class="btn-guardar" value="Crear" id="GuardarCategoria">
        </div>
    </div>

</form>
<div id="TablaCategoria">

</div>
<!-- Modal Editar Producto -->
<div class="modal fade" id="modaleditarcategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Categorias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none; background: none;">
                    <i class="fas fa-times" style="font-size: 25px; color: red"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="modal__editarCategoria"></div>
            </div>
        </div>
    </div>
</div>