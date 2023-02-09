<!DOCTYPE html>
<?php session_start(); ?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacen Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="shortcut icon" href="css/images/LogoSoia.PNG" type="image/ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <!--LINKS PARA EXPORTAR A EXCEL-->
    <script src="https://unpkg.com/xlsx@latest/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php

    if (!isset($_SESSION['login'])) : ?>
        <div class="container text-center" style="height: 100vh; display: flex; justify-content: center; align-items: center;">

            <h1>Ups!! al parecer no estas logueado</h1>

        </div>

    <?php else : ?>
        <div class="contenedorBtnMenu">
            <div class="btn_menu"> <span class="fas fa-bars"></span> </div>
        </div>

        <nav class="sidebar show">
            <div class="text"> Almacen Virtual de <?= $_SESSION['nombre_usuario'] ?> </div>
            <ul class="main_side">
                <li>
                    <a href="#" id="1">Producto<span class="fas fa-caret-down"></span> </a>
                    <ul class="item-show-1">
                        <li id="registroProducto"><a href="#" id="registroProducto">Registro Producto</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" id="2">Categoria <span class="fas fa-caret-down"></span> </a>
                    <ul class="item-show-2">
                        <li id="registroCategoria"><a href="#" id="registroCategoria">Registro Categoria</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" id="3">Multimarca <span class="fas fa-caret-down"></span> </a>
                    <ul class="item-show-3">
                        <li id="registroMultimarca"><a href="#" id="registroMultimarca">Registro Multimarca</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" id="4">Egresos<span class="fas fa-caret-down"></span> </a>
                    <ul class="item-show-4">
                        <li id="registroEgresos"><a href="#" id="registroEgresos">Registro Egresos</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" id="5">Pedidos<span class="fas fa-caret-down"></span> </a>
                    <ul class="item-show-5">
                        <li id="registroPedido"><a href="#" id="registroPedido">Registro Pedido</a></li>
                        <li id="ListaPedidos"><a href="#" id="ListaPedidos">Lista Pedido</a></li>
                    </ul>
                </li>
                <li><a href="#" id="cerrarsesion">Cerrar Sesion</a></li>
            </ul>
        </nav>
        <div class="content">

            <div class="mostrar mt-4" id="index">
                <h1>Bienvenido(@) al sistema de almacen virtual
                    <?php
                    echo $_SESSION['nombre_usuario'];
                    ?>
                </h1>
            </div>
            <div class="ocultar mt-4" id="VerRegistroProducto">
                <?php include_once "views/producto/producto.php" ?>
            </div>
            <div class="ocultar mt-4 w-100" id="VerRegistroCategoria">
                <?php include_once "views/categoria/categoria.php" ?>
            </div>
            <div class="ocultar mt-4" id="VerRegistroMultimarca">
                <?php include_once "views/multimarca/multimarca.php" ?>
            </div>
            <div class="ocultar mt-4" id="VerRegistroPedido">
                <?php include_once "views/pedido/pedido.php" ?>
            </div>
            <div class="ocultar mt-4" id="VerListaPedido">
                <?php include_once "views/pedido/ListaPedidos.php" ?>
            </div>
            <div class="ocultar mt-4" id="VerRegistroEgreso">
                <?php include_once "views/egresos/egresos.php" ?>
            </div>
        </div>
    <?php endif; ?>
    <!-- Remove the container if you want to extend the Footer to full width. -->
    <div class="container my-5">

        <!-- Footer -->
        <footer class="text-center text-lg-start text-white footer " id="footer">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-between p-4" style="background: rgba(0,0,0, 0.4);">
                <!-- Left -->
                <div class="me-5">
                    <span>Conéctate conmigo en mis redes sociales:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <a href="https://www.facebook.com/yeshuah.gutierrezsotomayor/" class="text-white me-4" style="text-decoration: none;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/yeshuahgs/" class="text-white me-4" style="text-decoration: none;">
                    <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UCszv7L5UjZObihcENJ27LNg" class="text-white me-4" style="text-decoration: none;">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(255, 255, 255, 0.3)">
                ©2021 Desarrollado por:
                <a class="text-white" style="text-decoration: none;" href="https://www.instagram.com/yeshuahgs/">Yeshuah G.S</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/function_producto.js"></script>
    <script src="js/function_productoExcel.js"></script>
    <script src="js/function_categoria.js"></script>
    <script src="js/function_usuario.js"></script>
    <script src="js/function_multimarca.js"></script>
    <script src="js/function_pedido.js"></script>
    <script src="js/function_egresos.js"></script>
    <script src="js/ubigeo.js"></script>
    <script src="js/sidebar.js"></script>
</body>

</html>