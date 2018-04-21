$(document).ready(function () {

    $.ajax({
        url: "ajax/v-tendencias.php",
        success: function (respuesta) {
           $("#video-tendencias").append(respuesta);
        }
    });
});