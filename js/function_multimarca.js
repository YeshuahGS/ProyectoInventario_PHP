$(document).ready(function () {
  //Cerrar Modal
  function CierraPopup() {
    $("#modaleditarmultimarca").modal("hide"); //ocultamos el modal
    $("body").removeClass("modal-open"); //eliminamos la clase del body para poder hacer scroll
  }
  //Mostrar Tabla
  function MostrarTablaMultimarca() {
    $.ajax({
      type: "POST",
      url: "controller/multimarca/MostrarMultimarcaController.php",
      beforeSend: function () {
        $("#TablaMultimarca").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#TablaMultimarca").html(response);
      },
    });
  }
  //Mostrar Formulario Pedido
  function FormularioPedido() {
    $.ajax({
      type: "POST",
      url: "controller/DetallePedido/FormularioPedidoController.php",
      beforeSend: function () {
        $("#formularioPedido").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#formularioPedido").html(response);
      },
    });
  }
  MostrarTablaMultimarca();
  //Mostrar Tabla Producto
  function MostrarTablaProducto() {
    $.ajax({
      type: "POST",
      url: "controller/producto/MostrarProductoController.php",
      beforeSend: function () {
        $("#TablaProducto").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#TablaProducto").html(response);
      },
    });
  }
  //Refrescar Formulario
  function RefrescarFormProducto() {
    $.ajax({
      type: "POST",
      url: "controller/producto/RefrescarFormularioController.php",
      beforeSend: function () {
        $("#FormProducto").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#FormProducto").html(response);
      },
    });
  }
  //Guardar
  $(document).on("click", "#GuardarMultimarca", function (e) {
    e.preventDefault();
    var producto = document.getElementById("FormularioRegistroMultimarca");
    var formData = new FormData(producto);
    $.ajax({
      url: "controller/multimarca/RegistroMultimarcaController.php",
      type: "POST",
      data: formData,
      contentType: !1,
      processData: !1,
      beforeSend: function () {
        $("#TablaProducto").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        console.log(response);
        if (response == "exito") {
          swal({
            title: "Datos ingresados Correctamente!",
            icon: "success",
            button: "Aceptar!",
          });
          $("#FormularioRegistroMultimarca")[0].reset();
          MostrarTablaMultimarca();
          FormularioPedido();
          MostrarTablaProducto();
          RefrescarFormProducto()
        } else if (response == "NombreMultimarcaNull") {
          swal({
            title: "Necesitas ingresar el nombre de la multimarca!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaMultimarca();
          FormularioPedido();
          MostrarTablaProducto();
          RefrescarFormProducto()
        } else if (response == "ComisionMultimarcaNull") {
          swal({
            title: "Necesitas ingresar la comision de la multimarca!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaMultimarca();
          FormularioPedido();
          MostrarTablaProducto();
          RefrescarFormProducto()
        } else if (response == "DepartamentosMultimarcaNull") {
          swal({
            title: "Necesitas ingresar el departamento de la multimarca!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaMultimarca();
          FormularioPedido();
          MostrarTablaProducto();
          RefrescarFormProducto()
        } else if (response == "ProvinciasMultimarcaNull") {
          swal({
            title: "Necesitas ingresar la provincia de la multimarca!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaMultimarca();
          FormularioPedido();
          MostrarTablaProducto();
          RefrescarFormProducto()
        } else if (response == "distritosMultimarcaNull") {
          swal({
            title: "Necesitas ingresar el distrito de la multimarca!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaMultimarca();
          FormularioPedido();
          MostrarTablaProducto();
          RefrescarFormProducto()
        } else {
          swal({
            title: "Parece que algo salio mal",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaMultimarca();
          FormularioPedido();
          MostrarTablaProducto();
          RefrescarFormProducto()
        }
      },
    });
  });
  //Paginacion
  $(document).on("click", ".page-link-multimarca", function () {
    var page = $(this).attr("page");
    $.ajax({
      type: "POST",
      url: "controller/multimarca/MostrarMultimarcaController.php",
      data: {
        page: page,
      },
      beforeSend: function () {
        $("#TablaMultimarca").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#TablaMultimarca").html(response);
      },
    });
  });
  //Paginacion
  $(document).on("click", ".page-link-multimarcaBuscador", function () {
    var page = $(this).attr("page");
    $.ajax({
      type: "POST",
      url: "controller/multimarca/MultimarcaPaginacionController.php",
      data: {
        page: page,
      },
      beforeSend: function () {
        $("#TablaMultimarca").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#TablaMultimarca").html(response);
      },
    });
  });
  //Buscador
  $(document).on("keyup", "#busquedaMultimarca", function () {
    var data = $(this).val();
    $.ajax({
      type: "POST",
      url: "controller/multimarca/BuscadorMultimarcaController.php",
      data: {
        data: data,
      },
      beforeSend: function () {
        $("#TablaMultimarca").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#TablaMultimarca").html(response);
      },
    });
  });
  //Editar
  $(document).on("click", "#editarmultimarca", function (e) {
    e.preventDefault();
    var codigo = $(this).attr("value");

    $.ajax({
      type: "POST",
      url: "controller/multimarca/EditarMultimarcaController.php",
      data: {
        codigo: codigo,
      },
      beforeSend: function () {
        $("#modal__editarMultimarca").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#modal__editarMultimarca").html(response);
      },
    });
  });
  //Actualizar
  $(document).on("click", "#ActualizarMultimarca", function (e) {
    e.preventDefault();
    var actualizar = document.getElementById("FormularioActualizarMultimarca");
    var formData = new FormData(actualizar);
    $.ajax({
      url: "controller/multimarca/ActualizarMultimarcaController.php",
      type: "POST",
      data: formData,
      contentType: !1,
      processData: !1,
      beforeSend: function () {
        $("#TablaMultimarca").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        if (response == "exito") {
          swal({
            title: "Actualizacion exitosa!",
            icon: "success",
            button: "Aceptar!",
          });
          CierraPopup();
          MostrarTablaMultimarca();
        } else {
          swal({
            title: "Parece que algo salio mal!",
            icon: "warning",
            button: "Aceptar!",
          });
          CierraPopup();
          MostrarTablaMultimarca();
        }
      },
    });
  });
  //Eliminar
  $(document).on("click", "#eliminarmultimarca", function (e) {
    e.preventDefault();
    var codigo = $(this).attr("value");
    $.ajax({
      type: "POST",
      url: "controller/multimarca/EliminarMultimarcaController.php",
      data: {
        codigo: codigo,
      },
      beforeSend: function () {
        $("#TablaMultimarca").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        if (response == "exito") {
          swal({
            title: "Eliminacion exitosa!",
            icon: "success",
            button: "Aceptar!",
          });

          MostrarTablaMultimarca();
        } else {
          swal({
            title: "Parece que algo salio mal!",
            icon: "warning",
            button: "Aceptar!",
          });

          MostrarTablaMultimarca();
        }
      },
    });
  });
});
