$.getScript("js/funciones.js");

$(document).ready(function () {
    var idCanal = "id=" + $("#txt-codigo-canal").html();
    $.ajax({
        url: "ajax/api.php?accion='obtenerVideosCanal'",
        data: idCanal,
        dataType: "json",
        method: "POST",
        success: function (respuesta) {
            for (var i = 0; i < respuesta.length; i++) {
                $("#yt-video-canal").append(
                    '<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">' +
                    '<a href="watch/video-watch.php?id=' +
                    respuesta[i].codigo_video +
                    '" class="d-block"  onclick="historial(' +
                    respuesta[i].codigo_video +
                    "," +
                    "'" + respuesta[i].categoria + "'" +
                    ')">' +
                    '<div class="video-miniatura">' +
                    '<img class="img-fluid" id="miniatura" src=' +
                    respuesta[i].url_miniatura +
                    ">" +
                    '<div class="descripcion">' +
                    '<a href="watch/video-watch.php?id=' +
                    respuesta[i].codigo_video +
                    '" class="respuesta-title"  onclick=historial(' +
                    respuesta[i].codigo_video +
                    "," +
                    "'" + respuesta[i].categoria + "'" +
                    ')" id="titulo-video">' +
                    respuesta[i].titulo +
                    "</a>" +
                    '<button type="button" class="btn btn-outline-light p-0 ml-2" title="Ver mas tarde"' +
                    'onclick="guardarVideo(' + respuesta[i].codigo_video + ')">' +
                    '<i class="fa fa-xs fa-clock"></i></button>' +
                    '<p class="yt-color video-text" id="informacion">' +
                    parseVisualizaciones(respuesta[i].num_visualizaciones) +
                    " vistas &bull; Hace " +
                    parseTimeElement(respuesta[i].fecha_subida) +
                    "</p>" +
                    "</div>" +
                    "</div>" +
                    "</a>" +
                    "</div>"
                );
            }
        }
    });

});