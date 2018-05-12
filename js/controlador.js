
$(document).ready(function(){

  var url ="";
  if ($("#nivel").html() == 0) {
    url = "ajax/api.php?accion=verificarLogIn";
  } else {
    if ($("#nivel").html() == 1) {
      url = "../ajax/api.php?accion=verificarLogIn";
    }
  }
  $.ajax({
    url: url,
    success: function(respuesta){
      if(respuesta == 1)
        mostrarLogIn();
      else
        ocultarLogOut();
    }
  });

});

function validarContrasena(etiqueta){
  if (etiqueta.value.length < 8){
    etiqueta.classList.remove("is-valid");
    etiqueta.classList.add("is-invalid");
  } else {
    etiqueta.classList.remove("is-invalid");
    etiqueta.classList.add("is-valid");
  }
}

function validarEmail(id){
  var patron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (patron.test($("#" + id).val())){
    $("#" + id).addClass("is-valid");
    $("#" + id).removeClass("is-invalid");
    return true;
  } else {
    $("#" + id).addClass("is-invalid");
    $("#" + id).removeClass("is-valid");
    return false;
  }
}

function validar(){
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

$("#btn-sig-paso").click(function(){
  validar(); //Verificando si estan vacios!!!

  if ($("#txt-password1").val() != $("#txt-password2").val()){
    $("#txt-password1").removeClass("is-valid");
    $("#txt-password1").addClass("is-invalid");
    $("#txt-password2").removeClass("is-valid");
    $("#txt-password2").addClass("is-invalid");

    $("#validacion-contrasena1").html("Las contraseñas no coinciden");
    $("#validacion-contrasena2").html("Las contraseñas no coinciden");
  }

  if (validarCampoVacio("txt-email")){
    $("#validacion-correo").html("No puedes dejar este campo vacio.");
  } else {
    if (validarEmail("txt-email") && $("#txt-password1").val() == $("#txt-password2").val()){
      $("#validacion-correo").html("Correo Valido");

      var parametros ="nombre=" +$("#txt-nombre").val()+ 
                      "&apellido=" +$("#txt-apellido").val()+ 
                      "&correo=" +$("#txt-email").val()+ 
                      "&contrasena=" +$("#txt-password2").val()+ 
                      "&nacimiento=" +$("#dia").val() +"/" +$("#mes").val() +"/"+$("#agno").val()+ 
                      "&genero=" +$("#slc-sexo").val()+ 
                      "&telefono=" +$("#txt-telefono").val()+ 
                      "&ubicacion=" +$("#slc-ubicacion").val();

      console.log("Se enviara esto al php: " + parametros);

      $.ajax({
        url: "ajax/api.php?accion=formulario-google",
        method: "POST",
        data: parametros,
        dataType:"json",
        success: function(respuesta){
          alert(respuesta.mensaje);
          window.location.href = "./inicio-google.html";
        },
        error: function(e){
          console.log(e);
        }
      });

    } else {
      $("#validacion-correo").html("Correo Invalido");
    }
  }

});

$("#btn-siguiente").click(function(){
  if($("#txt-email").val() == ""){
    $("#txt-email").removeClass("is-valid");
    $("#txt-email").addClass("is-invalid");
    $("#div-validacion").html("No puedes dejar este campo vacio.");
  }else{
    if (validarEmail("txt-email")){
      $("#nombre-usuario").html($("#txt-email").val());

      $("#Pagina-inicio").removeClass("display-block");
      $("#Pagina-inicio").addClass("display-none");

      $("#Pagina-Contrasena").removeClass("display-none");
      $("#Pagina-Contrasena").addClass("display-block");
    }else{
      $("#txt-email").addClass("is-invalid");
      $("#txt-email").removeClass("is-valid");
      $("#div-validacion").html("Correo Invalido.");
    }
  }
});

$("#btn-siguiente2").click(function(){ //Boton de Log In!!!!!

  var datos = "usuario=" +$("#nombre-usuario").html()+ "&"+
              "contra=" +$("#contra-inicio-google").val();

  console.log("Se enviara esto al php: " + datos);

  $.ajax({
    url: "ajax/api.php?accion=inicio-google",
    method: "POST",
    data: datos,
    dataType:"json",
    success: function(respuesta){
      if(respuesta.estadoResultado == 0)
        window.location.href = "./index.php";
      else
        window.location.href = "./inicio-google.html";
    },
    error: function(e){
      console.log(e);
    } 
  });
  
});

function cerrarSesion()
{
  //alert("Cerrando Sesion!!!");
  ocultarLogOut();

  $.ajax({
    url: "ajax/api.php?accion=log-out",
    success: function(respuesta){
      if(respuesta == 1)
        window.location.href = "./index.php";
      else 
        window.location.href = "./index.php";
    }
  });

}

function botonesCategorias(id){
  if (id == "infoBasica"){
    $("#pagina1").removeClass("display-none");
    $("#pagina1").addClass("display-run-in");

    $("#pagina2").removeClass("display-run-in");
    $("#pagina2").addClass("display-none");

    $("#pagina3").removeClass("display-run-in");
    $("#pagina3").addClass("display-none");
  } else{
    if (id == "traducciones"){
      $("#pagina2").removeClass("display-none");
      $("#pagina2").addClass("display-run-in");

      $("#pagina1").removeClass("display-run-in");
      $("#pagina1").addClass("display-none");

      $("#pagina3").removeClass("display-run-in");
      $("#pagina3").addClass("display-none");
    }else{
      $("#pagina3").removeClass("display-none");
      $("#pagina3").addClass("display-inline");

      $("#pagina1").removeClass("display-run-in");
      $("#pagina1").addClass("display-none");

      $("#pagina2").removeClass("display-run-in");
      $("#pagina2").addClass("display-none");
    }
  }
}

function verificarLogIn()
{
  
  $.ajax({
    url: "ajax/api.php?accion=verificarLogIn",
    success: function(respuesta){
      if(respuesta == 1)
      {
        mostrarLogIn();
        window.location.href = "./form-videos.php";
      }
      else
      {
        ocultarLogOut();
        window.location.href ="./inicio-google.html";
      }
    }
  });
}

/**Boton que guarda la informacion de los videos **/
function publicarVideo(codUsuario)
{ 
  var codigo = "codigo=" +codUsuario;

  var codCanal;
  var ultId;

    $.ajax({
      url: "ajax/api.php?accion=obtenerCodigoCanal",
      async: false,
      method: "POST",
      data: codigo, 
      dataType: "json",
      success: function(respuesta){
         //console.log(respuesta.codigoCanal);
         codCanal = respuesta.codigoCanal;
      },
      error: function(e)
      {
        console.log(e);
      }
    });

  var parametrosVideos =  "titulo=" +$("#titulo-video").val()+
                          "&codCanal=" +codCanal+
                          "&url-vid=" +$("#span-url").html()+
                          "&descripcion=" +$("#txta-descripcion1").val()+
                          "&etiqueta=" +$("#etiquetas-video").val()+
                          "&acceso=" +$("#slc-accesos").val()+                         
                          "&mensajeUsuario=" +$("#msj-usuario").val()+                          
                          "&idioma=" +$("#slc-idiomas").val()+
                          "&tituloOriginal=" +$("#nombre-video1").val()+                       
                          "&descripcionOriginal=" +$("#txta-descripcion2").val()+                          
                          "&tituloTraducido=" +$("#nombre-video2").val()+
                          "&descripcionTraducida=" +$("#txta-descripcion3").val()+
                          "&categoria=" +$("#slc-categoria").val();
  console.log(parametrosVideos);
                        
  $.ajax({
    url: "ajax/api.php?accion=insertar-video",
    data: parametrosVideos,
    async: false,
    method: "POST",
    dataType: "json",
    success:function(respuesta){
      console.log(respuesta);
      console.log(respuesta.sql);
      if(respuesta.estado == 0)
      {
        window.location.href = "watch/video-watch.php?id="+respuesta.ultimoId;
        ultId = respuesta.ultimoId;
        
      }
      else{
        window.location.href = "form-videos.php";
      }
       
    },
    error:function(e,text,error){
      console.log(e);
      console.log(error);
    }
});

  var parametrosConfiguracion =   "&comentarios=" +$("#chk-permitir-comentarios").val()+
                                  "&codigo_video=" +ultId+
                                  "&motrarComentarios=" +$("#slc-mostrar").val()+
                                  "&ordenaComentarios=" +$("#slc-comentarios").val()+
                                  "&valoraciones=" +$("#chk-valoraciones").val()+
                                  "&licencia=" +$("#slc-derechos").val()+
                                  "&distribucion=" +$("input[name='distribucion']:checked").val()+
                                  "&subtitutlos=" +$("#slc-motivos").val()+
                                  "&opcDist1=" +$("#chk-dist1").val()+
                                  "&opcDist2=" +$("#chk-dist2").val()+
                                  "&restriccionEdad=" +$("#chk-restriccion").val()+
                                  "&ubicacion=" +$("#input-buscar").val()+
                                  "&idiomaVideo=" +$("#slc-idioma2").val()+
                                  "&contribucion=" +$("#chk-contribuciones").val()+
                                  "&fecha-grabacion=" +$("#input-fecha-grabacion").val()+
                                  "&estadisticas=" +$("#chk-estadisticas").val()+
                                  "&contenido=" +$("#chk-declaracion").val();

    

   $.ajax({
      url: "ajax/api.php?accion=config-video",
      data: parametrosConfiguracion,
      method: "POST",
      dataType: "json",
      success:function(respuesta){
        alert(respuesta.mensaje);
      }
  });

}

function obtenerInfoCanal(nombreCanal)
{
  var nombreCanal = "nombre=" +nombreCanal;

  $.ajax({
    url: "ajax/api.php?accion=obtener-info-canal",
    method: "POST",
    data: nombreCanal,
    dataType: "json",
    success: function(respuesta){
      console.log(respuesta);

      var url = "./estructura-canal.php?" +respuesta;

      console.log(url);

      window.location.href = url;
    }
  });
  
}

function btnGroup(canal, pagina)
{
  var dato = "canal=" +canal;

  $.ajax({
    url: "ajax/api.php?accion=btnGroup",
    method: "POST",
    data: dato,
    success: function(respuesta){

      var url = "./" + pagina + "?" +respuesta;

      console.log(url);

      window.location.href = url;

    },
    error: function(e){
      console.log(e);
    }
  });

}

function mostrarLogIn()
{
  $("#campanita").removeClass("display-none");
  $("#log-usuario").removeClass("display-none");
  $("#mostrar-al-login").removeClass("display-none");

  $("#btn-iniciar-sesion").addClass("display-none");
  $("#drop-puntitos").addClass("display-none");

  $("#ocultar-al-login").removeClass("display-block");
  $("#ocultar-al-login").addClass("display-none");
  $("#ocultar-al-login2").addClass("display-none");

  $("#btn-up2").removeClass("display-none");
  $("#btn-up").addClass("display-none");

}

function ocultarLogOut()
{
  $("#campanita").addClass("display-none");
  $("#log-usuario").addClass("display-none");
  $("#mostrar-al-login").addClass("display-none");

  $("#btn-iniciar-sesion").removeClass("display-none");
  $("#drop-puntitos").removeClass("display-none");
  $("#ocultar-al-login").removeClass("display-none");
  $("#ocultar-al-login2").removeClass("display-none");

  $("#btn-up2").addClass("display-none");
  $("#btn-up").removeClass("display-none");

}

function verificarCanal(cod)
{
  var dato = "codigoUsuario=" +cod;

  $.ajax({
    url: "ajax/api.php?accion=verificarCanal",
    method: "POST",
    data: dato,
    dataType: "json",
    success: function(respuesta){

      console.log(respuesta);

      if(respuesta.tieneCanal == 1)
      {
        obtenerInfoCanal(respuesta.dato);
      }
      else
      {
        $('#modal-yt').modal('show');
      }

    },
    error: function(e){
      console.log(e);
    }
  });
}

function crearCanal(codigoUsuario)
{ 
    var datosCanal = "nombre=" +$("#nombreCanal").val()+
                    "&codigo=" + codigoUsuario+
                    "&descripcion=" +$("#descripcionCanal").val()+
                    "&banner=" +"img/youtube.png"+
                    "&foto_canal=" +"img/user-icon.png";

    console.log(datosCanal);

    $.ajax({
      url: "ajax/api.php?accion=crear-canal",
      method: "POST",
      data: datosCanal,
      dataType: "json",
      success: function(respuesta){
        console.log(respuesta.nombre);
        obtenerInfoCanal(respuesta.nombre);
      }
    });

}

function verificacionDoble(codigoUser)
{
  var dato = "codigoUsuario=" +codigoUser;

  $.ajax({
    url: "ajax/api.php?accion=verificarCanal",
    method: "POST",
    data: dato,
    dataType: "json",
    success: function(respuesta){

      console.log(respuesta);

      if(respuesta.tieneCanal == 1)
      {
        window.location.href = "./form-videos.php";
      }
      else
      {
        $('#modal-yt').modal('show');
        $("#btn-crear-canal").click(function(){
          window.location.href = "./form-videos.php";
        });
      }

    },
    error: function(e){
      console.log(e);
    }
  });
}
