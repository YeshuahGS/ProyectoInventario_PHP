$(document).ready(function () {
  //Cerrar Modal
  function CierraPopup() {
    $("#modaleditaregreso").modal("hide"); //ocultamos el modal
    $("body").removeClass("modal-open"); //eliminamos la clase del body para poder hacer scroll
  }
  //Mostrar Tabla
  function MostrarTablaEgresos() {
    $.ajax({
      type: "POST",
      url: "controller/egresos/MostrarEgresosController.php",
      beforeSend: function () {
        $("#TablaEgresos").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#TablaEgresos").html(response);
      },
    });
  }
  MostrarTablaEgresos();
  //Guardar
  $(document).on("click", "#GuardarEgreso", function (e) {
    e.preventDefault();
    var producto = document.getElementById("FormularioRegistroEgresos");
    var formData = new FormData(producto);
    $.ajax({
      url: "controller/egresos/RegistroEgresosController.php",
      type: "POST",
      data: formData,
      contentType: !1,
      processData: !1,
      beforeSend: function () {
        $("#TablaEgresos").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        if (response == "exito") {
          swal({
            title: "Datos ingresados Correctamente!",
            icon: "success",
            button: "Aceptar!",
          });
          $("#FormularioRegistroEgresos")[0].reset();
          MostrarTablaEgresos();
        } else if (response == "descripcionEgresosNull") {
          swal({
            title: "Necesitas ingresar la descripcion del egreso!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaEgresos();
        } else if (response == "montoEgresosNull") {
          swal({
            title: "Necesitas ingresar el monto del egreso!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaEgresos();
        } else {
          swal({
            title: "Parece que algo salio mal!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaEgresos();
        }
      },
    });
  });

  //Actualizar
  $(document).on("click", "#ActualizarEgreso", function (e) {
    e.preventDefault();
    var actualizar = document.getElementById("FormularioActualizarEgresos");
    var formData = new FormData(actualizar);
    $.ajax({
      url: "controller/egresos/ActualizarEgresosController.php",
      type: "POST",
      data: formData,
      contentType: !1,
      processData: !1,
      beforeSend: function () {
        $("#TablaEgresos").html(
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
          MostrarTablaEgresos();
        } else {
          swal({
            title: "Parece que algo salio mal!",
            icon: "warning",
            button: "Aceptar!",
          });
          CierraPopup();
          MostrarTablaEgresos();
        }
      },
    });
  });
  //Editar
  $(document).on("click", "#editaregreso", function (e) {
    e.preventDefault();
    var codigo = $(this).attr("value");

    $.ajax({
      type: "POST",
      url: "controller/egresos/EditarEgresosController.php",
      data: {
        codigo: codigo,
      },
      beforeSend: function () {
        $("#modal__editarEgreso").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#modal__editarEgreso").html(response);
      },
    });
  });

  //Eliminar
  $(document).on("click", "#eliminaregreso", function (e) {
    e.preventDefault();
    var codigo = $(this).attr("value");
    $.ajax({
      type: "POST",
      url: "controller/egresos/EliminarEgresosController.php",
      data: {
        codigo: codigo,
      },
      beforeSend: function () {
        $("#TablaEgresos").html(
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

          MostrarTablaEgresos();
        } else {
          swal({
            title: "Parece que algo salio mal!",
            icon: "warning",
            button: "Aceptar!",
          });

          MostrarTablaEgresos();
        }
      },
    });
  });
  //Paginacion
  $(document).on("click", ".page-link-egreso", function () {
    var page = $(this).attr("page");
    $.ajax({
      type: "POST",
      url: "controller/egresos/MostrarEgresosController.php",
      data: {
        page: page,
      },
      beforeSend: function () {
        $("#TablaEgresos").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#TablaEgresos").html(response);
      },
    });
  });
  //Paginacion
  $(document).on("click", ".page-link-egresoPaginacion", function () {
    var page = $(this).attr("page");
    $.ajax({
      type: "POST",
      url: "controller/egresos/PaginacionEgresosController.php",
      data: {
        page: page,
      },
      beforeSend: function () {
        $("#TablaEgresos").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#TablaEgresos").html(response);
      },
    });
  });
  //Buscador
  $(document).on("keyup", "#busquedaEgreso", function () {
    var data = $(this).val();
    $.ajax({
      type: "POST",
      url: "controller/egresos/BuscadorEgresosController.php",
      data: {
        data: data,
      },
      beforeSend: function () {
        $("#TablaEgresos").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#TablaEgresos").html(response);
      },
    });
  });
});
