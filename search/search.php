<!DOCTYPE html>
<?php
    if(!isset($_GET["busqueda"])){
        header("location: ../index.html");
    }
    echo '<span class="d-none" id="div-search">'.$_GET["busqueda"].'</span>'
?>
<html>
<head>
    <link rel="icon" type="image/png" href="../img/favicon-yt.png">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search - Youtube</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
</head>
<body class="yt-background-color">
    <!--Barra de navegacion de YouTube -->
    <nav class="navbar  navbar-light bg-light fixed-top barra">

        <form class="form-inline mb-1 w-100">
            <button class="btn btn-light mr-3 item-center" type="button" id="btn-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="nav-item nav-link active ml-4" href="../index.html" id="yt-brand">
                <div class="logo-container align-middle">
                    <img src="../img/yt-logo-2.png" alt="" class="logo">
                </div>
            </a>
            <button type="button" class="btn btn-light d-none" id="btn-atras">
                <i class="fas fa-arrow-left fa-lg"></i>
            </button>
            <input type="text" placeholder="Buscar" class="form-control m-0 d-none d-lg-block ml-5" id="search-box">
            <button type="button" class="btn btn-light col-1 search-btn" id="btn-search" title="Buscar">
                <i class="fas fa-search fa-lg"></i>
            </button>
            <span id="div-busqueda" class="p-3 position-absolute font-weight-bold"></span>
            <button type="button" class="btn btn-light btn-circle end-btn ml-5" onclick="location.href='../form-videos.html';" title="Subir video"
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
                            <img src="..\img\assets\yt-tv.png" class=" ml-2 mr-3"> YouTube TV
                        </div>
                    </a>
                    <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                        <div class="pl-2 pr-4">
                            <img src="..\img\assets\yt-gaming.png" class=" ml-2 mr-3"> YouTube Gaming
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                        <div class="pl-2 pr-4">
                            <img src="..\img\assets\yt-music.png" class=" ml-2 mr-3"> YouTube Music
                        </div>
                    </a>
                    <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                        <div class="pl-2 pr-4">
                            <img src="..\img\assets\yt-kids.png" class=" ml-2 mr-3"> YouTube Kids
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                        <div class="pl-2 pr-4">
                            <img src="..\img\assets\yt-icon.png" class=" ml-2 mr-3"> Academia de Creadores
                        </div>
                    </a>
                    <a class="dropdown-item d-block p-0 pt-2 pb-1" href="#">
                        <div class="pl-2 pr-4">
                            <img src="..\img\assets\yt-icon.png" class=" ml-2 mr-3"> Youtube para Artistas
                        </div>
                    </a>
                </div>
            </div>
            <div class="dropdown">
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
            <button onclick="location.href='../inicio-google.html'" type="button" class="btn btn-outline-danger end-btn btn-sm mt-1"
                id="btn-login">
                ACCEDER
            </button>
        </form>
    </nav>
  <!--Cuerpo de Youtube -->
  <div class="container-fluid no-padding mt-5">
        <div class="row no-gutters">
            <!--Barra lateral de YouTube-->
            <aside class="sidebar col-xl-2 col-lg-2 col-md-2 nav flex-column d-block navbar-fixed-left" id="barraNav">
                <div class="border-bottom pt-2 pb-2">
                    <div class="entrada">
                        <a href="../index.html" title="Inicio" class="d-block item-center">
                            <i class="btn btn-ligth fas fa-home fa-lg pt-3 pb-3 ml-2 mr-4 selected"></i>
                            Inicio
                        </a>
                    </div>
                    <div class="entrada">
                        <a href="../tendencias.html" title="Tendencias" class="d-block">
                            <i class="btn btn-ligth fas fa-fire fa-lg pt-3 pb-3 ml-2  mr-4"></i>
                            Tendencias
                        </a>
                    </div>
                    <div class="entrada">
                        <a href="../historial.html" title="Historial" class="d-block">
                            <i class="btn btn-ligth fas fa-history fa-lg pt-3 pb-3 ml-2 mr-4 "></i>
                            Historial
                        </a>
                    </div>
                </div>
                <div class="border-bottom pt-2 pb-2">
                    <div class="string-text">
                        LO MEJOR DE YOUTUBE
                        <br>
                        <br>
                    </div>
                    <div class="entrada pt-2 pb-2">
                        <a href="../musica.html" title="Música" class="ml-2 d-block">
                            <img src="../img/assets/music.jpg" class="img-size img-fluid ml-2 icon-margin"> Música
                        </a>
                    </div>
                    <div class="entrada pt-2 pb-2">
                        <a href="../deportes.html" title="Deportes" class="ml-2 d-block">
                            <img src="../img/assets/sport.jpg" class="img-size img-fluid ml-2 icon-margin"> Deportes
                        </a>
                    </div>
                    <div class="entrada pt-2 pb-2">
                        <a href="../juegos.html" title="Juegos" class="ml-2 d-block">
                            <img src="../img/assets/games.jpg" class="img-size img-fluid ml-2 icon-margin"> Juegos
                        </a>
                    </div>
                    <div class="entrada pt-2 pb-2">
                        <a href="../noticias.html" title="Noticias" class="ml-2 d-block">
                            <img src="../img/assets/news.jpg" class="img-size img-fluid ml-2 icon-margin"> Noticias
                        </a>
                    </div>
                    <div class="entrada pt-2 pb-2">
                        <a href="../en-vivo.html" title="En vivo" class="ml-2 d-block">
                            <img src="../img/assets/live.jpg" class="img-size img-fluid ml-2 icon-margin"> En vivo
                        </a>
                    </div>
                    <div class="entrada pt-2 pb-2">
                        <a href="../videos-360.html" title="Videos en 360°" class="ml-2 d-block">
                            <img src="../img/assets/explore.jpg" class="img-size img-fluid ml-2 icon-margin"> Videos en 360°
                        </a>
                    </div>
                </div>
                <div class="border-bottom pt-2 pb-2">
                    <div class="entrada">
                        <a href="../explorar.html" title="Explorar canales" class="d-block">
                            <i class="btn btn-ligth fas fa-plus fa-lg pt-3 pb-3 ml-2 mr-3 "></i>
                            <label class="md-text"> Explorar canales </label>
                        </a>
                    </div>
                </div>
                <div class="border-bottom pt-2 pb-2">
                    <div class="ml-2 mr-2 pt-2 pb-2">
                        <p>Accede ahora para ver tus canales y recomendaciones.</p>
                        <a href="../modal-inicio-google.html" title="" id="link-acceso">
                            ACCEDER
                        </a>
                    </div>
                </div>
                <div class="border-bottom pt-2 pb-2">
                    <div class="entrada">
                        <a href="../configuracion.html" title="Configuracion" class="d-block">
                            <i class="btn btn-ligth fas fa-cog fa-lg pt-3 pb-3 ml-2 mr-4 "></i>
                            Configuración
                        </a>
                    </div>
                    <div class="entrada">
                        <a href="#" title="Ayuda" class="d-block">
                            <i class="btn btn-ligth fas fa-question-circle fa-lg pt-3 pb-3 ml-2  mr-4"></i>
                            Ayuda
                        </a>
                    </div>
                    <div class="entrada">
                        <a title="../Enviar comentario" data-toggle="modal" data-target="#modal-comentarios" class="d-block">
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

            <main class="col-md-10 col-12  main ml-auto" id="yt-body">
                <!--Seccion de Video-->
                <span id="div-busqueda" class="p-3 position-absolute font-weight-bold" value=1></span>
                <div class="body-grid ml-5" id="result-search">
                    <div class="border-bottom mb-3 p-2" id="num_resultado">Cerca de </div>
                    

                </div>
                
            </main>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/barra.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/search.js"></script>
    <span class="d-none" id="nivel">1</span>
</body>
</html>