$(document).ready(function () {
    $.ajax({
        url: "ajax/api.php?accion=verificarLogIn",
        success: function (respuesta) {
            if (respuesta == 1) {
                var parametros = "id=" + $("#txt-codigo").html();
                $.ajax({
                    url: "ajax/api.php?accion='obtenerMasTarde'",
                    data: parametros,
                    method: "POST",
                    dataType: "json",
                    success: function (respuesta) {
                        $("#img-primer-video").attr("src", respuesta[0].url_miniatura);
                        for (var i = 0; i < respuesta.length; i++) {
                            $("#div-videos_mas").append(
                                '<div class="container-fluid border-bottom p-2">' +
                                '<div class="row no-gutters">' +
                                '<div class="foto col-xl-4 col-lg-4 col-md-4">' +
                                '<a href="watch/video-watch.php?id=' + respuesta[i].codigo_video + '" class="d-block">' +
                                '<div class="video-miniatura">' +
                                '<img class="img-fluid" src="' + respuesta[i].url_miniatura + '">' +
                                '</div>' +
                                '</a>' +
                                '</div>' +
                                '<div class="info col-xl-8 col-lg-8 col-md-8">' +
                                '<div class="descripcion ml-2 mt-3">' +
                                '<h4>' +
                                '<a href="watch/video-watch.php?id=' + respuesta[i].codigo_video + '">' +
                                respuesta[i].titulo +
                                '</a>' +
                                '</h4>' +
                                '<p class="text-muted">' +
                                respuesta[i].nombre_canal + '<br>' +
                                '</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<br>'
                            );
                        }
                    }
                });
            }
        }
    });
});