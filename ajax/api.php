<?php

    include("../class/class-conexion.php");
    include("../class/class-videos.php");
    include("../class/class-comentarios.php");
    include("../class/class-canal.php");
    include("../class/class-usuario.php");
    include("../class/class-config.php");

    $conexion = new Conexion();

    switch($_GET["accion"]){
       case "'obtener-videos'":
            echo Videos::obtenerVideos($conexion);
       break;

       case "'obtenerVideoID'":
            echo Videos::obtenerVideosById($conexion,$_GET["id"]);
       break;

       case "'obtenerRecomendados'": 
            echo Videos::obtenerVideosRecomendados($conexion,$_GET["idCat"],$_GET["id"]);
       break;

       case "'obtenerTendencias'":
            echo Videos::obtenerTendencias($conexion);
       break;

       case "'buscador'":
            echo Videos::buscarVideos($conexion,$_GET["texto"]);
       break;

       case "'obtenerComentarios'":
            echo Comentarios::obtenerComentarios($conexion,$_GET["id"]);
       break;

       case "'insetarComentario'":
            session_start();
            if((!isset($_SESSION["usr"])) || (!isset($_SESSION["psw"]))){
                header("Location: ../inicio-google.html");
            }
            $c = new Comentario(null,
                                $_POST["idVideo"],
                                $_POST["idUsuario"],
                                $_POST["comentario"],null);
            echo $c->agregarComentario($conexion);
       break;

       case "'obtenerCanales'":
            echo Canal::obtenerCanales($conexion);
       break;

       case "'entrenar'":
            echo Videos::entrenarRed($conexion,$_GET["id"]);
       break;
       
       case "'redRecomendados'":
            echo Videos::redRecomendados($conexion, $_GET["id"]);
       break;

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

        case "verificarLogIn":
            session_start();
            if(isset($_SESSION["usr"]) && isset($_SESSION["psw"]))
                echo 1;
            else
                echo 0;
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
            $video = new Videos(null, null, $_POST["categoria"], $_POST["acceso"], $_POST["titulo"], $_POST["descripcion"], null, null, null, null, null, null, $_POST["mensajeUsuario"]);
            echo $video->insertarVideo($conexion);
        break;

        case "config-video":
            $config = new Configuracion(null, null, $_POST["comentarios"], $_POST["motrarComentarios"],
                        $_POST["licencia"], $_POST["distribucion"], $_POST["subtitutlos"],
                        $_POST["restriccionEdad"], $_POST["fecha-grabacion"], $_POST["estadisticas"], 
                        $_POST["contenido"], $_POST["ubicacion"]);
            echo $config->insertarConfig($conexion); 
        break;

        }

?>