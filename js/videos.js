$(document).ready(function() {
  $.ajax({
    url: "ajax/estructura-video.php",
    success: function(respuesta) {
      $("#vd-recomendados").append(respuesta);
      $("#vd-canal-1").append(respuesta);
      $("#vd-canal-2").append(respuesta);
      $("#vd-canal-3").append(respuesta);
    }
  });
  $.ajax({
    url: "ajax/info-video.php",
    dataType: "json",
    success: function(respuesta) {
      $("#miniatura0").attr("src", respuesta.miniatura);
      $("#titulo-video0").append(respuesta.titulo);
      $("#informacion0").append(
        respuesta.canal +
          "<br>" +
          respuesta.visualizaciones +
          "<br>" +
          respuesta.tiempo_subida
      );
      $("#miniatura1").attr("src", respuesta.miniatura);
      $("#titulo-video1").append(respuesta.titulo);
      $("#informacion1").append(
        respuesta.canal +
          "<br>" +
          respuesta.visualizaciones +
          "<br>" +
          respuesta.tiempo_subida
      );
      $("#miniatura2").attr("src", respuesta.miniatura);
      $("#titulo-video2").append(respuesta.titulo);
      $("#informacion2").append(
        respuesta.canal +
          "<br>" +
          respuesta.visualizaciones +
          "<br>" +
          respuesta.tiempo_subida
      );
      $("#miniatura3").attr("src", respuesta.miniatura);
      $("#titulo-video3").append(respuesta.titulo);
      $("#informacion3").append(
        respuesta.canal +
          "<br>" +
          respuesta.visualizaciones +
          "<br>" +
          respuesta.tiempo_subida
      );
    }
  });
});
