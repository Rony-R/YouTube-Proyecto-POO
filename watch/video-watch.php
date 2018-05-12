<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_GET["id"])){
        header("location: ../index.php");
    }
    echo '<span class="d-none" id="div-codigo">'.$_GET["id"].'</span>'
?>
<html>
<head>
    <link rel="icon" type="image/png" href="../img/favicon-yt.png">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title id="title-pg"></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
</head>
<body class="yt-background-color">
    <!--Barra de navegacion de YouTube -->
    <nav class="navbar navbar-light bg-light fixed-top barra">

        <div class="form-inline mb-1 w-100">
            <button class="btn btn-light mr-3 item-center" type="button" id="btn-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="nav-item nav-link active ml-4" href="../index.php" id="yt-brand">
                <div class="logo-container align-middle">
                    <img src="../img/yt-logo-2.png" alt="" class="logo">
                </div>
            </a>
            <button type="button" class="btn btn-light d-none" id="btn-atras">
                <i class="fas fa-arrow-left fa-lg"></i>
            </button>

            <input type="text" placeholder="Buscar" class="form-control m-0 d-none  d-lg-block ml-5" id="search-box">
            <button type="button" class="btn btn-light col-1 search-btn" id="btn-search" title="Buscar">
                <i class="fas fa-search fa-lg"></i>
            </button>
            <span id="div-busqueda" class="p-3 position-absolute  font-weight-bold"></span>
            <button type="button" class="btn btn-light btn-circle end-btn ml-4" onclick="verificarLogIn()" title="Subir video"
                id="btn-up">
                <i class="fas fa-upload fa-lg"></i>
            </button>
            <div class="dropdown">
                <button class="btn btn-light btn-circle end-btn" type="button" id="btn-apps" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" title="Apps de Youtube">
                    <i class="fas fa-th fa-lg"></i>
                </button>
                <!-- Menu de dropdown de las apps de YouTube-->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btn-apps">
                    <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                        <div class="pl-2 pr-4">
                            <img src="../img\assets\yt-tv.png" class=" ml-2 mr-3"> YouTube TV
                        </div>
                    </a>
                    <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                        <div class="pl-2 pr-4">
                            <img src="../img\assets\yt-gaming.png" class=" ml-2 mr-3"> YouTube Gaming
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                        <div class="pl-2 pr-4">
                            <img src="../img\assets\yt-music.png" class=" ml-2 mr-3"> YouTube Music
                        </div>
                    </a>
                    <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                        <div class="pl-2 pr-4">
                            <img src="../img\assets\yt-kids.png" class=" ml-2 mr-3"> YouTube Kids
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                        <div class="pl-2 pr-4">
                            <img src="../img\assets\yt-icon.png" class=" ml-2 mr-3"> Academia de Creadores
                        </div>
                    </a>
                    <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                        <div class="pl-2 pr-4">
                            <img src="../img\assets\yt-icon.png" class=" ml-2 mr-3"> Youtube para Artistas
                        </div>
                    </a>
                </div>
            </div>
            <div id="drop-puntitos" class="dropdown">
                <button class="btn btn-light btn-circle end-btn" type="button" id="btn-opc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    title="Configruacion">
                    <i class="fas fa-ellipsis-v fa-lg"></i>
                </button>
                <!--Menu dropdown de las configuraciones de YT-->
                <div class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="btn-opc">
                    <a class="dropdown-item d-block p-0 pt-2 pb-1" href="../configuracion.html">
                        <div class="pl-2 pr-4">
                            <i class="fas fa-cog fa-lg ml-2 mr-3"></i> Configuracion
                        </div>
                    </a>
                    <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                        <div class="pl-2 pr-4">
                            <i class="fas fa-question-circle fa-lg ml-2 mr-3"></i> Ayuda
                        </div>
                    </a>
                    <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                        <div class="pl-2 pr-4">
                            <i class="fas fa-comment fa-lg ml-2 mr-3"></i> Enviar comentarios
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <button class="dropdown-item  p-0 pt-2 pb-1 dropright" type="button">
                        <div class="pl-2 pr-4 dropdown-toggle">
                            Idioma: Español
                        </div>
                    <!--Menu dropdown de las configuraciones de YT-->
                    <div class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="btn-opc">
                        <a class="dropdown-item d-block p-0 pt-2 pb-1" href="configuracion.php">
                            <div class="pl-2 pr-4">
                                <i class="fas fa-cog fa-lg ml-2 mr-3"></i> Configuracion
                            </div>
                        </a>
                        <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                            <div class="pl-2 pr-4">
                                <i class="fas fa-question-circle fa-lg ml-2 mr-3"></i> Ayuda
                            </div>
                        </a>
                        <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                            <div class="pl-2 pr-4">
                                <i class="fas fa-comment fa-lg ml-2 mr-3"></i> Enviar comentarios
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <button class="dropdown-item  p-0 pt-2 pb-1 dropright" type="button">
                            <div class="pl-2 pr-4 dropdown-toggle">
                                Idioma: Español
                            </div>
                        </button>
                        <button class="dropdown-item  p-0 pt-2 pb-1 dropright" type="button">
                            <div class="pl-2 pr-4 dropdown-toggle">
                                Ubicacion: Estados Unidos
                            </div>
                        </button>
                        <button class="dropdown-item  p-0 pt-2 pb-1 dropright" type="button">
                            <div class="pl-2 pr-4 dropdown-toggle">
                                Modo Restringido: Desactivado
                            </div>
                        </button>
                    </div>
                </div>

                <button id="campanita" type="button" class="btn btn-light btn-circle end-btn display-none" title="notificaciones">
                    <i class="fas fa-bell"></i>
                </button>

                <button id="btn-iniciar-sesion" onclick="location.href='inicio-google.html'" type="button" class="btn btn-outline-danger btn-sm mt-1">
                    INICIAR SESIÓN
                </button>

                <a id="log-usuario" class="ml-2 display-none" data-toggle="modal" data-target="#modal-usuario">
                    <img style="width: 27px; height: 27px" src="../img/user-icon.png" id="usuario-img" class="img-fluid">
                </a>
                
            <!--Fin contenido que desaparecera cuando el usuario haga login-->

        </form>
    </nav>
    <!--Modal del usuario-->
    <div class="modal" id="modal-usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 300px">
                <div style="padding-left: 40px; padding-right: 40px; padding-top: 20px; background-color: #E6E6E6">
                   <div class="row">
                        <div id="foto-user">
                            <img style="width: 50px; height: 50px" src="../img/user-icon.png" id="usuario-img" class="img-fluid">
                        </div>
                        <div id="datos-user" style="margin-left: 25px;">
                            <div class="row">
                                <p class=""><?php echo $_SESSION["nombre"]?></p>
                            </div>
                            <div class="row">
                                <p><?php echo $_SESSION["usr"]?></p>
                                <span class="d-none" id="txt-codigo"><?php echo $_SESSION["codigo"] ?></span>
                            </div>
                        </div>
                   </div>
                </div>
                <div class="modal-body">
                    <div id="div-1">
                        <i class="fas fa-user-circle fz-20"></i>
                        <label class="mb-2 ml-4 fz-16">Mi Canal</label> <br>
                        <i class="fas fa-cog fz-20"></i>
                        <label class="mb-2 ml-4 fz-16">Crear Studio</label> <br>
                        <i class="far fa-user-circle fz-20"></i>
                        <label class="mb-2 ml-4 fz-16">Cambiar de Cuenta</label> <br>
                        <i class="fas fa-sign-out-alt fz-20"></i>
                        <a onclick="cerrarSesion()"><label class="mb-2 ml-4 fz-16">Cerrar Sesión</label></a>
                        <hr>
                    </div>
                    <div id="div-2">
                        <i class="fas fa-moon fz-20"></i>
                        <label class="mb-2 ml-4 fz-16">Tema Oscuro</label> <br>
                        <i class="fas fa-cogs fz-20"></i>
                        <label class="mb-2 ml-4 fz-16">Ajustes</label> <br>
                        <i class="fas fa-question-circle fz-20"></i>
                        <label class="mb-2 ml-4 fz-16">Ayuda</label> <br>
                        <i class="fas fa-exclamation-circle fz-20"></i>
                        <label class="mb-2 ml-4 fz-16">Enviar Sugerencias</label>
                        <hr>
                    </div>
                    <div id="div-3">
                        <label class="mb-2 text-muted">Idioma</label> <br>
                        <label class="mb-2 text-muted">Ubicación</label> <br>
                        <label class="mb-2 text-muted">Modo Restringido</label>
                    </div>
                </div>

            </div>
            <button id="campanita" type="button" class="btn btn-light btn-circle end-btn display-none" title="notificaciones">
                    <i class="fas fa-bell"></i>
                </button>

                <button id="btn-iniciar-sesion" onclick="location.href='inicio-google.html'" type="button" class="btn btn-outline-danger btn-sm mt-1">
                    INICIAR SESIÓN
                </button>

                <a id="log-usuario" class="ml-2 display-none" data-toggle="modal" data-target="#modal-usuario">
                    <img style="width: 27px; height: 27px" src="img/user-icon.png" id="usuario-img" class="img-fluid">
                </a>
        </form>
    </nav>

    <!--Modal del usuario-->
    <div class="modal" id="modal-usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 300px">
                <div style="padding-left: 40px; padding-right: 40px; padding-top: 20px; background-color: #E6E6E6">
                   <div class="row">
                        <div id="foto-user">
                            <img style="width: 50px; height: 50px" src="img/user-icon.png" id="usuario-img" class="img-fluid">
                        </div>
                        <div id="datos-user" style="margin-left: 25px;">
                            <div class="row">
                                <p class="no-margin"><?php echo $_SESSION["nombre"]?></p>
                            </div>
                            <div class="row">
                                <p><?php echo $_SESSION["usr"]?></p>
                            </div>
                        </div>
                   </div>
                </div>
                <div class="modal-body">
                    <div id="div-1">
                        <i class="fas fa-user-circle fz-20"></i>
                        <a onclick="verificarCanal('<?php echo $_SESSION["cod"]?>')"><label class="mb-2 ml-4 fz-16">Mi Canal</label></a> <br>
                        <i class="far fa-user-circle fz-20"></i>
                        <label class="mb-2 ml-4 fz-16">Imagen Perfil</label> <br>
                        <i class="fas fa-sign-out-alt fz-20"></i>
                        <a onclick="cerrarSesion()"><label class="mb-2 ml-4 fz-16">Cerrar Sesión</label></a>
                        <hr>
                    </div>
                    <div id="div-2">
                        <i class="fas fa-moon fz-20"></i>
                        <label class="mb-2 ml-4 fz-16">Tema Oscuro</label> <br>
                        <i class="fas fa-cogs fz-20"></i>
                        <label class="mb-2 ml-4 fz-16">Ajustes</label> <br>
                        <i class="fas fa-question-circle fz-20"></i>
                        <label class="mb-2 ml-4 fz-16">Ayuda</label> <br>
                        <i class="fas fa-exclamation-circle fz-20"></i>
                        <label class="mb-2 ml-4 fz-16">Enviar Sugerencias</label>
                        <hr>
                    </div>
                    <div id="div-3">
                        <label class="mb-2 text-muted">Idioma</label> <br>
                        <label class="mb-2 text-muted">Ubicación</label> <br>
                        <label class="mb-2 text-muted">Modo Restringido</label>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!--Fin modal del usuario-->


  <!--Cuerpo de Youtube -->
  <div class="container-fluid no-padding mt-5">
        <div class="row no-gutters">
            <!--Barra lateral de YouTube-->
            <aside class="sidebar col-xl-2 col-lg-2 col-md-2 nav flex-column  d-none navbar-fixed-left" id="barraNav">
                <div class="border-bottom pt-2 pb-2">
                    <div class="entrada">
                        <a href="../index.php" title="Inicio" class="d-block item-center">
                            <i class="btn btn-ligth fas fa-home fa-lg pt-3 pb-3 ml-2 mr-4 selected"></i>
                            Inicio
                        </a>
                    </div>
                    <div class="entrada">
                        <a href="../tendencias.php" title="Tendencias" class="d-block">
                            <i class="btn btn-ligth fas fa-fire fa-lg pt-3 pb-3 ml-2  mr-4"></i>
                            Tendencias
                        </a>
                    </div>
                    <div class="entrada">
                        <a href="../historial.php" title="Historial" class="d-block">
                            <i class="btn btn-ligth fas fa-history fa-lg pt-3 pb-3 ml-2 mr-4 "></i>
                            Historial
                        </a>
                    </div>
                </div>

                 <!--Div que se mostrara cuando el usuario inicie sesion-->
                 <div id="mostrar-al-login" class="display-none">
                    <div class="border-bottom pt-2 pb-2">
                        <div class="string-text">
                            BIBLIOTECA
                            <br><br>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a href="#" class="ml-2 d-block">
                                <i class="btn btn-ligth fab fa-youtube fa-lg pt-3 pb-3 ml-2 mr-2"></i>Suscripciones
                            </a>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a href="#" class="ml-2 d-block">
                                <i class="btn btn-ligth fas fa-clock fa-lg pt-3 pb-3 ml-2 mr-2"></i>Ver más Tarde
                            </a>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a href="#" class="ml-2 d-block">
                                <i class="btn btn-ligth fas fa-thumbs-up fa-lg pt-3 pb-3 ml-2 mr-2"></i>Videos que me gus...
                            </a>
                        </div>
                    </div>

                    <div class="border-bottom pt-2 pb-2">
                        <div class="string-text">
                            SUSCRIPCIONES
                            <br><br>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a onclick="obtenerInfoCanal('Musica')" class="ml-2 d-block">
                                <img src="img/assets/music.jpg" class="img-size img-fluid ml-2 icon-margin">Música
                            </a>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a onclick="obtenerInfoCanal('Deportes')" class="ml-2 d-block">
                                <img src="img/assets/sport.jpg" class="img-size img-fluid ml-2 icon-margin">Deportes
                            </a>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a onclick="obtenerInfoCanal('Juegos')" class="ml-2 d-block">
                                <img src="img/assets/games.jpg" class="img-size img-fluid ml-2 icon-margin">Juegos
                            </a>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a onclick="obtenerInfoCanal('Noticias')" class="ml-2 d-block">
                                <img src="img/assets/news.jpg" class="img-size img-fluid ml-2 icon-margin">Noticias
                            </a>
                        </div>
                    </div>
                </div>
                <!--Fin div que se mostrara cuando el usuario inicie sesion-->

                 <div id="ocultar-al-login" class="display-block">
                    <div class="border-bottom pt-2 pb-2">
                        <div class="string-text">
                            LO MEJOR DE YOUTUBE
                            <br>
                            <br>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a onclick="obtenerInfoCanal('Musica')" title="Música" class="ml-2 d-block">
                                <img src="../img/assets/music.jpg" class="img-size img-fluid ml-2 icon-margin"> Música
                            </a>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a onclick="obtenerInfoCanal('Deportes')" title="Deportes" class="ml-2 d-block">
                                <img src="../img/assets/sport.jpg" class="img-size img-fluid ml-2 icon-margin"> Deportes
                            </a>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a onclick="obtenerInfoCanal('Juegos')" title="Juegos" class="ml-2 d-block">
                                <img src="../img/assets/games.jpg" class="img-size img-fluid ml-2 icon-margin"> Juegos
                            </a>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a onclick="obtenerInfoCanal('Noticias')" title="Noticias" class="ml-2 d-block">
                                <img src="../img/assets/news.jpg" class="img-size img-fluid ml-2 icon-margin"> Noticias
                            </a>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a onclick="obtenerInfoCanal('Videos en Vivo')" title="En vivo" class="ml-2 d-block">
                                <img src="../img/assets/live.jpg" class="img-size img-fluid ml-2 icon-margin"> En vivo
                            </a>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a onclick="obtenerInfoCanal('Videos en 360')" title="Videos en 360°" class="ml-2 d-block">
                                <img src="../img/assets/explore.jpg" class="img-size img-fluid ml-2 icon-margin"> Videos en 360°
                            </a>
                        </div>
                    </div>
                </div>

                <div class="border-bottom pt-2 pb-2">
                    <div class="entrada">
                        <a href="../explorar.php" title="Explorar canales" class="d-block">
                            <i class="btn btn-ligth fas fa-plus fa-lg pt-3 pb-3 ml-2 mr-3 "></i>
                            <label class="md-text"> Explorar canales </label>
                        </a>
                    </div>
                </div>
                <div id="ocultar-al-login2" class="border-bottom pt-2 pb-2">
                    <div class="ml-2 mr-2 pt-2 pb-2">
                        <p>Accede ahora para ver tus canales y recomendaciones.</p>
                        <a href="inicio-google.html" title="" id="link-acceso">
                            INICIAR SESIÓN
                        </a>
                    </div>
                </div>
                <div class="border-bottom pt-2 pb-2">
                    <div class="entrada">

                        <a href="../configuracion.php" title="Configuracion" class="d-block">
                            <i class="btn btn-ligth fas fa-cog fa-lg pt-3 pb-3 ml-2 mr-4 "></i>
                            Configuración
                        </a>
                    </div>
                    <div class="entrada">
                        <a data-toggle="modal" data-target="#modal-ayuda" title="Ayuda">
                            <i class="btn btn-ligth fas fa-question-circle fa-lg pt-3 pb-3 ml-2  mr-4"></i>
                            Ayuda
                        </a>
                    </div>
                    <div class="entrada">
                        <a data-toggle="modal" data-target="#modal-comentarios" title="Enviar comentario">
                            <i class="btn btn-ligth fas fa-comment-alt fa-lg pt-3 pb-3 ml-2 mr-4 "></i>
                            Enviar Coment
                        </a>
                    </div>
                </div>
                <div class="border-bottom pt-2 pb-2">
                    <div class="ml-2 mr-2 pt-2 pb-2">
                        <ul class="list-inline pt-2 pb-2 pl-2 pr-2">
                            <li class="list-inline-item">
                                <a href="#" class="footer-links">Acerca de</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="footer-links">Prensa</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="footer-links">Derechos de autor</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="footer-links">Creadores</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="footer-links">Publicidad</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="footer-links">Desarrolladores</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="footer-links">+Youtube</a>
                            </li>
                        </ul>
                        <ul class="list-inline pl-2 pr-2">
                            <li class="list-inline-item">
                                <a href="#" class="footer-links">Condiciones</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="footer-links">Privacidad</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="footer-links">Politicas y seguridad</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="footer-links">Prueba nuevas funciones</a>
                            </li>
                        </ul>
                        <p class="string-text pt-1" style="font-weight: normal;">© 2018 YouTube, LLC</p>
                    </div>
                </div>

            </aside>

            <!--modal para enviar comentarios-->
            <div class="modal" id="modal-comentarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Enviar Comentarios</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <!--&times es la x para cerrar el modal-->
                            </button>
                        </div>
                        <div class="modal-body">
                            <!--Cuerpo del moodal donde ira el contenido-->
                            <div class="text-area">
                                <textarea placeholder="Describe el problema o comparte tus ideas" rows="6" cols="49">
                                </textarea>
                            </div>
                            <div class="row">
                                <img class="img-enviar-comentario" src="../img/banner-yt.jpg">
                            </div>
                        </div>

                        <div class="parrafo-informativo">
                            <p class="parrafo">
                                Accede a la
                                <a href="modal-inicio-google.html">página de ayuda jurídica</a> para solicitar cambios en el contenido por motivos legales.
                                Tu opinión e
                                <a href="#">información adicional</a> se enviarán a Google. Consulta la
                                <a href="https://www.google.com/intl/es/policies/privacy/">Política de Privacidad</a>
                                y las
                                <a href="https://www.google.com/intl/es/policies/terms/">Condiciones de Servicio.</a>
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>

                </div>
            </div>
            <!--fin modal para enviar comentarios-->

            <main class="col-md-12 col-12 main ml-auto" id="yt-body">
                <!--Seccion de Video-->
                
                <div class="row ml-4">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-xs-12 col-12 p-3">
                        <div class="row">
                            <div class="col-12 border-bottom" id="sc-video">
                                <video src="" style="width: inherit; height: 500px" controls controlsList="nodownload" id="video-content" autoplay>
                                </video>
                                <br>
                            <h3 id="video-title"></h3>
                            <h5 id="video-visual"></h5>
                            <br>
                                <div class="float-right">
                                    <label>
                                        <button class="btn btn-outline-light ">
                                            <i class="fas fa-lg fa-thumbs-up"></i>
                                        </button>
                                        <span id="video-likes"></span>
                                    </label>
                                    <label>
                                        <button class="btn btn-outline-light rounded-circle">
                                            <i class="fas fa-lg fa-thumbs-down"></i>
                                        </button>
                                        <span id="video-dislikes"></span>
                                    </label>
                                    <label class="yt-color">
                                        <button class="btn btn-outline-light rounded-circle">
                                            <i class="fas fa-lg fa-share"></i>
                                            </button>Compartir
                                    </label>
                                    <button class="btn btn-outline-light rounded-circle">
                                        <i class="fas fa-lg fa-plus-square"></i>
                                    </button>
                                    <span class="dropdown">
                                        <button class="btn btn-outline-light rounded-circle" type="button"
                                        id="btn-opc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        title="Mas">    
                                            <i class="fas fa-lg fa-ellipsis-h"></i>
                                        </button>
                                        <!--Dropdown de Menu de Mas opciones de video-->
                                        <div class="dropdown-menu  p-2">
                                             <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                                                <div class="pl-2 pr-4">
                                                  Denunciar
                                                </div>
                                            </a>
                                            <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                                                <div class="pl-2 pr-4">
                                                  Abrir transcripcion
                                                </div>
                                            </a>
                                            <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                                                <div class="pl-2 pr-4">
                                                  Agregar traduccion
                                                </div>
                                            </a>
                                        </div>
                                    <span>
                                </div>
                            </div> 
                            <div class="col-12 mt-3 mb-3">
                                <img class="img-fluid rounded-circle" src="" id="foto-canal" style="width: 50px; height: 50px;">
                                <button class="btn btn-danger float-right mb-4" id="btn-suscribirse">Suscribirse</button>
                                <span class="font-weight-bold ml-2" id="div-nombre"></span><br>
                                <span class="yt-color" id="div-fecha" style="margin-left: 60px;"></span><br>
                                <button class="btn btn-outline-light yt-color" id="btn-mostrar" style="margin-left: 47px;">Mostrar mas</button>
                                <div class=" d-none text-justify yt-color p-3" id="div-descripcion" >

                                </div>
                            </div>
                            <!--Seccion de Comentarios-->
                            <div class="col-12">
                               <textarea class="form-control" id="txt-comentario"></textarea>
                               <br>
                               <button class="btn btn-danger float-right" id="btn-publicar">Publicar</button>
                               <div class="row mt-3" id="div-comentarios">
                                   
                               </div>
                            </div> 
                        </div>
                    </div>
                    <!--Seccion de recomendados-->
                    <div class="col-xl-3 col-lg-2 col-md-2 col-xs-12 col-12 p-1" id="div-recomendados">
                            <label class="font-weight-bold ml-2 mt-3">Recomendados</label>
                    </div>
                </div>
                
            </main>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="js/controlador.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/barra.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/watch.js"></script>
    <script src ="../js/controlador.js"></script>
    <span class="d-none" id="nivel">1</span>
</body>
</html>