<?php
    session_start();
?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Subir Videos - YouTube</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>

<body>

    <!--Barra de navegacion de YouTube -->

     <nav class="navbar navbar-light bg-light fixed-top barra">

<div class="form-inline mb-1 w-100">
    <button class="btn btn-light mr-3 item-center" type="button" id="btn-menu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="nav-item nav-link active ml-4" href="index.php" id="yt-brand">
        <div class="logo-container align-middle">
            <img src="img/yt-logo-2.png" alt="" class="logo">
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
    <button type="button" class="btn btn-light btn-circle end-btn ml-4 " onclick="verificacionDoble('<?php echo $_SESSION["codigo"]?>')" title="Subir video"
        id="btn-up2">
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
                    <img src="img\assets\yt-tv.png" class=" ml-2 mr-3"> YouTube TV
                </div>
            </a>
            <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                <div class="pl-2 pr-4">
                    <img src="img\assets\yt-gaming.png" class=" ml-2 mr-3"> YouTube Gaming
                </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                <div class="pl-2 pr-4">
                    <img src="img\assets\yt-music.png" class=" ml-2 mr-3"> YouTube Music
                </div>
            </a>
            <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                <div class="pl-2 pr-4">
                    <img src="img\assets\yt-kids.png" class=" ml-2 mr-3"> YouTube Kids
                </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                <div class="pl-2 pr-4">
                    <img src="img\assets\yt-icon.png" class=" ml-2 mr-3"> Academia de Creadores
                </div>
            </a>
            <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                <div class="pl-2 pr-4">
                    <img src="img\assets\yt-icon.png" class=" ml-2 mr-3"> Youtube para Artistas
                </div>
            </a>
        </div>
    </div>

    <!--Contenido que desaparecera cuando el usuario haga login-->
        <div id="drop-puntitos" class="dropdown">
            <button class="btn btn-light btn-circle end-btn" type="button" id="btn-opc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                title="Configuracion">
                <i class="fas fa-ellipsis-v fa-lg"></i>
            </button>
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
            <img style="width: 27px; height: 27px" src="img/user-icon.png" id="usuario-img" class="img-fluid">
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
                    <img style="width: 50px; height: 50px" src="img/user-icon.png" id="usuario-img" class="img-fluid">
                    <span class="ml-2"><?php echo $_SESSION["nombre"]?></span>
                </div>
                <div id="datos-user" style="margin-left: 25px;">
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
                <a onclick="verificarCanal('<?php echo $_SESSION["codigo"]?>')"><label class="mb-2 ml-4 fz-16">Mi Canal</label></a> <br>
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
            <aside class="sidebar col-xl-2 col-lg-2 col-md-2 nav flex-column collapse d-none d-xl-none navbar-fixed-left" id="barraNav">
                <div class="border-bottom pt-2 pb-2">
                    <a href="index.php" title="Inicio">
                        <div class="entrada">
                            <i class="btn btn-ligth fas fa-home fa-lg pt-3 pb-3 ml-2 mr-4 "></i>
                            Inicio
                    </a>
                    </div>
                    <div class="entrada">
                        <a href="tendencias.php" title="Tendencias">
                            <i class="btn btn-ligth fas fa-fire fa-lg pt-3 pb-3 ml-2  mr-4"></i>
                            Tendencias
                        </a>
                    </div>
                    <div class="entrada">
                        <a href="historial.php" title="Historial">
                            <i class="btn btn-ligth fas fa-history fa-lg pt-3 pb-3 ml-2 mr-4 "></i>
                            Historial
                        </a>
                    </div>
                    <div class="border-bottom pt-2 pb-2">
                        <div class="string-text">
                            <p>LO MEJOR DE YOUTUBE</p>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a href="musica.html" title="Música" class="ml-2">
                                <img src="img/assets/music.jpg" class="img-size ml-2 icon-margin"> Música
                            </a>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a href="deportes.html" title="Deportes" class="ml-2">
                                <img src="img/assets/sport.jpg" class="img-size ml-2 icon-margin"> Deportes
                            </a>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a href="juegos.html" title="Juegos" class="ml-2">
                                <img src="img/assets/games.jpg" class="img-size ml-2 icon-margin"> Juegos
                            </a>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a href="noticias.html" title="Noticias" class="ml-2">
                                <img src="img/assets/news.jpg" class="img-size ml-2 icon-margin"> Noticias
                            </a>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a href="en-vivo.html" title="En vivo" class="ml-2">
                                <img src="img/assets/live.jpg" class="img-size ml-2 icon-margin"> En vivo
                            </a>
                        </div>
                        <div class="entrada pt-2 pb-2">
                            <a href="videos-360.html" title="Videos en 360°" class="ml-2">
                                <img src="img/assets/explore.jpg" class="img-size ml-2 icon-margin"> Videos en 360°
                            </a>
                        </div>
                    </div>
                    <div class="border-bottom pt-2 pb-2">
                        <div class="entrada">
                            <a href="explorar.php" title="Explorar canales">
                                <i class="btn btn-ligth fas fa-plus fa-lg pt-3 pb-3 ml-2 mr-4 "></i>
                                Explorar canales
                            </a>
                        </div>
                    </div>
                    <div class="border-bottom pt-2 pb-2">
                        <div class="ml-2 mr-2 pt-2 pb-2">
                            <p>Accede ahora para ver tus canales y recomendaciones.</p>
                            <a href="#" title="" id="link-acceso">
                                ACCEDER
                            </a>
                        </div>
                    </div>
                    <div class="border-bottom pt-2 pb-2">
                        <div class="entrada">
                            <a href="#" title="Inicio">
                                <i class="btn btn-ligth fas fa-cog fa-lg pt-3 pb-3 ml-2 mr-4 "></i>
                                Configuración
                            </a>
                        </div>
                        <div class="entrada">
                            <a href="#" title="Tendencias">
                                <i class="btn btn-ligth fas fa-question-circle fa-lg pt-3 pb-3 ml-2  mr-4"></i>
                                Ayuda
                            </a>
                        </div>
                        <div class="entrada">
                            <a href="#" title="Historial">
                                <i class="btn btn-ligth fas fa-comment-alt fa-lg pt-3 pb-3 ml-2 mr-4 "></i>
                                Enviar comentar...
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

                            <p class="string-text" style="font-weight: normal;">© 2018 YouTube, LLC</p>
                        </div>
                    </div>
            </aside>
            <main class="col-12 main mt-2 border-bottom ml-auto">
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-8">
                            <div class="upload-box">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="item-center mt-5">
                                            <div class="btn btn-light">
                                                <label id="seleccionar-video">
                                                    <img src="img/upload.png" class="mb-3">
                                                    <form action="ajax/subirVideo.php" class="" method="POST" enctype="multipart/form-data">
                                                        <input type="file" class="form-control-file display-none" name="video">
                                                        <input type="submit" class="btn btn-light" value="Subir video">
                                                    </form>
                                                    <h5 class="mt-2">Selecciona archivos para subir</h5>
                                                </label>
                                                <p class="text-center yt-color">O arrastra y suelta archivos de video </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="item-center">
                                            <select class="btn" name="slc-acceso" id="btn-accesos" title="Privacidad">
                                                <option value="1">Publico</option>
                                                <option value="2">No listado</option>
                                                <option value="3">Privado</option>
                                                <option value="4">Programado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="foto-box p-3 text-left">
                                <div class="media">
                                    <a href="#">
                                        <img class="mr-2 mt-4" src="img/assets/fotos.png" alt="Generic placeholder image">
                                    </a>
                                    <div class="media-body">
                                        <p>
                                            <b>Importar videos</b>
                                        </p>
                                        Importar videos desde Google Fotos.
                                        <br>
                                        <button class="btn btn-sm mt-2 btn-outline-secondary">Importar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="transmition-box p-1 text-left">
                                <div class="media">
                                    <a href="">
                                        <img class="mr-2 mt-4" src="img/assets/live.png" alt="Generic placeholder image">
                                    </a>
                                    <div class="media-body">
                                        <p>
                                            <b>Transmisión en vivo</b>
                                        </p>
                                        Configura tu canal y realiza transmisiones en vivo para tus fans.
                                        <br>
                                        <button class="btn btn-sm mt-1 btn-outline-secondary ml-2">Comenzar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-8 mt-3 mb-3">
                            <div class="suggestion-box yt-color text-left">
                                <p>
                                    <b>AYUDA Y SUGERENCIAS</b>
                                </p>
                                ¿Quieres subir videos de más de 15 minutos?
                                <a href="#">Aumentar límite</a>
                                <br> Al enviar tus videos a YouTube, reconoces que aceptas las
                                <a href="#">Condiciones del servicio</a> y los
                                <a href="#">Lineamientos de la comunidad</a> de YouTube. Asegúrate de no infringir los derechos de autor
                                o de privacidad de otras personas.
                                <a href="#">Más información</a>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" class="yt-color border-right pl-2 pr-2">Instrucciones de Carga</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="yt-color border-right pl-2 pr-2">Solucion de problemas</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="yt-color border-right pl-2 pr-2">Subir desde dispositivos moviles</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            </div>
        </div>
        <footer class="container-fluid no-padding p-2">
            <div class="row mt-4 border-bottom no-gutters">
                <div class="col-2">
                    <div class="footer-logo">
                        <img src="img/yt-logo-2.png" alt="" class="logo">
                    </div>
                </div>
                <div class="col-10">
                    <form class="form-inline">
                        <select class=" btn btn-outline-secondary btn-sm mr-3" name="slc-idioma" id="" title="Idioma">
                            <option value="1">Español</option>
                            <option value="2">No listado</option>
                            <option value="3">Privado</option>
                            <option value="4">Programado</option>
                        </select>
                        <select class="mr-3 btn btn-outline-secondary btn-sm" name="slc-pais" id="" title="Pais">
                            <option value="1">Honduras</option>
                            <option value="2">No listado</option>
                            <option value="3">Privado</option>
                            <option value="4">Programado</option>
                        </select>
                        <select class="mr-3 btn btn-outline-secondary btn-sm" name="slc-modo" id="" title="Modo">
                            <option value="1">Modo restringido: Desactivado</option>
                            <option value="2">Modo restringido: Activado </option>
                        </select>
                        <button class="btn btn-outline-secondary btn-sm mr-3">
                            <i class="fas fa-hourglass fa-sm"></i> &nbsp; Historial</button>
                        <button class="btn btn-outline-secondary btn-sm mr-3">
                            <i class="fas fa-question-circle fa-sm "></i> &nbsp;Ayuda</button>
                    </form>
                </div>
            </div>
            <div class="row p-2 ml-1">
                <div class="col-12">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="list-links">Acerca de</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="list-links">Prensa</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="list-links">Derechos de autor</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="list-links">Creadores</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="list-links">Publicidad</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="list-links">Desarrolladores</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="list-links">+Youtube</a>
                        </li>
                    </ul>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="footer-links bold-0">Condiciones</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="footer-links bold-0">Privacidad</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="footer-links bold-0">Politica y seguridad</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="footer-links bold-0">Enviar comentarios</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="footer-links bold-0">Prueba nuevas funciones</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/barra.js"></script>
        <script src="js/controlador.js"></script>
</body>

</html>