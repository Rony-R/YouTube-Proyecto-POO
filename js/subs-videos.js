$.getScript("js/funciones.js");
$(document).ready(function () {

  var parametro = "id_usuario=" + $("#txt-codigo").html();
  $.ajax({
    url: "ajax/api.php?accion='obtener-canal-sub'",
    data: parametro,
    method: "POST",
    dataType: "json",
    success: function (respuesta) {
      if (respuesta.length > 0) {
        var canales = "";
        for (var i = 0; i < respuesta.length; i++) {
          canales +=
            '<div class="col-lg-3 col-md-3 mt-4">' +
            '<div class="container-canal">' +
            '<div class="imagen item-center">' +
            '<img class="imagen-circular" src="' +
            respuesta[i].foto_canal +
            '">' +
            "</div>" +
            '<div class="footer descripcion mt-2">' +
            "<h6 class='text-center'>" +
            respuesta[i].nombre_canal +
            "</h6>" +
            "<p class='text-center'>" +
            parseVisualizaciones(respuesta[i].num_suscriptores) +
            " suscriptores </p>" +
            '<button class="btn bnt-light btn-sm" style="margin-left: 43px;" id="btn-sub-' + respuesta[i].codigo_canal +
            '" onclick="suscribirse(' + respuesta[i].codigo_canal + ')">UNSUSCRIBE</button>' +
            "</div>" +
            "</div>" +
            "</div>";
        }

        $("#div-canal").append(canales);
      } else {
        $("#div-canal").append('<p class="font-weight-bold" style="font-size: 20px">No esta suscrito a ningun canal</p>');
      }
    },
    error: function (e, text, error) {
      console.log(e);
      console.log(error);
    }
  });
  $.ajax({
    url: "ajax/api.php?accion=obtener-videos-sub",
    data: parametro,
    method: "POST",
    dataType: "json",
    success: function (respuesta) {
      console.log(respuesta);
      if (respuesta.length > 1) {
        var num = respuesta.length - 1;
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
      }
    },
    error: function (e, text, error) {
      console.log(e);
      console.log(error);
      console.log(text);
    }
  });

});

/**
 * Funcion que organiza los videos en categorias
 * @param {*} categoria 
 * @param {*} video 
 */
function organizarVideos(categoria, video) {
  var videos = "";
  for (var i = 0; i < video.length; i++) {
    if (categoria == video[i].categoria) {
      videos +=
        '<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">' +
        '<a href="watch/video-watch.php?id=' +
        video[i].codigo_video +
        '" class="d-block"  onclick="historial(' +
        video[i].codigo_video +
        "," +
        "'" + video[i].categoria + "'" +
        ')">' +
        '<div class="video-miniatura">' +
        '<img class="img-fluid" id="miniatura" src=' +
        video[i].url_miniatura +
        ">" +
        '<div class="descripcion">' +
        '<a href="watch/video-watch.php?id=' +
        video[i].codigo_video +
        '" class="video-title"  onclick=historial(' +
        video[i].codigo_video +
        "," +
        "'" + video[i].categoria + "'" +
        ')" id="titulo-video">' +
        video[i].titulo +
        "</a>" +
        '<button type="button" class="btn btn-outline-light p-0 ml-2" title="Ver mas tarde"' +
        'onclick="guardarVideo(' + video[i].codigo_video + ')">' +
        '<i class="fa fa-xs fa-clock"></i></button>' +
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

/**
 * Funcion que permite agregar al historial los videos 
 * @param {*} codigo_video 
 * @param {*} categoria 
 */
function historial(codigo_video, categoria) {
  if ($("#txt-codigo").html() != null) {
    var parametros = "codigo_video=" + codigo_video +
      "&codigo_usuario=" + $("#txt-codigo").html();
    $.ajax({
      url: "ajax/api.php?accion='historial'",
      data: parametros,
      method: "POST"
    });
  }
}

/**
 * Funcion que permite guardar el video en ver mas tarde
 * @param {*} codigo_video 
 */
function guardarVideo(codigo_video) {
  $.ajax({
    url: "ajax/api.php?accion=verificarLogIn",
    success: function (respuesta) {
      if (respuesta == 1) {
        var parametros = "idUsuario=" + $("#txt-codigo").html() +
          "&idVideo=" + codigo_video;
        $.ajax({
          url: "ajax/api.php?accion='masTarde'",
          data: parametros,
          method: "post",
          dataType: "json",
          sucess: function (respuesta_insert) {
            console.log(respuesta_insert);
            if (respuesta_insert.codigo_respuesta == 0) {
              alert(respuesta_insert.mensaje);
            } else {
              alert(respuesta_insert.mensaje);
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
}