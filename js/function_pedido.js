$(document).ready(function () {
  //Listar Pedido
  function ListaPedido() {
    $.ajax({
      type: "POST",
      url: "controller/DetallePedido/ListarPedidoController.php",
      beforeSend: function () {
        $("#MostrarListaPedidos").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#MostrarListaPedidos").html(response);
      },
    });
  }
  ListaPedido();
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
  FormularioPedido();
  //Refrescar Tabla Producto
  function RefrescarTablaProducto() {
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

  //Mostar Producto por el sku
  $(document).on("keyup", "#sku", function () {
    var sku = $(this).val();

    $.ajax({
      type: "POST",
      url: "controller/pedido/detalle/mostrarProducto.php",
      data: {
        sku: sku,
      },
      success: function (response) {
        $("#nproducto").html(response);
      },
    });
  });

  //Mostrar La session con los pedidos
  function MostrarListaPedido() {
    $.ajax({
      type: "POST",
      url: "controller/pedido/mostrarPedidoController.php",
      beforeSend: function () {
        $("#ProductosAgregados").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#ProductosAgregados").html(response);
      },
    });
  }
  MostrarListaPedido();

  $(document).on("click", "#AgregarPedido", function (e) {
    e.preventDefault();
    var pedido = document.getElementById("FormularioAgregarPedido");
    var formData = new FormData(pedido);
    $.ajax({
      type: "POST",
      url: "controller/pedido/LlenarPedidoController.php",
      data: formData,
      contentType: !1,
      processData: !1,
      beforeSend: function () {
        $("#ProductosAgregados").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        console.log(response);
        if (response == "ProductoNull") {
          swal({
            title: "Necesitas ingresar producto!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarListaPedido();
        } else if (response == "error") {
          swal({
            title: "Stock insuficiente!",
            icon: "warning",
            button: "Aceptar!",
          });
          MostrarListaPedido();
        } else {
          $("#ProductosAgregados").html(response);
        }
      },
    });
  });
  $(document).on("click", "#aumentar", function (e) {
    e.preventDefault();
    var indice = $(this).attr("value");
    $.ajax({
      type: "POST",
      url: "controller/pedido/AumentarPedidoController.php",
      data: {
        indice: indice,
      },
      success: function (response) {
        if (response == "error") {
          swal({
            title: "Stock insuficiente!",
            icon: "warning",
            button: "Aceptar!",
          });
        } else {
          MostrarListaPedido();
        }
      },
    });
  });
  $(document).on("click", "#disminuir", function (e) {
    e.preventDefault();
    var indice = $(this).attr("value");
    $.ajax({
      type: "POST",
      url: "controller/pedido/DisminuirPedidoController.php",
      data: {
        indice: indice,
      },
      success: function (response) {
        if (response == "no se pueden poner unidades negativas!!") {
          swal({
            title: "no se pueden poner unidades negativas!!",
            icon: "warning",
            button: "Aceptar!",
          });
        } else {
          MostrarListaPedido();
        }
      },
    });
  });
  $(document).on("click", "#eliminarItemCarrito", function (e) {
    e.preventDefault();
    var indice = $(this).attr("value");
    $.ajax({
      type: "POST",
      url: "controller/pedido/EliminarIndicePedidoController.php",
      data: {
        indice: indice,
      },
      success: function (response) {
        MostrarListaPedido();
      },
    });
  });
  $(document).on("click", "#VaciarCarrito", function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "controller/pedido/VaciarPedidoController.php",
      success: function (response) {
        MostrarListaPedido();
      },
    });
  });
  $(document).on("click", "#HacerPedido", function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "controller/pedido/HacerPedidoController.php",
      success: function (response) {
        console.log(response);
        if (response == "exito") {
          swal({
            title: "Pedido Generado exitosamente!",
            icon: "success",
            button: "Aceptar!",
          });
          MostrarListaPedido();
          ListaPedido();
          RefrescarTablaProducto();
        } else {
          swal({
            title: "Las unidades superan el stock",
            icon: "warning",
            button: "Aceptar!",
          });
        }
      },
    });
  });
  //Paginacion
  $(document).on("click", ".page-link-ListaPedido", function () {
    var page = $(this).attr("page");
    $.ajax({
      type: "POST",
      url: "controller/DetallePedido/ListarPedidoController.php",
      data: {
        page: page,
      },
      beforeSend: function () {
        $("#MostrarListaPedidos").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#MostrarListaPedidos").html(response);
      },
    });
  });

  //Paginacion
  $(document).on("click", ".page-link-ListaPedidoBusqueda", function () {
    var page = $(this).attr("page");
    $.ajax({
      type: "POST",
      url: "controller/DetallePedido/BuscadorListaPedidosPaginacionController.php",
      data: {
        page: page,
      },
      beforeSend: function () {
        $("#MostrarListaPedidos").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#MostrarListaPedidos").html(response);
      },
    });
  });

  //Buscador
  $(document).on("keyup", "#busquedaListaPedido", function () {
    var data = $("#busquedaListaPedido").val();
    $.ajax({
      type: "POST",
      url: "controller/DetallePedido/BuscadorListaPedidosController.php",
      data: {
        data: data,
      },
      beforeSend: function () {
        $("#MostrarListaPedidos").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#MostrarListaPedidos").html(response);
      },
    });
  });

  //Detalle Pedido
  function DetallePedido() {
    $(document).on("click", "#DetallePedido", function () {
      var id = $(this).attr("value");
      $.ajax({
        type: "POST",
        url: "controller/DetallePedido/DetallePedidoController.php",
        data: {
          id: id,
        },
        success: function (response) {
          $("#modal__DetallePedidos").html(response);
        },
      });
    });
  }
  DetallePedido();
  //Paginacion Linea Pedido

  $(document).on("click", ".page-link-LineaPedido", function () {
    var page = $(this).attr("page");
    $.ajax({
      type: "POST",
      url: "controller/DetallePedido/DetallePedidoPaginacionController.php",
      data: {
        page: page,
      },
      beforeSend: function () {
        $("#modal__DetallePedidos").html(
          "<div class='row'><div class='col-lg-12 text-center my-4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-center '><div class='spinner-border' role='status' style='font-size: 20px; width: 100px; height: 100px'><span class='sr-only'>Loading...</span></div></ul></nav></div></div>"
        );
      },
      success: function (response) {
        $("#modal__DetallePedidos").html(response);
      },
    });
  });
  $(document).on("change", "#tipo_descuento", function () {
 
    var tipo_descuento = $(this).val();
    if (tipo_descuento == "porcentaje") {
      $("#descuento").attr("placeholder", "%");
      $("#labelDescuento").text("Descuendo Porcentaje:");
      $("#descuento").removeAttr("disabled");
    } else if (tipo_descuento == "soles") {
      $("#descuento").attr("placeholder", "S/.");
      $("#labelDescuento").text("Descuendo Soles:");
      $("#descuento").removeAttr("disabled");
    }else if (tipo_descuento == "null"){
      $("#descuento").attr("disabled", "disabled");
    }
  });
});
