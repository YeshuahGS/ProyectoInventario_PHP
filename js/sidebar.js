$(document).ready(function () {
  $(".btn_menu").click(function () {
    $(this).toggleClass("click");
    $(".sidebar").toggleClass("show");
  });

  $(".sidebar ul li a").click(function () {
    var id = $(this).attr("id");
    $("nav ul li ul.item-show-" + id).toggleClass("show");
    $("nav ul li #" + id + " span").toggleClass("rotate");
  });

  function Mostrar(clase) {
    $(clase).removeClass("ocultar");
    $(clase).addClass("mostrar");
  }
  function Ocultar(clase) {
    $(clase).removeClass("mostrar");
    $(clase).addClass("ocultar");
  }
  $("#registroProducto").click(function (e) {
    e.preventDefault();
    $(this).addClass("active");
    $("#footer").addClass("showfooter");
    $("#registroMultimarca").removeClass("active");
    $("#registroCategoria").removeClass("active");
    $("#registroPedido").removeClass("active");
    $("#ListaPedidos").removeClass("active");
    $("#registroEgresos").removeClass("active");

    $(".item-show-2").removeClass("show");
    $(".item-show-3").removeClass("show");
    $(".item-show-4").removeClass("show");
    $(".item-show-5").removeClass("show");
    
    Ocultar("#index");
    Ocultar("#VerRegistroMultimarca");
    Ocultar("#VerRegistroCategoria");
    Ocultar("#VerRegistroPedido");
    Ocultar("#VerListaPedido");
    Ocultar("#VerRegistroEgreso");
    Mostrar("#VerRegistroProducto");
  });

  $("#registroCategoria").click(function (e) {
    e.preventDefault();
    $("#registroProducto").removeClass("active");
    $("#registroMultimarca").removeClass("active");
    $("#registroPedido").removeClass("active");
    $("#ListaPedidos").removeClass("active");
    $("#registroEgresos").removeClass("active");
    $(this).addClass("active");
    $("#footer").addClass("showfooter");

    $(".item-show-1").removeClass("show");
    $(".item-show-3").removeClass("show");
    $(".item-show-4").removeClass("show");
    $(".item-show-5").removeClass("show");

    Ocultar("#index");
    Ocultar("#VerRegistroMultimarca");
    Ocultar("#VerRegistroProducto");
    Ocultar("#VerRegistroPedido");
    Ocultar("#VerListaPedido");
    Ocultar("#VerRegistroEgreso");
    Mostrar("#VerRegistroCategoria");
  });

  $("#registroMultimarca").click(function (e) {
    e.preventDefault();
    $(this).addClass("active");
    $("#footer").addClass("showfooter");
    $("#registroProducto").removeClass("active");
    $("#registroCategoria").removeClass("active");
    $("#registroPedido").removeClass("active");
    $("#ListaPedidos").removeClass("active");
    $("#registroEgresos").removeClass("active");

    $(".item-show-1").removeClass("show");
    $(".item-show-2").removeClass("show");
    $(".item-show-4").removeClass("show");
    $(".item-show-5").removeClass("show");

    Ocultar("#index");
    Ocultar("#VerRegistroProducto");
    Ocultar("#VerRegistroCategoria");
    Ocultar("#VerRegistroPedido");
    Ocultar("#VerListaPedido");
    Ocultar("#VerRegistroEgreso");
    Mostrar("#VerRegistroMultimarca");
  });

  $("#registroPedido").click(function (e) {
    e.preventDefault();
    $(this).addClass("active");
    $("#footer").addClass("showfooter");
    $("#registroProducto").removeClass("active");
    $("#registroCategoria").removeClass("active");
    $("#registroMultimarca").removeClass("active");
    $("#ListaPedidos").removeClass("active");
    $("#registroEgresos").removeClass("active");

    $(".item-show-1").removeClass("show");
    $(".item-show-3").removeClass("show");
    $(".item-show-4").removeClass("show");
    $(".item-show-2").removeClass("show");
    
    Ocultar("#index");
    Ocultar("#VerRegistroProducto");
    Ocultar("#VerRegistroCategoria");
    Ocultar("#VerRegistroMultimarca");
    Ocultar("#VerListaPedido");
    Ocultar("#VerRegistroEgreso");
    Mostrar("#VerRegistroPedido");
  });
  $("#ListaPedidos").click(function (e) {
    e.preventDefault();
    $(this).addClass("active");
    $("#footer").addClass("showfooter");
    $("#registroProducto").removeClass("active");
    $("#registroCategoria").removeClass("active");
    $("#registroMultimarca").removeClass("active");
    $("#registroPedido").removeClass("active");
    $("#registroEgresos").removeClass("active");

    $(".item-show-1").removeClass("show");
    $(".item-show-3").removeClass("show");
    $(".item-show-4").removeClass("show");
    $(".item-show-2").removeClass("show");

    Ocultar("#index");
    Ocultar("#VerRegistroProducto");
    Ocultar("#VerRegistroCategoria");
    Ocultar("#VerRegistroMultimarca");
    Ocultar("#VerRegistroPedido");
    Ocultar("#VerRegistroEgreso");
    Mostrar("#VerListaPedido");
  });
  $("#registroEgresos").click(function (e) {
    e.preventDefault();
    $(this).addClass("active");
    $("#footer").addClass("showfooter");
    $("#registroProducto").removeClass("active");
    $("#registroCategoria").removeClass("active");
    $("#registroMultimarca").removeClass("active");
    $("#registroPedido").removeClass("active");
    $("#ListaPedidos").removeClass("active");

    $(".item-show-1").removeClass("show");
    $(".item-show-3").removeClass("show");
    $(".item-show-2").removeClass("show");
    $(".item-show-5").removeClass("show");

    Ocultar("#index");
    Ocultar("#VerRegistroProducto");
    Ocultar("#VerRegistroCategoria");
    Ocultar("#VerRegistroMultimarca");
    Ocultar("#VerRegistroPedido");
    Ocultar("#VerListaPedido");
    Mostrar("#VerRegistroEgreso");
  });
  $(document).on("click",".content", function () {
    
    $(".btn_menu").addClass("click");
    $(".sidebar").removeClass("show");
  });
});

