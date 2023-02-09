$(document).ready(function () {
  function FormMultimarca() {
    $.ajax({
      type: "POST",
      url: "controller/multimarca/FormularioMultimarcaController.php",
      success: function (response) {
        $("#FormMultimarca").html(response);
      },
    });
  }
  FormMultimarca();

  //Ubigeo FormMultimarca
  $(document).on("change", "#departamentos", function () {
    var id = $(this).val();
    $.ajax({
      type: "POST",
      url: "controller/multimarca/ubigeo/provincias.php",
      data: {
        id: id,
      },
      success: function (response) {
        $("#provincias").html(response);
      },
    });
  });
  $(document).on("change", "#provincias", function () {
    var id = $(this).val();
    $.ajax({
      type: "POST",
      url: "controller/multimarca/ubigeo/distrito.php",
      data: {
        id: id,
      },
      success: function (response) {
        $("#distritos").html(response);
      },
    });
  });

  //Ubigeo EditarMultimarca
  $(document).on("change", "#departamentosSelectEditar", function () {
    var id = $(this).val();
    $.ajax({
      type: "POST",
      url: "controller/multimarca/ubigeo/provinciasEditar.php",
      data: {
        id: id,
      },
      success: function (response) {
        $("#provinciasSelectEditar").hide();
        $("#provinciaEditar").html(response);
      },
    });
  });
  $(document).on("change", "#provinciasSelectEditar", function () {
    var id = $(this).val();
    $.ajax({
      type: "POST",
      url: "controller/multimarca/ubigeo/distritoEditar.php",
      data: {
        id: id,
      },
      success: function (response) {
        $("#distritoSelectEditar").hide();
        $("#distritosEditar").html(response);
      },
    });
  });
});
