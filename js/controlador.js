function validarContrasena(etiqueta) {
  if (etiqueta.value.length < 8) {
    etiqueta.classList.remove("is-valid");
    etiqueta.classList.add("is-invalid");
  } else {
    etiqueta.classList.remove("is-invalid");
    etiqueta.classList.add("is-valid");
  }
}

function validarEmail(id) {
  var patron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (patron.test($("#" + id).val())) {
    $("#" + id).addClass("is-valid");
    $("#" + id).removeClass("is-invalid");
    return true;
  } else {
    $("#" + id).addClass("is-invalid");
    $("#" + id).removeClass("is-valid");
    return false;
  }
}

function validar() {
  var resultado = true;
  validarCampoVacio("txt-nombre");
  validarCampoVacio("txt-apellido");
  validarCampoVacio("txt-email");
  validarCampoVacio("txt-password1");
  validarCampoVacio("txt-password2");
  validarCampoVacio("slc-sexo");
  validarCampoVacio("txt-telefono");
  validarCampoVacio("dia");
  validarCampoVacio("mes");
  validarCampoVacio("agno");
}

var validarCampoVacio = function(id) {
  if (id == "slc-sexo") {
    if ($("#" + id).val() == "Selecciona tu género") {
      $("#" + id).removeClass("is-valid");
      $("#" + id).addClass("is-invalid");
      return true;
    } else {
      $("#" + id).removeClass("is-invalid");
      $("#" + id).addClass("is-valid");
      return false;
    }
  } else {
    if (id == "dia") {
      if ($("#" + id).val() == "Día") {
        $("#" + id).removeClass("is-valid");
        $("#" + id).addClass("is-invalid");
        return true;
      } else {
        $("#" + id).removeClass("is-invalid");
        $("#" + id).addClass("is-valid");
        return false;
      }
    } else {
      if (id == "mes") {
        if ($("#" + id).val() == "Mes") {
          $("#" + id).removeClass("is-valid");
          $("#" + id).addClass("is-invalid");
          return true;
        } else {
          $("#" + id).removeClass("is-invalid");
          $("#" + id).addClass("is-valid");
          return false;
        }
      } else {
        if (id == "agno") {
          if ($("#" + id).val() == "Año") {
            $("#" + id).removeClass("is-valid");
            $("#" + id).addClass("is-invalid");
            return true;
          } else {
            $("#" + id).removeClass("is-invalid");
            $("#" + id).addClass("is-valid");
            return false;
          }
        } else {
          if ($("#" + id).val() == "") {
            $("#" + id).removeClass("is-valid");
            $("#" + id).addClass("is-invalid");
            return true;
          } else {
            $("#" + id).removeClass("is-invalid");
            $("#" + id).addClass("is-valid");
            return false;
          }
        }
      }
    }
  }
};

$("#btn-sig-paso").click(function() {
  validar(); //Verificando si estan vacios!!!

  if ($("#txt-password1").val() != $("#txt-password2").val()) {
    $("#txt-password1").removeClass("is-valid");
    $("#txt-password1").addClass("is-invalid");
    $("#txt-password2").removeClass("is-valid");
    $("#txt-password2").addClass("is-invalid");

    $("#validacion-contrasena1").html("Las contraseñas no coinciden");
    $("#validacion-contrasena2").html("Las contraseñas no coinciden");
  }

  if (validarCampoVacio("txt-email")) {
    $("#validacion-correo").html("No puedes dejar este campo vacio.");
  } else {
    if (validarEmail("txt-email")) {
      $("#validacion-correo").html("Correo Valido");
    } else {
      $("#validacion-correo").html("Correo Invalido");
    }
  }

  var parametros =
    "usuario=" +
    $("#txt-nombre").val() +
    $("#txt-apellido").val() +
    "&" +
    "correo=" +
    $("#txt-email").val() +
    "&" +
    "contraseña=" +
    $("#txt-password2").val() +
    "&" +
    "nacimiento=" +
    $("#dia").val() +
    "/" +
    $("#mes").val() +
    "/" +
    $("#agno").val() +
    "&" +
    "genero=" +
    $("#slc-sexo").val() +
    "&" +
    "telefono=" +
    $("#txt-telefono").val() +
    "&" +
    "ubicacion=" +
    $("#slc-ubicacion").val();
  console.log("Se enviara esto al php: " + parametros);

  $.ajax({
    url: "ajax/procesar-google.php",
    method: "POST",
    data: parametros,
    succes: function(respuesta) {}
  });
});

$("#btn-siguiente").click(function() {
  if ($("#txt-email").val() == "") {
    $("#txt-email").removeClass("is-valid");
    $("#txt-email").addClass("is-invalid");
    $("#div-validacion").html("No puedes dejar este campo vacio.");
  } else {
    if (validarEmail("txt-email")) {
      $("#nombre-usuario").html($("#txt-email").val());

      $("#Pagina-inicio").removeClass("display-block");
      $("#Pagina-inicio").addClass("display-none");

      $("#Pagina-Contrasena").removeClass("display-none");
      $("#Pagina-Contrasena").addClass("display-block");
    } else {
      $("#txt-email").addClass("is-invalid");
      $("#txt-email").removeClass("is-valid");
      $("#div-validacion").html("Correo Invalido.");
    }
  }
});

$("#btn-siguiente2").click(function() {
  var datos =
    "usuario=" +
    $("#nombre-usuario").html() +
    "&" +
    "contraseña=" +
    $("#contra-inicio-google").val();
  console.log("Se enviara esto al php: " + datos);

  $.ajax({
    url: "ajax/procesar-inicio-google.php",
    method: "POST",
    data: datos,
    succes: function(respuesta) {}
  });
});

function botonesCategorias(id) {
  if (id == "infoBasica") {
    $("#pagina1").removeClass("display-none");
    $("#pagina1").addClass("display-run-in");

    $("#pagina2").removeClass("display-run-in");
    $("#pagina2").addClass("display-none");

    $("#pagina3").removeClass("display-run-in");
    $("#pagina3").addClass("display-none");
  } else {
    if (id == "traducciones") {
      $("#pagina2").removeClass("display-none");
      $("#pagina2").addClass("display-run-in");

      $("#pagina1").removeClass("display-run-in");
      $("#pagina1").addClass("display-none");

      $("#pagina3").removeClass("display-run-in");
      $("#pagina3").addClass("display-none");
    } else {
      $("#pagina3").removeClass("display-none");
      $("#pagina3").addClass("display-inline");

      $("#pagina1").removeClass("display-run-in");
      $("#pagina1").addClass("display-none");

      $("#pagina2").removeClass("display-run-in");
      $("#pagina2").addClass("display-none");
    }
  }
}

/**Boton que guarda la informacion de los videos */
$("#btn-publicar").click(function() {
  var parametros =
    "titulo=" +
    $("#titulo-video").val() +
    "&descripcion=" +
    $("#txta-descripcion1").val() +
    "&etiqueta=" +
    $("#etiquetas-video").val() +
    "&acceso=" +
    $("#slc-accesos").val() +
    "&mensaje=" +
    $("#msj-usuario").val() +
    "&idioma=" +
    $("#slc-idiomas").val() +
    "&nombreOriginal=" +
    $("#nombre-video1").val() +
    "&descripcionOriginal=" +
    $("#txta-descripcion2").val() +
    "&nombreTraducido=" +
    $("#nombre-video2").val() +
    "&descripcionTraducida=" +
    $("#txta-descripcion3").val() +
    "&comentarios=" +
    $("#chk-permitir-comentarios").val() +
    "&idiomas-mostrar=" +
    $("#slc-mostrar").val() +
    "&ordenar=" +
    $("#slc-comentarios").val() +
    "&valoraciones=" +
    $("#chk-valoraciones").val() +
    "&licencia=" +
    $("#slc-derechos").val() +
    "&distribucion=" +
    $("input[name='distribucion']:checked").val() +
    "&subtitutlos=" +
    $("#slc-motivos").val() +
    "&opc-distribucion1=" +
    $("#chk-dist1").val() +
    "&opc-distribucion2=" +
    $("#chk-dist2").val() +
    "&categorias=" +
    $("#slc-categoria").val() +
    "&ubicacion=" +
    $("#input-buscar").val() +
    "&idioma-video=" +
    $("#slc-idioma2").val() +
    "&contribucion=" +
    $("#chk-contribuciones").val() +
    "&fecha-grabacion=" +
    $("#input-fecha-grabacion").val();
    console.log(parametros);
    $.ajax({
        url: "ajax/formulario-video.php",
        data: parametros,
        method: "get",
        success:function(respuesta){

        }
    });
});
