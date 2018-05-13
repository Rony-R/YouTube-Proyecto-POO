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
       case "obtener-videos-sub":
            echo Videos::obtenerVideosSub($conexion,$_POST["id_usuario"]);
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
       case "'insertarComentario'":
            $c = new Comentarios(null,$_POST["idVideo"],$_POST["idUsuario"],$_POST["comentario"],null);
            echo $c->agregarComentario($conexion);
       break;

       case "'obtenerCanales'":
            echo Canal::obtenerCanales($conexion);
       break;
       case "'obtener-canal-sub'":
            echo Canal::obtenerCanalesSub($conexion,$_POST["id_usuario"]);
       break;
       case "'obtenerNoSuscrito'":
            echo Canal::obtenerNoSuscrito($conexion,$_POST["id"]);
       break;
       case "formulario-google":
        $usuario = new Usuario(null, $_POST["genero"], $_POST["nombre"], $_POST["apellido"],$_POST["correo"], 
                        $_POST["contrasena"], $_POST["nacimiento"], $_POST["telefono"], $_POST["ubicacion"], null);
        echo $usuario->ingresarUsuario($conexion);
        break;

        case "inicio-google":
            $usuario2 = new Usuario(null, null, null, null, $_POST["usuario"], $_POST["contra"], null, null, null, null);
            echo $usuario2->verificarUsuario($conexion);
        break;

        case "obtener-info-canal":
            $canal = new Canal($_POST["nombre"], null, null, null, null, null, null, null, null);
            echo $canal->obtenerInfo($conexion);
        break;

        case "btnGroup":
            $canal2 = new Canal($_POST["canal"], null, null, null, null, null, null, null, null);
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
               
                echo 1;
            }
            else
            {
               
                echo 0;
            }
        break;

        case "insertar-video":
            $video = new Videos(null, 
                                $_POST["codCanal"],
                                $_POST["categoria"],
                                $_POST["titulo"],
                                $_POST["descripcion"],
                                "img/videos/".$_POST["url-vid"],
                                "img/miniaturas/".$_POST["url_miniatura"],
                                null,0,0,0,
                                $_POST["mensajeUsuario"],
                                $_POST["acceso"]);
            echo $video->insertarVideo($conexion);
        break;

        case "config-video":
            $config = new Configuracion(null, $_POST["codigo_video"], $_POST["comentarios"], $_POST["mostrarComentarios"],
                        $_POST["licencia"], $_POST["distribucion"], $_POST["subtitulos"],
                        $_POST["restriccionEdad"], $_POST["fecha-grabacion"], $_POST["estadisticas"], 
                        $_POST["contenido"], $_POST["ubicacion"],$_POST["ordenaComentarios"],$_POST["valoraciones"],
                        $_POST["insercion"],$_POST["suscripciones"],$_POST["idiomaVideo"],$_POST["contribucion"]);
            echo $config->insertarConfig($conexion); 
        break;
        case "crear-canal":
            $canal2 = new Canal($_POST["nombre"], $_POST["banner"], $_POST["foto_canal"], null, $_POST["descripcion"], null, $_POST["codigo"], 0, 0);
            echo $canal2->crearCanal($conexion);
        break;

        case "verificarCanal":
            $canal3 = new Canal(null, null, null, null, null, null, $_POST["codigoUsuario"], null, null);
            echo $canal3->verificacionCanal($conexion);
        break;

        case "obtenerCodigoCanal":
            $canal4 = new Canal(null, null, null, null, null, null, $_POST["codigo"], null, null);
            echo $canal4->obtenerCodigoCanal($conexion);
        break;
        case "'historial'":
            Videos::agregarHistorial($conexion,$_POST["codigo_video"],$_POST["codigo_usuario"]);
        break;    
        case "'obtenerHistorial'":
            echo Videos::obtenerHistorial($conexion,$_POST["id"]);
        break;
        case "'borrarHistorial'":
            echo Videos::borrarHistorial($conexion,$_POST["id"]);
        break;
        case "'suscribirse'":
            echo Canal::suscribirseCanal($conexion,$_POST["idUsuario"],$_POST["idCanal"]);
        break;
        case "'unsuscribe'":
            echo Canal::unsuscribeCanal($conexion,$_POST["idUsuario"],$_POST["idCanal"]);
        break;
        case "'masTarde'":
            echo Videos::agregarMasTarde($conexion,$_POST["idUsuario"],$_POST["idVideo"]);
        break;
        case "'obtenerMasTarde'":
            echo Videos::obtenerMasTarde($conexion,$_POST["id"]);
        break;
        case "'obtenerVideosCanal'":
            echo Videos::obtenerVideosCanal($conexion,$_POST["id"]);
        break;
        
        }

?>