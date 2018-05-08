<?php

    include("../class/class-conexion.php");
    include("../class/class-usuario.php");
    include("../class/class-canal.php");

    $conexion = new Conexion();

    switch($_GET["accion"])
    {
        case "formulario-google":
            $usuario = new Usuario(null, $_POST["genero"], $_POST["nombre"], $_POST["apellido"],$_POST["correo"], 
							$_POST["contrasena"], $_POST["nacimiento"], $_POST["telefono"], $_POST["ubicacion"]);
	        echo $usuario->ingresarUsuario($conexion);
        break;

        case "inicio-google":
            $usuario2 = new Usuario(null, null, null, null, $_POST["usuario"], $_POST["contra"], null, null, null);
	        echo $usuario2->verificarUsuario($conexion);
        break;

        case "obtener-info-canal":
            $canal = new Canal($_POST["nombre"], null, null, null, null);
            echo $canal->obtenerInfo($conexion);
        break;

        case "btnGroup":
            $canal2 = new Canal($_POST["canal"], null, null, null, null);
            echo $canal2->obtenerInfo($conexion);
        break;

        case "log-out":
            session_start();
            if(session_destroy())
            {
                sleep(3);
                echo 1;
            }
            else
            {
                sleep(3);
                echo 0;
            }
        break;

        case "insertar-video":
        break;

    }

?>