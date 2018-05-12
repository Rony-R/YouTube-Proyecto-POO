$.getScript("js/funciones.js");

var codigo_usuario = $("#txt-codigo").html(),
    div_info = $("#div-info-historial"),
    div_historial = $("#div-historial");

$(document).ready(function () {
    verificarUsuario();
});

/**
 * Verifica el usuario si esta logeado para mostrar el contenido pertinente
 */
function verificarUsuario() {
    $.ajax({
        url: "ajax/api.php?accion=verificarLogIn",
        success: function (respuesta) {
            if (respuesta == 1) {
                $("#btn-borrar").removeClass("disabled");
                var parametro = "id=" + codigo_usuario;
                $.ajax({
                    url: "ajax/api.php?accion='obtenerHistorial'",
                    data: parametro,
                    method: "POST",
                    dataType: "json",
                    success: function (respuesta) {
                        if (respuesta.length != 0) {
                            for (var i = 0; i < respuesta.length; i++) {
                                div_historial.append(
                                    ' <div class="container-fluid">' +
                                    '<div class="row no-gutters">' +
                                    '<div class="foto col-xl-7 col-lg-7 col-md-7">' +
                                    '<a href="watch/video-watch.php?id=' + respuesta[i].codigo_video + '" class="d-block">' +
                                    '<div class="video-miniatura-tendencias">' +
                                    '<img class="img-fluid" src="' + respuesta[i].url_miniatura + '">' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="info col-xl-5 col-lg-5 col-md-5">' +
                                    '<div class="descripcion ml-2 mt-3">' +
                                    '<h4>' +
                                    '<a href="watch/video-watch.php?id=' + respuesta[i].codigo_video + '">' +
                                    respuesta[i].titulo +
                                    '</a>' +
                                    '</h4>' +
                                    '<p class="text-muted">' + respuesta[i].nombre_canal +
                                    '<br>' + parseVisualizaciones(respuesta[i].num_visualizaciones) + ' vistas<br>' +
                                    ' Hace ' + parseTimeElement(respuesta[i].fecha_subida) + '</p>' +
                                    '<p class="yt-color text-justify">' +
                                    respuesta[i].descripcion +
                                    '</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<br>'
                                );
                            }
                        }else{
                            div_historial.append(
                                "<p class='font-weight-bold item-center' style='font-size: 20px;'>"+
                                "No tienes videos en el historial</p>");
                        }

                    }
                });
                if (div_historial.hasClass("d-none")) {
                    div_historial.removeClass("d-none");
                }
            } else {
                if (div_info.hasClass("d-none")) {
                    div_info.removeClass("d-none");
                }
            }
        }
    });
}

/**
 * Funcion que borra el historial de reproducciones de un usuario
 */
$("#btn-borrar").click(function () {
    var parametros = "id=" + codigo_usuario;
    $.ajax({
        url: "ajax/api.php?accion='borrarHistorial'",
        data: parametros,
        method: "POST",
        dataType: "json",
        success: function (respuesta) {
            if (respuesta.codigo_mensaje == 0) {
                location.reload();
            } else {
                alert(respuesta.mensaje);
            }
        }
    });
});