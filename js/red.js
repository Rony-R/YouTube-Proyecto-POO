//Creacion de un modelo lineal
linearModel = tf.sequential();
//Creacion de una capa de una entrada y una salida
linearModel.add(tf.layers.dense({ units: 1, inputShape: [1] }));

// Preparar el modelo para entrenamiento, se especifica la perdida, el optimizador y la tasa de aprendizaje
linearModel.compile({
  loss: "meanSquaredError",
  optimizer: "sgd",
  learningRate: 0.1
});

/**
 * Funcion que entrena el modelo con informacion del usuario logeado
 * @param {*} id
 */
function train(id) {
  var parametro = "id=" + id;
  console.log(parametro);
  $.ajax({
    url: "ajax/api.php?accion='entrenar'",
    data: parametro,
    dataType: "json",
    sucess: function(respuesta) {
      console.log(respuesta);
      var x = [];
      var y = [];
      for (var i = 0; i < respuesta.length; i++) {
        x[i] = respuesta.porcentaje_clicks[i];
        if (respuesta.porcentaje_clicks[i] < 50) {
          y[i] = -1 * respuesta.porcentaje_clicks[i];
        } else {
          y[i] = respuesta.porcentaje_clicks[i];
        }
      }

      const xs = tf.tensor1d(x);
      const ys = tf.tensor1d(y);

      // Entrenar el modelo con los comportamientos del usuario
      linearModel.fit(xs, ys);
    },
    error: function(e,text,error){
        console.log(e);
        console.log(error);
        console.log(text);
    }
  });
}
/**
 * Funcion que predice si una categoria es recomendada para un usuario
 * @param {*} val
 */
function prediccion(val) {
  var recomendado;
  const output = linearModel.predict(tf.tensor2d([val], [1, 1]));
  prediction = Array.from(output.dataSync())[0];
  if (prediction > 0) {
    recomendado = 1;
  } else {
    recomendado = 0;
  }
  return recomendado;
}

/**
 * Funcion que me devuelve los videos recomendados del usuario especifico
 * @param {*} porcentajeUsuario
 * @param {*} categoria
 */
function Recomendados(porcentajeUsuario, categoria) {
  var parametro = "categoria=" + categoria;
  if (prediccion(porcentajeUsuario) == 1) {
    $.ajax({
      url: "ajax/api.php?accion='redRecomendados'",
      data: parametro,
      dataType: "json",
      success: function(respuesta) {
        for (var i = 0; i < respuesta.length; i++) {
          $("#div-videos").append(
            '<div class="content-name"> Recomendados' +
              "</div>" +
              '<div class="row border-bottom mt-3">' +
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
              "</div>" +
              "</div>"
          );
        }
      }
    });
  }
}
