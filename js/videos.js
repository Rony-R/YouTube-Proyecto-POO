
$.getScript("js/funciones.js");

$(document).ready(function() {
  $.ajax({
    url: "ajax/api.php?accion='obtener-videos'",
    dataType: "json",
    success: function(respuesta) {
      for (var i = 0; i < respuesta.length; i++) {
        $("#div-videos").append(
          '<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">' +
            '<a href="watch/video-watch.php?id=' +
            respuesta[i].codigo_video +
            '" class="d-block" onclick="Neurona('
            +respuesta[i].codigo_video+')">' +
            '<div class="video-miniatura">' +
            '<img class="img-fluid" id="miniatura" src=' +
            respuesta[i].url_miniatura +
            ">" +
            '<div class="descripcion">' +
            '<a href="watch/video-watch.php?id=' +
            respuesta[i].codigo_video +
            '" class="video-title" onclick="Neurona('
            +respuesta[i].codigo_video+')" id="titulo-video">' +
            respuesta[i].titulo +
            "</a>" +
            '<p class="yt-color video-text" id="informacion">' +
            respuesta[i].nombre_canal +
            "<br>" +
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



