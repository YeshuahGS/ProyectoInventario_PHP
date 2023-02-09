$(document).ready(function () {
  function Mostrar(clase) {
    $(clase).removeClass("ocultar");
    $(clase).addClass("mostrar");
  }
  function Ocultar(clase) {
    $(clase).removeClass("mostrar");
    $(clase).addClass("ocultar");
  }

  $(document).ready(function() {
      $(document).on("click", ".signupBtn", function() {
          $(".formBx").addClass('active');
          $("body").addClass('active');
      });
      $(document).on("click", ".signinBtn", function() {
          $(".formBx").removeClass('active');
          $("body").removeClass('active');
      });

  });
  /*var height = $(window).innerHeight();
  $(".login1").innerHeight(height);
  $(".login2").innerHeight(height);*/

  $(document).on("click", "#login", function () {
    Ocultar(".form_registro_usuario");
    Mostrar(".form_login ");
  });
  $(document).on("click", "#btn-registroUsu", function () {
    Ocultar(".form_login ");
    Mostrar(".form_registro_usuario");
  });
  //Logueo
  $(document).on("click", "#logueo", function (e) {
    e.preventDefault();
    var form_login = document.getElementById("form_login");
    var data = new FormData(form_login);
    $.ajax({
      type: "POST",
      url: "controller/usuario/LogueoUsuarioController.php",
      data: data,
      contentType: !1,
      processData: !1,
      success: function (response) {
        if (response == "exito") {
          swal({
            title: "Bienvenido al sistema",
            icon: "success",
            button: "Aceptar!",
          });
          window.location.assign("http://localhost/almacensoia/Menu.php");
        } else {
          swal({
            title: "Usuario o Contraseña incorrecta",
            icon: "warning",
            button: "Aceptar!",
          });
        }
      },
    });
  });
  //Registrar
  $(document).on("click", "#registro-login", function (e) {
    e.preventDefault();
    var form_registro = document.getElementById("form_registro_usuario");
    var data = new FormData(form_registro);
    $.ajax({
      type: "POST",
      url: "controller/usuario/RegistroUsuarioController.php",
      data: data,
      contentType: !1,
      processData: !1,
      success: function (response) {
        if (response == "exito") {
          swal({
            title: "Registro exitoso",
            icon: "success",
            button: "Aceptar!",
          });
        } else if (response == "igual") {
          swal({
            title: "El correo ya esta en uso",
            icon: "warning",
            button: "Aceptar!",
          });
        } else if (response == "EmailLoginNull") {
          swal({
            title: "Necesitas ingresar tu correo!",
            icon: "warning",
            button: "Aceptar!",
          });
        } else if (response == "NombreLoginNull") {
          swal({
            title: "Necesitas ingresar tu nombre!",
            icon: "warning",
            button: "Aceptar!",
          });
        } else if (response == "ApellidoLoginNull") {
          swal({
            title: "Necesitas ingresar tu apellido!",
            icon: "warning",
            button: "Aceptar!",
          });
        } else if (response == "PasswordLoginNull") {
          swal({
            title: "Necesitas ingresar una contraseña!",
            icon: "warning",
            button: "Aceptar!",
          });
        } else {
          swal({
            title: "Parece que algo salio mal!!",
            icon: "warning",
            button: "Aceptar!",
          });
        }
      },
    });
  });
  $(document).on("click", "#cerrarsesion", function () {
    $.ajax({
      type: "POST",
      url: "controller/usuario/CerrarUsuarioController.php",
      data: "data",
      success: function (response) {
        swal({
          title: "Hasta la proxima!!",
          icon: "success",
          button: "Aceptar!",
        });
        window.location.assign("http://localhost/almacensoia/index.php");
      },
    });
  });
});
