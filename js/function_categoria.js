$(document).ready(function () {
  //Cerrar Modal
  function CierraPopup() {
    $("#modaleditarcategoria").modal("hide"); //ocultamos el modal
    $("body").removeClass("modal-open"); //eliminamos la clase del body para poder hacer scroll
  }

  //Mostrar Tabla
  function MostrarTablaCategoria() {
    $.ajax({
      type: "POST",
      data: {mostrar : "MostrarTablaCategoria",},
      url: "controller/categoria/MostrarCategoriaController.php",
      beforeSend: function () {
        $("#TablaCategoria").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#TablaCategoria").html(response);
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
  MostrarTablaCategoria();

  //Paginacion
  function Paginacion(clase, url, result) {
    $(document).on("click", clase, function () {
      var page = $(this).attr("page");
      $.ajax({
        type: "POST",
        url: "controller/categoria/" + url,
        data: {
          page: page,
          mostrar : "MostrarTablaCategoria",
        },
        beforeSend: function () {
          $(result).html(
            "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
          );
        },
        success: function (response) {
          $(result).html(response);
        },
      });
    });
  }
  Paginacion(
    ".page-link-categorias",
    "MostrarCategoriaController.php",
    "#TablaCategoria"
  );

  //Guardar
  $(document).on("click", "#GuardarCategoria", function (e) {
    e.preventDefault();
    var categoria = document.getElementById("FormularioRegistroCategorias");
    var formData = new FormData(categoria);
    $.ajax({
      url: "controller/categoria/RegistroCategoriaController.php",
      type: "POST",
      data: formData,
      contentType: !1,
      processData: !1,
      beforeSend: function () {
        $("#TablaCategoria").html(
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
          MostrarTablaCategoria();
          RefrescarFormProducto();
          $("#FormularioRegistroCategorias")[0].reset();
        } else if (response == "nombreCategoriaNull") {
          swal({
            title: "Necesitas ingresar el nombre de la categoria!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaCategoria();
        } else {
          swal({
            title: "Parece que algo salio mal!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarTablaCategoria();
        }
      },
    });
  });

  //Actualizar
  $(document).on("click", "#ActualizarCategoria", function (e) {
    e.preventDefault();
    var actualizar = document.getElementById("FormularioActualizarCategorias");
    var formData = new FormData(actualizar);
    $.ajax({
      url: "controller/categoria/ActualizarCategoriaController.php",
      type: "POST",
      data: formData,
      contentType: !1,
      processData: !1,
      beforeSend: function () {
        $("#TablaCategoria").html(
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
          MostrarTablaCategoria();
        } else {
          swal({
            title: "Parece que algo salio mal!",
            icon: "warning",
            button: "Aceptar!",
          });
          CierraPopup();
          MostrarTablaCategoria();
        }
      },
    });
  });

  //Editar
  $(document).on("click", "#editarcategoria", function (e) {
    e.preventDefault();
    var codigo = $(this).attr("value");
    $.ajax({
      type: "POST",
      url: "controller/categoria/EditarCategoriaController.php",
      data: {
        codigo: codigo,
      },
      beforeSend: function () {
        $("#modal__editarCategoria").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#modal__editarCategoria").html(response);
      },
    });
  });

  //Eliminar
  $(document).on("click", "#eliminarcategoria", function (e) {
    e.preventDefault();
    var codigo = $(this).attr("value");
    $.ajax({
      type: "POST",
      url: "controller/categoria/EliminarCategoriaController.php",
      data: {
        codigo: codigo,
      },
      beforeSend: function () {
        $("#TablaCategoria").html(
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

          MostrarTablaCategoria();
        } else {
          swal({
            title:
              "Hay productos que pertenecen esta categoria no se puede eliminar",
            icon: "warning",
            button: "Aceptar!",
          });

          MostrarTablaCategoria();
        }
      },
    });
  });
});
