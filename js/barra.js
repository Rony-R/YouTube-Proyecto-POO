var menu = $("#btn-menu"),
  logo = $("#yt-brand"),
  upload = $("#btn-up"),
  apps = $("#btn-apps"),
  opc = $("#btn-opc"),
  login = $("#btn-login"),
  search = $("#btn-search"),
  atras = $("#btn-atras"),
  txt_busqueda = $("#search-box");

/**Funcion que verifica el tamaño de pantall */
function verificarTamanio() {
  var tamanio = $(window).width();
  if (tamanio <= 617) {
    barraRes();
  } else {
    barraNorm();
  }
}

$(document).ready(function() {
  verificarTamanio();
});
$(window).resize(function() {
  verificarTamanio();
});

/**Funcion que permite organizar la barra de navegacion para que se muestre bien en tamaños pequeños */
function barraRes() {
  menu.removeClass("mr-3");
  menu.addClass("mr-1");
  logo.removeClass("ml-4");
  logo.addClass("ml-1");
  search.removeClass("search-btn");
  search.addClass("mt-2 mr-2");
  upload.removeClass("ml-5");
  upload.addClass("ml-1");
  login.removeClass("end-btn");
  login.css({
    "font-size": "0.61rem",
    width: "55px",
    heigth: "35px"
  });
}

/**Funcion que permite organizar la barra de navegacion volver a su estado normal*/
function barraNorm() {
  menu.addClass("mr-3");
  menu.removeClass("mr-1");
  logo.addClass("ml-4");
  logo.removeClass("ml-1");
  search.addClass("search-btn");
  search.removeClass("mt-2 mr-2");
  upload.addClass("ml-5");
  upload.removeClass("ml-1");
  login.addClass("end-btn");
  login.removeAttr("style");
}

/**Evento click del boton de busqueda */
search.click(function() {
  if ($(window).width() <= 617) {
    menu.addClass("d-none");
    logo.addClass("d-none");
    upload.addClass("d-none");
    apps.addClass("d-none");
    opc.addClass("d-none");
    login.addClass("d-none");
    search.addClass("item-center");
    atras.removeClass("d-none");
    atras.addClass("d-block");
    atras.addClass("mt-1");
    $(this).addClass("disabled");
    $(this).removeClass("mt-2");
    ocultarSearch();
    buscarVideo();
  } else {
    buscarVideo();
  }
});

/**Evento click del boton atras */
atras.click(function() {
  txt_busqueda.addClass("d-lg-block d-none ml-5");
  txt_busqueda.removeClass("d-block w-75");
  menu.removeClass("d-none");
  logo.removeClass("d-none");
  upload.removeClass("d-none");
  apps.removeClass("d-none");
  opc.removeClass("d-none");
  login.removeClass("d-none");
  $(this).removeClass("d-block");
  $(this).addClass("d-none");
  if (search.hasClass("disabled")) {
    search.removeClass("disabled");
  }
});

/**Ocultar input de busqueda */
function ocultarSearch() {
  if (txt_busqueda.hasClass("d-lg-block")) {
    txt_busqueda.removeClass("d-lg-block d-none ml-5");
    txt_busqueda.addClass("d-block");
    txt_busqueda.addClass("w-75");
  }
}
/**Funcion que permite organizar la barra de navegacion  a su estado normal en pantallas medianas */
function barraResMd() {
  txt_busqueda.removeClass("ml-5");
  txt_busqueda.addClass("ml-1");
  search.removeClass("ml-5");
  search.addClass("ml-1");
}
/**Funcion que permite devolver la barra de navegacion a su estado normal  en pantallas medianas */
function barraNormMd() {
  txt_busqueda.addClass("ml-5");
  txt_busqueda.removeClass("ml-1");
  search.addClass("ml-5");
  search.removeClass("ml-1");
}

/**
 * Funcion que trae valores de la base de datos sobre los videos que existen en ella
 *
 */
txt_busqueda.keyup(function() {
  var parametros = "";
  var url = "";
  if ($("#nivel").html() == 0) {
    url = "ajax/api.php?accion='buscador'";
  } else {
    if ($("#nivel").html() == 1) {
      url = "../ajax/api.php?accion='buscador'";
    }
  }
  if (txt_busqueda.val() != "") {
    parametros = "texto=" + txt_busqueda.val();
    $.ajax({
      url: url,
      data: parametros,
      dataType: "json",
      method: "GET",
      success: function(respuesta) {
        var resultados = "";
        if (respuesta.length != 1) {
          for (var i = 0; i < respuesta.length - 1; i++) {
            resultados +=
              '<a href="watch/video-watch.php?id=' +
              respuesta[i].codigo_video +
              '" class="d-block search-links font-weight-bold">' +
              respuesta[i].titulo +
              "</a><br>";
          }
          $("#div-busqueda").html(resultados);
          $("#div-busqueda").toggle();
          $("#div-busqueda").fadeIn();
        } else {
          $("#div-busqueda").html("No se encontraron resultados");
        }
      },
      error: function(e, text, error) {
        console.log(e);
        console.log(error);
      }
    });
  }
  if (txt_busqueda.val() == "") {
    $("#div-busqueda").html("");
    $("#div-busqueda").fadeOut();
  } else {
    $("#div-busqueda").fadeIn();
  }
});

function buscarVideo() {
  if (txt_busqueda.val() != "") {
    var busqueda = "search/search.php?busqueda=" + txt_busqueda.val() + "";
    window.location.href = busqueda;
  }
}
