<<<<<<< HEAD
$.getScript("js/funciones.js");
//$.getScript("js/red.js");
$(document).ready(function() {
  /*$.ajax({
=======

$.getScript("js/funciones.js");
$.getScript("js/red.js");
$(document).ready(function() {
  $.ajax({
>>>>>>> origin/Rama-Rony
    url: "ajax/api.php?accion='redRecomendados'",
    data: "id=3",
    dataType: "json",
    success: function(respuesta) {
<<<<<<< HEAD
      
=======
>>>>>>> origin/Rama-Rony
      var videos = "";
      for (var i = 0; i < respuesta.length; i++) {
        videos +=
          '<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">' +
          '<a href="watch/video-watch.php?id=' +
          respuesta[i].codigo_video +
          '" class="d-block" onclick="Neurona(' +
          respuesta[i].codigo_video +
          ')">' +
          '<div class="video-miniatura">' +
          '<img class="img-fluid" id="miniatura" src=' +
          respuesta[i].url_miniatura +
          ">" +
          '<div class="descripcion">' +
          '<a href="watch/video-watch.php?id=' +
          respuesta[i].codigo_video +
          '" class="video-title" onclick="Neurona(' +
          respuesta[i].codigo_video +
          ')" id="titulo-video">' +
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
          "</div>";
      }
      $("#div-videos").append(
        '<div class="content-name"> Recomendados' +
          "</div>" +
          '<div class="row border-bottom mt-3">' +
          videos +
          "</div>"
      );
<<<<<<< HEAD
    },
    error: function(e,text,error){
      console.log(e);
      console.log(error);
=======
>>>>>>> origin/Rama-Rony
    }
  });
*/
  
  $.ajax({
    url: "ajax/api.php?accion='obtener-videos'",
    dataType: "json",
    success: function(respuesta) {
<<<<<<< HEAD
      
=======
>>>>>>> origin/Rama-Rony
      var num = respuesta.length - 1;
      $("#div-videos").append(
        '<div class="content-name border-bottom mt-4 p-2" style="font-size: 20px;"> Mas videos en YouTube <br>' + "</div>"
      );
      for (var j = 0; j < respuesta[num].categorias.length; j++) {
        $("#div-videos").append(
          '<div class="content-name">' +
            respuesta[num].categorias[j].categoria +
            "</div>" +
            '<div class="row border-bottom mt-3">' +
            organizarVideos(respuesta[num].categorias[j].categoria, respuesta) +
            "</div>"
        );
      }
    },
    error: function(e, text, error) {
      console.log(e);
<<<<<<< HEAD
      console.log(error);
      console.log(text);
=======
>>>>>>> origin/Rama-Rony
    }
  });
  //train(1);
});

function organizarVideos(categoria, video) {
  var videos = "";
  for (var i = 0; i < video.length; i++) {
    if (categoria == video[i].categoria) {
      videos +=
        '<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">' +
        '<a href="watch/video-watch.php?id=' +
        video[i].codigo_video +
        '" class="d-block" onclick="Neurona(' +
        video[i].codigo_video +
        "," +
        video[i].categoria +
        ')">' +
        '<div class="video-miniatura">' +
        '<img class="img-fluid" id="miniatura" src=' +
        video[i].url_miniatura +
        ">" +
        '<div class="descripcion">' +
        '<a href="watch/video-watch.php?id=' +
        video[i].codigo_video +
        '" class="video-title" onclick=Neurona(' +
        video[i].codigo_video +
        "," +
        video[i].categoria +
        ')" id="titulo-video">' +
        video[i].titulo +
        "</a>" +
        '<p class="yt-color video-text" id="informacion">' +
        video[i].nombre_canal +
        "<br>" +
        parseVisualizaciones(video[i].num_visualizaciones) +
        " vistas &bull; Hace " +
        parseTimeElement(video[i].fecha_subida) +
        "</p>" +
        "</div>" +
        "</div>" +
        "</a>" +
        "</div>";
    }
  }
  return videos;
}
