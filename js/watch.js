$(document).ready(function(){
    $.ajax({
        url: "../ajax/recomendados.php",
        success: function(respuesta){
            $("#div-recomendados").append(respuesta);
        }
    });
});