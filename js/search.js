$.getScript("../js/funciones.js");

$(document).ready(function() {
  var search = "texto=" + $("#div-search").html();
  console.log(search);
  $.ajax({
    url: "../ajax/api.php?accion='buscador'",
    data: search,
    dataType: "json",
    success: function(respuesta) {
    console.log(respuesta);
      $("#num_resultado").append(respuesta[respuesta.length-1].numero+ " resultados");
      for (var i = 0; i <respuesta.length-1; i++) {
        $("#result-search").append(
          '<div class="container-fluid">' +
            '<div class="row no-gutters">' +
            '<div class="foto col-xl-4 col-lg-4 col-md-4">' +
            '<a href="video-watch.php?id=' +
            respuesta[i].codigo_video +
            '" class="d-block">' +
            '<div class="video-miniatura-tendencias">' +
            '<img class="img-fluid" src="../' +
            respuesta[i].url_miniatura +
            '">' +
            "</div>" +
            "</a>" +
            "</div>" +
            '<div class="info col-xl-8 col-lg-8 col-md-8">' +
            '<div class="descripcion ml-2 mt-3">' +
            "<h4>" +
            '<a href="video-watch.php?id=' +
            respuesta[i].codigo_video +
            '">' +
            respuesta[i].titulo +
            "</a>" +
            "</h4>" +
            '<p class="text-muted">' +
            respuesta[i].nombre_canal +
            "&nbsp;" +
            parseVisualizaciones(respuesta[i].num_visualizaciones) +
            "  vistas" +
            "&nbsp;&bull; Hace " +
            parseTimeElement(respuesta[i].fecha_subida) +
            "</p>" +
            '<p class="yt-color">' +
            respuesta[i].descripcion +
            "</p>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "<br>"
        );
      }
    },
    error: function(e, text, error) {
      console.log(e);
      console.log(error);
    }
  });
});
