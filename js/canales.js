$.getScript("js/funciones.js");

$(document).ready(function () {

  $.ajax({
    url: "ajax/api.php?accion=verificarLogIn",
    success: function (respuesta) {
      if (respuesta == 1) {
        var parametro = "id=" + $("#txt-codigo").html();
        obtenerCanalesNoSuscritos(parametro);
      } else {
        obtenerCanales();
      }
    }
  });

});

/**
 * Funcion que obtiene todos los canales en YouTube 
 */
function obtenerCanales() {
  $.ajax({
    url: "ajax/api.php?accion='obtenerCanales'",
    dataType: "json",
    success: function (respuesta) {
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
          '" onclick="suscribirse(' + respuesta[i].codigo_canal + ')">SUSCRIBIRSE</button>' +
          "</div>" +
          "</div>" +
          "</div>";
      }
      $("#yt-canales").html(
        '<div class="content-name">' +
        "Lo Mejor de YouTube" +
        "</div>" +
        '<div class="container">' +
        '<div class="row">' +
        canales +
        "</div>" +
        "<hr>" +
        "</div>"
      );
    },
    error: function (e, text, error) {
      console.log(e);
      console.log(error);
    }
  });
}
/**
 * Funcion que obtiene todos los canales que el usuario no se ha suscrito
 */
function obtenerCanalesNoSuscritos(codigo_usuario) {
  $.ajax({
    url: "ajax/api.php?accion='obtenerNoSuscrito'",
    data: codigo_usuario,
    method: "POST",
    dataType: "json",
    success: function (respuesta) {
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
          '" onclick="suscribirse(' + respuesta[i].codigo_canal + ')">SUSCRIBIRSE</button>' +
          "</div>" +
          "</div>" +
          "</div>";
      }
      $("#yt-canales").html(
        '<div class="content-name">' +
        "Lo Mejor de YouTube" +
        "</div>" +
        '<div class="container">' +
        '<div class="row">' +
        canales +
        "</div>" +
        "<hr>" +
        "</div>"
      );
    }
  });

}