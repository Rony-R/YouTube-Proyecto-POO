
<?php

    session_start();
    if(isset($_FILES)){
        $nombreImg = $_FILES["miniatura"]["name"];
        move_uploaded_file($_FILES["miniatura"]["tmp_name"],"img/miniaturas/".$nombreImg);
    
    }
?>
<!DOCTYPE html>
<html>

<head>
    <span id="span-url" class="d-none"><?php echo $_GET["video"]; ?></span>
    <span id="span-img" class="d-none"><?php echo $nombreImg; ?></span>
    <meta charset="utf-8" />
    <title>YouTube</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.css" />
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>

<body class="yt-background-color">

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
            <button id="campanita" type="button" class="btn btn-light btn-circle end-btn" title="notificaciones">
                <i class="fas fa-bell"></i>
            </button>
            <a id="log-usuario" class="ml-2" data-toggle="modal" data-target="#modal-usuario">
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

        </div>
    </div>
    <!--Fin modal del usuario-->


    <!--Pagina 1-->
    <main id="pagina1" class="contenido-subida contenido-principal item-center main ml-auto mt-5 display-run-in">
        <div class="contenido">
            <div class="upload-box2 mt-3">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        
                        <div class="proceso-subida">
                            <label class="mt-3 txt-13p">
                                <b>Estado de la Subida:</b>
                            </label>
                            <p class="txt-13p">Tu video se esta subiendo</p>
                            <span>
                                <p class="txt-13p">Tu video se publicara en la siguiente página:
                                    <a class="link-yt txt-13p" href="#">watch/video-watch.php</a>
                                </p>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="row barra-progreso-boton">
                            <div class="col-lg-10">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button onclick="publicarVideo(<?php echo $_SESSION["codigo"]?>)" id="btn-publicar" class="btn btn-primary">Publicar</button>
                            </div>
                        </div>

                        <div class="paginas-internas">
                            <div class="btn-group mt-3" role="group" aria-label="Basic example">
                                <button id="infoBasica" type="button" class="btn btn-light" onclick="botonesCategorias('infoBasica')">Información Básica</button>
                                <button id="traducciones" type="button" class="btn btn-light" onclick="botonesCategorias('traducciones')">Traducciones</button>
                                <button id="configAvanzada" type="button" class="btn btn-light" onclick="botonesCategorias('configAvanzada')">Configuración Avanzada</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-7">
                                <form>
                                    <input class="form-control input-espacio" type="text" id="titulo-video" name="txt-titulo-video" placeholder="Título del Video">
                                    <textarea class="form-control input-espacio" name="txta-descripcion1" id="txta-descripcion1" placeholder="Descripción"></textarea>
                                    <input class="form-control input-espacio" type="text" id="etiquetas-video" name="txt-etiquetas-video" placeholder="Etiquetas(ej: gatitos comedia terror)">
                                </form>
                            </div>
                            <div class="col-lg-5">
                                <form>
                                    <select class="form-control mt-3" name="slc-accesos" id="slc-accesos">
                                        <option value="1">Público</option>
                                        <option value="3">Oculto</option>
                                        <option value="2">Privado</option>
                                        <option value="4">Programado</option>
                                    </select>
                                </form>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img class="img-fluid mt-4" src="img/user-icon.png">
                                    </div>
                                    <div class="col-lg-9">
                                        <form>
                                            <textarea class="form-control input-espacio" name="txta-msj-usuario" id="msj-usuario" placeholder="Añade un mensaje a tu video."></textarea>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="row">
                                <div class="col-lg-8">
                                   
                                </div>
                                <div class="boton-miniatura col-lg-3">
                                    <form action="<?php echo $_SERVER["PHP_SELF"]."?video=".$_GET["video"]?>" method="POST" enctype="multipart/form-data">
                                        <label>
                                            <i class="fa fa-lg fa-image"></i>
                                            <input type="file" name="miniatura" class="form-control-file d-none">
                                        </label>
                                        <input type = "submit" value ="Subir miniatura" class="btn btn-sm">
                                    </form>
                                    <p class="txt-13p">Tamaño máximo del archivo: 2MB</p>
                                    <span class="txt-13p">Nombre archivo: <?php echo $nombreImg;?></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--Fin Pagina 1-->

    <!--Pagina 2-->
    <main id="pagina2" class="contenido-subida contenido-principal item-center main ml-auto mt-5 display-none">
        <div class="contenido">
            <div class="upload-box2 mt-3">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                       
                        <div class="proceso-subida">
                            <label class="mt-3 txt-13p">
                                <b>Estado de la Subida:</b>
                            </label>
                            <p class="txt-13p">Tu video se esta subiendo</p>
                            <span>
                                <p class="txt-13p">Tu video se publicara en la siguiente página:
                                    <a class="link-yt txt-13p" href="#">watch/video-watch.php</a>
                                </p>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="row barra-progreso-boton">
                            <div class="col-lg-10">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button onclick="publicarVideo('<?php echo $_SESSION["codigo"]?>')" id="btn-publicar" class="btn btn-primary">Publicar</button>
                            </div>
                        </div>

                        <div class="paginas-internas">
                            <div class="btn-group mt-3" role="group" aria-label="Basic example">
                                <button id="infoBasica" type="button" class="btn btn-light" onclick="botonesCategorias('infoBasica')">Información Básica</button>
                                <button id="traducciones" type="button" class="btn btn-light" onclick="botonesCategorias('traducciones')">Traducciones</button>
                                <button id="configAvanzada" type="button" class="btn btn-light" onclick="botonesCategorias('configAvanzada')">Configuración Avanzada</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mb-1">
                                    <b>Idioma Original</b>
                                </p>
                                <button id="btn-idioma" type="button" class="btn btn-light mt-1 mb-4">Seleccionar Idioma</button>
                            </div>
                            <div class="col-lg-5">
                                <p class="mb-1">
                                    <b>Traducir al</b>
                                </p>
                                <form>
                                    <select class="form-control mt-1 mb-4" name="slc-idiomas" id="slc-idiomas">
                                        <option value="0">Seleccionar Idioma</option>
                                        <option value="1">Idioma 1</option>
                                        <option value="2">Idioma 2</option>
                                        <option value="3">Idioma 3</option>
                                        <option value="4">Idioma 4</option>
                                    </select>
                                </form>
                            </div>
                        </div>

                        <hr class="hr-footer">

                        <div class="row">
                            <div class="col-lg-5 no-pd-right">
                                <form>
                                    <input class="form-control input-espacio" type="text" id="nombre-video1" name="txt-nombre-video1" placeholder="Título del Video">
                                    <textarea class="form-control input-espacio" name="txta-descripcion2" id="txta-descripcion2" placeholder="Descripción"></textarea>
                                </form>
                            </div>
                            <div class="col-lg-1 no-padding">
                                <div class="row mt-4 ml-4">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                                <div class="row mt-5 ml-4">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                            <div class="col-lg-5 no-pd-left">
                                <form>
                                    <input class="form-control input-espacio" type="text" id="nombre-video2" name="txt-nombre-video2" placeholder="Introduce el titulo traducido">
                                    <textarea class="form-control input-espacio" name="txta-descripcion3" id="txta-descripcion3" placeholder="Introduce la descripción traducida"></textarea>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--Fin Pagina 2-->

    <!--Pagina 3-->
    <main id="pagina3" class="contenido-subida contenido-principal item-center main ml-auto mt-5 display-none">
        <div class="contenido">
            <div class="upload-box2 mt-3">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        
                        <div class="proceso-subida">
                            <label class="mt-3 txt-13p">
                                <b>Estado de la Subida:</b>
                            </label>
                            <p class="txt-13p">Tu video se esta subiendo</p>
                            <span>
                                <p class="txt-13p">Tu video se publicara en la siguiente página:
                                    <a class="link-yt txt-13p" href="#">watch/video-watch.php</a>
                                </p>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="row barra-progreso-boton">
                            <div class="col-lg-10">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button onclick="publicarVideo('<?php echo $_SESSION["codigo"]?>')" id="btn-publicar" class="btn btn-primary">Publicar</button>
                            </div>
                        </div>

                        <div class="paginas-internas">
                            <div class="btn-group mt-3" role="group" aria-label="Basic example">
                                <button id="infoBasica" type="button" class="btn btn-light" onclick="botonesCategorias('infoBasica')">Información Básica</button>
                                <button id="traducciones" type="button" class="btn btn-light" onclick="botonesCategorias('traducciones')">Traducciones</button>
                                <button id="configAvanzada" type="button" class="btn btn-light" onclick="botonesCategorias('configAvanzada')">Configuración Avanzada</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">

                                <span>
                                    <label class="txt-14p">
                                        <b>Comentarios</b>
                                    </label>
                                    <p class="txt-14p">
                                        <input class="custom-chk" id="chk-permitir-comentarios" type="checkbox" checked > Permitir comentarios.
                                        <a href="#">Más Informacion</a>
                                    </p>
                                </span>
                                <span>
                                    <label class="txt-14p">
                                        <b>Mostrar</b>
                                    </label>
                                    <select class="form-control mb-3" name="slc-mostrar" id="slc-mostrar">
                                        <option>Todos</option>
                                        <option>Todos excepto los comentarios que puedan ser inapropiados</option>
                                        <option>Aprobar primero</option>
                                    </select>
                                    <form>
                                        <span class="row">
                                            <p class="txt-14p mr-2 mt-1 ml-2">Ordenar por</p>
                                            <select class="form-control no-margin" name="slc-comentarios" id="slc-comentarios">
                                                <option>Mejores Comentarios</option>
                                                <option>Más recientes primero</option>
                                            </select>
                                        </span>
                                        <p class="txt-14p">
                                            <input class="custom-chk" id="chk-valoraciones" type="checkbox" checked> Los usuarios pueden ver las valoraciones
                                        </p>
                                    </form>
                                </span>
                                <sp an>
                                    <label class="txt-13p">
                                        <b>Licencia y propiedad de los derechos </b>
                                        <i class="fas fa-question-circle"></i>
                                    </label>
                                    <form>
                                        <select class="form-control mt-1 mb-4" name="slc-derechos" id="slc-derechos">
                                            <option>Licencia de Youtube estandar</option>
                                            <option>Creative Commons-Atribución</option>
                                        </select>
                                    </form>
                                </span>
                                <span>
                                    <label class="txt-13p">
                                        <b>Distribución</b>
                                    </label>
                                    <form>
                                        <p class="txt-13p no-margin">
                                            <label>
                                                <input type="radio" id="rd-dist1" name="distribucion" value=1> En todas partes
                                                <p class="txt-11p ml-4 text-muted">Difundir este video en todas las plataformas</p>
                                            </label>
                                        </p>
                                        <p class="txt-13p no-margin">
                                            <label>
                                                <input type="radio" id="rd-dist2" name="distribucion" value=0> Plataformas con obtención de ingresos
                                                <p class="txt-11p ml-4 text-muted">Difundir este video solo en plataformas con obtención de ingresos
                                                    <i class="fas fa-question-circle"></i>
                                                </p>
                                            </label>
                                        </p>
                                    </form>
                                </span>
                                <span>
                                    <label class="txt-13p">
                                        <b>Motivo de la ausencia de subtitulos </b>
                                        <i class="fas fa-question-circle"></i>
                                    </label>
                                    <form>
                                        <select class="form-control mt-1 mb-4" name="slc-motivos" id="slc-motivos">
                                            <option value =0>Selecciona una opción</option>
                                            <option value =1>Este contenido nunca se ha emitido en televisión estadounidense</option>
                                            <option value =2>Este contenido solo se ha emitido en televisión estadounidense sin subtitulos</option>
                                            <option value =3>Este contenido no es una reproducción de video de larga duración</option>
                                        </select>
                                    </form>

                                    <p class="txt-13p">
                                        <b>Opciones de distribución</b>
                                    </p>
                                    <p class="txt-14p">
                                        <input class="custom-chk" id="chk-dist1" type="checkbox" checked> Permitir inserción
                                        <i class="fas fa-question-circle"></i>
                                    </p>
                                    <p class="txt-14p">
                                        <input class="custom-chk" id="chk-dist2" type="checkbox" checked> Publicar en el feed Suscripciones y notificar a los suscriptores
                                        <i class="fas fa-question-circle"></i>
                                    </p>

                                    <p class="txt-13p">
                                        <b>Restricción de edad</b>
                                    </p>
                                    <p class="txt-14p">
                                        <input class="custom-chk" id="chk-restriccion" type="checkbox"> Activar restricción de edad
                                        <i class="fas fa-question-circle"></i>
                                    </p>

                                </span>
                            </div>

                            <div class="col-lg-6">
                                <span>
                                    <label class="txt-13p">
                                        <b>Categoria </b>
                                    </label>
                                    <form>
                                        <select class="form-control mt-1 mb-4" name="slc-categoria" id="slc-categoria">
                                            <option value="1">Gente y blogs</option>
                                            <option value="2">Cine y animación</option>
                                            <option value="3">Motor</option>
                                            <option value="4">Música</option>
                                            <option value="5">Mascotas y animales</option>
                                            <option value="6">Deportes</option>
                                            <option value="7">Viajes y eventos</option>
                                            <option value="8">Juegos</option>
                                            <option value="9">Comedia</option>
                                            <option value="10">Entretenimiento</option>
                                            <option value="11">Noticias y Politica</option>
                                            <option value="12">Consejos y estilo</option>
                                            <option value="13">Formación</option>
                                            <option value="14">Ciencia y tecnologia</option>
                                            <option value="15">ONG y activismo</option>
                                        </select>
                                    </form>
                                </span>
                                <span>
                                    <label class="txt-13p">
                                        <b>Ubicación del video</b>
                                    </label>
                                    <p class="txt-11p text-muted">
                                        Se podrá buscar entre los videos públicos.
                                        <a href="#">Más Información</a>
                                        <span class="row">
                                            <input class="form-control ml-3" id="input-buscar" type="text">
                                            <button id="btn-buscar" class="btn btn-light ml-1" type="button">Buscar</button>
                                        </span>
                                    </p>
                                </span>
                                <span>
                                    <label class="txt-13p">
                                        <b>Idioma del video</b>
                                    </label>
                                    <form>
                                        <select class="form-control mt-1 mb-4" name="slc-idioma2" id="slc-idioma2">
                                            <option>Seleccionar Idioma</option>
                                            <option>Español</option>
                                            <option>Inglés</option>
                                            <option>No Aplicable</option>
                                        </select>
                                    </form>
                                </span>
                                <span>
                                    <label class="txt-13p">
                                        <b>Contribuciones a la comunidad</b>
                                    </label>
                                    <p class="txt-14p">
                                        <input class="custom-chk" id="chk-contribuciones" type="checkbox"> Permitir que los aportadores aporten la traducción de titulos, descripciones y subtitulos
                                        <i class="fas fa-question-circle"></i>
                                    </p>
                                </span>
                                <span>
                                    <label class="txt-13p">
                                        <b>Fecha de grabación</b>
                                    </label>
                                    <p>
                                        <span class="row">
                                            <input class="form-control ml-3" id="input-fecha-grabacion" type="text" placeholder="d/m/YYYY">
                                            <button id="btn-hoy" class="btn btn-light ml-1" type="button">Hoy</button>
                                        </span>
                                    </p>
                                </span>
                                <span>
                                    <label class="txt-13p">
                                        <b>Estadísticas de video</b>
                                    </label>
                                    <p class="txt-14p">
                                        <input class="custom-chk" id="chk-estadisticas" type="checkbox" checked> Hacer que las estadísticas de video se muestren públicamente en la página de visualización
                                        <i class="fas fa-question-circle"></i>
                                    </p>
                                </span>
                                <span>
                                    <label class="txt-13p">Video 3D</label>
                                    <p class="txt-11p">
                                        La casilla de verificación del 3D se ha eliminado. Consulta
                                        <a href="#">este articulo del Centro de Ayuda</a> para obtener instrucciones sobre como especificar
                                        los metadatos para subir archivos 3D.
                                    </p>
                                </span>
                                <span>
                                    <label class="txt-13p">
                                        <b>Declaración sobre el contenido</b>
                                    </label>
                                    <p class="txt-14p">
                                        <input class="custom-chk" id="chk-declaracion" type="checkbox"> Este video contiene una comunicación promocional, tal como un emplazamiento de producto,
                                        un patrocinio u otra promoción.
                                        <i class="fas fa-question-circle"></i>
                                    </p>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--Fin Pagina 3-->

    <footer class="container-fluid no-padding p-2">
        <hr class="hr-footer">
        <div class="row mt-3 border-bottom no-gutters">
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
    <script src="js/controlador.js" type="text/javascript"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.jscrollpane.min.js"></script>
    <!--Instancia en caso que el navegador use webkit -->
    <!--Codigo insertado desde https://webdesign.tutsplus.com-->

</body>

</html>