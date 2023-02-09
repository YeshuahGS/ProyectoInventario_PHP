<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacen Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="shortcut icon" href="css/images/LogoSoia.PNG" type="image/ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #03a9f4;
            transition: 0.5s;
        }

        body.active {
            background: #f43648;
        }

        .container_login {
            position: relative;
            width: 800px;
            height: 500px;
            margin: 20px;

        }

        .Bluebg {
            position: absolute;
            top: 40px;
            width: 100%;
            height: 420px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 5px 45px rgba(0, 0, 0, 0.15);
        }

        .Bluebg .box {
            position: relative;
            width: 50%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .Bluebg .box h2 {
            color: #fff;
            font-size: 1.2em;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .Bluebg .box button {
            cursor: pointer;
            padding: 10px 20px;
            background: #fff;
            color: #333;
            font-size: 16px;
            font-weight: 500;
            border: none;
        }

        .formBx {
            position: absolute;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            background: #fff;
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 5px 45px rgba(0, 0, 0, 0.25);
            transition: 0.5s ease-in-out;
            overflow: hidden;
        }

        .formBx.active {
            left: 50%;
        }

        .formBx .form {
            position: absolute;
            left: 0;
            width: 100%;
            padding: 50px;
            transition: 0.5s;
        }

        .formBx .signinForm {
            transition-delay: 0.25s;
        }

        .formBx.active .signinForm {
            left: -100%;
            transition-delay: 0s;
        }

        .formBx .signupForm {
            left: 100%;
            transition-delay: 0s;
        }

        .formBx.active .signupForm {
            left: 0;
            transition-delay: 0.25s;
        }

        .formBx .form form {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .formBx .form form h3 {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .formBx .form form input {
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            outline: none;
            font-size: 16px;
            border: 1px solid #333;
        }

        .formBx .form form input[type="submit"] {
            background: #03a9f4;
            border: none;
            color: #fff;
            max-width: 100px;
            cursor: pointer;
        }

        .formBx.active .signupForm input[type="submit"] {
            background: #f43648;
        }

        .formBx .form form .forgot {
            color: #333;
        }

        @media (max-width: 991px) {
            .container_login {
                max-width: 400px;
                height: 650px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .container_login .Bluebg {
                top: 0;
                height: 100%;
            }

            .formBx {
                width: 100%;
                height: 500px;
                top: 0;
                box-shadow: none;
            }

            .Bluebg .box {
                position: absolute;
                width: 100%;
                height: 150px;
                bottom: 0;
            }

            .box.signin {
                top: 0;
            }

            .formBx.active {
                left: 0;
                top: 150px;
            }
        }
    </style>

    <div class="container_login">
        <div class="Bluebg">
            <div class="box signin">
                <h2>¿Ya tienes una cuenta? </h2>
                <button class="signinBtn"> iniciar sesión</button>
            </div>
            <div class="box signup">
                <h2>¿No tienes una cuenta? </h2>
                <button class="signupBtn"> Registrarse</button>
            </div>
        </div>
        <div class="formBx">
            <div class="form signinForm">
                <form action="" id="form_login">
                    <h3>iniciar sesión</h3>
                    <input type="text" name="correo" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" id="logueo" value="Entrar">
                </form>
            </div>
            <div class="form signupForm">
                <form action="" id="form_registro_usuario">
                    <h3>Registrarse</h3>
                    <input type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre">
                    <input type="text" name="apellido_usuario" id="apellido_usuario" placeholder="Apellido">
                    <input type="text" name="email" id="email" placeholder="correo">
                    <input type="password" name="password" id="password" placeholder="Confirm Password">
                    <input type="submit" value="Registro" id="registro-login">
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/function_producto.js"></script>
    <script src="js/function_categoria.js"></script>
    <script src="js/function_usuario.js"></script>
    <script src="js/ubigeo.js"></script>
    <script src="js/sidebar.js"></script>
</body>

</html>