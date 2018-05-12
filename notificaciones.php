<html>

<head>
    <meta charset="utf-8" />
    <title>YouTube</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>

<body>

    <!--Barra de navegacion de YouTube -->

    <nav class="navbar  navbar-light bg-light fixed-top barra">

        <form class="form-inline mb-1 w-100">
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
            <input type="text" placeholder="Buscar" class="form-control m-0 d-none d-lg-block ml-5" id="search-box">
            <button type="button" class="btn btn-light col-1 search-btn" id="btn-search" title="Buscar">
                <i class="fas fa-search fa-lg"></i>
            </button>
            <button type="button" class="btn btn-light btn-circle end-btn ml-5" onclick="location.href='form-videos.php';" title="Subir video"
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
            <div class="dropdown">
                <button class="btn btn-light btn-circle end-btn" type="button" id="btn-opc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    title="Configruacion">
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
            <button  type="button" class="btn btn-light end-btn  mt-1"
                id="btn-login">
                <i class="fas fa-lg fa-user"></i>
            </button>
        </form>
    </nav>

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
            <!--Configuracion de YouTube-->
            <main class="col-12 main mt-2 border-bottom ml-auto">
                <div class="container mt-4 ml-2">
                    <div class="row">
                        <div class="col-2">
                            <div class="creator-box">
                                <div class="card-body">
                                    <p class="yt-color">
                                        <b class="xs-text">CONFIGURACION DE LA CUENTA</b>
                                    </p>
                                    <p class="card-text">
                                        <ul class="list-unstyled ml-2 mr-2">
                                            <li class="mb-1 entrada yt-color">
                                                <a href="configuracion.php" class="no-decoration">Descripcion general</a>
                                            </li>
                                            <li class="mb-1 entrada yt-color">
                                                <a href="cuentas-conectadas.php" class="no-decoration">Cuentas conectadas</a>
                                            </li>
                                            <li class="mb-1 entrada yt-color">
                                                <a href="privacidad.php" class="no-decoration">Privacidad</a>
                                            </li>
                                            <li class="mb-1 entrada yt-color">
                                                <a href="notificaciones.php" class="no-decoration">Notificaciones</a>
                                            </li>
                                            <li class="mb-1 entrada yt-color">
                                                <a href="reproduccion.php" class="no-decoration">Reproducción</a>
                                            </li>
                                            <li class="mb-1 entrada yt-color">
                                                <a href="tv-conectados.php" class="no-decoration">Televisores conectados</a>
                                            </li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="account-box">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="account-header header-account-color">Notificaciones</h5>
                                        <hr>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label>
                                            <input type="radio" name="rd-nt" checked class="ml-4 mr-2">Deseo recibir correos electrónicos sobre mi actividad de YouTube (excepto aquellos
                                            en los que anulé mi suscripción).</label>
                                        <br>
                                        <label>
                                            <input type="radio" name="rd-nt" class="ml-4 mr-2">Solo enviarme los correos electrónicos de anuncios de servicios solicitados
                                        </label>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <h6 class="account-header header-account-color">Quiero que YouTube me envíe correos electrónicos con actualizaciones acerca de lo
                                            siguiente:
                                        </h6>
                                    </div>
                                    <div class="col-12">
                                        <label>
                                            <input type="checkbox" name="chk-act-1" class="ml-4 mr-2">Actualizaciones generales, anuncios y videos</label>
                                        <br>
                                        <label>
                                            <input type="checkbox" name="chk-act-2" class="ml-4 mr-2">Mi canal de YouTube: actualizaciones, anuncios y sugerencias personalizadas</label>
                                        <p class="ml-4">
                                            <a href="#">Obtener más información </a> sobre los correos electrónicos de YouTube.</p>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <h6 class="account-header header-account-color">Correos electrónicos con suscripción anulada
                                        </h6>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <p class="ml-4 yt-color">
                                            <em> Haz clic en el vínculo "Anular suscripción" ubicado en la parte inferior de un
                                                correo electrónico si ya no quieres recibirlo.</em>
                                        </p>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <h6 class="account-header header-account-color pt-1">Suscripción a canales
                                        </h6>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <p class="ml-4">
                                            Recibirás siempre las notificaciones que habilitaste para algunos canales en particular.
                                            <a href="#">Administrar todas las suscripciones</a>
                                            <br> Suscripciones: Notificarme por
                                            <select name="slc-suscripciones" id="">
                                                <option value="1">Notificaciones de aplicación y correo electronico</option>
                                                <option value="2">Solamente notificaciones de aplicación</option>
                                                <option value="3">Solo en correo electronico</option>
                                                <option value="4">Ninguna</option>
                                            </select>
                                        </p>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <h6 class="account-header header-account-color pt-1">Comentarios y actividad
                                        </h6>
                                    </div>
                                    <div class="col-12">
                                        <label>
                                            <input type="checkbox" name="chk-comnt-1" checked class="ml-4 mr-2">Actividad en mis videos o mi canal</label>
                                        <br>
                                        <label>
                                            <input type="checkbox" name="chk-comnt-2" checked class="ml-4 mr-2">Actividad en mis comentarios</label>
                                        <br>
                                        <label>
                                            <input type="checkbox" name="chk-comnt-3" checked class="ml-4 mr-2">Respuestas a mis comentarios</label>
                                        <br>
                                        <label>
                                            <input type="checkbox" name="chk-comnt-4" checked class="ml-4 mr-2">Actividad en otros canales</label>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <h6 class="account-header header-account-color pt-1">Preferencia de idioma
                                        </h6>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <p class="ml-4">Selecciona el idioma del correo electrónico.
                                            <select name="slc-idioma">
                                                <option value="1">Español(latinoamerica)</option>
                                                <option value="2">Español(España)</option>
                                                <option value="3">Ingles (Estados Unidos)</option>
                                                <option value="4">Mandarin</option>
                                                <option value="5">Frances</option>
                                            </select>
                                        </p>
                                        <p class="ml-4 mb-4">Los correos electronicos se envian a <b>correo@example.com</b></p>
                                    </div>
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
            <script src="js/bootstrap.js"></script>
</body>

</html>