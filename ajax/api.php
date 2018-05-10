<?php

    include("../class/class-conexion.php");
    include("../class/class-videos.php");
    include("../class/class-comentarios.php");
    include("../class/class-canales.php");
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
    }

    $conexion->cerrarConexion();
?>