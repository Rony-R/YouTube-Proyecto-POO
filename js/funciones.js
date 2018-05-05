/**
 * Funcion que convierte el numero de visualizaciones a un formato ligero
 * @param {*} num
 */
function parseVisualizaciones(num) {
  var visualizaciones = "";
  if (num < 1000) {
    visualizaciones = num;
  } else {
    if (num >= 1000 && num < 1000000) {
      visualizaciones = num / 1000 + " k";
    } else {
      if (num >= 1000000) {
        visualizaciones = num / 1000000 + " M";
      }
    }
  }

  return visualizaciones;
}

/**
 * Funcion que convierte el tiempo de subida de un video
 * @param {*} tiempo
 */
function parseTimeElement(tiempo) {
  var fecha_subida = new Date(tiempo);
  var fecha_actual = new Date();

  var diff = fecha_actual - fecha_subida;

  var dias = diff / (1000 * 60 * 60 * 24);
  var horas = diff / (1000 * 60 * 60);
  var minutos = diff / (1000 * 60);
  var segundos = diff / 1000;
  var diasF = Math.floor(dias);
  var tiempo_transcurrido;
  var time = "";
  if (diasF < 30) {
    tiempo_transcurrido = diasF;
    time = tiempo_transcurrido + " dias";
  } else {
    if (diasF >= 30 && diasF < 365) {
      tiempo_transcurrido = Math.floor(diasF / 30);
      time = tiempo_transcurrido + " meses";
    } else {
      if (diasF >= 365) {
        tiempo_transcurrido = Math.floor(diasF / 365);
        time = tiempo_transcurrido + " años";
      }
    }
  }

  return time;
}
/**
 * Funcion que parsea el tiempo para mostrarlo en una cadena en los videos
 * @param {*} tiempo 
 */
function parseTimeVideo(tiempo) {
  var time = "";
  var mesString = "";
  var fecha_subida = new Date(tiempo);
  var dias = fecha_subida.getDate();
  var mes = fecha_subida.getMonth();
  var año = fecha_subida.getFullYear();
  mesString = getMesCadena(mes);
  time = "Publicado el " + dias + " " + mesString + " " + año;
  return time;
}

/**
 * Funcion que coloca el mes en cadena
 * @param {*} mes 
 */
function getMesCadena(mes) {
  var mes_cadena = "";
  switch (mes) {
    case 0:
      mes_cadena = "ene.";
      break;
    case 1:
      mes_cadena = "feb.";
      break;
    case 2:
      mes_cadena = "mar.";
      break;
    case 3:
      mes_cadena = "abr.";
      break;
    case 4:
      mes_cadena = "may.";
      break;
    case 5:
      mes_cadena = "jun.";
      break;
    case 6:
      mes_cadena = "jul.";
      break;
    case 7:
      mes_cadena = "agos.";
      break;
    case 8:
      mes_cadena = "sept.";
      break;
    case 9:
      mes_cadena = "oct.";
      break;
    case 10:
      mes_cadena = "nov.";
      break;
    case 11:
      mes_cadena = "dic.";
      break;
  }
  return mes_cadena;
}
