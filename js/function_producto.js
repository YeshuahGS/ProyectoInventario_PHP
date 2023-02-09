$(document).ready(function () {

  //Cerrar Modal
  function CierraPopup() {
    $("#modaleditarproducto").modal("hide"); //ocultamos el modal
    $("body").removeClass("modal-open"); //eliminamos la clase del body para poder hacer scroll
  }
  //Mostrar Tabla
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
  RefrescarFormProducto();
  MostrarTablaProducto();
  //Guardar
  $(document).on("click", "#GuardarProducto", function (e) {
    e.preventDefault();
    var producto = document.getElementById("FormularioRegistroProducto");
    var formData = new FormData(producto);
    $.ajax({
      url: "controller/producto/RegistroProductoController.php",
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
          $("#FormularioRegistroProducto")[0].reset();
          MostrarTablaProducto();
           $("#SodidoGuardarProducto").html("<audio src='sounds/mario_coin_hd.mp3' autoplay></audio>");
        } else if (response == "skuProductoNull") {
          swal({
            title: "Necesitas ingresar el SKU!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaProducto();
        } else if (response == "nombreProductoNull") {
          swal({
            title: "Necesitas ingresar la descripcion del producto!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaProducto();
        } else if (response == "categoriaProductoNull") {
          swal({
            title: "Necesitas ingresar la categoria del producto!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaProducto();
        } else if (response == "precio_compraProductoNull") {
          swal({
            title: "Necesitas ingresar el precio de compra del producto!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaProducto();
        } else if (response == "precio_ventaProductoNull") {
          swal({
            title: "Necesitas ingresar el precio de venta del producto!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaProducto();
        } else if (response == "stockProductoNull") {
          swal({
            title: "Necesitas ingresar el stock del producto!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaProducto();
        } else if (response == "fechaProductoNull") {
          swal({
            title: "Necesitas ingresar la fecha del producto!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaProducto();
        } else {
          swal({
            title: "Parece que algo salio mal!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaProducto();
        }
      },
    });
  });
  //Actualizar
  $(document).on("click", "#ActualizarProducto", function (e) {
    e.preventDefault();
    var actualizar = document.getElementById("FormularioActualizarProducto");
    var formData = new FormData(actualizar);
    $.ajax({
      url: "controller/producto/ActualizarProductoController.php",
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
        if (response == "exito") {
          swal({
            title: "Actualizacion exitosa!",
            icon: "success",
            button: "Aceptar!",
          });
          CierraPopup();
          MostrarTablaProducto();
        } else {
          swal({
            title: "Parece que algo salio mal!",
            icon: "warning",
            button: "Aceptar!",
          });
          CierraPopup();
          MostrarTablaProducto();
        }
      },
    });
  });
  //Editar
  $(document).on("click", "#editarproducto", function (e) {
    e.preventDefault();
    var codigo = $(this).attr("value");

    $.ajax({
      type: "POST",
      url: "controller/producto/EditarProductoController.php",
      data: {
        codigo: codigo,
      },
      beforeSend: function () {
        $("#modal__editarProducto").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#modal__editarProducto").html(response);
      },
    });
  });
  //Eliminar
  $(document).on("click", "#eliminarproducto", function (e) {
    e.preventDefault();
    var codigo = $(this).attr("value");
    $.ajax({
      type: "POST",
      url: "controller/producto/EliminarProductoController.php",
      data: {
        codigo: codigo,
      },
      beforeSend: function () {
        $("#TablaProducto").html(
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

          MostrarTablaProducto();
          $("#SodidoBorrarProducto").html("<audio src='sounds/mario_bros_die.mp3' autoplay></audio>");
        } else {
          swal({
            title: "Parece que algo salio mal!",
            icon: "warning",
            button: "Aceptar!",
          });

          MostrarTablaProducto();
        }
      },
    });
  });
  //Paginacion
  $(document).on("click", ".page-link-productos", function () {
    var page = $(this).attr("page");
    $.ajax({
      type: "POST",
      url: "controller/producto/MostrarProductoController.php",
      data: {
        page: page,
      },
      beforeSend: function () {
        $("#TablaProducto").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#TablaProducto").html(response);
      },
    });
  });
  //Paginacion Buscador
  $(document).on("click", ".page-link-productosBuscador", function () {
    var page = $(this).attr("page");
    $.ajax({
      type: "POST",
      url: "controller/producto/ProductoPaginacionController.php",
      data: {
        page: page,
      },
      beforeSend: function () {
        $("#TablaProducto").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#TablaProducto").html(response);
      },
    });
  });
  //Buscador
  $(document).on("keyup", "#busquedaProducto", function () {
    var data = $(this).val();
    $.ajax({
      type: "POST",
      url: "controller/producto/BuscadorProductoController.php",
      data: {
        data: data,
      },
      beforeSend: function () {
        $("#TablaProducto").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#TablaProducto").html(response);
      },
    });
  });
});
