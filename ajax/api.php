<?php

    include("../class/class-conexion.php");
    include("../class/class-videos.php");
    include("../class/class-comentarios.php");
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
    }

    $conexion->cerrarConexion();
?>