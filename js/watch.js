$.getScript("../js/funciones.js");

$(document).ready(function () {
    var id = "id=" + $("#div-codigo").html();
    var parametros = "";
    $.ajax({
        url: "../ajax/api.php?accion='obtenerVideoID'",
        data: id,
        dataType: "json",
        success: function (respuesta) {
            $("#title-pg").html(respuesta.titulo + " - YouTube");
            $("#video-content").attr("src", "../" + respuesta.url_video);
            $("#video-title").html(respuesta.titulo);
            $("#video-visual").html(respuesta.num_visualizaciones + " visualizaciones");
            $("#video-likes").append(parseVisualizaciones(respuesta.num_likes));
            $("#video-dislikes").append(parseVisualizaciones(respuesta.num_dislikes));
            $("#foto-canal").attr("src", "../" + respuesta.foto_canal);
            $("#div-nombre").html(respuesta.nombre_canal);
            $("#div-fecha").html(parseTimeVideo(respuesta.fecha_subida));
            $("#div-descripcion").html(respuesta.descripcion);
            $("#btn-suscribirse").append(" " + parseVisualizaciones(respuesta.num_suscriptores));
            parametros = id + "&idCat=" + respuesta.codigo_categoria;
            obtenerRecomendados(parametros);
        },
        error: function (e) {
            console.log(e);
        }
    });

    $.ajax({
        url: "../ajax/api.php?accion='obtenerComentarios'",
        data: id,
        dataType: "json",
        success: function (respuesta) {
            for (var i = 0; i < respuesta.length; i++) {
                $("#div-comentarios").append(
                    ' <div class="col-12 mt-3 mb-3 ">' +
                    ' <img class="img-fluid rounded-circle img-comentarios" src="../' + respuesta[i].url_imagen_perfil + '" >' +
                    '<span class="font-weight-bold ml-2 txt-14">' + respuesta[i].nombre + '</span>' +
                    '<span class="yt-color txt-14p ml-1" >Hace ' + parseTimeElement(respuesta[i].fecha_comentario) + '</span>' +
                    '<div style="margin-left: 55px;">' + respuesta[i].comentario + '</div>' +
                    '</div>'
                );
            }
        },
        error: function (e, textStatus, error) {
            console.log(e);
            console.log(error);
        }
    });



});

/**
 * Funcion AJAX que obtiene videos relacionados a la categoria del video seleccionado
 * @param {*} parametros 
 */
function obtenerRecomendados(parametros) {
    $.ajax({
        url: "../ajax/api.php?accion='obtenerRecomendados'",
        data: parametros,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta.length > 0) {
                for (var i = 0; i < respuesta.length; i++) {
                    $("#div-recomendados").append(
                        '<div class="row ml-2">' +
                        '<div class="col-12 p-0">' +
                        '<div class="row no-gutters">' +
                        '<div class="foto col-xl-7 col-lg-7 col-md-7">' +
                        '<a href="video-watch.php?id=' + respuesta[i].codigo_video + '" class="d-block" onclick="Neurona(' +
                        respuesta[i].codigo_video + ')">' +
                        '<div class="video-miniatura-tendencias mt-3">' +
                        '<img class="img-fluid" src="../' + respuesta[i].url_miniatura + '">' +
                        '</div>' +
                        '</a>' +
                        '</div>' +
                        '<div class=" col-xl-5 col-lg-5 col-md-5">' +
                        '<div class=" ml-2 p-1 mt-2">' +
                        '<a href="video-watch.php?id=' + respuesta[i].codigo_video + '" class="video-links">' +
                        respuesta[i].titulo +
                        '</a>' +
                        '<p class="video-descripcion yt-color">' + respuesta[i].nombre_canal + ' <br> ' +
                        parseVisualizaciones(respuesta[i].num_visualizaciones) + ' vistas' +
                        '</p>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>'
                    );
                }
            }else{
                $("#div-recomendados").append("<p class='font-weight-bold'>No hay mas videos de esta categoria</p>");
            }
        },
        error: function (e) {
            console.log(e);
        }
    });
}
/**
 * Funcion que muestra la descripcion de los videos
 */
$("#btn-mostrar").click(function () {
    if ($("#div-descripcion").hasClass("d-none")) {
        $("#div-descripcion").removeClass("d-none");
    } else {
        $("#div-descripcion").addClass("d-none");
    }

});

/**
 * Funcion que permite publicar comentarios
 * 
 */
$("#btn-publicar").click(function () {

    $.ajax({
        url: "../ajax/api.php?accion=verificarLogIn",
        success: function (respuesta) {
            if (respuesta == 1) {
                var comentario = "comentario=" + $("#txt-comentario").val() +
                    "&idVideo=" + $("#div-codigo").html() +
                    "&idUsuario=" + $("#txt-codigo").html();
                console.log(comentario);
                $.ajax({
                    url: "../ajax/api.php?accion='insertarComentario'",
                    data: comentario,
                    method: "POST",
                    dataType: "json",
                    success: function (respuesta) {
                        console.log(respuesta);
                        if (respuesta.codigo_respuesta == 0) {
                            $("#div-comentarios").append(
                                ' <div class="col-12 mt-3 mb-3 ">' +
                                ' <img class="img-fluid rounded-circle img-comentarios" src="../' + respuesta.url_imagen_perfil + '" >' +
                                '<span class="font-weight-bold ml-2 txt-14">' + respuesta.nombre + '</span>' +
                                '<span class="yt-color txt-14p ml-1" >Hace ' + parseTimeElement(respuesta.fecha_comentario) + '</span>' +
                                '<div style="margin-left: 55px;">' + respuesta.comentario + '</div>' +
                                '</div>'
                            );
                        }
                    },
                    error: function (e, text, error) {
                        console.log(e);
                        console.log(error);
                    }
                });
            }
        }
    });

});